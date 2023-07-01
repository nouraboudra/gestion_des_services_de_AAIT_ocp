<?php

namespace App\Http\Controllers\admin;


use App\Models\Batiment;
use App\Models\Salle;

use App\Models\TypesSalle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


class SalleController extends Controller
{

    public function index()
    {
        //$salles = Salle::all();
        $salles = Salle::with('batiment', 'typessalles')->get();
        return view('content.Admin.Admin-showsalles', compact('salles'));
    }

    public function create()
    {

        $batiments = Batiment::pluck('nom', 'id');
        $typesalles = TypesSalle::pluck('nom', 'id');
        return view('content.Admin.Admin-addsalles', compact('batiments', 'typesalles'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:salles',
            'intitule' => 'required|string|max:255',
            'batiment' => 'required',
            'typesalle' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // Loop over the error messages and display a toast for each error
            foreach ($errors->all() as $error) {
                // Show a toast error message
                toastr()->error($error);
            }

            return redirect()->back();
        }
        $salle = new Salle();
        $salle->code = $request->input('code');
        $salle->intitule = $request->input('intitule');

        // Check if 'Autre' is selected for 'batiment' field
        if ($request->input('batiment') === 'Autre') {
            // Create a new batiment and assign its ID to the salle
            $batiment = Batiment::create(['nom' => $request->input('autre_batiment')]);
            $salle->batiment_id = $batiment->id;
        } else {
            // Use the selected batiment value
            $salle->batiment_id = $request->input('batiment');
        }

        // Check if 'Autre' is selected for 'typesalle' field
        if ($request->input('typesalle') === 'Autre') {
            // Create a new typesalle and assign its ID to the salle
            $typesalle = TypesSalle::create(['nom' => $request->input('autre_type_salle')]);
            $salle->typesalle_id = $typesalle->id;
        } else {
            // Use the selected typesalle value
            $salle->typesalle_id = $request->input('typesalle');
        }

        $salle->save();
        toastr()->success("Salle créée avec succès");

        return redirect()->route("admin.salles.index");
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        $batiments = Batiment::pluck('nom', 'id');
        $typesalles = TypesSalle::pluck('nom', 'id');
        return view('content.Admin.Admin-editsalles', compact('salle', 'batiments', 'typesalles'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:salles,code,' . $id,
            'intitule' => 'required|string|max:255',
            'batiment' => 'required',
            'typesalle' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // Loop over the error messages and display a toast for each error
            foreach ($errors->all() as $error) {
                // Show a toast error message
                toastr()->error($error);
            }

            return redirect()->back();
        }

        $salle = Salle::findOrFail($id);
        $salle->code = $request->input('code');
        $salle->intitule = $request->input('intitule');
        $salle->batiment_id = $request->input('batiment');
        $salle->typesalle_id = $request->input('typesalle');
        $salle->save();

        toastr()->success("Salle modifiée avec succès");

        return redirect()->route("admin.salles.index");
    }

    public function destroy($id)
    {
        $salle = Salle::findOrFail($id);
        $salle->delete();

        toastr()->success("Salle supprimée avec succès");

        return redirect()->route("admin.salles.index");
    }
}
