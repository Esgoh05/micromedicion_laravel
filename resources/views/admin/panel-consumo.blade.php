@extends('layouts.master')

@section('title')
    Instalación | Micromedición

@endsection


@section('content')

<div class="row">
  <div class="col-12">
      <div class="card card-chart">
          <div class="card-header ">
              <div class="row">
                  <div class="col-sm-6 text-left">
                      <h3 class="card-title" style="margin-left: 3.5rem; margin-top:24px;">Gráfico caudal-tiempo.</h3>
                  </div>
                  
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right: 1.5rem; margin-top:24px; font-size:12px; padding: 12px 45px">
                      Graficar
                    </button>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <div>
                <canvas id="bigDashboardChart"></canvas>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
      <div class="card card-chart">
          <div class="card-header ">
              <div class="row">
                  <div class="col-sm-8 text-left">
                      <h3 class="card-title" style="margin-left: 3.5rem; margin-top:24px;">Gráfico volumen de agua-tiempo.</h3>
                  </div>
                  <!--<div class="col-sm-6">
                    <form action="/medicion-volumen" method="POST">
                      @csrf 
                    <div class="btn-group btn-group-toggle float-right" role="group"  data-toggle="buttons" aria-label="Button group with nested dropdown" style="margin-right: 2rem">
                    
                      <div class="form-group">
                        <select id="ddd_dispositivosInstalados" name="valorVolumen" class="form-control" style="width: 100%;">
                          <option value="" hidden selected>Dispositivos instalados</option>

                          @foreach ($deviceIds as $deviceId)
                              <option value="{{ $deviceId->id}}"> {{ $deviceId->id}} -> {{ $deviceId->modeloSensor}}</option> 
                          @endforeach
                          
                        </select>
                      </div>

                      <button type="submit" class="btn btn-primary btnGraficar" style="margin-top: 24px;">
                        <i class="bi bi-graph-up"></i>
                      </button>

                    </div>
                  </form>

                  </div> -->
              </div>
          </div>
          <div class="card-body">
              <div>
                <canvas id="barChart"></canvas>
              </div>
          </div>
      </div>
  </div>
</div>


<!--Modal filtro-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Graficar filtrando por:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="form-group" id="contenedorFiltroDispositivo">
            <h5>Dispositivo.</h5>
            <form action="/panel" method="POST">
                @csrf <!-- Mover @csrf aquí fuera del formulario interno -->
                <div class="vstack gap-3 form-group">
                    <div class="form-group">
                        <select id="inputState1" name="valorEmail" class="form-control" style="width: 100%" required>
                            <option value="" hidden selected>Selecciona un correo electrónico</option>
                            @foreach ($userId as $prueba)
                                <option value="{{ $prueba->id }}">{{ $prueba->email }}</option> 
                            @endforeach 
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            Por favor, selecciona un campo.
                        </div>
                    </div>
        
                    <select id="dd_dispositivosInstalados" name="valor[]" class="form-control me-auto myselect" multiple="multiple" style="background-color: white" disabled>
                      <!--<option value="" hidden selected>Selecciona al menos un dispositivo</option>
                      @foreach ($deviceIds as $deviceId)
                            <option value="{{ $deviceId->id }}"> {{ $deviceId->id}} -> {{ $deviceId->modeloSensor}}</option> 
                        @endforeach-->
                    </select>
                  
                    <button type="submit" class="btn btn-primary" style="border-radius: 30px">
                        Graficar
                    </button>
                </div>
            </form>
        </div>

        <hr>
          
        <div class="form-group">
          <h5>Mes.</h5>
          <form action="/panel-consumo" method="POST">
            {{  csrf_field()  }}
            <div class="vstack gap-2 form-group">
              <input class="form-control" name="datosMeses" type="Month">
              <!--<select id="dd_dispositivosInstalados" name="valorMesSeleccionado" class="form-control me-auto">
                <option value="" hidden selected>Seleccionar mes</option>
                
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
              </select> -->             
              <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Botón graficar" style="border-radius: 30px">
                Graficar
              </button>
            </div>
          </form>
        </div>

          <hr>

        <div class="form-group">
            <h5>Periodo.</h5>
            <form action="/panel-consumo-datepicker" method="POST">
                {{  csrf_field()  }}
              <div class="input-daterange datepicker row align-items-center" id="datetimepicker" date-date-format="yyyy-mm-dd">
                <div class="col">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" placeholder="Fecha inicio" name="fechaInicioCaudal" type="Date" value="{{ $start }}">
                        </div>
                    </div>
                </div>
                <p>-</p>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control datepicker" placeholder="Fecha fin" name="fechaFinCaudal" type="date" value="{{ $end }}">
                        </div>
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 30px; font-size:12px; padding: 11px 22px">Graficar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End modal filtro-->

          
</div>

@endsection


@section('scripts')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script> -->

<script>
  var ctx= document.getElementById("bigDashboardChart").getContext("2d");
  var ctxBar= document.getElementById("barChart").getContext("2d");
  const cData = JSON.parse('<?php echo $data; ?>');
  console.log(cData);

  // Convertir el objeto JSON en un array si es necesario
const dataArray = Array.isArray(cData) ? cData : [cData];

// Verificar si el campo iddispositivo está presente en cada objeto del arreglo
const hasDeviceId = dataArray.every(item => item.hasOwnProperty('iddispositivo'));

// Si no hay campo iddispositivo en los datos
if (!hasDeviceId) {
    // Agregar "Todos los dispositivos" como etiqueta en cada objeto
    dataArray.forEach(item => {
        item.iddispositivo = "Todos los dispositivos";
    });
}
 
  // Objeto para almacenar los datos agrupados por dispositivo
  const groupedData = {};

  dataArray.forEach(item => {
    const dispositivo = item.iddispositivo.toString();
    if (!groupedData[dispositivo]) {
        groupedData[dispositivo] = [];
    }
    groupedData[dispositivo].push({
        fin: item.fin,
        caudalpromedio: parseFloat(item.caudalpromedio),
        volumen: parseFloat(item.volumen)
    });
  });

  // Generar dinámicamente los datasets
  const datasets = Object.keys(groupedData).map(dispositivo => {
      const data = groupedData[dispositivo].map(item => item.caudalpromedio);
      const backgroundColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.2)`;
      const borderColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 1)`;
      return {
          label: `Dispositivo: ${dispositivo}`,
          data: data,
          backgroundColor: backgroundColor,
          borderColor: borderColor,
          borderWidth: 1,
          fill: false
      };
  });

  // Generar dinámicamente los datasets para volumen
  const datasetsVolumen = Object.keys(groupedData).map(dispositivo => {
      const data = groupedData[dispositivo].map(item => item.volumen);
      const backgroundColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.2)`;
      const borderColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 1)`;
      return {
          label: `Volumen - Dispositivo: ${dispositivo}`,
          data: data,
          backgroundColor: backgroundColor,
          borderColor: borderColor,
          borderWidth: 1
      };
  });

  // Obtener todas las fechas únicas
  const fechasUnicas = dataArray.reduce((fechas, item) => {
      fechas.add(item.fin);
      return fechas;
  }, new Set());

  // Convertir el conjunto de fechas a un arreglo y ordenarlo
  const etiquetas = [...fechasUnicas].sort();

  // Crear el gráfico
  var bigDashboardChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: etiquetas,
          datasets: datasets
      },
      options: {
        scales:{
          xAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Tiempo.",
          fontColor: "rgb(12, 38, 70, 0.8)",
          fontSize: 15,
        }
      }],
          yAxes:[{
            scaleLabel: {
          display: true,
          labelString: "Caudal (L/h).",
          fontColor: "rgb(12, 38, 70, 0.8)",
          fontSize: 15,
        }
          }]
        },
        legend: {
            position: 'bottom',
            fontColor: "rgb(12, 38, 70, 0.8)",
        }
      }
  });

  // Crear el gráfico de barras para volumen
  var barChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
          labels: etiquetas, // Utiliza las etiquetas obtenidas anteriormente
          datasets: datasetsVolumen
      },
      options: {
        scales:{
          xAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Tiempo.",
          fontColor: "rgb(12, 38, 70, 0.8)",
          fontSize: 15,
        }
      }],
          yAxes:[{
            scaleLabel: {
          display: true,
          labelString: "Volumen de agua (L).",
          fontColor: "rgb(12, 38, 70, 0.8)",
          fontSize: 15,
        }
          }]
        },
      }
  });

  //Esto hará que el menú desplegable se adjunte al modal, en lugar del<body>elemento.
  $('#dd_dispositivosInstalados').select2({
      placeholder: "Selecciona al menos un dispositivo",
      dropdownParent: $('#contenedorFiltroDispositivo')
    });

  $(document).ready(function(){
        $('#inputState1').change(function(){
            var valorSeleccionado = $(this).val();
            console.log(valorSeleccionado);
            
            // Enviar el valor seleccionado al controlador de Laravel
            $.ajax({
                url: "dispositivos-asignados",
                type: "POST",
                data: {
                    valor: valorSeleccionado,
                    _token: "{{ csrf_token() }}" //token CSRF 
                },
                success: function(response){
                    // Manejar la respuesta del servidor
                    console.log(response);
                    $('#dd_dispositivosInstalados').prop('disabled', false);

                    // Limpiar el select antes de agregar nuevos dispositivos
                    $('#dd_dispositivosInstalados').empty();
                    
                    // Llenar el select con los dispositivos obtenidos en la respuesta
                    $.each(response.dispositivos, function(index, dispositivo) {
                        $('#dd_dispositivosInstalados').append('<option value="' + dispositivo + '">' + dispositivo + '</option>');
                    });
                },
                error: function(xhr, status, error){
                    // Manejar errores si es necesario
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>



@endsection