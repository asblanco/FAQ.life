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
                    <a class="navbar-logo pacificoFont-menu" href="index.html">FAQ.life</a>
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
            
            <!--  QUESTION 1 -->
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-sm-8 col-md-8">
                    <!-- Contador de visitas -->
                    <div class="col-xs-12 col-sm-3 col-md-2" id="contador">
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('visitas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">16</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado opSansReFont">
                                <?php echo $this->Html->image('respuestas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">2</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado opSansReFont">
                                <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">16</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">5</div>
                        </div>
                    </div>
                     
                    <!-- Div preview pregunta -->
                    <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
                        <a href="pregunta.html" class="preview-pregunta">
                            <h1 class="opSansBFont">¿Si satanas castiga a los malos, eso no lo hace ser bueno?</h1>
                        </a>
                        <p class="opSansReFont">Pues los malos se van al infierno y satanas les da su merecido, eso no lo hace bueno?<p>
                        <p class="opSansItFont">Preguntado por <a href="">Manolo</a> el 22/10/2015 a las 10:20 horas en la categoría de <a href="">Religión</a>.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <hr class="small" id="separador">
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
            
            <!--  QUESTION 2 -->
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-sm-8 col-md-8">
                    <!-- Contador de visitas -->
                    <div class="col-xs-12 col-sm-3 col-md-2" id="contador">
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('visitas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">124</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('respuestas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">65</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">32</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">12</div>
                        </div>
                    </div>
                    
                    <!-- Div preview pregunta -->
                    <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
                        <a href="pregunta.html" class="preview-pregunta">
                            <h1 class="opSansBFont">¿A dónde va la luz cuando le doy al interruptor?</h1>
                        </a>
                        <p class="opSansReFont">Simpre que le doy al interruptor para apagar la luz me pregunto a donde va, porque cuando le vuelvo a dar se vuelve a encender inmediatamente. Se queda esperando?<p>
                        <p class="opSansItFont">Preguntado por <a href="">Juanito</a> el 18/10/2015 a las 13:42 horas en la categoría de <a href="">Electricidad</a>.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <hr class="small" id="separador">
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
            
            <!--  QUESTION 3 -->
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-sm-8 col-md-8">
                    <!-- Contador de visitas -->
                    <div class="col-xs-12 col-sm-3 col-md-2" id="contador">
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('visitas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">218</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('respuestas.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">48</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('positivo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">96</div>
                        </div>
                        <div class="col-xs-3 col-sm-6 col-md-6">
                            <div class="centrado">
                                <?php echo $this->Html->image('negativo.png', array('class' => 'centrado', 'iconos')) ?>
                            </div>
                            <div class="centrado opSansReFont">3</div>
                        </div>
                    </div>
                    
                    <!-- Div preview pregunta -->
                    <div class="col-xs-12 col-sm-9 col-md-10" id="pregunta">
                        <a href="pregunta.html" class="preview-pregunta">
                            <h1 class="opSansBFont">Carlinhos Brown perseguirá a los morosos tocando el tambor</h1>
                        </a>
                        <p class="opSansReFont">Tras expirar su contrato con el correccional de Guantánamo, el cantante y percusionista Carlinhos Brown ha creado la empresa “Pe pe pe pepepe pe pe SL”, que ofrece un servicio de cobro de morosos.
El artista brasileño perseguirá a los deudores bailando al ritmo de una samba y tocando el tambor constantemente, una actividad que el cerebro humano no puede soportar más de dos horas seguidas, según los expertos.</p>
<p class="opSansReFont">Si se contrata la opción premium, Brown se desplazará en una caravana con un equipo de sonido de alta potencia, quinientas bailarinas brasileñas de más de 70 años, dos serpientes de 30 metros de largo fabricadas en seda a modo de los tradicionales dragones chinos y un arsenal compuesto por 1500 timbales.</p>
<p class="opSansReFont">“Debemos dinero pero no somos monstruos”, explica uno de los afectados por las agresivas estrategias de recobro extrajudicial de deudas. “Te encierras en el baño a hacer de vientre y logra colarse dentro, donde el sonido del tambor aún retumba con más fuerza”, se queja.</p>
<p class="opSansReFont">“Tô te querendo como mingúem, to te querendo como deus quiser, to te querendo como te quero, to te querendo como se quer, pe pe pe pepepe pe pe”, gritaba la pasada madrugada Carlinhos Brown mientras un empresario se arrojaba al interior de un camión de la basura.</p>
<p class="opSansReFont">Aunque la empresa del músico apenas ha empezado a operar en España, son muchos los deudores que han pagado sacando el dinero de debajo de las piedras. “Basta con mandarles a casa un cedé de Carlinhos Brown. Es mucho más efectivo que dejarles una cabeza de caballo en la cama”, reconoce un acreedor.</p>
                        <p class="opSansItFont">Preguntado por <a href="">Juanito</a> el 19/10/2015 a las 15:33 horas en la categoría de <a href="">Noticias</a>.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <hr class="small" id="separador">
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
            
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