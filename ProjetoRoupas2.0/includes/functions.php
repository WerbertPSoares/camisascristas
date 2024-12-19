<?php

// Função para adicionar produto
function adicionarProduto($nome, $descricao, $preco, $imagem) {
    global $conn;
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $descricao, $preco, $imagem]);
}

// Função para obter todos os produtos
function obterProdutos() {
    global $conn;
    $sql = "SELECT * FROM produtos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para obter um produto específico pelo ID
function obterProdutoPorId($id) {
    global $conn;
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
