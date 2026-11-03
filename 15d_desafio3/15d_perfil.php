
<?php

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário</title>
</head>

<body style="background-color: <?php echo htmlspecialchars($_SESSION['cor']); ?>;">

    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>

    <p>Esta é sua página de perfil.</p>

    <p>Você está logado no sistema.</p>

    <a href="15d_logout.php">Sair do sistema</a>

</body>
</html>
