@extends('layout.topsideBar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grafik</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Lahan</label>
                        <select id="pilihLahan" onchange="handleSelectChange()" class="form-control select2"
                            style="width: 100%;">

                            @foreach ($dataLahan as $key)
                                <option {{ $id == $key->id ? 'selected' : '' }} value="{{ $key->id }}">
                                    {{ $key->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Grafik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid" style="padding:0 30px 0 30px">
        <div id="date_filter" class="row">
            <input value="{{ $from }}" type="date" id="min" name="min"
                class="form-control col-sm" /> &nbsp; &nbsp;
            To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max"
                name="max" class="form-control col-sm" /> &nbsp; &nbsp;
            <button onclick="handleDateChange()" type="button"
                class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
            <button type="button" onclick="handleSelectChange()" class="btn btn-danger col-sm">
                Clear Filter</a>
        </div>
    </div>

    <!-- PH CHART -->
    <div class="container-fluid" style="padding: 20px; margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">PH Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChartPh"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- TEMP CHART -->
    <div class="container-fluid" style="padding: 20px; margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Temperature Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChartTemperature"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- Humidity CHART -->
    <div class="container-fluid" style="padding: 20px; margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Humidity Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChartHumidity"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Grafik";
    </script>

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

    <script type="text/javascript">
        function handleSelectChange(event) {
            var idUrl = document.getElementById("pilihLahan").value;
            window.location.href = "{{ url('/datasensor/grafik/?id=') }}" + idUrl;
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor/grafik/?id=') }}" + $("#pilihLahan").val() + ('&from=') + min + (
                '&to=') + max;
        };

        // get data from controller json encode
        var data = {!! json_encode($data) !!};

        //copy array to new array
        var temperatureArray = [];
        for (var i = 0; i < data.length; i++) {
            temperatureArray.push(data[i].temp_val);
        }

        var humidityArray = [];
        for (var i = 0; i < data.length; i++) {
            humidityArray.push(data[i].hum_val);
        }

        var phArray = [];
        for (var i = 0; i < data.length; i++) {
            phArray.push(data[i].ph_val);
        }

        var timeArray = [];
        for (var i = 0; i < data.length; i++) {
            var date = new Date(data[i].created_at);
            var time = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear() + " " + date.getHours() + ":" +
                date.getMinutes() + ":" + date.getSeconds();
            timeArray.push(time);
        }

        //--------------
        //- PH CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasPh = $('#lineChartPh').get(0).getContext('2d')

        var lineChartDataPh = {
            labels: timeArray,
            datasets: [{
                label: 'pH',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: phArray
            }, ]
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

        //--------------
        //- Temperature CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasTemp = $('#lineChartTemperature').get(0).getContext('2d')

        var lineChartDataTemp = {
            labels: timeArray,
            datasets: [{
                label: 'Temperature',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: temperatureArray
            }, ]
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
        new Chart(lineChartCanvasTemp, {
            type: 'line',
            data: lineChartDataTemp,
            options: lineChartOptions
        })

        //--------------
        //- Humidity CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasHum = $('#lineChartHumidity').get(0).getContext('2d')

        var lineChartDataHum = {
            labels: timeArray,
            datasets: [{
                label: 'Temperature',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: humidityArray
            }, ]
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
        new Chart(lineChartCanvasHum, {
            type: 'line',
            data: lineChartDataHum,
            options: lineChartOptions
        })


        document.getElementById("menuAktif").innerHTML =
            '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><li id="beranda" class="nav-item"><a href="/home" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a></li><li class="nav-item menu-open"><a href="#" class="nav-link active"><i class="nav-icon fas fa-chart-pie"></i><p>Data Sensor<i class="right fas fa-angle-left"></i></p></a><ul class="nav nav-treeview"><li class="nav-item"><a href="/datasensor/table" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tabel</p></a></li><li class="nav-item"><a href="/datasensor/grafik" class="nav-link active"><i class="far fa-circle nav-icon"></i><p>Grafik</p></a></li></ul></li><li id="lahan" class="nav-item"><a href="/lahan" class="nav-link"><i class="nav-icon fas fa-spa"></i><p>Lahan</p></a></li>@if (Auth::user()->role == 'admin')<li id="user" class="nav-item"><a href="/admin/user" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Manage User</p></a></li>@endif</ul>';

    </script>
    </body>

    </html>
@endsection
