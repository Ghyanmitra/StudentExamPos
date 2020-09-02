<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Exams extends Model
{
    //
    use Sortable;

    protected $fillable  = ['exam_name'];
    public $sortable = ['id','exam_name'];

    public function students(){
        return $this->belongsTo('App\Students');
    }

}
