<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 通知画面
 */
class NoticeController extends Controller
{
    public function index()
    {
        return view('notice.index');
    }
}
