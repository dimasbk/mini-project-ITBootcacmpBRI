<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CodeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "Asisten") {
            return redirect()->route('dashboard');
        }
        $codes = Code::paginate(10);
        return view("code", compact("codes"));
    }

    public function getCode()
    {
        if (Auth::user()->role == "Asisten") {
            return response()->json(['Unauthorized'], 401);
        }
        $code = Str::random(8);
        $insert = Code::create([
            "code" => $code,
            'user_id' => Auth::id(),
        ]);

        if ($insert) {
            return response()->json([$code], 200);
        }

    }
}
