<!DOCTYPE html>
<html lang="br">
<head>
    <link rel="stylesheet" href="CSS/TelaControleAdm.css">
    <link rel="shortcut icon" href="YG1.png">
    <meta charset="UTF-8">
    <title>Tela de controle</title>
</head>

<body>
<div class="form-content" id="form">
    <?php
	require_once("perpage.php");	
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$id = "";
	$Modelo = "";
	$Marca = "";
    $Ano = "";
	$Placa = "";
	$PrecoDiaria = "";
	$Disponivel = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("Modelo","Marca","Ano", "Placa","PrecoDiaria","Disponivel");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "Modelo":
						$Modelo = $v;
						$queryCondition .= "Modelo LIKE '%" . $v . "%'";
						break;
					case "Marca":
						$Marca = $v;
						$queryCondition .= "Marca LIKE '%" . $v . "%'";
						break;	
                    case "Ano":
                        $Ano = $v;
                        $queryCondition .= "Ano LIKE '%" . $v . "%'";
                        break;
					case "Placa":
						$Placa = $v;
						$queryCondition .= "Placa LIKE '%" . $v . "%'";
						break;
					case "PrecoDiaria":
						$PrecoDiaria = $v;
						$queryCondition .= "PrecoDiaria LIKE '%" . $v . "%'";
						break;
					case "Disponivel":
						$Disponivel = $v;
						$queryCondition .= "Disponivel LIKE '%" . $v . "%'";
						break;	

				}
			}
		}
	}
	$orderby = "ORDER BY id desc"; 
	$sql = "SELECT * FROM carros " . $queryCondition;
	$href = 'TelaControleAdm';					
		
	$perPage = 10; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	$conexao = new PDO("mysql:host=localhost;dbname=locacaocarros;charset=utf8", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


	
	if(!empty($result)) {
		$result["perpage"] = showperpage($href, $sql, $perPage);
	}
?>
    <div id="toys-grid">      
    <h1 id="title">Bem-vindo ao Your Guide</h1>
	<br>
	<p id="title1">Aqui você pode personalizar a experiência do seu consumidor fazendo o manuseio dos produtos cadastrados. Tudo o que estiver cadastrado aqui você poderá ser acessado pela Alexa via comando de voz.</p>
	<br>
			<form name="frmSearch" method="post" action="TelaControleAdm.php" charset="UTF-8">
			<div class="search-box">
			<p>
			<input type="text" placeholder="Modelo" name="search[Modelo]" class="demoInputBox" value="<?php  echo $Modelo; ?>"	/>
            <input type="text" placeholder="Marca" name="search[Marca]" class="demoInputBox" value="<?php echo $Marca; ?>"	/>
            <input type="text" placeholder="Ano" name="search[Ano]" class="demoInputBox" value="<?php echo $Ano; ?>"	/>
			<input type="text" placeholder="Placa" name="search[Placa]" class="demoInputBox" value="<?php echo $Placa; ?>"	/>
			<input type="text" placeholder="PrecoDiaria" name="search[PrecoDiaria]" class="demoInputBox" value="<?php echo $PrecoDiaria; ?>"	/>
			<input type="text" placeholder="Disponivel" name="search[Disponivel]" class="demoInputBox" value="<?php echo $Disponivel; ?>"	/>
            <input type="submit" name="go" class="btnSearch" value="Buscar" id="buscar">
            <input type="reset" class="btnSearch" value="Limpar" onclick="window.location='TelaControleAdm.php'">
			</p>			
			</div>
			<br>
			<br>
			<table cellpadding="10" cellspacing="1">
        <thead>
					<tr>
          
		  <th><strong>Modelo</strong></th>
          <th><strong>Marca</strong></th>          
          <th><strong>Ano</strong></th>
		  <th><strong>Placa</strong></th>
		  <th><strong>PrecoDiaria</strong></th>
		  <th><strong>Disponivel</strong></th>
					
					</tr>
				</thead>
				<tbody>
					<?php
					if(!empty($result)) {
						foreach($result as $k=>$v) {
						  if(is_numeric($k)) {
					?>
          <tr>
					
					<td class="desc"><center><?php echo $result[$k]["Modelo"]; ?></center></td>
                    <td class="desc"><center><?php echo $result[$k]["Marca"]; ?></center></td>
                    <td class="desc"><center><?php echo $result[$k]["Ano"]; ?></center></td>
					<td class="desc"><center><?php echo $result[$k]["Placa"]; ?></center></td>
					<td class="desc"><center><?php echo $result[$k]["PrecoDiaria"]; ?></center></td>
					<td class="desc"><center><?php echo $result[$k]["Disponivel"]; ?></center></td>

					<td>
					<a class="btnEditAction" href="edit.php?id=<?php echo $result[$k]["id"]; ?>">Editar</a>
					<a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $result[$k]["id"]; ?>" onclick="return confirm('Você tem certeza que deseja excluir esse produto?')">Apagar</a>
				    </td>

					</tr>

					<?php
						  }
					   }
                    }
					if(isset($result["perpage"])) {
					?>
					<tr>
					<td colspan="7" align="right"> <?php echo $result["perpage"]; ?></td>
					</tr>
					<?php } ?>
				<tbody>
			</table>
			<br>
			<table>
			<tr>
					<td>
					<a id="btnAddAction" href="add.php">Adicionar um novo veículo</a> 
					</td>
			</tr>
			</table>
			</form>	
</div>
</body>
</html>