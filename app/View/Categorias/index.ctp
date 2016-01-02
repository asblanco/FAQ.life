<!-- app/View/Categorias/index.ctp
     Se muestran las categorias posibles para filtrar. -->

<!-- Contenido Principal -->
<div class="col-xs-10 col-sm-10 col-md-10 col-md-offset-1">
<h2>Categorias</h2>
    <?php foreach ($categorias as $categoria): ?>
	<div class="view fourth-effect">
        <!-- Imagen categoria -->
        <?php echo $this->Form->create('Categoria', array("controller"=>"categorias", "action"=>"view"));  ?>
        <?php echo $this->Form->hidden('categoria_id',array('value' => $categoria['Categoria']['id'])); ?>
        <div class="categorias"><?php echo $this->Form->end($categoria['Categoria']['url_imagen']); ?></div>
		<div class="mask"></div>
	</div>
    <?php endforeach; ?>
</div>
