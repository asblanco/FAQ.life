<!-- app/View/Preguntas/view.ctp
Vista en detalle de una pregunta -->
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
              <a class="navbar-logo pacificoFont-menu" href="../../preguntas/index">FAQ.life</a>
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
                                    <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
                                </div>
                                <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['positivos']; ?></div>
                            </div>
                            <div class="col-xs-3 col-sm-6 col-md-6">
                                <div class="centrado">
                                    <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')) ?>
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
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                    <div class="col-xs-12 col-sm-8 col-md-8" id="caja-pregunta">
                        <textarea class="form-control respuestaCuerpo opSansLiFont" rows="4" placeholder="Respuesta"></textarea>
                        <button type="submit" class="btn-login button-preguntar">Responder!</button>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                </div>
            </form>
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
                            <div class="col-xs-12 col-sm-12 col-md-12" id="container-imagen">
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
                                        <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos'));?>
                                    </div>
                                    <div class="centrado opSansReFont"><?php echo $respuesta['positivos']; ?></div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="centrado">
                                        <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')); ?>
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
        
        <!-- Login Modal Page -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="../../usuarios/index" class="btn btn-register"> Registrarse </a>
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