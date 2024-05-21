<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('admin.datamateri.index', [
            'app' => Application::all(),
            'materials' => Material::latest()->paginate(10),
            'title' => 'Data Materi'
        ]);
    }

    // users show
    public function show()
    {
        return view('users.materi.index', [
            'app' => Application::all(),
            'materials' => Material::where('status', 'Aktif')->latest()->paginate(10),
            'title' => 'Materi'
        ]);
    }

    // users search
    public function search_users()
    {
        if (request('q') === null) {
            return redirect('/materi');
            exit;
        }

        return view('users.materi.search', [
            'app' => Application::all(),
            'title' => 'Data Materi',
            'materials' => Material::latest()->searching2(request('q'))->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|min:100|string',
            'document' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5000',
        ]);

        $validatedData['status'] = "Nonaktif";

        if ($request->file('document')) {
            $file = $request->file('document');
            $originalFileName = $file->getClientOriginalName();
            $validatedData['document'] = $file->storeAs('documents', $originalFileName);
        }

        Material::create($validatedData);
        return back()->with('addMateriSuccess', 'Data materi berhasil ditambah!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'titleEdit' => 'required|max:255|string',
            'descriptionEdit' => 'required|max:255|min:100|string',
            'documentEdit' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5000',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
            'titleEdit.required' => 'The title field is required.',
            'titleEdit.max' => 'The title field must not be greater than 255 characters.',
            'descriptionEdit.required' => 'The description field is required.',
            'descriptionEdit.max' => 'The description field must not be greater than 255 characters.',
            'documentEdit.max' => 'The document field must not be greater than 5000 kilobytes.',
            'documentEdit.mimes' => 'The document field must be a file of type: pdf,doc,docx,xls,xlsx,ppt,pptx',
        ]);

        if ($request->file('documentEdit')) {
            $file = $request->file('documentEdit');
            $originalFileName = $file->getClientOriginalName();
            // Simpan file dengan nama asli
            $documentPath = $file->storeAs('documents', $originalFileName);
            // Update nama file dokument di data yang akan diupdate
            $validatedData['document'] = $documentPath;
        }

        $validatedData['title'] = $validatedData['titleEdit'];
        $validatedData['description'] = $validatedData['descriptionEdit'];
        unset($validatedData['titleEdit']);
        unset($validatedData['descriptionEdit']);
        unset($validatedData['documentEdit']);
        Material::where('id', decrypt($request->codeMateri))->update($validatedData);
        return back()->with('editMateriSuccess', 'Data materi berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        Material::destroy(decrypt($request->codeMateri));
        return back()->with('deleteMateriSuccess', 'Data materi berhasil dihapus!');
    }

    public function search()
    {
        if (request('q') === null) {
            return redirect('/admin/data-materi');
            exit;
        }

        return view('admin.datamateri.search', [
            'app' => Application::all(),
            'title' => 'Data Materi',
            'materials' => Material::latest()->searching(request('q'))->paginate(10)
        ]);
    }
}
