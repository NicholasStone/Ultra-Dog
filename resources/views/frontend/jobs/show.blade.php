@extends('frontend.layouts.app')

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <header class="panel-heading">
                <h1>{{ $job->title }}</h1>
            </header>
            <main class="panel-body">
                {{ $job->publisher->name }} <br>
                {{ $job->describe }}
            </main>
            <footer class="panel-footer">
                @if($logged_in_user->id == $job->publisher_id)
                    {{ link_to_route('frontend.jobs.edit','edit',['id'=>$job->id],['class' => 'btn btn-default']) }}
                @elseif($enrolled)
                    You has already enrolled
                @else
                    {{ link_to_route('frontend.jobs.enroll','join',['id'=>$job->id],['class' => 'btn btn-default']) }}
                @endif
            </footer>
        </div>

        @if($logged_in_user->id == $job->publisher_id)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Enroll user</th>
                    <th>Post time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($job->enrolls as $enroll)
                    <tr>
                        <td>{{ $enroll->user->name }}</td>
                        <td>{{ $enroll->created_at }}</td>
                        <td>
                            @if($enroll->status != 1)
                                {{ link_to_route('frontend.jobs.hire','HIRE',['id'=>$enroll->id],['class'=>'btn btn-success btn-sm']) }}
                            @else
                                Hired
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection