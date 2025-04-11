<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10 rounded-lg" style="background-color:rgb(231, 231, 231); rounded-lg shadow-lg: Large shadow">
            <div class="bg-gray overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray border: 4px solid black; padding: 10px; rounded-lg " style ="background-color:rgb(231, 231, 231); rounded-lg shadow-lg: Large shadow">
                    {{ __("You're logged in!") }}
                    
                    <!-- Container for the gauges -->
                    <div style="display: flex; justify-content: space-between; background-color: rgb(243, 243, 243);" class = " rounded-lg shadow-lg">
                        <!-- First Gauge -->
                        <div id="myGaugeChart1" style="width:600px;height:400px;position:relative;"></div>
                        <!-- Second Gauge -->
                        <div id="myGaugeChart2" style="width:600px;height:400px;position:relative;"></div>
                    </div>
                    <br>
                    <br>
                    <!-- Bootstrap row for cards -->
                    <div class="row bg-gray border-primary rounded-lg">
                        <br>
                        <!-- first card -->
                        <div class="col-md-6">
                            <div class="card text-white bg-dark mb-3 border border-dark rounded-lg shadow-lg: Large shadow" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
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
                            <div class="card text-white bg-dark mb-3 border border-dark" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                                <div class="card-header text-center">Current Heating Spending</div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Heating Usage</h5>
                                    <h1 class="card-title text-center">$ {{ $convertedOilUsage }}</h1>
                                    <img src="{{ asset('images/fire-solid.svg') }}" width="80" alt="Heating Usage Icon" class="mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
                title: { text: "current electricity usage" },
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
                title: { text: "current heating usage" },
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
                    yanchor: "middle",
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
                    text: "Spending this week"
                },
                axisX: {
                    valueFormatString: "DD MMM"
                },
                axisY: {
                    title: "spending",
                    suffix: "$"
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
                    name: "EnergyUsage over the week",
                    color: "#66D575",
                    type: "spline",
                    yValueFormatString: "",
                    showInLegend: true,
                    dataPoints: [
                        { x: new Date( {{$dayCreated[0] ?? 1}},{{$monthCreated[0] ?? 1}}), y: {{ $electricityUsage[0] ?? 10}}},
                        { x: new Date( {{$dayCreated[1] ?? 2}},{{$monthCreated[1] ?? 1}}), y: {{ $electricityUsage[1] ?? 15}}},
                        { x: new Date( {{$dayCreated[2] ?? 3}},{{$monthCreated[2] ?? 1}}), y: {{ $electricityUsage[2] ?? 20}}},
                        { x: new Date( {{$dayCreated[3] ?? 4}},{{$monthCreated[3] ?? 1}}), y: {{ $electricityUsage[3] ?? 25}}},
                        { x: new Date( {{$dayCreated[4] ?? 5}},{{$monthCreated[4] ?? 1}}), y: {{ $electricityUsage[4] ?? 18}}},
                        { x: new Date( {{$dayCreated[5] ?? 6}},{{$monthCreated[5] ?? 1}}), y: {{ $electricityUsage[5] ?? 15}}},
                        { x: new Date( {{$dayCreated[6] ?? 7}},{{$monthCreated[6] ?? 1}}), y: {{ $electricityUsage[6] ?? 10}}}
                    ]
                },
                {
                    name: "heating usage over the week",
                    color: "#FF7556",	
                    type: "spline",
                    yValueFormatString: "",
                    showInLegend: true,
                    dataPoints: [
                        { x: new Date( {{$dayCreated[0] ?? 1}},{{$monthCreated[0] ?? 1}}), y: {{ $oilUsage[0] ?? 5}}},
                        { x: new Date( {{$dayCreated[1] ?? 2}},{{$monthCreated[1] ?? 1}}), y: {{ $oilUsage[1] ?? 15}}},
                        { x: new Date( {{$dayCreated[2] ?? 3}},{{$monthCreated[2] ?? 1}}), y: {{ $oilUsage[2] ?? 30}}},
                        { x: new Date( {{$dayCreated[3] ?? 4}},{{$monthCreated[3] ?? 1}}), y: {{ $oilUsage[3] ?? 25}}},
                        { x: new Date( {{$dayCreated[4] ?? 5}},{{$monthCreated[4] ?? 1}}), y: {{ $oilUsage[4] ?? 10}}},
                        { x: new Date( {{$dayCreated[5] ?? 6}},{{$monthCreated[5] ?? 1}}), y: {{ $oilUsage[5] ?? 15}}},
                        { x: new Date( {{$dayCreated[6] ?? 7}},{{$monthCreated[6] ?? 1}}), y: {{ $oilUsage[6] ?? 10}}}
                    ]
                },]
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