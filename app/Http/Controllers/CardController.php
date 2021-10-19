<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function generate(Request $request)
    {
        $request->validate([
            'qnt' => 'numeric|required|max:100',
            'duration' => 'required',
        ]);
        $qnt = $request->qnt;
        for ($i = 1; $i <= $qnt; $i++) {
            $this->cardGenerator($request->duration);
        }
        return response()->json('cards created', 200);
    }

    public function cardGenerator($duration)
    {
        $card = New Card();

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
        $string = str_shuffle($pin);

        $card->code = $string;
        $card->owner_id = 1;
        $card->duration = $duration * 30;
        $card->price = $duration * 10000;
        $card->save();
    }

    public function saleAssignment(Request $request)
    {
        $request->validate([
            'amount' => 'numeric|required',
            'duration' => 'required',
            'user_id' => 'required',
        ]);
        $cards = Card::where('sale_id', null)->where('duration', $request->duration * 30)->take($request->amount)->get();

        if ($cards && count($cards) >= $request->amount) {
            foreach ($cards as $card) {
                $card->sale_id = $request->user_id;
                $card->save();
            }
            return response()->json('cards attributed', 200);
        } else {
            return response()->json('insufficient cards', 200);
        }

    }

    public function shopAssignment(Request $request)
    {
        $request->validate([
            'amount' => 'numeric|required',
            'duration' => 'required',
            'sale_id' => 'required',
            'shop_id' => 'required',
        ]);
        $cards = Card::where('sale_id', $request->sale_id)->where('shop_id', null)->where('duration', $request->duration * 30)->take($request->amount)->get();

        if ($cards && count($cards) >= $request->amount) {
            foreach ($cards as $card) {
                $card->shop_id = $request->shop_id;
                $card->save();
            }
            return response()->json('cards attributed', 200);
        } else {
            return response()->json('insufficient cards', 200);
        }

    }

    public function register(Request $request)
    {
        $card = Card::where('code', $request->code_number)->first();
        if($card && $card->active == 1){
            $involves = array('owner' => $card->owner_id, 'sale' => $card->sale_id, 'shop' => $card->shop_id);

            $this->balanceHandler($involves,$card->price);
            $card->active = 0;
            $card->save();
            return response()->json('activation successful', 200);
        }else{
            return response()->json('card not found or already used', 401);
        }

    }

    public function balanceHandler($involves, $price)
    {
        foreach ($involves as $involve => $id) {
//            dd($involve);
            if ($involve == 'owner') {
                $wallet = User::find($id)->wallet;
                $wallet->balance += ($price * 50) / 100;
//                dd($wallet->balance);
                $wallet->save();

            }elseif ($involve == 'sale'){
                $wallet = User::find($id)->wallet;
                $wallet->balance += ($price * 30) / 100;
                $wallet->save();
            }elseif ($involve == 'shop'){
                $wallet = User::find($id)->wallet;
                $wallet->balance += ($price * 20) / 100;
                $wallet->save();
            }

        }

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
