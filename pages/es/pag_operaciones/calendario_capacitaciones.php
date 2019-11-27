
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
                <h6 class="text-center">CALENDARIO MENSUAL</h6>
              </div>
            </div>
          </div>

          <!-- Logo Clientes -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contIcono">
                <i class="far fa-calendar-alt"></i>
              </div>              
            </div>          
          </div>

        
          <!-- Seleccionar Fecha -->
          <div class="row">
            <div class="col-lg-3">            
                <input type="date" class="form-control" id="fecha" name="fecha">            
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

          <!-- Dropdown Seleccionar -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Seleccione un elemento</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropSel1" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                    <button class="dropdown-item" type="button">...</button>
                  </div>
                </div>
              </div>              
            </div>          
          </div>

          <!-- Dropdown Seleccionar -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Seleccione un elemento</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropSel2" class="dropdown-menu" aria-labelledby="dropdownMenu2">
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
                  <h6>Calendario de Capacitaciones</h6>
                </div>               
                <div class="contenido-tabla">
                  <div id="ContTablaVerTodos">
                    <table id="calendarioCapacitaciones" class="table table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Domingo</th>
                              <th>Lunes</th>
                              <th>Martes</th>
                              <th>Miércoles</th>
                              <th>Jueves</th>
                              <th>Viernes</th>
                              <th>Sabado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <div id="day" class="text-center">01 <span class="numActCal">(3)</span></div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">02</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <div id="day" class="text-center">03</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">04</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">05</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">06</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">07</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">08</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">09</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <div id="day" class="text-center">10</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">11</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">12</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">13</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">14</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">15</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">16</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <div id="day" class="text-center">17</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">18</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">19</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">20</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">21</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">22</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">23</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <div id="day" class="text-center">24</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">25</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">26</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">27</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>                                
                              </td>
                              <td>
                                <div id="day" class="text-center">28</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">29</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                              <td>
                                <div id="day" class="text-center">30</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>
                          </tr>
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

    <!-- MODAL CONTACTOS CLIENTE -->
    <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          	<center><h2 class="estilo-titulo">Contable - Administrativo "contactos clientes"</h2></center>
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
                              <label for="" class="col-sm-2 col-form-label">Nombre</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="nomCliente" name="nomCliente" placeholder="Nombre">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Cliente<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar Pais -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCliente" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Apellido</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="apellCliente" name="apellCliente" placeholder="Apellido">
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
                              <label for="" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-4">
                                <label class="sr-only" for="emailCliente"></label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                  </div>
                                  <input type="text" class="form-control" id="emailCliente" placeholder="eMail">
                                </div>
                              </div> 
                              <label for="" class="col-sm-2 col-form-label">Cargo<span class="iconObligatorio">*<span></label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Director de ventas</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropCargoCliente" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>                              
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Departamento Empresa</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropDeptoEmpresa" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <label for="" class="col-sm-2 col-form-label">Principal</label>
                              <div class="col-sm-4">
                                <!-- Dropdown Seleccionar -->                                
                                <div class="contDropdown contDropdownFormClientes">
                                  <div class="btn-group">
                                    <button type="button" class="form-control btn btn-primary">Seleccione un elemento</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div id="dropPrincipal" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                                      <button class="dropdown-item" type="button">...</button>
                                    </div>
                                  </div>
                                </div>
                              </div>                              
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                                
                              </div>
                              <label for="" class="col-sm-3 col-form-label">Publicidad disponible<span class="iconObligatorio">*</span> (Si/No)</label>
                              <div class="col-sm-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                              </div>                            
                            </div>
                            <div class="form-group row">
                              <label for="" class="col-sm-2 col-form-label">Observaciones</label>
                              <div class="col-sm-10">
                                <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
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
      $('.operaciones i').css('color', '#fbb616');
      $('.operaciones a').addClass('activeMenu');
      $('.operaciones').addClass('active');
    </script>

  </body>

</html>