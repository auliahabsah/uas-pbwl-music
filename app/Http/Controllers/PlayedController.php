<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Played;
class PlayedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Played::all();
        return view('played.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('played.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'artist_id' => 'bail|required|unique:played',
                'album_id' => 'required'
            ],
            [
                'artist_id.required' => 'ID wajib diisi',
                'artist_id.unique' => 'ID sudah ada',
                'album_id.required' => 'ID album wajib diisi'
            ]
        );

        Played::create([
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'track_id' => $request->track_id
        ]);

        return redirect('/played');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $row = Played::findOrFail($id);
        return view('played.edit', compact('row'));
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
        $request->validate(
            [
                'artist_id' => 'bail|required',
                'album_id' => 'required'
            ],
            [
                'artist_id.required' => 'ID wajib diisi',
                'album_id.required' => 'ID album wajib diisi'
            ]
        );
        
        $row = Played::findOrFail($id);
        $row->update([
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'track_id' => $request->track_id
        ]);

        return redirect('/played');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Played::findOrFail($id);
        $row->delete();

        return redirect('/played');
    }
}
