<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\AccountInfo;
use App\PromotionConfiguration;
use App\CardChargeInfoLog;
use App\AccountInfoLog;
use App\ChargeValue;
use App\ConfigKhuyenMaiValue;

class ManagementController extends Controller
{
    const MOMO = "momo";
    const ZING = "zing";
    const BANK = "bank";
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
        $this->validate(request(), [
            'email' => 'required|max:255|email|unique:users,email,'.$user->id,
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'numeric', 'min:11']
        ]);

        $admin = auth()->user();

        $user->email = request('email');
        if (request('password')) {
            $user->plainpassword = request('password');
            $user->cSecPassWord = md5(request('password'));
            $user->cPassWord = md5(request('password'));
        }
        if (request('phone')) {
            $user->phone = request('phone');
        }
        $user->save();

        $accInfoLog = new AccountInfoLog();
        $accInfoLog->adminAccount = $admin->cAccName;
        $accInfoLog->userAccount = $user->cAccName;
        $accInfoLog->dateUpdate = Carbon::Now();
        $accInfoLog->save();

        return redirect('list_users');
    }

    public function chkmList() {
        $chkms = PromotionConfiguration::all();
        return view('admin.chkm.list', compact('chkms'));
    }

    public function chkmEdit($id) {
        $chkm = PromotionConfiguration::where('id', $id)->first();
        $configKhuyenMaiValues = ConfigKhuyenMaiValue::all();

        return view('admin.chkm.edit', compact(['chkm', 'configKhuyenMaiValues']));
    }

    public function chkmUpdate(PromotionConfiguration $chkm) {
        $this->validate(request(), [
            'ngay_bat_dau' => ['required', 'date'],
            'ngay_ket_thuc' => ['required', 'date'],
            'khuyenmai' => ['required']
        ]);
        try {
            $chkm->ngay_bat_dau = request('ngay_bat_dau');
            $chkm->ngay_ket_thuc = request('ngay_ket_thuc');
            $chkm->khuyenmai = request('khuyenmai');
            $chkm->save();

            return redirect()->back()->with('alert', 'success');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'failed');
        }

    }

    public function userNapcardEdit($id) {
        $user = AccountInfo::where('id', $id)->first();
        $chargeValues = ChargeValue::get();
        return view('admin.user.napcard', compact(['user', 'chargeValues']));
    }

    public function userNapcardUpdate(AccountInfo $user) {
        $this->validate(request(), [
            'cardType' => ['required', 'string'],
            'soTien' => ['required', 'numeric']
        ]);

        try {
            $admin = auth()->user();

            $chkm = PromotionConfiguration::all()->first();

            $cardType = request('cardType');
            $value = request('soTien');

            if ($cardType == 'zing') {
                $value = ( $value + ($value*0.0) + ($value* $chkm->khuyenmai) );
            } else if ($cardType == 'momo' || $cardType == 'bank') {
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

            return redirect()->back()->with('alert', 'success');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'failed');
        }
    }

    public function thongKeNap() {
        $cardChargeLogs = CardChargeInfoLog::whereRaw(
            "(dateUpdate >= ? AND dateUpdate <= ?)",
            [request('fromDate')." 00:00:00", request('toDate')." 23:59:59"]
          )->orderBy('cardType')->get();
        $momo = $bank = $zing = 0;

        foreach ($cardChargeLogs as $cLog) {
            switch ($cLog->cardType) {
                case self::MOMO:
                    $momo += $cLog->value;
                break;
                case self::ZING:
                    $zing += $cLog->value;
                break;
                case self::BANK:
                    $bank += $cLog->value;
                break;
            }
        }
        return view('admin.thongkenap', compact(['cardChargeLogs', 'momo', 'zing', 'bank']));
    }

    public function logNapTien() {
        $cardChargeLogs = CardChargeInfoLog::all();
        return view('admin.lognaptien', compact('cardChargeLogs'));
    }

    public function logQuanLyTaiKhoan() {
        $accountInfoLogs = AccountInfoLog::all();
        return view('admin.logquanlytaikhoan', compact('accountInfoLogs'));
    }
}
