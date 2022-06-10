<?php

namespace App\Http\Controllers;
use App\Models\Tank;
use Illuminate\Http\Request;

class TankController extends Controller
{
    public function index($cin){
        return Tank::where('cin', $cin)->get();
    }

    public function add(Request $request){
       

        $tank= Tank::create($request->all());

        return response(['tank'=>$tank,]);
    }

    public function show($id){
        

        $tank= Tank::where('id', $id)->get();

        return response(['tank'=>$tank,]);
    }
    public function delete($id){
        

        $tank= Tank::where('id', $id)->delete();

        return response(['success','tank deleted successfully',]);
    }

    public function update(Request $request, $id)
    {
  
        $tank= Tank::where('id', $id)->update($request->all());
  
        return response(['success'=>'tank has updated successfully','tank'=>$tank]);
    }
}
