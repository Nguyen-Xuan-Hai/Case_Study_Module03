<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll(){
        return $this->user->paginate(3);
    }

    function findById($id)
    {
        return $this->user->findOrFail($id);
    }

    function store($user, $roles)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($roles);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }

    }

    function delete($user){
        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            DB::commit();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

}
