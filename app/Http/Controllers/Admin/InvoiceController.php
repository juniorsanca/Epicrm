<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Invoice;
use \PDF;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


//use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class InvoiceController extends Controller
{


//form invoice
    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$invoice = Invoice::all();
        $invoice = Invoice::all();
        //dd($lead);
        if ($request->ajax()) {

            $table = DataTables::of($invoice);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $crudRoutePart    = 'invoices';
                $permissionPrefix = 'invoice_management_';
                return view('partials.datatableActions', compact('crudRoutePart', 'row', 'permissionPrefix'));
            });


            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('text', function ($row) {
                return $row->text ? Str::limit($row->text, 50) : "";
            });
            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view('admin.invoices.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('invoice_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.invoices.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invoice = Invoice::create([
            'invoice_title' => $request->input('invoice_title'),
            'company' => $request->input('company'),
            'invoice_number' => $request->input('invoice_number'),
            'date' => $request->input('date'),

            'seller_company' => $request->input('seller_company'),
            'seller_address' => $request->input('seller_address'),
            'seller_email' => $request->input('seller_email'),
            'seller_country' => $request->input('seller_country'),
            'seller_contact' => $request->input('seller_contact'),
            'seller_other' => $request->input('seller_other'),

            'buyer_name' => $request->input('buyer_name'),
            'buyer_company' => $request->input('buyer_company'),
            'buyer_address' => $request->input('buyer_address'),
            'buyer_email' => $request->input('buyer_email'),
            'buyer_contact' => $request->input('buyer_contact'),

            'product_description' => $request->input('product_description'),
            'product_quantity' => $request->input('product_quantity'),
            'product_price' => $request->input('product_price'),
            'product_sub_total' => $request->input('product_sub_total'),
            'product_tva' => $request->input('product_tva'),
            'product_total' => $request->input('product_total'),

            'condition_payment_mode' => $request->input('condition_payment_mode'),
            'condition_pay_until_date' => $request->input('condition_pay_until_date'),

        ]);


        return redirect()->route('admin.invoices.index', $invoice)->withMessage('La facture à été crée avec succès !');
    }



    public function show(Invoice $invoice)
    {
        // dd($lead);
        abort_if(Gate::denies('invoice_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //return view('admin.invoices.show', compact('invoice'));

        $pdf = PDF::loadView('admin.invoices.invoice', compact('invoice'));

        return $pdf->stream('admin.invoices.invoice', array('Attachment' => 0));
    }

    /*
    public function invoice(Invoice $invoice)
    {
        // dd($lead);
        abort_if(Gate::denies('invoice_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdf = PDF::loadView('admin.invoices.invoice', compact('invoice'));

        return $pdf->stream('admin.invoices.invoice', array('Attachment' => 0));

        //dd($pdf);
        //return view('admin.invoices.show', compact('invoice'));
    }
*/

    public function edit(Invoice $invoice)
    {
        //
        abort_if(Gate::denies('invoice_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$states = State::all()->pluck('title', 'id');

        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            //'name' => 'required|string|max:255',
        ]);

        $invoice = Invoice::find($id);
        $invoice->update([
            'invoice_title' => $request->invoice_title,
            'company' => $request->company,
            'invoice_number' => $request->invoice_number,
            'date' => $request->date,

            'seller_company' => $request->seller_company,
            'seller_address' => $request->seller_address,
            'seller_email' => $request->seller_email,
            'seller_country' => $request->seller_country,
            'seller_contact' => $request->seller_contact,
            'seller_other' => $request->seller_other,

            'buyer_name' => $request->buyer_name,
            'buyer_company' => $request->buyer_company,
            'buyer_address' => $request->buyer_address,
            'buyer_email' => $request->buyer_email,
            'buyer_contact' => $request->buyer_contact,

            'product_description' => $request->product_description,
            'product_quantity' => $request->product_quantity,
            'product_unit' => $request->product_unit,
            'product_price' => $request->product_price,
            'product_sub_total' => $request->product_sub_total,
            'product_tva' => $request->product_tva,
            'product_total' => $request->product_total,

            'condition_payment_mode' => $request->condition_payment_mode,
            'condition_pay_until_date' => $request->condition_pay_until_date,
        ]);
        return redirect()->route('admin.invoices.index')->withMessage('La facture a été mis à jour');
    }
    /*
    public function show()
    {



           $customer = new Buyer([
            'name'          => 'EPIC Events',
            'custom_fields' => [
                'email' => 'epicevents@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Produit blabla blabla')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
*/

        /*
        $client = new Party([
            'name'          => 'SANCA Junior',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => 'Ashley Medina',
            'address'       => 'The Green Street 12',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title('Service 1')
                ->description('Your product or service description')
                ->pricePerUnit(47.79)
                ->quantity(2)
                ->discount(10),
            (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
            (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
            (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
            (new InvoiceItem())->title('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
            (new InvoiceItem())->title('Service 6')->pricePerUnit(76.32)->quantity(9),
            (new InvoiceItem())->title('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
            (new InvoiceItem())->title('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
            (new InvoiceItem())->title('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
            (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),
            (new InvoiceItem())->title('Service 12')->pricePerUnit(92.82),
            (new InvoiceItem())->title('Service 13')->pricePerUnit(12.98),
            (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
            (new InvoiceItem())->title('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
            (new InvoiceItem())->title('Service 16')->pricePerUnit(2.80),
            (new InvoiceItem())->title('Service 17')->pricePerUnit(56.21),
            (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            (new InvoiceItem())->title('Service 19')->pricePerUnit(76.37),
            (new InvoiceItem())->title('Service 20')->pricePerUnit(55.80),
        ];

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
        ->series('BIG')
        // ability to include translated invoice status
        // in case it was paid
        ->status(__('invoices::invoice.paid'))
        ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))

            ->dateFormat('d/m/Y')
            ->payUntilDays(14)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();

        //return view('vendor.invoices.template.default');
    }
*/
}
