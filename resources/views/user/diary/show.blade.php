@extends('layouts.user')
@section('title', '日記の詳細')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>

    @if (Auth::id() != $user->id)

        @if(Auth::user()->is_favorite($diary->id))

            {!! Form::open(['route' =>['favorite.unfavorite',$diary->id], 'method' => 'delete']) !!}
                {!! Form::submit('いいね！を外す',['class' => "button btn btn-warning"]) !!}
            {!! Form::close() !!} 

        @else

            {!! Form::open(['route' => ['favorites.favorite',$diary->id]]) !!}
                {!! Form::submit('いいね！を付ける',['class' => "button btn btn-success"]) !!}
            {!! Form::close() !!}
        
        @emdif
        
    @endif 
    <div class="text-right mb-2">いいね！
        <span class="badge badge-pill badge-success">{{ $count_favorite_users }}</span>
    </div>       
    <a href="/user">一覧に戻る</a>
@endsection    
