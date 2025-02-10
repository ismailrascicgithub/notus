<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;

class ApiCommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        return response()->json($this->commentRepository->all());

    }
    public function store(CommentRequest $request)
    {
        try {
            $comment = $this->commentRepository->create($request->validated());
            return response()->json($comment, 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the comment.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}