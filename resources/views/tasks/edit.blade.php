@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">Изменение задачи</h1>
            <form class="w-1/3" method="POST" action={{ route('tasks.update', $task) }}><input type="hidden" name="_method" id="_method" value="PATCH">
                @csrf
                <div class="flex flex-col">
                    <div>
                        <label for="name">Имя</label>
                    </div>
                    <div class="mt-2">
                        <input class="rounded border-gray-300 w-full" type="text" name="name" id="name" value="{{ $task->name }}">
                    </div>
                    <div class="mt-2">
                        <label for="description">Описание</label>
                    </div>
                    <div>
                        <textarea class="rounded border-gray-300 w-full h-32" name="description" id="description">{{ $task->description }}</textarea>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">Статус</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full" name="status_id" id="status_id">
                            @foreach($task_statuses as $id => $name))
                                <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">Исполнитель</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full" name="assigned_to_id" id="assigned_to_id">
                            @foreach($users as $id => $name))
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">Метки</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full h-32" name="labels[]" id="labels[]" multiple>
                            <option value="1" selected="selected">ошибка</option>
                            <option value="2" selected="selected">документация</option>
                            <option value="3" selected="selected">дубликат</option>
                            <option value="4" selected="selected">доработка</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Обновить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection



{{-- @extends('layouts.app')

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-5 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-5">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.status_changing') }}</h1>
            {{ html()->modelForm($taskStatus, 'PATCH', route('task_statuses.update', $taskStatus))->open() }}
            @include('task_statuses.form')
            {{ html()->submit(__('messages.update_status'))->class('block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            {{ html()->closeModelForm() }}
        </div>
    </div>
</section>
@endsection --}}
