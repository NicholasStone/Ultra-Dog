<?php
/**
 * Created by PhpStorm.
 * User: nicholas
 * Date: 17-1-11
 * Time: 下午3:44
 */

namespace app\Repositories\Frontend\Job;


use Auth;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Storage;

class JobRepository extends Repository
{
    const MODEL = Job::class;

    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * @param Request $request
     * @return JobRepository
     */
    public function create(Request $request)
    {
        $job = self::MODEL;
        $input = $request->only([
            'title',
            'reward',
            'describe',
            'max_hire',
            'location',
            'start_at',
            'maintain',
            'work_hours_pre_day',
        ]);
        $input['reward'] = number_format($input['reward'], 2, '.', '');
        $input['cover'] = Storage::url($request->file('cover')->store('public/jobs'));
        $job = new $job();
        $job->fill($input);
        $job->publisher_id = Auth::user()->id;
        $job->status = 0;
        $job->save();

        return $job;
    }

    public function updateJob(Request $request, $id)
    {
        $input = $request->only([
            'title',
            'reward',
            'describe',
            'max_hire',
            'location',
            'start_at',
            'maintain',
            'work_hours_pre_day',
        ]);
        $input['reward'] = number_format($input['reward'], 2, '.', '');
        if ($request->hasFile('cover')) {
            $input['cover'] = Storage::url($request->file('cover')->store('public/jobs'));
        }
        $job = $this->job->where('id', $id)->first();

        return parent::update($job, $input);
    }

    public function findPublishedByUser()
    {
        return Auth::user()->PublishedJobs;
    }

    public function findInvolvedByUser()
    {
        return Auth::user()->jobInvolved;
    }

    public function paginate($item_pre_page = 8)
    {
        return $this->job->paginate($item_pre_page);
    }
}