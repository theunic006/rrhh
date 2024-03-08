<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<!--=====================================
LISTAR PERSONAL
======================================-->

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administracion del Personal
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administracion del Personal</li>
    
    </ol>

  </section>
<!--=====================================
LISTAR PERSONALES
======================================-->

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPersonal">
          Agregar Personal
        </button>
      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              
              <th style="width:10px">#</th>
              <th>Observacion</th>
              <th>Nombre</th>
              <th>Documento ID</th>
              <th>Cargo</th>
              <th>Celular</th>
              <th>Edad</th> 
              <th>Documentacion</th>
              <th>Acciones</th>
              <th>Examenes</th>

            </tr> 
          </thead>
          <tbody>

          <?php

            $item = null;
            $valor = null;

            $personales = ControladorPersonales::ctrMostrarPersonales($item, $valor);

            foreach ($personales as $key => $value) {

              $firma =$value["firma"];
              $huella =$value["huella"];
              $dnii =$value["dnii"];
              $cv =$value["cv"];
              $observacion =$value["observacion"];
              $examen =$value["certificado"];
              $induccion =$value["induccion"];
              $acta =$value["acta"];

              if($firma=='SI'){$firma = '25';}else{$firma = '0';}
              if($huella=='SI'){$huella = '25';}else{$huella = '0';}
              if($dnii=='SI'){$dnii = '25';}else{$dnii = '0';}
              if($cv=='SI'){$cv = '25';}else{$cv = '0';}

              $total = $firma+$huella+$dnii+$cv;
              $progreso = $firma+$huella+$dnii+$cv;
              
              if($progreso<'51'){
                $progreso = 'progress-bar progress-bar-danger';
                $badge = 'badge bg-red';
              }elseif ($progreso<'76') {
                $progreso = 'progress-bar progress-bar-yellow';
                $badge = 'badge bg-yellow';
              }else{
                $progreso = 'progress-bar progress-bar-green';
                $badge = 'badge bg-green';
              }

              if($observacion=='SI'){$observacion='btn btn-danger ';}else{$observacion='btn btn-success ';}

              if($examen=='NO'){$examen='btn btn-danger ';}else{$examen='btn btn-success ';}
              if($induccion=='SI' && $acta=='SI'){$induccion='btn btn-success ';}else{$induccion='btn btn-danger ';}
              

              echo '<tr>

                      <td>'.($key+1).'</td>';
              echo  '<td><button class="'.$observacion.' btnEditarObservacion" data-toggle="modal" data-target="#modalEditarObservacion" idObservacion="'.$value["id"].'"><i class="fa fa-times"></i>Observaciones</button></td>';

              echo'<td>'.$value["nombre"].'</td>
                      <td>'.$value["dni"].'</td>
                      <td>'.$value["cargo"].'</td>
                      <td>'.$value["celular"].'</td>
                      <td>'.$value["edad"].'</td>';

              echo '<td><div class="progress progress-xs">
                      <div class="'.$progreso.'" style="width: '.$total.'%"></div>
                      </div><span class="'.$badge.'">'.$total.'%</span>
                      </td>';


              echo    '<td>
                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditarPersonal" data-toggle="modal" data-target="#modalEditarPersonal" idPersonal="'.$value["id"].'"><i class="fa fa-eye"></i> Inspeccionar</button> 
                          <button class="btn btn-success btnEditarExperiencia" data-toggle="modal" data-target="#modalEditarExperiencia" idExperiencia="'.$value["id"].'"><i class="fa fa-users"></i> Exp</button>
                          <button class="btn btn-primary btnEditarFamiliar" data-toggle="modal" data-target="#modalEditarFamiliar"  idFamiliar="'.$value["id"].'"><i class="fa fa-users"></i> Familiar</button>';

                        echo '</div>  

                      </td>';


                      echo    '<td>
                      <div class="btn-group">';
                          
                          echo '<button class="'.$examen.' btnEditarExamen" data-toggle="modal" data-target="#modalEditarExamen" idExamen="'.$value["id"].'"><i class="fa fa-user-md"></i> Examen</button>
                          <button class="'.$induccion.' btnEditarInduccion" data-toggle="modal" data-target="#modalEditarInduccion" idInduccion="'.$value["id"].'"><i class="fa fa-odnoklassniki-square"></i> Induccion</button>';

                      echo '</div>  

                    </td>';

                echo '</tr>';
            
              }

          ?>
    
          </tbody>
       </table>
      </div>
    </div>
  </section>

</div>

<!--=====================================
MODAL AGREGAR PERSONAL
======================================-->

<div id="modalAgregarPersonal" class="modal fade" role="dialog">
  
  <div class="modal-dialog " style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Personal</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="dni" placeholder="Ingresar DNI" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL CARGO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-recycle"></i></span> 
                <select class="form-control input-lg select-picker" name="cargo" id="cargo">
                  <option value="">SELECCIONE CARGO</option>
                  <option value="GERENTE DE OPERACIONES">GERENTE DE OPERACIONES</option>
                  <option value="INGENIERO DE SEGURIDAD">INGENIERO DE SEGURIDAD</option>
                  <option value="SUPERVISOR OPERATIVO">SUPERVISOR OPERATIVO</option>
                  <option value="SUPERVISOR ELECTRICISTA">SUPERVISOR ELECTRICISTA</option>
                  <option value="RESIDENTE">RESIDENTE</option>
                  <option value="SUPERVISOR">SUPERVISOR</option>
                  <option value="ASISTENTE DE SUPERVISION">ASISTENTE DE SUPERVISION</option>
                  <option value="ASISTENTE ADMINISTRATIVO">ASISTENTE ADMINISTRATIVO</option>
                  <option value="MECANICO">MECANICO</option>
                  <option value="ALINEADOR">ALINEADOR</option>
                  <option value="SOLDADOR">SOLDADOR</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CELULAR -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="celular" placeholder="Ingresar Celular" data-inputmask="'mask':'999999999'" data-mask required>
              </div>
            </div>

            <!-- ENTRADA PARA LA nacionalidad -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="nacionalidad" placeholder="Ingresar Nacionalidad" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL genero -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-intersex"></i></span> 
                <select class="form-control input-lg select-picker" name="genero" id="genero">
                  <option value="">SELECCIONE GENERO</option>
                  <option value="MASCULINO">MASCULINO</option>
                  <option value="FEMENINO">FEMENINO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA estado civil -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg select-picker" name="estadocivil" id="estadocivil">
                  <option value="">SELECCIONE SU ESTADO CIVIL</option>
                  <option value="CASADO">CASADO</option>
                  <option value="SOLTERO">SOLTERO</option>
                  <option value="DIVORCIADO">DIVORCIADO</option>
                  <option value="VIUDO">VIUDO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA grupo sanguineo -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-ils"></i></span> 
                <select class="form-control input-lg select-picker" name="gruposanguineo" id="gruposanguineo">
                  <option value="">SELECCIONE SU GRUPO SANGUINEO</option>
                  <option value="O-">O-</option>
                  <option value="O+">O+</option>
                  <option value="A-">A-</option>
                  <option value="A+">A+</option>
                  <option value="B-">B-</option>
                  <option value="B+">B+</option>
                  <option value="AB-">AB-</option>
                  <option value="AB+">AB+</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechanacimiento" placeholder="Ingresar fecha nacimiento"  required>
              </div>
            </div>

            
            <!-- ENTRADA PARA LA Edad-->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hand-peace-o"></i></span> 
                <input type="text" class="form-control input-lg" name="edad" placeholder="Ingresar Su Edad" data-inputmask="'mask':'99'" data-mask required>
              </div>
            </div>

            <!-- ENTRADA PARA LA direccion -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i></span> 
                <input type="text" class="form-control input-lg" name="direccion" placeholder="Ingresar Direccion" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA distrito -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-alpha-desc"></i></span> 
                <input type="text" class="form-control input-lg" name="distrito" placeholder="Ingresar Distrito" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA provincia -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span> 
                <input type="text" class="form-control input-lg" name="provincia" placeholder="Ingresar Provincia" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA departamento -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-amount-desc"></i></span> 
                <input type="text" class="form-control input-lg" name="departamento" placeholder="Ingresar Departamento" required>
              </div>
            </div>

            <!-- ENTRADA PARA FIRMA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR IMAGEN FIRNA (BIEN CLARO) </div>
              <input type="file" class="imagenfirma" name="imagenfirma">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/personal/default/firma.png" class="img-thumbnail previsualizarFirma" width="100px">
            </div>

            <!-- ENTRADA PARA HUELLA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR IMAGEN HUELLA (BIEN CLARO) </div>
              <input type="file" class="imagenhuella" name="imagenhuella">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/personal/default/huella.png" class="img-thumbnail previsualizarHuella" width="100px">
            </div>

            <!-- ENTRADA PARA DNI -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF DNI </div>
              <input type="file" class="pdfdni" name="pdfdni">
              <p class="help-block">Peso máximo de la foto 10MB</p>
            </div>

              <!-- ENTRADA PARA CV -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF CV </div>
              <input type="file" class="pdfcv" name="pdfcv">
              <p class="help-block">Peso máximo de la foto 10MB</p>
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar personal</button>
        </div>

      </form>

      <?php

        $crearPersonal = new ControladorPersonales();
        $crearPersonal -> ctrCrearPersonal();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarPersonal" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Datos del Personal</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="editnombre" id="editnombre" required>
                <input type="hidden" id="idPersonal" name="idPersonal">
              </div>
            </div>

             <!-- ENTRADA PARA EL DOCUMENTO ID -->
             <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="editdni" id="editdni" required readonly>
              </div>
            </div>

            <!-- ENTRADA PARA EL CARGO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-recycle"></i></span> 
                <select class="form-control input-lg select-picker" name="editcargo" id="editcargo">
                  <option value="">SELECCIONE CARGO</option>
                  <option value="GERENTE DE OPERACIONES">GERENTE DE OPERACIONES</option>
                  <option value="INGENIERO DE SEGURIDAD">INGENIERO DE SEGURIDAD</option>
                  <option value="SUPERVISOR OPERATIVO">SUPERVISOR OPERATIVO</option>
                  <option value="SUPERVISOR ELECTRICISTA">SUPERVISOR ELECTRICISTA</option>
                  <option value="RESIDENTE">RESIDENTE</option>
                  <option value="SUPERVISOR">SUPERVISOR</option>
                  <option value="ASISTENTE DE SUPERVISION">ASISTENTE DE SUPERVISION</option>
                  <option value="ASISTENTE ADMINISTRATIVO">ASISTENTE ADMINISTRATIVO</option>
                  <option value="MECANICO">MECANICO</option>
                  <option value="ALINEADOR">ALINEADOR</option>
                  <option value="SOLDADOR">SOLDADOR</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CELULAR -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="editcelular" id="editcelular" data-inputmask="'mask':'999999999'" data-mask required>
              </div>
            </div>

            <!-- ENTRADA PARA LA nacionalidad -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="editnacionalidad" id="editnacionalidad" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL genero -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-intersex"></i></span> 
                <select class="form-control input-lg select-picker" name="editgenero" id="editgenero">
                  <option value="">SELECCIONE GENERO</option>
                  <option value="MASCULINO">MASCULINO</option>
                  <option value="FEMENINO">FEMENINO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA estado civil -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg select-picker" name="editestadocivil" id="editestadocivil">
                  <option value="">SELECCIONE SU ESTADO CIVIL</option>
                  <option value="CASADO">CASADO</option>
                  <option value="SOLTERO">SOLTERO</option>
                  <option value="DIVORCIADO">DIVORCIADO</option>
                  <option value="VIUDO">VIUDO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA grupo sanguineo -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-ils"></i></span> 
                <select class="form-control input-lg select-picker" name="editgruposanguineo" id="editgruposanguineo">
                  <option value="">SELECCIONE SU GRUPO SANGUINEO</option>
                  <option value="O-">O-</option>
                  <option value="O+">O+</option>
                  <option value="A-">A-</option>
                  <option value="A+">A+</option>
                  <option value="B-">B-</option>
                  <option value="B+">B+</option>
                  <option value="AB-">AB-</option>
                  <option value="AB+">AB+</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="editfechanacimiento" id="editfechanacimiento" required>
              </div>
            </div>

            
            <!-- ENTRADA PARA LA Edad-->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hand-peace-o"></i></span> 
                <input type="text" class="form-control input-lg" name="editedad" id="editedad" data-inputmask="'mask':'99'" data-mask >
              </div>
            </div>

            <!-- ENTRADA PARA LA direccion -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i></span> 
                <input type="text" class="form-control input-lg" name="editdireccion" id="editdireccion">
              </div>
            </div>

            <!-- ENTRADA PARA LA distrito -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-alpha-desc"></i></span> 
                <input type="text" class="form-control input-lg" name="editdistrito" id="editdistrito">
              </div>
            </div>

            <!-- ENTRADA PARA LA provincia -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span> 
                <input type="text" class="form-control input-lg" name="editprovincia" id="editprovincia">
              </div>
            </div>

            <!-- ENTRADA PARA LA departamento -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-amount-desc"></i></span> 
                <input type="text" class="form-control input-lg"  name="editdepartamento" id="editdepartamento">
              </div>
            </div>

            <!-- ENTRADA PARA FIRMA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR IMAGEN FIRNA (BIEN CLARO) </div>
              <input type="file" class="imagenfirma" name="editimagenfirma">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/personal/default/firma.png" class="img-thumbnail previsualizarFirma" width="100px">
              <input type="hidden" name="firmaactual" id="firmaactual">
            </div>

            <!-- ENTRADA PARA HUELLA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR IMAGEN HUELLA (BIEN CLARO) </div>
              <input type="file" class="imagenhuella" name="editimagenhuella">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/personal/default/huella.png" class="img-thumbnail previsualizarHuella" width="100px">
              <input type="hidden" name="huellaactual" id="huellaactual">
            </div>

            <!-- ENTRADA PARA DNI -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF DNI </div>
              <input type="file" class="pdfdni" name="editpdfdni">
              <p class="help-block">Peso máximo de la foto 10MB</p>
              
              <a href="#" id="enlacedni" target="_blank" rel="noopener noreferrer"><img src="vistas/img/personal/default/pdf2.png" class="img-thumbnail previsualizardni" width="100px"></a>
              <input type="hidden" name="dniactual" id="dniactual">
              <input type="text" name="dnidni" id="dnidni" disabled>
            </div>

              <!-- ENTRADA PARA CV -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF CV </div>
              <input type="file" class="pdfcv" name="editpdfcv">
              <p class="help-block">Peso máximo de la foto 10MB</p>
              <a href="#" id="enlacecv" target="_blank" rel="noopener noreferrer"><img src="vistas/img/personal/default/pdf2.png" class="img-thumbnail previsualizarcv" width="100px"></a>
              <input type="hidden" name="cvactual" id="cvactual">
              <input type="text" name="cvcv" id="cvcv" disabled>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarPersonal = new ControladorPersonales();
        $editarPersonal -> ctrEditarPersonal();

      ?>

    

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR FAMILIAR
======================================-->

<div id="modalEditarFamiliar" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Datos del Familiar</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nombreFam" id="nombreFam" placeholder="Nombre del Familiar" required >
                <input type="hidden" id="idFamiliar" name="idFamiliar">
                <input type="hidden" id="idFamPersonal" name="idFamPersonal">
              </div>
            </div>
            
            <!-- ENTRADA PARA EL PARENTESCO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg select-picker" name="parentescoFam" id="parentescoFam" placeholder="Seleccione Parentesco">
                  <option value="">SELECCIONE PARENTESCO</option>
                  <option value="ESPOSO ESPOSA">ESPOSO ESPOSA</option>
                  <option value="HIJO">HIJO</option>
                  <option value="MADRE">MADRE</option>
                  <option value="PADRE">PADRE</option>
                  <option value="APODERADO">APODERADO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CELULAR -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="celularFam" id="celularFam" data-inputmask="'mask':'999999999'" data-mask placeholder="escriba numero de Celular" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PLANILLA -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-support"></i></span> 
                <select class="form-control input-lg select-picker" name="planillaFam" id="planillaFam" placeholder="Esta en Planilla?">
                  <option value="">ESTA EN PLANILLA?:</option>
                  <option value="SI">PLANILLA - SI</option>
                  <option value="NO">PLANILLA - NO</option>
                </select>
              </div>
            </div>
              <!-- ENTRADA PARA FOTOGRAFIA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR FOTOGRAFIA </div>
              <input type="file" class="imagenfoto" name="fotoFam">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/usuarios/default/191.jpg" class="img-thumbnail previsualizarFoto" width="100px">
              <input type="hidden" name="fotoactual" id="fotoactual">
            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarFamiliar = new ControladorPersonales();
        $editarFamiliar -> ctrEditarFamiliar();

      ?>

    

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR EXPERIENCIA
======================================-->

<div id="modalEditarExperiencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <input type="button" class="btn btn-success pull-left" value="Agregar Experiencia" onclick="agregarexp();" />
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-plus"></i></span> 
                <input type="text" id="idnose" name="idnose">
              </div>
            </div>
            <!-- ENTRADA PARA EL PARENTESCO -->
            <div class="form-group col-md-6" id="cajatipo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control input-lg select-picker" name="exptipo" id="exptipo" placeholder="Seleccione Parentesco">
                  <option value="">TIPO EXPERIENCIA</option>
                  <option value="MINA">MINA</option>
                  <option value="SUPERFICIE">SUPERFICIE</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajaempresa">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expempresa" id="expempresa" placeholder="Nombre de la Empresa" >
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajacargo">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expcargo" id="expcargo" placeholder="Escriba el Cargo" >
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajaarea">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="exparea" id="exparea" placeholder="Escriba el Area" >
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            <div class="form-group col-md-6" id="cajafechainicio">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="expfechainicio" id="expfechainicio"  placeholder="Fecha de Inicio">
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            <div class="form-group col-md-6" id="cajafechafin">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="expfechafin" id="expfechafin"  placeholder="Fecha Fin">
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajaanio">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expanio" id="expanio" placeholder="Años" >
                <input type="hidden" id="idExpPersonal" name="idExpPersonal">
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajames">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expmes" id="expmes" placeholder="Meses" >
                <input type="hidden" id="idExpPersonal" name="idExpPersonal">
              </div>
            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajadia">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expdia" id="expdia" placeholder="Dias" >
                <input type="hidden" id="idExpPersonal" name="idExpPersonal">
              </div>
            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group col-md-6" id="cajaobservaciones">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="expobservaciones" id="expobservaciones" placeholder="Escriba alguna Observacion" >
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" id="cajaboton">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>
      <?php

      $editarExperiencia = new ControladorPersonales();
      $editarExperiencia -> ctrEditarExperiencia();

      ?>
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Experiencia</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    
                    <th style="width:10px">#</th>
                    <th>EMPRESA</th>
                    <th>TIPO</th>
                    <th>Cargo</th>
                    <th>AREA</th>

                  </tr> 
                </thead>
                <tbody>

                  <?php

                    $item = 'idpersonal';
                    $valor = $_SESSION["idExperiencia"];

                    $personales = ControladorPersonales::ctrMostrarExperiencia($item, $valor);

                    foreach ($personales as $key => $value) {

                      echo '<tr>

                              <td>'.($key+1).'</td>';

                      echo'<td>'.$value["empresa"].'</td>
                              <td>'.$value["tipo"].'</td>
                              <td>'.$value["cargo"].'</td>
                              <td>'.$value["sector"].'</td>';
                        echo '</tr>';
                    
                      }

                  ?>
          
                </tbody>
            </table>
          </div>
        </div>


    

    </div>

  </div>

</div>


<!--=====================================
MODAL AGREGAR EXAMEN
======================================-->

<div id="modalEditarExamen" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Datos de Examen Medico</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechainicioExam" id="fechainicioExam"  placeholder="Fecha de Inicio de Examen Medico">
                <input type="hidden" name="idExamen" id="idExamen">
                <input type="hidden" name="idExamPersonal" id="idExamPersonal">
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE VENCIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechafinExam" id="fechafinExam"  placeholder="Fecha Fin de Examen Medico">
              </div>
            </div>

            <!-- ENTRADA PARA EL CANTIDAD DE DIAS -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-minus-o"></i></span> 
                <input type="text" class="form-control input-lg" name="cantidaddiasExam" id="cantidaddiasExam" data-inputmask="'mask':'999'" data-mask placeholder="Cantidad Dias">
              </div>
            </div>

            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-binoculars"></i></span> 
                <select class="form-control input-lg select-picker" name="estadoExam" id="estadoExam" placeholder="Estado del Examen Medico">
                  <option value="">ESTADO DEL EXAMEN:</option>
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="VENCIDO">VENCIDO</option>
                  <option value="NO TIENE">NO TIENE</option>
                </select>
              </div>
            </div>
            <!-- ENTRADA PARA EL CLINICA -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span> 
                <input type="text" class="form-control input-lg" name="clinicaExam" id="clinicaExam" placeholder="Nombre de la Clinica">
              </div>
            </div>

            <!-- ENTRADA PARA EL VACUNA -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eyedropper"></i></span> 
                <select class="form-control input-lg select-picker" name="vacunaExam" id="vacunaExam" placeholder="Esta vacunado?">
                  <option value="">Tiene Vacunas?</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA CERTIFICADO EXAMEN MEDICO -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF CERTIFICADO MEDICO </div>
              <input type="file" class="pdfcertificado" name="editpdfcertificado">
              <p class="help-block">Peso máximo de la foto 10MB</p>
              
              <a href="#" target="_blank" id="examenmedicopdf"><img src="vistas/img/personal/default/pdf2.png" class="img-thumbnail previsualizarcertificado" width="100px"></a>
              <input type="hidden" name="certificadoactual" id="certificadoactual">
              <input type="text" name="cercer" id="cercer" disabled>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarExamen = new ControladorPersonales();
        $editarExamen -> ctrEditarExamen();

      ?>

    

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR INDUCCION
======================================-->

<div id="modalEditarInduccion" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Datos su Induccion</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechainicioInd" id="fechainicioInd"  data-mask placeholder="Fecha de Inicio de Induccion">
                <input type="hidden" name="idInduccion" id="idInduccion">
                <input type="hidden" name="idIndPersonal" id="idIndPersonal">
              </div>
            </div>

            <!-- ENTRADA PARA LA FECHA DE VENCIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechafinInd" id="fechafinInd"  data-mask placeholder="Fecha Fin de Induccion">
              </div>
            </div>

            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-binoculars"></i></span> 
                <select class="form-control input-lg select-picker" name="estadoInd" id="estadoInd" placeholder="Estado de la Induccion">
                  <option value="">ESTADO:</option>
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="VENCIDO">VENCIDO</option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL PROBLEMA -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-binoculars"></i></span> 
                <select class="form-control input-lg select-picker" name="causaInd" id="causaInd" placeholder="Porque no esta Activo su Induccion">
                  <option value="">CAUSA DE NO ACTIVO:</option>
                  <option value="NINGUNO">NINGUNO</option>
                  <option value="CADUCO">CADUCO</option>
                  <option value="NO TIENE">NO TIENE</option>
                </select>
              </div>
            </div>
            <!-- ENTRADA PARA CERTIFICADO INDUCCION -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF CERTIFICADO MEDICO </div>
              <input type="file" class="pdfinduccion" name="editpdfinduccion">
              <p class="help-block">Peso máximo de la foto 10MB</p>
              
              <a href="#" target="_blank" id="induccionpdf"><img src="vistas/img/personal/default/pdf2.png" class="img-thumbnail previsualizarinduccion" width="100px"></a>
              <input type="hidden" name="induccionactual" id="induccionactual">
              <input type="text" name="induindu" id="induindu" disabled>
              
            </div>

            <!-- ENTRADA PARA ACTA DE ASISTENCIA -->

            <div class="form-group col-md-6">
              <div class="panel">SUBIR PDF ACTA DE ASISTENCIA </div>
              <input type="file" class="pdfacta" name="editpdfacta">
              <p class="help-block">Peso máximo de la foto 10MB</p>
              
              <a href="#" target="_blank" id="actapdf"><img src="vistas/img/personal/default/pdf2.png" class="img-thumbnail previsualizaracta" width="100px"></a>
              <input type="hidden" name="actaactual" id="actaactual">
              <input type="text" name="actaacta" id="actaacta" disabled>
              
            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarInduccion = new ControladorPersonales();
        $editarInduccion -> ctrEditarInduccion();

      ?>

    

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR OBSERVACIONES
======================================-->

<div id="modalEditarObservacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cualquier Observacion que tenga el Personal</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL TIENE O NO  -->
          <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span> 
                <select class="form-control input-lg select-picker" name="tieneObs" id="tieneObs">
                  <option value="">TIENE ALGUNA OBSERVACION?:</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
                <input type="hidden" name="idObservacion" id="idObservacion">
                <input type="hidden" name="idObsPersonal" id="idObsPersonal">
              </div>
            </div>

          <!-- ENTRADA PARA EL PROBLEMA -->
          <div class="form-group col-md-6" id="cajatipoObs">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span> 
                <select class="form-control input-lg select-picker" name="tipoObs" id="tipoObs">
                  <option value="">TIPO DE OBSERVACION?:</option>
                  <option value="INTERNO">INTERNO</option>
                  <option value="EXTERNO">EXTERNO</option>
                </select>
              </div>
          </div>

          <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group col-md-6" id="cajaobservacionObs">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-eye"></i></span> 
              <input type="text" class="form-control input-lg" name="observacionObs" id="observacionObs" placeholder="Escriba alguna Observacion">
            </div>
          </div>

          <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group col-md-6" id="cajadetalleObs">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span> 
              <input type="text" class="form-control input-lg" name="detalleObs" id="detalleObs" placeholder="Detalle la observacion">
            </div>
          </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            <div class="form-group col-md-6" id="cajafechaterminaObs">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechaterminaObs" id="fechaterminaObs"  data-mask placeholder="Fecha que termina la observacion">
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarObservacion = new ControladorPersonales();
        $editarObservacion -> ctrEditarObservacion();

      ?>

    

    </div>

  </div>

</div>
<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


