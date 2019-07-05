<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    //
    public function index()
    {
        return view('BankViews.Bank');
    }
    public function bankDetail()
    {
        return view('BankViews.BankDetails');
    }
}
