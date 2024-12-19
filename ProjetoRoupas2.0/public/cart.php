<?php
session_start();

// Se o carrinho não estiver iniciado, cria-se um array vazio
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Processando o envio de um item ao carrinho
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $id = $_POST['product_id'];
    $quantidade = $_POST['quantity'];

    // Verifica se o item já está no carrinho
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantidade;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $_POST['product_name'],
            'price' => $_POST['product_price'],
            'quantity' => $quantidade
        ];
    }
}

// Mostrar o carrinho
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>Loja Emaús</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="index.php">Produtos</a></li>
                <li><a href="cart.php">Carrinho</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="cadastro_produto.php">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Seu Carrinho</h2>
        <div id="cart-items">
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="cart-item">
                    <p><?= $item['name'] ?> - R$ <?= number_format($item['price'], 2, ',', '.') ?> x <?= $item['quantity'] ?></p>
                    <p>Total: R$ <?= number_format($item['price'] * $item['quantity'], 2, ',', '.') ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-total">
            <strong>Total: R$ 
                <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                    echo number_format($total, 2, ',', '.');
                ?>
            </strong>
        </div>

        <button onclick="window.location.href='checkout.php'">Finalizar Compra</button>
    </main>

    <footer>
        <p>&copy; 2024 Loja Cristã | Todos os direitos reservados</p>
    </footer>
    <script src="../js/cart.js"></script>
</body>
</html>
