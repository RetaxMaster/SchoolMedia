<!DOCTYPE html>
<html lang="es">
    <!------------------------------------------------ HEAD HTML ------------------------------------------------->
    <?
    include("includes/head_html.php"); 
    ?>
<body>

    <!-- ------------------------------------------ SECCIÓN PRINCIPAL --------------------------------------------->
    
    <section class="principal">  
        <div class="container-fluid">
            <div class="row .no-gutters">
                <div class="col-lg-9 col-md-7 xsNone padOff">
                    <div class="banner">
                        <h4 class="titleBanner">Acceso al Panel Administrativo de: Grupo SUM+</h4>
                    </div>  
                </div>
                <div class="col-lg-3 col-md-5 padOff">
                    <!-- --------------------------- LOGO SHOOL MEDIA ----------------------------------->
                    <div class="contLogo">
                        <img src="assets/img/logo-school-media.png" alt="">
                    </div>   

                    <!-- --------------------------- FORMULARIO LOGIN ----------------------------------->
                    <div class="form-login">
                        <h2 class="text-center title-login">ACCESO</h2>
                        <br>
                        <!-- formulario login -->
                        <form id="IdFormLogin" method="POST" >
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                            </div>
                            <br>
                            <div class="form-group">                                
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <br>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Ingresando a la plataforma.</strong> Por favor espere...
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="divBtnLogin">
                                <button type="submit" class="btn btn-primary btn-login">Ingresar</button>
                            </div> 
                            <br>
                            <hr>
                            <p class="p-olvido-pass">¿Olvidó su contraseña? <a href="">Click aquí!</a></p>
                        </form>
    
                        <!-- formulario recuperar contraseña  -->
                        <form id="IdFormResetPass" method="POST" style="display: none;">
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error.</strong> Cambiando el password
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <br><br>
                            <div class="divBtnLogin">
                                <button type="submit" class="btn btn-primary btn-login">Enviar</button>
                            </div> 
                        </form>
                    </div>  
                </div>
            </div>            
        </div>  
    </section>

    <footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 footer">
                <p class="text-center">Powered by: Soluciones DTP, SA. &copy; Copyright 2019. Todos los derechos Reservados.</p>
            </div>
        </div>
    </div>   
</footer>
     
     
    <!-------------------------------------------------- FOOTER -------------------------------------------->
    <?
    include("includes/footer.php"); 
    ?>   
    
</body>
</html>