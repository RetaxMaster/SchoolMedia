<!------------------------------------ 
Nombre: tbl_cagenclients
Alias: tbl_0042
------------------------------------->
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
                <h6 class="text-center">HISTÓRICO DE NEGOCIACIONES Y SEGUIMIENTOS POR CLIENTE</h6>
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
                    <h6>Parámetros de búsqueda</h6>
                    </div>               
                        <!-- Dropdown Seleccionar Paises -->
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="contDropdown">
                                <select id="selectCtry" name="locality" onchange="loadProv(this)"  class="form-control">
                                <option value="-1">{$selectCtry}</option>
                                </select>
                            </div>          
                            </div>          
                        </div>

                        <!-- Dropdown Seleccionar tipo de cliente -->
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="contDropdown">
                                <select id="selectTipoClient" name="selectTipoClient" onchange="loadProv(this)"  class="form-control">
                                <option value="-1">{$selectCtry}</option>
                                </select>
                            </div>          
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
                              <th>Último contacto</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td></span></td>
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
          	<center><h2 class="estilo-titulo">"Nombre Cliente"</h2></center>
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
                                <input type="text" class="form-control" id="id_track" name="id_track" placeholder="id" disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Cliente<span class="iconObligatorio">*<span></label>
                                <!-- Dropdown Seleccionar cliente -->
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="contDropdown">
                                        <select id="selectClient" name="selectClient" onchange="loadProv(this)"  class="form-control">
                                        <option value="-1">{$selectCtry}</option>
                                        </select>
                                    </div>          
                                    </div>          
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Contacto<span class="iconObligatorio">*<span></label>
                                <!-- Dropdown Seleccionar cliente -->
                                <div class="row">
                                        <div class="col-lg-6">
                                        <div class="contDropdown">
                                            <select id="selectClient" name="selectClient" onchange="loadProv(this)"  class="form-control">
                                            <option value="-1">{$selectCtry}</option>
                                            </select>
                                        </div>          
                                        </div>          
                                    </div>
                             </div>
                             <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Etapa de negociación<span class="iconObligatorio">*<span></label>
                                <!-- Dropdown Seleccionar cliente -->
                                <div class="row">
                                        <div class="col-lg-6">
                                        <div class="contDropdown">
                                            <select id="selectProcCRM" name="selectProcCRM" onchange="loadProv(this)"  class="form-control">
                                            <option value="-1">{$selectCtry}</option>
                                            </select>
                                        </div>          
                                        </div>          
                                    </div>
                             </div>
                             <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Acción de Seguimiento<span class="iconObligatorio">*<span></label>
                                <!-- Dropdown Seleccionar cliente -->
                                <div class="row">
                                        <div class="col-lg-6">
                                        <div class="contDropdown">
                                            <select id="selectsubProcCRM" name="selectsubProcCRM" onchange="loadProv(this)"  class="form-control">
                                            <option value="-1">{$selectCtry}</option>
                                            </select>
                                        </div>          
                                        </div>          
                                    </div>
                             </div>
 
                             <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Acción realizada</label>
                              <div class="col-sm-10">
                                <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Registrado por:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="nombreUsuario"></textarea>
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