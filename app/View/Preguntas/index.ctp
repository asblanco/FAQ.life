<!-- app/View/Preguntas/index.ctp
Lista de todas las preguntas -->
<!DOCTYPE html>
<!-- Contenido Principal -->
<div class="col-xs-12 col-sm-12 col-md-12">
  <?php if($this->Session->check('Auth.User')){ ?>
    <!-- PREGUNTAR -->
    <?php echo $this->Form->create('Pregunta', array("controller"=>"preguntas", "action"=>"add")); ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-8 col-md-8" id="caja-pregunta">
                <div class="col-xs-8 col-sm-8 col-md-8 cajaTituloCategoria">
                    <?php echo $this->Form->input('titulo', array('type' => 'text', 'class' => 'form-control preguntaTitulo opSansBFont', 'label' => false ,'placeholder' => __('Tittle')));?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 cajaTituloCategoria">
                    <?php
                        $cat = '';
                        foreach ($categorias as $categoria):
                            $cat[] .= $categoria['Categoria']['nombre_categoria'];
                        endforeach;
                        echo $this->Form->input('categoria_id', array('class' => 'form-control preguntaCategoria cajaTituloCategoria opSansLiFont',
                            'label' => false, 'options' => array($cat), 'empty' => __('---Categories---') ));
                    ?>
                </div>
                <?php echo $this->Form->textarea('cuerpo', array('class' => 'form-control preguntaCuerpo opSansLiFont', 'rows' => 4, 'placeholder' => __('Explaination'))); ?>
                <!-- <button type="submit" class="btn-login button-preguntar">Preguntar!</button> -->
                <?php echo $this->Form->submit(__('Ask!'), array('class' => 'btn-login button-preguntar')); ?>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2"></div>
        </div>
    <?php echo $this->Form->end(); ?>
    <?php } ?>
    <!-- QUESTIONS -->
    <?php foreach ($preguntas as $pregunta): ?>
    <div class="row">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-sm-8 col-md-8">
            <!-- Contador de visitas -->
            <div class="col-xs-12 col-sm-3 col-md-2" id="contador">
                <div class="col-xs-3 col-sm-6 col-md-6">
                    <div class="centrado">
                        <?php echo $this->Html->image('visitas.png', array('class' => 'centrado', 'iconos')) ?>
                    </div>
                    <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['visto']; ?></div>
                </div>
                <div class="col-xs-3 col-sm-6 col-md-6">
                    <div class="centrado opSansReFont">
                        <?php echo $this->Html->image('respuestas.png', array('class' => 'centrado', 'iconos')) ?>
                    </div>
                    <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['respuestas']; ?></div>
                </div>
                <div class="col-xs-3 col-sm-6 col-md-6">
                    <div class="centrado">
                        <!-- Imagen formulario post para incrementar los votos positivos -->
                        <?php echo $this->Form->create('Pregunta', array("controller"=>"preguntas", "action"=>"votarPositivo"));  ?>
                        <?php echo $this->Form->hidden('id',array('value' => $pregunta['Pregunta']['id'])); ?>
                        <?php echo $this->Form->end('/img/positivo.png'); ?>
                    </div>
                    <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['positivos']; ?></div>
                </div>
                <div class="col-xs-3 col-sm-6 col-md-6">
                    <div class="centrado">
                        <!-- Imagen formulario post para incrementar los votos positivos -->
                        <?php echo $this->Form->create('Pregunta', array("controller"=>"preguntas", "action"=>"votarNegativo"));  ?>
                        <?php echo $this->Form->hidden('id',array('value' => $pregunta['Pregunta']['id'])); ?>
                        <?php echo $this->Form->end('/img/negativo.png'); ?>
                    </div>
                    <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['negativos']; ?></div>
                </div>
            </div>

            <!-- Div preview pregunta -->
            <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
                <a href="pregunta.html" class="preview-pregunta">
                    <h1><?php echo $this->Html->link($pregunta['Pregunta']['titulo'], array('controller' => 'preguntas', 'action' => 'view', $pregunta['Pregunta']['id']), array('class' => 'opSansBFont')); ?></h1>
                </a>
                <p class="opSansReFont"><?php echo $pregunta['Pregunta']['cuerpo']; ?><p>
                <p class="opSansItFont"><?php echo __('Asked for') ?> <a href=""><?php echo $pregunta['Usuario']['username']; ?></a><?php echo __('at') ?> <?php echo $this->Time->format($pregunta['Pregunta']['fecha'], '%e %B %Y %H:%M'); ?> <?php echo __('at category of') ?> <a href=""><?php echo $pregunta['Categoria']['nombre_categoria']; ?></a>.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <hr class="small" id="separador">
            </div>
        </div>
        <div class="col-sm-2 col-md-2"></div>
    </div>
    <?php endforeach; ?>

</div>
