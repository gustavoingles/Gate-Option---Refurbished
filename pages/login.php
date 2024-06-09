<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/login.css">
    
    <title>Login • Gate Option</title>
</head>
<body>
    <main>
        <header>
            <img src="../assets/images/gateOption.png   " alt="Logo do projeto e do site">
        </header>
        <form action="testeLogin.php" method="post">
            <div class="container-login">
                
                    <h1>Login</h1>

                    <label>E-mail:</label>
                    <input type="email" name="email">

                    <label>Senha:</label>
                    <input type="password" name="senha">
                    <h3>Ainda não tem uma conta? <a href="cadastro.php" class="link-cds">Clique aqui</a></h3>
                    <a href="" ><input type="submit" value="Login" class="but-login" name="submit"></a>
            </div>
        </form>   
    </main>
</body>
</html>