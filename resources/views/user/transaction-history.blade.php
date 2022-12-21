@extends('partials.navbar')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Transaction History</h2>

            <div class="flex flex-col space-y-4">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse($transactions as $transaction)
                        <li>
                            <div class="rounded border">

                                {{-- Items --}}
                                <ul role="list" class="bg-gray-50 lg:p-2 divide-y divide-gray-200">
                                    @foreach($transaction->transaction_detail as $data)
                                        <li class="p-2 flex">
                                            <div class="flex-shrink-0 w-12 h-12 border border-gray-200 rounded-md overflow-hidden">
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
                        </li>
                    @empty

                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
