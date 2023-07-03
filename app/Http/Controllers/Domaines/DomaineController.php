<?php

namespace App\Http\Controllers\Domaines;

use App\Models\Domaine;
use App\Models\Theme;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\StoreDomaines;
use App\Http\Controllers\Controller;

class DomaineController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Domaines = Domaine::all();
    return view('pages.Domaines.Domaines', compact('Domaines'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  { }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreDomaines $request)
  {

    // if (Domaine::where('Name',$request->Name)->exists())  {
    //   return redirect()->back()->withErrors("Le nom deja existe");
    // }

    try {
      $validated = $request->validated();
      $Domaine = new Domaine();
      $Domaine->Name = $request->Name;
      $Domaine->Responsable = $request->Responsable;
      $Domaine->save();
      toastr()->success('Les données ont été sauvegardées!');
      return redirect()->route('Domaines.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    };
  }

 
  public function show($id)
  { }


  public function edit($id)
  { }


  public function update(StoreDomaines $request)
  { 
    try{
      $validated = $request->validated();
      $Domaines = Domaine::findOrFail($request->id);
      $Domaines->update([
        $Domaines->Name = $request->Name,
        $Domaines->Responsable = $request->Responsable,
      ]);
      toastr()->success('Les données ont été modifiées!');
      return redirect()->route('Domaines.index');
    }
    catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  public function destroy(Request $request)
  { 

    $MyClass_id = Theme::where('Domaine_id',$request->id)->pluck('Domaine_id');

    if($MyClass_id->count() == 0) {
      $Domaines = Domaine::findOrFail($request->id)->delete();
      toastr()->success('Les données ont été supprimées!');
      return redirect()->route('Domaines.index');
    }
    else  {
      toastr()->error("Impossible de supprimer le niveau, il existe des themes qui appartiennent au niveau");
      return redirect()->route('Domaines.index');
    }

    
  }
}
