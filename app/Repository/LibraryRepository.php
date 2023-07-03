<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Domaine;
use App\Models\Library;
use App\Models\Theme;

class LibraryRepository implements LibraryRepositoryInterface
{

    use AttachFilesTrait;

    public function index()
    {
        $books = Library::all();
        return view('pages.library.index',compact('books'));
    }

    public function create()
    {
        $Themes = Theme::all();
        $Domaine = Domaine::with(['Themes'])->get();
        $Domaines = Domaine::all();
        return view('pages.library.create',compact('Domaines'));
    }

    public function store($request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->Domaine_id = $request->Domaine_id;
            $books->Theme_id = $request->Theme_id;
            $books->save();
            $this->uploadFile($request,'file_name');

            toastr()->success(trans('messages.success'));
            return redirect()->route('library.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $Domaines = Domaine::all();
        $book = library::findorFail($id);
        return view('pages.library.edit',compact('book','Domaines'));
    }

    public function update($request)
    {
        try {

            $book = library::findorFail($request->id);
            $book->title = $request->title;

            if($request->hasfile('file_name')){

                $this->deleteFile($book->file_name);

                $this->uploadFile($request,'file_name');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->Domaine_id = $request->Domaine_id;
            $book->Theme_id = $request->Theme_id;
            //$book->section_id = $request->section_id;
            //$book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name);
        library::destroy($request->id);
        toastr()->error('Le document a été supprimé');
        return redirect()->route('library.index');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }

    public function getclasses($id)
    {
        $list_classes = Theme::where("Domaine_id", $id)->pluck("Name_Theme", "id");

        return $list_classes;
    }
}
