<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vache;

class VacheController extends Controller
{
    public function index($cin)
    {
        return Vache::where('cin_user', $cin)->get();
    }

    public function add(Request $request)
    {

        $request->validate([
            'date_naissance' => 'required',

        ]);
        try {


            // handle error
            $vache = new Vache();
            $vache->name = $request->name;
            $vache->date_naissance = $request->date_naissance;
            $vache->cin_user = $request->cin_user;
            $vache->poids = $request->poids + 0.0;
            $vache->date_chaleur = $request->date_chaleur;
            $vache->save();

            return response()->json([
                'success' => true,
                'message' => 'Vache created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
        // $vache = new Vache();
        // $vache->date_naissance = $request->date_naissance;
        // $vache->cin_user = $request->cin_user;
        // $vache->poids = $request->poids;
        // $vache->date_chaleur = $request->date_chaleur;
        // $vache->save();

        // return response()->json([
        //     'message' => 'Vache ajoutée avec succès',
        //     'vache' => $vache,
        // ], 201);
        // $vache = Vache::create($request->all());

        // return response(['vache' => $vache,]);
    }

    public function show($id)
    {


        $vache = Vache::where('id', $id)->get();

        if ($vache->count() > 0) {
            return response($vache[0]);
        } else {
            return response(['message' => 'Vache not found',]);
        }

        // return response($vache);
    }
    public function delete($id)
    {


        $vache = Vache::where('id', $id)->delete();

        return response(['success', 'Vache deleted successfully',]);
    }

    public function update(Request $request, $id)
    {

        $vache = Vache::where('id', $id)->update($request->all());

        return response(['success' => 'Vache has updated successfully', 'vache' => $vache]);
    }
}
