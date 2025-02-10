<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $comments = $this->commentRepository->all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.comments.create', compact('products'));
    }

    public function store(CommentRequest $request)
    {
        $this->commentRepository->create($request->validated());
        return redirect()->route('admin.comments.index')->with('success', 'Comment successfully created.');
    }

    public function edit(Comment $comment)
    {
        $products = Product::all();
        return view('admin.comments.edit', compact('comment', 'products'));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $this->commentRepository->update($comment, $request->validated());
        return redirect()->route('admin.comments.index')->with('success', 'Comment successfully updated.');
    }

    public function destroy(Comment $comment)
    {
        $this->commentRepository->delete($comment);
        return redirect()->route('admin.comments.index')->with('success', 'Comment successfully deleted.');
    }
}
