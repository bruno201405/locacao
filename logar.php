<?PHP
echo "inicio";
    if(isset($_POST['CNPJ_usu']) && !empty($_POST['CNPJ_usu']) && isset($_POST['senha_usu']) && !empty($_POST['senha_usu'])){

        require 'conexao.php';
        require 'Usuario.class.php';
        $u = new Usuario;

        $CNPJ_usu = addslashes($_POST['CNPJ_usu']);
        $senha_usu = addslashes($_POST['senha_usu']);

        if($u->login($CNPJ_usu, $senha_usu) == true){
            if(isset($_SESSION['idUser'])){
                header("Location: TelaControleAdm.php");
            }else{
                header("Location: LoginAdm.php");
            }
        }else{
            header("Location: LoginAdm.php");
        }
    }else{
        header("Location: LoginAdm.php");
    }

?>