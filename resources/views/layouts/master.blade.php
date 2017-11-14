<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMS Campaign">
    <meta name="author" content="Ascent">
    <meta name="keyword" content="SMS campaign marketing phones health medical HIV AIDS">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>@if(isset($title)){{ $title }}@else PrepSms @endif</title>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-extended.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden footer-fixed">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
        <a href="#"><h2 style = "font-weight:900;margin-left:10px;">emitifo</h2></a>
        <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Directory</a>
            </li> 
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <!--<li class="nav-item d-md-down-none">
                <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/img/ava/boy-16.png" class="img-avatar" alt="admin">
                    <span class="d-md-down-none">John Smith (Marketing Officer)</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div> 
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a> 
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Campaigns<span class="badge badge-primary">42</span></a>
                    <div class="divider"></div> 
                    <a class="dropdown-item" href="/logout"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler aside-menu-toggler d-none" type="button">☰</button>

    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == "dashboard" ? 'active' : '' }}" href="/"><i class="icon-speedometer"></i> Dashboard </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="/subscribers"><i class="icon-people"></i> Subscribers </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="/campaign"><i class="fa fa-file-text"></i> Campaign </a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-inbox"></i> Inbox </a>
                    </li> -->  
                    <li class="nav-item">
                        <a class="nav-link" href="/keyword"><i class="fa fa-key"></i> Keywords </a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="/messages"><i class="fa fa-comments"></i> Messages </a>
                    </li>  
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-file-o"></i> Forms </a>
                    </li> -->  
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-phone"></i> Longcodes </a>
                    </li> -->   
                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">
        @yield('content')
        </main>
 


    </div>

    <footer class="app-footer">
        <a href="./landing.html">PREPSMS</a> © 2017 All Rights Reserved.
        <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="/js/jquery.min.js"></script> 
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/pace.min.js"></script>
    <script src="/js/tether.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="/js/Chart.min.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="/js/app.js"></script>
    <script src="/js/views/main.js"></script>

    @yield('import')
    @yield('script')

</body>

</html>