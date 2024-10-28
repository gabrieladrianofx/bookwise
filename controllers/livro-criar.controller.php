<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /');
    exit();
}

if(!auth()) {
    abort(403);
    exit();
}

$usuario_id = auth()->id;
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descricao = $_POST['descricao'];
$ano_de_lancamento = $_POST['ano_de_lancamento'];

$validacao = Validacao::validar([
    'titulo' => ['required', 'min:3'],
    'autor' => ['required'],
    'descricao' => ['required'],
    'ano_de_lancamento' => ['required']
], $_POST);

if($validacao->naoPassou()){
    header('location: /meus-livros');
    exit();
}

$novoNome = md5(rand());
$extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
$imagem = "images/$novoNome.$extensao";

move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../public/' . $imagem);

$database->query(
    query: "insert into livros (titulo, autor, descricao, ano_de_lancamento, usuario_id, imagem) values (:titulo, :autor, :descricao, :ano_de_lancamento, :usuario_id, :imagem)",
    class: Livro::class,
    params: compact('titulo', 'autor', 'descricao', 'ano_de_lancamento', 'usuario_id', 'imagem')
)->fetch();

flash()->push('mensagem', 'Livro criado com sucesso!');
header('location: /meus-livros');
exit();