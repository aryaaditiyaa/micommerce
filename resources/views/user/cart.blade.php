@extends('partials.navbar')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Cart</h2>

            <div class="grid grid-cols-2 space-x-32">
                <div class="shadow-sm rounded bg-gray-50 p-6">
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                        <li class="py-8 flex">
                            <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                    class="w-full h-full object-center object-cover">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#">
                                                Throwback Hip Bag
                                            </a>
                                        </h3>
                                        <p class="ml-4">
                                            $90.00
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Qty
                                    </p>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="custom-number-input w-1/4 mt-2">
                                        <div class="flex flex-row w-3/4 rounded-lg relative bg-transparent">
                                            <button data-action="decrement"
                                                    class=" bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 w-20 rounded-l cursor-pointer outline-none">
                                                <span class="m-auto text-xl font-thin">−</span>
                                            </button>
                                            <input type="number"
                                                   class="border border-gray-100 outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-sm hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700 outline-none"
                                                   name="custom-input-number" value="1" min="1"/>
                                            <button data-action="increment"
                                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 w-20 rounded-r cursor-pointer">
                                                <span class="m-auto text-xl font-thin">+</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="">
                    aaaaaaaaaaaaaaaaaa
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

@section('js')
    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value--;
            target.value = value;
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    </script>
@endsection
