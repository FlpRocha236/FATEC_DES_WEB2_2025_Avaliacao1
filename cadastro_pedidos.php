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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
        }
        .container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 15px;
            font-weight: bold;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
        form {
            text-align: left;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }
        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #6200ea;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #3700b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6200ea;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        a:hover {
            background-color: #3700b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Fazer Recomendação de Livro</h2>
        <?php if (isset($mensagem)) echo "<p class='message success'>$mensagem</p>"; ?>
        <?php if (isset($erro)) echo "<p class='message error'>$erro</p>"; ?>
        <form method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" required>
            <label for="editora">Editora:</label>
            <input type="text" name="editora" required>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" required>
            <button type="submit">Cadastrar Pedido</button>
        </form>
        <a href="dashboard.php">Voltar ao Dashboard</a>
    </div>
</body>
</html>
