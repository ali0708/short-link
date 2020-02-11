@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <form method="post" action={{route('create')}}>
            @csrf
            <label>link</label>
            <input type="url" name="url" >

            <button type="submit">create</button>
        </form>
    </div>
@endsection()
