<?php

$common = array(
    'main_container_navigation' => '<div id="main_container" class="container-fluid" style="position:absolute; z-index:99;padding: 0;">
                                        <div class="topBar padd5" style="display:none;z-index:3">
                                            <div class="container-fluid">
                                                <div class="row-fluid">
                                                    <div class="col-md-2 col-xs-2 text-left m-left paddLeftNone">
                                                        <div class="logo" style="display:none;"> <a href="index"><img style="height:100px;" src="images/obedient-logo.png"></a> </div>
                                                    </div>
                                                    <div class="col-md-1 col-xs-2 text-right navCWrap pull-right paddRightNone"></div>
                                                    <div class="col-md-10 col-menu pull-left text-right paddLeftNone">
                                                        <ul class="topMenu" style="opacity:1;">
                                                            <li id="project" class="" style="opacity:0"><a class="add-opacity" href="index">Home</a></li>
                                                            <li id="offices" class="" style="opacity:0"><a class="add-opacity" href="products">Products</a></li>
                                                            <li id="about" class="" style="opacity:0"><a class="add-opacity" href="legal">Legal</a></li>
                                                            <li id="serviceNav" class="" style="opacity:0"><a class="add-opacity" href="bankers">Bankers</a></li>
                                                            <li id="news" class="" style="opacity:0"><a class="add-opacity" href="gallery">Gallery</a></li>
                                                            <li id="career" class="" style="opacity:0"><a class="add-opacity" href="amenities">Amenities</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div style="overflow: hidden;">
                                                <div class="col-md-12 home-bg-img home-bg-img-animate-new" style="background-color:transparent">
                                                    <div class="row topHeader">
                                                        <div class="col-md-6 main-logo" style="opacity: 0;z-index:3" id="main-logo">
                                                            <a href="index"><img style="height:100px;" class="hbalogo" src="images/obedient-logo.png"></a>
                                                        </div>
                                                        <div class="col-md-6 nav-bar" style="padding:0;z-index:3" >
                                                            <div id="burgernavbar">
                                                                <div class="nav-bar1 hamburger1" style=" opacity: 0;"></div>
                                                                <div class="nav-bar2 hamburger2"  style=" opacity: 0;"></div>
                                                                <div class="nav-bar3 hamburger3" style="opacity: 0;"></div>
                                                            </div>
                                                            <div id="burgernavbarcancel" style="display:none;z-index:3;top: -20px; position: absolute;" class="navCanel"><a href="Javascript:void(0);" class="iconCancel"></a></div>
                                                        </div>
                                                    </div>
                                                    <div></div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>',
    'dotted_navigation' => '<div id="dotted-navigation" class="hide-on-home nav-menu">
                                <ul id="side-dotted-navigation" class="spy font-11 extrabold nav uppercase">
                                    <li><a href="index"><span>Home</span></a></li>
                                    <li><a href="products"><span>Products</span></a></li>
                                    <li><a href="legal"><span>Legal</span></a></li>
                                    <li><a href="bankers"><span>Bankers</span></a></li>
                                    <li><a href="gallery"><span>Gallery</span></a></li>
                                    <li><a href="amenities"><span>Amenities</span></a></li>
                                </ul>
                            </div>',
    'search_form' => '<div class="fs-searchform">
                            <form id="fs-searchform" class="v-center container" action="pages-search-results.html" method="get">
                                <input type="search" name="q" id="q" placeholder="Search on website.com" autocomplete="off">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <div class="recommended font-13 normal">
                                        <h5 class="rcm-title">Recommend Links;</h5>
                                        <a href="demo-antares.html">Quadra, Antares version</a>
                                        <a href="index">Beautiful Athena demo</a>
                                        <a href="elements-all.html">Awesome Quadra Elements</a>
                                        <a href="demo-feronia.html">Why i will use the Quadra?</a>
                                        <a href="demo-sun.html">Checkout the Sun demo</a>
                                        <a href="index">See 700+ templates</a>
                                    </div>
                            </form>
                            <div class="form-bg"></div>
                        </div>
                        <div id="error_message" class="clearfix">
                            <i class="fa fa-warning"></i>
                            <span>Validation error occured. Please enter the fields and submit it again.</span>
                        </div>
                        <div id="submit_message" class="clearfix">
                            <i class="fa fa-check"></i>
                            <span>Thank You ! Your email has been delivered.</span>
                        </div>'
);
?>