<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Person;
use App\Models\User;

class incomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $income=Income::all();
        return view('dashboard.income.index',['income'=>$income]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $person=Person::all();
        return view('dashboard.income.create',['person'=>$person]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $income= new Income();
        $income-> provider_id=$request->input('person');
        $income-> user_id=$request->input('User');
        $income-> receipt_type=$request->input('receipt_type');
        $income-> receipt_series=$request->input('receipt_series');
        $income-> receipt_number=$request->input('receipt_number');
        $income-> date=$request->input('date');
        $income-> tax=$request->input('tax');
        $income-> total=$request->input('total');
        $income-> status=$request->input('status');
        $income-> save ();
        return view ("dashboard.income.message",['msg'=>"Artículo creada con exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $person=Person::all();
        return view('dashboard.income.create',['person'=>$person]);
    }

    public function detalle($id)
{
    // Encuentra el registro de ingresos por su ID
    $income = Income::findOrFail($id);

    // Retorna la vista de detalles y pasa el registro de ingresos a la vista
    return view('dashboard.income.detalle', compact('income'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $income= Income::find($id);
        $income-> provider_id=$request->input('person');
        $income-> user_id=$request->input('User');
        $income-> receipt_type=$request->input('receipt_type');
        $income-> receipt_series=$request->input('receipt_series');
        $income-> receipt_number=$request->input('receipt_number');
        $income-> date=$request->input('date');
        $income-> tax=$request->input('tax');
        $income-> total=$request->input('total');
        $income-> status=$request->input('status');
        $income-> save ();
        return view ("dashboard.income.message",['msg'=>"Artículo actualizado con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income=Income::find($id);
        $income->delete();
        return redirect("dashboard/income");
    }
}
