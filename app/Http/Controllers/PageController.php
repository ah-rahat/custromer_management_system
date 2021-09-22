<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;
use App\About;
use App\Protfolio;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mainData=Main::latest()->first();
        $servicesData=Service::all()->take(3);
        $profolioData=Protfolio::all();
        $aboutdatas=About::all();
        return view('welcome',compact('mainData','servicesData','profolioData','aboutdatas'));
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
        $profolioData=Protfolio::all();
        return view('admin.protfolio');
    }
    public function protfolioStore(Request $request)
    {
              $request->validate([
                  'image'=>'required',
                  'title'=>'required',
                  'sub_title'=>'required',
                  'client'=>'required',
                  'category'=>'required',
                  'description'=>'required',
              ]);
              $protfolioStore=new Protfolio();
              if($request->hasFile('image')){
                  $filename=$request->image;
                  $file_name=time().rand(1,999).'.'.$filename->getClientOriginalExtension();
                  $filename->move(base_path('public/uploads/project_img'),$file_name);
                  $protfolioStore->image=$file_name;
              }
              
              $protfolioStore->title=$request->title;
              $protfolioStore->sub_title=$request->sub_title;
              $protfolioStore->client=$request->client;
              $protfolioStore->category=$request->category;
              $protfolioStore->description=$request->description;
              $protfolioStore->save();
              return redirect()->back()->with('addstatus','Data added successfully');


    }
   
    public function about()
    {
        
        return view('admin.about');
    }
    public function aboutStore(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'year'=>'required',
            'title'=>'required',
            'description'=>'required',
            
        ]);
        $aboutStore=new About();
        if($request->hasFile('image')){
            $filename=$request->image;
            $file_name=time().rand(1,999).'.'.$filename->getClientOriginalExtension();
            $filename->move(base_path('public/uploads/project_img'),$file_name);
            $aboutStore->image=$file_name;
        }
        
        $aboutStore->year=$request->year;
        $aboutStore->title=$request->title;
        $aboutStore->description=$request->description;
        $aboutStore->save();
        return redirect()->back()->with('addstatus','Data added successfully');
    }
    public function contact()
    {
        return view('admin.contact');
    }
}
