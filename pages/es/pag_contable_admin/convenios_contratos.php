
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
                <h6 class="text-center">CONVENIOS Y CONTRATOS</h6>
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
          <!-- <div class="row">
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
          </div> -->

          <!-- Dropdown Seleccionar Tipo Cliente -->
          <!-- <div class="row">
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
          </div> -->

          <div class="row">
            <div class="col-lg-12">
              <!-- Tabla -->
              <div class="contTabla"> 
                <div class="tituloTabla">
                  <h6>?????????????</h6>
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

    <!-- MODAL CONTABLE ADMINISTRATIVO - CONVENIOS Y CONTRATOS -->
    <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          	<center><h2 class="estilo-titulo">Contable - Administrativo "convenios y contratos"</h2></center>
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
                              <label for="" class="col-sm-2 col-form-label">ID</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="ID" name="ID" placeholder="ID" disabled>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Contrato</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="Contrato" name="Contrato" placeholder="Contrato" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Cliente</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="Cliente" name="Cliente" placeholder="Cliente" disabled>
                              </div>
                              <div class="col-sm-1 grupo-btn-razSoc">
                                <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                <button id="idBtnBorrar" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-minus-square"></i></button>
                              </div>
                              <!-- <div class="col-sm-1">
                                <button id="idBtnNuevo" class="form-control btn btnSuccess"><i class="far fa-plus-square"></i></button>
                              </div> -->
                              <label for="" class="col-sm-2 col-form-label">Tipo de Cliente</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="tipoCliente" name="tipoCliente" placeholder="Tipo de Cliente" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Fecha de inicio</label>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Fecha fin</label>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Ciclo Pub</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Pais -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCicloPub" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Ciclo Valor</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Provincia -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCicloValor" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
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
                              <label for="" class="col-sm-2 col-form-label">Descripción</label>
                              <div class="col-sm-4">
                                <textarea type="" class="form-control" id="descCliente" name="descCliente" placeholder="Descripción"></textarea>
                              </div>
                              <label for="" class="col-sm-4 col-form-label">Convenios y contratos disponible <span class="iconObligatorio">*</span> (Si/No)</label>
                              <div class="col-sm-2">
                                <!-- <i class="fas fa-toggle-on iconHabilitado"></i> -->
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

    <script>
      $('.contable i').css('color', '#fbb616');
      $('.contable a').addClass('activeMenu');
      $('.contable').addClass('active');
    </script>

  </body>

</html>