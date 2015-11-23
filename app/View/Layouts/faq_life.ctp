<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mobile first -->
        <meta name="author" content="Borxa Mendez Candeias &amp; Andrea Sanchez Blanco">

        <title>FAQ.life</title> <!-- Titulo de la pestaña -->
        <?php echo $this->Html->meta('icon');?> <!-- Icono de la pestaña -->

        <!-- Bootstrap CSS-->
        <?php echo $this->Html->css('bootstrap.min'); ?>

        <!-- Custom CSS -->
        <?php echo $this->Html->css('main');
         echo $this->Html->css('fonts'); ?>
    </head>

    <div id="content">
        <?php echo $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>

    <!-- Footer -->
    <footer class="col-xs-12 col-sm-12 col-md-12">
        <hr class="small">
        <p class="footer-autores">Copyright &copy; FAQ.life 2015 - Borxa Mendez Candeias &amp; Andrea Sanchez Blanco</p>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <!-- Bootstrap JavaScript -->
    <?php echo $this->Html->script('bootstrap.min'); ?>

</html>