<?php


namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class TaskController extends BaseController
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $user = User::find($request->user()->id);

        if (!$user) {
            return response()->json(['error' => 'Customer not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(new UserResource($user), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $params = $request->all();
        $validator = Validator::make(
            $params,
            [
                'title' => ['required', 'min:3'],
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $task = Task::create(
            [
                'title' => $params['title'],
                'user_id' => $request->user()->id,
                'description' => $params['description'],

            ]
        );

        if (!$task) {
            return response()->json(['errors' => 'something goes wrong'], Response::HTTP_FORBIDDEN);
        }

        return response()->json(new UserResource($request->user()), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $params = $request->all();
        $task = Task::find($params['taskId']);
        if (!$task) {
            return response()->json(['errors' => 'task do not exist'], Response::HTTP_FORBIDDEN);
        }

        $task->delete();

        return response()->json(new UserResource($request->user()), Response::HTTP_OK);
    }


}
