<style>
    #revenue-tbl tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #outgoings-tbl tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h4,
    h3,
    p {
        font-family: Arial, Helvetica, sans-serif;
    }

    th {
        text-align: left;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12.5pt;
        border-top: 1px solid;
        border-bottom: 1px solid;
        width: 100%;
    }

    #border {
        border: 1px solid black;
        padding: 0.5cm;
        height: 96%;
    }
</style>

<div id="border">
    <div id="header">
        <center>
            <h2>
                INCOME STATEMENT
            </h2>
        </center>
    </div>
    <div id="body">
        <div id="profits">
            <h4>
                Revenue
            </h4>
        </div>
        <table id="revenue-tbl" class="table table-striped">
            <tr>
                <td>Injections</td>
                <td>{{$currency->sign}}{{ $injections_sum * $currency->index }}</td>
            </tr>
            <tr>
                <td>Sales</td>
                <td>{{$currency->sign}}{{ $sales_sum * $currency->index }}</td>
            </tr>
            <tr>
                <td>Income</td>
                <td>{{$currency->sign}}{{ $incomes_sum * $currency->index }}</td>
            </tr>
        </table>
        <div>
            <h4>
                Outgoings
            </h4>
        </div>
        <table id="outgoings-tbl" class="table table-striped">
            <tr>
                <td>Expenses</td>
                <td>{{$currency->sign}}{{ $expenses_sum * $currency->index }}</td>
            </tr>
            <tr>
                <td>Payments</td>
                <td>{{$currency->sign}}{{ $payments_sum * $currency->index }}</td>
            </tr>
            <tr>
                <td>Deductions</td>
                <td>{{$currency->sign}}{{ $deductions_sum * $currency->index }}</td>
            </tr>
        </table>
        <div style="height: 1.5cm;">
        </div>

        <div>
            <h4>
                Total (Revenue): {{$currency->sign}}{{ ($incomes_sum + $injections_sum + $sales_sum) * $currency->index }}
            </h4>
            <h4>

            </h4>
        </div>
        <div>
            <h4>
                Total (Outgoings): {{$currency->sign}}{{ ($expenses_sum + $deductions_sum + $payments_sum) * $currency->index }}
            </h4>
        </div>
        <br>
        <hr>
        <center>
            <div>
                <h4>
                    Net Earnings/ Payouts
                </h4>
                @if((($incomes_sum + $injections_sum + $sales_sum) + ($expenses_sum + $deductions_sum + $payments_sum)) > 0)
                <h3 style="color:green">
                    {{$currency->sign}}{{ (($incomes_sum + $injections_sum + $sales_sum) + ($expenses_sum + $deductions_sum + $payments_sum)) * $currency->index }}
                </h3>
                @else
                <h3 style="color:red">
                    {{$currency->sign}}{{ (($incomes_sum + $injections_sum + $sales_sum) + ($expenses_sum + $deductions_sum + $payments_sum)) * $currency->index }}
                </h3>
                @endif
            </div>
        </center>
        <hr>
    </div>
</div>