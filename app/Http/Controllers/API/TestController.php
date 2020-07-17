<?php

namespace App\Http\Controllers\Api;
use App\Test;
use App\Anwser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_name = $request->query('user_name') ?: ''; 

        if ($user_name !== '') {
            $anwsers = Anwser::where([
                'user_name' => $user_name, 
            ])->orderBy('anwser_no')->get();
        } else {

            $anwsers = Anwser::orderBy('anwser_no')->get(); 
        }

        return response()->json($anwsers,200);
    }

}