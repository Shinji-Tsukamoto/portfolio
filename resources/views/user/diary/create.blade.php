@extends('layouts.user')

@section('title', '日記の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日記新規作成</h2>
                <form action="{{action('User\PostController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                         <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class ="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type ="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image_path">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">日記の公開</label>
                        <div class="col-md-6">
                            <select class="form-control" id="status" name="status">
                                <option value="1" selected>公開</option>
                                <option value="2">下書き</option>
                            </select>
                        </div>
                    </div>            
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>                
            </div>
        </div>    
    </div>
@endsection
            