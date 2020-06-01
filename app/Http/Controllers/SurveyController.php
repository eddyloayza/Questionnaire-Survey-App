<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionnaire;

class SurveyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Questionnaire $questionnaire)
    {
        //dd($questionnaire);

        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
        ]);

        $data['survey']['user_id'] = auth()->user()->id;

        $survey = $questionnaire->surveys()->create($data['survey']);

        $survey->responses()->createMany($data['responses']);

        return '¡Gracias! - ' . auth()->user()->name;
    }

    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
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
