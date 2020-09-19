<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
    <div class="flex-shrink-0">
        <img class="h-48 w-full object-cover" src="{{ $link['cover_image']}}" alt="">
    </div>
    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
        <div class="flex-1">
            <p class="text-sm leading-5 font-medium text-indigo-600">
                <a href="#" class="hover:underline">
                    Blog
                </a>
            </p>
            <a href="#" class="block">
                <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                    {{ $link['title'] }}
                </h3>
                <p class="mt-3 text-base leading-6 text-gray-500">
                    {{ $link['description']}}
                </p>
            </a>
        </div>
        <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
                <a href="#">
                    <img class="h-10 w-10 rounded-full"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="">
                </a>
            </div>
            <div class="ml-3">
                <p class="text-sm leading-5 font-medium text-gray-900">
                    <a href="#" class="hover:underline">
                        {{ $link['author_name']}}
                    </a>
                </p>
                <div class="flex text-sm leading-5 text-gray-500">
                    <time datetime="2020-03-16">
                        {{ $link['created_at']}}
                    </time>
                </div>
            </div>
        </div>
    </div>
</div>

