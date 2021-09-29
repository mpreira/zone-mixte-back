<?php

namespace App\Repositories\Comment;

use Carbon\Carbon;
use App\Models\Comment;

class EloquentComment implements CommentRepository
{
    /**
     *
     */
    public function find($id)
    {
        return Comment::find($id);
    }

    public function create(array $data){
        return Comment::create($data);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        $comment = $this->find($id);
        $comment->update($data);
        return $comment;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $comment = $this->find($id);
        return $comment->delete();
    }
}
