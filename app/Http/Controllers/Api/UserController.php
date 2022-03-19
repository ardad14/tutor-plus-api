<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json($users, Response::HTTP_OK);

    }

    public function show(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function create(UserRequest $request): JsonResponse
    {
        $user = $request->all();
        $this->repository->create($user);
        return response()->json($user, Response::HTTP_OK);
    }

    public function update(UserRequest $request, string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->fill($data)->save();
        return response()->json($user, Response::HTTP_OK);
    }

    public function delete(string $id): JsonResponse
    {
        User::destroy($id);
        return response()->json(['deleted' => true], Response::HTTP_OK);
    }
}
