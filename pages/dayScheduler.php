


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<?php
  // se utiliza un render para llamar el head los modals
	GetWPContentByid_wph($id_wph,$wpContent,$nWPC); // Recuepracion de los textos de la página
	GetWPHeaderByid($id_wph,$wpHeader,$nWPH);
	if (($nWPC<4) or ($nWPH<1)) {errorWindow("No se reconoce los textos solicitados"); exit;}
  // se utiliza require para hacer llamados desde renders 
    echo '<head>';
	require(RENDERS_DIR."/head.php");
    //require(RENDERS_DIR."/modals.php");
	echo '<script src="'.JS_DIR.'/dayScheduler.js"></script>';
    echo '</head>';
?>
<body>
    <!-- 
        Proyecto: imagenologia
        Guillermo Tobón
         05/02/2016
         Vista del calendario dia  
     -->
     <div class="container">
        <div class="contenido-tabla">
          <div class="fondo-titulo">
            <center><h2 class="estilo-titulo"><?php 
			echo $wpHeader[1];
     		$tipoEstudio_id=isset($_GET["te_ID"]) ? $_GET["te_ID"] : null;
			if (isset($tipoEstudio_id)) {
				te_recoveryToShowByID($te_tn,$te_tList,$tipoEstudio_id);
				if ($te_tn>0) {
					echo ': '.$te_tList[4];
				}
			}
			?></h2></center>
          </div>
          <div class="contenido-img">
            <div class="row">
              <div class="col-md-12">
                <img src="<?php echo '.'.IMG_WEBPAGE_DIR;?>/logoadmin.jpg">
              </div>
            </div>
            <div class="row">
               <!-- div class="col-md-6">
                   <div class="dataTables_length" id="example-length">
                       <ul class="pagination">
                        <li>
                          <a class="estilo-a-pag" href="#" aria-label="Previous">
                            <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
                          </a>
                        </li>
                        <li>
                          <a class="estilo-a-pag" href="#" aria-label="Next">
                            <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                          </a>
                        </li>
                      </ul>
                   </div>
               </div !-->
               <div class="col-md-6">
                 <div class="contenido-botones">
                   <a href="#" name="dia" id="Dia" class="active btn btn-primary estilo-btn-calendario" disabled><?php echo $wpContent[2][4];?></a>
                   <!--a href="Calendario-semana.php" name="semana" id="Semana" class="btn btn-primary estilo-btn-calendario">Semana</a !-->
                   <a href="JavaScript:changeDate('<?php echo $Lang;?>',27 <?php echo isset($_GET["te_ID"]) ? ','.$_GET["te_ID"] : '';?>)" name="mes" id="Mes" class="btn btn-primary estilo-btn-calendario"><?php echo $wpContent[4][4];?></a>
                   <!--div id="example_filter" class="dataTable_filter">
                       <label class="estilo-buscar-calendario">
                           <p class="estilo-p">Buscar:</p><span class="glyphicon glyphicon-search estilo-lupa"></span>
                           <input type="search" name="buscar" id="Buscar" class="form-control estilo-input-buscar" arial-controls="example">
                       </label>
                   </div !-->
                 </div>
               </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div id="datepicker"></div>
                  <div class="datos-estudio-dia">
                    <div class="fondo-titulo-estudio">
                      <center><h4 class="estilo-titulo"><?php echo 'A'.$wpContent[3][4];?></h4></center>
                    </div>
                    <ul>
                    	<input  name="publishedDate" id="publishedDay" type="date" class="form-control" value="<?php echo $paramDate;?>" onBlur="seeDay(<?php echo "'".$Lang."',".$id_wph;?><?php echo isset($_GET["te_ID"]) ? ','.$_GET["te_ID"] : '';?>)"/>
                    </ul>
                    <ul>
                    	<select class="form-control" id="statusCita" name="statusCita" onBlur="changeStatusCita(<?php echo "'".$Lang."',".$id_wph;?><?php echo isset($_GET["te_ID"]) ? ','.$_GET["te_ID"] : '';?>)">
                            <option class="estilo-titulo-campos" value=""
                            <?php
                            if (!isset($statusCita)) {echo  'selected';}?>
                            >Citas para hoy</option>
                            <option class="estilo-titulo-campos" value="A"                            
							<?php
                            if (isset($statusCita) and ($statusCita=='A')) {echo  'selected';}?>
>Activa</option>
                            <option class="estilo-titulo-campos" value="C"
							<?php
                            if (isset($statusCita) and ($statusCita=='C')) {echo  'selected';}?>
                            >Confirmada</option>
                            <option class="estilo-titulo-campos" value="L"
							<?php
                            if (isset($statusCita) and ($statusCita=='L')) {echo  'selected';}?>
                            >Llegado</option>
                            <option class="estilo-titulo-campos" value="F"
							<?php
                            if (isset($statusCita) and ($statusCita=='F')) {echo  'selected';}?>
                            >Finalizado</option>
                            <option class="estilo-titulo-campos" value="X"
							<?php
                            if (isset($statusCita) and ($statusCita=='X')) {echo  'selected';}?>
                            >Cancelado</option>
                            <option class="estilo-titulo-campos" value="T"
							<?php
                            if (isset($statusCita) and ($statusCita=='T')) {echo  'selected';}?>
                            >Transferido</option>
             			</select>
                    </ul>
                    <!-- <ul>
                      <li><?php echo $wpContent[6][4];?>...</li>
                    </ul> !-->
                       <select class="form-control" id="teID" name="teID" onBlur="changeTE(<?php echo "'".$Lang."',".$id_wph;?>)">
                            <option class="estilo-titulo-campos" value="" <?php 
							if (!isset($tipoEstudio_id)) {echo  'selected';}
							echo '>'.$wpContent[6][4].'...</option>'; // Todos los estudios
							  te_recoveryAllListEnabled($te_n,$te_List,1);
                              for ($i=0;$i<$te_n;$i++){ // iteracion para todos los estudios registrados
                                if ($te_n>0){
									$te_id=($te_n>1) ? $te_List[$i][0] : $te_List[0];
                            		echo '<option class="estilo-titulo-campos" value="'.$te_id.'"';
									if (isset($tipoEstudio_id)) {
										if ($tipoEstudio_id==$te_id) {
											echo  'selected';
										}
									}
									echo '>'.(($te_n>1) ? $te_List[$i][4] : $te_List[4]).'</option>';
								}
							  }
						?></select>
                    
					<?php
                      /* echo '<ul style="text-align: left">';
                      echo '<li><a href="JavaScript:seeDay(';
					  echo "'".$Lang."',".$id_wph.",null";
					  echo ')">';
					  echo $wpContent[0][4];
					  echo '</a></li>';
                      echo '</ul>';
					  te_recoveryAllListEnabled($te_n,$te_List,1);
					  for ($i=0;$i<$te_n;$i++){
						if ($te_n>0){
                    		echo '<ul style="text-align: left">';
                      		echo '<li><a href="JavaScript:seeDay(';
							echo "'".$Lang."',".$id_wph.",";
							echo ($te_n>1) ? $te_List[$i][0] : $te_List[0];
							echo ')">';
							echo ($te_n>1) ? $te_List[$i][4] : $te_List[4];
							echo '</a></li>';
                    		echo '</ul>';
						}
					  }*/
                      ?>

                  </div>
                </div>
                <div class="col-md-8">
                  <div class="contenedor-tabla">
                    <table class="table table-bordered estilo-tabla">
                      <thead>
                        <tr class="estilo-tr">
                          <th><?php echo $wpContent[5][4];?></th>
                          <th class="estilo-th"><?php echo $wpContent[3][4];?></th>
                        </tr>
                      </thead>
                      <tbody class="estilo-tbody">
                        <tr>
                        <?php
						$hh=7;// se define el horario de citas, se ha solicitado solo de 8am a 7pm
						for ($i=7;$i<19;$i++){ // se define el horario de citas, se ha solicitado solo de 8am a 7pm
							$cit_n=NULL;
							$cit_List=NULL;
							cit_recoveryAllListByExactDayHH($cit_n,$cit_List,(isset($statusCita)) ? "'".$statusCita."'" : "'A','L','C'",$tipoEstudio_id,null,$paramDateArray[2],$paramDateArray[1],$paramDateArray[0],($hh<10) ? '0'.$hh : $hh);
							
							// Se imprime el horario
							echo '<td id="HoraCalenDia" name="hora-calen-dia"><font style="font-weight:bold">';
							if ($hh<10) {
								$setHour='0'.$hh;
							}else{
								$setHour=$hh;
							}
							echo $setHour;
							echo ' - '; 
							echo (($hh+1)<10) ? '0'.($hh+1) : $hh+1;
							echo '</font>';
							if ($cit_n>0) {
								echo '<br><font style="color: #990033">('.$cit_n.')<font>';
								echo '<a data-toggle="tooltip" data-placement="bottom" title="Ver detalles"  href="JavaScript:seeHour(';
								echo "'".$Lang."',28,";
								echo isset($tipoEstudio_id) ? $tipoEstudio_id : "null"; //($te_n>1) ? $te_List[$i][0] : $te_List[0];
								echo ','.$setHour.')">';
								echo '  <span class="glyphicon glyphicon-list glyphicon-dia"></span>';
								echo '</a>';
							}else{
								echo '<br>';
							}
							echo '<a data-toggle="tooltip" data-placement="bottom" title="Agregar un evento" href="frm_citas.php?action=insert&pa_ID=25&Lang='.$Lang.'&setDate='.$paramDateArray[0].'-'.$paramDateArray[1].'-'.$paramDateArray[2].'&setHour='.$hh.'" target="_blank">';
							echo '  <span class="glyphicon glyphicon-plus-sign glyphicon-dia"></span>';
							echo '</a>';
							echo '</td>';
                          	echo '<td class="icon-mas" id="CitaCalenDia" name="cita-calen-dia">';
							if ($cit_n>3) {$cit_n=3;}
// <!-- ***************************** inicio contenido del horario ****************!-->
							if ($cit_n>0) {
								for ($j=0;$j<$cit_n;$j++){
									echo '<div class="espacio-datos">';
									echo '  <div class="row">';
									echo '    <div class="col-md-8 col-sm-8 col-xs-7">';
									echo '      <div class="contenido-editar">';
										if ($cit_n>1) {
											$pac_n=NULL;
											$pac_Docs=NULL;
											pac_recoveryAllByID($pac_n,$pac_Docs,$cit_List[$j][1]);
											$statusCitaLocal=$cit_List[$j][24];
											echo $cit_List[$j][0].". ".$cit_List[$j][2].". ".$pac_Docs[12].". ".$cit_List[$j][14].". Estado: ".$statusCitaLocal;
										}else{
											pac_recoveryAllByID($pac_n,$pac_Docs,$cit_List[1]); // $pac_Docs[1]
											$statusCitaLocal=$cit_List[24];
											echo $cit_List[0].". ".$cit_List[2].". ".$pac_Docs[12].". ".$cit_List[14].". Estado: ".$statusCitaLocal;
										}
									echo '      </div>';
									echo '    </div>';
									echo '    <div class="col-md-4 col-sm-4 col-xs-5">';
// boton de Editar
									if ((($statusCitaLocal=='A') or ($statusCitaLocal=='C') or ($statusCitaLocal=='L')) and ($UserGroup==1)) {
										echo '      <a data-toggle="tooltip" data-placement="bottom" title="Cambiar precio" href="frm_citas.php?action=update&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '" target="_blank">';
										echo '        <span class="glyphicon glyphicon-pencil glyphicon-pencil"></span>';
										echo '      </a>';
									}
// boton de Ver detalles
									echo '		<a data-toggle="tooltip" data-placement="bottom" title="Ver detalles"  href="frm_citas.php?action=view&pa_ID=25&Lang='.$Lang.'&id=';
									if ($cit_n>1) {
										echo $cit_List[$j][0];
									}else{
										echo $cit_List[0];
									}
									echo '		" target="_blank">';
									echo '  	<span class="glyphicon glyphicon-list glyphicon-dia"></span>';
									echo '		</a>';
// boton de confirm
									if (($statusCitaLocal=='A') and ($UserGroup==2)) {
										echo '		<a data-toggle="tooltip" data-placement="bottom" title="Confirmar"  href="JavaScript:setStatusCita_Ajax(';
										echo "'confirm',";
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo ",'25','".$Lang."')";
										echo '">';
										//echo '		" target="_blank">';
										echo '  	<span class="glyphicon glyphicon-check glyphicon-check"></span>';
										echo '		</a>';
									}
// boton de llegada
									if ((($statusCitaLocal=='A') or ($statusCitaLocal=='C')) and ($UserGroup==2)) {
										/*echo '		<a data-toggle="tooltip" data-placement="bottom" title="Marcar como llegado"  href="frm_citas.php?action=llegada&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '		" target="_blank">';*/
										echo '		<a data-toggle="tooltip" data-placement="bottom" title="Marcar como llegado"  href="JavaScript:setStatusCita_Ajax(';
										echo "'llegada',";
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo ",'25','".$Lang."')";
										echo '">';
										echo '  	<span class="glyphicon glyphicon-flag glyphicon-flag"></span>';
										echo '		</a>';
									}
// boton de Finalizado
									if ((/*($statusCitaLocal=='A') or ($statusCitaLocal=='C') or*/ ($statusCitaLocal=='L')) and (($UserGroup==2) or ($UserGroup==3))) {
										/*echo '		<a data-toggle="tooltip" data-placement="bottom" title="Marcar finalizado" href="frm_citas.php?action=asistido&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '		" target="_blank">';*/
										echo '		<a data-toggle="tooltip" data-placement="bottom" title="Marcar como finalizado"  href="JavaScript:setStatusCita_Ajax(';
										echo "'asistido',";
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo ",'25','".$Lang."')";
										echo '">';
										echo '  	<span class="glyphicon glyphicon-ok glyphicon-ok"></span>';
										echo '		</a>';
									}
// boton de Trasnferido o reprogramado
									if (($UserGroup==2) and (($statusCitaLocal=='A') or ($statusCitaLocal=='C') or ($statusCitaLocal=='L'))) {
/*
 ************* Codigo con bootstrap modal */
 										echo '		<a data-toggle="tooltip" data-placement="bottom" title="Reprogramar cita"  href="frm_citas.php?action=transfer&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '		" target="_blank">';
										echo '  	<span class="glyphicon glyphicon-refresh glyphicon-refresh"></span>';
										echo '		</a>';
									}

										/*
	**************** Código original
										 echo '		<a data-toggle="tooltip" data-placement="bottom" title="Reprogramar cita"  href="frm_citas.php?action=transfer&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '		" target="_blank">';
										echo '  	<span class="glyphicon glyphicon-refresh glyphicon-refresh"></span>';
										echo '		</a>';
									}*/

// boton de Cancelado
									if (($UserGroup==2) and (($statusCitaLocal=='A') or ($statusCitaLocal=='C') or ($statusCitaLocal=='L'))) {
										/*echo '		<a data-toggle="tooltip" data-placement="bottom" title="Cancelar Cita"  href="frm_citas.php?action=cancel&pa_ID=25&Lang='.$Lang.'&id=';
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo '		" target="_blank">';*/
/* ********* con bootstrap modal */
?>
										<a href="" data-toggle="modal" data-target="#myModal<?php
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
?>" data-placement="bottom" title="Cancelar Cita"><span class="glyphicon glyphicon-remove glyphicon-remove"></span></a>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Describa brevemente el motivo</h4>
        </div>
        <div class="modal-body">
          <p><input type="text" class="form-control" id="comentario<?php
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
?>" name="comentario" value="" /></p>
        </div>
        <div class="modal-footer"> <!-- class="btn btn-default" data-dismiss="modal" -->
          <button type="Submit" class="btn btn-success btn-block" onclick="<?php
          								echo 'JavaScript:transferCancelCita_Ajax(';
										echo "'cancel',";
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo ",'25','".$Lang."')";
										?>">Enviar</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- FIN Modal

										echo '		  href=>';
										echo '  	';
										echo '		;
									}

 -->
<?php
							}// es el mismo que esta 4 lineas mas arriba cierra el ciclo de las citas por hora
/* ******** original
										echo '		<a data-toggle="tooltip" data-placement="bottom" title="Cancelar Cita"  href="JavaScript:setStatusCita_Ajax(';
										echo "'cancel',";
										if ($cit_n>1) {
											echo $cit_List[$j][0];
										}else{
											echo $cit_List[0];
										}
										echo ",'25','".$Lang."')";
										echo '">';
										echo '  	<span class="glyphicon glyphicon-remove glyphicon-remove"></span>';
										echo '		</a>';
									} */
// Fin de botones
									echo '    </div>';
									echo '  </div>';
									echo '</div>';
								} // cierra el bloque del if cita_n es mayor a cero 
							} // Cierra el bloque del recorrido de todas las horas del calendario
							$hh++;
// <!-- ***************************** fin contenido del horario ****************!-->
                            echo '</td>';
                        	echo '</tr>';
						}
						?>
                      </tbody>
                      <input type="hidden" name="hidden-calen-dia">
                    </table>
                 </div>
               </div>
              </div>
          </div>
        </div>




        <!--table id="my_table" size="4" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="primera_col">Contenido largo</td>
          </tr>
</table !--> 
     </div>
</body>
</html>