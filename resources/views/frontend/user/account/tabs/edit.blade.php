{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>

@if ($logged_in_user->canChangeEmail())
    <div class="form-group">
        {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
        </div>
    </div>
@endif
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.tel'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'tel', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.qq'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'qq', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.we_chat'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'we_chat', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.real_name'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'real_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.gender'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.birthday'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.id_number'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('text', 'id_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.resume'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::textarea('text', 'resume', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.frontend.avatar'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('file', 'avatar', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
    </div>
</div>

{{ Form::close() }}