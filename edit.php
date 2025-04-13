<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_POST["submit"])) {
    $query = "UPDATE carros SET 
                modelo = '" . $_POST["modelo"] . "', 
                marca = '" . $_POST["marca"] . "', 
                ano = '" . $_POST["ano"] . "', 
                placa = '" . $_POST["placa"] . "', 
                categoria = '" . $_POST["categoria"] . "' 
              WHERE id = " . $_GET["id"];
    
    $result = $db_handle->executeQuery($query);
    
    if (!$result) {
        $message = "Erro ao EDITAR. Verificar.";
    } else {
        header("Location: TelaControleAdm.php");
    }
}

$result = $db_handle->runQuery("SELECT * FROM carros WHERE id='" . $_GET["id"] . "'");
?>

<link href="CSS/AddEditDelete.css" type="text/css" rel="stylesheet" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<div class="container">
    <div class="UpBar">
        <a href="TelaControleAdm.php" id="back">
            <i class='far fa-arrow-alt-circle-left' style='font-size:24px; margin-right: 10px;'></i>
            VOLTAR PARA TELA DE CONTROLE
        </a>
        <br><img src="YG1.png">
    </div>    

    <div class="form">
        <form name="frmCarros" method="post" action="" id="frmCarros">
            <h3 id="titulo">Edite as informações do carro</h3>
            
            <div>
                <label class="title">Modelo</label>
                <input type="text" name="modelo" class="demoInputBox" value="<?php echo $result[0]["modelo"]; ?>">
            </div>
            
            <div>
                <label class="title">Marca</label>
                <input type="text" name="marca" class="demoInputBox" value="<?php echo $result[0]["marca"]; ?>">
            </div>
            
