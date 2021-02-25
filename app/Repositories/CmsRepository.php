<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Cms\Cms;
use App\Contracts\CmsContract;
use Illuminate\Support\Str;
/**
 * Class FaqRepository.
 */
class CmsRepository implements CmsContract
{
    public function get(int $id) 
    {
        return Cms::findOrFail($id);
    }

    public function delete($id) 
    { 
        $cms = $this->get($id);
        return $cms->delete();
    }

    public function store($input) 
    {
        $data = [
            'slug' => $this->cmsSlug(Str::slug($input['title'])),
            'title' => $input['title'],
            'description' => $input['description'],
        ];
        return  Cms::create($data);
    }

    public function update($input) 
    {  

        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
        ];
        return Cms::where('id',$input['id'])->update($data);
    }

    public function cmsSlug($slug, $i = 0)
    {
        $count = Cms::where('slug',$slug)->count();

        if($count == 0)
            return $slug;

        return $this->cmsSlug($slug.rand(1, 99));   
    }
}
