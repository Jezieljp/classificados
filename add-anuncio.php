<?php require 'pages/header.php'; ?>

<?php
if (empty($_SESSION['clogin'])) {
   ?>
   <script type="text/javascript">window.location.href = "login.php";</script>
   <?php
   exit;
}

require 'classes/anuncios-class.php';
$a = new anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
 
   $titulo = addslashes($_POST['titulo']);   
   $categoria = addslashes($_POST['categoria']);   
   $descricao = addslashes($_POST['descricao']);   
   $valor = addslashes($_POST['valor']);   
   $estado = addslashes($_POST['estado']);
   
   //crie no arquivo add-anuncios.php o metodo addAnuncios
   $a->addAnuncios($titulo, $categoria, $valor, $descricao, $estado);
   ?>
   <div class="alert alert-success">
          Produto Adicionado Com Sucesso!
   </div>
      
   <?php
   }

?>
<!--cirando o arquivo para adicionar anuncios-->
<section class="container">
    <h1> Adicionar Anúncios</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group"><label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                //Pegando os dados do banco e jogando no select do formulario
                require 'classes/adicionar-class.php';

                $a = new adicionar();
                $adds = $a->getaddLista();
                foreach ($adds as $add):
                   ?>
                   <option value="<?php echo $add['id']; ?>"><?php echo utf8_encode($add['nome']); ?></option>
                   <?php
                endforeach;
                ?>
            </select>            
        </div>

        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" />

        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" />                               
        </div>

        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <textarea class="form-control" name="descricao"></textarea>                               
        </div>

        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Otimo</option>
            </select>                              
        </div>
        
       

        <input type="submit" value="Adicionar" class="btn btn-primary" />
    </form>

</section>

<?php require 'pages/footer.php'; ?>

