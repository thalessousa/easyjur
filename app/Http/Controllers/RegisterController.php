<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use DB;
use App\Models\Hint;

class RegisterController extends Controller
{
    public function register(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = AdminUser::create($data);
        DB::table('admin_role_users')->insert([
            'role_id' => 1,
            'user_id'=> $user->id
        ]);
        
        return redirect()->route('home');

    }
}
