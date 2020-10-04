<div class="bg-gray-50" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form class="w-11/12 md:w-2/3 mx-auto" wire:submit.prevent="submit">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <x-form-field label="Website" id="website">
                    <input id="website" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="www.example.com" wire:model="website">
                </x-form-field>

                <x-form-field label="Image Preview">
                    <div class="mt-1 flex-col rounded-md shadow-sm">
                        <img src="https://via.placeholder.com/512x192" alt="placeholder">
                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">
                                    <button class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition duration-150 ease-in-out">
                                        Upload a file
                                    </button>
                                    or drag and drop
                                </p>
                                <p class="mt-1 text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </div>
                </x-form-field>

                <x-form-field label="Titulo" id="title">
                    <input id="title" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model="title">
                </x-form-field>

                <x-form-field label="Nome" id="name">
                    <input id="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model="name">
                </x-form-field>

                <x-form-field label="e-mail" id="email">
                    <input id="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model="email">
                </x-form-field>

                <x-form-field label="Descrição" id="description">
                    <textarea id="description" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model="description"></textarea>
                </x-form-field>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <fieldset>
                    <legend class="text-base font-medium text-gray-900">Tags</legend>
                    <div class="mt-4">
                        @foreach( $avaliableTags as $tag )
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="livewire" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" wire:model="tags.{{$tag['id']}}">
                                </div>
                                <div class="ml-3 text-sm leading-5">
                                    <label for="livewire" class="font-medium text-gray-700">{{$tag['name']}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
                <div class="border-t border-gray-200 py-5 w-11/12 md:w-2/3 mx-auto">
                    <div class="flex justify-start">
                        <span class="inline-flex rounded-md shadow-sm">
                          <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">Cancel</button>
                        </span>
                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Save</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
