<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <?php
    $dataPoints = array( 
        array("y" => 3373.64, "label" => "Electricity spending" ),
        array("y" => 2435.94, "label" => "Oil spending" ),
        array("y" => 2435.94, "label" => "Gas spending" )
    );
    ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    <!-- Container for the gauges -->
                    <div style="display: flex; justify-content: space-between;">
                        <!-- First Gauge -->
                        <div id="myGaugeChart1" style="width:600px;height:400px;position:relative;"></div>
                        <!-- Second Gauge -->
                        <div id="myGaugeChart2" style="width:600px;height:400px;position:relative;"></div>
                    </div>
                    <br>
                    <!-- Bootstrap row for cards -->
                    <div class="row">
                        <!-- first card -->
                        <div class="col-md-6 ">
                            <div class="card text-white bg-secondary mb-3 ">
                                <div class="card-header text-center ">Current Electricity Spending</div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Electricity Usage</h5>
                                    <h1 class="card-title text-center">$300</h1>
                                    <img src="{{ asset('images/bolt-solid.svg') }}" width="80" alt="Electricity Usage Icon" class="mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <!-- second card -->
                        <div class="col-md-6">
                            <div class="card text-white bg-secondary mb-3 justify center">
                                <div class="card-header text-center">Current Heating Spending</div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Heating Usage</h5>
                                    <h1 class="card-title text-center">$500</h1>
                                    <img src="{{ asset('images/fire-solid.svg') }}" width="80" alt="Electricity Usage Icon" class="mx-auto d-block">
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Add a div for the CanvasJS column chart -->
                     <h2>previous spending</h2>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- Initialize First Gauge -->
    <script>
        var data1 = [
            {
                domain: { x: [0, 1], y: [0, 1] },
                value: 200,
                title: { text: "Gauge 1" },
                type: "indicator",
                mode: "gauge+number",
                delta: { reference: 400 },
                gauge: { axis: { range: [null, 500] }, bar: { color: "66D575", thickness: 0.5 } }
            }
        ];

        var layout1 = { 
            width: 600, 
            height: 400,
            images: [
                {
                    source: "{{ asset('images/bolt-solid.svg') }}",
                    x: 0.5,
                    y: 0.5,
                    sizex: 0.2,
                    sizey: 0.2,
                    xanchor: "center",
                    yanchor: "middle"
                }
            ]
        };
        Plotly.newPlot('myGaugeChart1', data1, layout1);
    </script>

    <!-- Initialize Second Gauge -->
    <script>
        var data2 = [
            {
                domain: { x: [0, 1], y: [0, 1] },
                value: 300,
                title: { text: "Gauge 2" },
                type: "indicator",
                mode: "gauge+number",
                delta: { reference: 400 },
                gauge: { axis: { range: [null, 500] },
                bar: { color: "FF7556"} }
            }
        ];

        var layout2 = { 
            width: 600, 
            height: 400,
            images: [
                {
                    source: "{{ asset('images/fire-solid.svg') }}",
                    x: 0.5,
                    y: 0.5,
                    sizex: 0.2,
                    sizey: 0.2,
                    xanchor: "center",
                    yanchor: "middle"
                }
            ]
        };
        Plotly.newPlot('myGaugeChart2', data2, layout2);
    </script>

    <!-- Initialize CanvasJS Column Chart -->
    <script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Gold Reserves"
            },
            axisY: {
                title: "Gold Reserves (in tonnes)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
    </script>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>