<!-- app/View/Buscars/buscar.ctp
     Se muestran las búsquedas -->

<!-- Contenido Principal -->
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="index-phrase opSansBFontTitle pcolor"><?php echo __('Results') ?></div>
  <hr class="small" id="separador">
  <?php if(empty($busquedas)){ ?>
  <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
    <p class="opSansReFont"><?php echo __('Ooooh!! No data for you.') ?></p>
  </div>
  <?php } ?>
  <?php foreach ($busquedas as $busqueda): ?>
  <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col-sm-8 col-md-8">
      <!-- Contador de visitas -->
      <div class="col-xs-12 col-sm-3 col-md-2" id="contador">
        <div id="container-imagen">
          <?php echo $this->Html->image($busqueda['Usuario']['foto'], array('class' => 'centrado', 'iconos')) ?>
        </div>
        <div class="col-xs-3 col-sm-6 col-md-6">
          <div class="centrado">
            <?php echo $this->Html->image('visitas.png', array('class' => 'centrado', 'iconos')) ?>
          </div>
          <div class="centrado opSansReFont"><?php echo $busqueda['Pregunta']['visto']; ?></div>
        </div>
        <div class="col-xs-3 col-sm-6 col-md-6">
          <div class="centrado opSansReFont">
            <?php echo $this->Html->image('respuestas.png', array('class' => 'centrado', 'iconos')) ?>
          </div>
          <div class="centrado opSansReFont"><?php echo $busqueda['Pregunta']['respuestas']; ?></div>
        </div>
        <div class="col-xs-3 col-sm-6 col-md-6">
          <div class="centrado opSansReFont">
            <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
          </div>
          <div class="centrado opSansReFont"><?php echo $busqueda['Pregunta']['positivos']; ?></div>
        </div>
        <div class="col-xs-3 col-sm-6 col-md-6">
          <div class="centrado">
            <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')); ?>
          </div>
          <div class="centrado opSansReFont"><?php echo $busqueda['Pregunta']['negativos']; ?></div>
        </div>
      </div>

      <!-- Div preview pregunta -->
      <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
        <a href="pregunta.html" class="preview-pregunta">
          <h1><?php echo $this->Html->link($busqueda['Pregunta']['titulo'], array('controller' => 'preguntas', 'action' => 'view', $busqueda['Pregunta']['id']), array('class' => 'opSansBFont')); ?></h1>
        </a>
        <p class="opSansReFont"><?php echo $busqueda['Pregunta']['cuerpo']; ?><p>
        <p class="opSansItFont"><?php echo __('Asked for') ?> <a href=""><?php echo $busqueda['Usuario']['username']; ?></a> <?php echo __('at') ?> <?php echo $this->Time->format($busqueda['Pregunta']['fecha'], '%e %B %Y %H:%M'); ?> <?php echo __('at category of') ?> <a href=""><?php echo $busqueda['Categoria']['nombre_categoria']; ?></a>.</p>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <hr class="small" id="separador">
      </div>
    </div>
    <div class="col-sm-2 col-md-2"></div>
  </div>
  <?php endforeach; ?>
</div>
