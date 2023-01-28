@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    <h1>レビュー詳細</h1>
                    <br>                    
                    

                    <h2>訪れた温泉名　</h2>
                    <h4>{{$onsen['name']}}</h4>

                    <h2>評価された点数</h2>
                    <p>{{$showrev['star']}}</p>

                    <h2>投稿されたレビュー詳細</h2>
                    <p>{{$showrev['content']}}</p>
                    <br>

                    <h2>時間帯</h2>
                    <p>{{$showrev['time']}}</p>

                    <h3>タグ</h3>
                    <p>{{$tags['name']}}</p>
        
                    <br>
                    <h3>アップされた画像</h3>
                    <img src="{{ '/storage/' . $showrev['image']}}" class='w-100 mb-3'/>
                    <div></div>

                    @if (!is_null($myshowrev))
                    <button type="button" onclick="location.href='/edit/{{$showrev['id']}}'">レビューを編集する</button>
                        <br>
                        <br>
                        <form method='POST' action="/delete/{{$showrev['id']}}" id='delete-form'>
                            @csrf
                            <button type="submit">レビューを削除する</button>
                        </form> 
                    @endif

                    <br>
                    <div class="col-5">
                        <button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='/home'">ホームへ戻る</button>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
