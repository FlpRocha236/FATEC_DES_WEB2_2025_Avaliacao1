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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 20px;
            text-align: center;
        }
        .login-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .login-container img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .login-container input {
            width: calc(100% - 20px);
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #6200ea;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #3700b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="Imagens/2303.w026.n002.3343B.p1.3343.jpg" alt="Imagem de Biblioteca">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p class='error-message'>$erro</p>"; ?>
        <form method="POST">
            <input type="text" name="login" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

