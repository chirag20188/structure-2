<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use  App\Models\User\User;
use App\Contracts\UserContract;
use Hash;
/**
 * Class UserRepository.
 */
class UserRepository implements UserContract
{
    public function all()
    {
        return User::all();   
    }
    public function get(int $id) 
    {
        return User::findOrFail($id);
    }

    public function delete($id) 
    { 
        $user = $this->get($id);
        return $user->delete();
    }

    public function store($input) 
    {
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'mobile' => $input['mobile'],
            'address' => $input['address'],
            'status'=>$input['status'],
        ];

        return  User::create($data);
    }

    public function update($input) 
    {  
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'address' => $input['address'],
            'status'=>$input['status'],
        ];
       
        return User::where('id',$input['id'])->update($data);
    }

    public function changeStatus($input) 
    {
        $user = $this->get($input['id']);

        return User::where('id',$input['id'])->update(['status' => $input['status']]);  
    }
}
