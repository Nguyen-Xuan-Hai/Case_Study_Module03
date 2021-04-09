<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserRepository $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll(){
        return $this->userRepo->getAll();
    }

    function getById($id) {
        return $this->userRepo->findById($id);
    }

    function store($request) {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        //  $user->group_id = $request->group_id;
        $roles = $request->role_id;
        $this->userRepo->store($user, $roles);
    }

    function update($id,$request){
        $user = $this->userRepo->findById($id);
        $user->fill($request->all());
        $roles = $request->role_id;
        $this->userRepo->store($user,$roles);
    }

    function delete($user){
        $this->userRepo->delete($user);
    }

}
