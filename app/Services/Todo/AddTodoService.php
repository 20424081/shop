<?php

namespace App\Services\Todo;

use App\Models\Todo;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddTodoService extends Service
{

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->table   = new Todo();
    }

    protected function validate()
    {
        return true;
    }
    public function handle()
    {
        $this->table->task    = $this->request->input('task');
        $this->table->user_id = Auth::id();
        $this->table->done    = $this->request->input('done');
        if (!$this->table->save()) {
            return [false, $this->table->getErrors()];
        }
        return [true, $this->table->id];
    }
}
