<header id="header-top" class="header-top">
    <ul>
        <li>
            <div class="header-top-left">
                <ul>
                    <li class="select-opt">
                        <select name="language" id="language">
                            <option value="default">EN</option>
                            <option value="Bangla">BN</option>
                            <option value="Arabic">AB</option>
                        </select>
                    </li>
                    <li class="select-opt">
                        <select name="currency" id="currency">
                            <option value="usd">USD</option>
                            <option value="euro">Euro</option>
                            <option value="bdt">BDT</option>
                        </select>
                    </li>
                    <li class="select-opt">
                        <a href="#"><span class="lnr lnr-magnifier"></span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="head-responsive-right pull-right">
            <div class="header-top-right">
                <ul>
                    <li class="header-top-contact">
                        +1 222 777 6565
                    </li>
                    <li class="header-top-contact">
                        <a href="{{ url('/login') }}">sign in</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{ url('/register') }}">register</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

</header>
<!--/.header-top-->
<!--header-top end -->

<!-- top-area Start -->
<section class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70"
            data-minus-value-mobile="55" data-speed="1000">

            <div class="container">

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/index') }}">Pro<span>App</span></a>

                </div>
                <!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class=" scroll "><a href="{{ url('/index') }}">home</a></li>
                        <li class="scroll"><a href="#works">how it works</a></li>
                        <li class="scroll"><a href="#explore">explore</a></li>
                        <li class="scroll"><a href="#reviews">review</a></li>
                        <li class="scroll"><a href="#blog">blog</a></li>
                        <li class="scroll"><a href="#contact">Properties</a></li>
                    </ul>
                    <!--/.nav -->
                </div><!-- /.navbar-collapse -->
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
        <!-- End Navigation -->
    </div>
    <!--/.header-area-->
    <div class="clearfix"></div>

</section><!-- /.top-area-->