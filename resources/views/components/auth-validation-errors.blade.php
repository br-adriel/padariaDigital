@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
