@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.create_task') }}</h1>
            <form class="w-1/3" method="POST" action="{{ route('tasks.store') }}">
                @csrf
                @include('tasks.form')
                <div class="flex flex-col">
                    <div>
                        <label for="name">{{ __('messages.name') }}</label>
                    </div>
                    <div class="mt-2">
                        <input class="rounded border-gray-300 w-full" type="text" name="name" id="name">
                    </div>
                    <div class="mt-2">
                        <label for="description">{{ __('messages.description') }}</label>
                    </div>
                    <div>
                        <textarea class="rounded border-gray-300 w-full h-32" name="description" id="description"></textarea>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">{{ __('messages.status') }}</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full" name="status_id" id="status_id">
                            <option value selected="selected"></option>
                            @foreach ($task_statuses as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">{{ __('messages.executor') }}</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full" name="assigned_to_id" id="assigned_to_id">
                            <option value selected="selected"></option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="status_id">{{ __('messages.labels') }}</label>
                    </div>
                    <div>
                        <select class="rounded border-gray-300 w-full h-32" name="labels[]" id="labels[]" multiple>
                            @foreach ($labels as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            {{ __('messages.create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection



{{-- @extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.store_status') }}</h1>
            {{ html()->modelForm($taskStatus, 'POST', route('task_statuses.store'))->open() }}
            @include('task_statuses.form')
            {{ html()->submit(__('messages.store_status'))->class('block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            {{ html()->closeModelForm() }}
        </div>
    </div>
</section>
@endsection --}}
