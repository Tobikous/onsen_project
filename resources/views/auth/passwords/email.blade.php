@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font">
	<div class="container px-5 py-24 mx-auto">
		<form method="POST" action="{{ route('password.email') }}">
			@csrf
			<div class="flex flex-col text-center w-full mb-12">
				<h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">パスワードをリセットします</h1>
				<p class="lg:w-2/3 mx-auto leading-relaxed text-base">アカウントを作った際に用いられたメールアドレス宛に、パスワードを初期化するURLをお送りします
				</p>
			</div>


			<div
				class="lg:w-1/2 flex justify-center mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
				@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				@endif

				<div class="lg:w-1/2 w-full flex-grow">
					<label for="full-name" class="leading-7 text-base text-gray-600 m-1">メールアドレス</label>
					<div>
						<input id="email" type="email" name="email" value="{{ old('email') }}" required
							autocomplete="email" autofocus
							class="mt-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-transparent focus:ring-2 focus:ring-orange-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out form-control @error('email') is-invalid @enderror">
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<button type="submit"
					class="lg:w-1/2 text-white bg-orange-500 border-0 py-2 px-8 focus:outline-none hover:bg-orange-600 rounded text-lg">メールアドレスにURLを送る</button>

			</div>
		</form>
	</div>
</section>
@endsection