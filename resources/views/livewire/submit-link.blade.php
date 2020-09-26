<div class="bg-gray-50">
    <div class="pt-6 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
        <form class="w-11/12 md:w-2/3 mx-auto" wire:submit.prevent="submit">
            <div>
                <div>
                    <div class="mt-6 sm:mt-5">

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="title"
                                   class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Titulo
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs my-4">
                                    <input id="title"
                                           class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           wire:model="title">
                                </div>
                            </div>
                            @error('title') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name"
                                   class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Nome
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs my-4">
                                    <input id="name"
                                           class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           wire:model="name">
                                </div>
                            </div>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="email"
                                   class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                e-mail
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs my-4">
                                    <input id="email"
                                           class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           wire:model="email">
                                </div>
                            </div>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="website"
                                   class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Website
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs my-4">
                                    <div class="mt-1 flex rounded-md shadow-sm">
                  <span
                      class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://
                  </span>
                                        <input id="website"
                                               class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                               placeholder="www.example.com" wire:model="website">
                                    </div>
                                </div>
                            </div>
                            @error('website') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div
                            class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="description"
                                   class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Descrição
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg sm:max-w-xs flex rounded-md shadow-sm">
                                        <textarea id="description" rows="3"
                                                  class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                  wire:model="description"></textarea>
                                </div>
                            </div>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">
                            Tag
                        </legend>
                        <div class="mt-4">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="livewire" type="checkbox"
                                           class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                           wire:model="tags.1">
                                </div>
                                <div class="ml-3 text-sm leading-5">
                                    <label for="livewire" class="font-medium text-gray-700">Livewire</label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="candidates" type="checkbox"
                                               class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                               wire:model="tags.2">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="offers" type="checkbox"
                                               class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                               wire:model="tags.3">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="offers" class="font-medium text-gray-700">Offers</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="border-t border-gray-200 py-5 w-11/12 md:w-2/3 mx-auto">
                <div class="flex justify-start">
      <span class="inline-flex rounded-md shadow-sm">
        <button type="button"
                class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
          Cancel
        </button>
      </span>
                    <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Save
        </button>
      </span>
                </div>
            </div>
        </form>
        {{ json_encode($tags) }}
    </div>
</div>
