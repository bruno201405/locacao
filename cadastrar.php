<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro efetivado!!</title>
</head>

<body>
    
</body>
</html>

<?php
    include('conexao.php');

    $empresa_usu     = ucwords($_POST['empresa_usu']);
    $CNPJ_usu      = $_POST['CNPJ_usu'];
    $telefone_usu = $_POST['telefone_usu'];
    $email_usu    = $_POST['email_usu'];
    $senha_usu    = MD5($_POST['senha_usu']);

    $sql = $pdo->query("SELECT * FROM tb_usuario WHERE CNPJ_usu = '".$_POST['CNPJ_usu']."'");
    $count = $sql->rowCount();

    if($count>=1){
      ?>
      <script type="text/javascript">
        alert("CNPJ já cadastrado!!");
        history.go(-1);
      </script>
      <?php
    } else{
      $sql = $pdo->query("INSERT INTO tb_usuario (empresa_usu, CNPJ_usu, telefone_usu, email_usu, senha_usu) values ('$empresa_usu', '$CNPJ_usu', '$telefone_usu', '$email_usu', '$senha_usu')");
      header("Location: LoginAdm.php");
    }
?>
