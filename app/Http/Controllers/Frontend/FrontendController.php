<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Job;
use App\Repositories\Frontend\Job\JobRepository;
use Auth;
use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @param JobRepository $job
     * @return \Illuminate\View\View
     */
    public function index(JobRepository $job)
    {
        return view('frontend.index')->withJobs($job->paginate(7));
    }

//	/**
//	 * @return \Illuminate\View\View
//	 */
//	public function macros()
//	{
//		return view('frontend.macros');
//	}
}
