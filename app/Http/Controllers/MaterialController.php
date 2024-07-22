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
        // Ambil level pengguna
        $userLevel = auth()->user()->level;

        // Jika pengguna memiliki level yang valid, hanya tampilkan materi untuk level tersebut
        if ($userLevel && $userLevel != 'Masyarakat Umum') {
            $materials = Material::where('status', 'Aktif')
                ->where('level', $userLevel)
                ->latest()
                ->paginate(10);
        } else {
            // Jika pengguna tidak memiliki level, tampilkan materi 'Masyarakat Umum'
            $materials = Material::where('status', 'Aktif')
                ->where('level', 'Masyarakat Umum')
                ->latest()
                ->paginate(10);
        }

        return view('users.materi.index', [
            'app' => Application::all(),
            'materials' => $materials,
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

        // Ambil level pengguna
        $userLevel = auth()->user()->level;

        // Jika pengguna memiliki level yang valid, hanya tampilkan materi untuk level tersebut
        if ($userLevel && $userLevel != 'Masyarakat Umum') {
            $materials = Material::where('status', 'Aktif')
                ->where('level', $userLevel)
                ->latest()
                ->searching2(request('q'))
                ->paginate(10);
        } else {
            // Jika pengguna tidak memiliki level, tampilkan materi 'Masyarakat Umum'
            $materials = Material::where('status', 'Aktif')
                ->where('level', 'Masyarakat Umum')
                ->latest()
                ->searching2(request('q'))
                ->paginate(10);
        }

        return view('users.materi.search', [
            'app' => Application::all(),
            'title' => 'Data Materi',
            'materials' => $materials
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'document' => 'required|mimes:pdf,doc,docx|max:20000',
            'level' => 'required|in:SD,SMP,SMA,Masyarakat Umum'
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
            'descriptionEdit' => 'required|max:255|string',
            'documentEdit' => 'mimes:pdf,doc,docx|max:20000',
            'levelEdit' => 'in:SD,SMP,SMA,Masyarakat Umum',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
            'titleEdit.required' => 'The title field is required.',
            'titleEdit.max' => 'The title field must not be greater than 255 characters.',
            'descriptionEdit.required' => 'The description field is required.',
            'descriptionEdit.max' => 'The description field must not be greater than 255 characters.',
            'documentEdit.max' => 'The document field must not be greater than 20000 kilobytes.',
            'documentEdit.mimes' => 'The document field must be a file of type: pdf,doc,docx',
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
        $validatedData['level'] = $validatedData['levelEdit'];
        unset($validatedData['titleEdit']);
        unset($validatedData['descriptionEdit']);
        unset($validatedData['documentEdit']);
        unset($validatedData['levelEdit']);

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
