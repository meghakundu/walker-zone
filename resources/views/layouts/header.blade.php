@auth
<div>
        @php
        $name= auth()->user()->name;
        @endphp
       {{$name}}
            <a href="/logout" class="btn btn-primary">Logout</a>
</div>
@endauth