<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeService as TimeServiceModel;
use App\Http\Requests\TimeService;


class TimeServiceController extends Controller
{
    public function index()
    {
        $timeService = TimeServiceModel::all();

        return view('timeservice.index', [
            'timeServices' => $timeService,
        ]);
    }

    public function create()
    {
        return view('timeService.create');
    }

    public function store(TimeService $request)
    {
        $data = $request->validated();
        $newTimeService = new TimeServiceModel;
        $newTimeService->fill($data);
        $newTimeService->save();  
        return back()->with('mensaje','Asesor ingresado correctamente');
    }
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
