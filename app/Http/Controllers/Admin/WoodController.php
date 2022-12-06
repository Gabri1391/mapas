<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->id == 1){
            $woods = Wood::all();
            return view('admin.woods.index', compact('woods'));
        }else{
            return redirect()->route('admin.home')->with('type', 'danger')->with('message', 'Stai fermo che non sei l\'admin!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wood = new Wood;
        return view('admin.woods.create', compact('wood'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required|string',
            'price' => 'required'
        ]);


        $wood = new Wood;
        
        $wood->name = $data['name'];
        $wood->price = $data['price'];
        
        $wood->save();

        return redirect()->route('admin.woods.index')->with('type','success')->with('message','Risorsa creata con successo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function show(Wood $wood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function edit(Wood $wood)
    {
        return view('admin.woods.edit',compact('wood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wood $wood)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required|string',
            'price' => 'required'
        ]);

        $wood->name = $data['name'];
        $wood->price = $data['price'];
        
        $wood->update();
        return redirect()->route('admin.woods.index')->with('type','success')->with('message','Risorsa modificata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wood $wood)
    {
        $wood->delete();

        return redirect()->route('admin.woods.index')->with('type','danger')->with('message','Risorsa eliminata con successo.');
    }
}
