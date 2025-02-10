<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function all()
    {
        return Comment::latest()->get();
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }

    public function create(array $data)
    {
        return Comment::create([
            'product_id' => $data['product_id'],
            'author_name' => $data['author_name'],
            'content' => $data['content'],
            'rating' => $data['rating'],
        ]);
    }

    public function update(Comment $comment, array $data)
    {
        return $comment->update([
            'product_id' => $data['product_id'],
            'author_name' => $data['author_name'],
            'content' => $data['content'],
            'rating' => $data['rating'],
        ]);
    }

    public function delete(Comment $comment)
    {
        return $comment->delete();
    }
}
