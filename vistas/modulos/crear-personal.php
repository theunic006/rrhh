<?php

  $idPlanta=$_GET["idPlanta"];
  $idTarea=$_GET["idTarea"];
  
  $planta = ControladorPlantas::ctrMostrarPlantasTareas($idPlanta, $idTarea);

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Agregar Personal a la Tarea: <?php echo $planta["titulo"]?> de la Planta: <?php echo $planta["nombre"]?>
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Crear venta</li>
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioPersonal">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL TAREA
                ======================================-->
            
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bank"></i></span> 
                    <input type="text" class="form-control" id="nuevoTarea" value="<?php echo $planta["titulo"]; ?>" readonly>
                    <input type="hidden" name="idTarea" value="<?php echo $planta["id"]; ?>">
                  </div>
                </div> 

                <!--=====================================
                ENTRADA DE LA FECHA INICIO
                ======================================--> 

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                   <input type="text" class="form-control" id="nuevaFechaInicio" name="editarFechaInicio" value="<?php echo $planta["fechainicio"]; ?>" readonly>
                  </div>
                </div>
                <!--=====================================
                ENTRADA DE LA FECHA FIN
                ======================================--> 

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                   <input type="text" class="form-control" id="nuevaFechaFin" name="editarFechaFin" value="<?php echo $planta["fechafin"]; ?>" readonly>
                  </div>
                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PERSONAL
                ======================================--> 

                <div class="form-group row nuevoPersonal">
                </div>

                <input type="hidden" id="listaPersonales" name="listaPersonales">

                <!--=====================================
                BOTÓN PARA AGREGAR PERSONAL
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarPersonal">Agregar personal</button>
              </div>

          </div>

          <div class="box-footer">

            <div class="pull-right">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>
            </div>

          </div>

        </form>

        <?php

          $editarNuevaTarea = new ControladorTareas();
          $editarNuevaTarea -> ctrEditarNuevaTarea();
          
        ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PERSONALES
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaPersonal">
              
               <thead>

               <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th style="width: 40px">DNI</th>
                  <th>Cargo</th>
                  <th>Documentacion</th>
                  <th>Examenes</th>
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
