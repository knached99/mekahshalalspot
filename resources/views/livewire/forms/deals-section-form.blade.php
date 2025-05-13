<div class="max-w-2xl w-full mx-auto p-6 sm:p-8 bg-white dark:bg-slate-900 shadow-xl rounded-2xl">
    <form wire:submit.prevent="createOrUpdateDeal" enctype="multipart/form-data" class="space-y-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Upload or update deal</h1>

        <div class="space-y-3">
            @if ($deal && $deal->deal_image)
                <div class="w-full overflow-auto max-h-[600]">
                    <img src="{{ asset('storage/' . $deal->deal_image) }}" alt="Current Deal Image"
                        class="w-100 h-100 object-contain rounded-lg border border-gray-300 dark:border-slate-700" />
            @endif

        </div>

        <div>
            <label for="deal_image" class="block text-md font-medium text-gray-700 dark:text-gray-300">
                Image
            </label>
            <input type="file" id="deal_image" name="deal_image" wire:model="deal_image" accept="image/*"
                class="mt-2 block w-full px-3 py-2 text-sm border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-600 focus:ring focus:ring-blue-300 focus:outline-none @error('deal_image') border-red-500 @enderror" />
            @error('deal_image')
                <span class="text-md text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="deal_title" class="block text-md font-medium text-gray-700 dark:text-gray-300">
                Title
            </label>

            <input wire:model="deal_title"
                class="mt-2 block w-full px-3 py-2 text-sm border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-600 focus:ring focus:ring-blue-300 focus:outline-none @error('deal_title') border-red-500 @enderror" />

            @error('deal_title')
                <span class="text-md text-red-500 mt-1 block">{{ $message }}</span>
            @enderror

        </div>

        <div>
            <label for="deal_content" class="block text-md font-medium text-gray-700 dark:text-gray-300">
                Description
            </label>

            <textarea wire:model="deal_content"
                class="mt-2 block w-full px-3 py-2 text-sm border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-600 focus:ring focus:ring-blue-300 focus:outline-none @error('deal_content') border-red-500 @enderror">
        </textarea>

            @error('deal_content')
                <span class="text-md text-red-500 mt-1 block">{{ $message }}</span>
            @enderror

        </div>

        <div>
            <label for="deal_price" class="block text-md font-medium text-gray-700 dark:text-gray-300">
                Price
            </label>

            <input wire:model="deal_price" placeholder="Example: 1.00"
                class="mt-2 block w-full px-3 py-2 text-sm border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-600 focus:ring focus:ring-blue-300 focus:outline-none @error('deal_price') border-red-500 @enderror" />

            @error('deal_price')
                <span class="text-md text-red-500 mt-1 block">{{ $message }}</span>
            @enderror

        </div>


        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 bg-slate-950 hover:bg-slate-800 text-white text-sm font-medium rounded-md transition duration-200">
                Save
            </button>

        </div>

        @if ($error)
            <div class="bg-red-500/90 p-3 rounded-md text-white text-sm">
                {{ $error }}
            </div>
        @elseif ($success)
            <div class="bg-emerald-500/90 p-3 rounded-md text-white text-sm">
                {{ $success }}
            </div>
        @endif
    </form>
</div>
