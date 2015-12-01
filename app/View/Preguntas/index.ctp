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
                    <!-- <input type="text" class="form-control preguntaTitulo opSansBFont" placeholder="Titulo"> -->
                    <?php echo $this->Form->input('titulo', array('type' => 'text', 'class' => 'form-control preguntaTitulo opSansBFont', 'label' => false ,'placeholder' => 'Titulo'));?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 cajaTituloCategoria">
                    <!-- <select class="form-control preguntaCategoria cajaTituloCategoria opSansLiFont">
                        <option disabled selected>-Categoria-</option>
                        <option>Alimentación</option>
                        <option>Coches</option>
                        <option>Electricidad</option>
                        <option>Hogar</option>
                        <option>Noticias</option>
                        <option>Religión</option>
                        <option>Programación</option>
                    </select> -->
                    <?php
                        $cat = '';
                        foreach ($categorias as $categoria):
                            $cat[] .= $categoria['Categoria']['nombre_categoria'];
                        endforeach;
                        echo $this->Form->input('categoria_id', array('class' => 'form-control preguntaCategoria cajaTituloCategoria opSansLiFont',
                            'label' => false, 'options' => array($cat), 'empty' => '---Categoría---' ));
                    ?>
                </div>
                <!-- <textarea class="form-control preguntaCuerpo opSansLiFont" rows="4" placeholder="Explicación"></textarea> -->
                <?php echo $this->Form->textarea('cuerpo', array('class' => 'form-control preguntaCuerpo opSansLiFont', 'rows' => 4, 'placeholder' => 'Explicación')); ?>
                <!-- <button type="submit" class="btn-login button-preguntar">Preguntar!</button> -->
                <?php echo $this->Form->submit('Preguntar!', array('class' => 'btn-login button-preguntar')); ?>
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
                    <div class="centrado opSansReFont">
                        <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
                    </div>
                    <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['positivos']; ?></div>
                </div>
                <div class="col-xs-3 col-sm-6 col-md-6">
                    <div class="centrado">
                        <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')); ?>
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
                <p class="opSansItFont">Preguntado por <a href=""><?php echo $pregunta['Usuario']['username']; ?></a> el <?php echo $this->Time->format($pregunta['Pregunta']['fecha'], '%e %B %Y a las %H:%M'); ?> horas en la categoría de <a href=""><?php echo $pregunta['Categoria']['nombre_categoria']; ?></a>.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <hr class="small" id="separador">
            </div>
        </div>
        <div class="col-sm-2 col-md-2"></div>
    </div>
    <?php endforeach; ?>

</div>
