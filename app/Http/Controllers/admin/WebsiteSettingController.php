<?php

namespace App\Http\Controllers\admin;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteSettingController extends Controller
{
    //

    public function FooterInfo(){
        $footer = Footer::first();
        return view('admin/website-setting/footer',['footer' => $footer]);
    }
    public function FooterInfoUpdate(Request $request,Footer $footer){
      

        $footer->footer_phone_no = $request->footer_phone_no;
        $footer->footer_description = $request->footer_description;
        $footer->footer_address = $request->footer_address;
        $footer->footer_email = $request->footer_email;
        $footer->footer_text = $request->footer_text;
        $footer->footer_social_facebook = $request->footer_social_facebook;
        $footer->footer_social_twitter = $request->footer_social_twitter;
        $footer->footer_copyright = $request->footer_copyright;
        $footer->save();
        return back();
    }
}
