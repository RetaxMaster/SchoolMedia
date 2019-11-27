
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
                <h6 class="text-center">INFORMACIÓN DISPONIBLE POR CLIENTE</h6>
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

          <!-- Dropdown Seleccionar Tipo Cliente -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Tipo de cliente</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropTipoClientes" class="dropdown-menu" aria-labelledby="dropdownMenu2">
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
                  <h6>Listado de Clientes</h6>
                </div>               
                <div class="contenido-tabla">
                  <div id="ContTablaVerTodos">
                    <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>id</th>
                              <th>Razón Social</th>
                              <th>Pais</th>
                              <th>Clasificación</th>
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
                                <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                                <!-- <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro"><i class="fas fa-toggle-off"></i></a> -->
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
                                <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
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
                                <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
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
                                <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
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

    <!-- MODAL DATOS GENERALES DE CLIENTE -->
    <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          	<center><h2 class="estilo-titulo">Datos Generales de "Nombre Cliente"</h2></center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <!-- Sección formulario de datos  -->
              <section id="">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">                      
                      <form id="idFormDetalles" action="">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">id</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="id" disabled>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">R.U.C.<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="rucCliente" name="rucCliente" placeholder="R.U.C">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Razón Social<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="razSocCliente" name="razSocCliente" placeholder="Razón Social">
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Dirección</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="dirCliente" name="dirCliente" placeholder="Dirección">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Pais<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Pais -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropPais" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Provincia<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Provincia -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
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
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">(+507) Panamá</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCodInter" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Teléfono</label>
                              <div class="col-sm-2">
                                <input type="number" class="form-control" id="telCliente" name="telCliente" placeholder="Teléfono">
                              </div>                              
                              <div class="col-sm-2">
                                <label class="sr-only" for="extCliente">Username</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Ext</div>
                                  </div>
                                  <input type="number" class="form-control" id="extCliente" placeholder="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">(+507) Panamá</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCodInter" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Celular</label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" id="celCliente" name="telCliente" placeholder="Celular">
                              </div>                              
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                <label class="sr-only" for="httpCliente"></label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">HTTP</div>
                                  </div>
                                  <input type="text" class="form-control" id="httpCliente" placeholder="">
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                <label class="sr-only" for="emailCliente"></label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                  </div>
                                  <input type="text" class="form-control" id="emailCliente" placeholder="eMail">
                                </div>
                              </div>                              
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Clasificación de cliente<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropClasCliente" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Calificación del cliente<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <i class="fas fa-star fa-2x starCalifCliente"></i>
                                <i class="fas fa-star fa-2x starCalifCliente"></i>
                                <i class="fas fa-star fa-2x starCalifCliente"></i>
                                <i class="fas fa-star fa-2x starCalifCliente"></i>
                                <i class="fas fa-star fa-2x starCalifCliente"></i>
                              </div>                              
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Observaciones</label>
                              <div class="col-sm-10">
                                <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Tipo de cliente<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Pais -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropTipoCliente" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-3 col-form-label">Cliente habilitado <span class="iconObligatorio">*</span> (Si/No)</label>
                              <div class="col-sm-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                              </div>                            
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="contBtnCancel">
                                  <button type="button" id="idBtnCancelar" class="btn btnCancel">Cerrar</button>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="contBtnSuccess">
                                  <button type="submit" id="idBtnAceptar" class="btn btnSuccess">Guardar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>                      
                    </div>
                  </div>
                </div>
              </section>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <? include("../includes/footer.php"); ?>  

    <!-- ESTILO MENU SELECCIONADO -->
    <script>
      $('.relClientes i').css('color', '#fbb616');
      $('.relClientes a').addClass('activeMenu');
      $('.relClientes').addClass('active');
    </script>

  </body>

</html>