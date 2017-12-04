<?php
class anuncios{
   
   public function getMeusAnuncios() {
      global $pdo;
      
      $array = array();
     
      $sql = $pdo->prepare("SELECT * FROM anuncios WHERE id_usuario = :id_usuario");
      $sql->bindValue(":id_usuario", $_SESSION['clogin']);
      $sql->execute();
      
      
      if($sql->rowCount() > 0) {
         $array = $sql->fetchAll();
         
      }
      
      return $array;
   }
   public function addAnuncios($titulo, $categoria, $valor, $descricao, $estado){
      global $pdo;
      
      $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
      $sql->bindValue(":titulo", $titulo);
      $sql->bindValue(":id_categoria", $categoria);
      $sql->bindValue(":id_usuario", $_SESSION['clogin']); 
      $sql->bindValue(":descricao", $descricao);
      $sql->bindValue(":valor", $valor);
      $sql->bindValue(":estado", $estado);
      $sql->execute();
   }

}

