{{--  html()->label(__('messages.name'), 'name')->class('block mb-2') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-full') --}}
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
