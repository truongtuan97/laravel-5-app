<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\AccountInfo;
use App\PromotionConfiguration;

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

    public function userDetail($id) {
        $user = AccountInfo::where('id', $id)->first();
        return view('admin.user.show', compact('user'));
    }

    public function userEdit($id) {
        $user = AccountInfo::where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function userUpdate(AccountInfo $user) {
        dd($user);
    }

    public function chkmShow() {
        $chkm = PromotionConfiguration::where('id > ', 0)->first();
        return view('admin.chkm.show', compact('chkm'));
    }

}
