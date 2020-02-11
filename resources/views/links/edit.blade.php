@extends('layouts.main')

@section('content')

    @foreach($links as $link)

    <form method="post" action={{route('checkEdit',['id'=>$link->id])}}>
        @csrf
        <label for="id">id</label>
        <input type="text" id="id" readonly value={{ $link->id }} >
        <label>Short link</label>
        <input type="text" id="slug" readonly value={{$link->slug}} >
        <label>url</label>
        <input type="url" id="url"  name="url" value={{$link->url}} >

        <button type="submit">edit</button>
    </form>
    @endforeach
@endsection
