<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusE;
use App\Http\Requests\Students\StoreRequest;
use App\Http\Requests\Students\UpdateRequest;
use App\Models\course;
use App\Models\Student;
use Faker\Core\Color;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


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
       $arrayStatus=StudentStatusE::arrayStatus();
       $courses=course::all();
       View::share('courses',$courses);
       View::share('arrStudentStatus',$arrayStatus);
       View::share('title',$title);
    }

    public function index(Request $request){
        $students=$this->model::paginate($perPage=2,$columns=['*'],$pageName='page');
        return view('Students.StudentList',['students'=>$students]);
    }

    public function store(StoreRequest $request){
        $path = Storage::putFile('avatars', $request->file('avatar'));
        $path=substr($path,7);
            $this->model::create([
           'name' => $request->get('name'),
           'birthday' => $request->get('birthday'),
           'description' => $request->get('description'),
           'status' => $request->get('status'),
           'gender' => $request->get('gender'),
           'course_id' => $request->get('course_id'),
           'avatar'=>$path

        ]);
        return response('them thanh cong');
    }

    public function edit(Request $request){
        $students=$this->model::find($request->get('id'));
        return response()->json(['students'=>$students]);
    }

    public function update(UpdateRequest $request){
        $path = Storage::putFile('public/avatars', $request->file('avatar'));
        $path=substr($path,7);
        $FormRequest=$request->except(['_token','_method']);
        $FormRequest['avatar']=$path;
         $this->model::where('id', $request->get('id'))->update($FormRequest);
         return response('sua thanh cong');
    }

    public function delete(Request $request){
        $this->model::destroy($request->get('id'));
        return response('xoa thanh cong');

    }



}
