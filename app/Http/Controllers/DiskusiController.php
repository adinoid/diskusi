<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{

    public function index()
    {
        return view('diskusi.index', [
            'diskusis' => Diskusi::with('user')->latest()->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->diskusi()->create($validated);
 
        return redirect(route('diskusi.index'));
    }

    public function show(Diskusi $diskusi)
    {
        //
    }


    public function edit(Diskusi $diskusi)
    {
        $this->authorize('update', $diskusi);
 
        return view('diskusi.edit', [
            'diskusi' => $diskusi,
        ]);
    }


    public function update(Request $request, Diskusi $diskusi)
    {
        $this->authorize('update', $diskusi);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $diskusi->update($validated);
 
        return redirect(route('diskusi.index'));
    }

    public function destroy(Diskusi $diskusi)
    {
        $this->authorize('delete', $diskusi);
 
        $diskusi->delete();
 
        return redirect(route('diskusi.index'));
    }
}
