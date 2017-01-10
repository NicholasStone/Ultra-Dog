<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ asset($logged_in_user->avatar ? $logged_in_user->avatar : $logged_in_user->picture) }}"
                 class="user-profile-image" style="max-width: 500px"/></td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.tel') }}</th>
        <td>{{ $logged_in_user->tel }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.qq') }}</th>
        <td>{{ $logged_in_user->qq }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.we_chat') }}</th>
        <td>{{ $logged_in_user->we_chat }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.real_name') }}</th>
        <td>{{ $logged_in_user->real_name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.gender.name') }}</th>
        <td>@if($logged_in_user->gender != null)
                {{ $logged_in_user->gender ? trans('validation.attributes.frontend.gender.male'):trans('validation.attributes.frontend.gender.female') }}
            @else
                未知
            @endif
        </td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.birthday') }}</th>
        <td>{{ $logged_in_user->birthday }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.id_number') }}</th>
        <td>{{ $logged_in_user->id_number }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.university') }}</th>
        <td>{{ $logged_in_user->university }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.resume') }}</th>
        <td>{{ $logged_in_user->resume }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>