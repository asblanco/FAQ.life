<!DOCTYPE html>
<html lang="en">
    <body>
        <header class="head-index">
            <!-- Barra de navegacion -->
            <nav class="navigation-text col-xs-12 col-sm-12 col-md-12">
                <!-- div con el titulo y el icono en modo movil -->
                <div class="col-md-2 navbar-header page-scroll ">
                    <button type="button" class="navbar-toggle2 button-menu" data-toggle="collapse" data-target="#navbar-collapse1">
                        <span class="text-menu-toggle osSansFont-menu">Menu</span>
                    </button>
                    <a class="navbar-logo pacificoFont-menu" href="index">FAQ.life</a>
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
            
            <!-- div con la frase de la pagina -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
              <div class="index-phrase opSansBFontTitle">Pregunta!</div>
              <hr class="small">
            </div>
        </header>

        <!-- Contenido Principal -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            
            <!-- PREGUNTAR -->
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                    <div class="col-xs-12 col-sm-8 col-md-8" id="caja-pregunta">
                        <div class="col-xs-8 col-sm-8 col-md-8 cajaTituloCategoria">
                            <input type="text" class="form-control preguntaTitulo opSansBFont" placeholder="Titulo">
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 cajaTituloCategoria">
                            <select class="form-control preguntaCategoria cajaTituloCategoria opSansLiFont">
                                <option>---Categoria---</option>
                                <option>Alimentación</option>
                                <option>Coches</option>
                                <option>Electricidad</option>
                                <option>Hogar</option>
                                <option>Noticias</option>
                                <option>Religión</option>
                                <option>Programación</option>
                            </select>
                        </div>
                        <textarea class="form-control preguntaCuerpo opSansLiFont" rows="4" placeholder="Explicación"></textarea>
                        <button type="submit" class="btn-login button-preguntar">Preguntar!</button>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2"></div>
                </div>
            </form>
            
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
                                <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont"><?php echo $pregunta['Pregunta']['negativos']; ?></div>
                        </div>
                    </div>

                    <!-- Div preview pregunta -->
                    <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
                        <a href="pregunta.html" class="preview-pregunta">
                            <h1 class="opSansBFont"><?php echo $this->Html->link($pregunta['Pregunta']['titulo'], array('controller' => 'preguntas', 'action' => 'pregunta', $pregunta['Pregunta']['id'])); ?></h1>
                        </a>                        
                        <p class="opSansReFont"><?php echo $pregunta['Pregunta']['cuerpo']; ?><p>
                        <p class="opSansItFont">Preguntado por <a href=""><?php echo $pregunta['Pregunta']['Usuario_id']; ?></a> el <?php echo $this->Time->format($pregunta['Pregunta']['fecha'], '%e %B %Y a las %H:%M'); ?> horas en la categoría de <a href=""><?php echo $pregunta['Pregunta']['Categoria_id']; ?></a>.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <hr class="small" id="separador">
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
            <?php endforeach; ?>
            
        </div>

        <!-- Login Modal Page -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button href="categorias.html" type="submit" class="btn btn-register">Registrarse</button>
                        <h4 class="modal-title osSansFont" id="myModalLabel">Log in</h4>
                    </div>
                    
                    <!-- Contenido de la página login modal -->
                    <div class="modal-body">
                        <form name="sentMessage" id="loginForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email address" id="email" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
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