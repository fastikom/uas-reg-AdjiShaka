<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Anggota;

class AnggotaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
      
        $input = $request->all();
        $anggota=Anggota::query();
        if($request->get('search')){
            $anggota = $anggota->where("nama", "LIKE", "%{$request->get('search')}%");
        }
		  $anggota = $anggota->paginate(5);
        
        return response($anggota);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$input = $request->all();
        $create = Anggota::create($input);
        return response($create);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return response($anggota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
    	$input = $request->all();

        $anggota=Anggota::find($id);
        $anggota->update($input);
        $anggota=Anggota::find($id);
        return response($anggota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Anggota::where('id',$id)->delete();
    }
}
