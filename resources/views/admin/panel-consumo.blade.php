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
                    <form action="/panel-consumo" method="POST">
                      {{  csrf_field()  }}
                    <div class="btn-group btn-group-toggle float-right" role="group"  data-toggle="buttons" aria-label="Button group with nested dropdown" style="margin-right: 2rem">
                      

                      <!--<a href="" class="btn btn-sm btn-primary" style="height: 36px; margin-top:26px; border-radius:1.5rem; padding-top: 8px;">
                        Medición total
                      </a> -->
                    
                      <div class="form-group">
                        <select id="ddd_dispositivosInstalados" name="valor" class="form-control" style="width: 100%;">
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
                  <div class="col-sm-6 text-left">
                      <h3 class="card-title" style="margin-left: 3.5rem; margin-top:24px;">Gráfico volumen de agua-tiempo.</h3>
                  </div>
                  <div class="col-sm-6">
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

                  </div>
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

  

<div class="row">
  <div class="col-lg-4">
      <div class="card card-chart">
          <div class="card-header">
              <h5 class="card-category">Total Shipments</h5>
              <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
          </div>
          <div class="card-body">
              <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
              </div>
          </div>
      </div>
  </div>




  <!--<div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>        
          <div class="content">
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-category">Global Sales</h5>
                    <h4 class="card-title">Shipped Products</h4>
                    <div class="dropdown">
                      <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                        <i class="now-ui-icons loader_gear"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="lineChartExample"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-category">2018 Sales</h5>
                    <h4 class="card-title">All products</h4>
                    <div class="dropdown">
                      <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                        <i class="now-ui-icons loader_gear"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                  <div class="card-header">
                    <h5 class="card-category">Email Statistics</h5>
                    <h4 class="card-title">24 Hours Performance</h4>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="barChartSimpleGradientsNumbers"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            

          
</div>

@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>

<script>
  var ctx= document.getElementById("bigDashboardChart").getContext("2d");
  var ctxBar= document.getElementById("barChart").getContext("2d");
  const cData = JSON.parse('<?php echo $data; ?>');
  console.log(cData);
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
        data: cData.label,
        fill: false,
        backgroundColor:[
          '#0c2646',
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
        backgroundColor:[
          '#0c2646',
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
        labelString: "Tiempo (s).",
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
  
</script>



@endsection