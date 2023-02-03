@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font overflow-hidden">
	<div class="container px-5 py-24 mx-auto">
		<div class="lg:w-4/5 mx-auto flex flex-wrap">
			<img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
				src="{{ '/storage/' . $showrev['image']}}">

			<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
				<h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
				<h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$onsen['name']}}</h1>

				<div class="flex mb-4">
					<span class="flex items-center">
						<p class="leading-relaxed line-clamp-7 text-yellow-500">{{$showrev['star']}}</p>
					</span>
					<span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
						<p>時間帯：{{$showrev['time']}}</p>
					</span>
				</div>

				<p class="leading-relaxed text-gray-900">{{$showrev['content']}}</p>

				<div class="flex mt-3 items-center pb-5 border-b-2 border-gray-100 mb-5">
					<div class="flex">

					</div>

				</div>
				<div class="flex">
					<span class="title-font ">タグ：{{$tags['name']}}</span>

					@if (!is_null($myshowrev))
					<button
						class="flex ml-auto text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
						type="button" onclick="location.href = '/edit/{{$showrev['id']}}'">レビューを編集する</button>

					<form method='POST'
						class="flex ml-auto text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
						action="/delete/{{$showrev['id']}}" id='delete-form'>
						@csrf
						<button type="submit">レビューを削除する</button>
					</form>
					@endif
				</div>
				<div class="flex flex-row-reverse mt-14">
					<button type="button"
						class="flex ml-auto text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
						onclick="location.href = '/home'">ホームへ戻る</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection