<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $company_id = $request->input('company');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $category = $request->input('category');

        $salary_from = $request->input('salary_from');
        $salary_to = $request->input('salary_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if ($id) {
            $job = Job::find($id);

            if ($job) {
                return ResponseFormatter::success(
                    $job,
                    'Data job berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data job tidak ada',
                    404
                );
            }
        }

        $job = Job::with(['company', 'user']);

        if ($company_id) {
            $job->where('company_id', $company_id);
        }
        if ($name) {
            $job->where('name', 'like', '%' . $name . '%');
        }
        if ($category) {
            $job->where('category', 'like', '%' . $category . '%');
        }
        if ($salary_from) {
            $job->where('salary', '>=', $salary_from);
        }
        if ($salary_to) {
            $job->where('salary', '<=', $salary_to);
        }
        if ($rate_from) {
            $job->where('rate', '>=', $rate_from);
        }
        if ($rate_to) {
            $job->where('rate', '<=', $rate_to);
        }

        return ResponseFormatter::success(
            $job->paginate($limit),
            'Data list job berhasil diambil'
        );
    }
}
