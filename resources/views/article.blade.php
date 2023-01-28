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


                    <br>
                    <h1>投稿レビュー一覧</h1>
                    @foreach($reviews AS $review)
                    <div>
                    <a href="/show/{{$review['id']}}">{{$review['content']}}</a>
                    </div>
                    @endforeach

                    {{ $reviews->links() }}
                    <br>

                    <div></div>
                    <br>
                    <br>

                    <button onclick="location.href='{{ route('home') }}'">ホームへ戻る</button>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
