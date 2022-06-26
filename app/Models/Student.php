<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=['name','birthday','description','status','course_id','gender','avatar'];
    public function NameDes(){
        return $this->name. $this->description;
    }

}
