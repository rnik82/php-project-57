@extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">{{ __('messages.tasks') }}</h1>
                <div class="w-full flex items-center">
                <div>
                    <form method="GET" action="/tasks">
                        <div class="flex">
                            <select class="rounded border-gray-300" name="filter[status_id]" id="filter[status_id]"><option value selected="selected">Статус</option><option value="1">новая</option><option value="2">завершена</option><option value="3">выполняется</option><option value="4">в архиве</option></select>
                            <select class="rounded border-gray-300" name="filter[created_by_id]" id="filter[created_by_id]"><option value selected="selected">Автор</option><option value="1">Афанасьева Полина Евгеньевна</option><option value="2">Алексей Александрович Кулагин</option><option value="3">Лапина Полина Максимовна</option><option value="4">Фаина Евгеньевна Пахомова</option><option value="5">Журавлёв Аркадий Сергеевич</option><option value="6">Майя Львовна Пономарёва</option><option value="7">Макарова Эмилия Максимовна</option><option value="8">Нелли Львовна Денисова</option><option value="9">Дорофеева Нелли Романовна</option><option value="10">Анжелика Андреевна Давыдова</option><option value="11">Федосеев Антон Алексеевич</option><option value="12">Мария Александровна Горшкова</option><option value="13">Юдина Марина Сергеевна</option><option value="14">Кабанов Владлен Евгеньевич</option><option value="15">Капитолина Львовна Русакова</option></select>
                            <select class="rounded border-gray-300" name="filter[assigned_to_id]" id="filter[assigned_to_id]"><option value selected="selected">Исполнитель</option><option value="1">Афанасьева Полина Евгеньевна</option><option value="2">Алексей Александрович Кулагин</option><option value="3">Лапина Полина Максимовна</option><option value="4">Фаина Евгеньевна Пахомова</option><option value="5">Журавлёв Аркадий Сергеевич</option><option value="6">Майя Львовна Пономарёва</option><option value="7">Макарова Эмилия Максимовна</option><option value="8">Нелли Львовна Денисова</option><option value="9">Дорофеева Нелли Романовна</option><option value="10">Анжелика Андреевна Давыдова</option><option value="11">Федосеев Антон Алексеевич</option><option value="12">Мария Александровна Горшкова</option><option value="13">Юдина Марина Сергеевна</option><option value="14">Кабанов Владлен Евгеньевич</option><option value="15">Капитолина Львовна Русакова</option></select>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" type="submit">Применить</button>
                    </form>
                </div>
                </div>
                <div class="ml-auto"></div>
            </div>

        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>ID</th>
                    <th>{{ __('messages.statuses') }}</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.creator') }}</th>
                    <th>{{ __('messages.executor') }}</th>
                    <th>{{ __('messages.creation_date') }}</th>
                </tr>
            </thead>
            <tr class="border-b border-dashed text-left">
                <td>1</td>
                <td>завершена</td>
                <td>
                    <a class="text-blue-600 hover:text-blue-900" href="https://php-task-manager-ru.hexlet.app/tasks/1">
                        Исправить ошибку в какой-нибудь строке
                    </a>
                </td>
                <td>Журавлёв Аркадий Сергеевич</td>
                <td>Федосеев Антон Алексеевич</td>
                <td>23.04.2025</td>
                <td>
                </td>
                </tr>
        </table>

        <div class="mt-4">
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                <div class="flex justify-between flex-1 sm:hidden">
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        &laquo; Previous
                    </span>
                    <a href="/tasks?page=2" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        Next &raquo;
                    </a>
                </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">15</span>
                        of
                        <span class="font-medium">16</span>
                        results
                    </p>
                </div>
                <div>
                    <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                        <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                        <span aria-current="page">
                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                        </span>
                        <a href="https://php-task-manager-ru.hexlet.app/tasks?page=2" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                            2
                        </a>
                        <a href="https://php-task-manager-ru.hexlet.app/tasks?page=2" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
        </nav>
        </div>
        </div>
        </div>
    </section>
@endsection
