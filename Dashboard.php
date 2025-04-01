<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #6200ea;
            color: #ffffff;
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
        <h2>Bem-vindo, <?php echo ucfirst($usuario); ?>!</h2>
        
        <?php if ($usuario === 'biblio'): ?>
            <a href="cadastro_livros.php">Cadastrar Livros</a>
            <a href="listar_pedidos.php">Visualizar Pedidos</a>
        <?php endif; ?>
        
        <?php if ($usuario === 'professor'): ?>
            <a href="cadastro_pedidos.php">Fazer Recomendação de Livro</a>
        <?php endif; ?>
        
        <a href="listar_livros.php">Visualizar Livros</a>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
