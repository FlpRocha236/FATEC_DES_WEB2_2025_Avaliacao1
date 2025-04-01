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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .table-container {
            margin: 0 auto;
            width: 90%;
            max-width: 800px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }
        table th {
            background-color: #6200ea;
            color: #ffffff;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
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
    <h2>Lista de Pedidos</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>ISBN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <?php $dados = explode('|', $pedido); ?>
                    <tr>
                        <td><?php echo $dados[0]; ?></td>
                        <td><?php echo $dados[1]; ?></td>
                        <td><?php echo $dados[2]; ?></td>
                        <td><?php echo $dados[3]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="dashboard.php">Voltar ao Dashboard</a>
</body>
</html>
