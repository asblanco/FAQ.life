<!-- app/View/Usuarios/view.ctp
Se muestra el perfil del usuario -->
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
              <?php
                echo $this->Html->link("FAQ.life", array("controller"=>"preguntas", "action"=>"index"), array("class"=>"navbar-logo pacificoFont-menu"));
              ?>
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

        </div>
    </body>
</html>
