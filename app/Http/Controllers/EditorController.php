<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editors.index', [
            'editors' => Editor::with('books')->orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        $logoPath = $request->logo->store('logos');

        Editor::create([
            'name' => $attributes['name'],
            'logo' => $logoPath,
        ]);

        return redirect('/editors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Editor $editor)
    {
        return view('editors.show', [
            'editor' => $editor->load('books')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editor $editor)
    {
        return view('editors.edit', [
            'editor' => $editor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editor $editor)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        // Check if a new cover image has been uploaded
        if ($request->hasFile('logo')) {
            $logoPath = $request->logo->store('logos');
        } else {
            $logoPath = $editor->logo;
        }

        $editor->update([
            'name' => $attributes['name'],
            'logo' => $logoPath,
        ]);
        return redirect('/editors/' . $editor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editor $editor)
    {
        $editor->delete();
        return redirect('/editors');
    }
}
