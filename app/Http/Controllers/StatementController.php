<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Sale;
use App\Transaction;
use App\Currency;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class StatementController extends Controller
{
    public function printIncome()
    {
        // revenue
        $injections = Balance::where('profit_loss', 1)->get();
        $injections_sum = 0;
        foreach ($injections as $injection) {
            $injections_sum += $injection->amount;
        }

        $sales = Sale::all();
        $sales_sum = 0;
        foreach ($sales as $sale) {
            $sales_sum += $sale->total_amount;
        }

        $incomes = Transaction::where('type', 'income')->get();
        $incomes_sum = 0;
        foreach ($incomes as $income) {
            $incomes_sum += $income->amount;
        }
        // outgoings
        $expenses = Transaction::where('type', 'expense')->get();
        $expenses_sum = 0;
        foreach ($expenses as $expense) {
            $expenses_sum += $expense->amount;
        }
        $payments = Transaction::where('type', 'payment')->get();
        $payments_sum = 0;
        foreach ($payments as $payment) {
            $payments_sum += $payment->amount;
        }
        $deductions = Balance::where('profit_loss', 0)->get();
        $deductions_sum = 0;
        foreach ($deductions as $deduction) {
            $deductions_sum += $deduction->amount;
        }
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
        $summaryData = array();
        $pdf = PDF::loadView('statements.cashflow', $summaryData);
        $filename = "Cash Flow Statement";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function printBalance()
    {
        $summaryData = array();
        $pdf = PDF::loadView('statements.balance', $summaryData);
        $filename = "Balance Sheet";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
