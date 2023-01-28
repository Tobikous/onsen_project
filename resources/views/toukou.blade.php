<!doctype html>
<html lang="ja">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <title>レビュー投稿画面</title>
</head>
 
<body>
    <br>
    <h1>〇〇のレビュー</h1>
    <br>
 
    <div class="border col-7">
        <br>
        <h2>レビュー登録</h2>
        <br>
        <div class="row">
            <div class="col-md">
                <form method='POST' action="/store" enctype="multipart/form-data">
                <input type='hidden' name='user_id' value="{{ $user['id'] }}">                
                @csrf
                    
                    <div class="form-group">
                        <label>氏名:</label>
                        <input type="text" class="form-control" value="{{$user['name']}}">
                    </div>

                    <div class="form-group">
                        <label>レビュー点数:</label>
                        <select name='star' class="form-control">
                            <option value="" selected hidden>選択してください</option>
                            <option>★</option>
                            <option>★★</option>
                            <option>★★★</option>
                            <option>★★★★</option>
                            <option>★★★★★</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>時間帯:</label>
                        <select name='time' class="form-control">
                            <option>早朝</option>
                            <option>午前</option>
                            <option>昼</option>
                            <option>夕方</option>
                            <option>夜</option>
                        </select>
                    </div>
                

                    <div class="form-group">
                        <label>レビュー詳細:</label>
                        <textarea name='content' class="form-control" maxlength='3000' row='4'></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tag">タグ</label>
                        <input name='tag' type="text" class="form-control" id="tag" list="tags" placeholder="テキスト入力もしくはダブルクリック">
                        <datalist id="tags">
                        @foreach($alltags as $alltag)
                        <option> {{$alltag['name']}}</option>
                        @endforeach
                        </datalist>
                    </div>


                    
                    <div class="form-group">
                    <label for="image">画像アップロード</label>
                    <input type="file" class="form-control-file" name='image' id="image">
                    </div>

                    <div class="col-1">
                    </div>
                    <br>
                    <div class="col-5">
                        <button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='/home'">レビューやめる</button>
                    </div>
                    <div class="col-1">
                    </div>
                    <br>
                    <div class="col-5">
                        <button type="submit" class="btn btn-outline-primary btn-block">レビュー投稿</button>
                    </div>
                </form>


            </div>
        </div>

        <div class="col-1">
        </div>
        <br>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
 
</html>