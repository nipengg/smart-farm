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
                        <li class="breadcrumb-item active">Dashboard v2</li>
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
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-seedling"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lahan</span>
                            <span class="info-box-number">
                                <small>1</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thermometer"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Data Lahan</span>
                            <span class="info-box-number">10</span>
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
                            <span class="info-box-number">3</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Lahan 1</h5>

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
                                        <strong> Date : 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="graphChart" height="180" style="height: 180px;"></canvas>
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
                                        <span class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group"style="padding-bottom: 20px;">
                                        Kelembapan Tanah
                                        <span class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group"style="padding-bottom: 20px;">
                                        Aquator
                                        <span class="badge badge-success">On</span>
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
                                <div class="col-sm-6 col-12">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                            Good PH</span>
                                        <h5 class="description-header">8.0</h5>
                                        <span class="description-text">Power of Hydrogen (pH)</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                            Good Kelembapan Tanah</span>
                                        <h5 class="description-header">29.0</h5>
                                        <span class="description-text">Kelembapan Tanah</span>
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
        </div>
        <!--/. container-fluid -->
    </section>


    <script>
        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasPh = $('#graphChart').get(0).getContext('2d')

        var lineChartDataPh = {
            labels: [1111, 2222, 3333, 4444, 5555, 6666, 7777, 8888, 9999],
            datasets: [{
                label: 'pH',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [1, 2, 3, 4, 5, 6, 7, 8, 9]
            }]
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
        <strong>Copyright &copy; 2022 <a href="#">Aquaponic</a>.</strong>
        All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->
@endsection
