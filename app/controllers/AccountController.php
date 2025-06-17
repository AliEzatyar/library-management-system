<?php

class AccountController extends BaseController {

    // Sign In (POST method)
    public function postSignIn() {
        $validator = Validator::make(Input::all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::route('account-sign-in')
                ->withErrors($validator)
                ->withInput();
        }

        $remember = Input::has('remember');
        $auth = Auth::attempt([
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ], $remember);

        if ($auth) {
            return Redirect::intended('/');
        }

        return Redirect::route('account-sign-in')
            ->with('global', 'Wrong username or password.');
    }

    // Register User (POST method)
    public function postCreate() {
        $validator = Validator::make(Input::all(), [
            'username' => 'required|max:20|min:3|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return Redirect::route('account-create')
                ->withErrors($validator)
                ->withInput();
        }

        // Logging input (without password for security)
        Log::info('Creating user', ['username' => Input::get('username')]);

        $now = date('Y-m-d H:i:s');

        $user = User::create([
            'name' => 'Anonymous',
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'verification_status' => 0,
            'remember_token' => '',
            'created_at' => $now,
            'updated_at' => $now
        ]);

        if ($user) {
            return Redirect::route('account-sign-in')
                ->with('global', 'Your account has been created.');
        }

        return Redirect::route('account-create')
            ->with('global', 'Failed to create account.');
    }

    // Sign In Form (GET method)
    public function getSignIn() {
        return View::make('account.signin');
    }

    // Create Account Form (GET method)
    public function getCreate() {
        return View::make('account.create');
    }

    // Sign Out
    public function getSignOut() {
        Auth::logout();
        return Redirect::route('home');
    }
}

