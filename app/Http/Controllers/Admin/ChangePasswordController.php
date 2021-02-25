<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index(){

        return view('admin.password.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
		$admin = Auth::user();
		$password = $admin->password;
		
		if (Hash::check($request->old_password,$password)) {
			$newPass = bcrypt($request->new_password);

            Admin::where('id',$admin->id)->update(['password'=>$newPass]);
            $response = ['success' => true ,'message' => 'Your Password is changed Successfully.'];
		} else {
			$response = ['success' => false ,'message' => 'Current Password does not match with us.'];
		}
		
		return response()->json($response);
    }
}
