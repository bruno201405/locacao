<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
    $query = "INSERT INTO tb_produtos(nome_prod, preco_prod, categoria_prod, cod_prod) VALUES('".$_POST["nome_prod"]."','".$_POST["preco_prod"]."','".$_POST["categoria_prod"]."','".$_POST["cod_prod"]."')";
		$result = $db_handle->executeQuery($query);
    if(!$result){
			$message="Erro ao ADICIONAR. Verificar.";
	} else {
		header("Location:TelaControleAdm.php");
	}
}
?>
<link href="CSS/AddEditDelete.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validate() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#nome_prod").val()) {
		$("#nome_prod-info").html("(obrigatório)");
		$("#nome_prod").css('background-color','#rgba(10, 0, 68, 0.466)');
		valid = false;
	}
	if(!$("#preco_prod").val()) {
		$("#preco_prod-info").html("(obrigatório)");
		$("#preco_prod").css('background-color','#rgba(10, 0, 68, 0.466)');
		valid = false;
	}
	if(!$("#categoria_prod").val()) {
		$("#categoria_prod-info").html("(obrigatório)");
		$("categoria_prod").css('background-color','#rgba(10, 0, 68, 0.466)');
		valid = false;
	}
	
	if(!$("#cod_prod").val()) {
		$("#cod_prod-info").html("(obrigatório)");
		$("#cod_prod").css('background-color','#rgba(10, 0, 68, 0.466)');
		valid = false;
	}
	return valid;
}
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="container">
        <div class="UpBar">
		<a href="TelaControleAdm.php" id="back"><i class='far fa-arrow-alt-circle-left' style='font-size:24px; margin-right: 10px;'></i>VOLTAR PARA TELA DE CONTROLE</a>
            <br><img src="YG1.png">
        </div>    

        <div class="form">
			<form name="frmToy" method="post" action="" id="frmToy" onClick="return validate();">
            <h3 id="titulo">Adicione as informações do novo produto</h3>
            <div>
                <label class="title">Produto</label>
                <span id="nome_prod-info" class="info"></span><br/>
                <input type="text" name="nome_prod" id="nome_prod" class="demoInputBox" value="">
            </div>
            <div>
                <label class="title">Preço</label> 
                <span id="preco_prod-info" class="info"></span><br/>
                <input type="text" name="preco_prod" id="preco_prod" class="demoInputBox" value="">
            </div>
            <div>
                <label class="title">Categoria</label> 
                <span id="categoria_prod-info" class="info"></span><br/>
                <input type="text" name="categoria_prod" id="categoria_prod" class="demoInputBox" value="">
            </div>
            <div>
                <label class="title">Código</label>
                <span id="cod_prod-info" class="info"></span><br/>
                <input type="text" name="cod_prod" id="cod_prod" class="demoInputBox" value="">
            </div>
            <div>
                <input class="btnSave" type="submit" name="submit" value="Salvar" />
            </div>
        </div>
</div>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="TelaControleAdm.css">
    <title>Adicionar</title>
</head>
</html>