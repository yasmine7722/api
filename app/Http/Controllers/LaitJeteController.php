<?php

namespace App\Http\Controllers;

use App\Models\LaitJete;
use Illuminate\Http\Request;

class LaitJeteController extends Controller
{
    public function index($id)
    {
        return LaitJete::where('id_lait', $id)->get();
    }

    public function add(Request $request)
    {


        $lait = LaitJete::create($request->all());

        return response(['lait' => $lait,]);
    }

    public function show($id)
    {


        $lait = LaitJete::where('id', $id)->get();

        return response(['lait' => $lait,]);
    }
    public function delete($id)
    {


        $lait = LaitJete::where('id', $id)->delete();

        return response(['success', 'lait deleted successfully',]);
    }

    public function update(Request $request, $id)
    {

        $lait = LaitJete::where('id', $id)->update($request->all());

        return response(['success' => 'lait has updated successfully', 'lait' => $lait]);
    }
}
