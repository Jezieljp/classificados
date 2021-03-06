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
   
   //editandos do banco 
   public function getAnuncio($id) {
      $array = array();
      global $pdo;
      
      $sql = $pdo->prepare("SELECT * FROM anuncios WHERE id = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();
      
      if($sql->rowCount() > 0) {
         $array = $sql->fetch();
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
   public function excluirAnuncio($id) {
      global $pdo;
      
      //deletando as imagens
      $sql = $pdo->prepare("DELETE FROM anuncios-images WHERE id_anuncio = :id_anuncio");
      $sql->bindValue(":id_anuncio", $id);
      $sql->execute();
      
      //deletando todos os campos
      $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();
   }

}

