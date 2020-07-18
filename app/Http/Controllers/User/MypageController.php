<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
   public function show()
   {
       return view('user.profile');
   }

   public function add()
   {
       return view('user.profile.create');
   }

   public function edit()
   {
       return view ('user.profile.edit');
   }

   public function update()
   {
       return redirect('user/profile/edit');
   }
    //
}
