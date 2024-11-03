<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Company;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\ProductService;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected $productService;
    protected $companyService;

    public function __construct(ProductService $productService, CompanyService $companyService)
    {
        $this->productService = $productService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        $paginate = request()->paginate ?? 10;
        $products = $this->productService->index([], [], ['*'], $paginate);
        $companies = $this->companyService->index([], [], ['*'], $paginate);
        return view('product.index', [
            'products' => $products,
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

        $companies = Company::all();

        return view(
            'product.create',
            ['companies' => $companies]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->productService->store($request);
        return redirect()->route('product.index')->with('success', 'Added Sccesfully ');
    }


    public function edit($id)
    {
        $product = $this->productService->find($id, ['*']);
        $companies = Company::all();

        return view('product.edit', [
            'product' => $product,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProductRequest $request){

        $this->productService->update($id, $request);

        return redirect()->route('product.index')->with('success', 'Edited Sccesfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->delete($id);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }



}
