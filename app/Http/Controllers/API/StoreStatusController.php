<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkstore(Request $request,$users_id)
    {
        //

        return Product::with('user')->where('users_id',$users_id)->get()->pluck('user')->pluck('store_status');
    }

     public function checkstoreall(Request $request)
    {
        //
        return Product::with(['user'])->get();
    }
}
