<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function page_registration(){
        return view('guest.registration');
    }

    public function welcome(){
        $applications = Application::query()->orderByDesc('created_at')->limit(4)->get();
        $categories = Category::all();
        return view('welcome',['applications'=>$applications,'categories'=>$categories]);
    }

    public function page_auth(){
        return view('guest.auth');
    }


    public function ShowCategoriesAdminPage(){
        $categories = Category::all();
        return view('admin.categories.index', ['categories'=>$categories]);
    }

    public function ShowApplicationsAdminPage(){
        $applications = Application::query()->orderByDesc('created_at')->get();
        $categories = Category::all();
        return view('admin.applications.index', ['applications'=>$applications], ['categories'=>$categories]);
    }

    public function profile(){
        $applications = Application::all();
        return view('admin.profile', ['applications'=>$applications]);
    }
    public function edit(){
        return view('user.profile');
    }

}
