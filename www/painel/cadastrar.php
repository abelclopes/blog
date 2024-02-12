<?php
require_once "config/config.php";
$titulo = $_POST["titulo"];
$conteudo = $_POST["conteudo"];

try {
  
    // Preparar a instrução SQL de inserção
    $stmt = $pdo->prepare("INSERT INTO posts (titulo, conteudo) VALUES (:titulo, :conteudo)");

    // Vincular os valores dos parâmetros
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':conteudo', $conteudo);

    // Executar a instrução SQL de inserção
    $stmt->execute();

    // Mensagem de sucesso
    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    // Em caso de erro na execução da consulta, lançar uma exceção
    echo "Erro ao inserir novo post: " . $e->getMessage();
}
?>