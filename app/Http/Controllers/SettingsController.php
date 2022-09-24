<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\PractitionerDay;
use App\Models\CenterTiming;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::enableQueryLog();

        // DB::enableQueryLog();

        // dd(DB::getQueryLog());


        $userId = Auth::user()->id;
        $user = User::find($userId);
        // $data['id'] = ucwords($user->id);
        // $data['first_name'] = ucwords($user->first_name);
        // $data['last_name'] = ucwords($user->last_name);
        // $data['nick_name'] = $user->nick_name;
        // $data['email'] = $user->email;
        // $data['local_count'] = $user->local_count;
        // $data['tax_number'] = $user->tax_number;
        // $data['contact_no'] = $user->contact_no;
        // $data['street'] = $user->street;
        // $data['country'] = $user->country;
        // $data['company_name'] = $user->company_name;
        // $data['profile_picture'] = $user->profile_picture;
        // $data['user_type'] = $user->user_type;

        return view('user.settings', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function updateLang()
    {
        $userId=Auth::user()->id;
        $user = User::Find($userId);
        if($user->localization == 'en')
        {
            app()->setLocale('he');
            session()->put('locale', 'he');
            $lang='he';
        }
        else
        {
            app()->setLocale('en');
            session()->put('locale', 'en');
            $lang='en';
        }
        $user->localization =$lang;
        $user->save();
        return redirect()->route('dashboard');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId = $id;
        $user = User::Find($id);

        $validatedData = $request->validate([
            'file' => 'png,jpg,jpeg|max:2048',

        ]);
        if ($request->hasFile('profile_picture')) {
            // $folderName = $userId;
            // $fileName = time();
            $previousPic = $request->profile_picture;
            if ($previousPic != 'blank.png') {
                $previousPicDest = "profile/" . $previousPic;
                File::delete($previousPicDest);
            }

            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "profile/" . $userId;
            $file = $request->file('profile_picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $userId . "/" . $filename;
        }

        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect()->back();
    }

    public function updateEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'confirmemailpassword' => ['required'],

        ]);

        if (Hash::check($request->confirmemailpassword, $user->password)) {

            $user->email = $request->email;
            $user->save();
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'confirmed|max:8|different:old_password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Password changed');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
