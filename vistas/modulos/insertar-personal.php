<div class="content-wrapper">

<?php

$idPlanta=$_GET["idPlanta"];
$idTarea=$_GET["idTarea"];

$planta = ControladorPlantas::ctrMostrarPlantasTareas($idPlanta, $idTarea);

?>

  <section class="content-header">
    
    <h1>Agregar Personal a la Tarea: <?php echo $planta["titulo"]?> de la Planta: <?php echo $planta["nombre"]?></h1>
    
    <h1>Inicia: <?php echo $planta["fechainicio"]?> Finaliza: <?php echo $planta["fechafin"]?></h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Crear venta</li>
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      LA TABLA DE TAREA - DATATABLE-TAREA.AJAX.PHP
      ======================================-->

      <div class="col-lg-12">
        <div class="box box-warning">
          <div class="box-header with-border"></div>
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablaPersonalT">
               <thead>
                 <tr>
                 <th style="width: 10px">#</th>
                  <th style="width: 270px">Nombre</th>
                  <th style="width: 40px">DNI</th>
                  <th>Cargo</th>
                  
                  <th>Proceso</th>
                  <th style="width: 250px">Examenes</th>
                  <th>Preparar Archivos</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

    </div>
   
  </section>

</div>


<!--=====================================
MODAL AGREGAR EXAMEN
======================================-->

<div id="modalEditarExamen" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 75% !important;">
    <div class="modal-content" id="">
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