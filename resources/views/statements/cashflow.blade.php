<style>
    h2,
    h4,
    li,
    p {
        font-family: Arial, Helvetica, sans-serif;
    }

    #border {
        border: 1px solid black;
        padding: 0.5cm;
        height: 96%;
    }

    th,
    td {
        padding: 6px;
    }

    th {
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        border-top: 1px solid;
        border-bottom: 1px solid;
        width: 100%;
    }
</style>
<div id="border">
    <div id="header">
        <center>
            <h2>
                CASH-FLOW STATEMENT
            </h2>
        </center>
        <p>This cash flow statement consists of: </p>
        <ul>
            <li>Operating Activities</li>
            <li>Investment Activities</li>
            <li>Financial Activities</li>
        </ul>
    </div>
    <div id="body">
        <div>
            <center>
                <h4>
                    Operational Activities
                </h4>
            </center>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Reference</th>
            </tr>
            @foreach($incomes as $income)
            <tr>
                <td>{{date('d-m-y', strtotime($income->created_at))}}</td>
                <td>{{$income->title}}</td>
                <td>{{$income->type}}</td>
                <td>{{$currency->sign}}{{$income->amount * $currency->index}}</td>
                <td>{{$income->reference}}</td>
            </tr>
            @endforeach
            @foreach($deductions as $deduction)
            <tr>
                <td>{{date('d-m-y', strtotime($deduction->created_at))}}</td>
                <td>{{$deduction->name}}</td>
                <td>{{$deduction->type}}</td>
                <td>{{$currency->sign}}{{-$deduction->amount * $currency->index}}</td>
                <td>{{$deduction->reference}}</td>
            </tr>
            @endforeach
        </table>
        <div>
            <center>
                <h4>
                    Financial Activities
                </h4>
            </center>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Reference</th>
            </tr>
            @foreach($payments as $payment)
            <tr>
                <td>{{date('d-m-y', strtotime($payment->created_at))}}</td>
                <td>{{$payment->title}}</td>
                <td>{{$payment->type}}</td>
                <td>{{$currency->sign}}{{$payment->amount * $currency->index}}</td>
                <td>{{$payment->reference}}</td>
            </tr>
            @endforeach
        </table>
        <div>
            <center>
                <h4>
                    Investment Activities
                </h4>
            </center>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Reference</th>
            </tr>
            @foreach($injections as $injection)
            <tr>
                <td>{{date('d-m-y', strtotime($injection->created_at))}}</td>
                <td>{{$injection->name}}</td>
                <td>{{$injection->type}}</td>
                <td>{{$currency->sign}}{{$injection->amount * $currency->index}}</td>
                <td>{{$injection->reference}}</td>
            </tr>
            @endforeach
            @foreach($expenses as $expense)
            <tr>
                <td>{{date('d-m-y', strtotime($expense->created_at))}}</td>
                <td>{{$expense->title}}</td>
                <td>{{$expense->type}}</td>
                <td>{{$currency->sign}}{{$expense->amount * $currency->index}}</td>
                <td>{{$expense->reference}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>