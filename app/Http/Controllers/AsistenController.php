<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AsistenController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'Asisten')
            ->orWhere('role', 'PJ')
            ->orWhere('role', 'Staff')
            ->orderBy("id", "desc")->paginate(10);
        return view("asisten", compact("users"));
    }

    public function create()
    {
        return view("createAsisten");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_asisten' => 'required|string|unique:users,id_asisten',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:Admin,Staff,PJ,Asisten',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('photos', $imageName, 'public');
            $validatedData['photo'] = $imageName;
        }

        User::create($validatedData);

        return redirect()->route('asisten')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('editAsisten', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_asisten' => 'required|string|unique:users,id_asisten',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:Admin,Staff,PJ,Asisten',
            'photo' => 'image|mimes:jpeg,png,jpg,gif',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);

        $validatedData['password'] = Hash::make($request->password);

        if (!$request->password) {
            $validatedData['password'] = Hash::make($user->password);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $user->photo = $request->file('photo')->store('photos', 'public');
        } else {
            $validatedData['photo'] = $user->photo;
        }

        $update = User::where('id', $id)->update($validatedData);

        if ($update) {
            return redirect()->route('asisten')->with('success', 'User updated successfully!');
        }
        return redirect()->route('asisten')->with('error', 'User updated failed!');
    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if ($user) {
            Storage::delete($user->photo);
            if ($user->delete()) {
                return response('success', 200);
            }
            return response('failed', 400);
        }
    }
}
