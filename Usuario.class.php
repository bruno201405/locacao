<?php
    class Usuario{
        public function login($CNPJ_usu, $senha_usu){
            global $pdo;

            $sql = "SELECT * FROM tb_usuario WHERE CNPJ_usu = :CNPJ_usu AND senha_usu = :senha_usu";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("CNPJ_usu", $CNPJ_usu);
            $sql->bindValue("senha_usu", MD5($senha_usu));
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();
                
                $_SESSION["idUser"] = $dado['id'];
                return true;
            }else{
                return false;
            }
        }

        public function logged($id){
            global $pdo;
            
            $array = array();

            //$sql = "SELECT nome_usu FROM tb_usuario WHERE id = :id";
            $sql = "SELECT CNPJ_usu FROM tb_usuario WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
                // fetchAll para pegar mais informações do usuário além do nome, só mudar "SELECT nome_usu FROM..." para "SELECT * FROM..."
            }

            return $array;
        }
    }
?>