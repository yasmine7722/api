<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vache;
class VacheController extends Controller
{
    public function index($cin){
        return Vache::where('cin_user', $cin)->get();
    }

    public function add(Request $request){
        $request->validate([
            'date_naissance' => 'required',
        ]);

        $vache= Vache::create($request->all());

        return response(['vache'=>$vache,]);
    }

    public function show($id){
        

        $vache= Vache::where('id', $id)->get();

        return response(['vache'=>$vache,]);
    }
    public function delete($id){
        

        $vache= Vache::where('id', $id)->delete();

        return response(['success','Vache deleted successfully',]);
    }

    public function update(Request $request, $id)
    {
  
        $vache= Vache::where('id', $id)->update($request->all());
  
        return response(['success'=>'Vache has updated successfully','vache'=>$vache]);
    }

}
