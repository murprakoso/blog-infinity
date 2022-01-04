<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user())->first();
        return view('profile.edit', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $profile = User::find(auth()->user())->first();

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:30',
            'email'    => 'required|email|unique:users,email,' . $profile->id,
            'password' => 'required|min:6|confirmed'
        ], [], $this->attributes());

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // dd($request->all());
        // insert data
        try {
            $profile->update([
                'name'       => $request->name,
                'email'        => $request->email,
                'password'   => bcrypt($request->password),
            ]);
            Alert::success(
                trans('users.alert.update.title'),
                trans('users.alert.update.message.success')
            );
            return redirect()->route('dashboard.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('users.alert.update.title'),
                trans('users.alert.update.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    private function attributes()
    {
        return [
            'name'     => trans('users.form_control.input.name.attribute'),
            'email'    => trans('users.form_control.input.email.attribute'),
            'password' => trans('users.form_control.input.password.attribute')
        ];
    }
}
