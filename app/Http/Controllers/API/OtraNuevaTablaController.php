<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facade\DB;
use App\OtraNuevaTabla;

class OtraNuevaTablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return OtraNuevaTabla::all();
        return response()->json(array(
            'otraNuevaTabla' => $otraNuevaTabla,
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

            $otraNuevaTabla = new OtraNuevaTabla();
            $otraNuevaTabla->name = $params->name;

            $otraNuevaTabla->save();
        
            $data = array(
                'otraNuevaTabla' => $otraNuevaTabla,
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
        return OtraNuevaTabla::where('id',$id)->get();
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
        OtraNuevaTabla::where('id',$id)->update(['name'=>$request->name]);

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
        OtraNuevaTabla::destroy($id);
    }
}
