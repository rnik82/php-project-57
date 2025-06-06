@extends('layouts.app')  <!-- Указываем, какой макет использовать -->

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.create_label') }}</h1>
            {{ html()->modelForm($label, 'POST', route('labels.store'))->open() }}
            @csrf
            @include('labels.form')
            {{ html()->submit(__('messages.create'))->class('block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            {{ html()->closeModelForm() }}
        </div>
    </div>
</section>
@endsection
