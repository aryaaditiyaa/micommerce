@extends('partials.navbar-admin')

@section('content')
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Buyer Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->user->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->user->email }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Transaction Information
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Transaction Total
                        </dt>
                        <dd class="mt-1 text-lg font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ "Rp " . number_format($transaction->total, 0 , '.' , ',') }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Transaction Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->created_at }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Product Detail
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <ul role="list" class="bg-gray-50 lg:p-2 divide-y divide-gray-200">
                    @foreach($transaction->transaction_detail as $data)
                        <li class="p-4 flex">
                            <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                <img
                                    src="{{ asset('storage/'. $data->product->image) }}"
                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                    class="w-full h-full object-center object-cover">
                            </div>

                            <div class="ml-4 lg:flex-1 flex flex-col">
                                <div>
                                    <div class="lg:flex justify-between text-base font-medium text-gray-900">
                                        <div>
                                            <h3>
                                                <a href="#">
                                                    {{ $data->product->name }}
                                                </a>
                                            </h3>
                                            <p class="text-sm font-light">Qty : {{ $data->qty }}</p>
                                        </div>
                                        <p class="lg:mt-0 mt-1">
                                            {{ "Rp " . number_format($data->total_price, 0 , '.' , ',') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection
