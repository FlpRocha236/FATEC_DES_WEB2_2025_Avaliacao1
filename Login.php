<?php
session_start();

// Verifica o formulário 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Usuarios fixos
    $usuarios = [
        'professor' => 'professor',
        'biblio' => 'biblio'
    ];

    // Verifica login e senha
    if (isset($usuarios[$login]) && $usuarios[$login] === $senha) {
        $_SESSION['usuario'] = $login;
        header('Location: dashboard.php');
        exit();
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        <label for="login">Usuário:</label>
        <input type="text" name="login" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
