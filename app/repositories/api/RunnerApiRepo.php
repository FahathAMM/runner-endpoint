<?php

namespace App\repositories\api;

use App\Models\Runner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class RunnerApiRepo
{

    public $model;

    public function __construct(Runner $model)
    {
        $this->model = $model;
    }

    public function store($request)
    {

        $validator = Validator::make($request->all(), [

            'name' => ['required'],
            'race_id' => ['required'],
            'age' => ['required'],
            'sex' => ['required'],
            'color' => ['required'],

        ]);

        if ($validator->fails()) {

            return response()->json(['success' => false, 'error' => $validator->getMessageBag()]);
        }
        try {
            $created = $this->model->create($request->all());
            if ($created) {
                return response()->json(['success' => true,  'message' => 'successfully added', 'data' => $created, 'status' => 200]);
            } else {
                return response()->json(['success' => false, 'message' => 'something wrong ']);
            }
        } catch (\Throwable $th) {
            return response()->json(throw $th);
        }
    }

    public function delete($id)
    {
        try {
            $deleted = $this->model->findOrFail($id)->delete($id);
            if ($deleted) {
                return response()->json(['success' => true,  'message' => 'successfully Deleted',   'status' => 200]);
            } else {
                return response()->json(['success' => false, 'message' => 'something wrong ']);
            }
        } catch (\Throwable $th) {
            return response()->json(throw $th);
        }
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
        } catch (\Throwable $th) {
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
