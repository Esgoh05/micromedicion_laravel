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
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right: 1.5rem; margin-top:24px;">
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
        <!--<form action="/save-new-user" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        {{ csrf_field() }} -->
          
          <div class="form-group">
            <h5>Dispositivo.</h5>
            <form action="/panel" method="POST">
              {{  csrf_field()  }}
            <div class="vstack gap-3 form-group">
              <div class="form-group">
                <select id="inputState1" name="valorEmail" class="form-control" style="width: 100%" required>
                <option value="" hidden selected>Selecciona un correo electrónico</option>
                @foreach ($userId as $prueba)
                <option value="{{ $prueba->id}}">{{ $prueba->email}} </option> 
                @endforeach 
                </select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                  Por favor, selecciona un campo.
                </div>
              </div>

              <select id="dd_dispositivosInstalados" name="valor[]" class="form-control me-auto myselect" multiple="multiple">
                <!--<option value="" hidden selected>Dispositivos instalados</option>-->
                
                @foreach ($deviceIds as $deviceId)
                    <option value="{{ $deviceId->id}}"> {{ $deviceId->id}} -> {{ $deviceId->modeloSensor}}</option> 
                @endforeach
                
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

  /*const recorrerArreglo = cData.iddispositivo.filter((item,index)=>{
    return cData.iddispositivo.indexOf(item) === index;
  });

  console.log(recorrerArreglo); */



  //const caudalPromedio = [179, 179, 238, 218, 348, 398, 407, 417, 407, 437, 467, 457, 447, 447, 437, 447, 447, 437, 447,]
  //const tiempo = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]

  /*var bigDashboardChart = new Chart(ctx, {
    type: "bar",
    data:{
      labels:['col1', 'col2', 'col3'],
      datasets:[{
        label:'Num datos',
        data:[10,9,15],
        backgroundColor:[
          'rgb(255, 87, 51)',
          'rgb(51, 87, 51)',
          'rgb(51, 147, 255)',
        ]
      }]
    },
    options:{
      scales:{
        yAxes:[{
          ticks:{
            beginAtZero:true
          }
        }]
      }
    }

  })*/
  var bigDashboardChart = new Chart(ctx, {
    type: "line",
    data:{
      //labels: tiempo,
      labels: cData.data,
      datasets:[{
        label:'Caudal',
        //data: caudalPromedio,
        data: cData.caudalpromedio,
        fill: false,
        backgroundColor:[
          '#0c2646'
        ],
        borderColor:[
          //'#0c2646',
          'rgb(12, 38, 70, 0.8)'
        ]
        }]

    },
    options: {
      scales:{
        xAxes: [{
      scaleLabel: {
        display: true,
        labelString: cData.iddispositivo, //recorrerArreglo,
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
    },
    /*title: {
        display: true,
        text: 'Gráfica caudal-tiempo',
        position: 'top',
        fontSize: 20,
        fontColor: "rgb(12, 38, 70, 0.8)",
      }*/

    }


  });


  var barChart = new Chart(ctxBar, {
    type: "bar",
    data:{
      //labels: tiempo,
      labels: cData.data,
      datasets:[{
        label:'Volumen de agua',
        //data: caudalPromedio,
        data: cData.volumen,
        fill: false,
        backgroundColor: this.generaArregloColores(cData.volumen.length) //cData.backgroundColor

        /*[
          '#0c2646',
        ]*/,
        //this.generaArregloColores(cData.volumen.length()) //cData.backgroundColor
        borderColor: [
          //'#0c2646',
          'rgb(12, 38, 70, 0.8)'
        ],
        //cData.borderColor
        }]

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
    legend: {
        position: 'bottom',
        fontColor: "rgb(12, 38, 70, 0.8)",
    },

    }

  });

 function generaArregloColores(tam){
	let arrayColors = [];

  console.log(tam);
	
	for(var i = 0; i < tam; i++){
    console.log("entre al for");
	 arrayColors.push(this.colorRamdom());
   console.log(i);
	}

	return arrayColors;
}

 function colorRamdom(){
    let min = Math.ceil(0);
    let max = Math.floor(255);
    let color = 'rgba('+
      Math.floor(Math.random() * (max - min) + min) +',' +
      Math.floor(Math.random() * (max - min) + min) +',' +
      Math.floor(Math.random() * (max - min) + min) +',' +
      '0.8)';
    return color;
  }

  $(".myselect").select2({
    placeholder: 'Dispositivos instalados' ,
    tags: true,
    tokenSeparators: ['', '']
  });






  
</script>



@endsection