<?php

//------------------------------------------------ HEAD HTML ------------------------------------------------->
include_once(INCLUDES_DIR . "/meta_head.php");
echo '<!-- Custom JavaScripts Functions Needs
    ================================================== -->
</head>'; ?>
<!------------------------------------ BODY ------------------------------------->

<body>
    <!-- sidebar-wrapper  -->
    <? include(INCLUDES_DIR . "/menu.php"); ?>

    <!-- header | Barra suprior -->
    <main class="page-content">
        <? include(INCLUDES_DIR . "/soft_head.php"); ?>

        <!-- Tiulo -->
        <section id="idSecInterior">
            <div class="container">

                <!-- Titulo -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cajaTitulo">
                            <h6 class="text-center" id="text1">CONFIGURACI&Oacute;N GENERAL DEL SISTEMA</h6>
                        </div>
                    </div>
                </div>



                <!-- Logo Clientes -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contIcono">
                            <i class="fa fa-handshake"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Tabla -->
                        <div class="contTabla">
                            <div class="tituloTabla">
                                <h6 id="text5">Panel de Control del Sistema</h6>
                            </div>
                            <div class="contenido-tabla">
                                <div id="ContTablaVerTodos">
                                    <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th id="text6"></th>
                                                <th id="text7"></th>
                                                <th id="text8"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-globe"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">PA&Iacute;SES</h5>
                                                            <p class="">Generales</p>
                                                            <p class="card-text">Habilite o inhabilite países donde opera SchoolMedia.</p>
                                                            <a href="./ctry_conf.php?Lang=<?php echo $Lang; ?>&wph=4" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-globe"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">PROVINCIAS</h5>
                                                            <p class="">Generales</p>
                                                            <p class="card-text">Habilite o inhabilite las provincias donde puede operar SchoolMedia.</p>
                                                            <a href="./prov_conf.php?Lang=<?php echo $Lang; ?>&wph=5" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-sitemap"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">DEPARTAMENTOS EMPRESARIALES</h5>
                                                            <p class="">Generales</p>
                                                            <p class="card-text">Configure los departamentos que puedan existir dentro de una empresa (incluye a SchoolMedia)</p>
                                                            <a href="./dpto_conf.php?Lang=<?php echo $Lang; ?>&wph=6" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <!-- -->
                                        <tr>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-users"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">CARGOS LABORALES EXISTENTES</h5>
                                                            <p class="">Generales</p>
                                                            <p class="card-text">Configure los diferentes cargos que puedan existir por cada departamento dentro de una empresa (incluye a SchoolMedia)</p>
                                                            <a href="./crgo_conf.php?Lang=<?php echo $Lang; ?>&wph=7" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-phone"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">CÓDIGOS TELEFÓNICOS POR PAÍS</h5>
                                                            <p class="">Generales</p>
                                                            <p class="card-text">Vea un listado global de todos los códigos telefónicos internacionales.</p>
                                                            <a href="./cods_ints_tlfs_conf.php?Lang=<?php echo $Lang; ?>&wph=12" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-sitemap"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">TIPOS DE CLIENTES</h5>
                                                            <p class="">Administrativo</p>
                                                            <p class="card-text">Clasifique los clientes entre Anunciantes, Colegios, Universidades.</p>
                                                            <a href="./tipos_clients_conf.php?Lang=<?php echo $Lang; ?>&wph=9" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <!-- -->
                                        <tr>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-chess"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">CLASIFICACIÓN DE CUENTAS</h5>
                                                            <p class="">Administrativo</p>
                                                            <p class="card-text">Defina tipos de clientes, Por ejemplo: Regular, V.I.P. etc.</p>
                                                            <a href="./clasif_cuentas_conf.php?Lang=<?php echo $Lang; ?>&wph=10" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-star fa-2x"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">CALIFICACIÓN DE CLASIFICACIÓN DE CUENTAS</h5>
                                                            <p class="">Administrativo</p>
                                                            <p class="card-text">Califique a su cliente dentro de la clasificación correspondiente por cantidad de estrellas.</p>
                                                            <a href="./calific_conf.php?Lang=<?php echo $Lang; ?>&wph=11" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-print"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">FORMATOS PUBLICITARIOS</h5>
                                                            <p class="">Operaciones</p>
                                                            <p class="card-text">Defina todos los formatos publicitarios que comerciliza SchoolMedia</p>
                                                            <a href="./format_pub_conf.php?Lang=<?php echo $Lang; ?>&wph=8" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                             </tr>
                                        <!-- -->
                                        <tr>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">ESPACIOS EXISTENTES</h5>
                                                            <p class="">Operaciones</p>
                                                            <p class="card-text">Cree o Administre los espacios publicitarios que ha instalado en cada Colegio o Universidad.</p>
                                                            <a href="./ocup_espacios_conf.php?Lang=<?php echo $Lang; ?>&wph=21" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fa fa-handshake"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">ÁRBOL DE PROCESOS DEL CRM</h5>
                                                            <p class="">CRM</p>
                                                            <p class="card-text">Cree y Administre etapas de procesos para el seguimiento básico de sus clientes.</p>
                                                            <a href="./procs_crm_conf.php?Lang=<?php echo $Lang; ?>&wph=13" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fa fa-handshake"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">ÁRBOL DE SUBPROCESOS DEL CRM</h5>
                                                            <p class="">CRM</p>
                                                            <p class="card-text">Defina acciones necesaria a realizar por cada etapa del proceso de negociaci?n.</p>
                                                            <a href="./sub_procs_crm_conf.php?Lang=<?php echo $Lang; ?>&wph=14" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <!-- -->
                                        <tr>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="far fa-money-bill-alt"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">FORMAS DE PAGO</h5>
                                                            <p class="">Contable</p>
                                                            <p class="card-text">Cree o Administre cada forma de pago que tenga disponible en un momento para recibir pagos de los clientes de SchoolMedia.</p>
                                                            <a href="./formas_pag_conf.php?Lang=<?php echo $Lang; ?>&wph=16" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                    <div class="card tarjetaImagenes" style="">
                                                        <div class="contIcono">
                                                            <i class="fas fa-percent"></i>
                                                        </div>              
                                                        <div class="card-body bodyTarjeta">
                                                            <h5 class="card-title">IMPUESTOS AL CONSUMO</h5>
                                                            <p class="">Contable</p>
                                                            <p class="card-text">Cree y Administre los impuestos necesarios por cada país donde opere SchoolMedia.</p>
                                                            <a href="./impts_consumo_conf.php?Lang=<?php echo $Lang; ?>&wph=15" class="btn btn-primary">Administrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                        
                                                </td>
                                            </tr>
                                        <!-- -->
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?
    include_once(INCLUDES_DIR . "/footer.php");
    ?>

    <!-- ESTILO MENU SELECCIONADO -->
    <script>
        $('.relClientes i').css('color', '#fbb616');
        $('.relClientes a').addClass('activeMenu');
        $('.relClientes').addClass('active');
    </script>

</body>

</html>