<?php
session_start();

// Verifica se é o login da biblioteca
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'biblio') {
    header('Location: login.php');
    exit();
}

$pedidos = file_exists('pedidos.txt') ? file('pedidos.txt', FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
</head>
<body>
    <h2>Lista de Pedidos</h2>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>ISBN</th>
        </tr>
        <?php foreach ($pedidos as $pedido): ?>
            <?php $dados = explode('|', $pedido); ?>
            <tr>
                <td><?php echo $dados[0]; ?></td>
                <td><?php echo $dados[1]; ?></td>
                <td><?php echo $dados[2]; ?></td>
                <td><?php echo $dados[3]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="dashboard.php">Voltar ao Dashboard</a>
</body>
</html>
