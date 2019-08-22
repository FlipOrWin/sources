<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facade\DB;
use App\ContactSource;

class ContactSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ContactSource::all();
        return response()->json(array(
            'contactSources' => $contactSources,
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
        $hash = $request;

            $json = $request->input('json', null);
            $params = json_decode($json);
            $params_array = json_decode($json, true);

            


            //Guardar coche
            $contactSource = new ContactSource();
            $contactSource->name = $params->name;

            $contactSource->save();
        
            $data = array(
                'contactSource' => $contactSource,
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
        return ContactSource::where('id',$id)->get();
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
        ContactSource::where('id',$id)->update(['name'=>$request->name]);
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
        ContactSource::destroy($id);
    }
}
