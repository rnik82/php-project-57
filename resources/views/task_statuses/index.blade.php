@extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">Статусы</h1>

            <div class="flex justify-start">
                {{ html()->a(route('task_statuses.create'), 'Создать статус')
                    ->class('inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            </div>

            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
                </thead>
                @foreach ($taskStatuses as $status)
                    <tr class="border-b border-dashed text-left">
                        <td>{{$status->id}}</td>
                        <td>{{$status->name}}</td>
                        <td>{{$status->created_at}}</td>
                        <td class="align-middle">
                            <div class="inline-flex items-baseline space-x-1">
                                <td>
                                    {{ html()->a(route('task_statuses.destroy', $status->id), 'Удалить')
                                        ->class('text-red-600 hover:text-red-900')
                                        ->data('method', 'delete')
                                        ->data('confirm', 'Вы уверены?') }}

                                    {{ html()->a(route('task_statuses.edit', $status->id), 'Изменить')
                                        ->class('text-blue-600 hover:text-blue-900') }}
                                </td>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
