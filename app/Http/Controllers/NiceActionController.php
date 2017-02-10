<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NiceAction;
use App\NiceActionLog;

class NiceActionController extends Controller
{
    public function getHome() {
    	// We use ServiceProvider to share data cross all the pages instead
    	// $actions = NiceAction::all();
    	// return view('home')->with('actions', $actions);
        $logged_actions = NiceActionLog::all();
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
            'actionname' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric'
        ]);

        $action = new NiceAction();
        $action->name = $request['actionname'];
        $action->niceness = $request['niceness'];
        $action->save();

        if (isset($validation) && $validation->fails()) {
            return redirect()->route('home')->withErrors($validation->messages(), 'actionErrors');
        }

        return redirect()->route('home')->with('message', 'New action successfully added!');
    }
}
