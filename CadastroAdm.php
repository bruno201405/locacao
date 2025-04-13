<!DOCTYPE html>
<html lang="br">
<head>
    <link rel="stylesheet" href="CSS/CadastroAdm.css">
    <link rel="shortcut icon" href="YG1.png">
    <meta charset="UTF-8">
    <title>Cadastro Adm</title>
</head>
<body>

<script type="text/javascript">
    // Função para verificar os dados antes de  
    function validaCampos(){
        // Condição para comparar as senhas inseridas
        if(document.getElementById('senha_usu').value != document.getElementById('senha2_usu').value){
            alert('Por favor, as senha não coincidem, redigite-as');
            document.getElementById('senha_usu').focus();
            return false;
        }
    }
</script>
<form id="form" action="cadastrar.php" method="post" onsubmit="return validaCampos();">
    <table>
            <td><img src="YG1.png" id="logo"></td>
            <td id="quadro">
                <label id="title">Cadastro</label><br>
                <br>
                <label  id="title">Administrador</label>
                <br>
                <br>
                <input id="empresa_usu" class="campotexto" type="text" name="empresa_usu" placeholder="Empresa" required>
                <input id="CNPJ_usu" class="campotexto" type="text" name="CNPJ_usu" placeholder="CNPJ" required>
                <br>
                <br>
                <input id="telefone_usu" class="campotexto" type="text" name="telefone_usu" placeholder="Telefone" required>
                <input id="email_usu" class="campotexto" type="email" name="email_usu" placeholder="E-mail" required>
                <br>
                <br>
                <input id="senha_usu" class="campotexto" type="password" name="senha_usu" placeholder="Senha" required>
                <input id="senha2_usu" class="campotexto" type="password" name="senha2_usu"placeholder="Confirmar senha"required>  
                <br>
                <br>            
                <button class="btn2 btn-white2 btn-animate2" id="cadastrar">Cadastrar</button>
                <a href="LoginAdm.php" class="btn btn-white btn-animate" id="voltar">Voltar</a>
                </td> 
    </table>
</form>
</body>
</html>