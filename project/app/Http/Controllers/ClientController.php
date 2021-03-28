<?php

namespace App\Http\Controllers;
use App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function show_client(Request $request)
    {
    	$client = Client::paginate(1);
  
        if ($request->ajax()) {
            return view('ajaxPagination', compact('client'));
        }
  
        return view('client',compact('client'));
    }
    
}
