<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }

    public function store(Request $request){
       $data = $request->except('_token');
       foreach($data as $key => $value){
        $setting = Setting::firstOrCreate(['key' => $key]);
        $setting->value = $value;
        $setting->save();
       }
       return redirect()->route('settings.index')->with('status','Setting Saved Successfully');
    }
}
