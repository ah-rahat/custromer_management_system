<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;


class PageController extends Controller
{
    public function index()
    {
        $mainData=Main::latest()->first();
        $servicesData=Service::all()->take(3);
        return view('welcome',compact('mainData','servicesData'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function main()
    {
        $mainData=Main::first();

        return view('admin.main',compact('mainData'));
    }
    public function store(Request $request,$id)
    {
        
        $store_main=Main::where('id',$id)->first();
        
        $store_main->title=$request->title;
        $store_main->sub_title=$request->sub_title;
        if ($request->hasFile('bg_img')) {
           $filename=$request->bg_img;
           $file_name=time().rand(1,999).'.'.$filename->getClientOriginalExtension();
           $filename->move(base_path('public/uploads/bg_img'),$file_name);
           $store_main->bg_img=$file_name;
        }
        if ($request->hasFile('resume')) {
            $resumeFile=$request->resume;
            $resumeFileName=time().rand(1,999).'.'.$resumeFile->getClientOriginalExtension();
            $resumeFile->move(base_path('public/uploads/resume'),$resumeFileName);
            $store_main->resume=$resumeFileName;
        }
        
        $store_main->update();
        return redirect()->back()->with('addstatus','Data added successfully');
      
    }
    public function services()
    {
        $servicesData=Service::all();
        return view('admin.services',compact('servicesData'));
    }
    public function servicesStore(Request $request)
    {
        $serviceStore=new Service();
        $serviceStore->icon=$request->icon;
        $serviceStore->title=$request->title;
        $serviceStore->description=$request->description;
        $serviceStore->save();
        return redirect()->back()->with('addstatus','Data added successfully');
    }
    public function servicesEdit ($id)
    {
        
        $serviceSingleData=Service::where('id',$id)->first();
        
        return view('admin.serviceEdit',compact('serviceSingleData','id'));
    }
    public function servicesUpdate(Request $request,$id)
    {
        $serviceUpdate=Service::find($id);
        $serviceUpdate->icon=$request->icon;
        $serviceUpdate->title=$request->title;
        $serviceUpdate->description=$request->description;
        $serviceUpdate->update();
        return redirect()->action('PageController@services')->with('addstatus','Data added successfully');
    }
    public function servicesDelete($id)
    {
        $serviceDelete=Service::find($id);
        $serviceDelete->delete();
        return redirect()->back()->with('addstatus','Data deleted successfully');

    }
    public function protfolio()
    {
        return view('admin.protfolio');
    }
    public function contact()
    {
        return view('admin.contact');
    }
    public function about()
    {
        return view('admin.about');
    }
}
