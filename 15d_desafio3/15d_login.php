<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Perfil de Usuário</title>
</head>

<body>

    <h2>Login</h2>

    <form method="post" action="">

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="cor">Cor de Fundo:</label>
        <input type="color" name="cor" value="#ffffff" required><br>

        <button type="submit">Entrar</button>

    </form>

    <?php

    session_start();

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recebe os valores enviados pelo formulário
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $cor = $_POST['cor'];

        // Dados para conexão com o banco
        $servername = "localhost";
        $username = "root";
        $password = "Senai@118";
        $dbname = "exercicio";

        // Conecta ao MySQL
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta o usuário no banco de dados
        $sql = "SELECT * FROM usuarios
                WHERE usuario = '$usuario' AND senha = '$senha'";

        $result = $conn->query($sql);

        // Verifica se encontrou o usuário
        if ($result->num_rows > 0) {

            $_SESSION['usuario'] = $usuario;
            $_SESSION['cor'] = $cor;

            header("Location: 15d_perfil.php");
            exit();

        } else {

            echo "<p style='color:red;'>Usuário ou senha incorretos.</p>";

        }

        // Fecha a conexão
        $conn->close();
    }

    ?>

</body>
</html>
