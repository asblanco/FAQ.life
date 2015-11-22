<!-- app/View/Usuarios/registro.ctp -->
<!DOCTYPE html>
<html lang="en">    
    <body>
      <!-- Barra de navegacion -->
      <nav class="head navigation-text col-xs-12 col-sm-12 col-md-12">
          <!-- div con el titulo y el icono en modo movil -->
          <div class="col-md-2 navbar-header page-scroll">
              <button type="button" class="navbar-toggle2 button-menu" data-toggle="collapse" data-target="#navbar-collapse1">
                  <span class="text-menu-toggle osSansFont-menu">Menu</span>
              </button>
              <a class="navbar-logo pacificoFont-menu" href="../preguntas/index">FAQ.life</a>
          </div>
          <!-- div con la lista de navegacion -->
          <div class="col-md-10 collapse navbar-collapse navbar-right" id="navbar-collapse1">
              <ul class="nav navbar-nav navbar-right osSansFont">
                  <li> <!-- Search box --> 
                    <form class="navbar-form" role="search">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Buscar"/>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                  </li>
                  <li><a href="categorias.html">Categorias</a></li>
                  <li><a href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
              </ul>
          </div>
      </nav>
        
      <!-- Contenido Principal -->
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row"><p></p></div> <!-- div superior de separacion -->
          <div class="col-sm-2 col-md-2 hidden-phone"></div>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <form>
                <div class="form-group">
                <?php echo $this->Form->create('Usuario'); ?>
                    <fieldset>
                        <legend><?php echo __('Registrarse'); ?></legend>
                        <?php echo $this->Form->input('username', array('class' => 'form-control'));
                        echo $this->Form->input('password', array('class' => 'form-control'));
                        echo $this->Form->input('nombre', array('class' => 'form-control')); ?>
                    </fieldset>
                <?php echo $this->Form->end('Submit'); ?>
                </div>
                </form>
          </div>
          <div class="col-sm-2 col-md-2 hidden-phone"></div>
      </div>
    </body>
</html>