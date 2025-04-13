<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_POST["submit"])) {
    $query = "INSERT INTO carros(modelo, marca, ano, placa, precodiaria) 
              VALUES('" . $_POST["modelo"] . "','" . $_POST["marca"] . "','" . $_POST["ano"] . "','" . $_POST["placa"] . "','" . $_POST["precodiaria"] . "')";
    $result = $db_handle->executeQuery($query);
    if (!$result) {
        $message = "Erro ao ADICIONAR. Verificar.";
    } else {
        header("Location:TelaControleAdm.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar</title>
    <link rel="stylesheet" href="TelaControleAdm.css">
    <link href="CSS/AddEditDelete.css" type="text/css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        function validate() {
            var valid = true;
            $(".demoInputBox").css('background-color', '');
            $(".info").html('');

            if (!$("#modelo").val()) {
                $("#info-modelo").html("(obrigatório)");
                $("#modelo").css('background-color', 'rgba(10, 0, 68, 0.1)');
                valid = false;
            }
            if (!$("#marca").val()) {
                $("#info-marca").html("(obrigatório)");
                $("#marca").css('background-color', 'rgba(10, 0, 68, 0.1)');
                valid = false;
            }
            if (!$("#ano").val()) {
                $("#info-ano").html("(obrigatório)");
                $("#ano").css('background-color', 'rgba(10, 0, 68, 0.1)');
                valid = false;
            }
            if (!$("#placa").val()) {
                $("#info-placa").html("(obrigatório)");
                $("#placa").css('background-color', 'rgba(10, 0, 68, 0.1)');
                valid = false;
            }
            if (!$("#precodiaria").val()) {
                $("#info-precodiaria").html("(obrigatório)");
                $("#precodiaria").css('background-color', 'rgba(10, 0, 68, 0.1)');
                valid = false;
            }

            return valid;
        }
    </script>
</head>
<body>
<div class="container">
    <div class="UpBar">
        <a href="TelaControleAdm.php" id="back">
            <i class='far fa-arrow-alt-circle-left' style='font-size:24px; margin-right: 10px;'></i>
            VOLTAR PARA TELA DE CONTROLE
        </a>
        <br><img src="YG1.png" alt="Logo">
    </div>

    <div class="form">
        <form name="frmToy" method="post" action="" id="frmToy" onsubmit="return validate();">
            <h3 id="titulo">Adicione as informações do novo produto</h3>

            <div>
                <label class="title">Modelo</label>
                <span id="info-modelo" class="info"></span><br/>
                <input type="text" name="modelo" id="modelo" class="demoInputBox" value="">
            </div>

            <div>
                <label class="title">Marca</label>
                <span id="info-marca" class="info"></span><br/>
                <input type="text" name="marca" id="marca" class="demoInputBox" value="">
            </div>

            <div>
                <label class="title">Ano</label>
                <span id="info-ano" class="info"></span><br/>
                <input type="text" name="ano" id="ano" class="demoInputBox" value="">
            </div>

            <div>
                <label class="title">Placa</label>
                <span id="info-placa" class="info"></span><br/>
                <input type="text" name="placa" id="placa" class="demoInputBox" value="">
            </div>

            <div>
                <label class="title">Preço Diária</label>
                <span id="info-precodiaria" class="info"></span><br/>
                <input type="text" name="precodiaria" id="precodiaria" class="demoInputBox" value="">
            </div>

            <div>
                <input class="btnSave" type="submit" name="submit" value="Salvar" />
            </div>
        </form>
    </div>
</div>
</body>
</html>