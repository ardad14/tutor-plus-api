<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnnouncementController extends Controller
{
    public function index(): JsonResponse
    {
        $announcements = Announcement::all();
        return new JsonResponse($announcements, Response::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        $announcement = Announcement::findOrFail($id);
        return new JsonResponse($announcement, Response::HTTP_OK);
    }

    public function create(AnnouncementRequest $request): JsonResponse
    {
        $data = $request->all();
        $announcement = Announcement::create($data);
        return new JsonResponse($announcement, Response::HTTP_OK);
    }

    public function update(AnnouncementRequest $request, string $id): JsonResponse
    {
        $announcement = Announcement::findOrFail($id);
        $data = $request->all();
        $announcement->fill($data)->save();
        return new JsonResponse($announcement, Response::HTTP_OK);
    }

    public function delete(string $id):JsonResponse
    {
        Announcement::destroy($id);
        return new JsonResponse(['deleted' => true], Response::HTTP_OK);
    }
}
