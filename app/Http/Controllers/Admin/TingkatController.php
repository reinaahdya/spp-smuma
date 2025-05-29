<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tingkat;
use Illuminate\Http\Request;

class TingkatController extends Controller
{
    public function index() {
        $tingkats = Tingkat::all();
        return view('admin.tingkat.index', [
            'tingkats' => $tingkats,
            'title' => 'Tingkat',
        ]);
    }

    public function create() {
        return view('admin.tingkat.index', [
            'title' => 'Tambah Tingkat',
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'tingkat' => 'required|string|max:255',
        ]);

        Tingkat::create($request->all());

        return redirect()->route('admin.tingkat.index')->with('success', 'Tingkat berhasil ditambahkan.');
    }
    public function edit($id) {
        $tingkat = Tingkat::findOrFail($id);
        return view('admin.tingkat.edit', [
            'tingkat' => $tingkat,
            'title' => 'Edit Tingkat',
        ]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'tingkat' => 'required|string|max:255',
        ]);

        $tingkat = Tingkat::findOrFail($id);

        $tingkat->update($request->all());

        return redirect()->route('admin.tingkat.index')->with('success', 'Tingkat berhasil diperbarui.');
    }
    public function destroy($id) {
        $tingkat = Tingkat::findOrFail($id);
        $tingkat->delete();
        return redirect()->route('admin.tingkat.index')->with('success', 'Tingkat berhasil dihapus.');
    }
}
