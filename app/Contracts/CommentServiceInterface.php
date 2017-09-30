<?php

namespace App\Contracts;
interface CommentServiceInterface
{
    public function allComment();
    public function addComment($inputs);
    public function editComment($id);
   // public function updateComment($inputs, $id);
    public function deleteComment($id);
}