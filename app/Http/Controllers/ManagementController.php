<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\CustomerUser;
use App\AccountInfo;

class ManagementController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct() {
        $this->middleware('auth');
    }

    public function listUser() {
        $users = AccountInfo::all();
        return view('admin.list_user', compact('users'));
    }
}
