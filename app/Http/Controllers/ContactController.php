<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 問い合わせ画面
 */
class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
}
