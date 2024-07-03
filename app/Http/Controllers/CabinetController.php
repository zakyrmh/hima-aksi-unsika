<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabinets = Cabinet::all();
        $cabinets->each(function ($cabinet) {
            $cabinet->status_text = $cabinet->status == 1 ? 'Active' : 'Inactive';
        });
        return view('dashboard.pages.cabinet.index', [
            'title' => 'Cabinets',
            'cabinets' => $cabinets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.cabinet.create', [
            'title' => 'Cabinets',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'period' => 'required|string',
            'status' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'background' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);

        // Mengonversi status
        $status = $request->has('status') && $request->input('status') === 'on' ? '1' : '0';

        // Menyimpan image
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('assets/images'), $logoName);
            $logoPath = 'assets/images/' . $logoName;
        }

        $backgroundPath = null;
        if ($request->hasFile('background')) {
            $background = $request->file('background');
            $backgroundName = time() . '_' . $background->getClientOriginalName();
            $background->move(public_path('assets/images'), $backgroundName);
            $backgroundPath = 'assets/images/' . $backgroundName;
        }

        // Simpan cabinet
        Cabinet::create([
            'title' => $request->title,
            'description' => $request->description,
            'period' => $request->period,
            'status' => $status,
            'logo' => $logoPath,
            'background' => $backgroundPath,
        ]);

        // Redirect atau respons sesuai kebutuhan aplikasi
        return redirect()->route('cabinets.index')->with('success', 'New cabinet created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabinet $cabinet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabinet $cabinet)
    {
        return view('dashboard.pages.cabinet.edit', [
            'title' => 'Cabinets',
            'cabinet' => $cabinet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabinet $cabinet)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'period' => 'required|string',
            'status' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'background' => 'image|mimes:jpeg,png,jpg|max:5048',
        ]);

        // Mengonversi status
        $status = $request->has('status') && $request->input('status') === 'on' ? '1' : '0';

        $logoPath = $cabinet->logo;

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($logoPath) {
                if (file_exists(public_path($logoPath))) {
                    unlink(public_path($logoPath));
                }
            }

            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('assets/images'), $logoName);
            $logoPath = 'assets/images/' . $logoName;
        }

        $backgroundPath = $cabinet->background;

        if ($request->hasFile('background')) {
            // Delete old background if exists
            if ($backgroundPath) {
                if (file_exists(public_path($backgroundPath))) {
                    unlink(public_path($backgroundPath));
                }
            }

            $background = $request->file('background');
            $backgroundName = time() . '_' . $background->getClientOriginalName();
            $background->move(public_path('assets/images'), $backgroundName);
            $backgroundPath = 'assets/images/' . $backgroundName;
        }

        $cabinet->update([
            'title' => $request->title,
            'description' => $request->description,
            'period' => $request->period,
            'status' => $status,
            'logo' => $logoPath,
            'background' => $backgroundPath,
        ]);

        // Redirect atau respons sesuai kebutuhan aplikasi
        return redirect()->route('cabinets.index')->with('success', 'Cabinet successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabinet $cabinet)
    {
        // Hapus foto jika ada
        if ($cabinet->logo) {
            $filePath = public_path($cabinet->logo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($cabinet->background) {
            $filePath = public_path($cabinet->background);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // Hapus cabinet dari database
        $cabinet->delete();

        return redirect()->route('cabinets.index')->with('success', 'Cabinets deleted successfully');
    }
}