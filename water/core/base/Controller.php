<?php

declare(strict_types=1);

namespace core\base;

abstract class Controller
{
    private $model;

    public function __construct($model = null)
    {
        $this->setModel($model);
    }

    abstract public function index();

    final protected function loadModel(string $name): Model
    {
        if (is_string($name)) {
            $namespace = 'model\\'.str_replace(DS, '\\', $name);
            $model = new $namespace();

            return $model;
        }

        return null;
    }

    final protected function model(): Model
    {
        return $this->model;
    }

    private function setModel($model)
    {
        $this->model = null;

        if (is_string($model)) {
            $namespace = 'model\\'.str_replace(DS, '\\', $model);
            $this->model = new $namespace();
        }
        if ($model instanceof Model) {
            $this->model = $model;
        }
    }
}
