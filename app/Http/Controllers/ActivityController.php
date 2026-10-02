<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Category;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function __construct(private readonly ActivityService $activityService) {}

    public function index(Request $request): View
    {
        $statuses = Activity::STATUSES;
        $categories = Category::query()->orderBy('name')->get();
        $search = trim((string) $request->query('search', ''));
        $status = $request->query('status');
        $categoryId = $request->query('category_id');
        $sort = $request->query('sort', 'newest');
        $activities = Activity::query()
            ->with('activityCategory')
            ->when($search !== '', fn ($query) => $query->where(fn ($query) => $query
                ->where('code', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")))
            ->when(in_array($status, $statuses, true), fn ($query) => $query->where('status', $status))
            ->when(ctype_digit((string) $categoryId), fn ($query) => $query->where('category_id', (int) $categoryId))
            ->orderBy('activity_date', $sort === 'oldest' ? 'asc' : 'desc')
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('activities.index', compact('activities', 'statuses', 'categories', 'search', 'status', 'categoryId', 'sort'));
    }

    public function create(): View
    {
        return view('activities.create', [
            'activity' => new Activity,
            'statuses' => ['Draft'],
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function store(StoreActivityRequest $request): RedirectResponse
    {
        $this->activityService->create($request->validated());

        return to_route('activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Activity $activity): View
    {
        $activity->load('activityCategory');

        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('activities.edit', [
            'activity' => $activity,
            'statuses' => Activity::STATUSES,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function update(UpdateActivityRequest $request, Activity $activity): RedirectResponse
    {
        $this->activityService->update($activity, $request->validated());

        return to_route('activities.show', $activity)->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return to_route('activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
