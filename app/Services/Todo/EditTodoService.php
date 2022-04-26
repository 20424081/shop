<?php

namespace App\Services\Todo;

use App\Models\Todo;
use App\Services\Service;
use Illuminate\Http\Request;

class EditTodoService extends Service
{

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
        $todo = $this->request->route('todo');
        if (!$todo) {
            return [false, null];
        }
        $todo->fill($this->request->all());
        if (!$todo->save()) {
            return [false, $this->table->getErrors()];
        }
        return [true, $todo->id];
    }
}
