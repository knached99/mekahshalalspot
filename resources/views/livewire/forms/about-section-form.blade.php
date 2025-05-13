<div class="max-w-2xl w-full mx-auto p-6 sm:p-8 bg-white dark:bg-slate-900 shadow-xl rounded-2xl">
    <form wire:submit.prevent="createOrUpdateAboutSection" class="space-y-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Create or replace restaurant's about information
        </h1>

        <div>
            <label for="sectionTitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Title
            </label>
            <input id="sectionTitle" name="sectionTitle" wire:model="sectionTitle"
                placeholder="Enter title of about section"
                class="text-xl mt-2 block w-full px-3 py-2 border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-300 focus:ring focus:ring-blue-300 focus:outline-none @error('sectionTitle') border-red-500 @enderror" />
        </div>

        <div>
            <label for="sectionContent" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                About Information</label>

            <textarea id="sectionContent" name="sectionContent" wire:model="sectionContent" cols="5" rows="5"
                class="text-xl mt-2 block w-full px-3 py-2 border rounded-md shadow-sm bg-white dark:bg-slate-800 dark:text-white border-gray-300 dark:border-slate-300 focus:ring focus:ring-blue-300 focus:outline-none @error('sectionContent') border-red-500 @enderror"
                placeholder="Restaurant's about information...">
            </textarea>

        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 bg-slate-950 hover:bg-slate-800 text-white text-md font-medium rounded-md transition duration-200">
                Save
            </button>
        </div>

        @if ($error)
            <div class="bg-red-500/90 p-3 rounded-md text-white text-md">
                {{ $error }}
            </div>
        @elseif($success)
            <div class="bg-emerald-500/90 p-3 rounded-md text-white text-md">
                {{ $success }}
            </div>
        @endif
    </form>
</div>
