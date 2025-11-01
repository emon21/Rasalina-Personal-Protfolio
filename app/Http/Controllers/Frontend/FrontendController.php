<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Portfolio;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    # Frontend Home
    public function index()
    {
        $sliders = HomeSlider::latest()->get();
        return view('frontend.index',compact('sliders'));
    }

    # Frontend Banner
    public function banner(){

        $slider = HomeSlider::first();
        // return $slider;
        return view('frontend.components.banner-area',compact('slider'));


    }

    # Frontend About
    public function about()
    {
        $about =About::first();
        return view('frontend.about',compact('about'));
    }

    # Frontend Contact
    public function contact()
    {
        return view('frontend.contact');
    }

    # Frontend Blog
    public function blog()
    {
        return view('frontend.blog');
    }

    # Frontend Blog Details
    public function blog_details()
    {
        return view('frontend.blog_details');
    }

    # Frontend Services
    public function services()
    {
        return view('frontend.services');
    }

    # Frontend Services Details
    public function services_details()
    {
        return view('frontend.services_details');
    }

    # Frontend Portfolio
    public function Portfolio()
    {
         $portfolios = Portfolio::latest()->get();
        return view('frontend.portfolio.index',['portfolios' => $portfolios]);
    }

    # Frontend Portfolio Details
    public function PortfolioDetails(Portfolio $portfolio)
    {
        // $portfolio = Portfolio::find($portfolio);

        // $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        // return $portfolio;

        return view('frontend.portfolio.portfolio-details',['portfolio' => $portfolio]);
    }

    # Frontend Pricing
    public function pricing()
    {
        return view('frontend.pricing');
    }

    # Frontend Testimonial
    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    # Frontend Team
    public function team()
    {
        return view('frontend.team');
    }

    # Frontend Team Details
    public function team_details()
    {
        return view('frontend.team_details');
    }

    # Frontend Faq
    public function faq()
    {
        return view('frontend.faq');
    }

    # Frontend Error
    public function error()
    {
        return view('frontend.error');
    }

    # Frontend Coming Soon
    public function coming_soon()
    {
        return view('frontend.coming_soon');
    }

    # Frontend Login
    public function login()
    {
        return view('frontend.login');
    }

    # Frontend Register
    public function register()
    {
        return view('frontend.register');
    }

    # Frontend Forgot Password
    public function forgot_password()
    {
        return view('frontend.forgot_password');
    }

    # Frontend Reset Password
    public function reset_password()
    {
        return view('frontend.reset_password');
    }

    # Frontend Privacy Policy
    public function privacy_policy()
    {
        return view('frontend.privacy_policy');
    }

    # Frontend Terms & Conditions
    public function terms_conditions()
    {
        return view('frontend.terms_conditions');
    }


}
