<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
        $users = $this->userService->getAll();
        return view('backend.admin.users.list',compact('users'));
    }

    public function create(){
            $roles = Role::all();
            return view('backend.admin.users.add', compact( 'roles'));

    }

    function store(Request $request) {
//        dd($request);
        $this->userService->store($request);
        toastSuccess('Create Successfully!');
        return redirect()->route('users.index');
    }

    function edit($id) {
        $roles = Role::all();
        $user = $this->userService->getById($id);
        return view('backend.admin.users.edit', compact('user','roles'));
    }

    function update($id,Request $request){
        $this->userService->update($id,$request);
//        toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
        toastSuccess('Update Successfully!');
        return redirect()->route('users.index');
    }

    function delete($id) {
        $user = $this->userService->getById($id);
        $this->userService->delete($user);
        toastSuccess('Delete Successfully!');
        return redirect()->route('users.index');

    }


}
