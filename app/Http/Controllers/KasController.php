<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
    $dataKas = Kas::orderBy('tgl_kas', 'desc')->get();
    return view('kas.index', compact('dataKas'));
    }
    public function create()
    {
        return view('kas.create');
    }

}
