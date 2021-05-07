<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('master.user');
    }
    public function list(Request $request)
    {
        $data = user::select('id', 'name', 'email')->get();
        $tabel['draw']                 = '1';
        $tabel['recordsTotal']         =  count($data);
        $tabel['recordsFiltered']  =  count($data);
        $tabel['data']                 = $data;
        return json_encode($tabel);
    }
}
