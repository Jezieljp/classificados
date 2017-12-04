<?php require 'pages/header.php' ?>;
<!--Criando uma verificação se não tiver logado vai para pagina de login-->
<?php
if(empty($_SESSION['clogin'])) {
   ?>
<script type="text/javascript">window.location.href="login.php";</script>
   <?php
   exit;
}
?>

<section class="container">
    <h1>Anúncios</h1>
    
    <a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncios</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <?php 
        require 'classes/anuncios-class.php';        
        $a = new anuncios();
        //Va no arquivo anucios-class.php e crie o metodo getMeusAnucios
        $anuncios = $a->getMeusAnuncios();
        
        foreach ($anuncios as $anuncio):
        ?>
            <tr>
                <td><img src="assets/images/anuncios/<?php echo $anuncio['capa']; ?>" width="80" height="80" border="0" /></td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2) ?></td>
                <td></td>
        </tr>
        <?php  endforeach; ?>
    </table>

</section>
<?php require 'pages/footer.php' ?>;

