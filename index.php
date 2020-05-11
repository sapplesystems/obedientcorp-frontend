<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>
<style>
    .Preloader { position:fixed; top:0; left:0; width:100%; height:100%; background:#040406; z-index:99999; display:flex; justify-content:center; align-items:center;}
    .Preloader__Spinner { width:300px; min-width:200px; max-width:80%; animation: Blink 1s ease-in-out infinite; -webkit-animation: Blink 1s ease-in-out infinite; }
    @keyframes Blink { 0% {opacity: 1} 50% {opacity: 0.5} 100% {opacity: 1}}
    @-webkit-keyframes Blink { 0% {opacity: 1} 50% {opacity: 0.5} 100% {opacity: 1}}

    @media (max-width:800px) and (orientation: portrait) {
        .Preloader__Spinner { width:10vw; display:block; }
    }
    #pop-on-load{display: none;}
    .tp-kbimg-wrap{display: none !important;}
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
                            <ul>	<!-- SLIDE -->
                                <li id="slider_image_1" data-index="rs-3004" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption NotGeneric-Title tp-resizeme"
                                         id="slide-3004-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-fontsize="['70','70','70','45']"
                                         data-lineheight="['70','70','70','50']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 5; white-space: nowrap;text-transform:left;"><span id ="slider_title_1">Welcome to Obedient Group </span></div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme "
                                         id="slide-3004-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 6; white-space: nowrap;text-transform:left;"><span id="slider_sub_title_1">Real Estate & Consumer Goods </span></div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme"
                                         id="slide-3004-layer-8"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 7; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-compass"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a/> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption rev-scroll-btn "
                                         id="slide-3004-layer-9"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']"
                                         data-width="35"
                                         data-height="55"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]'
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 9; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li id="slider_image_2" data-index="rs-3005" data-transition="fadetotopfadefrombottom" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Chill" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg5.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 6 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-3 "
                                         id="slide-3005-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-fontsize="['70','70','70','45']"
                                         data-lineheight="['70','70','70','50']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 10; white-space: nowrap;text-transform:left;"><span id="slider_title_2">Where Dreams Come True</span> </div>

                                    <!-- LAYER NR. 7 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-2 "
                                         id="slide-3005-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 11; white-space: nowrap;text-transform:left;"><span id="slider_sub_title_2">Real Estate & Consumer Goods </span></div>

                                    <!-- LAYER NR. 8 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme rs-parallaxlevel-1"
                                         id="slide-3005-layer-8"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 12; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-mouse"></i> </div>

                                    <!-- LAYER NR. 9 -->
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a/> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 10 -->
                                    <div class="tp-caption rev-scroll-btn "
                                         id="slide-3005-layer-9"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']"
                                         data-width="35"
                                         data-height="55"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]'
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 14; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>

                                    <!-- LAYER NR. 11 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-8"
                                         id="slide-3005-layer-10"
                                         data-x="['left','left','left','left']" data-hoffset="['680','680','680','680']"
                                         data-y="['top','top','top','top']" data-voffset="['632','632','632','632']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="image"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 15;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-pendulum"  data-easing="linearEaseNone" data-startdeg="-20" data-enddeg="360" data-speed="35" data-origin="50% 50%"><img src="images/rs/img/blurflake4.png" alt="" data-ww="['240px','240px','240px','240px']" data-hh="['240px','240px','240px','240px']" width="240" height="240" data-no-retina> </div></div>

                                    <!-- LAYER NR. 12 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-7"
                                         id="slide-3005-layer-11"
                                         data-x="['left','left','left','left']" data-hoffset="['948','948','948','948']"
                                         data-y="['top','top','top','top']" data-voffset="['487','487','487','487']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="image"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 16;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-wave"  data-speed="20" data-angle="0" data-radius="50px" data-origin="50% 50%"><img src="images/rs/img/blurflake3.png" alt="" data-ww="['170px','170px','170px','170px']" data-hh="['170px','170px','170px','170px']" width="170" height="170" data-no-retina> </div></div>

                                    <!-- LAYER NR. 13 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-4"
                                         id="slide-3005-layer-12"
                                         data-x="['left','left','left','left']" data-hoffset="['719','719','719','719']"
                                         data-y="['top','top','top','top']" data-voffset="['200','200','200','200']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="image"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 17;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-rotate"  data-easing="Power2.easeInOut" data-startdeg="-20" data-enddeg="360" data-speed="20" data-origin="50% 50%"><img src="images/rs/img/blurflake2.png" alt="" data-ww="['50px','50px','50px','50px']" data-hh="['51px','51px','51px','51px']" width="50" height="51" data-no-retina> </div></div>

                                    <!-- LAYER NR. 14 -->
                                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-6"
                                         id="slide-3005-layer-13"
                                         data-x="['left','left','left','left']" data-hoffset="['187','187','187','187']"
                                         data-y="['top','top','top','top']" data-voffset="['216','216','216','216']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="image"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 18;text-transform:left;border-width:0px;">
                                        <div class="rs-looped rs-wave"  data-speed="4" data-angle="0" data-radius="10" data-origin="50% 50%"><img src="images/rs/img/blurflake1.png" alt="" data-ww="['120px','120px','120px','120px']" data-hh="['120px','120px','120px','120px']" width="120" height="120" data-no-retina> </div></div>
                                </li>
                                <!-- SLIDE -->
                                <li id="slider_image_3" data-index="rs-3006" data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Enjoy Nature" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg2.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 15 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme "
                                         id="slide-3006-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-fontsize="['70','70','70','45']"
                                         data-lineheight="['70','70','70','50']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 19; white-space: nowrap;text-transform:left;"><span id ="slider_title_3">Welcome to Obedient Group </span></div>

                                    <!-- LAYER NR. 16 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme"
                                         id="slide-3006-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 20; white-space: nowrap;text-transform:left;"><span id="slider_sub_title_3">Real Estate & Consumer Goods </span></div>

                                    <!-- LAYER NR. 17 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme"
                                         id="slide-3006-layer-8"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 21; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-expand1"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a/> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 19 -->
                                    <div class="tp-caption rev-scroll-btn "
                                         id="slide-3006-layer-9"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']"
                                         data-width="35"
                                         data-height="55"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]'
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 23; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li id="slider_image_4" data-index="rs-3007" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Iceberg" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/iceberg.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- BACKGROUND VIDEO LAYER -->
                                    <!-- LAYER NR. 20 -->
                                    <div class="tp-caption tp-shape tp-shapewrapper "
                                         id="slide-3007-layer-10"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-width="full"
                                         data-height="full"
                                         data-whitespace="nowrap"

                                         data-type="shape"
                                         data-basealign="slide"
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 24;text-transform:left;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>

                                    <!-- LAYER NR. 21 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme"
                                         id="slide-3007-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-fontsize="['70','70','70','45']"
                                         data-lineheight="['70','70','70','50']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 25; white-space: nowrap;text-transform:left;"><span id="slider_title_4">Welcome to Obedient Group</span> </div>

                                    <!-- LAYER NR. 22 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme"
                                         id="slide-3007-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 26; white-space: nowrap;text-transform:left;"><span id="slider_sub_title_4">Real Estate & Consumer Goods</span> </div>

                                    <!-- LAYER NR. 23 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme"
                                         id="slide-3007-layer-8"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 27; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-anchor"></i> </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a/> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>

                                    <!-- LAYER NR. 25 -->
                                    <div class="tp-caption rev-scroll-btn "
                                         id="slide-3007-layer-9"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']"
                                         data-width="35"
                                         data-height="55"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]'
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 29; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>
                                </li>
                                <!-- SLIDE -->
                                <li id="slider_image_5" data-index="rs-3008" data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Hiking" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/rs/img/notgeneric_bg3.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 26 -->
                                    <div class="tp-caption NotGeneric-Title   tp-resizeme "
                                         id="slide-3008-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-fontsize="['70','70','70','45']"
                                         data-lineheight="['70','70','70','50']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.1,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 30; white-space: nowrap;text-transform:left;"><span id="slider_title_5">Welcome to Obedient Group </span></div>

                                    <!-- LAYER NR. 27 -->
                                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme"
                                         id="slide-3008-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['52','52','52','51']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 31; white-space: nowrap;text-transform:left;"><span id="slider_sub_title_5">Real Estate & Consumer Goods </span></div>

                                    <!-- LAYER NR. 28 -->
                                    <div class="tp-caption NotGeneric-Icon   tp-resizeme"
                                         id="slide-3008-layer-8"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="text"
                                         data-responsive_offset="on"

                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 32; white-space: nowrap;text-transform:left;cursor:default;"><i class="pe-7s-diamond"></i> </div>

                                    <!-- LAYER NR. 29 -->
                                    <div class="tp-caption rev-scroll-btn "
                                         id="slide-3008-layer-9"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']"
                                         data-width="35"
                                         data-height="55"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"scrollbelow","offset":"0px","delay":""}]'
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:50px;opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 33; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;text-transform:left;border-color:rgba(255, 255, 255, 0.50);border-style:solid;border-width:1px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                        <span>
                                        </span>
                                    </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftProducts"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="products">OUR PRODUCTS<a/> </div>

                                    <!-- LAYER NR. 4 - 2 -->
                                    <div class="tp-caption NotGeneric-Button rev-btn marginLeftLogin"
                                         id="slide-3004-layer-7"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['124','124','124','123']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"

                                         data-type="button"
                                         data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[10,10,10,10]"
                                         data-paddingright="[30,30,30,30]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[30,30,30,30]"

                                         style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="login">LOGIN</a> </div>
                                </li>
                            </ul>
                            <div style="" class="tp-static-layers">
                            </div>
                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
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
                    <div class="fact" id="real_estate_locations" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Real Estate Locations</h3>
                                <p>Affordable, great locations</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" id="consumer_goods_products" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Consumer Good products</h3>
                                <p>Best Quality</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" id="total_members" data-source="0">
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
            <div class="right-image" style="background-size:100% 100%; background-repeat:no-repeat; opacity:1;"></div>
        </section>

        <!-- WORKS -->
        <section id="works" class="mb-5">
            <!-- Container for all works section -->
            <div class="container">
			<div class="row mb-5 custom_img_care">
			<div class="col-md-4"><img src="images/skincare.jpg" /></div>
			<div class="col-md-4"><img src="images/healthcare.jpg" /></div>
			<div class="col-md-4"><img src="images/breakfast.jpg" /></div>
			</div>
                <!-- Titles -->
                <h2 class="uppercase">See our Products.</h2>
                <!--<h2 class="uppercase light">creative &amp; high quality.</h2>-->
                <div class="title-strips-over dark"></div>
                <h4 class="light">It is a long established fact that a reader will be distracted by the readable is that it has a more-or-less normal. <br> is that it has a more-or-less normal.</h4>
                <div id="project_product_slider"></div>

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
                <img id="uploded_image"src="">
            </div>
            <!-- End Left, Image area -->
        </div>
        <!-- End Modal Content -->
    </div>
</div>
<!-- End Modal 11 -->

<script type='text/javascript' src='js/jquery.js'></script>
<script src="assets/javascript/dashboard_products.js"></script>
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

<script type="text/javascript">
    $('.featured_project_slide').css('display', 'none');
    $('.featured_project_slide:first').css({'display': 'block', 'opacity': '0'});
    var slider = $('.slider-single').sappleSingleSlider();
    var slider = $('.slider-multi').sappleMultiSlider();

</script>
<!-- Slider Calling -->
<script type="text/javascript">
    var tpj = jQuery;
    var revapi1066;
    tpj(document).ready(function () {
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
                    type:"mouse",
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
    });	/*ready*/

</script>
<script type="text/javascript">
//*********************************************
    //  CLIENTS
    //*********************************************
    // init cubeportfolio
    $('#js-grid-clients').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: true,
        autoTimeout: 3000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 5,
            }, {
                width: 1100,
                cols: 5,
            }, {
                width: 800,
                cols: 4,
            }, {
                width: 480,
                cols: 1,
            }],
        gapHorizontal: 10,
        gapVertical: 5,
        caption: 'opacity',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    //*********************************************
    //  PORTFOLIO SECTION
    //*********************************************

    // init cubeportfolio
    $('#work-items').cubeportfolio({
        layoutMode: 'slider',
        defaultFilter: '*',
        animationType: 'fadeOutTop',
        gapHorizontal: 0,
        gapVertical: 0,
        showNavigation: false,
        showPagination: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 4,
            }, {
                width: 1100,
                cols: 4,
            }, {
                width: 750,
                cols: 2,
            }, {
                width: 480,
                cols: 1,
                options: {
                    caption: '',
                }
            }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
    });

    setTimeout(function () {
        document.getElementById('pop-on-load').click();
    }, 7000);
</script>
</body>
<!-- Body End -->
</html>
