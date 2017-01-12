@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object"
                                             src="{{ $logged_in_user->avatar or $logged_in_user->picture }}"
                                             alt="Profile picture" width="80">
                                    </div><!--media-left-->

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                        {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Notifications</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                    <div class="list-group">
                                        @foreach($logged_in_user->unreadNotifications as $notification)
                                            <a href="#" class="list-group-item">{{ $notification->data['message'] }}</a>
                                        @endforeach
                                    </div>
                                </div><!--panel-body-->
                            </div><!--panel-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Published Jobs</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Created At</th>
                                                    <th>Total Enrolled</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($logged_in_user->jobPublished as $job)
                                                    <tr>
                                                        <td>{{ link_to_route('frontend.jobs.show', $job->title, ['id'=>$job->id]) }}</td>
                                                        <td>{{ $job->created_at }}</td>
                                                        <td>{{ $job->employees->count() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                        </div><!--row-->

                    </div><!--col-md-8-->

                </div><!--row-->

            </div><!--panel body-->

        </div><!-- panel -->

    </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection