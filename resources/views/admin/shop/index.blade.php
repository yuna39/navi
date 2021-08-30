@extends('layouts.admin')
@section('title', 'やちなび-一覧-')

@section('content')
    <div class="container">
        <div class="row">
            <h2>yachiyo's eating★☆</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\ShopController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">お店検索</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="GO!">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">店名</th>
                                <th width="40%">紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $navi)
                                <tr>
                                    <th>{{ $navi->id }}</th>
                                    <td>{{ \Str::limit($navi->name, 100) }}</td>
                                    <td>{{ \Str::limit($navi->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ShopController@edit', ['id' => $navi->id])  }}" role="button" class="btn btn-primary">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ShopController@delete', ['id' => $navi->id]) }}" role="button" class="btn btn-primary">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{ action('Admin\ShopController@add') }}" role="button" class="btn btn-primary">new post!</a>
        </div>
    </div>
@endsection