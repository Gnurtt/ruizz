<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use DB;

class LayoutRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    } 
    public function get_data(){
        $sql = "SELECT * FROM layout";
        return DB::select($sql);
    }
}
