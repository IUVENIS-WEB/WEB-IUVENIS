@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if (session('fail.errors'))
                @foreach (session('fail.errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
        </ul>
    </div>
@endif
