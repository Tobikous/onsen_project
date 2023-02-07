@extends('layouts.app')

@section('content')

<body>
	<session class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-24 mx-auto">
			<div class="lg:w-4/5 mx-auto flex flex-wrap">
				<img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
					src="{{ '/storage/' . $showReview['image']}}">

				<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
					<h2 class="text-sm title-font text-gray-500 tracking-widest">{{$onsen['area']}}</h2>
					<h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$onsen['name']}}</h1>

					<div class="flex mb-4">
						<span class="flex items-center">
							<p class="leading-relaxed line-clamp-7 text-yellow-500">{{$showReview['star']}}</p>
						</span>
						<span class="ml-3 pl-3 py-1 border-l-2 border-gray-200 space-x-2s">
							<p class="text-gray-900 text-base font-medium">投稿者：{{$showReview['name']}}</p>
							<p class="text-sm">投稿日：{{$showReview['created_at']}}</p>
							<p class="text-sm">更新日：{{$showReview['updated_at']}}</p>

						</span>
					</div>

					<p class="leading-relaxed text-gray-900">{{$showReview['content']}}</p>

					<div class="flex mt-3 items-center pb-5 border-b-2 border-gray-100 mb-2">
						<div class="flex">

						</div>

					</div>
					<span class="title-font ">タグ：{{$tags['name']}}</span>
					<span class="title-font ">時間帯：{{$showReview['time']}}</span>
					<div class="flex mt-7">

						@if (!is_null($myShowReview))
						<button
							class="flex ml-auto text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
							type="button" onclick="location.href = '/edit/{{$showReview['id']}}'">レビューを編集する</button>

						<form method='POST' action="/delete/{{$showReview['id']}}" id='delete-form'>
							@csrf
							<button
								class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 ml-5 focus:outline-none hover:bg-blue-600 rounded"
								data-modal-target="popup-modal" data-modal-toggle="popup-modal"
								type="button">レビューを削除する</button>

							<div id="popup-modal" tabindex="-1"
								class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
								<div class="relative w-full h-full max-w-md md:h-auto">
									<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
										<button type="button"
											class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
											data-modal-hide="popup-modal">
											<svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
												viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd"
													d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
													clip-rule="evenodd"></path>
											</svg>
											<span class="sr-only">Close modal</span>
										</button>
										<div class="p-6 text-center">
											<svg aria-hidden="true"
												class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
												fill="none" stroke="currentColor" viewBox="0 0 24 24"
												xmlns="http://www.w3.org/2000/svg">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
											</svg>
											<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
												このレビューを削除してもよろしいですか?</h3>
											<button type="submit"
												class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
												はい、消します。
											</button>
											<button data-modal-hide="popup-modal" type="button"
												class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">いいえ、キャンセルします</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						@endif
					</div>
					<div class="flex flex-row-reverse mt-8">
						<button type="button"
							class="flex ml-auto text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
							onclick="location.href = '/home'">ホームへ戻る</button>
					</div>
				</div>
			</div>
		</div>
		<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
	</session>
</body>
@endsection