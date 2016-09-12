@extends('layout')
@section('content')
    <h2>Posts</h2>
    <!--{!! Alert::render() !!}-->
<table class="table">
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Acciones</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
        <td>
            @can('update-post',$post)
            <a href="{{url('edit-post',[$post->id])}}">Editar</a></td>
        @else
            <a href="#">Reportar error</a></td>

        @endcan
    </tr>
    @endforeach

</table>
    {!! $posts->render() !!}
    @endsection