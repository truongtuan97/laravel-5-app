<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\AccountInfo;
use App\PromotionConfiguration;
use App\CardChargeInfoLog;

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

    public function chkmList() {
        $chkms = PromotionConfiguration::all();
        return view('admin.chkm.list', compact('chkms'));
    }

    public function chkmEdit($id) {
        $chkm = PromotionConfiguration::where('id', $id)->first();
        // $str = substr($chkm->ngay_bat_dau, 0, strlen($chkm->ngay_bat_dau) - 3);
        // dd(Carbon::parse($str)->format('m/d/Y'));
        return view('admin.chkm.edit', compact('chkm'));
    }

    public function chkmUpdate(PromotionConfiguration $chkm) {        
        $this->validate(request(), [
            'ngay_bat_dau' => ['required', 'date'],
            'ngay_ket_thuc' => ['required', 'date'],
            'khuyenmai' => ['required']
        ]);        

        $chkm->ngay_bat_dau = request('ngay_bat_dau');
        $chkm->ngay_ket_thuc = request('ngay_ket_thuc');
        $chkm->khuyenmai = request('khuyenmai');
        $chkm->save();
        return redirect('admin/chkms');
    }

    public function userNapcardEdit($id) {
        $user = AccountInfo::where('id', $id)->first();
        return view('admin.user.napcard', compact('user'));
    }

    public function userNapcardUpdate(AccountInfo $user) {
        $admin = auth()->user();

        $chkm = PromotionConfiguration::all()->first();

        $cardType = request('cardtype');
        $value = request('nExtPoint1');
        
        if ($cardType == 'zing') {
            $value = ( $value + ($value*0.0) + ($value* $chkm->khuyenmai) );
        } else if ($cardType == 'momo') {            
            $value = ( $value+($value*0.1) + ($value* $chkm->khuyenmai) );            
        } else {
            $value = $value + ($value * $chkm->khuyenmai);
        }
        $user->nExtPoint1 += $value;
        $user->save();

        $cardChargeLog = new CardChargeInfoLog;
        $cardChargeLog->adminAccount = $admin->cAccName;
        $cardChargeLog->userAccount = $user->cAccName;
        $cardChargeLog->cardType = $cardType;
        $cardChargeLog->value = request('nExtPoint1');
        $cardChargeLog->realValue = $value;
        $cardChargeLog->dateUpdate = Carbon::Now();
        $cardChargeLog->save();
        
        return redirect('list_users');
    }
}
