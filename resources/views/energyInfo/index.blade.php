<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Energy usage info')}}
        </h2>
    <x-slot>

    <div class="py-12">
        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 ">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of energyInfo</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($energyInfo as $energyInfo)
                        <x-energyInfo
                            :dd="$energyInfo->dd"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
