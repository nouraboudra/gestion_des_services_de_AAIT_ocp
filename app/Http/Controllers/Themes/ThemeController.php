<?php 

namespace App\Http\Controllers\Themes;

use App\Models\Domaine;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTheme;
use App\Models\Domain;

class ThemeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $Themes = Theme::all();
    $Domaines = Domain::all();
    return view('pages.Themes.Themes',compact('Themes','Domaines'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreTheme $request)
  {
    

    try{

      $validated = $request->validated();
      $List_Themes = $request->List_Themes;

      foreach($List_Themes as $List_Theme) {
        $Themes = new Theme();
        $Themes->Name_Theme = $List_Theme['Name'];
        $Themes->Description_Theme = $List_Theme['Description'];
        $Themes->Domaine_id = $List_Theme['Domaine_id'];

        $Themes->save();
      }

      toastr()->success('Les données ont été sauvegardées!');
      return redirect()->route('Themes.index');

    }
    catch(\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    try{
      $Themes = Theme::findOrFail($request->id);
      $Themes->update([
        $Themes->Name_Theme = $request->Name,
        $Themes->Description_Themes = $request->Description,
        $Themes->Domaine_id = $request->Domaine_id,
      ]);
      toastr()->success("Les données ont été modifiées!");
      return redirect()->route('Themes.index');
    }

    catch(\Exception $e)  {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $Themes = Theme::findOrFail($request->id)->delete();
    toastr()->success("Les donées ont été supprimées");
    return redirect()->route("Themes.index");
  }

  public function delete_all(Request $request)  {
    $delete_all_id = explode(",", $request->delete_all_id);
    Theme::whereIn('id', $delete_all_id)->Delete();
    toastr()->success("Les donées ont été supprimées");
    return redirect()->route("Themes.index");
  }
  
}

?>
