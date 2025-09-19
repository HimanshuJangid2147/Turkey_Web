<?php

namespace App\Http\Controllers;

use App\Repositories\HeroSlider\SliderRepositoryInterface;
use Illuminate\Http\Request;

class HeroSliderController extends Controller
{
    protected $sliderRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        $sliders = $this->sliderRepository->all();
        return view('admin.pages.heroslider.heroslider', compact('sliders'));
    }

    public function create()
    {
        return view('admin.pages.heroslider.heroslider-edit');
    }

    public function show($id)
    {
        $slider = $this->sliderRepository->find($id);
        return view('admin.pages.heroslider.heroslider-view', compact('slider'));
    }

    public function edit($id)
    {
        $slider = $this->sliderRepository->find($id);
        return view('admin.pages.heroslider.heroslider-edit', compact('slider'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $this->sliderRepository->create([
            'title' => $data['heading'],
            'description' => $data['description'],
            'status' => $data['status'],
            'image' => $data['image'] ?? null,
        ]);

        return redirect()->route('admin.heroslider')->with('success', 'Hero slider created successfully.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $this->sliderRepository->update([
            'title' => $data['heading'],
            'description' => $data['description'],
            'status' => $data['status'],
            'image' => $data['image'] ?? null,
        ], $id);

        return redirect()->route('admin.heroslider')->with('success', 'Hero slider updated successfully.');
    }
}
