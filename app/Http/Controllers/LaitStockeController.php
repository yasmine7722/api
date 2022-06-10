<?php

namespace App\Http\Controllers;
use App\Models\LaitStocke;
use Illuminate\Http\Request;

class LaitStockeController extends Controller
{
    public function index($id){
        return LaitStocke::where('id_lait', $id)->get();
    }

    public function add(Request $request){
       

        $laitst= LaitStocke::create($request->all());

        return response(['laitst'=>$laitst,]);
    }

    public function show($id){
        

        $laitst= LaitStocke::where('id', $id)->get();

        return response(['laitst'=>$laitst,]);
    }
    public function delete($id){
        

        $laitst= LaitStocke::where('id', $id)->delete();

        return response(['success','lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {
  
        $laitst= LaitStocke::where('id', $id)->update($request->all());
  
        return response(['success'=>'lait has updated successfully','laitst'=>$laitst]);
    }
}
