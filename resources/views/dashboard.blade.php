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

    <div class="py-12 bg-gray">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10 rounded-lg" style="background-color: #e1e2e3; rounded-lg">
            <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray border: 4px solid black; padding: 10px; rounded-lg ">
                    {{ __("You're logged in!") }}
                    
                    <!-- Container for the gauges -->
                    <div style="display: flex; justify-content: space-between; border: 4px solid black; padding: 10px; rounded-lg">
                        <!-- First Gauge -->
                        <div id="myGaugeChart1" style="width:600px;height:400px;position:relative;"></div>
                        <!-- Second Gauge -->
                        <div id="myGaugeChart2" style="width:600px;height:400px;position:relative;"></div>
                    </div>
                    <br>
                    <!-- Bootstrap row for cards -->
                    <div class="row bg-gray border-primary rounded-lg">
                        <br>
                        <!-- first card -->
                        <div class="col-md-6">
                            <div class="card text-white bg-dark mb-3 border border-dark">
                                <div class="card-header text-center">Current Electricity Spending</div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Electricity Usage</h5>
                                    <h1 class="card-title text-center">$ {{ $convertedElectricityUsage }}</h1>
                                    <img src="{{ asset('images/bolt-solid.svg') }}" width="80" alt="Electricity Usage Icon" class="mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <!-- second card -->
                        <div class="col-md-6">
                            <div class="card text-white bg-dark mb-3 border border-dark">
                                <div class="card-header text-center">Current Heating Spending</div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Heating Usage</h5>
                                    <h1 class="card-title text-center">$ {{ $convertedOilUsage }}</h1>
                                    <img src="{{ asset('images/fire-solid.svg') }}" width="80" alt="Heating Usage Icon" class="mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Add a div for the CanvasJS column chart -->
                    <div class="p-6 text-gray-900 bg-gray border: 4px solid black; padding: 10px; rounded-lg ">
                        <h2>Previous Spending</h2>
                    <div id="chartContainer" style="height: 370px; width: 100%; "></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    </div>
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
                value: "{{ $electricityUsage }}",
                title: { text: "Gauge 1" },
                type: "indicator",
                mode: "gauge+number",
                delta: { reference: 400 },
                gauge: { axis: { range: [null, 500] }, bar: { color: "66D575", thickness: 0.5 } }
            }
        ];

        var layout1 = { 
            width: 550, 
            height: 400,
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)',
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
                value: "{{ $oilUsage }}",
                title: { text: "Gauge 2" },
                type: "indicator",
                mode: "gauge+number",
                delta: { reference: 400 },
                gauge: { axis: { range: [null, 500] }, bar: { color: "FF7556", thickness: 0.5 } }
            }
        ];

        var layout2 = { 
            width: 550, 
            height: 400,
            paper_bgcolor: 'rgba(0,0,0,0)',
            plot_bgcolor: 'rgba(0,0,0,0)',
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
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "Daily High Temperature at Different Beaches"
                },
                axisX: {
                    valueFormatString: "DD MMM,YY"
                },
                axisY: {
                    title: "Temperature (in °C)",
                    suffix: " °C"
                },
                legend:{
                    cursor: "pointer",
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
                toolTip:{
                    shared: true
                },
                data: [{
                    name: "Myrtle Beach",
                    type: "spline",
                    yValueFormatString: "#0.## °C",
                    showInLegend: true,
                    dataPoints: [
                        { x: new Date(2017,6,24), y: 31 },
                        { x: new Date(2017,6,25), y: 31 },
                        { x: new Date(2017,6,26), y: 29 },
                        { x: new Date(2017,6,27), y: 29 },
                        { x: new Date(2017,6,28), y: 31 },
                        { x: new Date(2017,6,29), y: 30 },
                        { x: new Date(2017,6,30), y: 29 }
                    ]
                },
                {
                    name: "Martha Vineyard",
                    type: "spline",
                    yValueFormatString: "#0.## °C",
                    showInLegend: true,
                    dataPoints: [
                        { x: new Date(2017,6,24), y: 20 },
                        { x: new Date(2017,6,25), y: 20 },
                        { x: new Date(2017,6,26), y: 25 },
                        { x: new Date(2017,6,27), y: 25 },
                        { x: new Date(2017,6,28), y: 25 },
                        { x: new Date(2017,6,29), y: 25 },
                        { x: new Date(2017,6,30), y: 25 }
                    ]
                },
                {
                    name: "Nantucket",
                    type: "spline",
                    yValueFormatString: "#0.## °C",
                    showInLegend: true,
                    dataPoints: [
                        { x: new Date(2017,6,24), y: 22 },
                        { x: new Date(2017,6,25), y: 19 },
                        { x: new Date(2017,6,26), y: 23 },
                        { x: new Date(2017,6,27), y: 24 },
                        { x: new Date(2017,6,28), y: 24 },
                        { x: new Date(2017,6,29), y: 23 },
                        { x: new Date(2017,6,30), y: 23 }
                    ]
                }]
            });
            chart.render();

            function toggleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>