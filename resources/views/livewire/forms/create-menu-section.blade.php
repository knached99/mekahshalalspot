<div class="max-w-lg mx-auto p-4 bg-dark shadow-lg rounded-md">
    <form wire:submit.prevent="saveSection">
        <!-- Step 1: Create Section -->
        <h1 class="text-lg mb-4">This will be the menu section a user can click on to filter between menu items. You must also tag menu items to these sections</h1>
            <div class="mb-4">
                <label for="sectionName" class="block text-sm font-medium text-white">Section Name</label>
                <input type="text" id="sectionName" wire:model="sectionName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000; @error('sectionName') border-color: red; @enderror"/>
                @error('sectionName') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            {{-- <div class="mb-4">
            <label for="sectionImage" class="block text-sm font-medium text-white">Section Image</label>
                <input type="file" id="sectionImage" wire:model="sectionImage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000; @error('sectionImage') border-color: red; @enderror"/>
                @error('sectionImage') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
            <label for="sectionTag" class="block text-sm font-medium text-white">Section Tag</label>
            <select id="sectionTag" wire:model="sectionTag" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000; @error('sectionTag') border-color: red; @enderror">
            <option disabled selected value="">Select Tag</option>
            <option value="All">All</option>
            <option value="Sandwiches">Sandwiches</option>
            <option value="Chicken">Chicken</option>
            <option value="Platters">Platters</option>
            <option value="Sides">Sides</option>
            </select>
              @error('sectionTag') <span style="color: red;">{{ $message }}</span> @enderror
            </div> --}}

            <div class="mb-4">
            <div class="form-check form-switch" style="background-color: #000; @error('status') border-color: red; @enderror">
            <input class="form-check-input" type="checkbox" wire:model="status" role="switch" id="status">
            <label class="form-check-label" for="status">switch between active or inactive</label>
            </div>
            @error('status') <span style="color: red;">{{ $message }}</span> @enderror
            </div>
          
            <button type="submit" class="px-4 py-2 text-white rounded-md" style="background-color: #000;">
                Save
            </button>
        </div>
    </form>
</div>
