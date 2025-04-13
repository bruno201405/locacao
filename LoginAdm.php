<!DOCTYPE html>
<html lang="br">
<head>
    <link rel="stylesheet" href="CSS/LoginAdm.css">
    <link rel="shortcut icon" href="YG1.png">
    <meta charset="UTF-8">
    <title>Login Adm</title>
</head>

<body>
<form method="post" action="logar.php">
    <table>
        <tr>
            <td><img src="YG1.png" id="logo"></td>
            <td id="quadro">
                Login
                <br>
                <br>
                Administrador
                <br>
                <br>
                <input class="campotexto" type="text" name="CNPJ_usu" placeholder="CNPJ" required>
                <br>
                <br>
                <input class="campotexto"type="password" name="senha_usu" placeholder="Senha" required>
                <br>
                <br>
                 <button class="btn2 btn-white2 btn-animate2">Entrar</button>
                 <br>
                 <br>
                 <a id="cadastre-se" href="CadastroAdm.php">Cadastre-se</a>
            </td>
        </tr>
    </table>    
</form>
</body>
</html>