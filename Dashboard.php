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
</head>
<body>
    <h2>Bem-vindo, <?php echo ucfirst($usuario); ?>!</h2>
    
    <?php if ($usuario === 'biblio'): ?>
        <a href="cadastro_livros.php">Cadastrar Livros</a><br>
        <a href="listar_pedidos.php">Visualizar Pedidos</a><br>
    <?php endif; ?>
    
    <?php if ($usuario === 'professor'): ?>
        <a href="cadastro_pedidos.php">Fazer Recomendação de Livro</a><br>
    <?php endif; ?>
    
    <a href="listar_livros.php">Visualizar Livros</a><br>
    <a href="logout.php">Sair</a>
</body>
</html>
