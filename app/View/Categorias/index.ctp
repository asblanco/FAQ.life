<!-- app/View/Categorias/index.ctp
     Se muestran las categorias posibles para filtrar. -->

<!-- Contenido Principal -->
<div class="col-xs-10 col-sm-10 col-md-10 col-md-offset-1">
<h2>Categorias</h2>
    <?php foreach ($categorias as $categoria): ?>
	<div class="view fourth-effect">
        <!-- Imagen categoria -->
        <?php echo $this->Html->link($this->Html->image($categoria['Categoria']['url_imagen']), array('controller' => 'categorias', 'action' => 'view', $categoria['Categoria']['id']), array('class' => 'categorias','escape' => false)); ?>
		<div class="mask"></div>
	</div>
    <?php endforeach; ?>
</div>
