@props(['action','method'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="electricityUsage" class="block text-sm text-gray-700">Electricity usage (KWH)</label>
        <input
            type="text"
            name="electricityUsage"
            id="electrictiyUsage"
            value="{{ old('electrictiyUsage', $energyInfo->electricityUsage ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('electricityUsage')
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
        <label for="dayCreated" class="block text-sm text-gray-700">Day created</label>
        <input
            type="text"
            name="dayCreated"
            id="dayCreated"
            value="{{ old('dayCreated', $energyInfo->dayCreated ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('dayCreated')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="monthCreated" class="block text-sm text-gray-700">Month created</label>
        <input
            type="text"
            name="monthCreated"
            id="monthCreated"
            value="{{ old('monthCreated', $energyInfo->monthCreated ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('monthCreated')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="electricityConversion" class="block text-sm text-gray-700">current electricity conversion rate</label>
        <input
            type="text"
            name="electricityConversion"
            id="electricityConversion"
            value="{{ old('electricityConversion', $energyInfo->electricityConversion ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('electricityConversion')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="oilConversion" class="block text-sm text-gray-700">current oil conversion rate</label>
        <input
            type="text"
            name="oilConversion"
            id="oilConversion"
            value="{{ old('oilConversion', $energyInfo->oilConversion ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('oilConversion')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($energyInfo) ? 'Update Energy Info' : 'Add Energy Info' }}
        </x-primary-button>
    </div>
</form>






