<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Image\Image;
use App\Contracts\ImageContract;
use Webp;
/**
 * Class ImageRepository.
 */
class ImageRepository implements ImageContract
{
    public function get(int $id) 
    {
        return Image::findOrFail($id);
    }

    public function delete($id) 
    { 
        $image = Image::findOrFail($id);
        if(!empty($image->image)) {
            unlink(public_path() .  '/' . $image->image);
        }
        return $image->delete();
    }

    public function store($input) 
    {
        if(isset($input['image'])){
            $imageName = time().'.webp';
            $imagePath = storage_path('app/public/image/'.$imageName);
            $webp = Webp::make($input['image']);
            if ($webp->save($imagePath)) {
            }
        }

        return  Image::create(['image' => $imageName, 'status' => 1]);
    }

    public function update($input) 
    {  
        $image = Image::findOrFail($input['id']);
        $data = ['status' => 1];
        if(isset($input['image'])) {
            $imageName = time().'.webp';
            $imagePath = storage_path('app/public/image/'.$imageName);
            $webp = Webp::make($input['image']);
            if ($webp->save($imagePath)) {
            }
            if(!empty($image->image)) {
                unlink(public_path() .  '/' . $image->image);
            }
            $data['image'] = $imageName;
        }
       
        return $image->update($data);
    }
}
