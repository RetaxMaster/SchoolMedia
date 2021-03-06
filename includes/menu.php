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
                  <a href="scheduler_valores_conf.php?Lang=<?php echo $Lang; ?>&wph=20">Calendario de Instalaciones de Valores</a>
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
                <!-- li>
                  <a href="./rep_img_conf.php?Lang=< ?php echo $Lang; ?>&wph=44">Repositorio de instalaciones finalizadas</a>
                </li -->
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
                  <a href="./scheduler_capacitaciones_conf.php?Lang=<?php echo $Lang; ?>&wph=20">Calendario de capacitaciones</a>
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
                  <a href="./resumen_cotizacion_conf.php?Lang=<?php echo $Lang; ?>&wph=31">Cotizaciones</a>
                </li>
                <li>
                  <a href="./resumen_factura_conf.php?Lang=<?php echo $Lang; ?>&wph=32">Facturación</a>
                </li>
                <li>
                  <a href="./reporte_recibo_caja_conf.php?Lang=<?php echo $Lang; ?>&wph=33">Recibo de caja</a>
                </li>
                <li>
                  <a href="./resumen_pagos_comisiones_conf.php?Lang=<?php echo $Lang; ?>&wph=34">Pagos y comprobantes</a>
                </li>
                <li>
                  <a href="http://www.esdca.net/schoolMedia/school_media/pag_contable_admin/estado_cuenta.php?Lang=<?php echo $Lang; ?>&wph=35">Estado de cuenta</a>
                </li>
                <!-- li>
                  <a href="./.php?Lang=< ?php echo $Lang; ?>&wph=36">Reporte de facturación</a>
                </li -->
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
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <p>Powered by: Soluciones DTP, S.A. <br> © Copyright 2019. Todos los derechos reservados.</p>
    </div>
  </nav>