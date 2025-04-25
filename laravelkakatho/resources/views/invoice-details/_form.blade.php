<div class="mb-4">
    <label for="{{ isset($isEdit) ? 'editCoilNumber' : 'coil_number' }}" class="block text-gray-700 text-sm font-bold mb-2">Coil Number</label>
    <input type="text" name="coil_number" id="{{ isset($isEdit) ? 'editCoilNumber' : 'coil_number' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    @error('coil_number')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="{{ isset($isEdit) ? 'editWidth' : 'width' }}" class="block text-gray-700 text-sm font-bold mb-2">Width</label>
    <input type="number" step="0.01" name="width" id="{{ isset($isEdit) ? 'editWidth' : 'width' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    @error('width')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="{{ isset($isEdit) ? 'editLength' : 'length' }}" class="block text-gray-700 text-sm font-bold mb-2">Length</label>
    <input type="number" step="0.01" name="length" id="{{ isset($isEdit) ? 'editLength' : 'length' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    @error('length')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="{{ isset($isEdit) ? 'editThickness' : 'thickness' }}" class="block text-gray-700 text-sm font-bold mb-2">Thickness</label>
    <input type="number" step="0.01" name="thickness" id="{{ isset($isEdit) ? 'editThickness' : 'thickness' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-