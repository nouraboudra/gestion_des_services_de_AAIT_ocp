<?php

namespace App\Http\Controllers\Planification;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('content.planification.domains', compact('domains'));
    }
    public function store(Request $request)
    {
        $messages = [
            'nom.required' => 'Le nom du domaine est nécessaire.',
        ];

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
        ], $messages);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error, 'Erreur');
            }
            return back()->withInput();
        }
        try {
            Domain::create($request->all());
            toastr()->success('Domaine créé avec succès', 'Succès');
        } catch (\Exception $e) {
            toastr()->error('Une erreur est survenue. Veuillez réessayer.', 'Erreur');
            return back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('school.domaines.index');
    }
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();
        toastr()->success('Domaine supprimé avec succès', 'Succès');
        return redirect()->route('school.domaines.index');
    }
}