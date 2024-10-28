<?php

$livro = Livro::get($_GET['id']);

$avaliacoes = $database->query(
    query: "select * from avaliacoes where livro_id = :id",
    class: Livro::class,
    params: ['id' => $_GET['id']]
)->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
