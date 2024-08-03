<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\person;

class personapicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person=Person::all();
        return $person;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person= new person();
        $person->type=$request->input('type');
        $person->First_Name=$request->input('First_Name');
        $person->Last_Name=$request->input('Last_Name');
        $person->Document_Type=$request->input('Document_Type');
        $person->Document_Number=$request->input('Document_Number');
        $person->Adress=$request->input('Adress');
        $person->Phone=$request->input('Phone');
        $person->Email=$request->input('Email');
        $person->save();
        return $person;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person= person::find ($id);
        $person->type=$request->input('type');
        $person->First_Name=$request->input('First_Name');
        $person->Last_Name=$request->input('Last_Name');
        $person->Document_Type=$request->input('Document_Type');
        $person->Document_Number=$request->input('Document_Number');
        $person->Adress=$request->input('Adress');
        $person->Phone=$request->input('Phone');
        $person->Email=$request->input('Email');
        $person->save();
        return $person;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person=person::find($id);
        $person->delete();
        return ('Persona borrada'); 
    }
}
