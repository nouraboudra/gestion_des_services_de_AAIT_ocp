<?php

namespace App\Http\Controllers\planification;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Facades\Validator;
use Toastr;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Display a listing of the themes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        $domaines = Domain::all();
        return view('content.planification.themes', [
            'themes' => $themes,
            'domaines' => $domaines
        ]);
    }

    /**
     * Store a newly created theme in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'domain_id' => 'required|integer|exists:domains,id', // make sure the domain exists in the domains table
        ];
        $customMessages = [
            'nom.required' => 'Le nom du thème est requis.',
            'nom.string' => 'Le nom du thème doit être une chaîne de caractères.',
            'nom.max' => 'Le nom du thème ne doit pas dépasser 255 caractères.',
            'domain_id.required' => 'L\'identifiant du domaine est requis.',
            'domain_id.integer' => 'L\'identifiant du domaine doit être un entier.',
            'domain_id.exists' => 'Le domaine sélectionné n\'existe pas.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                toastr()->error($message);
            }
            return redirect()->route('school.themes.create');
        }

        Theme::create([
            'nom' => $request->input('nom'),
            'domain_id' => $request->input('domain_id'),
        ]);

        toastr()->success('Thème ajouté avec succès');
        return redirect()->route('school.themes.index');
    }

    /**
     * Remove the specified theme from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            Toastr::error('Theme not found.', 'Error');
            return redirect()->back();
        }

        $theme->delete();

        Toastr::success('Theme deleted successfully.', 'Success');
        return redirect()->back();
    }
}