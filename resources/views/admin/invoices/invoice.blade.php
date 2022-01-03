<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
        </style>
    </head>

    <body>


        {{-- Header --}}
       <h1>{{$invoice->invoice_title}}</h1>

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong>{{$invoice->company}}</strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                            <h4 class="text-uppercase cool-gray">
                                <strong>Facture</strong>
                            </h4>
                        <p><strong>Numéro de la facture :{{$invoice->invoice_number}}</strong></p>
                        <p><strong>Date :{{$invoice->date}} </strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        <p><strong>Émetteur </strong></p>
                            <p class="seller-name">
                                {{$invoice->seller_company}}
                            </p>

                            <p class="seller-address">
                                {{$invoice->seller_address}}
                            </p>

                            <p class="seller-code">
                                {{$invoice->seller_email}}
                            </p>

                            <p class="seller-code">
                              {{$invoice->seller_country}}
                            </p>

                            <p class="seller-vat">
                                {{$invoice->seller_contact}}
                            </p>

                              <p class="seller-vat">
                                {{$invoice->seller_other}}
                            </p>

                    </td>
                    <td class="border-0"></td>

                    <td class="px-0">
                            <p><strong>Destinataire </strong></p>
                            <p class="buyer-name">
                               {{$invoice->buyer_name}}
                            </p>

                             <p class="buyer-code">
                               {{$invoice->buyer_company}}
                             </p>

                            <p class="buyer-address">
                               {{$invoice->buyer_address}}
                            </p>

                            <p class="buyer-code">
                               {{$invoice->buyer_email}}
                            </p>

                              <p class="buyer-code">
                               {{$invoice->buyer_contact}}
                            </p>

                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <table class="table table-items">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0">Description</th>
                    <th scope="col" class="text-center border-0">Quantité</th>
                    <th scope="col" class="text-right border-0">Montant</th>
                    <th scope="col" class="text-right border-0">Sub total</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="pl-0">
                        <p class="cool-gray">{{$invoice->product_description}}</p>
                    </td>
                    <td class="text-center">{{$invoice->product_quantity}}</td>
                    <td class="text-right">{{$invoice->product_price}}</td>
                    <td class="text-right">{{$invoice->product_sub_total}}</td>

                </tr>

                <tr>
                    <td class="border-0"></td>
                    <td class="border-0"></td>

                    <td class="text-right pl-0">% TVA</td>
                    <td class="text-right pr-0">{{$invoice->product_tva}}</td>
                </tr>

                <tr>
                    <td class="border-0"></td>
                    <td class="border-0"></td>

                    <td class="text-right pl-0">Total</td>
                    <td class="text-right pr-0"><strong>{{$invoice->product_total}}</strong></td>
                </tr>


            </tbody>
        </table>

        <div>
            <p><strong>Condition générales</strong></p>
            <p> Mode de réglement : {{$invoice->condition_payment_mode}} </p>
            <p> Date d'écheance : {{$invoice->condition_pay_until_date}}</p>
        </div>


        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </body>
</html>
