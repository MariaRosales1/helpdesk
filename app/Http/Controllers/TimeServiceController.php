<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeService as TimeServiceModel;
use App\Http\Requests\TimeService;
use Illuminate\Support\Facades\DB;

class TimeServiceController extends Controller
{

    public function create()
    {
        $timeService = TimeServiceModel::all()->first();

        return view('timeService.create', [
            'timeService' => $timeService,
        ]);
    }

    public function store(TimeService $request)
    {
        $data = $request->validated();

        DB::table('time_services')->delete();

        $newTimeService = new TimeServiceModel();   
        $newTimeService->fill($data);
        $newTimeService->save();

        return back()->with('mensaje','Horario actualizado exitosamente');
    }
}
