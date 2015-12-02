<!-- app/View/Preguntas/view.ctp
Vista en detalle de una pregunta -->
<!DOCTYPE html>
<html lang="en">
    <body>
        <!-- Contenido Principal -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
            <!--  QUESTION  -->
            <div class="row">
                <div class="col-sm-1 col-md-1"></div>
                <div class="col-xs-12 col-sm-10 col-md-10"> <!-- nested grid - question -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-2">
                            <!-- Profile picture -->
                            <div id="container-imagen">
                                <?php echo $this->Html->image($pregunta['Usuario']['foto'], array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <!-- Contador de visitas -->
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
                         <!-- Question -->
                        <div class="col-xs-12 col-sm-9 col-md-10">
                            <h1 class="opSansBFont"> <?php echo $pregunta['Pregunta']['titulo']; ?> </h1>
                            <p class="opSansReFont"><?php echo $pregunta['Pregunta']['cuerpo']; ?><p>
                            <p class="opSansItFont">Preguntado por <a href=""><?php echo $pregunta['Usuario']['username']; ?></a> el <?php echo $this->Time->format($pregunta['Pregunta']['fecha'], '%e %B %Y a las %H:%M'); ?> horas en la categoría de <a href=""><?php echo $pregunta['Categoria']['nombre_categoria']; ?></a>.</p>
                        </div>
                    </div>
                    <hr class="small separatorQuestion">
                </div>
            </div>

           <!-- RESPONDER -->
            <?php if($this->Session->check('Auth.User')){ ?>
            <?php echo $this->Form->create('Respuesta', array("controller"=>"respuestas", "action"=>"responder")); ?>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                    <div class="col-xs-12 col-sm-8 col-md-8" id="caja-pregunta">
                        <!-- <textarea class="form-control respuestaCuerpo opSansLiFont" rows="4" placeholder="Respuesta"></textarea> -->
                        <?php echo $this->Form->textarea('cuerpo_res', array('class' => 'form-control respuestaCuerpo opSansLiFont', 'rows' => 4, 'placeholder' => 'Respuesta')); ?>
                        <!-- <button type="submit" class="btn-login button-preguntar">Responder!</button> -->
                        <?php echo $this->Form->hidden('id',array('value' => $pregunta['Pregunta']['id'])); ?>
                        <?php echo $this->Form->submit('Responder!', array('class' => 'btn-login button-preguntar')); ?>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                </div>
            <?php echo $this->Form->end(); ?>
            <?php } ?>

            <!-- ANSWERS -->
            <?php if(empty($pregunta['Respuesta'])){ ?>
             <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2">
                <p class="opSansReFont">Esta pregunta todavia no tiene respuestas. Se el primero!</p>
            </div>
            <?php } ?>

            <!-- Acceder a las respuestas de la preguntas -->
            <?php
            $cont = -1;
            foreach ($pregunta['Respuesta'] as $respuesta):
             $cont++; ?>
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-xs-12 col-sm-8 col-md-8"> <!-- nested grid - answers -->
                    <!-- Answer 1 -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-2">
                            <!-- Profile picture -->
                            <div id="container-imagen"> <!--  class="col-xs-12 col-sm-12 col-md-12"  -->
                                <?php
                                //Recorre los usuarios que respondieron
                                foreach($usuarios as $clave => $usu){
                                    //Si cont coincide con la clave, es la foto del usuario actual
                                    if($clave == $cont){
                                       echo $this->Html->image($usu['Usuario']['foto'], array('class' => 'centrado', 'iconos'));
                                    }
                                }
                                ?>
                            </div>
                            <!-- Votos -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="centrado opSansReFont">
                                        <!-- Imagen formulario post para incrementar los votos positivos -->
                                        <?php echo $this->Form->create('Respuesta', array("controller"=>"respuestas", "action"=>"votarPositivo"));  ?>
                                        <?php echo $this->Form->hidden('id',array('value' => $respuesta['id'])); ?>
					<?php echo $this->Form->hidden('idPregunta',array('value' => $pregunta['Pregunta']['id'])); ?>
                                        <?php echo $this->Form->end('/img/positivo.png'); ?>
                                    </div>
                                    <div class="centrado opSansReFont"><?php echo $respuesta['positivos']; ?></div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="centrado">
                                        <!-- Imagen formulario post para incrementar los votos positivos -->
                                        <?php echo $this->Form->create('Respuesta', array("controller"=>"respuestas", "action"=>"votarNegativo"));  ?>
                                        <?php echo $this->Form->hidden('id',array('value' => $respuesta['id'])); ?>
				        <?php echo $this->Form->hidden('idPregunta',array('value' => $pregunta['Pregunta']['id'])); ?>
                                        <?php echo $this->Form->end('/img/negativo.png'); ?>
                                    </div>
                                    <div class="centrado opSansReFont"><?php echo $respuesta['negativos']; ?></div>
                                </div>
                            </div>
                        </div>
                         <!-- Content -->
                        <div class="col-xs-12 col-sm-9 col-md-10">
                            <?php
                                //Recorre los usuarios que respondieron
                                foreach($usuarios as $clave => $usu){
                                    //Si cont coincide con la clave, coge el nombre del usuario actual
                                    if($clave == $cont){ ?>
                                        <h3 class="opSansBFont"><?php echo $usu['Usuario']['nombre']; ?></h3>
                                        <p class="opSansReFont"><?php echo $respuesta['cuerpo_res']; ?><p>
                                        <p class="opSansItFont">Respondido por <a href="">
                                            <?php echo $usu['Usuario']['username']; ?>
                                            </a> el <?php echo $this->Time->format($respuesta['fecha_res'], '%e %B %Y a las %H:%M'); ?> horas.</p>
                                   <?php }
                                } ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <hr class="small" id="separador">
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </body>
</html>
