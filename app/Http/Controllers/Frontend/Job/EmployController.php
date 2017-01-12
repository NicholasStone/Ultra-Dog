<?php

namespace App\Http\Controllers\Frontend\Job;

use Auth;
use App\Notifications\Frontend\Job\UserHired;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Job\EmployeeRepository;
use Illuminate\Support\Facades\Notification;

class EmployController extends Controller
{
    protected $employee;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employee = $employeeRepository;
    }

    public function enroll($id)
    {
        $response = redirect()
            ->route('frontend.jobs.show', $id);
        if (!$this->employee->isEnrolled($id)) {
            $this->employee->enroll($id);
            $response = $response
                ->withFlashSuccess('success');
        } else {
            $response = $response
                ->withFlashDanger('you have joined');
        }

        return $response;
    }

    public function hire($id)
    {
        $enroll = $this->employee->findByID($id);
        $enroll->status = 1;
        $enroll->save();

        Notification::send($enroll->user, new UserHired($enroll->job));

        return redirect()
            ->route('frontend.jobs.show', $enroll->job->id)
            ->withFlashSuccess('Hire Success');
    }
}
