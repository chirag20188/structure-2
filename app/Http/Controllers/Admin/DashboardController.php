<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Contracts\UserContract;

class DashboardController extends Controller
{
	private $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
    	$users = $this->userRepository->all();
    	
        return view('admin.dashboard' ,compact('users'));
    }
}
