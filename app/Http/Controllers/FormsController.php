<?php

namespace App\Http\Controllers;

use App\District;
use App\Dun;
use App\Form;
use App\HealthProblem;
use App\Parliament;
use App\State;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::get();
        return view('form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::orderBy('Name')->get();
        $districts = District::orderBy('name')->get();
        $parliaments = Parliament::orderBy('name')->get();
        $duns = Dun::orderBy('name')->get();
        $health_problems = HealthProblem::get(['name', 'id']);

        return view('form.create', compact('states', 'districts', 'parliaments', 'duns', 'health_problems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
        $created = Form::create($request->except('health_problems'));

        if ($created) {
            $created->health_problems()->sync($request->get('health_problems', []));
        }

        // redirect
        return redirect()->route('form.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id);

        $states = State::orderBy('Name')->get();
        $districts = District::orderBy('name')->get();
        $parliaments = Parliament::orderBy('name')->get();
        $duns = Dun::orderBy('name')->get();
        $health_problems = HealthProblem::get(['name', 'id']);

        return view('form.update', compact('form', 'states', 'districts', 'parliaments', 'duns', 'health_problems'));
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
        $form = Form::find($id);
        $updated = $form->update($request->except('health_problems'));

        if ($updated) {
            $form->health_problems()->sync($request->get('health_problems', []));
        }

        return redirect()->route('form.index');
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
    }
}
