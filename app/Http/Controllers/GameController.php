<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use Redirect;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['games'] = Game::orderBy('id','asc')->paginate(10);
        return view('game.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_game' => 'required',
            'deskripsi' => 'required',
        ]);

        Game::create($request->all());
        return Redirect::to('games')
       ->with('success','Great! Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['game_info'] = Game::where($where)->first();
 
        return view('game.edit', $data);
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
        $request->validate([
            'judul_game' => 'required',
            'deskripsi' => 'required',
        ]);
         
        $update = ['judul_game' => $request->judul_game,'deskripsi' => $request->deskripsi];
        Game::where('id',$id)->update($update);
   
        return Redirect::to('games')->with('success','Game berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::where('id',$id)->delete();
        return Redirect::to('games')->with('success','Game deleted successfully');
    }
}
