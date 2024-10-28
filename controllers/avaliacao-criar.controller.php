<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /');
    exit();
}

$usuario_id = auth()->id;
$livro_id = $_POST['livro_id'];
$avaliacao = $_POST['avaliacao'];
$nota = $_POST['nota'];

$validacao = Validacao::validar([
    'avaliacao' => ['required'],
    'nota' => ['required'],
], $_POST);

if($validacao->naoPassou()){
    header('location: /livro?id=' . $livro_id);
    exit();
}

$database->query(
    query: "insert into avaliacoes (usuario_id, livro_id, avaliacao, nota) values (:usuario_id, :livro_id, :avaliacao, :nota)",
    class: Avaliacao::class,
    params: compact('usuario_id', 'livro_id', 'avaliacao', 'nota')
)->fetch();

flash()->push('mensagem', 'Livro cadastrado com sucesso!');
header('location: /meus-livros');
exit();