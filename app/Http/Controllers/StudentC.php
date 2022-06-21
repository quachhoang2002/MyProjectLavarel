<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StoreRequest;
use App\Models\Student;
use Faker\Core\Color;

use Illuminate\Http\Request;

class StudentC extends Controller
{
    public function index(Request $request){

        $students=Student::paginate($perPage=2,$columns=['*'],$pageName='page');
        return view('StudentList',['students'=>$students]);
    }

    public function store(StoreRequest $request){
           Student::create([
           'name' => $request->get('name'),
           'birthday' => $request->get('birthday'),
           'description' => $request->get('description'),

        ]);
        return redirect()->route('student.index');

    }
    public function edit(Request $request){
        $students=Student::find($request->get('id'));
        return response()->json(['students'=>$students]);
    }
    public function update(Request $request){
         Student::where('id', $request->get('id'))->update($request->except(['_token']));
         return response('sua thanh cong');

    }

    public function delete(Request $request){
        $students=Student::destroy($request->get('id'));
        return response('xoa thanh cong');

    }



}
