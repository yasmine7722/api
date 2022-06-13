<?php

namespace App\Http\Controllers;
use App\Models\LaitVendu;
use Illuminate\Http\Request;

class LaitVenduController extends Controller
{
    public function index($cin){
        return LaitVendu::where('cin_vend', $cin)->get();
    }

    public function add(Request $request){
       

        $laitVendu= LaitVendu::create($request->all());

        return response(['laitst'=>$laitst,]);
    }

    public function show($id){
        

        $laitVendu= LaitVendu::where('id', $id)->get();

        return response(['laitVendu'=>$laitVendu,]);
    }
    public function delete($id){
        

        $laitVendu= LaitVendu::where('id', $id)->delete();

        return response(['success','lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {
  
        $laitVendu= LaitVendu::where('id', $id)->update($request->all());
  
        return response(['success'=>'lait has updated successfully','laitVendu'=>$laitVendu]);
    }
}
