<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User\User;
use App\Contracts\UserContract;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\Admin\User\EditUserRequest;


class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(UsersDataTable $usersdataTable)
    {
        return $usersdataTable->render('admin.user.index');
    }

    public function delete(User $user, Request $request) 
    {
        $this->userRepository->delete($request->id);

        return response()->json(['status' => true, 'message' => 'User Deleted Successfully']);
    }

    public function store(UserRequest $request) 
    {   
        $this->userRepository->store($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'User Added Successfully' ]);
    }

    public function edit(User $user, Request $request)
    { 
        $user = $this->userRepository->get($request->id);
        
        return response()->json(['status' => true,'data' => $user]);
    }

    public function update(EditUserRequest $request)
    {        
        $this->userRepository->update($request->except(['_token']));
        
        return response()->json(['status' => true,'message' => 'User Updated Successfully' ]);
    }

    public function changeStatus(Request $request) 
    {
        $this->userRepository->changeStatus($request->except(['_token']));

        return response()->json(['status' => true,'message' => 'Status Changed Successfully' ]);
    }
}
