@props(['ElcUsage', 'OilUsage', 'GasUsage'])


    <div class="border rounded-lg shadow lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300">
        <h4 class="font-bold text-lg">{{$ElcUsage}}</h4>

        <p class="text-gray-600">{{{ $OilUsage}}}</p>
        <p class="text-gray-800 mt-4">{{$GasUsage}}</p>
        <img src="{{asset( 'images/guitar/' .$image)}}" alt="{{$type}}">
</div>