<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function fullcalender(Request $request)
    {
        if($request->ajax()) {
            $data = Calendar::whereDate('start', '>=', $request->start)

                ->whereDate('end',   '<=', $request->end)

                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);

        }
        return view('frontend.index');
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {

            case 'add':

                $event = Calendar::create([

                    'title' => $request->title,

                    'start' => $request->start,

                    'end' => $request->end,

                ]);

                return response()->json($event);

                break;

            case 'delete':

                $event = Calendar::find($request->id)->delete();

                return response()->json($event);

                break;

            default:

                # code...

                break;
        }
    }
}
