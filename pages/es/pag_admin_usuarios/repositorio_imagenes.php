
<!DOCTYPE html>
<html lang="es">
<? include("../includes/head_html.php"); ?>  

<!------------------------------------ BODY ------------------------------------->
  <body>
    <!-- sidebar-wrapper  -->
    <? include("../includes/menu.php"); ?>  
    
    <!-- header | Barra suprior -->
    <main class="page-content">
      <? include("../includes/header.php"); ?>  

      <!-- Sección Provincias -->
      <section id="idSecInterior">
        <div class="container">

          <!-- Titulo -->
          <div class="row">
            <div class="col-lg-12">
              <div class="cajaTitulo">
                <h6 class="text-center">REPOSITORIO DE IMÁGENES</h6>
              </div>
            </div>
          </div>

          <!-- Logo Imagenes -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contIcono">
                <i class="fas fa-images"></i>
              </div>              
            </div>          
          </div>

          <!-- Dropdown Seleccionar Paises -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Seleccione un pais</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropPaises" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                    <button class="dropdown-item" type="button">Todos</button>
                    <button class="dropdown-item" type="button">Panamá</button>
                    <button class="dropdown-item" type="button">Guatemala</button>
                    <button class="dropdown-item" type="button">Nicaragua</button>
                  </div>
                </div>
              </div>              
            </div>          
          </div>

          <!-- Dropdown Seleccionar Sucursal -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Sucursal</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropSucursal" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                    <button class="dropdown-item" type="button">...</button>
                  </div>
                </div>
              </div>              
            </div>          
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Tabla -->
              <div class="contTabla"> 
                <div class="tituloTabla">
                  <h6>Sucursal</h6>
                </div>               
                <div class="contenido-tabla">
                  <div id="ContTablaVerTodos">

                    <!-- <div class="row">
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    <!-- <div class="row">
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card tarjetaImagenes" style="">
                                <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                <div class="card-body bodyTarjeta">
                                    <h5 class="card-title">Titulo</h4>
                                    <p class="">Tipo de plantilla</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <table id="tablaVerTodos" class="table" style="width:100%">
                      <thead>
                          <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="card tarjetaImagenes" style="">
                              <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                              <div class="card-body bodyTarjeta">
                                  <h5 class="card-title">Titulo</h5>
                                  <p class="">Tipo de plantilla</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Ver Más</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                     
                      <!-- <tfoot>
                          <tr>
                              <th>Col 1</th>
                              <th>Col 2</th>
                              <th>Col 3</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot> -->
                    </table>
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="contBtnSuccess">
                <button id="idBtnNuevo" class="btn btnSuccess"><i class="far fa-plus-square"></i>Nuevo</button>
              </div>
            </div>
          </div>
        </div> 
      </section> 

    </main>

    <? include("../includes/footer.php"); ?>  

    <script>
      $('.admUsuarios i').css('color', '#fbb616');
      $('.admUsuarios a').addClass('activeMenu');
      $('.admUsuarios').addClass('active');
    </script>

  </body>

</html>