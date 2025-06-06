@extends('layouts.app')

@section('content')  <!-- Заполняем секцию content -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-5 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-5">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('messages.label_changing') }}</h1>
            {{ html()->modelForm($label, 'PATCH', route('labels.update', $label))->open() }}
                @include('labels.form')
                {{ html()->submit(__('messages.update'))->class('block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            {{ html()->closeModelForm() }}
        </div>
    </div>
</section>
@endsection
