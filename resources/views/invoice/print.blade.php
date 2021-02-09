<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: 2px;
        padding: 30px;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 20px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                Invoice #{{$event->code_invoice}} from Draw System
                            </td>
                            
                            <td>
                                Invoice #: {{$event->code_invoice}}<br>
                                Created: {{date('F d, Y', strtotime($event->created_at))}}<br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td><br>
                                 Event name: <br>{{$event->name}}
                            </td>
                            
                            <td>
                                <b>Invoiced to:</b><br>
                                {{$event->users_name}}<br>
                                {{$event->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Item</td>
                <td>Price</td>
            </tr>
            
            <tr class="item">
                <td>Draw (1 event)</td>
                <td>Rp100.000</td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td>
                   Total: Rp100.000
                </td>
            </tr>
        </table>
        <br>

        <b style="margin-left:3px;">Transactions</b><br><br>
        <table cellpadding="0" cellspacing="0">        
            <tr class="heading">
                <td>Transaction Date</td>
                <td style="text-align: left">Name</td>                
                <td>Status</td>
                <td style="text-align: right">Total</td>
            </tr>
            
            @foreach($payment as $row)
            <tr class="item">
                <td>{{date('F d, Y', strtotime($row->transfer_date))}}</td>
                <td style="text-align: left">{{$row->name}}</td>
                <td>{{$row->status}}</td>
                <td style="text-align: right">Rp{{$row->nominal}}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td></td>
                <td style="text-align: right"><b>Total</b></td>
                <td style="text-align: right">
                   <b>Rp{{$row->nominal}}</b>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>