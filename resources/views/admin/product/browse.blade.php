@extends('partials.navbar-admin')

@section('content')
    <div class="bg-white shadow">
        <div class="lg:max-w-7xl max-w-full mx-auto pt-6 pb-10 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 items-center">
                <h1 class="lg:text-3xl text-lg font-bold text-gray-900">
                    Products
                </h1>
                <a href="{{ route('product.create') }}"
                   class="justify-self-end bg-green-600 hover:bg-green-500 lg:p-3 p-1 text-white rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Price
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="object-cover lg:w-48 w-36 h-32" loading="lazy"
                                                 src="{{ asset('storage/'. $product->image) }}">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex text-lg leading-5 font-semibold text-green-500">
                                        {{ "Rp " . number_format($product->price, 0 , '.' , ',') }}
                                    </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                               class="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Edit</a>
                                            <form action="{{ route('product.destroy', $product->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 lg:p-6">
            {{ $products->links() }}
        </div>

    </div>

@endsection
