<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NiceAction;
use App\NiceActionLog;
use DB;

class NiceActionController extends Controller
{
    public function getHome() {
    	// We use ServiceProvider to share data cross all the pages instead
        // $actions = NiceAction::all();
        // return view('home')->with('actions', $actions);
        // $logged_actions = NiceActionLog::all(); // Eloquent
        // $logged_actions = NiceActionLog::whereHas('nice_action')->get(); // Eloquent
        // $logged_actions = NiceActionLog::paginate(5);
        $logged_actions = NiceActionLog::whereHas('nice_action')->paginate(5);
        // $query = DB::table('nice_action_logs')
        //         ->join('nice_actions', 'nice_action_logs.nice_action_id', '=', 'nice_actions.id')
        //         ->where('nice_actions.name', '=', 'Kiss')
        //         ->get(); // Standard query
        // $query = DB::table('nice_action_logs')
        //         ->count();
        // $query = DB:table('nice_action_logs')
        //         ->max('id');
        // $query = DB::table('nice_action_logs')
        //         ->insert([
        //             'nice_action_id' => DB::table('nice_actions')->select('id')->where('name', 'Kiss')->first()->id
        //         ]);
        // $hug = NiceAction::where('name', 'Kiss')->first();
        // if ($hug) {
        //     $hug->name = "Smile";
        //     $hug->update();
        // }

        // $wave = NiceAction::where('name', 'Wave')->first();
        // if ($wave) {
        //     $wave->delete();
        // }
    	// return view('home')->with(array('logged_actions' => $logged_actions, 'db' => $query));
        return view('home', compact('logged_actions'));
    }

    public function getNiceAction($action, $name = null) {
    	if (!$name) {
    		$name = 'you';
    	}
        $nice_action = NiceAction::where('name', $action)->first();
        $nice_action_log = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);
    	return view('actions.nice')->with(array('action' => $action, 'name' => $name));
    }

    public function postAddAction(Request $request) {
        $validation = $this->validate($request, [
            'name' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric'
        ]);

        $action = new NiceAction();
        $action->name = $request['name'];
        $action->niceness = $request['niceness'];
        $action->save();

        if (isset($validation) && $validation->fails()) {
            return redirect()->route('home')->withErrors($validation->messages(), 'actionErrors');
        }

        if ($request->ajax()) {
            return response()->json();
        }

        return redirect()->route('home')->with('message', 'New action successfully added!');
    }
}
