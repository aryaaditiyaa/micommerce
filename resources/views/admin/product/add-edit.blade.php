@extends('partials.navbar-admin')

@section('content')
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto pt-6 pb-10 px-4 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">@if($product != null) Update @else Add New @endif Product</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Product will be displayed at user homepage
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    @if ($errors->any())
                        <div class="my-3">
                            @foreach ($errors->all() as $error)
                                <div class="flex flex-wrap text-white p-3 border-0 rounded relative my-2 bg-red-700">
                                <span class="text-xl inline-block mr-5 align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </span>
                                    <span class="inline-block">
                                    {{ $error }}
                                </span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <form
                        action="@if($product != null) {{ route('product.update', $product->id) }} @else {{ route('product.store') }} @endif"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($product != null) @method('PATCH') @endif
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company-website"
                                               class="block text-sm font-medium text-gray-700">Name
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="name" id="name"
                                                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                   @if($product != null) value="{{ $product->name }}" @endif
                                                   placeholder="Journey to The End">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">
                                        Price
                                    </label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                                Rp
                                            </span>
                                        </div>
                                        <input type="text" name="price" id="price"
                                               class="focus:ring-indigo-500 focus:border-indigo-500 block w-1/4 pl-9 sm:text-sm border-gray-300 rounded-md"
                                               @if($product != null) value="{{ $product->price }}" @endif
                                               placeholder="0.00">
                                    </div>
                                </div>

                                @if($product != null)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            Old Photo
                                        </label>
                                        <div class="mt-1 flex items-center">
                                            <img class="object-cover h-32" width="240" loading="lazy"
                                                 src="{{ asset('storage/'. $product->image) }}">
                                        </div>
                                    </div>
                                @endif

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        New Photo
                                    </label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="image" id="image"
                                               class="focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm"
                                               placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
