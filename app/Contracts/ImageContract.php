<?php
namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface ImageContract
{
    public function get(int $id);
    public function store($input);
    public function update($input); 
    public function delete(int $id); 
}
