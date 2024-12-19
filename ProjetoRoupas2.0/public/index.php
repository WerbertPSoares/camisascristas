<?php
// Inclui a conexão com o banco e as funções
include '../includes/db.php';  // Verifique o caminho correto do arquivo db.php
include '../includes/functions.php';  // Verifique o caminho correto do arquivo functions.php

// Obtém todos os produtos
$produtos = obterProdutos($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja Emaús</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Certifique-se de que o caminho está correto -->
</head>
<body>
    <header>
        <div class="logo">
            <h1>Loja Emaús</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="index.php">Produtos</a></li>
                <li><a href="cart.php">Carrinho</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="cadastro_produto.php">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Camisas Cristãs</h2>
        <div class="product-gallery">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="product-card" data-id="<?= $produto['id'] ?>" data-name="<?= $produto['nome'] ?>" data-price="<?= $produto['preco'] ?>">
                        <!-- Imagem do produto, verifique se o caminho está correto -->
                        <img src="../assets/images/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>"> 
                        <h3><?= $produto['nome'] ?></h3>
                        <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        <button class="add-to-cart">Adicionar ao Carrinho</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não há produtos disponíveis no momento.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Loja Cristã | Todos os direitos reservados</p>
    </footer>

    <script src="../js/script.js"></script> <!-- Certifique-se de que o caminho está correto -->
</body>
</html>

