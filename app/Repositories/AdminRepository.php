<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use DB;

class AdminRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function checkEmailPassword($request){
        $user = $this->model->where('email', '=', $request->email)->first();
        if ($user) {
            return Hash::check($request->password, $user->password) ? $user->id : false;
        }else{
            return false;
        }
    }
    // # Tạo token client
    public function createTokenClient($id){
        return $id . '$' . Hash::make($id . '$' . $this->model->findOrFail($id)->secret_key);
    }
    
}
