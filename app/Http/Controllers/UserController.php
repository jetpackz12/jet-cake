<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const INACTIVE = 0;
    const ACTIVE = 1;

    public function index()
    {
        return view('login.login');
    }

    public function create()
    {
        return view('registration.registration');
    }

    public function store(Request $request)
    {
        $userIfExist = User::where('username', '=', $request->username)->first();

        if (isset($userIfExist) && $userIfExist->exists()) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid username please try another one!'
            ]);
        }

        $formData = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'bdate' => $request->bdate,
            'pnumber' => $request->pnumber,
            'province' => $request->province,
            'municipality' => $request->municipality,
            'village' => $request->village,
            'street' => $request->street,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];

        User::create($formData);

        return response()->json([
            'response' => 1,
            'message' => 'Registration successfully!',
            'path' => '/login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $user = User::where('username', '=', $request->username)->where('status', self::INACTIVE)->first();
        if ($user) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid username and password.',
            ]);
        }

        $formData = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();

            if (auth()->user()->user_position !== 1) {
                return response()->json([
                    'response' => 1,
                    'message' => 'Login success!',
                    'path' => '/customer/cakes'
                ]);
            }

            return response()->json([
                'response' => 1,
                'message' => 'Login success!',
                'path' => '/home'
            ]);
        }

        return response()->json([
            'response' => 0,
            'message' => 'Invalid user credential, Please try agian!'
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function usersIndex()
    {

        $access_rule = explode(',', auth()->user()->access_rule);
        if (!in_array("4", $access_rule)) {
            return abort(404);
        }

        $render_data = [
            'users' => User::all(),
        ];

        return view('main.pages.users.users', $render_data);
    }

    public function updateAccessRule(Request $request, string $id)
    {

        $order = User::find($id);
        $order->user_position = $request->user_position;
        $order->access_rule = $request->access_rule;
        $order->save();

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully update access rule of this user',
            'path' => '/users'
        ]);
    }

    public function updateStatus(Request $request, string $id)
    {

        $status = $request->status == self::ACTIVE ? self::INACTIVE : self::ACTIVE;

        $order = User::find($id);
        $order->status = $status;
        $order->save();

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully update status of this user',
            'path' => '/users'
        ]);
    }
}
