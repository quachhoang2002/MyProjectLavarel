<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StoreRequest;
use App\Http\Requests\Students\UpdateRequest;
use App\Models\Student;
use Faker\Core\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View ;

class StudentC extends Controller
{
    private $model;
    public function __construct(Request $request)
    {
       $this->model= new Student();
       $routesName=Route::currentRouteName();
       $arrRoutes=explode('.',$routesName);
       $arrRoutes=array_map('ucfirst',$arrRoutes);
       $title=implode('/',$arrRoutes);
       View::share('title',$title);

    }
    public function index(Request $request){
        $students=$this->model::paginate($perPage=2,$columns=['*'],$pageName='page');
        return view('StudentList',['students'=>$students]);
    }

    public function store(StoreRequest $request){
           $this->model::create([
           'name' => $request->get('name'),
           'birthday' => $request->get('birthday'),
           'description' => $request->get('description'),

        ]);
        return redirect()->route('student.index');

    }
    public function edit(Request $request){
        $students=$this->model::find($request->get('id'));
        return response()->json(['students'=>$students]);
    }
    public function update(UpdateRequest $request){
         $this->model::where('id', $request->get('id'))->update($request->except(['_token']));
         return response('sua thanh cong');

    }

    public function delete(Request $request){
        $this->model::destroy($request->get('id'));
        return response('xoa thanh cong');

    }



}
