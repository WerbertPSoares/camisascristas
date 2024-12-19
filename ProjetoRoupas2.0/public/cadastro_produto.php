<?php
// Incluindo a conexão com o banco de dados
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Valida se os campos estão preenchidos
    if (empty($nome) || empty($descricao) || empty($preco)) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        // Prepara a consulta SQL para inserir o produto
        $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)";
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros com bindValue() ou bindParam()
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':preco', $preco, PDO::PARAM_STR); // Usando PDO::PARAM_STR para preços

        // Executa a consulta e verifica se o produto foi inserido com sucesso
        if ($stmt->execute()) {
            $sucesso = "Produto cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar produto: " . $stmt->errorInfo()[2];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produto</h1>

        <!-- Exibe mensagens de erro ou sucesso -->
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($sucesso)): ?>
            <div class="alert alert-success">
                <?php echo $sucesso; ?>
            </div>
        <?php endif; ?>
        
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

        <!-- Formulário de cadastro -->
        <form action="cadastro_produto.php" method="POST">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

            <button type="submit">Cadastrar Produto</button>
        </form>

        <br>
        <a href="index.php">Voltar para a lista de produtos</a>
    </div>
</body>
</html>
