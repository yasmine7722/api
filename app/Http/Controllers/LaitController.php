<?php

namespace App\Http\Controllers;
use App\Models\Lait;
use Illuminate\Http\Request;

class LaitController extends Controller
{
    public function index($id){
        return Lait::where('id_vache', $id)->get();
    }

    public function add(Request $request){
       

        $lait= Lait::create($request->all());

        return response(['lait'=>$lait,]);
    }

    public function show($id){
        

        $lait= Lait::where('id', $id)->get();

        return response(['lait'=>$lait,]);
    }
    public function delete($id){
        

        $lait= Lait::where('id', $id)->delete();

        return response(['success','lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {
  
        $lait= Lait::where('id', $id)->update($request->all());
  
        return response(['success'=>'lait has updated successfully','lait'=>$lait]);
    }

    public function stat($id){
        $tab[0]=Lait::where(['date'=>date("Y-m-d"),'id_vache'=>$id])->get();
        for($i = 1; $i <= 6; $i++){
            $tab[$i]=Lait::where(['date'=> date("Y-m-d",strtotime("-".$i."day")),'id_vache'=>$id])->get();

        }
        
        return  $tab;
    }

    public function somme($cin){
        $tab= Lait::join('vaches', 'laits.id_vache', '=', 'vaches.id')
        ->where('vaches.cin_user', $cin)
        ->sum('qte');
        
        return  $tab;
    }

}
