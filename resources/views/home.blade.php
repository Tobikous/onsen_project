@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<h1 class="text-3xl font-bold underline bg-red-700">
    Hello world!
</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ホーム画面です') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    {{ __('ようこそ! ') }}{{ Auth::user()->name }}{{ __(' 様') }}
                    <br>
                    <br>
                    <h1>投稿レビュー一覧</h1>

                    
                    @foreach($reviews AS $review)
                    <div>                    
                    <a href="/show/{{$review['id']}}">{{$review['content']}}</a>
                    </div>
                    @endforeach

                    <button onclick="location.href='{{ route('article') }}'">更にレビューを見る</button>

                    <br>
                    <h1>自分が投稿したレビュー</h1>
                    @foreach($my_reviews AS $my_review)
                    <div>
                    <a href="/show/{{$my_review['id']}}">{{$my_review['content']}}</a>
                    </div>
                    @endforeach

                    <div></div>
                    <button onclick="location.href='{{ route('create') }}'">記事を投稿する</button>

                    <div class="alert alert-primary" role="alert">
                        A simple primary alert—check it out!
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
