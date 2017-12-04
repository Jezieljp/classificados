<?php require 'pages/header.php'; ?>
<section class="container">
    <h1>Cadastre-se</h1>
    
    <?php //criando uma verificação dos campos e criando uma alert
    require 'classes/usuarios.php';
    $u = new usuarios();//agora va no arquivo usuarios e crie o metodo cadastrar
    
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
       $nome = addslashes($_POST['nome']);
       $email = addslashes($_POST['email']);
       $senha = $_POST['senha'];
       $telefone = addslashes($_POST['telefone']);
      
       if (!empty($nome) && !empty($email) && !empty($senha)) {
          if ($u->cadastrar($nome, $email, $senha, $telefone)) {//verificando o cadastro de um usuario e dando uma mensagem
             ?>
             <div class="alert alert-warning">
                 <h3> Cadastrado Com Sucesso!<a href="login.php" class="alert-login">Faça Login</a></h3>
            </div>                      
             <?php
          } else {
              ?>
             <div class="alert alert-warning">
                 <h3> Usuarios Existente!</h3><a href="login.php" class="alert-link">Faça login</a>
            </div>                      
             <?php
             
          }//fim do alert de casdatro
       } else {
         ?>
          <div class="alert alert-warning">
                  <h3> Todos Obrigatórios!<a href="login.php" class="alert-login">Faça Login</a></h3>
          </div>    
          <?php
       }
    }
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="nome"> <span style="color: red">*</span>Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" />
        </div>

        <div class="form-group">
            <label for="email">*E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>

        <div class="form-group">
            <label for="senha">*Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" />
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" />
        </div>
        <input type="submit" value="cadastra" class="btn btn-primary" style="width: 150px;"/>

    </form>
</section>

<?php require 'pages/footer.php'; ?>
