@extends('partials.navbar')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 lg:max-w-7xl lg:px-0">
            <h2 class="2xl:font-bold text-lg mb-8">Transaction History</h2>

            <ul role="list" class="divide-y divide-gray-200 flex flex-col space-y-6">
                @forelse($transactions as $transaction)
                    <li class="border">
                        <div class="rounded">
                            <div class="p-4 flex flex-wrap items-center gap-x-8 gap-y-4 lg:gap-4 justify-between border-b">
                                <h4 class="font-bold text-gray-800">Order#{{ $transaction->id }}</h4>
                                <div class="flex items-center gap-6 lg:gap-10">
                                    <div class="text-sm">
                                        <h4 class="font-medium">Date placed</h4>
                                        <p class="text-gray-600">{{ \Carbon\Carbon::parse($transaction->created_at)->isoFormat('LLL') }}</p>
                                    </div>
                                    <div class="text-sm">
                                        <h4 class="font-medium">Grand total</h4>
                                        <p class="text-gray-600">{{ "Rp " . number_format($transaction->total, 0 , '.' , ',') }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Items --}}
                            <ul role="list" class="bg-gray-50 lg:p-2 divide-y divide-gray-200">
                                @foreach($transaction->transaction_detail as $data)
                                    <li class="p-2 flex">
                                        <div class="flex-shrink-0 w-16 h-16 border border-gray-200 rounded-md overflow-hidden">
                                            <img
                                                src="{{ asset('storage/'. $data->product->image) }}"
                                                alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                class="w-full h-full object-center object-cover">
                                        </div>

                                        <div class="ml-4 lg:flex-1 flex flex-col">
                                            <div>
                                                <div class="lg:flex items-center justify-between text-sm lg:text-base font-medium text-gray-900">
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

            <div class="mt-6">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

@endsection
