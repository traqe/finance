<style>
    #border {
        border: 1px solid black;
        padding: 0.5cm;
        height: 96%;
    }

    h2,
    h4,
    li,
    p {
        font-family: Arial, Helvetica, sans-serif;
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
                BALANCE SHEET
            </h2>
        </center>
    </div>
    <br>
    <div id="body">

        <table>
            <br>
            <tr>
                <th>Title</th>
                <th>+</th>
                <th>-</th>
            </tr>
            <br>
            <tr>
                <th>
                    Assets
                </th>
            </tr>
            <tr>
                <td>Current Assets</td>
                <td>{{$currency->sign}}{{ $current_assets * $currency->index }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Intangible Assets</td>
                <td>{{$currency->sign}}{{ $intangible_assets * $currency->index }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Fixed Assets</td>
                <td>{{$currency->sign}}{{ $fixed_assets * $currency->index }}</td>
                <td></td>
            </tr>
            <br>
            <tr>
                <th>Liabilities</th>
            </tr>
            <tr>
                <td>Current Liabilities</td>
                <td></td>
                <td>{{$currency->sign}}{{$current_liabilities * $currency->index}}</td>
            </tr>
            <tr>
                <td>Long Term Debt</td>
                <td></td>
                <td>{{$currency->sign}}{{ $longterm_debt * $currency->index}}</td>
            </tr>
            <tr>
                <td>Withdrawals (Liable to company)</td>
                <td></td>
                <td>{{$currency->sign}}{{$withdrawals * $currency->index}}</td>
            </tr>
            <br>
            <tr>
                <th>
                    Shareholder's Equity
                </th>
            </tr>
            <tr>
                <td>Capital</td>
                <td>{{$currency->sign}}{{$capital * $currency->index}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Earnings</td>
                <td>{{$currency->sign}}{{$earnings * $currency->index}}</td>
                <td></td>
            </tr>
            <br>
            <br>
            <tr>
                <th>
                    Summary
                </th>
            </tr>
            <tr>
                <td>Total Assets</td>
                <td>{{$currency->sign}}{{$currency->index * ($current_assets + $intangible_assets + $fixed_assets)}}</td>
            </tr>
            <tr>
                <td>Total Liabilities</td>
                <td>{{$currency->sign}}{{$currency->index * ($current_liabilities + $longterm_debt  + $withdrawals)}}</td>
            </tr>
            <tr>
                <td>Total Equity</td>
                <td>{{$currency->sign}}{{$currency->index * ($capital + $earnings)}}</td>
            </tr>
            <br>
            <tr>
                <td><strong>Net Balance</strong></td>
                <td><strong>{{$currency->sign}}{{$currency->index * (($current_assets + $intangible_assets + $fixed_assets) - ($current_liabilities + $longterm_debt  + $withdrawals) - ($capital + $earnings))}}</strong></td>
            </tr>
        </table>
    </div>