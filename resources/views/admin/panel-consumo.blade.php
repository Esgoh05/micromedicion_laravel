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
                      {{-- <p class="periodo-filtrado">Periodo filtrado por:</p> --}}
                      {{-- @if(isset($tipoPeriodo))
                        <p class="periodo-filtrado"> {{ $tipoPeriodo }} </p>
                      @endif                   --}}
                  </div>
                  
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right: 1.5rem; margin-top:24px; font-size:12px; padding: 12px 45px">
                      Filtrar
                    </button>
                  </div>
              </div>
              <div class="row">
                @if(isset($tipoPeriodo))
                  <p class="periodo-filtrado"> {{ $tipoPeriodo }} </p>
                @endif   
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                  
                    <button type="submit" class="btn btn-primary" id="btnFiltroDispositivos" style="border-radius: 30px" disabled>
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
              <input class="form-control" id="inputState2" name="datosMeses" type="Month">
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
              <button type="submit" class="btn btn-primary" id="btnFiltroMes" data-toggle="tooltip" data-placement="top" title="Botón graficar" style="border-radius: 30px" disabled>
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
                            <input class="form-control" id="fechaInicio" placeholder="Fecha inicio" name="fechaInicioCaudal" type="Date" value="{{ $start }}">
                        </div>
                    </div>
                </div>
                <p>-</p>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control datepicker" id="fechaFin" placeholder="Fecha fin" name="fechaFinCaudal" type="date" value="{{ $end }}">
                        </div>
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnFiltroPeriodo" style="border-radius: 30px; font-size:12px; padding: 11px 22px">Graficar</button>
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

                    console.log(response.dispositivos);

                    let arrayDispositivosFiltro = response.dispositivos;

                    if(arrayDispositivosFiltro == 0 ){
                      $('#btnFiltroDispositivos').prop('disabled', true);
                    }else{
                      $('#btnFiltroDispositivos').prop('disabled', false);
                    }
                    
                    
                },
                error: function(xhr, status, error){
                    // Manejar errores si es necesario
                    console.error(xhr.responseText);
                }
            });
        });


    });

    document.getElementById("inputState2").addEventListener("input", function() {
        document.getElementById("btnFiltroMes").disabled = !this.value;
    });

    document.addEventListener("DOMContentLoaded", function() {
        let today = new Date();
        let year = today.getFullYear();
        let month = (today.getMonth() + 1).toString().padStart(2, "0"); // Obtiene el mes con dos dígitos

        let maxMonth = `${year}-${month}`; // Formato YYYY-MM
        document.getElementById("inputState2").setAttribute("max", maxMonth);
    });


    // document.addEventListener("DOMContentLoaded", function () {
    //     const fechaInicio = document.getElementById("fechaInicio");
    //     const fechaFin = document.getElementById("fechaFin");
    //     const btnFiltroPeriodo = document.getElementById("btnFiltroPeriodo");

    //     function validarFechas() {
    //         submitBtn.disabled = !(fechaInicio.value && fechaFin.value);
    //     }

    //     fechaInicio.addEventListener("input", validarFechas);
    //     fechaFin.addEventListener("input", validarFechas);
    // });

    document.addEventListener("DOMContentLoaded", function () {
    const fechaInicio = document.getElementById("fechaInicio");
    const fechaFin = document.getElementById("fechaFin");
    const submitBtn = document.getElementById("submitBtn");

    // Obtener fechas actuales
    let today = new Date();
    let yesterday = new Date();
    yesterday.setDate(today.getDate() - 1); // Ayer

    // Formatear fechas a YYYY-MM-DD
    function formatDate(date) {
        return date.toISOString().split('T')[0];
    }

    //Función para sumar días
    function addDays(dateString, days) {
        const date = new Date(dateString);
        date.setDate(date.getDate() + days);
        return formatDate(date);
    }

    // Definir límites
    let minDate = "2022-01-01"; // Mínimo 2022
    let maxDate = formatDate(today); // Máximo hoy

    // Asignar valores y restricciones a los inputs
    fechaInicio.value = formatDate(yesterday);
    fechaInicio.min = minDate;
    fechaInicio.max = maxDate;

    //Establecer fechaFin a un día después de fechaInicio
    fechaFin.value = addDays(fechaInicio.value, 1);         
    fechaFin.min = addDays(fechaInicio.value, 1);           
    fechaFin.max = maxDate;                                 

    // fechaFin.value = formatDate(today);
    // fechaFin.min = minDate;
    // fechaFin.max = maxDate;

    // // Actualizar restricciones en fechaFin cuando cambia fechaInicio
    // fechaInicio.addEventListener("input", function () {
    //     fechaFin.min = fechaInicio.value; // No se puede seleccionar antes de fechaInicio
    //     if (fechaFin.value < fechaInicio.value) {
    //         fechaFin.value = fechaInicio.value; // Ajustar fechaFin si ya es menor
    //     }
    //     validarFechas();
    // });

    // Actualizar restricciones en fechaFin cuando cambia fechaInicio
    fechaInicio.addEventListener("input", function () {
        //Calcular nuevo mínimo (un día después de fechaInicio)
        fechaFin.min = addDays(fechaInicio.value, 1);       
        fechaFin.max = maxDate;                             

        //Ajustar valor si fechaFin es inválida
        if (fechaFin.value <= fechaInicio.value) {          
            fechaFin.value = addDays(fechaInicio.value, 1);
        }

        validarFechas();
    });

    // Validar que ambos inputs tengan fecha para habilitar el botón
    function validarFechas() {
        submitBtn.disabled = !(fechaInicio.value && fechaFin.value);
    }

    fechaFin.addEventListener("input", validarFechas);
});

</script>



@endsection