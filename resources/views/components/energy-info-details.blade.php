@props(['property_id','electricityUsage','oilUsage', 'electricityConversion','oilConversion', 'dayCreated', 'monthCreated']) 

<div>
<script>
        var data1 = [
            {
                domain: { x: [0, 1], y: [0, 1] },
                value: $electricityUsage,
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
</div>