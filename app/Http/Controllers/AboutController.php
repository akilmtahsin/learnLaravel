<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('backend.aboutAll', compact('abouts'));
    }
    public function create()
    {
        return view('backend.about');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // // return $request->all();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'IMG_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/about_images'), $filename);
        }

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->hasFile('image') ? $filename : null,
            'status' => $request->status,
        ]);

        // $about = new About();
        // $about->title = $request->title;
        // $about->description = $request->description;
        // $about->save();

        return back()->with('success', 'About created successfully.');
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('backend.aboutEdit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $about = About::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/about_images/'.$about->image));
            $filename = 'IMG_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/about_images'), $filename);
        }
        
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->hasFile('image') ? $filename : $about->image,
            'status' => $request->status,
        ]);

        return redirect()->route('about.index')->with('success', 'Info updated successfully.');
    }

    public function delete($id)
    {
        $about = About::find($id);
        $about->delete();
        return back()->with('success', 'Info deleted successfully.');
    }
}
