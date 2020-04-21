<?php

namespace App\Http\Controllers;

use App\RentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class SewaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where = array('rentid'=>$id);
        $sewagame['rent_details'] = DB::table('rent_details')
        ->join('rents','rentid','=','rents.id')
        ->join('games','games_id','=','games.id')
        ->select('rents.*','games.judul_game')
        ->where($where)->first();
        $valid = RentDetail::select('games_id')->where('rentid','=',$where)->get();
        return view('penyewaan.listdetail', compact('sewagame','valid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RentDetail::where('games_id',$id)->delete();
        return Redirect::to('rents')->with('success','Product deleted successfully');
    }
}
