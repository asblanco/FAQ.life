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
        <?php echo $this->Html->css(array('main','fonts')); ?>
    </head>

    <body>
        <?php
        echo $this->Flash->render();
        if ($this->here == '/FAQ.life/'){ ?>
            <header class="head-index">
                <!-- Barra de navegacion -->
                <nav class="navigation-text col-xs-12 col-sm-12 col-md-12">
                    <!-- div con el titulo y el icono en modo movil -->
                    <div class="col-md-2 navbar-header page-scroll ">
                        <button type="button" class="navbar-toggle2 button-menu" data-toggle="collapse" data-target="#navbar-collapse1">
                            <span class="text-menu-toggle osSansFont-menu">Menu</span>
                        </button>
                        <?php
                            echo $this->Html->link("FAQ.life", array("controller"=>"preguntas", "action"=>"index"), array("class"=>"navbar-logo pacificoFont-menu"));
                        ?>
                    </div>

                    <!-- div con la lista de navegacion -->
                    <div class="col-md-10 collapse navbar-collapse navbar-right" id="navbar-collapse1">
                        <ul class="nav navbar-nav navbar-right osSansFont">
                            <li><a><?php if($loggedUser['username']) echo "Hola, ".$loggedUser["username"]." :)"; ?></a></li>
                            <li> <!-- Search box -->
                                <!-- <form class="navbar-form" role="search"> -->
                                <?php echo $this->Form->create('Buscar', array("controller"=>"preguntas", "action"=>"buscar", 'class' => 'navbar-form', 'role' => 'search')); ?>
                                    <div class="form-group has-feedback">
                                        <!-- <input type="text" class="form-control" placeholder="Buscar"/> -->
                                        <?php echo $this->Form->input('search', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Buscar', 'label' => false));?>
                                        <!-- <span class="glyphicon glyphicon-search form-control-feedback"></span> -->
                                    </div>
                                <?php echo $this->Form->end(); ?>
                            </li>
                            <li><a href="categorias.html">Categorias</a></li>
                            <?php if($this->Session->check('Auth.User')){ ?>
                            <li><?php
                                echo $this->Html->link("Logout", array("controller"=>"usuarios", "action"=>"logout"));
                            ?></li>
                            <?php }else { ?>
                                <li><a href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>

                <!-- div con la frase de la pagina -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                  <div class="index-phrase opSansBFontTitle">Pregunta!</div>
                  <hr class="small">
                </div>
            </header>
        <?php } else { ?>
            <!-- Barra de navegacion -->
            <nav class="head navigation-text col-xs-12 col-sm-12 col-md-12">
              <!-- div con el titulo y el icono en modo movil -->
              <div class="col-md-2 navbar-header page-scroll">
                  <button type="button" class="navbar-toggle2 button-menu" data-toggle="collapse" data-target="#navbar-collapse1">
                      <span class="text-menu-toggle osSansFont-menu">Menu</span>
                  </button>
                  <?php
                    echo $this->Html->link("FAQ.life", array("controller"=>"preguntas", "action"=>"index"), array("class"=>"navbar-logo pacificoFont-menu"));
                  ?>
              </div>
              <!-- div con la lista de navegacion -->
              <div class="col-md-10 collapse navbar-collapse navbar-right" id="navbar-collapse1">
                  <ul class="nav navbar-nav navbar-right osSansFont">
                      <li><a><?php if($loggedUser['username']) echo "Hola, ".$loggedUser["username"]." :)"; ?></a></li>
                      <li> <!-- Search box -->
                          <!-- <form class="navbar-form" role="search"> -->
                          <?php echo $this->Form->create('Buscar', array("controller"=>"preguntas", "action"=>"buscar", 'class' => 'navbar-form', 'role' => 'search')); ?>
                              <div class="form-group has-feedback">
                                  <!-- <input type="text" class="form-control" placeholder="Buscar"/> -->
                                  <?php echo $this->Form->input('search', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Buscar', 'label' => false));?>
                                  <!-- <span class="glyphicon glyphicon-search form-control-feedback"></span> -->
                              </div>
                          <?php echo $this->Form->end(); ?>
                      </li>
                      <li><a href="categorias.html">Categorias</a></li>
                      <?php if($this->Session->check('Auth.User')){ ?>
                      <li><?php
                          echo $this->Html->link("Logout", array("controller"=>"usuarios", "action"=>"logout"));
                      ?></li>
                      <?php }else { ?>
                          <li><a href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
                      <?php } ?>
                  </ul>
              </div>
            </nav>
        <?php }

        echo $this->fetch('content'); ?>
    </body>

    <!-- Footer -->
    <footer class="col-xs-12 col-sm-12 col-md-12">
        <hr class="small">
        <p class="footer-autores">Copyright &copy; FAQ.life 2015 - Borxa Mendez Candeias &amp; Andrea Sanchez Blanco</p>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <!-- Bootstrap JavaScript -->
    <?php echo $this->Html->script('bootstrap.min'); ?>

    <!-- Login Modal Page -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                        echo $this->Html->link("Registrarse", array("controller"=>"usuarios", "action"=>"index"), array("class"=>"btn btn-register"));
                    ?>

                    <h4 class="modal-title osSansFont" id="myModalLabel">Log in</h4>
                </div>

                <!-- Contenido de la página login modal -->
                    <div class="modal-body">
                            <?php echo $this->Flash->render('auth'); ?>
                            <?php echo $this->Form->create('Usuario', array("controller"=>"usuarios", "action"=>"login")); ?>
                                <fieldset>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <?php echo $this->Form->input('username', array('class' => 'form-control'));?>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <?php echo $this->Form->input('password', array('class' => 'form-control'));?>
                                        </div>
                                    </div>
                                </fieldset>
                    </div>

                    <div class="modal-footer">
                        <?php echo $this->Form->submit('Iniciar sesion', array('class' => 'btn-login')); ?> <!-- ,  'title' => 'Click here to add the user' -->
                        <!-- <div type="button" class="btn btn-default" data-dismiss="modal">Cancelar</div> -->
                        <?php echo $this->Form->submit('Cancelar', array('class' => 'btn btn-default btn-cancel', 'data-dismiss' => 'modal')); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>

            </div>
        </div>
    </div>

    <?php //$loggedUser["username"]?>
</html>
