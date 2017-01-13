<?php

namespace App\Http\Controllers\Backend\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Job\JobRepository;

class JobController extends Controller
{
    protected $job;
    public function __construct(JobRepository $jobRepository)
    {
        $this->job = $jobRepository;
    }

    public function index()
    {
        $this->job->findAll();
    }

    public function get()
    {

    }
}
