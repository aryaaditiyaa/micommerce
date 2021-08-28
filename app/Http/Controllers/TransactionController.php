<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(5);
        return view('admin.transaction.browse', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    public function checkout()
    {
        DB::transaction(function () {
            $carts = Cart::where('user_id', auth()->user()->id);

            if ($carts->exists()) {
                $transaction = Transaction::create([
                    'user_id' => auth()->user()->id,
                    'total' => $carts->sum('total_price'),
                ]);

                foreach ($carts->get() as $cart) {
                    TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'product_id' => $cart->product_id,
                        'qty' => $cart->qty,
                        'total_price' => $cart->total_price,
                    ]);
                }

                $carts->delete();
            }
        });

        request()->session()->put('message', 'ok');

        return redirect(route('home'))->with([
            'message' => "Transaction successful"
        ]);
    }

    public function export()
    {
        return Excel::download(new TransactionExport, 'transactions.xlsx');
    }
}
