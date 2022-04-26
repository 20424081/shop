<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service
{
    protected $table;
    protected $request;
    protected $query;
    public function __construct(Request $request)
    {
        $this->table = new Model;
        $this->request = $request;
    }

    protected function validate()
    {
        return true;
    }

    public function handle()
    {
        return null;
    }
}
