<?php require 'pages/header.php'; ?>
<section class="container">
    <h1>Login</h1>
    
    <?php //criando uma verificação dos campos e criando uma alert
    require 'classes/usuarios.php';
    $u = new usuarios();   
    if(isset($_POST['email']) && !empty($_POST['email'])) {
       $email = addslashes($_POST['email']);
       $senha = $_POST['senha'];
       
       //Agora va no arquivo usuario.php e crie o metodo login       
       if($u->login($email, $senha)){
          ?>
           <script type="text/javascript">window.location.href="./";</script>
         <?php
       } else {
          ?>
              <div class="alert alert-danger">
             Usuarios e / ou Senha erradas!
             </div>          
          <?php
       }
    }
    ?>  
   
    <form method="POST">
         <div class="form-group">
            <label for="email">*E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>

        <div class="form-group">
            <label for="senha">*Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" />
        </div>
       
        <input type="submit" value="Fazer Login" class="btn btn-primary" style="width: 150px;"/>

    </form>
</section>

<?php require 'pages/footer.php'; ?>