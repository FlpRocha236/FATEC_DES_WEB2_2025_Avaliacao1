<?php
session_start();

// Finaliza a sessão e retorna a tela inicial
session_destroy();
header('Location: login.php');
exit();