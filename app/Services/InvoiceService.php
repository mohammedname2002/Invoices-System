<?php

namespace App\Services;
use App\Models\Company;


use App\Models\Invoice;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceService
{


    public static function make()
    {
        return new self();
    }
    public function index($relations = [], $count = [], $params = ['*'], $paginate = 10, $search = null): LengthAwarePaginator
    {
        if ($paginate > 50) {
            $paginate = 50;
        }

        $query = Invoice::with($relations)
            ->select($params)
            ->withCount($count);

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        return $query->paginate($paginate);
    }
    public function find($id, $params = ['*'], $relations = [], $count = [])
    {

        return findByid(Invoice::class, $id, $relations, $params, $count);
    }
    public function create()
    {
        $companies = Company::all();
        return $companies;
    }

    public function store($request)
    {
        $currentInvoiceNumber = Cache::rememberForever('invoice_number', function () {
            return 11; // Start from 11
        });

        $nextInvoiceNumber = $currentInvoiceNumber + 1;
        Cache::forever('invoice_number', $nextInvoiceNumber);

        // Generate the invoice number
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad($currentInvoiceNumber, 6, '0', STR_PAD_LEFT);

$fromDate = $request->input('from');
$toDate = $request->input('to');


        $fromDate = $request->input('from');
        $toDate = $request->input('to');

        // $companyId = Company::find($request->company_id);
        // $dateOfCreateProductDate = Product::where('company_id', $companyId->id)
        // ->whereBetween('date_of_create', [$fromDate, $toDate])
        // ->pluck('date_of_create')
        // ->first(); // Get only  the first date
            //  if(!$dateOfCreateProductDate){
            //              return redirect()->back();
            //           }

        $invoice = Invoice::create([
            'company_id' => $request->company_id,
            'from' => $request->from,
            'to' => $request->to,
             'invoice_number' => $invoiceNumber,

            'status' => $request->status,
            'date_of_create' => Carbon::now(),
        ]);
        $nextInvoiceNumber++;
        return $invoice;
    }

    public function update($id, $request) {
        $nextInvoiceNumber = 11; // starting point
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad($nextInvoiceNumber, 6, '0', STR_PAD_LEFT);


        $invoice = $this->find($id , ['*']);
        $invoice->update([
            'company_id' => $request->company_id,
            'from' => $request->from,
            'to' => $request->to,
            'invoice_number' => $invoiceNumber,
            'status' => $request->status,
            'date_of_create' => Carbon::now(),
        ]);


    }

    public function delete($id) {


        $invoice = $this->find($id , ['*']);
        $invoice->delete();
        return $invoice;


    }

    public function show($id){
        $invoice = $this->find($id , ['*']);
         $companyId = $invoice->company->id;

         $invoices = Product::whereBetween('date_of_create', [$invoice->from, $invoice->to])
         ->where('company_id', $companyId) // Add this line to filter by company
         ->with('company') // To include the company relation
         ->get();

     return $invoices;
    }

}