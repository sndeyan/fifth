<?php

namespace App\Services;

use App\Comment;
use App\Contracts\CommentServiceInterface;
class CommentServices implements CommentServiceInterface
{
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return Comment
     */
    public function addComment($inputs)
    {
        return $this->comment->create($inputs);
    }
    public function allComment()
    {
        return $this->comment->get();
    }
    public function editComment($id)
    {
        return $this->comment->find($id);
    }
    public function updateCommentt($inputs, $id)
    {
        return $this->comment->where('id', $id)->update($inputs);
    }
    public function deleteComment($id)
    {
        return $this->comment->where('id', $id)->delete();
    }
}