@extends('layouts.user')
@section('title', '日記の詳細')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>

        
    <a href="/user">一覧に戻る</a>
@endsection    
