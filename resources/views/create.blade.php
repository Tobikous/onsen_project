@extends('layouts.app')

@section('content')

<body>

	<div class="max-w-2xl mx-auto bg-white p-16">

		<form method='POST' action="/store" enctype="multipart/form-data">
			<input type='hidden' name='user_id' value="{{ $user['id'] }}">
			@csrf


			<h1 class="block text-4xl font-bold text-gray-800 mb-11">レビューの投稿</h1>


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
				<label class="block mb-2 text-sm font-medium text-gray-900">都道府県:</label>
				<select name='area'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option value="" selected hidden>選択してください</option>
					<optgroup label="北海道">
						<option value="北海道">北海道</option>
					<optgroup label="東北">
						<option value="青森県">青森県</option>
						<option value="秋田県">秋田県</option>
						<option value="岩手県">岩手県</option>
						<option value="山形県">山形県</option>
						<option value="宮城県">宮城県</option>
						<option value="福島県">福島県</option>
					</optgroup>
					<optgroup label="関東">
						<option value="茨城県">茨城県</option>
						<option value="栃木県">栃木県</option>
						<option value="群馬県">群馬県</option>
						<option value="埼玉県">埼玉県</option>
						<option value="千葉県">千葉県</option>
						<option value="東京都">東京都</option>
						<option value="神奈川県">神奈川県</option>
					</optgroup>
					<optgroup label="中部">
						<option value="新潟県">新潟県</option>
						<option value="富山県">富山県</option>
						<option value="石川県">石川県</option>
						<option value="福井県">福井県</option>
						<option value="山梨県">山梨県</option>
						<option value="長野県">長野県</option>
						<option value="岐阜県">岐阜県</option>
						<option value="静岡県">静岡県</option>
						<option value="愛知県">愛知県</option>
					</optgroup>
					<optgroup label="近畿">
						<option value="三重県">三重県</option>
						<option value="滋賀県">滋賀県</option>
						<option value="京都府">京都府</option>
						<option value="大阪府">大阪府</option>
						<option value="兵庫県">兵庫県</option>
						<option value="奈良県">奈良県</option>
						<option value="和歌山県">和歌山県</option>
					</optgroup>
					<optgroup label="中国">
						<option value="岡山県">岡山県</option>
						<option value="広島県">広島県</option>
						<option value="鳥取県">鳥取県</option>
						<option value="島根県">島根県</option>
						<option value="山口県">山口県</option>
					</optgroup>
					<optgroup label="四国">
						<option value="徳島県">徳島県</option>
						<option value="香川県">香川県</option>
						<option value="愛媛県">愛媛県</option>
						<option value="高知県">高知県</option>
					</optgroup>
					<optgroup label="九州沖縄">
						<option value="福岡県">福岡県</option>
						<option value="佐賀県">佐賀県</option>
						<option value="長崎県">長崎県</option>
						<option value="熊本県">熊本県</option>
						<option value="大分県">大分県</option>
						<option value="宮崎県">宮崎県</option>
						<option value="鹿児島県">鹿児島県</option>
						<option value="沖縄県">沖縄県</option>
					</optgroup>
				</select>
			</div>

			<div class="mb-8">
				<label for="onsenName"
					class="block mb-2 text-sm font-medium text-gray-900">温泉名:</label>
				<input type="text" name='onsenName' placeholder="行った場所を記入してください"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900">レビュー点数:</label>
				<select name='star'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option value="" selected hidden>選択してください</option>
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
					maxlength='3000' row='4'></textarea>
			</div>


			<div class="mb-8">
				<label for="tag" class="block mb-2 text-sm font-medium text-gray-900">タグ</label>
				<input name='tag' type="text"
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
						<p class="text-xs text-gray-500">PNG, JPG up</p>
					</div>
				</div>
			</div>

			<div class="mb-6">
				<button type="submit"
					class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">レビューを投稿する</button>
			</div>
			<div>
				<button type="button"
					class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
					onclick="location.href  =  '/home'">投稿をやめる</button>
			</div>
		</form>

	</div>
</body>

@endsection