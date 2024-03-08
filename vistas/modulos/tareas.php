<?php

$idPlanta = $_GET["idPlanta"];

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

$xml = ControladorTareas::ctrDescargarXML();

if($xml){

  rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

  echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar SERVICIOS
    
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar SERVICIOS</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border botonSolo">
  
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarea">
          Agregar Servicio
        </button>
      </div>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Titulo</th>
           <th>Fecha Inicio</th>
           <th>Fecha Fin</th>
           <th>Acciones</th>
           <th>Registro</th>
         </tr> 
        </thead>

        <tbody>

        <?php
          
          $item='idplanta';
          $valor=$idPlanta;

          $respuesta = ControladorTareas::ctrMostrarTareas($item, $valor);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>
                  <td>'.$value["titulo"].'</td>
                  <td>'.$value["fechainicio"].'</td>
                  <td>'.$value["fechafin"].'</td>';

          echo '

                  <td>

                    <div class="btn-group">

                      <!--<a class="btn btn-success" href="index.php?ruta=ventas&xml='.$value["id"].'">xml</a> -->
                        
                      ';

                      if($_SESSION["perfil"] == "Administrador"){

                      echo '<button class="btn btn-primary btnIngresarPersonal" idTarea="'.$value["id"].'" idPlanta="'.$idPlanta.'"><i class="fa fa-plus"></i> Registrar</button>

                      <button class="btn btn-warning btnInsertarPersonal" idTarea="'.$value["id"].'" idPlanta="'.$idPlanta.'"><i class="fa fa-eye"></i> Proceso</button>';

                    }

                    echo '</div>  

                  </td>
                  <td>
                    <button class="btn btn-success btnImprimirPdfRegistro" idTarea="'.$value["id"].'">
                      <i class="fa fa-print"></i> Registro
                    </button>
                  <td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR tarea
======================================-->

<div id="modalAgregarTarea" class="modal fade" role="dialog">
  <div class="modal-dialog " style="width: 50% !important;">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Tarea</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre de TAREA" required>
                <input type="hidden" id="idplanta" name="idplanta" value="<?php echo $idPlanta?>">
              </div>
            </div>
            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i> Fecha de Inicio</span> 
                <input type="date" class="form-control input-lg" name="fechainicio" placeholder="Ingresar fecha de inicio">
              </div>
            </div>
            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i> Fecha que Termina</span> 
                <input type="date" class="form-control input-lg" name="fechafin" placeholder="Ingresar fecha fin">
              </div>
            </div>

            <!-- DESDCRIPCION DEL TRABAJO-->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-crop"></i></span> 
                <input type="text" class="form-control input-lg" name="descripciontrabajo" placeholder="DESCRIPCION DEL TRABAJO" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL CARGO -->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-recycle"></i></span> 
                <select class="form-control input-lg select-picker" name="areatrabajo" id="areatrabajo">
                  <option value="">SELECCIONE AREA DE TRABAJO</option>
                  <option value="SUPERFICIE">SUPERFICIE</option>
                  <option value="MINA">MINA</option>
                </select>
              </div>
            </div>
            <!-- QUIEN AUTORIZA-->
            <h4>     RESPONSABLE DE AUTORIZACION DE LA MINERA</h4>
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> NOMBRE</span> 
                <input type="text" class="form-control input-lg" name="autoriza" placeholder="NOMBRE QUIEN AUTORIZA" required>
              </div>
            </div>
            <!-- QUIEN AUTORIZA--> 
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-black-tie"></i> CARGO</span> 
                <input type="text" class="form-control input-lg" name="cargoautoriza" placeholder="CARGO QUIEN AUTORIZA" required>
              </div>
            </div>

            <!-- QUIEN AUTORIZA-->
            <h4>     SUPERVISOR DE LA MINERA</h4>
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> NOMBRE</span> 
                <input type="text" class="form-control input-lg" name="supervisor" placeholder="NOMBRE DEL SUPERVISOR" required>
              </div>
            </div>
            <!-- QUIEN AUTORIZA-->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-black-tie"></i> CARGO</span> 
                <input type="text" class="form-control input-lg" name="cargosupervisor" placeholder="CARGO DEL SUPERVISOR" required>
              </div>
            </div>

            <!-- QUIEN AUTORIZA-->
            <h4>     SUPERINTENDENTE DE LA MINERA                                                     RESIDENTE DE LA MINERA</h4>
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> NOMBRE</span> 
                <input type="text" class="form-control input-lg" name="superintendente" placeholder="NOMBRE DEL SUPERINTENDENTE" required>
              </div>
            </div>
            <!-- QUIEN AUTORIZA-->
            <div class="form-group col-md-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> NOMBRE</span> 
                <input type="text" class="form-control input-lg" name="residente" placeholder="NOMBRE DEL RESIDENTE" required>
              </div>
            </div>

            <!-- EFECHA DE CONTRATO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i> Fecha Contrato</span> 
                <input type="date" class="form-control input-lg" name="fechacontrato" placeholder="FECHA DE CONTRATO">
              </div>
            </div>  

            <!-- ENTRADA PARA SUBIR FOTO -->
            <div class="form-group">
              <div class="panel">SUBIR FIRMA RESIDENTE</div>
              <input type="file" class="firmaResidente" name="firmaResidente">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="vistas/img/personal/default/firma.png" class="img-thumbnail previsualizar" width="100px">
            </div>

          </div> 
        </div>  


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Tarea</button>
        </div>

      </form>

      <?php

        $crearTarea = new ControladorTareas();
        $crearTarea -> ctrCrearTarea();

      ?>

    </div>

  </div>

</div>
