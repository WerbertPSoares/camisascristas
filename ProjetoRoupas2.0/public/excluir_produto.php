<?php
// excluir_produto.php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir produto do banco de dados
    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir produto: " . $stmt->error;
    }
    $stmt->close();
}
?>
