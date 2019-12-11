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
                  <a href="./clientes_conf.php?Lang=<?php echo $Lang; ?>&wph=17">Clientes Cuentas</a>
                </li>
                <li>
                  <a href="./clientes_cont_conf.php?Lang=<?php echo $Lang; ?>&wph=18">Clientes Contactos</a>
                </li>
                <li>
                  <a href="./seg_clientes_conf.php?Lang=<?php echo $Lang; ?>&wph=19">Seguimiento de negociación</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-truck"></i>
              <span>Operaciones</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="op_scheduler_conf.php?Lang=<?php echo $Lang; ?>&wph=20">Calendario de Instalaciones Publicitarias</a>
                </li>
                <li>
                  <a href="op_scheduler_conf.php?Lang=<?php echo $Lang; ?>&wph=21">Calendario de Instalaciones de Valores</a>
                </li>
                <!-- li>
                  <a href="./ocup_espacios_conf.php?Lang=< ?php echo $Lang; ?>&wph=21">Ocupación de espacios</a>
                </li -->
                <li>
                  <a href="./rep_img_conf.php?Lang=<?php echo $Lang; ?>&wph=22">Repositorio de imágenes para instalar</a>
                </li>
                <li>
                  <a href="./list_vals_conf.php?Lang=<?php echo $Lang; ?>&wph=23">Listado de valores para academias</a>
                </li>
                <li>
                  <a href="./rep_img_conf.php?Lang=<?php echo $Lang; ?>&wph=44">Repositorio de instalaciones finalizadas</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-graduation-cap"></i>
              <span>Académico</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="./caps_res_conf.php?Lang=<?php echo $Lang; ?>&wph=24">Capacitadores y Resumen Curricular</a>
                </li>
                <li>
                  <a href="./plans_acad_conf.php?Lang=<?php echo $Lang; ?>&wph=25">Planes académicos</a>
                </li>
                <li>
                  <a href="./disp_plans_conf.php?Lang=<?php echo $Lang; ?>&wph=26">Disponibilidad plan académico</a>
                </li>
                <li>
                  <a href="./disp_cap_conf.php?Lang=<?php echo $Lang; ?>&wph=27">Disponibilidad de capacitador por país</a>
                </li>
                <li>
                  <a href="./mat_cap_conf.php?Lang=<?php echo $Lang; ?>&wph=28">Matriz de capacitador y curso</a>
                </li>
                <li>
                  <a href="./mat_cap_conf.php?Lang=<?php echo $Lang; ?>&wph=29">Calendario de capacitaciones</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/page/pages/es/pag_operaciones/calendario_capacitaciones.php?Lang=<?php echo $Lang; ?>&wph=29">Calendario de capacitaciones tbl_0075 ./pag_operaciones/calendario_capacitaciones.php</a>
                </li>
                <li>
                  <a href="./.php?Lang=<?php echo $Lang; ?>&wph=30">Envío de la encuesta de calidad tbl_0076</a>
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
                  <a href="./cotizacion_conf.php?Lang=<?php echo $Lang; ?>&wph=31">Cotización de la tabla tbl_0051 a la tabla tbl_0054</a>
                </li>
                <li>
                  <a href="./facturar_conf.php?Lang=<?php echo $Lang; ?>&wph=32">Facturar</a>
                </li>
                <li>
                  <a href="./recibo_conf.php?Lang=<?php echo $Lang; ?>&wph=33">Recibo de caja</a>
                </li>
                <li>
                  <a href="./.php?Lang=<?php echo $Lang; ?>&wph=34">Estado de cuenta view_0001, view_0003</a>
                </li>
                <li>
                  <a href="./.php?Lang=<?php echo $Lang; ?>&wph=35">Cuentas por cobrar view_0002</a>
                </li>
                <!-- li>
                  <a href="./.php?Lang=< ?php echo $Lang; ?>&wph=36">Reporte de facturación</a>
                </li -->
                <li>
                <a href="./ocup_espacios_conf.php?Lang=<?php echo $Lang; ?>&wph=21">Espacios existentes</a>
                </li>
                <li>
                  <a href="./prod_serv_conf.php?Lang=<?php echo $Lang; ?>&wph=38">Inventario productos y servicios</a>
                </li>
                <li>
                  <a href="./conv_cont_conf.php?Lang=<?php echo $Lang; ?>&wph=39">Convenios y contratos</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-bookmark"></i>
              <span>Plantillas</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="?Lang=<?php echo $Lang; ?>&wph="></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Admón de usuarios</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="./perfil_conf.php?Lang=<?php echo $Lang; ?>&wph=41">Perfil de usuario</a>
                </li>
                <li>
                  <a href="./cent_op_conf.php?Lang=<?php echo $Lang; ?>&wph=42">Centros de operaciones</a>
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