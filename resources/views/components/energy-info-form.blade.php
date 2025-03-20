@props(['action','method'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="electrictyUsage" class="block text-sm text-gray-700">Electricity usage (KWH)</label>
        <input
            type="text"
            name="electrictyUsage"
            id="electrictyUsage"
            value="{{ old('electrictyUsage', $energyInfo->electrictyUsage ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('electrictyUsage')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="oilUsage" class="block text-sm text-gray-700">Oil Usage</label>
        <input
            type="text"
            name="oilUsage"
            id="oilUsage"
            value="{{ old('oilUsage', $energyInfo->oilUsage ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('oilUsage')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="gasUsage" class="block text-sm text-gray-700">Gas Usage</label>
        <input
            type="text"
            name="gasUsage"
            id="gasUsage"
            value="{{ old('gasUsage', $energyInfo->gasUsage ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('gasUsage')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($energyInfo) ? 'Update Energy Info' : 'Add Energy Info' }}
        </x-primary-button>
    </div>
</form>






