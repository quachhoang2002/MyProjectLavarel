<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table="student";
    use HasFactory;
    protected $fillable=['name','birthday','description',];
    public function NameDes(){
        return $this->name. $this->description;
    }


}
