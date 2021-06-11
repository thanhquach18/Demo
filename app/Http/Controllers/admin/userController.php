<?php

namespace App\Http\Controllers\admin;

use User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\User as userModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class userController extends Controller
{
    public function login() {
        return view('admin.users.login');
    }

    public function loginPost(Request $request) {
        $rules = [
            'email' => 'required|email|min:3|max:250',
            'password' => 'required|min:6|max:250',
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.min' => 'Email chứa ít nhất 3 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email có nhiều nhất 250 ký tự',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu có nhiều nhất 250 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = userModels::login($request['email'], $request['password']);
        if (is_null($user)) {
            return redirect()->back()->withInput()->withErrors(new MessageBag(['error' => 'Đăng nhập thất bại']));
        }

        Auth::loginUsingId($user->id, !is_null($request->input('remember')));

        return redirect()->route('dashboard.index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.get');
    }
    public function changePassword(Request $request){
        return view('admin.users.changePassword');
    }

    public function changePasswordPost(Request $request){
        $values = [
            'password' => 'required|min:6|max:250',
            'newpassword' => 'required|min:6|max:250',
            'repassword' => 'same:newpassword',
        ];
        $messages = [
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu có nhiều nhất 250 ký tự',
            'newpassword.required' => 'Mật khẩu là trường bắt buộc',
            'newpassword.min' => 'Mật khẩu chứa ít nhất 3 ký tự',
            'newpassword.max' => 'Mật khẩu có nhiều nhất 250 ký tự',
            'repassword.same' => 'Mật khẩu không khớp',
        ];
        $validator = Validator::make($request->all(), $values, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $emails = Auth()->user()->email;

        $user = userModels::login($emails, $request['password']);
        if (is_null($user)) {
            return redirect()->back()->withErrors(new MessageBag(['password' => 'Mật khẩu cũ không đúng']));
        }

        $user->password = Hash::make($request['newpassword']);
        if($user->save()) {
            return redirect()->back()->withErrors(new MessageBag(['success' => 'Đổi mật khẩu thành công']));
        }
            
        return redirect()->back()->withInput()->withErrors(new MessageBag(['error' => 'Đổi mật khẩu thất bại']));
    }

}
