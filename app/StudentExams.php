<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class StudentExams extends Model
{
    //
    use Sortable;
    // protected $guarded = ['user_id, exam_id','exam_name','name'];
    protected $fillable = ['user_id, exam_id','exam_name','name'];
    public $sortable = ['id','exam_name','name'];


}
