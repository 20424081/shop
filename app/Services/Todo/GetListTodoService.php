<?php

namespace App\Services\Todo;

use App\Models\Todo;
use App\Services\Service;
use Illuminate\Http\Request;

class GetListTodoService extends Service
{
    protected $search;
    protected $limit = 10;
    protected $offset = 0;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->table   = new Todo;
    }

    protected function validate()
    {
        return true;
    }

    public function handle()
    {
        $page = !empty($this->request->query()['page']) ? $this->request->query()['page'] : 1;

        if (!empty($this->request->query()['limit']) && $this->request->query()['limit'] > 100) {
            $this->limit = $this->request->query()['limit'];
        } else {
            $this->limit = 10;
        }

        $this->offset = ($page - 1) * $this->limit;
        $this->search = !empty($this->request->query()['search']) ? $this->request->query()['search'] : null;

        return $this->table
            ->with(['user'])
            ->search($this->search)
            ->offset($this->offset)
            ->take($this->limit)
            ->orderBy('task', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();
    }
}
