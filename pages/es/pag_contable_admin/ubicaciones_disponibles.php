
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
                <h6 class="text-center">UBICACIONES DISPONIBLES</h6>
              </div>
            </div>
          </div>

          <!-- Logo Clientes -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contIcono">
                <i class="fas fa-map"></i>
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

          <!-- Dropdown Seleccionar Provincia -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Provincia</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropProvincia" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                    <button class="dropdown-item" type="button">...</button>
                  </div>
                </div>
              </div>              
            </div>          
          </div>

          <!-- Dropdown Seleccionar Tipo Publicidad -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Tipo de Publicidad</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropTipoPublicidad" class="dropdown-menu" aria-labelledby="dropdownMenu2">
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
                  <h6>Ubicaciones disponibles<h6>
                </div>               
                <div class="contenido-tabla">
                  <div id="ContTablaVerTodos">
                    <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Razón Social</th>
                              <th>Código</th>
                              <th>Cara</th>
                              <th>Disponible</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td></span></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
                                <a href=""data-toggle="tooltip" data-placement="top" title="Activar registro">
                                  <div class="custom-control custom-switch contcheckboxActivar">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                      <label class="custom-control-label" for="customSwitch1"></label>
                                  </div>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td></span></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
                                <a href=""data-toggle="tooltip" data-placement="top" title="Activar registro">
                                  <div class="custom-control custom-switch contcheckboxActivar">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                      <label class="custom-control-label" for="customSwitch1"></label>
                                  </div>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td></span></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
                                <a href=""data-toggle="tooltip" data-placement="top" title="Activar registro">
                                  <div class="custom-control custom-switch contcheckboxActivar">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                      <label class="custom-control-label" for="customSwitch1"></label>
                                  </div>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
                                <a href=""data-toggle="tooltip" data-placement="top" title="Activar registro">
                                  <div class="custom-control custom-switch contcheckboxActivar">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                      <label class="custom-control-label" for="customSwitch1"></label>
                                  </div>
                                </a>
                              </td>
                          </tr>
                      </tbody>
                      <!-- tfoot>
                          <tr>
                              <th>Col 1</th>
                              <th>Col 2</th>
                              <th>Col 3</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot !-->
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
      $('.contable i').css('color', '#fbb616');
      $('.contable a').addClass('activeMenu');
      $('.contable').addClass('active');
    </script>

  </body>

</html>