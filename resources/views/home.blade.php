@extends('layouts.app')

@section('content')

<body>


	<div class="container">



		<div class="flex container  w-full flex-col text-center my-10">
			@if (session('success'))
			<div class="mb-5 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
				<p class="font-bold">{{ session('success') }}</p>
			</div>
			@endif

			@if(Auth::user()->id !== 1 )
			<button
				class=" m-auto text-white bg-orange-500 border-0 py-8 px-20 focus:outline-none hover:bg-orange-600 rounded font-semibold text-4xl"
				onclick="location.href='{{ route('create') }}'">レビューを投稿する</button>
			@endif
		</div>



		<section class="text-gray-600 body-font">
			<div class="container px-5 py-10 mx-auto">
				<h1 class="title-font text-3xl  font-medium text-gray-900 mb-5">投稿レビュー一覧</h1>
				<div class="flex flex-wrap -m-4">
					@foreach($reviews AS $review)
					<div class="p-4 lg:w-1/3">
						<div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-8 pb-10 rounded-lg text-center">
							<img alt="gallery" class="lg:h-48 md:h-36 w-full object-cover object-center"
								src="{{$review['image']}}">
							<h2 class="text-yellow-500 tracking-widest text-s title-font font-medium mt-3">
								{{$review['star']}}
							</h2>
							<h1
								class="title-font sm:text-xl text-xl font-medium text-gray-600 mb-2.5 line-clamp-2 overflow-hidden">
								{{$review['onsenName']}}</h1>
							<p class="leading-relaxed mb-2 line-clamp-3">{{$review['content']}}</p>
							<a class="text-yellow-500 hover:text-yellow-600 inline-flex items-center p-1.5"
								href="/show/{{$review['id']}}">レビュー詳細
								<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
									fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M5 12h14"></path>
									<path d="M12 5l7 7-7 7"></path>
								</svg>
							</a>

						</div>
					</div>
					@endforeach
				</div>
				<a class="float-right mt-5 text-blue-500 inline-flex items-center" href="article">▶全てのレビューを見る</a>
			</div>
		</section>



		@if(Auth::user()->id !== 1 )
		<section class="text-gray-600 body-font">
			<div class="container px-5 py-24 mx-auto">
				<h1 class="title-font text-3xl font-medium text-gray-900 mb-5">自分が投稿したレビュー</h1>
				<div class="flex flex-wrap -m-4">
					@foreach($myReviews AS $myReview)
					<div class="p-4 md:w-1/3">
						<div class="h-full border-2 border-gray-300 border-opacity-60 rounded-lg overflow-hidden">
							<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{$myReview['image']}}"
								alt="blog">
							<div class="p-6">
								<h1 class="title-font text-lg font-medium text-gray-900 ">{{$myReview['onsenName']}}
								</h1>
								<h2 class="text-yellow-500 tracking-widest text-s title-font font-medium  mb-3">
									{{$myReview['star']}}
								</h2>
								<p class="leading-relaxed mb-3 line-clamp-3">{{$myReview['content']}}</p>
								<div class="flex items-center flex-wrap ">
									<a class="text-yellow-500 inline-flex items-center md:mb-2 lg:mb-0 p-1"
										href="/show/{{$review['id']}}">レビュー詳細
										<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
											stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path d="M5 12h14"></path>
											<path d="M12 5l7 7-7 7"></path>
										</svg>
									</a>
									<span
										class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
										<svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
											stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
											<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
											<circle cx="12" cy="12" r="3"></circle>
										</svg>1.2K
									</span>
									<span class="text-gray-400 inline-flex items-center leading-none text-sm">
										<svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
											stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
											<path
												d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
											</path>
										</svg>6
									</span>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		@endif
	</div>

</body>

@endsection