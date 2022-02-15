<?php

namespace App\repositories\api;

use App\Models\Runner;

class RunnerApiRepo
{

    public $model;

    public function __construct(Runner $model)
    {
        $this->model = $model;
    }

    public function get($request)
    {
        try {
            if ($this->validateRunner($request->runnerId)) {
                // here we can get all runners with history via pagination
                // $runners = $this->model->with('lastRuns', 'lastForms', 'race', 'race.meeting')->paginate($this->page());

                // here we can get single a runner with history
                $runner = $this->model->with('lastRuns', 'formData', 'race', 'race.meeting')->findOrFail($request->runnerId);
                return response()->json(['success' => true, 'data' => $runner, 'status' => 200]);

            } else {
                return response()->json(['success' => false, 'message' => 'data not found ']);
            }

        } catch (\Throwable$th) {
            return response()->json(throw $th);

        }
    }

    private function page()
    {
        return config('pagination.pagination.default');
    }

    private function validateRunner($runnerId)
    {
        return $this->model->where('id', $runnerId)->exists();
    }

}
