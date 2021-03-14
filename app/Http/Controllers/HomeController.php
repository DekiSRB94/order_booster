<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = Client::all();

        return view('index', compact('client'));
    }

    public function mySearch(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Client::where('phone', 'like', '%'.$query.'%')
         ->get();       
      }
      else
      {
       $data = Client::orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr class="output" vlatko="1">
         <td>'.$row->address.'</td>
         <td>'.$row->phone.'</td>
         <td>'.$row->flat_number.'</td>
         <td>'.$row->floor.'</td>
         <td>'.$row->intercom.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output .= '
       <tr class="output" vlatko="2">
         <td>
         <input id="address" name="address" autocomplete="off">
         </td>
         <td>
         <input id="phone"  name="phone" autocomplete="off">
         </td>
         <td>
         <input id="flat_number" name="flat_number" autocomplete="off">
         </td>
         <td>
         <input id="floor" name="floor" autocomplete="off">
         </td>
         <td>
         <input id="intercom" name="intercom" autocomplete="off">
         </td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
 
      echo json_encode($data);
     }
    }

    public function postClient(Request $request)
    {
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['flat_number'] = $request->flat_number;
        $data['floor'] = $request->floor;
        $data['intercom'] = $request->intercom;

        $client = Client::create($data); 
        return redirect('/');  
    }



}
