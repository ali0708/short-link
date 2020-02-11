@extends('layouts.main')

@section('content')
    <table class="table table-bordered table-hover table-striped" id="links-table">
        <tr>
            <td>#</td>
            <td>url</td>
            <td>Short link</td>
            <td>operation</td>
            <td>Condition</td>
        </tr>

        @foreach($links as $link)
        <tr>
            <td>{{$link->id}}</td>
            <td>{{$link->url}}</td>
            <td>
                <a href="{{route('me',['slug' => $link->slug])}}">{{env('APP_URL', 'http://localhost/').$link->slug}}</a>
            </td>
            <td>
                @can('delete' ,$link)
                    <a href={{route('delete',['id'=>$link->id])}}>remove</a>
                @endcan
                @can('edit',$link)
                    <a href={{route('edit',['id'=>$link->id])}}>update</a>
                @endcan
                @can('changeCondition',$link)
                    <a href={{route('changeCondition',['id'=>$link->id])}}>change Condition</a>
                @endcan
            </td>
            <td>{{$link->getstatus()}}</td>

        </tr>
        @endforeach

    </table>
@endsection()
