@extends('layout.topsideBar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-seedling"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lahan</span>
                            <span class="info-box-number">
                                <small>{{ $lahan_count }}</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-olive elevation-1"><i class="fa-solid fa-border-all"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Data Lahan</span>
                            <span class="info-box-number">{{ $lahan_data_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User Count</span>
                            <span class="info-box-number">{{ $users_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            @foreach ($lahan as $lahan)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $lahan->name }}</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-center">
                                            <strong>{{ $today->toDayDateTimeString() }}</strong>
                                        </p>

                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="graphChart" height="180" style="height: 180px; width: 100%;"
                                                width="100%"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Last Value</strong>
                                        </p>

                                        <div class="progress-group" style="padding-bottom: 20px;">
                                            PH
                                            <span class="float-right"><b>{{ $lahan_data_last->ph_val }}</b>/14</span>
                                            @php
                                                $phGauge = ($lahan_data_last->ph_val * 100) / 14;
                                            @endphp
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" style="width: {{ $phGauge }}%">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->

                                        <div class="progress-group"style="padding-bottom: 20px;">
                                            Kelembapan Tanah
                                            <span class="float-right"><b>{{ $lahan_data_last->hum_val }}</b>/100</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        <div class="progress-group"style="padding-bottom: 20px;">
                                            Aquator
                                            @if ($lahan->aquator_val == 1)
                                                <span class="badge badge-success">On</span>
                                            @else
                                                <span class="badge badge-danger">Off</span>
                                            @endif
                                        </div>
                                        <!-- /.progress-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i>
                                                Good PH</span>
                                            <h5 class="description-header">{{ $lahan_data_last->ph_val }}</h5>
                                            <span class="description-text">Power of Hydrogen (pH)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="description-block">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i>
                                                Good Kelembapan Tanah</span>
                                            <h5 class="description-header">{{ $lahan_data_last->hum_val }}</h5>
                                            <span class="description-text">Kelembapan Tanah</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="description-block border-left">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i>
                                                Good Temperature</span>
                                            <h5 class="description-header">{{ $lahan_data_last->temp_val }}°</h5>
                                            <span class="description-text">Temperature</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            @endforeach
        </div>
        <!--/. container-fluid -->
    </section>


    <script>

        //get data from controller to javascript
        var ph = {!! json_encode($ph) !!};
        var humidity = {!! json_encode($humidity) !!};
        var temperature = {!! json_encode($temperature) !!};

        //copy array data to new array
        var phArray = [];
        for (var i = ph.length - 1; i >= 0; i--) {
            phArray.push(ph[i].ph_val);
        }

        var humidityArray = [];
        for (var i = humidity.length - 1; i >= 0; i--) {
            humidityArray.push(humidity[i].hum_val);
        }

        var temperatureArray = [];
        for (var i = temperature.length - 1; i >= 0; i--) {
            temperatureArray.push(temperature[i].temp_val);
        }

        var timeArray = [];
            for (var i = temperature.length - 1; i >= 0; i--) {
                var date = new Date(temperature[i].created_at);
                var time = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
                timeArray.push(time);
            }

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasPh = $('#graphChart').get(0).getContext('2d')

        var lineChartDataPh = {
            labels: timeArray,
            datasets: [{
                    label: 'pH',
                    fill: false,
                    tension: 0,
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    pointRadius: true,
                    hoverRadius: 8,
                    borderWidth: 3,
                    data: phArray
                },
                {
                    label: 'Temperature',
                    fill: false,
                    tension: 0,
                    backgroundColor: '#DC3545',
                    borderColor: '#DC3545',
                    pointRadius: true,
                    hoverRadius: 8,
                    borderWidth: 3,
                    data: temperatureArray
                },
                {
                    label: 'Humidity',
                    fill: false,
                    tension: 0,
                    backgroundColor: '#28A745',
                    borderColor: '#28A745',
                    pointRadius: true,
                    hoverRadius: 8,
                    borderWidth: 3,
                    data: humidityArray
                }

            ]
        }

        var lineChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasPh, {
            type: 'line',
            data: lineChartDataPh,
            options: lineChartOptions
        })
    </script>


    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="#">Sinamlab</a>.</strong>
        All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->
@endsection
