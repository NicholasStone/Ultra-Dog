@extends ('backend.layouts.app')

@section ('title', 'Job Management')

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ 'Job Management' }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">All Jobs</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="jobs-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Publisher</th>
                            <th>Status</th>
                            <th>Max Hire</th>
                            <th>Reward</th>
                            <th>Start at</th>
                            <th>Maintain</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    {{--<div class="box box-info">--}}
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>--}}
            {{--<div class="box-tools pull-right">--}}
                {{--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>--}}
            {{--</div><!-- /.box tools -->--}}
        {{--</div><!-- /.box-header -->--}}
        {{--<div class="box-body">--}}
            {{--{!! history()->renderType('Role') !!}--}}
        {{--</div><!-- /.box-body -->--}}
    {{--</div><!--box box-success-->--}}
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#jobs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.jobs.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'permissions', name: '{{config('access.permissions_table')}}.display_name', sortable: false},
                    {data: 'users', name: 'users', searchable: false, sortable: false},
                    {data: 'sort', name: '{{config('access.roles_table')}}.sort', render: $.fn.dataTable.render.text()},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop