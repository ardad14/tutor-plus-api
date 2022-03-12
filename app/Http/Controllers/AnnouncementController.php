<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnnouncementController extends Controller
{
    public function index(): JsonResponse
    {
        $announcements = Announcement::all();
        return response()->success(compact('announcements'));
    }

    public function show(string $id): JsonResponse
    {
        $announcement = Announcement::findOrFail($id);
        return response()->success(compact('announcement'));
    }

    public function create(AnnouncementRequest $request): JsonResponse
    {
        $data = $request->all();
        $announcement = Announcement::create($data);
        return response()->success(compact('announcement'));
    }

    public function update(AnnouncementRequest $request, string $id): JsonResponse
    {
        $announcement = Announcement::findOrFail($id);
        $data = $request->all();
        $announcement->fill($data)->save();
        return response()->success(compact('announcement'));
    }

    public function delete(string $id):JsonResponse
    {
        Announcement::destroy($id);
        return response()->success('deleted');
    }
}
