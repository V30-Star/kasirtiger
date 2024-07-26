<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validations
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];

        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'failed',
                'message' => $validator->errors()->first()
            ]);
        }

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            $res['success'] = 'success';
        } else {
            $res['success'] = 'failed';
            $res['message'] = trans('lang.invalid_login');
        }

        return response()->json($res);
    }

    /**
     * Get application settings
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getapplication()
    {
        $data = DB::table('settings')->where('settingsid', '1')->first();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'list data'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No data found'
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
