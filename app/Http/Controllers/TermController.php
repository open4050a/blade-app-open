<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 通知画面
 */
class TermController extends Controller
{
    public function index()
    {
        return view('term.index');
    }
}
