<?php

namespace App\Repositories\Comment;

interface CommentRepository
{
    /**
     * Find comment by its id
     */
    public function find($id);

    /**
     * create new comment
     */
    public function create(array $data);

    /**
     * update comment specified by its id
     */
    public function update($id, array $data);

    /**
     * Delete membership with provided id
     */
    public function delete($id);
}
