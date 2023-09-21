<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Store a new project.
     *
     * @param StoreProjectRequest $request
     *
     * @return JsonResponse
     *
     * @OA\Post(
     *     path="/v1/project",
     *     operationId="storeProject",
     *     description="Store a new project.",
     *     tags={"Projects"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={
     *                      "organization_id", "name", "phone_number", "assistant_description", "assistant_goal",
     *                      "assistant_knowledge_about", "target_public", "language", "default_answer"
     *                  },
     *                 @OA\Property(
     *                     property="organization_id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone_number",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="assistant_description",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="assistant_goal",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="assistant_knowledge_about",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="target_public",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="language",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="default_answer",
     *                     type="string"
     *                 ),
     *                 example={
     *                     "organization_id": 1,
     *                     "name": "Bigmelo",
     *                     "description": "New big organization.",
     *                     "phone_number": "+573121234567",
     *                     "assistant_description": "an official of the Superintendency of Industry and Commerce",
     *                     "assistant_goal": "to advise citizens on their consumer concerns",
     *                     "assistant_knowledge_about": "consumer rights and consumer duties",
     *                     "target_public": "a colombian consumer",
     *                     "language": "Spanish",
     *                     "target_public": "Estoy aqui solo para resolver tus dudas como consumidor"
     *                  }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Project stored.",
     *         @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Project has been stored successfully."),
     *              @OA\Property(property="project_id", type="number", example="88"),
     *          )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Wrong Request",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function store(StoreProjectRequest $request): JsonResponse
    {
        try {
            $project = Project::where('phone_number', $request->phone_number)->first();

            if ($project) {
                return response()->json(['message' => 'phone_number already exist in another project.'], 422);
            }

            $project = Project::create([
                'organization_id'           => $request->organization_id,
                'name'                      => $request->name,
                'description'               => $request->description ?? '',
                'phone_number'              => $request->phone_number,
                'assistant_description'     => $request->assistant_description ?? '',
                'assistant_goal'            => $request->assistant_goal ?? '',
                'assistant_knowledge_about' => $request->assistant_knowledge_about ?? '',
                'target_public'             => $request->target_public ?? '',
                'language'                  => $request->language ?? '',
                'default_answer'            => $request->default_answer ?? '',
            ]);

            return response()->json(
                [
                    'message' => 'Project has been stored successfully.',
                    'project_id' => $project->id
                ],
                200
            );

        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
