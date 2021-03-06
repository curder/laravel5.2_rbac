@extends('admin.layouts.base')
@section('content')
    <div class="col-md-10 col-sm-9">
        <div class="panel row">
            <div class="panel-heading">
                @if( IS_ROOT || Entrust::can('admin.role.edit') )<a href="{{ route('admin.role.index') }}" class="disabled"> 角色管理 </a> &nbsp;@endif
                @if( IS_ROOT || Entrust::can('admin.role.create') )<a href="{{ route('admin.role.create') }}" class=""> 新增角色 </a> &nbsp;@endif
            </div>
        </div><!--toolBar start-->
        <!-- 列表开始 -->
        <div class="panel row" id="admin-panel-list">
            <div class="panel-heading">
                <strong>角色管理</strong> <span class="pull-right">共 <strong>{{ $data->total() }}</strong> 记录</span>
            </div>
            <div class="panel-collapse">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">
                            UID
                        </th>
                        <th class="text-center">
                            角色英文名
                        </th>
                        <th class="text-center">
                            角色中文名
                        </th>
                        <th class="text-center">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $role)
                        <tr id="tr_{{ $role->id }}">
                            <td class="text-center">{{ $role->id }}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">{{ $role->display_name }}</td>
                            <td class="text-center">
                                @if( IS_ROOT || Entrust::can('admin.role.edit') )<a href="{{ route('admin.role.edit',$role->id) }}">修改</a>&nbsp;@endif
                                    @if( IS_ROOT || Entrust::can('admin.user.show') )<a href="{{ route('admin.role.show',$role->id) }}" > 授权</a>&nbsp;@endif
                                {{--<a href="/backend.php/User/changeStatus/status/forbid/ids/2/model/User.html" class="jsoner">禁用</a>&nbsp;
                                <a href="/backend.php/User/changeStatus/status/delete/ids/2/model/User.html" class="deleter">删除</a>&nbsp;--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $data->render() !!}
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
@stop