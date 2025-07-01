@extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">{{ __('messages.tasks') }}</h1>
                <div class="w-full flex items-center">
                    <div>
                        <form method="GET" action="{{ route('tasks.index') }}">
                            <div class="flex">
                                <select class="rounded border-gray-300 h-10" name="filter[status_id]" id="filter[status_id]">
                                    <option value selected="selected">Статус</option>
                                    @foreach ($task_statuses as $id => $name)
                                        <option value="{{ $id }}"
                                                @if(request('filter.status_id') == $id) selected @endif>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="rounded border-gray-300 h-10" name="filter[created_by_id]" id="filter[created_by_id]">
                                    <option value selected="selected">Автор</option>
                                    @foreach ($users as $id => $name)
                                        <option value="{{ $id }}"
                                                @if(request('filter.created_by_id') == $id) selected @endif>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="rounded border-gray-300 h-10" name="filter[assigned_to_id]" id="filter[assigned_to_id]">
                                    <option value selected="selected">Исполнитель</option>
                                    @foreach ($users as $id => $name)
                                        <option value="{{ $id }}"
                                                @if(request('filter.assigned_to_id') == $id) selected @endif>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-10 ml-2" type="submit">
                                    Применить
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="ml-auto"></div>
                    @auth
                        <div class="ml-auto">
                            <a href="{{ route('tasks.create') }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 h-10">
                                Создать задачу
                            </a>
                        </div>
                    @endauth
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
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $task->id }}</td>
                            <td>{{ $task_statuses[$task->status_id] ?? '' }}</td>
                            <td>
                                <a class="text-blue-600 hover:text-blue-900"
                                   href="{{ route('tasks.show', $task) }}">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td>{{ $users[$task->created_by_id]  ?? '' }}</td>
                            <td>{{ $users[$task->assigned_to_id]  ?? '' }}</td>
                            <td>{{ $task->created_at->format('d.m.Y') }}</td>
                            @auth
                                <td>
                                    @if(auth()->id() == $task->created_by_id)
                                        <a data-confirm="Вы уверены?"
                                           data-method="delete"
                                           href="{{ route('tasks.destroy', $task->id) }}"
                                           class="text-red-600 hover:text-red-900">
                                            Удалить
                                        </a>
                                    @endif
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="text-blue-600 hover:text-blue-900">
                                        Изменить
                                    </a>
                                </td>
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-4">
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
                                    <a href="/tasks?page=2" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                        2
                                    </a>
                                    <a href="/tasks?page=2" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </nav>
                </div> --}}
            </div>
    </section>
@endsection
