<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Calendar::whereDate('start', '>=', $request->start)

                ->whereDate('end',   '<=', $request->end)

                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);

        }

        return view('admin.calendar.index');
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

            case 'update':

                $event = Calendar::find($request->id)->update([

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
