@extends('partials.navbar')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Cart</h2>

            <div class="grid lg:grid-cols-3 grid-cols-1 lg:space-x-8 lg:space-y-0 space-y-8">
                <div class="col-span-2 shadow-sm rounded">
                    <ul role="list" class="bg-gray-50 lg:p-2 divide-y divide-gray-200">
                        @foreach($carts_data as $cart)
                            <li class="p-4 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                    <img
                                        src="{{ asset('storage/'. $cart->product->image) }}"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="w-full h-full object-center object-cover">
                                </div>

                                <div class="ml-4 lg:flex-1 flex flex-col">
                                    <div>
                                        <div class="lg:flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#">
                                                    {{ $cart->product->name }}
                                                </a>
                                            </h3>
                                            <p class="lg:mt-0 mt-1">
                                                {{ "Rp " . number_format($cart->total_price, 0 , '.' , ',') }}
                                            </p>
                                        </div>
                                        <p class="lg:mt-1 mt-2 text-sm text-gray-500">
                                            Qty
                                        </p>
                                    </div>
                                    <div class="lg:flex items-center justify-between text-sm">
                                        <div class="custom-number-input mt-2">
                                            <div class="flex flex-row rounded-lg relative bg-transparent">
                                                <form action="{{ route('updateQuantity', [$cart->id, 'decrease']) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button data-action="decrement"
                                                            class=" bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 w-8 h-full rounded-l cursor-pointer outline-none">
                                                        <span class="m-auto text-xl font-thin">−</span>
                                                    </button>
                                                </form>
                                                <input type="number" id="input_qty"
                                                       class="border border-gray-100 outline-none focus:outline-none text-center w-1/6 bg-gray-100 font-semibold text-sm hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700 outline-none"
                                                       name="custom-input-number" value="{{ $cart->qty }}" min="1"/>
                                                <form action="{{ route('updateQuantity', [$cart->id, 'increase']) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button data-action="increment"
                                                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 w-8 h-full rounded-r cursor-pointer">
                                                        <span class="m-auto text-xl font-thin">+</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="lg:mt-0 mt-2">
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                @csrf
                                                @method(('DELETE'))
                                                <button type="submit"
                                                        class="font-medium text-indigo-600 hover:text-indigo-500">Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-span-1">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Order Information
                            </h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Total Item Types
                                    </dt>
                                    <dd class="mt-1 text-lg font-medium text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $cart_item_count }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Total Price
                                    </dt>
                                    <dd class="mt-1 text-lg font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ "Rp " . number_format($cart_item_total_price, 0 , '.' , ',') }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:px-6">
                                    @if($cart_item_total_price > 0)
                                        <form action="{{ route('checkout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Checkout
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
