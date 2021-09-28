<?php

namespace App\Repositories;

interface ModelRepository
{
    /**
     * Retrieve model name.
     *
     * @return string
     */
    public function model();

    /**
     * Retrieve all models.
     *
     * @return null|Collection
     */
    public function all();

    /**
     * Find model by its uuid.
     *
     * @param  string $uuid
     * @return null|User
     */
    public function find(string $uuid);

    /**
     * Create new model.
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update model specified by it's uuid.
     *
     * @param  string $uuid
     * @param  array $data
     * @return User
     */
    public function update(string $uuid, array $data);

    /**
     * Delete model with provided uuid.
     *
     * @param  string $uuid
     * @return mixed
     */
    public function delete(string $uuid);

    /**
     * Restore model with provided uuid.
     *
     * @param  string $uuid
     * @return mixed
     */
    public function restore(string $uuid);

    /**
     * Force delete model with provided uuid.
     *
     * @param  string $uuid
     * @return mixed
     */
    public function forceDelete(string $uuid);

    /**
     * Paginate registered models.
     *
     * @param array $filters
     * @return mixed
     */
    public function paginate(array $filters = []);

    /**
     * Number of models in database.
     *
     * @return mixed
     */
    public function count();

    /**
     * Get latest {$count} models from database.
     *
     * @param $count
     * @return mixed
     */
    public function latest($count = 20);

    /**
     * Filter model query using on a set of filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filter($query, $filters = []);

    /**
     * Order model query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function order($query);

    /**
     * Append filters to results.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator $result
     * @param  array $filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function append($result, $filters = []);
}
