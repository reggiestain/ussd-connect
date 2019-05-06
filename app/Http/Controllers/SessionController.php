<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
  
        $type = $request->input('type');
        switch ($type) {
            case '1':
                $response = $this->start($request);
                $this->sendResponse($response);
                break;
            case '2':
                $response = $this->reply($request);
                $this->sendResponse($response);
                break;
            default:
                $this->sendResponse($this->init_msg());
        }
    }

    public function start($request) {
        $text = $request->input('request');
        if (isset($text)) {
            if ($text == "") {
                return $this->init_msg();
            }           
            if (in_array($text, array("*120*8800*404","*120*8800*404#"))) {                
                $response = $this->store($request);
                if ($response === true) {
                    return $this->menu();
                }
                return $response;
            }
            return $this->init_msg();
        }
        return $this->init_msg();
    }

    public function reply($request) {
        $text = $request->input('request');
        $name_parts = explode(' ', $text);

        if (isset($text)) {
            if ($text == "") {
                return $this->menu();
            }
            if (isset($name_parts[0]) && $name_parts[0] != "" && isset($name_parts[1]) && $name_parts[1] != "") {
                $response = $this->update($request, $name_parts);
                
                return $response;
            }
            return $this->menu();
        }
    }

    public function sendResponse($response) {
        header('Content-type: text/plain');
        echo $response;
    }

    public function init_msg() {
        return "Dial *120*8800*404# or url encoded %2A120%2A8800%2A404%23 to initiate the USSD session.";
    }

    public function menu() {
        return "Please enter your Full Name. \r\n\r\nExample Chris Joe and NOT C. Joe\r\n\r\n"
            . "1. Session is active.";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $session = Session::where('sessionid', $request->input('sessionid'))->first();
        if ($session === null) {

            $validator = Validator::make($request->all(), [
                    'sessionid' => 'required',
                    'msisdn' => 'phone:ZA',
                    'mno' => 'required',
                    'type' => 'required',
            ]);

            if ($validator->fails()) {
                return $validator->messages()->first();
            }
            Session::create($request->all());
            return true;
        } else {
            if ($session->type === 1) {
                return $this->menu();
            }
            return "0. Session is terminated.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $sessions = Session::all();
        $chart = DB::table('sessions')
                     ->select(DB::raw('count(*) as network_count, mno'))
                     ->groupBy('mno')
                     ->get();
        return view('pages.home', ['sessions'=>$sessions,'chart'=>$chart]);
    }
    
    public function chart() {
        $mtn = DB::table('sessions')->select(DB::raw('count(*) as network_count, mno'))
                    ->groupBy('mno')->get();
                    
        
        dd($mtn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update($request, $name_parts) {
        $session = Session::where('sessionid', $request->input('sessionid'))->first();
        if ($session !== null) {
            if ($session->type === 1) {
                $session->name = $name_parts[0];
                $session->surname = $name_parts[1];
                $session->type = $request->input('type');
                if ($session->save()) {
                    return "Your name has been saved successfully. \r\n\r\n0. Session is terminated.";
                }
                return $this->menu();
            } elseif($session->type === 2) {
                return "0. Session is terminated.";
            }
            return $this->init_msg();
        }
        return $this->init_msg();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session) {
        //
    }

}
