<!-- app/View/Categorias/index.ctp
     Se muestran las categorias posibles para filtrar. -->

<!-- Contenido Principal -->
<div class="col-xs-11 col-sm-11 col-md-11">
<h1>Categorias</h1>
    <?php foreach ($categorias as $categoria): ?>
	<div class="view fourth-effect">
        <a title="<?php echo $categoria['Categoria']['nombre_categoria']; ?>"><?php echo $this->Html->image($categoria['Categoria']['url_imagen'], array('class' => 'categorias')) ?></a>
		<div class="mask"></div>
	</div>
    <?php endforeach; ?>
</div>
