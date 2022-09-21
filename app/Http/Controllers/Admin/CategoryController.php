<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ListView;

    protected $model =  Category::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // get the model
        $model = $this->getModel();

        // create a new instance of the model
        $model = $model
            ->newQuery()
            ->create($request->all());

        // check if the model was created
        if (!$model) {
            abort(500);
        }

        // redirect to the index page
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form', [
            'model' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // update the model
        $category->update($request->all());

        // redirect to the index page
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
