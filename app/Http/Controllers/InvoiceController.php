<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Services\CompanyService;
use App\Services\InvoiceService;
use App\Http\Requests\InvoiceRequest;
use Barryvdh\Snappy\Facades\SnappyPdf;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    protected $invoiceService;
    protected $companyService;

    public function __construct(InvoiceService $invoiceService, CompanyService $companyService)
    {
        $this->invoiceService = $invoiceService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        $paginate = request()->paginate ?? 10;
        $invoices = $this->invoiceService->index([], [], ['*'], $paginate);
        $companies = $this->companyService->index([], [], ['*'], $paginate);
        return view('invoice.index', [
            'invoices' => $invoices,
            'companies' => $companies,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->invoiceService->create();

        return view(
            'invoice.create',
            ['companies' => $companies]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $this->invoiceService->store($request);
        return redirect()->route('invoice.index')->with('success', 'Added Sccesfully ');
    }


    public function edit($id)
    {
        $invoice = $this->invoiceService->find($id, ['*']);
        $companies = Company::all();

        return view('invoice.edit', [
            'invoice' => $invoice,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateInvoiceRequest $request)
    {

        $this->invoiceService->update($id, $request);

        return redirect()->route('invoice.index')->with('success', 'Edited Sccesfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = $this->invoiceService->delete($id);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function show($id)

            {     $products  = $this->invoiceService->show($id);
                $invoiceName = Invoice::where('id' , $id)->with(['company'])->first();
        // Fetch all products that belong to this invoice's company
        $products  = Product::where('company_id', $invoiceName->company->id)->get();

        $totalWithVatAndDiscount = $products->sum(function ($product) {
            return $product->getPriceWithVatAndDiscount();
        });
        $totalWithVat = $products->sum(function ($product) {
            return $product->getPriceWithVat(); // Assuming this method is defined to calculate price with VAT
        });

return  view('invoice.show', [
            'products'=>$products
          , 'invoiceName'=>$invoiceName
         ,'totalWithVat'=>$totalWithVat
            ,'totalWithVatAndDiscount'=>$totalWithVatAndDiscount    ,   ]);
    }


    public function downloadInvoice($id)
    {
        $products  = $this->invoiceService->show($id);
        $invoiceName = Invoice::where('id' , $id)->with('company')->first();
        $Product = Product::where('company_id' , $invoiceName->company->id)->first();
        $totalWithVatAndDiscount = $products->sum(function ($product) {
            return $product->getPriceWithVatAndDiscount();
        });
        $totalWithVat = $products->sum(function ($product) {
            return $product->getPriceWithVat(); // Assuming this method is defined to calculate price with VAT
        });


    // Generate the HTML content by rendering the Blade template
    $html = view('invoice.download', [
        'products' => $products,
        'invoiceName' => $invoiceName,
        'totalWithVat' => $totalWithVat,
        'totalWithVatAndDiscount' => $totalWithVatAndDiscount
    ])->render();

    // Initialize mPDF and load the HTML
        // Initialize mPDF and load the HTML
        $mpdf = new Mpdf();

        // Write the HTML to the PDF
        $mpdf->WriteHTML($html);

        // Output to browser for download
        $mpdf->Output('invoice_' . $invoiceName->id . '.pdf', 'D'); // 'D' forces download


}
}