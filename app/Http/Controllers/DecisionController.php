<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Transaction;
use App\Sale;
use App\Currency;
use App\Balance;
use App\Provider;
use App\PaymentMethod;
use Mockery\Generator\Method;

class DecisionController extends Controller
{
    public function index()
    {
        // profits
        $income = Transaction::where('type', 'income')->get();
        $sales = Sale::all();
        $clients = Client::all();
        // losses
        $payments = Transaction::where('type', 'payment')->get();
        $expenses = Transaction::where('type', 'expense')->get();
        $currency = Currency::where('selected', 1)->get()->first();
        // balance
        $balance = Balance::all();
        $transactions = Transaction::all();

        //
        $last_transaction = Transaction::all()->last();
        $methods = PaymentMethod::all();
        $latest_method = PaymentMethod::findOrFail($last_transaction->payment_method_id);
        $providers = Provider::all();
        return view('decisions.index', compact('latest_method', 'methods', 'providers', 'transactions', 'income', 'sales', 'payments', 'expenses', 'currency', 'clients', 'balance'));
    }
}
