<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CmsDataTable;
use App\Models\Cms\Cms;
use App\Contracts\CmsContract;
use App\Http\Requests\Admin\Cms\CmsRequest;
use App\Http\Requests\Admin\Cms\EditCmsRequest;


class CmsController extends Controller
{
    private $cmsRepository;

    public function __construct(CmsContract $cmsRepository)
    {
        $this->cmsRepository = $cmsRepository;
    }

    public function index(CmsDataTable $cmsRepository)
    {
        return $cmsRepository->render('admin.cms.index');
    }

    public  function create() 
    {
        return view('admin.cms.create');
    }

    public function delete(Cms $cms, Request $request) 
    {
        $this->cmsRepository->delete($request->id);

        return response()->json(['status' => true, 'message' => 'Cms Deleted Successfully']);
    }

    public function store(CmsRequest $request) 
    {   
        $this->cmsRepository->store($request->except(['_token']));
        
        return Redirect()->route('admin.cms.list')->with(['alert-type' => 'success','message' => 'Cms added Successfully']);
    }

    public function edit(Cms $cms, Request $request)
    { 
        $cms =  $this->cmsRepository->get($request->id);
        
        return view('admin.cms.edit' ,compact('cms'));
    }

    public function update(EditCmsRequest $request)
    {        
        $this->cmsRepository->update($request->except(['_token']));
        
        return Redirect()->route('admin.cms.list')->with(['alert-type' => 'success','message' => 'Cms updated Successfully']);
    }
}
