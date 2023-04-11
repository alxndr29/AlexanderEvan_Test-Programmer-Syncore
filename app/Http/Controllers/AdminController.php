<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Biodata;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 'kandidat')->get();
        return view('admin.user', compact('user'));
    }
    public function search($id)
    {
        try {
            $user = User::find($id)->first();
            $biodata = Biodata::where('users_id', $id)->count();
            return view('admin.detail_biodata', compact('user'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
