<?php
namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface UserContract
{
    public function all();
    public function get(int $id);
    public function store($input);
    public function delete(int $id); 
    public function update($input); 
    public function changeStatus($input); 
}
