<?php

namespace App\Services;
use Barryvdh\DomPDF\PDF;


use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Carbon;
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
        $latestInvoice = Invoice::latest()->first();
        $nextInvoiceNumber = $latestInvoice ? $latestInvoice->id + 1 : 1;
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad($nextInvoiceNumber, 6, '0', STR_PAD_LEFT);

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

        $product = Invoice::create([
            'company_id' => $request->company_id,
            'from' => $request->from,
            'to' => $request->to,
            'invoice_number' => $invoiceNumber,
            'status' => $request->status,

            'date_of_create' => Carbon::now(),
        ]);

        return $product;
    }

    public function update($id, $request) {}

    public function delete($id) {


        $invoice = $this->find($id , ['*']);
        $invoice->delete();
        return $invoice;


    }

    public function show($id){
        $invoice = $this->find($id , ['*']);
        $invoices = Product::whereBetween('date_of_create', [$invoice->from , $invoice->to])->with('company')->get();

        return $invoices;
    }

}