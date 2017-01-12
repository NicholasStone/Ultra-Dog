<?php
/**
 * Created by PhpStorm.
 * User: nicholas
 * Date: 17-1-12
 * Time: 下午5:47
 */

namespace app\Repositories\Frontend\Job;


use App\Models\Access\User\User;
use App\Models\Job;
use App\Notifications\Frontend\Job\UserEnroll;
use Auth;
use App\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    protected $employee;

    const MODEL = Employee::class;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function findByID($id)
    {
        return $this->query()->where('id',$id)->first();
    }

    public function enroll($job_id)
    {
        $employee = self::MODEL;
        $employee = new $employee();
        $employee->user_id = Auth::id();
        $employee->job_id = $job_id;
        $employee->status = 0;

        $job = Job::find($job_id);
        $job->publisher->notify(new UserEnroll(Auth::user(), $job));

        return $employee->save();
    }

    public function isEnrolled($job_id)
    {
        return $this->employee->where('user_id', Auth::id())->where('job_id', $job_id)->first();
    }
}