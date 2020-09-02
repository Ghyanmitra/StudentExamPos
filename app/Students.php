<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Students extends Model
{
    //
    use Sortable;
    protected $guarded = ['name, email'];
    public $sortable = ['id','name', 'email'];

    public function exams(){
        return $this->hasMany('App\Exams');
    }
}
