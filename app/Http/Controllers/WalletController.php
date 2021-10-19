<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Wallet;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wallet = Wallet::find($request->user_id);
        return response()->json($wallet, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Wallet $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet $invoice
     * @return \Illuminate\Http\Response
     */

}
