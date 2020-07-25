<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
   public function show()
   {
      //$user = User::find(1);
      //$profile =Profile::find(1);
      $user=Auth::User();
    

    dd($user->profile->gender);
    return view('user.profile.show',['user'=> $user]);
   }

   public function add()
   {
       return view('user.profile.create');
   }

   public function edit(Request $request)
   {
       $profile = Profile::find($request->id);
       if (empty($profile)) {
           abort(404);
       }
       return view ('user.profile.edit', ['profile_form'=> $profile]);
   }

   public function update(Request $request)
   {
       $profile = Profile::find($request->id);
       $profile_form =$request->all();
       unset($profile_form['_token']);
       $profile->fill($profile_form)->save(); 

       return redirect('user/profile/edit');
   }

   public function showEditPasswordForm(){
       return view('user.profile.editpassword');
   }
    //
}
