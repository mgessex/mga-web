
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/xenon-core.css">
    <link rel="stylesheet" href="/css/xenon-forms.css">
    <link rel="stylesheet" href="/css/xenon-components.css">
    <link rel="stylesheet" href="/css/xenon-skins.css">
    <link rel="stylesheet" href="/css/custom.css">

    <script src="/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body">

    <!-- Logged-in User Settings Pane -->
    <div class="settings-pane">
            
        <a href="#" data-toggle="settings-pane" data-animate="true">
            &times;
        </a>
        
        <div class="settings-pane-inner">
            
            <div class="row">
                
                <div class="col-md-4">
                    
                    <div class="user-info">
                        
                        <div class="user-image">
                            <a href="extra-profile.html">
                                <img src="/images/user-2.png" class="img-responsive img-circle" />
                            </a>
                        </div>
                        
                        <div class="user-details">
                            
                            <h3>
                                <a href="extra-profile.html">John Smith</a>
                                
                                <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                                <span class="user-status is-online"></span>
                            </h3>
                            
                            <p class="user-title">Web Developer</p>
                            
                            <div class="user-links">
                                <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                                <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="col-md-8 link-blocks-env">
                    
                    <div class="links-block left-sep">
                        <h4>
                            <span>Notifications</span>
                        </h4>
                        
                        <ul class="list-unstyled">
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                <label for="sp-chk1">Messages</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                <label for="sp-chk2">Events</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                <label for="sp-chk3">Updates</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                <label for="sp-chk4">Server Uptime</label>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="links-block left-sep">
                        <h4>
                            <a href="#">
                                <span>Help Desk</span>
                            </a>
                        </h4>
                        
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Support Center
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Submit a Ticket
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Domains Protocol
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Terms of Service
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                
            </div>
        
        </div>
        
    </div>
    
    <nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
        
        <div class="navbar-inner">
        
            <!-- Navbar Brand -->
            <div class="navbar-brand">
                <a href="dashboard-1.html" class="logo">
                    <img src="/images/logo-white-bg@2x.png" width="80" alt="" class="hidden-xs" />
                    <img src="/images/logo@2x.png" width="80" alt="" class="visible-xs" />
                </a>
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>
            </div>
                
            <!-- Mobile Toggles Links -->
            <div class="nav navbar-mobile">
            
                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle">
                    
                    <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                    <a href="#" data-toggle="settings-pane" data-animate="true">
                        <i class="linecons-cog"></i>
                    </a>
                    
                    <!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
                    <!-- data-toggle="mobile-menu" will show sidebar menu links only -->
                    <!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
                    <a href="#" data-toggle="mobile-menu-horizontal">
                        <i class="fa-bars"></i>
                    </a>
                </div>
                
            </div>
            
            <div class="navbar-mobile-clear"></div>
            
            
            
            <!-- main menu -->
            {!! $appNavBar->asUl( array('class' => 'navbar-nav') ) !!}
                    
            
            <!-- notifications and other links -->
            <ul class="nav nav-userinfo navbar-right">
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="dropdown user-profile">
                    <a href="#" data-toggle="dropdown">
                        <!-- <img src="/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" /> -->
                        <span>
                            {{ Auth::user()->name }}
                            <i class="fa-angle-down"></i>
                        </span>
                    </a>
                    
                    <ul class="dropdown-menu user-profile-menu list-unstyled">
                        <li>
                            <a href="/home/myprofile">
                                <i class="fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="/home/settings">
                                <i class="fa-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="/home/help">
                                <i class="fa-info"></i>
                                Help
                            </a>
                        </li>
                        <li class="last">
                            <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa-lock"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
                
            </ul>
    
        </div>
        
    </nav>
    
    <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
        
        <div class="main-content">
            <div class="page-title">
                        
                @yield('pagetitle')

                @include('components.breadcrumb')
                
            </div>

            @include('components.flashmsg')
            
            @yield('content')
            
            <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">
                
                <div class="footer-inner">
                
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; 2014 
                        <strong>Xenon</strong> 
                        theme by <a href="http://laborator.co" target="_blank">Laborator</a> - <a href="http://themeforest.net/item/xenon-bootstrap-admin-theme/9059661?ref=Laborator" target="_blank">Purchase for only <strong>23$</strong></a>
                    </div>
                    
                    
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                    
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                        
                    </div>
                    
                </div>
                
            </footer>
        </div>
    </div>

    <!-- Bottom Scripts -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/TweenMax.min.js"></script>
    <script src="/js/resizeable.js"></script>
    <script src="/js/joinable.js"></script>
    <script src="/js/xenon-api.js"></script>
    <script src="/js/xenon-toggles.js"></script>

    <!-- Imported scripts on this page -->
    @yield('bottomScripts')

    <!-- JavaScripts initializations and stuff -->
    <script src="/js/xenon-custom.js"></script>

</body>
</html>