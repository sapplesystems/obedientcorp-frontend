<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>
<style>
    .Preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #040406;
        z-index: 99999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .Preloader__Spinner {
        width: 300px;
        min-width: 200px;
        max-width: 80%;
        animation: Blink 1s ease-in-out infinite;
        -webkit-animation: Blink 1s ease-in-out infinite;
    }

    @keyframes Blink {
        0% {
            opacity: 1
        }

        50% {
            opacity: 0.5
        }

        100% {
            opacity: 1
        }
    }

    @-webkit-keyframes Blink {
        0% {
            opacity: 1
        }

        50% {
            opacity: 0.5
        }

        100% {
            opacity: 1
        }
    }

    @media (max-width:800px) and (orientation: portrait) {
        .Preloader__Spinner {
            width: 10vw;
            display: block;
        }
    }

    #pop-on-load {
        display: none;
    }
</style>

<div id="Preloader" class="Preloader" /> <img style="height:200px;" class="Black" src="images/obedient-logo.png" alt="Logo" /> </div>

<!-- LOADER -->
<!-- <div class="page-loader bg-white">
     <div class="v-center">
         <div class="loader-square bg-colored"></div>
     </div>
 </div> -->

<!-- Wrapper -->
<?php echo $common['main_container_navigation']; ?>


<section id="wrapper">
    <?php echo $common['dotted_navigation']; ?>
    <!-- End Dotted Navigation -->


    <!--    Made by Erik Terwan    -->
    <!--   24th of November 2015   -->
    <!--        MIT License        -->

    <!-- ALL SECTIONS -->
    <section id="content">
        <!-- HOME SECTION -->


        <!--<a href="index.php" class="logoHeaderMain"><img style="height:120px;" src="images/obedient-logo.png" alt="" /></a>-->
        <!-- CONTENT -->
        <section id="home" class="Intro" id="intro">
            <div class="StevenCarousel">

                <div class="CarouselItem" data-clip-mobile="center" data-clip-x="55%" data-clip-y="65%">
                    <div id="rev_slider_1066_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="notgeneric125" data-source="gallery" style="background-color:transparent;padding:0px;">
                        <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                        <div id="rev_slider_1066_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                            <ul>
                                <!-- SLIDE -->
                                <li data-index="rs-3004" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="images/rs/img/notgeneric_bg1-100x50.jpg" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3004-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap;text-transform:left;">Welcome to Obedient Group </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme" id="slide-3004-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap;text-transform:left;">REAL ESTATE & CONSUMER GOODS </div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme" id="slide-3004-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-compass"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a /> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption rev-scroll-btn " id="slide-3004-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li data-index="rs-3005" data-transition="fadetotopfadefrombottom" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="images/rs/img/notgeneric_bg5-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Chill" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg5.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 6 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-3" id="slide-3005-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: nowrap;text-transform:left;">Move Yo Mouse </div>

                                    <!-- LAYER NR. 7 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-3005-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; white-space: nowrap;text-transform:left;">REVOLUTION SLIDER TEMPLATE </div>

                                    <!-- LAYER NR. 8 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme rs-parallaxlevel-1" id="slide-3005-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-mouse"></i> </div>

                                    <!-- LAYER NR. 9 -->
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a /> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 10 -->
                                    <div class="tp-caption rev-scroll-btn " id="slide-3005-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>

                                    <!-- LAYER NR. 11 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-8" id="slide-3005-layer-10" data-x="['left','left','left','left']" data-hoffset="['680','680','680','680']" data-y="['top','top','top','top']" data-voffset="['632','632','632','632']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-pendulum" data-easing="linearEaseNone" data-startdeg="-20" data-enddeg="360" data-speed="35" data-origin="50% 50%"><img src="images/rs/img/blurflake4.png" alt="" data-ww="['240px','240px','240px','240px']" data-hh="['240px','240px','240px','240px']" width="240" height="240" data-no-retina> </div>
                                    </div>

                                    <!-- LAYER NR. 12 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-7" id="slide-3005-layer-11" data-x="['left','left','left','left']" data-hoffset="['948','948','948','948']" data-y="['top','top','top','top']" data-voffset="['487','487','487','487']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-wave" data-speed="20" data-angle="0" data-radius="50px" data-origin="50% 50%"><img src="images/rs/img/blurflake3.png" alt="" data-ww="['170px','170px','170px','170px']" data-hh="['170px','170px','170px','170px']" width="170" height="170" data-no-retina> </div>
                                    </div>

                                    <!-- LAYER NR. 13 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-4" id="slide-3005-layer-12" data-x="['left','left','left','left']" data-hoffset="['719','719','719','719']" data-y="['top','top','top','top']" data-voffset="['200','200','200','200']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-rotate" data-easing="Power2.easeInOut" data-startdeg="-20" data-enddeg="360" data-speed="20" data-origin="50% 50%"><img src="images/rs/img/blurflake2.png" alt="" data-ww="['50px','50px','50px','50px']" data-hh="['51px','51px','51px','51px']" width="50" height="51" data-no-retina> </div>
                                    </div>

                                    <!-- LAYER NR. 14 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-6" id="slide-3005-layer-13" data-x="['left','left','left','left']" data-hoffset="['187','187','187','187']" data-y="['top','top','top','top']" data-voffset="['216','216','216','216']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-wave" data-speed="4" data-angle="0" data-radius="10" data-origin="50% 50%"><img src="images/rs/img/blurflake1.png" alt="" data-ww="['120px','120px','120px','120px']" data-hh="['120px','120px','120px','120px']" width="120" height="120" data-no-retina> </div>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li data-index="rs-3006" data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="images/rs/img/notgeneric_bg2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Enjoy Nature" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg2.jpg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 15 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3006-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index: 19; white-space: nowrap;text-transform:left;">Smooth Ken Burns </div>

                                    <!-- LAYER NR. 16 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme" id="slide-3006-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 20; white-space: nowrap;text-transform:left;">REVOLUTION SLIDER TEMPLATE </div>

                                    <!-- LAYER NR. 17 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme" id="slide-3006-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 21; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-expand1"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a /> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 19 -->
                                    <div class="tp-caption rev-scroll-btn " id="slide-3006-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 23; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li data-index="rs-3007" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="images/rs/img/iceberg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Iceberg" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/iceberg.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- BACKGROUND VIDEO LAYER -->
                                    <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-videomp4="images/rs/videos/iceberg.mp4" data-videopreload="auto" data-videoloop="loopandnoslidestop" data-forceCover="1" data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false"></div>
                                    <!-- LAYER NR. 20 -->
                                    <div class="tp-caption tp-shape tp-shapewrapper  " id="slide-3007-layer-10" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 24;text-transform:left;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>

                                    <!-- LAYER NR. 21 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3007-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index: 25; white-space: nowrap;text-transform:left;">Stay Cool Mate </div>

                                    <!-- LAYER NR. 22 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme" id="slide-3007-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 26; white-space: nowrap;text-transform:left;">REVOLUTION SLIDER TEMPLATE </div>

                                    <!-- LAYER NR. 23 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme" id="slide-3007-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 27; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-anchor"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a /> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 25 -->
                                    <div class="tp-caption rev-scroll-btn " id="slide-3007-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 29; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li data-index="rs-3008" data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="images/rs/img/notgeneric_bg3-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Hiking" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg3.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 26 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme" id="slide-3008-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.1,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index: 30; white-space: nowrap;text-transform:left;">Want this too? </div>

                                    <!-- LAYER NR. 27 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme" id="slide-3008-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 31; white-space: nowrap;text-transform:left;">GET SLIDER REVOLUTION TODAY </div>

                                    <!-- LAYER NR. 28 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme" id="slide-3008-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 32; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-diamond"></i> </div>

                                    <!-- LAYER NR. 29 -->
                                    <div class="tp-caption rev-scroll-btn " id="slide-3008-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 33; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a /> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin" id="slide-3004-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[30,30,30,30]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[30,30,30,30]" style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>
                                </li>
                            </ul>
                            <div style="" class="tp-static-layers">

                                <!-- LAYER NR. 31 -->
                                <!--<div class="tp-caption tp-shape tp-shapewrapper   tp-static-layer"
                                         id="slider-1066-layer-5"
                                         data-x="['left','left','left','center']" data-hoffset="['30','30','30','0']"
                                         data-y="['top','top','top','top']" data-voffset="['30','30','30','30']"
                                                                data-width="150"
                                        data-height="70"
                                        data-whitespace="nowrap"
        
                                        data-type="shape"
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"ease":"nothing"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
        
                                        style="z-index: 35;text-transform:left;background-color:rgba(0, 0, 0, 0);border-color:rgba(255, 255, 255, 0.15);border-style:solid;border-width:1px;"> </div>-->

                                <!-- LAYER NR. 32 -->
                                <!-- <div class="tp-caption   tp-static-layer"
                                         id="slider-1066-layer-2"
                                         data-x="['left','left','left','center']" data-hoffset="['60','60','60','0']"
                                         data-y="['top','top','top','top']" data-voffset="['45','45','45','45']"
                                                                data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
        
                                        data-type="image"
                                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-3004","delay":""}]'
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"auto:auto;","ease":"nothing"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
        
                                        style="z-index: 36;text-transform:left;border-width:0px;cursor:pointer;"><img src="images/rs/img/generic-icon.png" alt="" data-ww="['90px','90px','90px','90px']" data-hh="['40px','40px','40px','40px']" width="180" height="80" data-no-retina> </div> -->

                                <!-- LAYER NR. 33 -->
                                <!--<div class="tp-caption NotGeneric-BigButton rev-btn  tp-static-layer"
                                         id="slider-1066-layer-7"
                                         data-x="['left','left','left','left']" data-hoffset="['190','190','190','190']"
                                         data-y="['top','top','top','top']" data-voffset="['29','29','29','29']"
                                                                data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-visibility="['on','on','off','off']"
        
                                        data-type="button"
                                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-3004","delay":""}]'
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[27,27,27,27]"
                                        data-paddingright="[30,30,30,30]"
                                        data-paddingbottom="[27,27,27,27]"
                                        data-paddingleft="[30,30,30,30]"
        
                                        style="z-index: 37; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">INTRO </div>-->

                                <!-- LAYER NR. 34 -->
                                <!--<div class="tp-caption NotGeneric-BigButton rev-btn  tp-static-layer"
                                         id="slider-1066-layer-8"
                                         data-x="['left','left','left','left']" data-hoffset="['668','668','668','668']"
                                         data-y="['top','top','top','top']" data-voffset="['30','30','30','30']"
                                                                data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-visibility="['on','on','off','off']"
        
                                        data-type="button"
                                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-3007","delay":""}]'
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[27,27,27,27]"
                                        data-paddingright="[30,30,30,30]"
                                        data-paddingbottom="[27,27,27,27]"
                                        data-paddingleft="[30,30,30,30]"
        
                                        style="z-index: 38; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">VIDEO </div>-->

                                <!-- LAYER NR. 35 -->
                                <!--<div class="tp-caption NotGeneric-BigButton rev-btn  tp-static-layer"
                                         id="slider-1066-layer-9"
                                         data-x="['left','left','left','left']" data-hoffset="['488','488','488','488']"
                                         data-y="['top','top','top','top']" data-voffset="['30','30','30','30']"
                                                                data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-visibility="['on','on','off','off']"
        
                                        data-type="button"
                                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-3006","delay":""}]'
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[27,27,27,27]"
                                        data-paddingright="[30,30,30,30]"
                                        data-paddingbottom="[27,27,27,27]"
                                        data-paddingleft="[30,30,30,30]"
        
                                        style="z-index: 39; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">KEN BURNS </div>-->

                                <!-- LAYER NR. 36 -->
                                <!--<div class="tp-caption NotGeneric-BigButton rev-btn  tp-static-layer"
                                         id="slider-1066-layer-10"
                                         data-x="['left','left','left','left']" data-hoffset="['320','320','320','320']"
                                         data-y="['top','top','top','top']" data-voffset="['30','30','30','30']"
                                                                data-width="none"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-visibility="['on','on','off','off']"
        
                                        data-type="button"
                                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-3005","delay":""}]'
                                        data-basealign="slide"
                                        data-responsive_offset="off"
                                        data-responsive="off"
                                        data-startslide="0"
                                        data-endslide="4"
                                        data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[27,27,27,27]"
                                        data-paddingright="[30,30,30,30]"
                                        data-paddingbottom="[27,27,27,27]"
                                        data-paddingleft="[30,30,30,30]"
        
                                        style="z-index: 40; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">PARALLAX </div>-->
                            </div>
                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                        </div>
                    </div><!-- END REVOLUTION SLIDER -->
                </div>
            </div>
        </section>
        <!-- END CONTENT -->

        <!-- END HOME SECTION -->


        <!-- FACTS -->
        <section id="facts" class="clearfix ">
            <!-- Left Texts, buttons and facts -->
            <div class="left-details bg-gradient white">
                <!-- Texts -->
                <h2 class="white no-pm uppercase">Who are we? What we do?
                    <div>
                        <a href="#" data-toggle="modal" data-target="#modal-11" id="pop-on-load" class="lg-btn bg-colored1 white radius-lg slow bs-lg-hover"> </a>
                    </div>
                </h2>
                <h2 class="white no-pm uppercase light">Read more about us.</h2>
                <h4 class="description white light">Obedient Group is a customer oriented group with quality, high moral values and global vision. With Reach to global brands it stands No-1 in Prayagraj and very soon will become No-1 in India.</h4>
                <!-- Buttons -->
                <div class="buttons light">
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                        <span>Who are we?</span> About company.
                    </a>
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                        <span>Our Vision.</span> Why you choose us?
                    </a>
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                        <span>What is our target?</span> We dreaming of the future.
                    </a>
                </div>
                <div class="facts-container light">
                    <!-- Item -->
                    <div class="fact" data-source="6">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Real Estate Locations</h3>
                                <p>Affordable, great locations</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" data-source="30">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Consumer Good products</h3>
                                <p>Best Quality</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" data-source="4678">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Total Members</h3>
                                <p>Happy Associates</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right image -->
            <div class="right-image" data-background="images/matrix-tree.png" style="background-size:100% 100%; background-repeat:no-repeat;"></div>
        </section>

        <!-- WORKS -->
        <section id="works">
            <!-- Container for all works section -->
            <div class="container">
                <!-- Titles -->
                <h2 class="uppercase">See our Products.</h2>
                <!--<h2 class="uppercase light">creative &amp; high quality.</h2>-->
                <div class="title-strips-over dark"></div>
                <h4 class="light">It is a long established fact that a reader will be distracted by the readable is that it has a more-or-less normal. <br> is that it has a more-or-less normal.</h4>

                <!-- Container for works -->
                <div class="works-container">
                    <!-- Container for filters and search -->
                    <div class="clearfix">
                        <!-- Filters -->
                        <div id="project-filters" class="cbp-l-filters-buttonCenter cbp-l-filters-left">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All <div class="cbp-filter-counter"></div>
                            </div>
                            <div data-filter=".coding" class="cbp-filter-item"> Real Estate <div class="cbp-filter-counter"></div>
                            </div>
                            <div data-filter=".design" class="cbp-filter-item"> Daily Use Items <div class="cbp-filter-counter"></div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="cbp-search cbp-l-filters-right">
                            <input id="project-search" type="text" placeholder="Search by title" autocomplete="off" data-search=".cbp-l-grid-masonry-projects-title" class="cbp-search-input">
                            <div class="cbp-search-icon"></div>
                            <div class="cbp-search-nothing">No results match for <i>{{query}}</i></div>
                        </div>
                    </div>
                    <!-- End Container for filters and search -->

                    <!-- Container for portfolio items -->
                    <div id="projects" class="lightbox_selected cbp cbp-l-grid-masonry-projects">
                        <div class="cbp-wrapper"></div>
                    </div>
                    <!-- End container for works -->
                    <!-- Load more button -->
                    <div id="more-projects" class="cbp-l-loadMore-button" style="display:none;">
                        <a href="#" class="cbp-l-loadMore-link" rel="nofollow">
                            <!--<span class="cbp-l-loadMore-defaultText">LOAD MORE</span>-->
                            <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                            <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>


        <!-- TEAM SECTION -->
        <section id="team" class="team-type-3 t-center">

            <!-- Title -->
            <h1 class="uppercase light">
                Meet Our <span class="normal">Team</span>
            </h1>
            <div class="title-strips-over dark"></div>
            <!-- Description -->
            <p class="page-description">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.
            </p>
            <!-- Container -->
            <div class="container custom-slider mt-70 qdr-controls">

                <!-- Member -->
                <div class="member animated" data-animation="fadeIn" data-animation-delay="200">
                    <!-- Container for details -->
                    <div class="member-body">
                        <img src="images/cmd.jpg" alt="Chairman and Managing Director">
                        <!-- Progress Bars -->
                        <div class="team-progress">
                            <!-- Bar -->
                            <div class="progress-bar bg-colored t-left" data-value="96">
                                <span class="nowrap light white">Chairman and Managing Director (CMD)</span>
                            </div>
                            <!-- Bar -->
                            <!--<div class="progress-bar bg-colored t-left" data-value="45">
                                <span class="nowrap light white">Design 45%</span>
                            </div>-->
                        </div>
                        <!-- End Progress Bars -->
                        <!-- Description -->
                        <div class="member-description vertical-center">
                            <p class="fa fa-quote-left icon"></p>
                            <h2 class="light">Chairman and Managing Director (CMD)</h2>
                            <p class="description light">More than two decades of experience in network marketing and more than a decade in Real Estate</p>
                        </div>
                    </div>
                    <!-- End Container for details -->
                    <!-- Member Name -->
                    <h2 class="light">Anuj Kumar</h2>
                </div>

                <!-- Member -->
                <div class="member animated" data-animation="fadeIn" data-animation-delay="400">
                    <!-- Container for details -->
                    <div class="member-body">
                        <img src="images/md.jpg" alt="Managing Director">
                        <!-- Progress Bars -->
                        <div class="team-progress">
                            <!-- Bar -->
                            <div class="progress-bar bg-colored t-left" data-value="70">
                                <span class="nowrap light white">Managing Director (MD)</span>
                            </div>
                            <!-- Bar -->
                            <!-- <div class="progress-bar bg-colored t-left" data-value="65">
                                 <span class="nowrap light white">Python 65%</span>
                             </div>-->
                        </div>
                        <!-- End Progress Bars -->
                        <!-- Description -->
                        <div class="member-description vertical-center">
                            <p class="fa fa-quote-left icon"></p>
                            <h2 class="light">Managing Director (MD)</h2>
                            <p class="description light">More than two Years of experience in network marketing and two years in Real Estate</p>
                        </div>
                    </div>
                    <!-- End Container for details -->
                    <!-- Member Name -->
                    <h2 class="light">Poonam Pal</h2>
                </div>

                <!-- Member -->
                <div class="member animated" data-animation="fadeIn" data-animation-delay="600">
                    <!-- Container for details -->
                    <div class="member-body">
                        <img src="images/founder.jpg" alt="Founder">
                        <!-- Progress Bars -->
                        <div class="team-progress">
                            <!-- Bar -->
                            <div class="progress-bar bg-colored t-left" data-value="55">
                                <span class="nowrap light white">Founder, Leader</span>
                            </div>
                            <!-- Bar -->
                            <!--<div class="progress-bar bg-colored t-left" data-value="55">
                                <span class="nowrap light white">Illustrator 55%</span>
                            </div>-->
                        </div>
                        <!-- End Progress Bars -->
                        <!-- Description -->
                        <div class="member-description vertical-center">
                            <p class="fa fa-quote-left icon"></p>
                            <h2 class="light">Founder, Leader</h2>
                            <p class="description light">More than a decade of experience in network marketing and five plus years in Real Estate</p>
                        </div>
                    </div>
                    <!-- End Container for details -->
                    <!-- Member Name -->
                    <h2 class="light">Abhishek Singh</h2>
                </div>
            </div>
        </section>
        <!-- END TEAM -->

        <!-- Title -->
        <div class="t-center mb-5">
            <h1 class="uppercase light">
                Our <span class="normal">Videos</span>
            </h1>
            <div class="title-strips-over dark"></div>
        </div>
        <section id="smooth_slider">
            <div class="slider-multi">
                <ul>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/UGYQ7pWOlOU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Vbr-IDLf4so" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/bxPl7ZKZti4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ED_h8uoWsPc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/HDzK3qU_xzE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kWVsbypOVq0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                    <li>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/OEJvO65Shac" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                </ul>
            </div>
        </section>

        <!-- FOOTER -->
        <?php include_once 'footer_frontend.php'; ?>
        <!-- END FOOTER -->

    </section>
    <!-- END ALL SECTIONS -->


</section>
<!-- END WRAPPER -->
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>

<!-- Modal 11 -->
<div id="modal-11" class="modal middle-modal fade" tabindex="-1" role="dialog">
    <!-- Container -->
    <div class="modal-dialog modal-lg bg-white clearfix radius o-hidden" role="document">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Close Button for modal -->
            <div class="close fa fa-close" data-dismiss="modal"></div>
            <!-- Left, Image area -->
            <div class="block-img">
                <img id="uploded_image" src="">
            </div>
            <!-- End Left, Image area -->
        </div>
        <!-- End Modal Content -->
    </div>
</div>
<!-- End Modal 11 -->

<script type='text/javascript' src='js/jquery.js'></script>

<script type='text/javascript' src='js/owl.carousel.min.js'></script>

<script type='text/javascript' src='js/scrollreveal.min.js'></script>

<script type='text/javascript' src='js/autoptimize_single_44a4fedab4312ace693cdb9756957b7a.js'></script>
<script type='text/javascript' src='js/autoptimize_single_3b0c16349a3b099ab8231a1ea46adc2c.js'></script>

<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- REVOLUTION SLIDER -->
<script src="js/revolutionslider/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolutionslider/jquery.themepunch.tools.min.js"></script>
<!-- END REVOLUTION SLIDER -->
<!-- PAGE OPTIONS - You can find sliders, portfolio and other scripts for business -->
<script src="js/plugins.js"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->

<!-- slider smooth -->
<script src="js/projectHomeSlider.js"></script>
<script src="js/sappleslider.multi.js"></script>
<script type='text/javascript' src='js/site.js'></script>
<script src="assets/javascript/dashboard_products.js"></script>


<script type="text/javascript">
    $('.featured_project_slide').css('display', 'none');
    $('.featured_project_slide:first').css({
        'display': 'block',
        'opacity': '0'
    });
    var slider = $('.slider-single').sappleSingleSlider();
    var slider = $('.slider-multi').sappleMultiSlider();
</script>
<!-- Slider Calling -->
<script type="text/javascript">
    var tpj = jQuery;
    var revapi1066;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_1066_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1066_1");
        } else {
            revapi1066 = tpj("#rev_slider_1066_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55],
                    type: "mouse",
                    disable_onmobile: "on"
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: ".header",
                fullScreenOffset: "60px",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
</script>
<script type="text/javascript">
    // Works on QDR Modal
    $('#works-without-images').cubeportfolio({
        filters: '#works-without-images-filters',
        layoutMode: 'masonry',
        defaultFilter: '*',
        animationType: 'scaleSides',
        gapHorizontal: 10,
        gapVertical: 10,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4,
        }, {
            width: 1100,
            cols: 4,
        }, {
            width: 800,
            cols: 3,
        }, {
            width: 480,
            cols: 1,
            options: {
                gapHorizontal: 15,
                gapVertical: 15,
            }
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,
    });

    setTimeout(function() {
        document.getElementById('pop-on-load').click();
    }, 7000);
</script>
<script type="text/javascript">
    //get_landing_image();
    get_homepage_images();

    function get_homepage_images() {
        $.ajax({
            url: base_url + 'home-page-detail',
            type: 'post',
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    if (response.data.home_product_ad) {
                        var path = media_url + 'home_product_ad/' + response.data.home_product_ad;
                        $('.right-image').attr('data-background', path);
                        $('.right-image').css('background-image', 'url(' + path + ')');
                    }
                    if (response.data.slider_image_1) {}
                    if (response.data.slider_image_2) {}
                    if (response.data.slider_image_3) {}
                    if (response.data.slider_image_4) {}
                    if (response.data.slider_image_5) {}
                    if (response.data.landing_image) {
                        var landing_path = media_url + 'landing_image/' + response.data.landing_image;
                        $('#uploded_image').attr('src', landing_path);
                        $('#uploded_image').css('display', 'block');
                    } else {
                        $('#uploded_image').attr('src', 'images/pre.jpg');
                        $('#uploded_image').css('display', 'block');
                    }
                } else {
                    console.log("Not any image");
                }
            }
        });

    } //end function for get_landing_image
</script>
</body>
<!-- Body End -->

</html>