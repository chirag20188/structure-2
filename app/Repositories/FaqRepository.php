<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Faq\Faq;
use App\Contracts\FaqContract;
/**
 * Class FaqRepository.
 */
class FaqRepository implements FaqContract
{
    public function get(int $id) 
    {
        return Faq::findOrFail($id);
    }

    public function delete($id) 
    { 
        $faq = $this->get($id);
        return $faq->delete();
    }

    public function store($input) 
    {
        $data = [
            'title' => $input['title'],
            'desc' => $input['desc'],
        ];

        return  Faq::create($data);
    }

    public function update($input) 
    {  
        $data = [
            'title' => $input['title'],
            'desc' => $input['desc'],
        ];
       
        return Faq::where('id',$input['id'])->update($data);
    }
}
