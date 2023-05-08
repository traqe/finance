<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Transaction;
use App\Sale;
use App\Currency;

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

        return view('decisions.index', compact('income', 'sales', 'payments', 'expenses', 'currency', 'clients'));
    }
}
