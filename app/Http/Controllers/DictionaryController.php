<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DictionaryController extends Controller
{
    public function index()
    {
        return view('admin.datakamus.index', [
            'app' => Application::all(),
            'dictionaries' => Dictionary::latest()->paginate(10),
            'title' => 'Data Kamus'
        ]);
    }

    // users
    public function index_users()
    {
        return view('kamus.index', [
            'app' => Application::first(),
            'dictionaries' => Dictionary::latest()->paginate(10),
            'title' => 'Kamus'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ngoko' => 'required|max:255|string',
            'krama' => 'required|max:255|string',
            'indonesian' => 'required|max:255|string',
            'example' => 'nullable|max:255|string',
            'category' => 'required|in:huruf,angka',
            'audio' => 'mimes:mp3|max:250'
        ]);

        if ($request->file('audio')) {
            $validatedData['audio'] = $request->file('audio')->store('audio');
        }

        Dictionary::create($validatedData);
        return back()->with('addDictionarySuccess', 'Data kamus berhasil ditambah!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'ngokoEdit' => 'max:255|string',
            'kramaEdit' => 'max:255|string',
            'indonesianEdit' => 'max:255|string',
            'exampleEdit' => 'nullable|max:255|string',
            'categoryEdit' => 'required|in:huruf,angka',
            'audioEdit' => 'mimes:mp3|max:250'
        ], [
            'audioEdit.mimes' => 'The audio field must be a file of type: mp3',
            'audioEdit.max' => 'The audio field must not be greater than 250 kilobytes.',
        ]);

        if ($request->file('audioEdit')) {
            $validatedData['audioEdit'] = $request->file('audioEdit')->store('audio');
            $validatedData['audio'] = $validatedData['audioEdit'];
            unset($validatedData['audioEdit']);
        }
        $validatedData['ngoko'] = $validatedData['ngokoEdit'];
        $validatedData['krama'] = $validatedData['kramaEdit'];
        $validatedData['indonesian'] = $validatedData['indonesianEdit'];
        $validatedData['example'] = $validatedData['exampleEdit'];
        $validatedData['category'] = $validatedData['categoryEdit'];
        unset($validatedData['ngokoEdit']);
        unset($validatedData['kramaEdit']);
        unset($validatedData['indonesianEdit']);
        unset($validatedData['exampleEdit']);
        unset($validatedData['categoryEdit']);
        Dictionary::where('id', decrypt($request->codeDictionary))->update($validatedData);
        return back()->with('editDictionarySuccess', 'Data kamus berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        Dictionary::destroy(decrypt($request->codeDictionary));
        return back()->with('deleteDictionarySuccess', 'Data kamus berhasil dihapus!');
    }

    public function search()
    {
        if (request('q') === null) {
            return redirect('/admin/data-kamus');
            exit;
        }

        return view('admin.datakamus.search', [
            'app' => Application::all(),
            'title' => 'Data Kamus',
            'dictionaries' => Dictionary::latest()->searching(request('q'))->paginate(10)
        ]);
    }

    // users search -> implementasi redis sebagai cache
    public function search_users()
    {
        $keyword = request('q');

        if (!$keyword) {
            return redirect('/kamus');
        }

        $cacheKey = 'search_' . $keyword;
        $cacheTime = 86400;

        $dictionaries = Cache::remember($cacheKey, $cacheTime, function () use ($keyword) {
            return Dictionary::latest()->searching2($keyword)->paginate(10);
        });

        return view('kamus.search', [
            'app' => Application::first(),
            'title' => 'Kamus',
            'dictionaries' => $dictionaries
        ]);
    }
}
