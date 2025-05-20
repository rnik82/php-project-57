<header class="sticky top-0 w-full z-40">
    <nav class="bg-white border-gray-200 py-2 dark:bg-gray-900 shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('messages.task_manager') }}</span>
            </a>

            <div class="flex items-center lg:order-2">
                @auth()
                    {{ html()->a(route('logout'), __('messages.logout'))
                        ->class("bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded")
                        ->data('method', 'post') }}
                @endauth

                @guest
                    {{ html()->a(route('login'), __('messages.login'))
                        ->class("bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded") }}
                    {{ html()->a(route('register'), __('messages.register'))
                        ->class("bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2") }}
                @endguest
            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-0 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        {{ html()->a(route('tasks.index'), __('messages.tasks'))
                            ->class("block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0") }}
                    </li>
                    <li>
                        {{ html()->a(route('task_statuses.index'), __('messages.statuses'))
                            ->class("block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0") }}
                    </li>
                    <li>
                        {{ html()->a(route('labels.index'), __('messages.labels'))
                            ->class("block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0") }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

