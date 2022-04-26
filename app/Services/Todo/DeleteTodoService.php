<?php

namespace App\Services\Todo;

use App\Models\Todo;
use App\Services\Service;
use Illuminate\Http\Request;

class DeleteTodoService extends Service
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->table   = new Todo;
    }

    public function handle()
    {
        $todo = $this->request->route('todo');
        if (!$todo || $todo->delete()) {
            return [false, null];
        }
        return [true, null];
    }
}
