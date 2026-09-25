<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
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
        $status = $request->query('status');
        $activities = Activity::query()
            ->when(in_array($status, $statuses, true), fn ($query) => $query->where('status', $status))
            ->orderBy('activity_date')
            ->orderBy('id')
            ->get();

        return view('activities.index', compact('activities', 'statuses', 'status'));
    }

    public function create(): View
    {
        return view('activities.create', ['activity' => new Activity, 'statuses' => Activity::STATUSES]);
    }

    public function store(StoreActivityRequest $request): RedirectResponse
    {
        $this->activityService->create($request->validated());

        return to_route('activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('activities.edit', ['activity' => $activity, 'statuses' => Activity::STATUSES]);
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
