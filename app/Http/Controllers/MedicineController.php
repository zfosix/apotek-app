<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    public function index()
    {
        //
        $medicines = Medicine::all();
        return view('medicine.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric',
        ]);

        medicine::create([
            'name'=> $request->name,
            'type'=> $request->type,
            'price'=> $request->price,
            'stock'=> $request->stock,
        ]);

        return redirect()->back()->with('success', 'berhasil menambahkan');
    }

    public function show(Medicine $medicine)
    {

    }

    // public function edit(Medicine $medicine)
    // {

    // }

    // public function update(Request $request, Medicine $medicine)
    // {

    // }

    // public function destroy(Medicine $medicine)
    // {

    // }

    public function edit($id)
    {
        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',
        ]);

        medicine::where('id', $id)->update([
            'name'=> $request->name,
            'type'=> $request->type,
            'price'=> $request->price,
        ]);

        return redirect()->route('medicine.home')->with('success', 'berhasil mengubah data!');
    }
    
    public function delete($id)
    {
        Medicine::where('id', $id)->delete();
        
        return redirect()->back()->with('deleted', 'berhasil menghapus data!');
    }
    public function stock()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->get();
        
        return view('medicine.stock', compact('medicines'));
    }

    public function stockEdit($id){
        $medicine = Medicine::find($id);
        return response()->json($medicine);
    }

    public function stockUpdate(Request $request, $id) {
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        
        $medicine = Medicine::find($id);
        
        if ($request->stock <= $medicine['stock']) {
            return response()->json(["message" => "stock yang diinput tidak boleh kurang"], 400);
        } else {
            $medicine->update(["stock" => $request->stock]);
            return response()->json("berhasil", 200);
        }
    }
}