<?php

namespace App\Http\Controllers;
use App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function show_client(Request $request)
    {
    	$user = Auth()->user();
    	$client = Client::where('user_id', $user->id)->paginate(20);
    	$all_clients = Client::where('user_id', $user->id)->get();
  
        if ($request->ajax()) {
            return view('presult', compact('client'));
        }
  
        return view('client',compact('client', 'user', 'all_clients'));
    }
    
}
