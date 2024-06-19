<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    if (auth()->user()->email !== 'admin@gmail.com') {
        return redirect()->route('home')->with('message', 'Anda bukan admin');
    }

    $suggestions = Suggestion::all();
    $pageTitle = 'Suggestion List';

        return view('suggestion.index', compact(['suggestions', 'pageTitle']) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Contact';

        return view('suggestion.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Simpan data ke database menggunakan model Suggestion
    Suggestion::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
    ]);

    return redirect()->route('home')->with('success', 'Saran berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suggestion = Suggestion::find($id);
        return view('suggestion.edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $suggestion = Suggestion::find($id);

    $suggestion->name = $request->input('name');
    $suggestion->email = $request->input('email');
    $suggestion->message = $request->input('message');

    $suggestion->save();

    return redirect()->route('suggestion.index')->with('success', 'Saran berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $suggestion = Suggestion::find($id);
    if($suggestion){
        $suggestion->delete();
        return redirect()->route('suggestion.index')->with('success', 'Data successfully deleted');
    }
    return back()->with('error', 'Data not found');
}

}
