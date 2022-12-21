@extends('partials.navbar')

@section('content')
    <div class="bg-wnahite">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Products</h2>

            @if ($message = \Illuminate\Support\Facades\Session::get('message'))
                <div class="my-6">
                    <div class="flex flex-wrap text-white p-3 border-0 rounded relative my-2 bg-green-700">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <span class="inline-block">{{ $message }}</span>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-4 lg:grid-cols-4 xl:gap-x-6">
                @foreach($products as $product)
                    <a href="#" class="group border border-gray-100 rounded shadow p-4">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="{{ asset('storage/'. $product->image) }}" class="w-full h-64 object-center object-cover group-hover:opacity-75" alt="">
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="self-center">
                                <h3 class="text-sm text-gray-700">
                                    {{ $product->name }}
                                </h3>
                                <p class="mt-1 text-lg font-bold text-indigo-600">
                                    {{ "Rp " . number_format($product->price, 0 , '.' , ',') }}
                                </p>
                            </div>
                            <div class="self-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="inline-flex justify-center py-4 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="pt-4 lg:pt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
