<?php

namespace App\Http\Controllers;

use App\Models\Lait;
use Illuminate\Http\Request;

class LaitController extends Controller
{

    public function index(Request $request)
    {
        $lait = Lait::all();
        return response()->json($lait);
    }

    public function byVache($id)
    {
        return Lait::where('id_vache', $id)->get();
    }

    public function add(Request $request)
    {

        $lait = new Lait();
        $lait->id_vache = $request->id_vache;
        $lait->date =   date("Y-m-d H:i"); //date now
        $lait->qte = $request->qte;
        $lait->ph = $request->ph;
        $lait->densite = $request->densite;
        $lait->matiere_grasse = $request->matiere_grasse;

        $lait->save();

        // $lait = Lait::create($request->all());

        return response(['lait' => $lait,]);
    }

    public function show($id)
    {


        $lait = Lait::where('id', $id)->get();

        return response(['lait' => $lait,]);
    }
    public function delete($id)
    {


        $lait = Lait::where('id', $id)->delete();

        return response(['success', 'lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {

        $lait = Lait::where('id', $id)->update($request->all());

        return response(['success' => 'lait has updated successfully', 'lait' => $lait]);
    }
}
