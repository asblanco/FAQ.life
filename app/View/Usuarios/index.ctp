<!-- app/View/Usuarios/index.ctp
Registro de nuevos usuarios -->

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
            <div class="form-group">
            <?php echo $this->Form->create('Usuario'); ?>
                <fieldset>
                    <legend><?php echo __('Registrarse'); ?></legend>
                    <?php echo $this->Form->input('username', array('label' => 'Nombre de usuario *','class' => 'form-control')); 
                    echo $this->Form->input('password', array('label' => 'Contraseña *', 'class' => 'form-control'));
                    echo $this->Form->input('password_confirm', array('label' => 'Confirmar contraseña *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password', 'class' => 'form-control'));
                    echo $this->Form->input('nombre', array('label' => 'Nombre *', 'class' => 'form-control')); 
                    echo $this->Form->input('foto', array('label' => 'Foto de perfil', 'type' => 'file'));
                    echo "<br>";
                    echo $this->Form->submit('Submit', array('class' => 'btn-login',  'title' => 'Click here to add the user') ); ?>
                </fieldset>
            <?php echo $this->Form->end(); ?>
            </div>
          </div>
          <div class="col-sm-2 col-md-2"></div>
      </div>
        
      <!-- Login Modal Page -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="../usuarios/index" class="btn btn-register"> Registrarse </a>
                    <h4 class="modal-title osSansFont" id="myModalLabel">Log in</h4>
                </div>

                <!-- Contenido de la página login modal -->
                <div class="modal-body">
                    <form name="sentMessage" id="loginForm" novalidate>
                        <?php echo $this->Flash->render('auth'); ?>
                        <?php echo $this->Form->create('Usuario'); ?>
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
                        <?php echo $this->Form->end(); ?>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn-login">Iniciar sesion</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>


<!-- Prueba para saber como se muestran diferentes vistas segun si esta logueado o no -->
<?php 
if($this->Session->check('Auth.User')){
    echo $this->Html->link( "Return to Dashboard",  array('action'=>'../preguntas/index') ); 
    echo "<br>";
    echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
    echo $this->Html->link( "Return to Login Screen",   array('action'=>'../preguntas/index') ); 
}
?>