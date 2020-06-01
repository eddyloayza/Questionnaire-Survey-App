<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionnaire;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(\App\Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');

        return view('questionnaire.show', compact('questionnaire'));
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
