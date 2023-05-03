<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', ['currencies' => $currencies]);
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function edit(Request $request, $id)
    {
        $id = $request->id;
        $currency = Currency::findOrFail($id);
        return view('currencies.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $currency = Currency::findOrFail($id);
        $currency->name = $request->name;
        $currency->sign = $request->sign;
        $currency->index = $request->index;
        $currency->save();

        return redirect()->route('currencies.index')->with('success', 'Currency Successfully Updated');
    }

    public function store(Request $request)
    {
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->sign = $request->sign;
        $currency->index = $request->index;
        $currency->save();
        return redirect()->route('currencies.index')->with('success', 'Currency Recorded successfully');
    }

    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return redirect()->route('currencies.index')->with('success', 'Currency Successfully Deleted');
    }

    public function select(Request $request)
    {
        $old_currency = Currency::where('selected', 1)->get()->first();
        $old_currency->selected = 0;
        $old_currency->save();
        $new_currency = Currency::findOrFail($request->currency_name);
        $new_currency->selected = 1;
        $new_currency->save();

        return redirect()->route('currencies.index')->with('success', 'Currency Successfully Selected');
    }
}
