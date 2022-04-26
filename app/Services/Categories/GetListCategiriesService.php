<?php

namespace App\Services\Categories;

use App\Models\Category;
use App\Services\Service;
use Illuminate\Http\Request;

class GetListCategiriesService extends Service
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->table   = new Category;
    }

    public function handle()
    {
        $allowed_columns = ['id', 'category_name'];
        $categories = $this->table->select(['id', 'category_name', 'created_at', 'updated_at']);
        if ($this->request->filled('search')) {
            $categories = $categories->Search($this->request->input('search'));
        }

        $offset = (($categories) && ($this->request->get('offset') > $categories->count())) ? $categories->count() : $this->request->get('offset', 0);

        ((config('app.max_results') >= $this->request->input('limit')) && ($this->request->filled('limit'))) ? $limit = $this->request->input('limit') : $limit = config('app.max_results');

        $order = $this->request->input('order') === 'asc' ? 'asc' : 'desc';
        $sort = in_array($this->request->input('sort'), $allowed_columns) ? $this->request->input('sort') : 'id';
        $categories->orderBy($sort, $order);

        $total = $categories->count();
        $categories = $categories->skip($offset)->take($limit)->get();
        return ['total' => $total, 'rows' => $categories];
    }
}
