<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
// use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $paginate=request()->paginate??10;
        $companies=$this->companyService->index([], [], ['*'], $paginate);
        return view('company.index', ['companies'=>$companies]);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {    // Retrieve all roles

        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CompanyRequest $request)
    {

        $this->companyService->store($request);

        return redirect()->route('company.index')->with('success', 'Added Sccesfully ');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $company=$this->companyService->find($id, ['*']);
        return view('company.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update( $id,UpdateCompanyRequest $request )
    {
        $company=$this->companyService->update($id, $request);
        return redirect()->route('company.index')->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $comapny=$this->companyService->delete($id);
        return redirect()->back()->with('success', 'DeletedSuccessfully');
    }



}