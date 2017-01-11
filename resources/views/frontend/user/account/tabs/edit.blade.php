{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) }}

<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.name')]) }}
    </div>
</div>

@if ($logged_in_user->canChangeEmail())
    <div class="form-group">
        {{ Form::label('email', trans('validation.attributes.frontend.profile.email'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.email')]) }}
        </div>
    </div>
@endif
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.tel'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'tel', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.tel')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.qq'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'qq', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.qq')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.we_chat'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'we_chat', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.we_chat')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.real_name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'real_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.real_name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.gender.name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{--{{ Form::selectGender('gender',null,['class' => 'form-control']) }}--}}
        <label class="radio-inline">{{ Form::radio('gender','1') }} {{ trans('validation.attributes.frontend.profile.gender.male') }}</label>
        <label class="radio-inline">{{ Form::radio('gender','0') }} {{ trans('validation.attributes.frontend.profile.gender.female') }}</label>
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.birthday'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'birthday', null, ['class' => 'form-control flatpickr','placeholder' => trans('validation.attributes.frontend.profile.birthday')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.university'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'university', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.university')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.id_number'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'id_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.id_number')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.resume'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::textarea('resume', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.profile.resume')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.profile.avatar'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::text(null, null, ['class' => 'form-control', 'placeholder' =>  trans('validation.attributes.frontend.profile.avatar'), 'id' => 'avatar-filename', 'readonly']) }}
        {!! Form::fileUploadInput('avatar','avatar-file') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
    </div>
</div>

{{ Form::close() }}

@section('after-scripts')
    <script src="//cdn.bootcss.com/flatpickr/2.3.4/flatpickr.min.js"></script>
    <script>
        flatpickr(".flatpickr");
        var filename = document.querySelector("#avatar-filename");
        var file = document.querySelector("#avatar-file");
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