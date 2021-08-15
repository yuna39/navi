@extends('layouts.admin')

@section('title', 'やちなび -投稿-')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>やちなび 投稿画面</h2>
                <form action="{{ action('Admin\ShopController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0) 
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <!--お店の名前-->
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <!--お店紹介-->
                    <div class="form-group row">
                        <label class="col-md-2">紹介文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <!--お店の画像-->
                    <div class="form-group row">
                        <label class="col-md-5">お店の画像</label>
                        <div class="col-md-7">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <!--お店のメニューの写真-->
                    <div class="form-group row">
                        <label class="col-md-5">メニュー画像</label>
                        <div class="col-md-7">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection
