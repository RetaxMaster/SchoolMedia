<!---------------------------------------------- SIDEBAR MENÚ-------------------------------------------->

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <div id="close-sidebar"><i class="fas fa-times"></i></div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="<?php echo IMG_WEBPAGE_DIR; ?>/logo-school-media.png" alt="logo school media">
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="./main.php?Lang=<?php echo $Lang; ?>&wph=2">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-handshake"></i>
              <span>Relación con clientes</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_relacion_clientes/clientes.php">Clientes</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_relacion_clientes/contactos_clientes.php">Contactos Clientes</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_relacion_clientes/seguimiento_negocio.php">Seguimiento de negociación</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-truck"></i>
              <span>Operaciones</span>
            </a>
            <!-- <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div> -->
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-graduation-cap"></i>
              <span>Académico</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_academico/capacitadores.php">Capacitadores y resumen curricular</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-file"></i>
              <span>Contable - Administrativo</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_contable_admin/ubicaciones_disponibles.php">Ubicaciones disponibles</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_contable_admin/inventario_prod_servicios.php">Inventario productos y servicios</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_contable_admin/convenios_contratos.php">Convenios y contratos</a>
                </li>
                <!-- <li>
                  <a href="#">Forms</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-bookmark"></i>
              <span>Plantillas</span>
            </a>
            <!-- <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Pie chart</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div> -->
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Admón de usuarios</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_admin_usuarios/perfil_usuario.php">Perfil de usuario</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_admin_usuarios/centros_operaciones.php">Centros de operaciones</a>
                </li>   
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_admin_usuarios/repositorio_imagenes.php">Repositorio de imagenes</a>
                </li>               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-cogs"></i>
              <span>Configuración general</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="./ctry_conf.php?Lang=<?php echo $Lang; ?>&wph=4">Paises</a>
                </li>
                <li>
                  <a href="./prov_conf.php?Lang=<?php echo $Lang; ?>&wph=5">Provincias</a>
                </li>
                <li>
                  <a href="./dpto_conf.php?Lang=<?php echo $Lang; ?>&wph=6">Departamentos Empresariales</a>
                </li>
                <li>
                  <a href="./crgo_conf.php?Lang=<?php echo $Lang; ?>&wph=7">Cargos Laborales existentes</a>
                </li>
                <li>
                  <a href="./format_pub_conf.php?Lang=<?php echo $Lang; ?>&wph=8">Formatos Publicitarios</a>
                </li>
                <li>
                  <a href="./tipos_clients_conf.php?Lang=<?php echo $Lang; ?>&wph=9">Tipos de Clientes</a>
                </li>
                <li>
                  <a href="./clasif_cuentas_conf.php?Lang=<?php echo $Lang; ?>&wph=10">Clasificación de Cuentas</a>
                </li>
                <li>
                  <a href="./calific_conf.php?Lang=<?php echo $Lang; ?>&wph=11">Calificación de Clasificación</a>
                </li>
                <li>
                  <a href="./cods_ints_tlfs_conf.php?Lang=<?php echo $Lang; ?>&wph=12">Códigos Telefónicos por Pais</a>
                </li>
                <li>
                  <a href="./procs_crm_conf.php?Lang=<?php echo $Lang; ?>&wph=13">Arbol de Procesos del CRM</a>
                </li>
                <li>
                  <a href="./sub_procs_crm_conf.php?Lang=<?php echo $Lang; ?>&wph=14">Arbol de Subprocesos del CRM</a>
                </li>
                <li>
                  <a href="./impts_consumo_conf.php?Lang=<?php echo $Lang; ?>&wph=15">Impuestos al Consumo (CA)</a>
                </li>
                <li>
                  <a href="./formas_pag_conf.php?Lang=<?php echo $Lang; ?>&wph=16">Formas de Pago (CA)</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <p>Powered by: Soluciones DTP, S.A. <br> © Copyright 2019. Todos los derechos reservados.</p>
    </div>
  </nav>
