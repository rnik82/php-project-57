{{  html()->label(__('messages.name'), 'name')->class('block mb-2') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3') }}
@if ($errors->any())
    <div class="text-rose-600 mt-2 mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
    </ul>
</div>
@endif
{{  html()->label(__('messages.description'), 'description')->class('block mb-2') }}
{{  html()->textarea('description')->class('rounded border-gray-300 w-1/3 h-32') }}
