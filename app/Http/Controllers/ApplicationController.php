<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $application = new Application();
        if($request->file('img_one')){
            $path = $request->file('img_one')->store('img');
            $application->img_one ='storage/app/'.$path;
        }
            $application->title = $request->title;
            $application->description = $request->description;
            $application->category_id = $request->category_id;
            $application->user_id=Auth::id();

            $application->save();
            return redirect()->route('ShowApplicationsAdminPage');

        }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Application $application)
    {
        $request->validate([
            'title'=>['required','regex:/[А-ЯЁа-яё]/u', 'min:3'],
            'description'=>['required','regex:/[А-ЯЁа-яё]/u', 'min:3'],
        ],
            [
                'title.required'=>'Поле обязательно для заполнения',
                'title.regex'=>'Допустима только кириллица',
                'title.min'=>'Минимум 3 символа',
                'description.required'=>'Поле обязательно для заполнения',
                'description.regex'=>'Допустима только кириллица',
                'description.min'=>'Минимум 3 символа',
            ]);

        $application->title = $request->title;
        $application->description = $request->description;
        $application->category_id = $request->category_id;
        $application->update();
        return redirect()->route('ShowApplicationsAdminPage');
    }


    public function delete_application(Application $application){
        $application->delete();
        return redirect()->route('ShowApplicationsAdminPage');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
