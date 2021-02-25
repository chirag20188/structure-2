<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ImageDataTable;
use App\Models\Image\Image;
use App\Contracts\ImageContract;
use App\Http\Requests\Admin\Image\ImageRequest;
use App\Http\Requests\Admin\Image\EditImageRequest;


class ImageController extends Controller
{
    private $imageRepository;

    public function __construct(ImageContract $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index(ImageDataTable $imageRepository)
    {
        return $imageRepository->render('admin.image.index');
    }

    public function delete(Image $image, Request $request) 
    {
        $this->imageRepository->delete($request->id);

        return response()->json(['status' => true, 'message' => 'Image Deleted Successfully']);
    }

    public function store(ImageRequest $request) 
    {   
        $this->imageRepository->store($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'Image Added Successfully' ]);
    }

    public function edit(Image $image, Request $request)
    { 
        $image =  $this->imageRepository->get($request->id);

        return response()->json(['status' => true,'data' => $image]);
    }

    public function update(EditImageRequest $request)
    {        
        $this->imageRepository->update($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'Image Updated Successfully' ]);
    }
}
