<?php
class usuarios{
   
   public function cadastrar($nome, $email, $senha, $telefone) {
      
      global $pdo;
      // pega o usuario do banco da dados pela id.
      $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");//CADASTRANDO UM USUARIOS NO BANCO
      $sql->bindValue(":email", $email);
      $sql->execute();
      
      // se obteve resultados de busca do id do usuario , performa cadastro no sistema.
      if(!$sql->rowCount() > 0) {
         $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
         $sql->bindValue(":nome", $nome);
         $sql->bindValue(":email", $email);
         $sql->bindValue(":senha", md5($senha));
         $sql->bindValue(":telefone", $telefone);
         $sql->execute();
         
         return true;
      } else{
         return false;
      }
   }
   //criando metodo de login 
   public function login($email, $senha) {
      global $pdo;
      
      $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
      $sql->bindValue(":email", $email);
      $sql->bindValue(":senha", md5($senha));
      $sql->execute();
      
      if($sql->rowCount() > 0) {
         $dado = $sql->fetch();
         $_SESSION['clogin'] = $dado['id'];
         return true;
      } else {
         return false;
      }
   }
}
?>