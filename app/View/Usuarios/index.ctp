<!-- app/View/Usuarios/index.ctp
Registro de nuevos usuarios -->

<!DOCTYPE html>
<html lang="en">
    <body>
      <!-- Contenido Principal -->
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row"><p></p></div> <!-- div superior de separacion -->
          <div class="col-sm-2 col-md-2 hidden-phone"></div>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="form-group">
            <?php echo $this->Form->create('Usuario', array('type' => 'file')); ?>
                <fieldset>
                    <legend><?php echo __('Register'); ?></legend>
                    <?php echo $this->Form->input('username', array('label' => __('Username *'),'class' => 'form-control'));
                    echo "<br>";
                    echo $this->Form->input('password', array('label' => __('Password *'), 'class' => 'form-control'));
                    echo "<br>";
                    echo $this->Form->input('password_confirm', array('label' => __('Password confirm *'), 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password', 'class' => 'form-control'));
                    echo "<br>";
                    echo $this->Form->input('nombre', array('label' => __('Name *'), 'class' => 'form-control'));
                    echo "<br>";
		    echo $this->Form->input('idioma', array('label' => __('Idioma '),
		    'options' => array( 'spa' => 'Español', 'glg' => 'Galego', 'eng' => 'English')
		    ));
		    echo "<br>";
		    echo $this->Form->input('foto', array('type' => 'file'));
		    echo $this->Form->input('dir', array('type'=>'hidden'));
                    echo "<br>";
                    echo $this->Form->submit(__('Submit'), array('class' => 'btn-login')); ?>
                </fieldset>
            <?php echo $this->Form->end(); ?>
            </div>
          </div>
          <div class="col-sm-2 col-md-2"></div>
      </div>
    </body>
</html>
