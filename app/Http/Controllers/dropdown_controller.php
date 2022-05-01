<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class dropdown_controller extends Controller
{
    //
    public function index(Request $request)
    {
        $data['country'] = DB::table('country')->get();
        return view('index', $data);
    }


    public function getstate(Request $request)
    {
        $country_id = $request->post('country_id');

        $state = DB::table('state')->where('country', $country_id)->get();
        print_r($state);

        $html = '<option hidden>Select State</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->State . '</option>';
        }
        echo $html;
    }

    public function getcity(Request $request)
    {
        $state_id = $request->post('state_id');
        $city = DB::table('city')->where('state', $state_id)->get();
        $html = '<option hidden>Select city</option>';
        foreach ($city as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->city . '</option>';
        }
        echo $html;
    }
}
