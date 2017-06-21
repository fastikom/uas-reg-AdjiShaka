<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;

class BukuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
      
        $input = $request->all();
        $buku=Buku::query();
        if($request->get('search')){
            $buku = $buku->where("judulBuku", "LIKE", "%{$request->get('search')}%");
        }
		  $buku = $buku->paginate(5);
        
        return response($buku);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$input = $request->all();
        $create = Buku::create($input);
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
        $buku = Buku::find($id);
        return response($buku);
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

        $buku=Buku::find($id);
        $buku->update($input);
        $buku=Buku::find($id);
        return response($buku);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Buku::where('id',$id)->delete();
    }
}
