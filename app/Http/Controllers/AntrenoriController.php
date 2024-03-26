<?php

namespace App\Http\Controllers;

use App\Models\Antrenor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class AntrenoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $antrenors = DB::table('antrenors')->paginate(10);;
        return view('ShowAntrenor', ['antrenors' => $antrenors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddAntrenor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $antrenor = new Antrenor;
        $antrenor->Nume = $request->input('Nume');
        $antrenor->Prenume = $request->input('Prenume');
        $antrenor->Certificare = $request->input('Certificare');
        $antrenor->Club = $request->input('Club');
        $antrenor->Varsta = $request->input('Varsta');
        $antrenor->Imagine = $request->file('Imagine')->getClientOriginalName(); 
    
        $antrenor->save();
    
        return redirect('antrenor');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ShowAntrenor');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $antrenors = DB::table('antrenors')->select('*')->where('id', '=', $id)->get();
        return view('EditAntrenor', ['antrenors' => $antrenors]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $antrenor = Antrenor::find($id);
         if (!$antrenor) {
             return redirect('antrenor');
         }
     
         $antrenor->Nume = $request->input('Nume');
         $antrenor->Prenume = $request->input('Prenume');
         $antrenor->Certificare = $request->input('Certificare');
         $antrenor->Club = $request->input('Club');
         $antrenor->Varsta = $request->input('Varsta');
        
         if ($request->hasFile('Imagine')) { 
             $fileName = $request->file('Imagine')->getClientOriginalName();
             $request->file('Imagine')->storeAs('images', $fileName, 'public');
             $antrenor->Imagine = $fileName;
         }
     
         $antrenor->save();
     
         return redirect('antrenor');
     }
     

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('antrenors')->where('id', '=', $id)->delete();
        return redirect('antrenor');
    }

    public function sort(Request $request)
    {
        $criteria = $request->input('criteria');
    
        $antrenorsQuery = Antrenor::query();
    
        if ($criteria == 'nume') {
            $antrenorsQuery->orderBy('Nume');
        } else if ($criteria == 'varsta') {
            $antrenorsQuery->orderBy('Varsta');
        } 
    
        $antrenors = $antrenorsQuery->paginate(10);
    
        return view('ShowAntrenor', ['antrenors' => $antrenors]);
    }
    
    
    public function groupByCertificare()
    {
        $antrenoriByCertificare = DB::table('antrenors')->select('Certificare', 'Nume', 'Prenume')->orderBy('Certificare')->orderBy('Nume')->get();
    
        $groupedAntrenori = [];
        foreach ($antrenoriByCertificare as $antrenor) {
            $groupedAntrenori[$antrenor->Certificare][] = $antrenor->Nume . " " .  $antrenor->Prenume;
        }
    
        return view('groupByCertificare', compact('groupedAntrenori'));
    }
    

}
