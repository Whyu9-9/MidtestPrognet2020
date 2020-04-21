<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playstations;
use App\Game;
use App\Rent;
use App\RentDetail;
use Redirect;

class PlaystationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['playstations'] = Playstations::orderBy('id','asc')->paginate(10);
        return view('playstation.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playstation.create');
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
            'jenis_ps' => 'required',
            'deskripsi' => 'required',
        ]);

        Playstations::create($request->all());
        return Redirect::to('playstations')
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
        $data['product_info'] = Playstations::where($where)->first();
 
        return view('playstation.edit', $data);
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
            'jenis_ps' => 'required',
            'deskripsi' => 'required',
        ]);
         
        $update = ['jenis_ps' => $request->jenis_ps,'deskripsi' => $request->deskripsi];
        Playstations::where('id',$id)->update($update);
   
        return Redirect::to('playstations')->with('success','PS berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Playstations::where('id',$id)->delete();
        return Redirect::to('playstations')->with('success','Product deleted successfully');
    }

    public function sewa($id)
    {
        $games = Game::all();
        $playstation = Playstations::find($id);
        return view('playstation.sewa', compact('playstation','games', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function sewa_store(Request $request)
    {
        $messages = [
            'required' => ':attribute Wajib Diisi',
            'max' => ':attribute Harus Diisi maksimal :max karakter',
            'min' => ':attribute Harus Diisi minimum :min karakter',
            'string' => ':attribute Hanya Diisi Huruf dan Angka',
            'confirmed' => ':attribute Konfirmasi Password Salah',
            'unique' => ':attribute sudah ada',
            'email' => 'attribute Format Email Salah',
        ];

        $this->validate($request,[
            'start_sewa' => 'required|date',
            'finish_sewa' => 'required|date',
        ],$messages);

            $rent = new Rent;
            $ps_id = Playstations::orderBy('id', 'desc')->first()->id;
            $rent->ps_id = $ps_id;
            $rent->start_sewa = $request->start_sewa;
            $rent->finish_sewa = $request->finish_sewa;
            $rent->save();

        $datagame = $request->games_id;
        foreach($datagame as $game){
        $rent_id = Rent::orderBy('id', 'desc')->first()->id;
        if ($rent_id){
            $drent = new RentDetail;
            $drent->games_id = $game;
            $drent->rentid = $rent_id;
            $drent->save();
        }
    }
        return Redirect::to('rents')
       ->with('success','Great! Product created successfully.');
    }
}
