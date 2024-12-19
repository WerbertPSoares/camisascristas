<?php
session_start();

// Verifica se o carrinho está vazio
if (empty($_SESSION['cart'])) {
    echo "Seu carrinho está vazio!";
    exit;
}

// Aqui você pode adicionar a lógica para salvar o pedido no banco de dados
// ou integrar com uma API de pagamento.

unset($_SESSION['cart']); // Limpa o carrinho após a finalização
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra Finalizada</title>
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
        <h2>Obrigado por comprar conosco!</h2>
        <p>Seu pedido foi processado com sucesso.</p>
    </main>

    <footer>
        <p>&copy; 2024 Loja Cristã | Todos os direitos reservados</p>
    </footer>
</body>
</html>
