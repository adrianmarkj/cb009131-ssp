<?php

namespace App\Http\Controllers\Admin\Helpers;

use Illuminate\Support\Str;

trait ListView {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the model
        $model = $this->getModel();

        // Throw abort if model doesn't exist
        if (!$model) {
            abort(404);
        }

        $data = $model
        ->newQuery()
        ->paginate(10);

        $name = Str::plural(strtolower(class_basename($model)));

        if (!view()->exists("admin.template.index")) {
            abort(404);
        }

        return view('admin.template.index', [
            'model' => $model,
            'name' => $name,
            'data' => $data,
            'fields' => $this->getFields()
        ]);
    }

    private function getFields(){
        return isset($this->fields) && $this->fields ? $this->fields : $this->getModel()->getFillable();
    }

    private function getModel(){
        return isset($this->model) && $this->model ? (new $this->model) : null;
    }
}
