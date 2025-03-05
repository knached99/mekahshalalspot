<div class="max-w-lg mx-auto p-4 bg-dark shadow-lg rounded-md">
    <form wire:submit.prevent="nextStep">
        <!-- Step 1: Create Section -->
        @if ( $step == 1)
            <div class="mb-4">
                <label for="sectionName" class="block text-sm font-medium text-white">Section Name</label>
                <input type="text" id="sectionName" wire:model="sectionName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000; @error('sectionName') border-color: red; @enderror"/>
                @error('sectionName') <span style="color: red;">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Do you want to add menu items to this section?</label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model="addMenuItems" value="yes" class="form-radio text-blue-500" style="background-color: #000; @error('addMenuItems') border-color: red; @enderror"/>
                    <span class="ml-2">Yes</span>
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" wire:model="addMenuItems" value="no" class="form-radio text-blue-500" style="background-color: #000 @error('addMenuItems') border-color: red; @enderror"/>
                    <span class="ml-2">No</span>
                </label>
                @error('addMenuItems') <span style="color: red; display: block;">{{ $message }}</span> @enderror
            </div>
        @endif

        <!-- Step 2: Add Menu Items -->
        @if ( $step == 2 &&  $addMenuItems == 'yes')
            <div class="mb-4">
                <button type="button" wire:click="addMenuItem" class="px-4 py-2 bg-blue-500 text-white rounded-md" style="background-color: #000; color: #fff; padding: 10px;">Add Menu Item</button>
            </div>

            @foreach ($menuItems as $index => $menuItem)
                <div class="mb-4" wire:key="menuItem-{{ $index }}">
                    <div class="mb-2">
                        <label for="menuItem[{{ $index }}]" class="block text-sm font-medium text-white">Menu Item</label>
                        <input type="text" id="menuItem[{{ $index }}]" wire:model="menuItem.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000; @error("menuItem.{$index}") border-color: red; @enderror"/>
                        @error("menuItem.{$index}") <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="itemPrice[{{ $index }}]" class="block text-sm font-medium text-white">Price</label>
                        <input type="number" id="itemPrice[{{ $index }}]" wire:model="itemPrice.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="background-color: #000;"/>
                        @error("itemPrice.{$index}") <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="menuImage[{{ $index }}]" class="block text-sm font-medium text-white">Menu Image</label>
                        <input type="file" id="menuImage[{{ $index }}]" wire:model="menuImage.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"  style="background-color: #000;"/>
                        @error("menuImage.{$index}") <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Buttons -->
        <div class="flex justify-between">
            @if ( $step > 1)
                <button type="button" wire:click="previousStep" class="px-4 py-2 text-white rounded-md" style="background-color: #000;">Back</button>
            @endif

            <button type="submit" class="px-4 py-2 text-white rounded-md" style="background-color: #000;">
                @if ( $step == 3) Save & Submit @else Next Step @endif
            </button>
        </div>
    </form>
</div>
