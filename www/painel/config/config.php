<?php

// Dados de conexão com o MySQL
$hostname = '192.168.1.110'; // Nome do servidor do MySQL
$username = 'root'; // Nome de usuário do MySQL
$password = 'rootpassword'; // Senha do usuário do MySQL
$database = 'blog2'; // Nome do banco de dados

try {
    // Criar uma conexão com o MySQL utilizando PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);

    // Configurar PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensagem de sucesso se a conexão for bem-sucedida
    //echo "Conexão com o MySQL estabelecida com sucesso";
} catch (PDOException $e) {
    // Em caso de erro na conexão, lançar uma exceção
    echo "Erro na conexão com o MySQL: " . $e->getMessage();
}
