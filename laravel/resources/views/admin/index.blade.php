@extends('admin.public.index')

@section('content')
    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> 我的首页</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            
                            <tbody>

                                <tr><td colspan="2" align='center'>欢迎管理员：
                                <span class="x-red">test</span>！当前时间:<span></span></td></tr>
                                <tr><td colspan="2" align='center'><div class="layui-card-header">系统信息</div></td></tr>
                                <tr>
                                        <th>版本</th>
                                        <td>测试版</td></tr>
                                    <tr>
                                        <th>服务器地址</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>操作系统</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>运行环境</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>PHP版本</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>PHP运行方式</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>MYSQL版本</th>
                                        <td>5.5.53</td></tr>
                                    <tr>
                                        <th>Laravel</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>表单上传附件限制</th>
                                        <td></td></tr>
                                    <tr>
                                    <tr>
                                        <th>服务器上传附件限制</th>
                                        <td></td></tr>
                                    <tr>
                                        <th>执行时间限制</th>
                                        <td>30s</td></tr>
                            </tbody>
                        </table>
                    </div>
    </div>
    <CENTER>
    <div>Copyright Your Website 2012. All Rights Reserved.</div>
    <div>开发者ODX.69c.shop</div>
    <div>Copyright Your Website 19201. All Rights Reserved.</div>
    <div>GANXIE</div>
@endsection