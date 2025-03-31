<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 text-center mb-4">
        Edit Section: {{ $name }}
    </h2>
     @if(isset($image))
        <div style="margin-bottom: 20px;">
        <img src="{{asset('storage/'.$image)}}" class="img-fluid img-thumbnail rounded shadow-sm cursor-pointer" style="max-width: 150px; height: 150px">
        </div>
    @endif

    @if($success)
        <p style="color: #21ff9f;">{{ $success }}</p>
    @elseif($error)
        <p style="color: #ff5454;">{{ $error }}</p>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium">Section Name:</label>
            <input type="text" wire:model="name" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- <div class="mt-4">
       
            <label for="image" class="block text-gray-700 dark:text-gray-300 font-medium">Section Image:</label>
            <input type="file" wire:model="image" accept="image/*" class="w-full border p-2 rounded-md dark:bg-gray-700 dark:text-gray-200">
        </div>

          <div class="mt-4">
            <label for="tag" class="block text-sm font-medium text-white">Section Tag</label>
            <select id="tag" wire:model="tag" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sectionTag') border-red-500 @enderror">
            <option value="All">All</option>
            <option value="Sandwiches">Sandwiches</option>
            <option value="Chicken">Chicken</option>
            <option value="Platters">Platters</option>
            <option value="Sides">Sides</option>
            </select>
              @error('tag') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

             <div class="mb-4">
            <div class="form-check form-switch" style="background-color: #000; @error('status') border-color: red; @enderror">
            <input class="form-check-input" type="checkbox" {{$status === 1 ? 'checked' : ''}} wire:model="status" role="switch" id="status">
            <label class="form-check-label text-white" for="status">{{$status ? 'Active' : 'Inactive'}}</label>
            </div>
            @error('status') <span style="color: red;">{{ $message }}</span> @enderror
            </div> --}}


        <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Menu Items</h3>
            <button type="button" wire:click="addMenuItem" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                + Add Menu Item
            </button>

            @foreach ($menuItems as $index => $menuItem)
                <div class="border p-4 mt-2 rounded-md dark:border-gray-600 bg-gray-100 dark:bg-gray-700">
                    <label class="block text-gray-700 dark:text-gray-300">Name:</label>
                    <input type="text" wire:model="menuItems.{{ $index }}.name" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-200 focus:ring-blue-500 focus:outline-none">

                    <label class="block text-gray-700 dark:text-gray-300 mt-2">Price:</label>
                    <input type="number" wire:model="menuItems.{{ $index }}.price" class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-200 focus:ring-blue-500 focus:outline-none" step="0.01">

                    <label class="block text-gray-700 dark:text-gray-300 mt-2">Image:</label>
                    <input type="file" wire:model="menuItems.{{ $index }}.image" accept="image/*" class="w-full border p-2 rounded-md dark:bg-gray-800 dark:text-gray-200">

                    <button type="button" wire:click="removeMenuItem({{ $index }})" class="bg-red-500 text-white px-4 py-2 mt-2 rounded-md hover:bg-red-600 transition">
                        Remove
                    </button>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition w-full">
            Save
        </button>
    </form>
</div>
