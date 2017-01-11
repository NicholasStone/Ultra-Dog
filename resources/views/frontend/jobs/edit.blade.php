@extends('frontend.layouts.app')

@section('content')
    <div class="panel panel-default">
        <header class="panel-heading">
            兼职信息发布
        </header>
        <main class="panel-body">
            {{ Form::model($job,['route' => $edit?['frontend.jobs.update',$job->id]:'frontend.jobs.store', 'class' => 'form-horizontal', 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'id' => 'job-form']) }}
            <div class="form-group">
                {{ Form::label('title', trans('labels.frontend.job.title') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::input('text', 'title', old('title'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.title')]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('reward', trans('labels.frontend.job.reward') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">￥</span>
                        {{ Form::input('text', 'reward', old('reward'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.reward')]) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('start_at', trans('labels.frontend.job.start_at') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::input('text', 'start_at', old('start_at'), ['class' => 'form-control flatpickr', 'placeholder' => trans('validation.attributes.frontend.job.start_at')]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('max_hire', trans('labels.frontend.job.max_hire') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    <div class="input-group">
                        {{ Form::input('text', 'max_hire', old('max_hire'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.max_hire')]) }}
                        <span class="input-group-addon">人</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('location', trans('labels.frontend.job.location') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::input('text', 'location', old('location'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.location')]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('maintain', trans('labels.frontend.job.maintain') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    <div class="input-group">
                        {{ Form::input('text', 'maintain', old('maintain'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.maintain')]) }}
                        <span class="input-group-addon">天</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('work_hours_pre_day', trans('labels.frontend.job.work_hours_pre_day') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    <div class="input-group">
                        {{ Form::input('text', 'work_hours_pre_day', old('work_hours_pre_day'), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.work_hours_pre_day')]) }}
                        <span class="input-group-addon">小时</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('cover', trans('labels.frontend.job.cover') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::text(null, null, ['class' => 'form-control', 'placeholder' =>  trans('validation.attributes.frontend.job.cover'), 'id' => 'cover-filename', 'readonly']) }}
                    {!! Form::fileUploadInput('cover','cover-file') !!}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('describe', trans('labels.frontend.job.describe') ,['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::textarea('describe', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.job.describe')]) }}
                </div>
            </div>
            {{ Form::close() }}
        </main>
        <footer class="panel-footer">
            <button type="submit" class="btn btn-primary"
                    form="job-form">{{ trans('labels.general.buttons.save') }}</button>
        </footer>
    </div>
@endsection


@section('after-scripts')
    <script src="//cdn.bootcss.com/flatpickr/2.3.4/flatpickr.min.js"></script>
    <script>
        flatpickr(".flatpickr", {
            enableTime: true
        });
        var filename = document.querySelector("#cover-filename");
        var file = document.querySelector("#cover-file");
        filename.addEventListener('click', function () {
            file.click();
        });
        file.addEventListener("change", function () {
            filename.value = file.files[0].name;
        });
    </script>
@endsection

@section('after-styles')
    <link href="//cdn.bootcss.com/flatpickr/2.3.4/flatpickr.min.css" rel="stylesheet">
@endsection