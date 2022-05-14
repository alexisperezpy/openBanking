<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function store(Request $request)
    {
        if( $request->input('type') === 'deposit' ){
            return $this->deposit(
                $request->input('destination'),
                $request->input('amount')
            );
        } elseif( $request->input('type') === 'withdraw' ){
            return $this->withdraw(
                $request->input('origin'),
                $request->input('amount')
            );
        } elseif ($request->input('type') === 'transfer') {
            return $this->transfer(
                $request->input('origin'),
                $request->input('destination'),
                $request->input('amount')
            );
        }
    }

    private function deposit($destination, $amount){
        $account = Account::firstOrCreate([
            'id' => $destination
        ]);
        $account->balance += $amount;
        $account->save();
       
        return response()->json([
            'destination' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
        ], 201);
    }

    private function withdraw($origin, $amount){
        $account = Account::findOrFail($origin);
        $account->balance -= $amount;
        $account->save();

        return response()->json([
            'origin' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
        ], 201);
    }

    private function transfer($origin, $destination, $amount){
        
        //buscamos la cuenta de origen y destino respectivamente, si falla enviamos una exception
        $accountOrigin = Account::findOrFail($origin);
        $accountDestination = Account::firstOrCreate([
            'id' => $destination
        ]);
        
        //Usamos DB-transaction para que en caso falle por cualquier motivo se haga un rollback
        DB::transaction(function () use ($accountOrigin, $accountDestination, $amount){
           
            //Restamos el importe de la transferencia a la cuenta de origen
            $accountOrigin->balance -= $amount;
            
            //Sumamos el importe de la tranferencia a la cuenta de destino
            $accountDestination->balance += $amount; 
            
            $accountOrigin->save();
            $accountDestination->save();
        });

        return response()->json([
            'origin' => [
                'id' => $accountOrigin->id,
                'balance' => $accountOrigin->balance
            ],
            'destination' => [
                'id' => $accountDestination->id,
                'balance' => $accountDestination->balance
            ]
        ], 201);
    }

}
