{{-- @foreach ($energyInfo as $energyInfos)
<a href=" {{ route('energyInfo.show', $energyInfo) }}">
    <x-energyInfo-card
        :electricityUsage="$energyInfo->electricityUsage"
    />
</a>
@endforeach --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Energy usage info')}}
        </h2>
    <x-slot>

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
</x-app-layout>



    <!-- <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg bg-gradient-to-r bg-gradient-to-r from-blue-900 to-purple-900 text-white">
                <div class="p-6 text-white-900">
                    <h3 class="font-semibold text-lg mb-4">List of energyInfo:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach ($energyInfo as $energyInfo)

                        <div>
                            <a href=" {{ route('energyInfo.show', $energyInfo) }}">
                                <x-energyInfo :name="$energyInfo->name" :description="$energyInfo->description" :image="$energyInfo->$image"
                                    :image="$energyInfo->image" />
                            </a>

                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('energyInfos.edit', $energyInfo) }}"
                                    class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    EDIT
                                </a>


                                <form action="{{ route('energyInfos.destroy', $energyInfo) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    
</div> -->
