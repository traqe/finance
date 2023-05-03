<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Sale;
use App\Transaction;
use App\Currency;
use App\Product;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Database\Events\TransactionCommitted;

class StatementController extends Controller
{
    public function printIncome()
    {
        // revenue
        $injections = Balance::where('profit_loss', 1)->get();
        $injections_sum = $injections->sum('amount');
        $sales = Sale::all();
        $sales_sum = $sales->sum('total_amount');
        $incomes = Transaction::where('type', 'income')->get();
        $incomes_sum = $incomes->sum('amount');
        // outgoings
        $expenses = Transaction::where('type', 'expense')->get();
        $expenses_sum = $expenses->sum('amount');
        $payments = Transaction::where('type', 'payment')->get();
        $payments_sum = $payments->sum('amount');
        $deductions = Balance::where('profit_loss', 0)->get();
        $deductions_sum = $deductions->sum('amount');

        $currency = Currency::where('selected', 1)->get()->first();
        $summaryData = array(
            'injections_sum' => $injections_sum,
            'sales_sum' => $sales_sum,
            'incomes_sum' => $incomes_sum,
            'expenses_sum' => $expenses_sum,
            'payments_sum' => $payments_sum,
            'deductions_sum' => -$deductions_sum,
            'currency' => $currency
        );
        $pdf = PDF::loadView('statements.income', $summaryData);
        $filename = "Income Statement";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function printCashFlow()
    {
        $sales = Sale::all();
        $incomes = Transaction::where('type', 'income')->get();
        $deductions = Balance::where('profit_loss', 0)->get();
        $payments = Transaction::where('type', 'payment')->get();
        $injections = Balance::where('profit_loss', 1)->get();
        $expenses = Transaction::where('type', 'expense')->get();
        $currency = Currency::where('selected', 1)->get()->first();
        $summaryData = array(
            'incomes' => $incomes,
            'deductions' => $deductions,
            'payments' => $payments,
            'injections' => $injections,
            'expenses' => $expenses,
            'currency' => $currency
        );
        $pdf = PDF::loadView('statements.cashflow', $summaryData);
        $filename = "Cash Flow Statement";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function printBalance()
    {
        // assets
        $products = Product::all();
        $current_assets = 0;
        foreach ($products as $product) {
            $current_assets += ($product->price * $product->solds->sum('qty'));
        }
        $sales = Sale::all();
        $intangible_assets = $sales->sum('total_amount');
        $current_balance = Balance::all()->last();
        $fixed_assets = $current_balance->overall_balance;
        // liabilities
        $expenses = Transaction::where('type', 'expense')->get();
        $current_liabilities = $expenses->sum('amount');
        $payments = Transaction::where('type', 'payment')->get();
        $longterm_debt = $payments->sum('amount');
        $deductions = Balance::where('profit_loss', 0)->get();
        $withdrawals = $deductions->sum('amount');
        // shareholders equity
        $injections = Balance::where('profit_loss', 1)->get();
        $capital = $injections->sum('amount');
        $incomes = Transaction::where('type', 'income')->get();
        $earnings = $incomes->sum('amount');
        // currency
        $currency = Currency::where('selected', 1)->get()->first();
        $summaryData = array(
            'current_assets' => $current_assets,
            'intangible_assets' => $intangible_assets,
            'fixed_assets' => $fixed_assets,
            'current_liabilities' => -$current_liabilities,
            'longterm_debt' => -$longterm_debt,
            'withdrawals' => $withdrawals,
            'capital' => $capital,
            'earnings' => $earnings,
            'currency' => $currency
        );
        $pdf = PDF::loadView('statements.balance', $summaryData);
        $filename = "Balance Sheet";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
