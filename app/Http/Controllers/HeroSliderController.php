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
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
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

        $updateData = [
            'title' => $data['heading'],
            'description' => $data['description'],
            'status' => $data['status'],
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

    public function data(Request $request)
    {
        dd('hhh');
        if ($request->ajax()) {
            $query = $this->sliderRepository->getForDataTable(); // Fetches HeroSlider::query()
            dd($query->get());
            return DataTables::of($query)
                ->addIndexColumn() // Corresponds to 'Sr No'
                ->editColumn('image', function ($slider) {
                    // Replicates your image display logic, including the fallback
                    $imageUrl = $slider->image
                                ? asset('storage/'.$slider->image)
                                : asset('images/Untitled.png');

                    return '<img src="'.$imageUrl.'" alt="Hero Slider Image" height="80" width="160">';
                })
                ->editColumn('title', function ($slider) {
                    // Replicates your Str::words for the title
                    return '<span>'.Str::words($slider->title, 2, '...').'</span>';
                })
                ->editColumn('description', function ($slider) {
                    // Replicates your Str::words for the description, including the full-text title attribute
                    return '<span title="'.e($slider->description).'">'.Str::words($slider->description, 2, '...').'</span>';
                })
                ->addColumn('status', function ($slider) {
                    // Builds the status toggle form and button
                    $route = route('admin.heroslider.toggle-status', $slider->id);
                    $csrf = csrf_field();
                    $method = method_field('PATCH');
                    $class = $slider->status == 'active' ? 'primary' : 'secondary';
                    $text = ucfirst($slider->status);

                    return <<<HTML
                <form action="$route" method="POST" style="display: inline;">
                    $csrf
                    $method
                    <button type="submit" class="badge bg-label-$class me-1 border-0" style="background: none; cursor: pointer;">$text</button>
                </form>
                HTML;
                })
                ->addColumn('action', function ($slider) {
                    // Builds the entire actions dropdown
                    $editUrl = route('admin.heroslider.edit', $slider->id);
                    $viewUrl = route('admin.heroslider.view', $slider->id);

                    // You'll need to add a proper delete form/modal later
                    return <<<HTML
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="$editUrl"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="$viewUrl"><i class="icon-base bx bx-detail me-1"></i> View</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Delete</a>
                    </div>
                </div>
                HTML;
                })
                ->rawColumns(['image', 'title', 'description', 'status', 'action']) // Allow HTML in these columns
                ->make(true);
        }
    }
}
