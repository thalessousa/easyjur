<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HintPaginateRequest;
use App\Http\Resources\HintResource;
use App\Models\AdminUser;
use DB;
use Hash;
use App\Models\Hint;

class HintController extends Controller
{
    public function index(HintPaginateRequest $request){
        $data = $request->validated();
        $hints = Hint::when(isset($data['type']),function($query,$type) use ($data){
            $query -> where('type',$data['type']);
        })->when(isset($data['description']),function($query,$description) use ($data){
            $query -> where('description', $data['description']);
        })->when(isset($data['model']),function($query,$model) use ($data){
            $query -> where('model',$data['model']);
        })->when(isset($data['version']),function($query,$version) use ($data){
            $query -> where('version',$data['version']);
        })->when(isset($data['brand']),function($query,$brand) use ($data){
            $query -> where('brand',$data['brand']);
        })->simplePaginate();
        return view('welcome', [ 'hints'=>$hints]);
       }

}
