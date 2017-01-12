@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        @foreach($jobs as $job)
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('frontend.jobs.show',$job->id) }}">
                            <h3>{{ $job->title }}
                                <small>{{ $job->publisher->name }}</small>
                            </h3>
                        </a>
                    </div>

                    <div class="panel-body .shave">
                        {{ $job->describe }}
                    </div>
                </div><!-- panel -->
            </div><!-- col-md-12 -->
        @endforeach
        <div style="text-align: center">
            {{ $jobs->links() }}
        </div>
    </div><!--row-->
@endsection