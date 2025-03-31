@props(['property_id','electricityUsage','oilUsage', 'electricityConversion','oilConversion', 'dayCreated', 'monthCreated']) 


    <div class="border rounded-lg shadow lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300">
        <h4 class="font-bold text-lg">{{$electricityUsage}}</h4>

        <p class="text-gray-600">{{{ $OilUsage}}}</p>
        <img src="{{asset( 'images/' .$image)}}" alt="{{$type}}">
</div>