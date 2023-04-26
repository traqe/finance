<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class StatementController extends Controller
{
    public function printIncome()
    {
        $summaryData = array();
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
