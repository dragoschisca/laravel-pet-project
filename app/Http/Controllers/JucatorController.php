<?php

namespace App\Http\Controllers;

use App\Models\Jucator;
use Illuminate\Http\Request;
use DB;

class JucatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jucators = DB::table('jucators')->paginate(10);
        $clubs = DB::table('clubs')->get();
        return view('ShowJucator', ['jucators' => $jucators, 'clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $clubs = DB::table('clubs')->get();
        return view('AddJucator', ['clubs' => $clubs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Jucator = new Jucator;
        $Jucator->Nume = $request->Nume;
        $Jucator->Prenume = $request->Prenume;
        $Jucator->Club = $request->Club;
        $Jucator->Pozitia = $request->Pozitia;
        $Jucator->Varsta = $request->Varsta;
        $Jucator->Imagine = $request->file('Imagine')->getClientOriginalName(); 
        $Jucator->save();
        return redirect('jucator');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jucator $jucator)
    {
        return view('ShowJucator');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $clubs = DB::table('clubs')->get();
        $jucators = DB::table('jucators')->select('*')->where('id', '=', $id)->get();
        return view('EditJucator', ['jucators' => $jucators, 'clubs' => $clubs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jucator = Jucator::find($id);
        if (!$jucator) {
            return redirect('jucator');
        }
    
        $jucator->Nume = $request->input('Nume');
        $jucator->Prenume = $request->input('Prenume');
        $jucator->Pozitia = $request->input('Pozitia');
        $jucator->Club = $request->input('Club');
        $jucator->Varsta = $request->input('Varsta');
       
        if ($request->hasFile('Imagine')) { 
            $fileName = $request->file('Imagine')->getClientOriginalName();
            $request->file('Imagine')->storeAs('images', $fileName, 'public');
            $jucator->Imagine = $fileName;
        }
    
        $jucator->save();
    
        return redirect('jucator');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jucators')->where('id', '=', $id)->delete();
        return redirect('jucator');
    }
   
    public function sort(Request $request)
    {
        $criteria = $request->input('criteria');

        $jucatorQuery = Jucator::query();
    
        if ($criteria == 'nume') {
            $jucatorQuery = $jucatorQuery->orderBy('nume');
        } else if ($criteria == 'varsta') {
            $jucatorQuery = $jucatorQuery->orderBy('varsta');
        } 

        $jucators = $jucatorQuery->paginate(10);
    
        return view('ShowJucator', ['jucators' => $jucators]);
    }
    public function groupByAll()
    {
        $jucatoriByEchipa = DB::table('jucators')->select('Club', DB::raw('count(*) as count'))->groupBy('Club')->get();
        $jucatoriByPozitie = DB::table('jucators')->select('Pozitia', DB::raw('count(*) as count'))->groupBy('Pozitia')->get();
    
        return view('groupByAll', compact('jucatoriByEchipa', 'jucatoriByPozitie'));
    }    
    
}
