<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\FaqsDataTable;
use App\Models\Faq\Faq;
use App\Contracts\FaqContract;
use App\Http\Requests\Admin\Faq\FaqRequest;


class FaqController extends Controller
{
    private $faqRepository;

    public function __construct(FaqContract $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function index(FaqsDataTable $faqRepository)
    {
        return $faqRepository->render('admin.faq.index');
    }

    public function delete(Faq $faq, Request $request) 
    {
        $this->faqRepository->delete($request->id);

        return response()->json(['status' => true, 'message' => 'Faq Deleted Successfully']);
    }

    public function store(FaqRequest $request) 
    {   
        $this->faqRepository->store($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'Faq Added Successfully' ]);
    }

    public function edit(Faq $faq, Request $request)
    { 
        $faq =  $this->faqRepository->get($request->id);
        
        return response()->json(['status' => true,'data' => $faq]);
    }

    public function update(FaqRequest $request)
    {        
        $this->faqRepository->update($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'Faq Updated Successfully' ]);
    }
}
