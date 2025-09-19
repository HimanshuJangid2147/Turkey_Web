<?php

namespace App\Http\Controllers;

use App\Repositories\HeroSlider\SliderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class HeroSliderController extends Controller
{
    protected $sliderRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        return view('admin.pages.heroslider.heroslider');
    }

    public function create()
    {
        $slider = null;
        return view('admin.pages.heroslider.heroslider-edit', compact('slider'));
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
            'link' => 'nullable|string|max:255',
            'pagename' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $this->sliderRepository->create([
            'title' => $data['heading'],
            'description' => $data['description'],
            'status' => $data['status'],
            'image' => $data['image'] ?? null,
            'link' => $data['link'] ?? null,
            'pagename' => $data['pagename'] ?? null,
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
            'link' => 'nullable|string|max:255',
            'pagename' => 'nullable|string|max:255',
        ]);

        $updateData = [
            'title' => $data['heading'],
            'description' => $data['description'],
            'status' => $data['status'],
            'link' => $data['link'] ?? null,
            'pagename' => $data['pagename'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $updateData['image'] = $imagePath;
        }

        $this->sliderRepository->update($updateData, $id);

        return redirect()->route('admin.heroslider')->with('success', 'Hero slider updated successfully.');
    }

    public function toggleStatus($id)
    {
        $slider = $this->sliderRepository->find($id);
        $newStatus = $slider->status === 'active' ? 'inactive' : 'active';
        $this->sliderRepository->update(['status' => $newStatus], $id);

        return redirect()->route('admin.heroslider')->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $this->sliderRepository->delete($id);

        return redirect()->route('admin.heroslider')->with('success', 'Hero slider deleted successfully.');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $query = $this->sliderRepository->getForDataTable(); // Fetches HeroSlider::query()
            return DataTables::of($query)
                ->addIndexColumn() // Corresponds to 'Sr No'
                ->editColumn('image', function ($slider) {
                    return $slider->image ?: 'images/Untitled.png';
                })
                ->editColumn('title', function ($slider) {
                    return Str::words($slider->title, 2, '...');
                })
                ->editColumn('description', function ($slider) {
                    return Str::words($slider->description, 2, '...');
                })
                ->addColumn('link', function ($slider) {
                    return $slider->link;
                })
                ->addColumn('pagename', function ($slider) {
                    return $slider->pagename;
                })
                ->addColumn('status', function ($slider) {
                    return $slider->status;
                })
                ->addColumn('action', function ($slider) {
                    return $slider->id;
                })
                ->make(true);
        }
    }
}
