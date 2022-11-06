<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index() {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'required',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id', 1)->first();
        if($setting) {
            $setting->website_name = $request->website_name;
           
            if($request->hasFile('website_logo')) {
                $destination = 'public/upload/setting/'.$setting->logo;
                if(File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = $request->website_name.'_logo_'.time().'.'.$extension;
                $file->move('public/upload/setting/', $filename);
                $setting->logo = $filename;
            }

            if($request->hasFile('website_favicon')) {
                $destination = 'public/upload/setting/'.$setting->favicon;
                if(File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_favicon');
                $extension = $file->getClientOriginalExtension();
                $filename = $request->website_name.'_favicon_'.time().'.'.$extension;
                $file->move('public/upload/setting/', $filename);
                $setting->favicon = $filename;
            }
            $setting->decription = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message', 'Setting Updated');
        } else {
            $setting = new Setting();
            $setting->website_name = $request->website_name;
           
            if($request->hasFile('website_logo')) {
                $file = $request->file('website_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = $request->website_name.'_logo_'.time().'.'.$extension;
                $file->move('public/upload/setting/', $filename);
                $setting->logo = $filename;
            }

            if($request->hasFile('website_favicon')) {
                $file = $request->file('website_favicon');
                $extension = $file->getClientOriginalExtension();
                $filename = $request->website_name.'_favicon_'.time().'.'.$extension;
                $file->move('public/upload/setting/', $filename);
                $setting->favicon = $filename;
            }
            $setting->decription = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message', 'Setting Added');
        }
    }
}
