<?php 

    
    if (isset($_POST['submit'])){
        
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $dataNas = $_POST['dataNas'];

        $result = mysqli_query($conexao, "INSERT INTO dados(nome,email,senha,data_nas) VALUES ('$nome', '$email', '$senha', '$dataNas')");

        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/cadastro.css">

    <title>Cadastre-se agora mesmo</title>
</head>
<body>
    <main>
        <header>
            <img src="../assets/images/gateOption.png" alt="Logo do projeto e do site">
        </header>
        <form action="cadastro.php" method="post">
            <div class="container-inputs">
                
                    <h1>Crie agora mesmo sua conta!</h1>
                    <label class="nome">Nome:</label>
                    <input type="text" class="inputs1" name="nome">

                    <label class="nome">E-mail:</label>
                    <input type="email" class="inputs1" name="email">

                    <label class="nome">Senha:</label>
                    <input type="password" class="inputs1" name="senha">

                    <label class="nome">Data de Nascimento:</label>
                    <input type="date" name="dataNas" id="data">
                    <h3>Você já tem cadastro? <a href="login.php">Clique aqui</a></h3>
                    <input type="submit" name="submit" value="Entrar" class="but-entrar">
            </div>
        </form>    
    </main>
</body>
</html>