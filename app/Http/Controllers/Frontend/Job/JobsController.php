<?php

namespace App\Http\Controllers\Frontend\Job;

use App\Repositories\Frontend\Job\EmployeeRepository;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Job\JobRepository;
use App\Http\Requests\Frontend\Job\JobEditRequest;

class JobsController extends Controller
{
    protected $job;
    protected $employee;

    public function __construct(JobRepository $job, EmployeeRepository $employeeRepository)
    {
        $this->job = $job;

        $this->employee = $employeeRepository;

        $this->middleware('needs-complete-info', ['except' => ['index', 'destroy']]);

        $this->middleware('admin', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()
            ->route("frontend.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("frontend.jobs.edit")->withJob(null)->withEdit(false);
    }

    /**
     * Store a newly created resource in storage.
     * @middleware("job")
     * @param JobEditRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobEditRequest $request)
    {
        $this->job->create($request);

        return redirect()
            ->route('frontend.user.account')
            ->withFlashSuccess(trans('alerts.frontend.jobs.publish.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("frontend.jobs.show")
            ->withEnrolled(empty($this->employee->isEnrolled($id)) ? false : true)
            ->withJob($this->job->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("frontend.jobs.edit")->withJob($this->job->find($id))->withEdit(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->job->updateJob($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->job->where('id', $id)->delete();
    }
}
