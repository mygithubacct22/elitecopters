<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\AdminUserRequest;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        return User::paginate();
    }

    public function store(Request $request)
    {
        dd($request->all());
        $user = new User;
        $user->save();

        return $user;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $user = User::findOrFail($id);

        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return ['message' => 'Successfully deleted'];
    }
}
