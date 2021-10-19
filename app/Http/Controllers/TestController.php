<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\User;
use App\Models\Card;
use Illuminate\Http\Request;
use Goutte\Client;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = Card::where('code', '82018411D668991')->first();
        $involves = array('owner' => $card->owner_id,'sale' => $card->sale_id,'shop' => $card->shop_id);
        foreach ($involves as $involve=>$id){
            dd($involve);
//            if($involve)
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

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
