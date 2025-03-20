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
                        <div id="myGaugeChart1" style="width:600px;height:400px;"></div>
                        <!-- Second Gauge -->
                        <div id="myGaugeChart2" style="width:600px;height:400px;"></div>
                    </div>
                    
                    <!-- Add a div for the CanvasJS column chart -->
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                gauge: { axis: { range: [null, 500] } }
            }
        ];

        var layout1 = { width: 600, height: 400 };
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
                gauge: { axis: { range: [null, 500] } }
            }
        ];

        var layout2 = { width: 600, height: 400 };
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
</x-app-layout>