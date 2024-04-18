<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function save_new_user(Request $request){
        $request->validate([
            'fio'=>['required', 'regex:/[А-Яа-яЁё\s-]/u'],
            'login'=>['required', 'regex:/[a-zA-Z0-9\s-]/u'],
            'email'=>['required', 'email:frc', 'unique:users'],
            'password'=>['required', 'confirmed', 'min:8'],
            'rule'=>['required']
        ],
            [
                'fio.required'=>'Поле обязательно для заполнения',
                'fio.regex'=>'Допустима только кириллица',
                'login.required'=>'Поле обязательно для заполнения',
                'login.regex'=>'Допустима только латиница',
                'email.required'=>'Поле обязательно для заполнения',
                'email.email'=>'Недопустимый формат',
                'email.unique'=>'Почта уже существует',
                'password.required'=>'Поле обязательно для заполнения',
                'password.confirmed'=>'Недопустимый формат',
                'password.min'=>'Пароль минимум 8 символов',
                'rule.required'=>'Согласие обязательно',
            ]);


        $user = new User();
        $user->fio = $request->fio;
        $user->login = $request->login;
        $user->password = md5($request->password);
        $user->email = $request->email;
        $user->save();

        return redirect()->route('welcome')->with('ok', 'Вы успешно зарегистрировались');
    }

    public function auth_user(Request $request){
        $request->validate([
            'login'=>['required'],
            'password'=>['required'],
        ],
            [
                'login.required'=>'Поле обязательно для заполнения',
                'password.required'=>'Поле обязательно для заполнения',

            ]);
        $categories = Category::all();
        $applications = Application::all();
        $user = User::query()
            ->where('login', $request->login)
            ->where('password',md5($request->password))->first();
        if($user){
            Auth::login($user);
            if($user->role==1){
                return view('admin.profile', ['categories'=>$categories,'applications'=>$applications]);
            }else{
                return view('admin.applications.index',['categories'=>$categories,'applications'=>$applications]);
            }
        }else{
            return redirect()->route('page_auth')->with('err', 'Невенрый логин или пароль');
        }
    }

    public function page_exit(){
        Auth::logout();
        return redirect()->route('page_auth');
    }

}
