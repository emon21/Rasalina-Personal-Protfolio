<?php

namespace App\Http\Controllers\home;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    //
    public function AllPortfolio(){
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.all-portfolio',compact('portfolios'));
    }
    
    public function AddPortfolio(){
        return view('admin.portfolio.create');
    }
    
    public function StorePortfolio(Request $request){
        
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required',
        // ]);
        
        // $portfolio = new Portfolio(); // object create
        // $portfolio->portfolio_name = $request->name;
        // $portfolio->portfolio_title = $request->title;
        // $portfolio->portfolio_description = $request->description;

        # array in create

        $data = array();
        $data['portfolio_name'] = $request->name;
        $data['portfolio_title'] = $request->title;
        $data['portfolio_description'] = $request->description;

        

        # Image Upload
        if ($request->hasFile('portfolioImage')) {

            $file = $request->file('portfolioImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $filename);
            // only file upload no foldername in database
            $path = 'uploads/portfolio/' . $filename;
            $data['portfolio_image'] = $path;
            // $portfolio->portfolio_image = $path;
        }


        // $portfolio->save();
        Portfolio::create($data);

        flashToastr('success', 'Portfolio Created Successfully', 'Store Portfolio');

        return redirect()->route('all.portfolio')->with('success','Portfolio Created Successfully');
       
    }
    
    public function EditPortfolio($id){
       $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit',['data' => $portfolio]);
    }
    
    public function UpdatePortfolio(Request $request,$id){

        $portfolio = Portfolio::find($id);

        # Image Upload
        if ($request->hasFile('portfolioImage')) {

            # old Image Delete
            if (File::exists($portfolio->portfolio_image)) {
                File::delete($portfolio->portfolio_image);
            }

            $file = $request->file('portfolioImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $filename);
            // only file upload no foldername in database
            $path = 'uploads/portfolio/' . $filename;
            $portfolio->portfolio_image = $path;
            // $portfolio->portfolio_image = $path;
        }

        $portfolio->portfolio_name = $request->name;
        $portfolio->portfolio_title = $request->title;
        $portfolio->portfolio_description = $request->description;
        $portfolio->save();

        flashToastr('info', 'Portfolio Update Successfully', 'Update Portfolio');

        return redirect()->route('all.portfolio')->with('success', 'Portfolio Created Successfully');


    }
    
    public function DeletePortfolio($id){

        $portfolio = Portfolio::find($id);
        //old image delete
        if (File::exists($portfolio->portfolio_image)) {
            File::delete($portfolio->portfolio_image);
        }
        
        $portfolio->delete();
        
        # Toaster Helper Function Using
        flashToastr('error', 'Portfolio Deleted Successfully', 'Delete Portfolio');

        return redirect()->route('all.portfolio')->with('success', 'Portfolio Deleted Successfully');
    }
    
    public function PortfolioDetails($id){
        // return $portfolio;
        $portfolio = Portfolio::find($id);
        return view('frontend.components.portfolio-details',compact('portfolio'));

    }
}
