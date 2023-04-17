<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;

class BalanceController extends Controller
{
    public function index()
    {
        $current =  Balance::all()->last();
        $balances = Balance::all();
        return view('balance.index', compact('current', 'balances'));
    }

    public function create()
    {
        return view('balance.create');
    }

    public function store()
    {
        $old_balance = Balance::all()->last();

        $balance = new Balance;
        $balance->name = Request('name');
        $balance->reference = Request('reference');
        $balance->type = Request('type');
        $balance->amount = Request('amount');
        $balance->profit_loss = Request('profit_loss');

        // this updates the current balance by evaluating whether you are making an injection or deduction.
        if ($balance->profit_loss == 1) {
            $balance->overall_balance = $old_balance->overall_balance + $balance->amount;
        } else {
            $balance->overall_balance = $old_balance->overall_balance - $balance->amount;
        }
        $balance->save();
        return redirect()->route('balance.index')->with('success', 'Transaction successful');
    }
    public function edit(Request $request, $id)
    {
        $id = $request->id;
        $balance = Balance::findOrFail($id);
        return view('balance.edit', compact('balance'));
    }

    public function update(Request $request, $id)
    {
        $current = Balance::all()->last();
        $id = $request->id;
        $balance = Balance::find($id);
        $balance->name = Request('name');
        $balance->reference = Request('reference');
        $balance->type = Request('type');
        // need variance between these two values
        $old_amount = $balance->amount;
        $balance->amount = Request('amount');
        // setting up the variance
        $variance = $balance->amount - $old_amount;
        if ($balance->profit_loss == 1) {
            $current->overall_balance += $variance;
        } else {
            $current->overall_balance -= $variance;
        }
        $balance->save();
        $current->save();
        return redirect()->route('balance.index')->with('successUpdate', 'Updated Successfully');
    }

    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $current = Balance::all()->last();
        $balance = Balance::find($id);
        // update the overall balance
        if ($balance->profit_loss == 1) {
            $current->overall_balance -= $balance->amount;
        } else {
            $current->overall_balance += $balance->amount;
        }
        $balance->delete();
        $current->save();
        return redirect()->route('balance.index')->with('deleteSuccess', 'Deleted Successfully');
    }
}
