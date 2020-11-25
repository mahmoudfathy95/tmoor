<title>invoice</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>
<div id="invoice">

 
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <!-- <a target="_blank" href="https://lobianijs.com">
                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true" />
                            </a> -->
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            Tmour
                        </h2>

                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                  
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE : {{$order->id}}</h1>
                        <div class="date">Date of Invoice: {{$order->created_at->format('Y-m-d')}}</div>
                        
                    </div>
                </div>

                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th class="text-left">address</th>
                            <th class="text-right">city</th>
                            <th class="text-right">phone</th>
                            <th class="text-right">email</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                   
                                <tr>

                                    <td class="no">{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                    <td class="text-left">{{ $order->address->street??'' }} {{ $order->address->description??'' }}</td>
                                    <td class="unit">{{ $order->address->city->name??'' }}</td>
                                    <td class="qty">{{ $order->user->phone }}</td>
                                    <td class="total">{{ $order->user->email }}</td>
                                </tr>
                            
                  
                    </tbody>
          
                </table>

                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>products total</th>
                            <th class="text-left">The added tax</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">shipping</th>
                            <th class="text-right">TOTAL</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                   
                                <tr>

                                    <td class="no">{{ $order->subTotal }}</td>
                                    <td class="text-left">{{ $order->orderProduct[0]->vat }}</td>
                                    <td class="unit">{{ $order->discount }}</td>
                                    <td class="qty">{{ $order->shipping }}</td>
                                    <td class="total">{{ $order->total }}</td>
                                </tr>
                          
                  
                    </tbody>
         
                </table>
              
            </main>
            
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

<script>

                window.print();
                
       </script>