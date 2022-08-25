<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFormRequest;
use App\Http\Requests\AdminFormUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view('admin.profile.index', [
            'users' => User::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(AdminFormRequest $request)
    {
        $input = $request->only([
            'name', 'email', 'password', 'phone', 'address', 'image'
        ]);
        User::storeUser($input);
        return redirect(route('admin.profile.index'))->with('message', 'Profile created successfully');
    }

    public function edit($id) {
        if ($id == auth()->user()->id) {
            $user = User::find(auth()->user()->id);
        }
        else {
            $user = User::find($id);
        }
          return view('admin.profile.edit', compact('user'));
    }

    public function update(AdminFormUpdateRequest $request, $id) {
        // return $request;
        $input = $request->only([
            'name', 'email', 'password', 'phone', 'address', 'image'
        ]);
        User::storeUser($input, $id);
        return redirect(route('admin.profile.index'))->with('message', 'Profile updated successfully');
        
    }

    public function delete($id) {
        User::find($id)->delete();
        return back()->with('message', 'Admin account deleted successfully');
    }
}
