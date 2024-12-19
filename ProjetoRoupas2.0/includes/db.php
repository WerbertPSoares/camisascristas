<?php
$servername = "localhost";
$username = "root";  
$password = "nova_senha";      
$dbname = "carrinho";  

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Define o modo de erro do PDO como exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso"; // Teste de conexão
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
