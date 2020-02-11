@if($errors->any())

    @foreach($errors->all() as $E)
        {{$E}}
        @endforeach
        @endif
