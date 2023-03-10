@extends('layouts.app')

@section('content')

<body>

	<div class="max-w-2xl mx-auto bg-white p-16">

		<form method='POST' action="{{ route('update', [ 'id' =>$showReview['id'] ]) }}" enctype="multipart/form-data">
			<input type='hidden' name='user_id' value="{{$user['id']}}">
			<input type='hidden' name='onsenName' value="{{$showReview['onsenName']}}">
			@csrf


			<h1 class="block text-4xl font-bold text-gray-800 mb-11">レビューの編集</h1>

			<div class="mb-8">
				@if ($errors->any())
				<ul>
					@foreach ($errors->all() as $error)
					<li>・{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>

			<div class="mb-8">
				<label for="onsenmei"
					class="block mb-2 text-sm font-medium text-gray-900">温泉名:</label>
				{{$onsen['name']}}
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900">レビュー点数:</label>
				<select name='star' value="{{$showReview['star']}}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option selected>{{$showReview['star']}}</option>
					<option>★☆☆☆☆</option>
					<option>★★☆☆☆</option>
					<option>★★★☆☆</option>
					<option>★★★★☆</option>
					<option>★★★★★</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900">時間帯:</label>
				<select name='time'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option selected>{{$showReview['time']}}</option>
					<option>早朝</option>
					<option>午前</option>
					<option>昼</option>
					<option>夕方</option>
					<option>夜</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900">レビュー詳細:</label>
				<textarea name='content'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
					maxlength='3000' row='4'>{{$showReview['content']}}</textarea>
			</div>


			<div class="mb-8">
				<label for="tag" class="block mb-2 text-sm font-medium text-gray-900">タグ</label>
				<input name='tag' type="text" value="{{ $tags['name'] }}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
					id="tag" list="tags" placeholder="テキスト入力もしくはクリック">
				<datalist id="tags">
					@foreach($allTags as $allTag)
					<option> {{$allTag['name']}}</option>
					@endforeach
				</datalist>
			</div>


			<div class="mb-8">
				<label for="image" class="block mb-2 text-sm font-medium text-gray-900">写真</label>
				<div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
					<input type="file" name='image' id="image" src="{{ '/storage/' . $showReview['image']}}">
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
					class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">更新する</button>
			</div>
			<div>
				<button type="button"
					class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
					onclick="location.href = '/show/{{$showReview['id']}}'">更新をやめる</button>
			</div>
		</form>

	</div>
</body>

@endsection