<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('backend.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileNameWithoutExt = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::slug($fileNameWithoutExt) . '.' . $extension;
            //$image->storeAs('images/slider', $fileName, 'public');
            $filePath = $image->move(public_path('images/slider'), $fileName);
            $data['image'] = 'storage/' . $filePath;
        }

        Slider::create($data);

        return back()->with('success', 'Slider has been created successfully');
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
    public function edit(string $id)
    {
        $slider = Slider::where('id', $id)->first();

        return view('backend.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::where('id', $id)->first();

        $data = $request->only(['name', 'content']);

        if ($request->hasFile('image')) {
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            } //Eğer eski resim varsa silecek.

            $image = $request->file('image');
            $fileNameWithoutExt = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::slug($fileNameWithoutExt) . '.' . $extension;
            $image->move(public_path('images/slider'), $fileName);
            $data['image'] = 'images/slider/' . $fileName;
        } else {
            $data['image'] = $slider->image; //yeni resim yüklenmemişse, eski resmi kaydeder.
        }

        $slider->update($data);

        return back()->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();

        if (!empty($slider->image) && file_exists($slider->image)) {
            unlink($slider->image);
        }

        $slider->delete();
        return back()->with('success', 'Slider deleted successfully.');
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $check = $status === true ? '1' : '0';

        Slider::where('id', $request->id)
            ->update(['status' => $check]);

        return response(['error' => false, 'status' => $status]);
    }
}
