<?php
session_start();

// Verifica o usuario professor
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'professor') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $editora = $_POST['editora'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    
    if ($titulo && $autor && $editora && $isbn) {
        $linha = "$titulo|$autor|$editora|$isbn" . PHP_EOL;
        file_put_contents('pedidos.txt', $linha, FILE_APPEND);
        $mensagem = "Pedido cadastrado com sucesso!";
    } else {
        $erro = "Todos os campos são obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Recomendação de Livro</title>
</head>
<body>
    <h2>Fazer Recomendação de Livro</h2>
    <?php if (isset($mensagem)) echo "<p style='color:green;'>$mensagem</p>"; ?>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" required><br>
        <label for="editora">Editora:</label>
        <input type="text" name="editora" required><br>
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" required><br>
        <button type="submit">Cadastrar Pedido</button>
    </form>
    <br>
    <a href="dashboard.php">Voltar ao Dashboard</a>
</body>
</html>
