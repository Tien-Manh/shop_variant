<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Validator;

class SettingController extends Controller
{
    public function index(Request $rq)
    {
        $settings = Setting::all();
        return view('pages.settings.edit', compact('settings'));
    }

    public function save(Request $rq)
    {
        foreach ($rq->all() as $key => $item) {
            if ($key != '_token') {
                $setting = Setting::where('key', $key)->first();
                if ($rq->hasFile($key)) {
                    $path = $item->store('admin/settings', 'public');
                    @unlink(public_path('storage/' . $setting->value));
                    $setting->value = $path;
                } else{
                    $setting->value = $item;
            }
            $setting->save();
        }
    }
return response()->json(["type" => 'update',
'success' => true,
'message' => __('Update') . ' ' . __('Settings') . ' ' . __('success') . ' !']);
}
}
