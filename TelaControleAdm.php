<?php
require_once("perpage.php");	
require_once("dbcontroller.php");
$db_handle = new DBController();

// Inicialização das variáveis
$id = "";
$modelo = "";
$marca = "";
$ano = "";
$placa = "";
$precodiaria = "";
$disponivel = "";

// Montagem da consulta de pesquisa
$queryCondition = "";
if (isset($_POST["search"]) && is_array($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (!empty($v)) {
            $queryCases = array("modelo", "marca", "ano", "placa", "precodiaria", "disponivel");
            if (in_array($k, $queryCases)) {
                if (!empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "modelo":
                    $modelo = $v;
                    $queryCondition .= "Modelo LIKE '%" . $v . "%'";
                    break;
                case "marca":
                    $marca = $v;
                    $queryCondition .= "Marca LIKE '%" . $v . "%'";
                    break;
                case "ano":
                    $ano = $v;
                    $queryCondition .= "Ano LIKE '%" . $v . "%'";
                    break;
                case "placa":
                    $placa = $v;
                    $queryCondition .= "Placa LIKE '%" . $v . "%'";
                    break;
                case "precodiaria":
                    $precoDiaria = $v;
                    $queryCondition .= "PrecoDiaria LIKE '%" . $v . "%'";
                    break;
                case "disponivel":
                    $disponivel = $v;
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
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0) $start = 0;
$query = $sql . $orderby . " limit " . $start . "," . $perPage; 
$result = $db_handle->runQuery($query);

$conexao = new PDO("mysql:host=localhost;dbname=locacaocarros;charset=utf8", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($result)) {
    $result["perpage"] = showperpage($href, $sql, $perPage);
}
?>

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
    <div id="toys-grid">      
        <h1 id="title">Bem-vindo ao Your Guide</h1>
        <br>
        <p id="title1">Aqui você pode personalizar a experiência do seu consumidor fazendo o manuseio dos produtos cadastrados. Tudo o que estiver cadastrado aqui poderá ser acessado pela Alexa via comando de voz.</p>
        <br>
        <form name="frmSearch" method="post" action="TelaControleAdm.php" charset="UTF-8">
            <div class="search-box">
                <p>
                    <input type="text" placeholder="Modelo" name="search[modelo]" class="demoInputBox" value="<?php echo htmlspecialchars($modelo); ?>" />
                    <input type="text" placeholder="Marca" name="search[marca]" class="demoInputBox" value="<?php echo htmlspecialchars($marca); ?>" />
                    <input type="text" placeholder="Ano" name="search[ano]" class="demoInputBox" value="<?php echo htmlspecialchars($ano); ?>" />
                    <input type="text" placeholder="Placa" name="search[Ppaca]" class="demoInputBox" value="<?php echo htmlspecialchars($placa); ?>" />
                    <input type="text" placeholder="PrecoDiaria" name="search[precodiaria]" class="demoInputBox" value="<?php echo htmlspecialchars($precodiaria); ?>" />
                    <input type="text" placeholder="Disponivel" name="search[disponivel]" class="demoInputBox" value="<?php echo htmlspecialchars($disponivel); ?>" />
                    <input type="submit" name="go" class="btnSearch" value="Buscar" id="buscar">
                    <input type="reset" class="btnSearch" value="Limpar" onclick="window.location='TelaControleAdm.php'">
                </p>			
            </div>
            <br><br>
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
                if (!empty($result)) {
                    foreach ($result as $k => $v) {
                        if (is_numeric($k)) {
                ?>
                    <tr>
                        <td class="desc"><center><?php echo htmlspecialchars($v["modelo"]); ?></center></td>
                        <td class="desc"><center><?php echo htmlspecialchars($v["marca"]); ?></center></td>
                        <td class="desc"><center><?php echo htmlspecialchars($v["ano"]); ?></center></td>
                        <td class="desc"><center><?php echo htmlspecialchars($v["placa"]); ?></center></td>
                        <td class="desc"><center><?php echo htmlspecialchars($v["precodiaria"]); ?></center></td>
                        <td class="desc"><center><?php echo htmlspecialchars($v["disponivel"]); ?></center></td>
                        <td>
                            <a class="btnEditAction" href="edit.php?id=<?php echo $v["id"]; ?>">Editar</a>
                            <a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $v["id"]; ?>" onclick="return confirm('Você tem certeza que deseja excluir esse produto?')">Apagar</a>
                        </td>
                    </tr>
                <?php
                        }
                    }
                }
                if (isset($result["perpage"])) {
                ?>
                    <tr>
                        <td colspan="7" align="right"> <?php echo $result["perpage"]; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
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
</div>
</body>
</html>