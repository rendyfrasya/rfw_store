<?php

namespace App\Http\Controllers;

use App\Models\TransactionsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    //
      public function index()
    {
        $sellTransactions = TransactionsDetail::with(['transaction.user','product.galleries'])
        ->whereHas('product',function($product){
            $product->where('users_id',Auth::user()->id);
        })->get();

        $buyTransactions = TransactionsDetail::with(['transaction.user','product.galleries'])
        ->whereHas('transaction',function($transaction){
            $transaction->where('users_id',Auth::user()->id);
        })->get();
        
        return view ('pages.dashboard-transactions',[
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions,
        ]);
    }
     public function details(Request $request,$id)
    {
        $transaction = TransactionsDetail::with(['transaction.user','product.galleries'])
        ->findOrFail($id);
        return view ('pages.dashboard-transactions-details',[
            'transaction' => $transaction,
        ]);
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $item = TransactionsDetail::findOrFail($id);

        $item->update($data);
        return redirect()->route('dashboard-transaction-details',$id);
    }
}
