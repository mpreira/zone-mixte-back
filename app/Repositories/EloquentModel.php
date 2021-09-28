<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Traits\UsesUUID;

class EloquentModel implements ModelRepository
{
    use UsesUUID {
        find as findByUUID;
    }

    /**
     * @var string
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function model()
    {
        if ($this->model) {
            return $this->model;
        }

        $this->model = '\App\Models\\' . Str::replace('Eloquent', '', substr(strrchr(get_called_class(), "\\"), 1));

        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->model()::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find(string $uuid)
    {
        $traits = trait_uses_recursive($this->model());
        if (isset($traits['App\Traits\HasUUID']) && Str::isUUID($uuid)) {
            return $this->findByUUID($uuid);
        }

        return $this->model()::find($uuid);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $model = $this->model();

        $instance = new $model;

        foreach ($data as $key => $value) {
            $instance->$key = $value;
        };

        $instance->save();

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function update(string $uuid, array $data)
    {
        $model = $this->find($uuid);
        if ($model) {
            $model->update($data);
        }

        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(string $uuid)
    {
        $model = $this->find($uuid);

        return $model->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function restore(string $uuid)
    {
        $model = $this->model()::withTrashed()
            ->find($uuid);

        return $model->restore();
    }

    /**
     * {@inheritdoc}
     */
    public function forceDelete(string $uuid)
    {
        $model = $this->model()::withTrashed()
            ->find($uuid);

        return $model->forceDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function paginate(array $filters = [])
    {
        $query = $this->model()::query();

        $query->withTrashed();

        $this->filter($query, $filters);

        $this->order($query, $filters);

        $result = $query->paginate(
            $filters['perPage'],
            $filters['only'] ?? ['*']
        );

        $this->append($result, $filters);

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->model()::query()->count();
    }

    /**
     * {@inheritdoc}
     */
    public function latest($count = 20)
    {
        return $this->model()::query()->orderBy('created_at', 'DESC')->limit($count)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function filter($query, $filters = [])
    {
        if (isset($filters['withTrashed'])) {
            $query->withTrashed();
        }

        if (isset($filters['search'])) {
            $this->search($query, $filters['search']);
        }

        if (isset($filters['only'])) {
            $only = Arr::isAssoc($filters['only'])
                ? Arr::flatten($filters['only'])
                : $filters['only'];
            $query->pluck(...$only);
        }

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    public function order($query)
    {
        return $query->orderBy('name', 'asc')
            ->orderBy('id', 'asc');
    }

    /**
     * {@inheritdoc}
     */
    public function search($query, $search)
    {
        $query->where('name', 'like', "%{$search}%");

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    public function append($result, $filters = [])
    {
        return $result;
    }
}
