@extends('layouts.user')
@section('title','プロフィール')

@section('content')
    <p>{{ $user->name }}</p>
    <p>{{ $user->profile->gender }}</p>
    <p>パスワード</p>
    <a href="/user">一覧に戻る</a>
@endsection    