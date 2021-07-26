@extends('layouts.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                Welcome to the Dashboard, please use the sidebar to manage your features.
                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Chart over new Users created</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" id="chart-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var dataset = <?php echo json_encode($dataset) ?>

        Highcharts.chart('chart-container',{
            title:{
                text:'New User growth, 2021'
            },
            subtitle:{
                text:'Source Aim DB'
            },
            xAxis:{
                categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
            },
            yAxis:{
                title:{
                    text:'Number of new users'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                name:'New user',
                data:dataset
            }],
            responsive:{
                rules:[{
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }

                    }
                }]
            }
        })
    </script>
@endsection
