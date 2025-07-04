@extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-6">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.labels') }}</h1>
            @auth
                <div>
                    <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('messages.create_label') }}
                    </a>
                </div>
            @endauth
            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>ID</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.description') }}</th>
                    <th>{{ __('messages.creation_date') }}</th>
                    @auth
                        <th>{{ __('messages.actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>
                    @foreach ($labels as $label)
                    <tr class="border-b border-dashed text-left">
                        <td>{{ $label->id }}</td>
                        <td>{{ $label->name }}</td>
                        <td>{{ $label->description }}</td>
                        <td>{{ $label->created_at }}</td>
                        @auth
                            <td class="align-middle">
                                <div class="inline-flex items-baseline space-x-1">
                                    {{ html()->a(route('labels.destroy', $label), __('messages.delete'))
                                        ->class('text-red-600 hover:text-red-900 ml-2')
                                        ->data('method', 'delete')
                                        ->data('confirm', 'Вы уверены?') }}

                                    {{ html()->a(route('labels.edit', $label), __('messages.edit'))
                                        ->class('text-blue-600 hover:text-blue-900 ml-2') }}
                                </div>
                            </td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
