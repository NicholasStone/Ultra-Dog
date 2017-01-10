<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $input = $request->only([
            'name',
            'email',
            'tel',
            'qq',
            'we_chat',
            'real_name',
            'gender',
            'birthday',
            'id_number',
            'university',
            'resume',
            'avatar',
        ]);
        if ($request->hasFile('avatar')) {
            $input['avatar'] = Storage::url($request->file('avatar')->store('public/avatars'));
        }
        $this->user->updateProfile(access()->id(), $input);

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }
}