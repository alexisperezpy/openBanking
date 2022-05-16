<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;


class BalanceController extends Controller
{
    public function show(Request $request)
    {
        $accountId = $request->input('account');
        $account = Account::where('account_id', $accountId)->firstOrFail();
        return $account->balance;
    }
}
