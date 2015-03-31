<?php namespace Course\Http\Controllers;

use Course\User;

class UsersController extends Controller{
    public function getOrm()
    {
        $result = User::get();

        dd($result);
    }

    public function getIndex()
    {

        $result=\DB::table('users')
            ->Select(
                'users.id',
                'first_name',
                'last_name',
                'user_profiles.id as profile_id'
            )
            //->where('first_name','<>','Duilio')
            ->leftJoin('user_profiles', 'users.id','=', 'user_profiles.user_id')
            ->get();
        dd($result);

        return $result;
    }

}