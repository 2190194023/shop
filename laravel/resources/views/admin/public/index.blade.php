
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

<title>MWS Admin - Form Elements</title>

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
                    <img src="/admins/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </div>
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
                        <a href="JavaScript:;"><i class="icon-list"></i> 用户管理</a>
                        <ul>
                            <li><a href="form_layouts.html">用户列表</a></li>
                            <li><a href="form_elements.html">用户添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active">
                        <a href="JavaScript:;"><i class="icon-list"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">分类列表</a></li>
                            <li><a href="/admin/cates/create">分类添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active">
                        <a href="JavaScript:;"><i class="icon-list"></i> 商品管理</a>
                        <ul>
                            <li><a href="/admin/goods">商品列表</a></li>
                            <li><a href="/admin/goods/create">商品添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active">
                        <a href="JavaScript:;"><i class="icon-list"></i> 商品图片管理</a>
                        <ul>
                            <li><a href="/admin/goodsimg">商品图片列表</a></li>
                            <li><a href="/admin/goodsimg/create">图片添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active">
                        <a href="JavaScript:;"><i class="icon-list"></i>秒杀管理</a>
                        <ul>
                            <li><a href="/admin/miao">秒杀商品列表</a></li>
                            <li><a href="/admin/miao/create">添加秒杀商品</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active">
                        <a href="JavaScript:;"><i class="icon-list"></i>活动管理</a>
                        <ul>
                            <li><a href="/admin/dong">活动列表</a></li>
                            <li><a href="/admin/dong/create">添加活动</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- 内容开始 -->
            <div class="container">
            	<div style="margin:0 auto;">
	        	@if(session('success'))
				<div class="bs-example" data-example-id="dismissible-alert-css">
				    <div class="alert alert-success alert-dismissible" role="alert">
				      
				      <strong>{{ session('success') }}</strong> 
				    </div>
				  </div>
				@endif

				@if(session('error'))
				<div class="bs-example" data-example-id="dismissible-alert-css">
				    <div class="alert alert alert-danger alert-dismissible" role="alert">
				     
				      <strong>{{ session('error') }}</strong> 
				    </div>
				  </div>
				@endif
		</div>
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
