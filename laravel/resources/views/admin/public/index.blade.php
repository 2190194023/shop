
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/plugins/cleditor/jquery.cleditor.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">

<title>后台管理</title>

@section('css')

@show
</head>

<body>

    <!-- 头部开始 -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/admins/images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/uploads/{{ session('admin_user')->profile }}" alt="">
                </div>
                @if(session('admin_user'))
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello,{{ session('admin_user')->uname }}
                    </div>
                    <ul>
                        <li><a href="/admin/profile">修改头像</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="/admin/outlogin">退出</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
     <!-- 头部结束 -->
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>

            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#">
                            <i class="icon-user"></i>管理员管理</a>
                        <ul>
                            <li><a href="/admin/adminuser">浏览管理员</a></li>
                            <li><a href="/admin/adminuser/create">添加管理员</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#">
                            <i class="icon-add-contact"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/users">浏览用户</a></li>
                            <li><a href="/admin/users/create">添加用户</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#">
                            <i class="icon-users"></i>角色管理</a>
                        <ul>
                            <li><a href="/admin/roles">浏览角色</a></li>
                            <li><a href="/admin/roles/create">添加角色</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#">
                            <i class="icon-key-2"></i>权限管理</a>
                        <ul>
                            <li><a href="/admin/nodes">浏览权限</a></li>
                            <li><a href="/admin/nodes/create">添加权限</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- 内容开始 -->
            <div class="container">
                <!-- 读取提示消息 开始 -->
                    <!-- 错误提示 -->
                    @if(session('error'))
                    <div class="mws-form-message error">
                       {{ session('error') }} 
                    </div>
                    @endif

                    <!-- 正确提示 -->
                    @if(session('success'))
                    <div class="mws-form-message success">
                       {{ session('success') }} 
                    </div>
                    @endif
                <!-- 读取提示消息 结束 -->



                @section('content')

                @show
            </div>
            <!-- 内容开始 -->
                       
            <!-- 页脚开始 -->
            <div id="mws-footer">
                Copyright Your Website 2012. All Rights Reserved.
            </div>
            <!-- 页脚结束 -->
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/admins/jui/js/globalize/globalize.js"></script>
    <script src="/admins/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/admins/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/admins/plugins/select2/select2.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/admins/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/admins/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/admins/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/admins/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.formelements.js"></script>

</body>
</html>
