<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Runner;
use App\repositories\api\runnerApiRepo;
use Illuminate\Http\Request;

class RunnersController extends Controller
{
    protected $model;
    protected $repo;

    public function __construct(Runner $model, RunnerApiRepo $repo)
    {
        $this->model = $model;
        $this->repo  = $repo;
    }

    public function index(Request $request)
    {
        try {
            return $this->repo->get($request);
        } catch (\Throwable $th) {
            return response()->json(throw $th);
        }
    }

    public function store(Request $request)
    {
        try {
            return $this->repo->store($request);
        } catch (\Throwable $th) {
            return response()->json(throw $th);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->repo->delete($id);
        } catch (\Throwable $th) {
            return response()->json(throw $th);
        }
    }
}
