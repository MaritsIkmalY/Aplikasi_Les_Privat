<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SertificateController extends Controller
{
    public function getTeacherId()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first('id');
        return $teacher->id;
    }

    public function getOldFile($id) {
        $oldFile = Certificate::where('id', $id)->first('file_path');
        return $oldFile->file_path;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::where('teacher_id', $this->getTeacherId())->get();
        return view('dashboard.sertif-index', [
            'certificates' => $certificates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'file_path' => 'required|mimes:pdf,png,jpg,jpeg',
            'description' => 'string',
        ]);

        $filename = $request->file('file_path')->getClientOriginalName();

        $validated['file_path'] = $request->file('file_path')->storeAs('sertif', $filename, 'public');
        $validated['teacher_id'] = $this->getTeacherId();

        Certificate::create($validated);

        return Redirect::route('certificate.index')->with('status', 'Success add new certificate.');
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
        $certificate = Certificate::where('id', $id)->first();

        return view('dashboard.sertif-edit', [
            'certificate' => $certificate
        ]);
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
        $validated = $request->validate([
            'name' => 'string',
            'file_path' => 'mimes:pdf,png,jpg,jpeg',
            'description' => 'string',
        ]);

        $oldFile = $this->getOldFile($id);

        if (!is_null($request->file('file_path'))) {
            $filename = $request->file('file_path')->getClientOriginalName();
            Storage::disk('public')->delete($oldFile);
            $validated['file_path'] = $request->file('file_path')->storeAs('sertif', $filename, 'public');
        }

        Certificate::where('id', $id)->update($validated);

        return Redirect::route('certificate.index')->with('status', 'Success edit certificate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldFile =$this->getOldFile($id);
        Storage::disk('public')->delete($oldFile);
        
        Certificate::where('id', $id)->delete();
        return Redirect::route('certificate.index')->with('status', 'Success delete certificate.');
    }
}
