<?php
// editar_produto.php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter o produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $produto = $resultado->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualiza o produto
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $descricao, $preco, $id);

    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto: " . $stmt->error;
    }
    $stmt->close();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja Emaús</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Certifique-se de que o caminho está correto -->
</head>
<!-- Formulário para editar -->
<form action="editar_produto.php?id=<?php echo $produto['id']; ?>" method="POST">
    <label for="nome">Nome do Produto:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" required><?php echo $produto['descricao']; ?></textarea>

    <label for="preco">Preço:</label>
    <input type="text" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" required>

    <button type="submit">Atualizar Produto</button>
</form>
