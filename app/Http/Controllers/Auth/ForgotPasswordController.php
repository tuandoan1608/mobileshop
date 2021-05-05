<?php

namespace App\Http\Controllers\Auth;

use App\custommer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestResetPassword;
use Carbon\Carbon;


use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function getForgotPassword()
    {
        return view('client.account.forgotpassword');
    }
    public function SendCodeResetPass(Request $request)
    {


        $email = $request->email;
        $userCheck = custommer::where('email', $request->email)->first();
        if (!$userCheck) {
            Flash::error('Email không tồn tại');
            return redirect()->back()->with('danger', 'Không tồn tại email trong hệ thống');
        }
        $code = md5(time() . $email);
        $userCheck->code = $code;
        $userCheck->time_active = Carbon::now();
        $userCheck->save();
        $url = route('resetpass', ['code' => $userCheck->code, 'email' => $email]);
        $data = [
            'route' => $url
        ];
        Mail::send('client.account.resetpassword', $data, function ($message) use ($userCheck) {
            $message->from('sinnobi11226@gmail.com', 'Lấy lại mật khẩu');
            $message->to($userCheck->email, 'Visitor');
            $message->subject('Link lấy lại mật khẩu đã được gửi vào mail của bạn');
        });
        Flash::success('Đã gửi link lấy lại mật khẩu qua email của bạn');
        return redirect()->back();
    }
    public function resetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $userCheck = custommer::where(['code' => $code, 'email' => $email])->first();
        if (!$userCheck) {
            return redirect()->back();
        }
        return view('client.account.reset');
    }
    public function savePassword(RequestResetPassword $request)
    {

        if ($request->password) {
            $code = $request->code;
            $email = $request->email;
            $userCheck = custommer::where(['email' => $email])->first();

            if (!$userCheck) {
                Flash::success('Thay đổi mật khẩu thành công');
                return redirect()->back();
            }
            $userCheck->password = bcrypt($request->password);
            $userCheck->save();
        }
        return redirect('/dang-nhap');
    }
}
