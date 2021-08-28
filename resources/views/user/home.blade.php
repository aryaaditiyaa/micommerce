@extends('partials.navbar')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Products</h2>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach($products as $product)
                    <a href="#" class="group">
                        <div
                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="{{ asset('storage/'. $product->image) }}"
                                 class="w-full h-64 object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            {{ $product->name }}
                        </h3>
                        <p class="mt-1 text-lg font-medium text-green-600">
                            {{ "Rp " . number_format($product->price, 0 , '.' , ',') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
