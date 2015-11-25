<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
<?php
 echo $this->Html->link( "Add A New User",   array('action'=>'index') );
?>

<h2>Login</h2>
<?php
echo $this->Form->create('Usuario', array(
    'url' => array(
        'controller' => 'usuarios',
        'action' => 'login'
    )
));

echo $this->Form->input('Usuario.username');
echo $this->Form->input('Usuario.password');
echo $this->Form->end('Login');
?>