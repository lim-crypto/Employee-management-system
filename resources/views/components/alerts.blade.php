<div>
@if ($errors->any())
    <div class="alert alert-danger  py-4 px-2 bg-red-400 ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>