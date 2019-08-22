<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facade\DB;
use App\NuevaTabla;

class NuevaTablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return NuevaTabla::all();
        return response()->json(array(
            'nuevaTabla' => $nuevaTabla,
            'status' => 'success'
        ), 200);
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
        $hash = $request;

            $json = $request->input('json', null);
            $params = json_decode($json);
            $params_array = json_decode($json, true);

            $nuevaTabla = new NuevaTabla();
            $nuevaTabla->name = $params->name;

            $nuevaTabla->save();
        
            $data = array(
                'nuevaTabla' => $nuevaTabla,
                'status' => 'success',
                'code' => 200,
            );
        return response()->json($data, 200);
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
        return NuevaTabla::where('id',$id)->get();
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
        NuevaTabla::where('id',$id)->update(['name'=>$request->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        NuevaTabla::destroy($id);
    }
}
