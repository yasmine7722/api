<?php

namespace App\Http\Controllers;

use App\Models\LaitStocke;
use Illuminate\Http\Request;

class LaitStockeController extends Controller
{
    public function index($id)
    {
        return LaitStocke::where('id_lait', $id)->get();
    }

    public function add(Request $request)
    {


        $laitst = new LaitStocke();
        $laitst->id_lait = $request->id_lait;
        $laitst->date = date("Y-m-d H:i"); //date now
        $laitst->qte = $request->qte;
        $laitst->id_tank = $request->id_tank;


        $laitst->save();


        return response(['laitst' => $laitst,]);
    }

    public function show($id)
    {


        $laitst = LaitStocke::where('id', $id)->get();

        return response(['laitst' => $laitst,]);
    }
    public function delete($id)
    {


        $laitst = LaitStocke::where('id', $id)->delete();

        return response(['success', 'lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {

        $laitst = LaitStocke::where('id', $id)->update($request->all());

        return response(['success' => 'lait has updated successfully', 'laitst' => $laitst]);
    }
}
