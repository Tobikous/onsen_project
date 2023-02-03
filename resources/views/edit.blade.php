@extends('layouts.app')

@section('content')

<body>
	<br>
	<h1>レビュー編集</h1>
	<br>

	<div class="border col-7">
		<br>
		<div class="row">
			<div class="col-md">

				<form method='POST' action="{{ route('update', [ 'id' =>$showrev['id'] ]) }}">
					<input type='hidden' name='user_id' value="{{ $user['id'] }}">
					@csrf

					<h2>訪れた温泉</h2>
					<p>{{$onsen['name']}}</p>

					<div class="form-group">
						<label>レビュー点数:</label>
						<select name='star' class="form-control" value="{{$showrev['star']}}">
							<option selected>{{$showrev['star']}}</option>
							<option>★☆☆☆☆</option>
							<option>★★☆☆☆</option>
							<option>★★★☆☆</option>
							<option>★★★★☆</option>
							<option>★★★★★</option>
						</select>
					</div>

					<div class="form-group">
						<label>時間帯:</label>
						<select name='time' class="form-control">
							<option selected>{{$showrev['time']}}</option>
							<option>早朝</option>
							<option>午前</option>
							<option>昼</option>
							<option>夕方</option>
							<option>夜</option>
						</select>
						<div class="form-group">

							<label>レビュー詳細:</label>
							<textarea name='content' class="form-control" maxlength='3000'
								row='4'>{{$showrev['content']}}</textarea>
						</div>

						<div class="form-group">
							<label for="image">画像アップロード</label>
							<input type="file" class="form-control-file" name='image' id="image"
								src="{{ '/storage/' . $showrev['image']}}">
						</div>

						<div class="form-group">
							<label for="tag">タグ</label>
							<input name='tag' type="text" class="form-control" id="tag" list="tags"
								value="{{ $tags['name'] }}">
							<datalist id="tags">
								@foreach($alltags as $alltag)
								<option> {{$alltag['name']}}</option>
								@endforeach
							</datalist>
						</div>

						<div class="col-1">
						</div>
						<br>
						<div class="col-5">
							<button type="button" class="btn btn-outline-secondary btn-block"
								onclick="location.href = '/show/{{$showrev['id']}}'">更新をやめる</button>
						</div>
						<div class="col-1">
						</div>
						<br>
						<div class="col-5">
							<button type="submit" class="btn btn-outline-primary btn-block">更新する</button>
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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
</body>

<body>

	<div class="max-w-2xl mx-auto bg-white p-16">

		<form method='POST' action="/store" enctype="multipart/form-data">
			<input type='hidden' name='user_id' value="{{ $user['id'] }}">
			@csrf


			<h1 class="block text-4xl font-bold text-gray-800 dark:text-white mb-11">レビューの投稿</h1>

			<div class="mb-8">
				<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">氏名:</label>
				<input type="text"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					value="{{$user['name']}}">
			</div>

			<div class="mb-8">
				<label for="onsenmei"
					class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">温泉名:</label>
				<input type="text" name='onsenmei' placeholder="行った場所を記入してください"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">レビュー点数:</label>
				<select name='star'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option value="" selected hidden>選択してください</option>
					<option>★☆☆☆☆</option>
					<option>★★☆☆☆</option>
					<option>★★★☆☆</option>
					<option>★★★★☆</option>
					<option>★★★★★</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">時間帯:</label>
				<select name='time'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option>早朝</option>
					<option>午前</option>
					<option>昼</option>
					<option>夕方</option>
					<option>夜</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">レビュー詳細:</label>
				<textarea name='content'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					maxlength='3000' row='4'></textarea>
			</div>


			<div class="mb-8">
				<label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">タグ</label>
				<input name='tag' type="text"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					id="tag" list="tags" placeholder="テキスト入力もしくはクリック">
				<datalist id="tags">
					@foreach($alltags as $alltag)
					<option> {{$alltag['name']}}</option>
					@endforeach
				</datalist>
			</div>


			<div class="mb-8">
				<label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">写真</label>
				<div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
					<input type="file" name='image' id="image">
					<div class="space-y-1 text-center">

						<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
							viewBox="0 0 48 48" aria-hidden="true">
							<path
								d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<div class="flex text-sm text-gray-600">
							<label for="file-upload"
								class="cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">

							</label>
							<p class="pl-1">or drag and drop</p>
						</div>
						<p class="text-xs text-gray-500">PNG, JPG, GIF up</p>
					</div>
				</div>
			</div>

			<div class="mb-6">
				<button type="submit"
					class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">レビューを投稿する</button>
			</div>
			<div>
				<button type="button"
					class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-400 dark:hover:bg-blue-500 dark:focus:ring-blue-600"
					onclick="location.href  =  '/home'">投稿をやめる</button>
			</div>
		</form>

	</div>
</body>

@endsection