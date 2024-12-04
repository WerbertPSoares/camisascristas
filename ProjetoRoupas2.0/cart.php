<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Carrinho de Compras</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Loja Emaús - Carrinho</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Carrinho</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
      <!-- Carrinho -->
<section class="cart">
    <h2>Carrinho de Compras</h2>
    <div id="cart-items"></div>
    <div class="cart-total">
        <strong>Total: R$ <span id="cart-total">0.00</span></strong>
    </div>
    <button id="clear-cart">Limpar Carrinho</button>
    <!-- Botão para finalizar a compra -->
    <button id="finalize-purchase">Finalizar Compra</button>
</section>

    </main>

    <footer>
        <p>&copy; 2024 Loja Cristã | Todos os direitos reservados</p>
    </footer>

    <script src="cart.js"></script>

    
</body>
</html>