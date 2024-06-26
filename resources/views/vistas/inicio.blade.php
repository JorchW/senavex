@extends('welcome')
@section('vista')

<!-- Start main-content -->
<div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
        <div class="container-fluid p-0">

            <!-- START REVOLUTION SLIDER 5.0.7 -->
            <div id="rev_slider_home_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                data-alias="news-gallery34"
                style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
                <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;"
                    data-version="5.0.7">
                    <ul>
                        <!-- SLIDE 1 -->
                        <li data-index="rs-1" data-transition="slidingoverlayhorizontal"
                            data-slotamount="default" data-easein="default" data-easeout="default"
                            data-masterspeed="default"
                            data-thumb="{{ asset('storage/images/vistas/inicio1.png') }}" data-rotate="0"
                            data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Make an Impact">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('storage/images/vistas/inicio1.png') }}" alt=""
                                data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                                id="slide-1-layer-1" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-start="1000" data-basealign="slide" data-responsive_offset="on"
                                style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                                id="slide-1-layer-2" data-x="['left','left','left','left']"
                                data-hoffset="['50','50','50','30']" data-y="['top','top','top','top']"
                                data-voffset="['220','200','170','190']" data-fontsize="['56','46','40','36']"
                                data-lineheight="['70','60','50','45']"
                                data-fontweight="['800','700','700','700']"
                                data-width="['700','650','600','420']" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                Directorio de <span class="text-theme-coloredv">Exportadores</span>
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                                id="slide-1-layer-3" data-x="['left','left','left','left']"
                                data-hoffset="['50','50','50','30']" data-y="['top','top','top','top']"
                                data-voffset="['380','320','280','280']" data-fontsize="['18','18','16','13']"
                                data-lineheight="['30','30','28','25']"
                                data-fontweight="['600','600','600','600']"
                                data-width="['700','650','600','420']" data-height="none"
                                data-whitespace="nowrap" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 7; white-space: nowrap;">Directorio Exportador te ofrece<br>
                                muchos productos para para la población en general.
                            </div>



                            <!-- SLIDE 3 -->
                        <li data-index="rs-3" data-transition="slidingoverlayhorizontal"
                            data-slotamount="default" data-easein="default" data-easeout="default"
                            data-masterspeed="default"
                            data-thumb="{{ asset('storage/images/vistas/inicio2.png') }}" data-rotate="0"
                            data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Make an Impact">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('storage/images/vistas/inicio2.png') }}" alt=""
                                data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                                id="slide-3-layer-1" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-start="1000" data-basealign="slide" data-responsive_offset="on"
                                style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                                id="slide-3-layer-2" data-x="['center','center','center','center']"
                                data-hoffset="['310','200','100','0']" data-y="['top','top','top','top']"
                                data-voffset="['170','150','1200','140']"
                                data-fontsize="['56','46','40','36']" data-lineheight="['70','60','50','45']"
                                data-fontweight="['800','700','700','700']"
                                data-width="['700','650','500','420']" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                Registrate y <span class="text-theme-colored2">Haz</span> conocer tus <span
                                    class="text-theme-color-2">productos</span>
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                                id="slide-3-layer-3" data-x="['center','center','center','center']"
                                data-hoffset="['310','200','100','0']" data-y="['top','top','top','top']"
                                data-voffset="['330','270','230','230']" data-fontsize="['18','18','16','13']"
                                data-lineheight="['30','30','28','25']"
                                data-fontweight="['600','600','600','600']"
                                data-width="['700','650','500','420']" data-height="none"
                                data-whitespace="nowrap" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 7; white-space: nowrap;">Tienes productos de Exportacion y
                                nadie los conoce?<br>
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                                id="slide-3-layer-3" data-x="['center','center','center','center']"
                                data-hoffset="['310','200','100','0']" data-y="['top','top','top','top']"
                                data-voffset="['410','340','310','310']" data-fontsize="['18','18','16','16']"
                                data-lineheight="['30','30','30','30']"
                                data-fontweight="['600','600','600','600']"
                                data-width="['700','650','500','420']" data-height="none"
                                data-whitespace="nowrap" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 7; white-space: nowrap;"><a href="https://taypi.senavex.gob.bo"
                                    class="btn btn-dark btn-theme-coloredn btn-xl">Obten tu RUEX y sube tus Productos</a>
                            </div>
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption rs-parallaxlevel-0" id="slide-3-layer-4"
                                data-x="['center','center','center','center']"
                                data-hoffset="['310','33','0','0']" data-y="['top','top','top','top']"
                                data-voffset="['360','290','260','260']"
                                data-width="['700','650','600','420']" data-height="none"
                                data-whitespace="nowrap" data-transform_idle="o:1;"
                                data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-start="1000"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                data-responsive="off"
                                style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom"
                        style="height: 5px; background-color: rgba(166, 216, 236, 1.00);"></div>
                </div>
            </div>

            <!-- END REVOLUTION SLIDER -->
            <script type="text/javascript">
                var tpj = jQuery;
                var revapi34;
                tpj(document).ready(function() {
                    if (tpj("#rev_slider_home").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider_home");
                    } else {
                        revapi34 = tpj("#rev_slider_home").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "js/revolution-slider/js/",
                            sliderLayout: "fullscreen",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {
                                keyboardNavigation: "on",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                onHoverStop: "on",
                                touch: {
                                    touchenabled: "on",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
                                arrows: {
                                    style: "zeus",
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_under: 600,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 30,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 30,
                                        v_offset: 0
                                    }
                                },
                                bullets: {
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_under: 600,
                                    style: "metis",
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 30,
                                    space: 5,
                                    tmp: '<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>'
                                }
                            },
                            viewPort: {
                                enable: true,
                                outof: "pause",
                                visible_area: "80%"
                            },
                            responsiveLevels: [1240, 1024, 778, 480],
                            gridwidth: [1240, 1024, 778, 480],
                            gridheight: [600, 550, 500, 450],
                            lazyType: "none",
                            parallax: {
                                type: "scroll",
                                origo: "enterpoint",
                                speed: 400,
                                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                            },
                            shadow: 0,
                            spinner: "off",
                            stopLoop: "off",
                            stopAfterLoops: -1,
                            stopAtSlide: -1,
                            shuffle: "off",
                            autoHeight: "off",
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
            <!-- END REVOLUTION SLIDER -->
        </div>
    </section>
    <section id="about">
        <div class="container pb-0 pb-sm-90">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h2 class="mt-0 mt-sm-30 line-height-1 line-bottom-edu">Bienvenido a <span
                                class="text-theme-colored3">Directorio Exportador</span></h2>
                        <p class="font-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                            aliquam erat nec ultricies. Ut lobortis, magna nec rhoncus vestibulum, neque quam
                            mattis ipsum, vel bibendum erat</p>
                        <p class="font-15">Suspendisse dui enim, vehicula ac tempus sed, ullamcorper pretium
                            mauris. Ut vel pellentesque felis, sit amet laoreet sem. Nunc lacinia mauris a felis
                            tincidunt ullamcorper.</p>
                        <a class="btn btn-colored btn-circled btn-xl btn-theme-colored2 mt-10 mb-sm-30"
                            href="page-about1.html">Leer mas</a>
                        <a class="btn btn-default btn-circled btn-xl mt-10 mb-sm-30"
                            href="page-about1.html">Leer mas</a>
                    </div>
                    <div class="col-sm-6 col-md-6 text-center">
                        <img src="{{ asset('storage/images/vistas/logop.png') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container pb-90 pb-sm-90">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ asset('storage/images/vistas/nuestro1.png') }}" alt="">

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft ml-70" data-wow-duration="1s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s;">
                        <div class="mt-15">
                            <a href="#">
                                <h2 class="line-bottom-edu text-muted">Empresas</h2>
                            </a>
                        </div>
                        <div class="mt-15">
                            <a href="#">
                                <h2 class="line-bottom-edu text-muted">Productos</h2>
                            </a>
                        </div>
                        <div class="mt-15">
                            <a href="#">
                                <h2 class="line-bottom-edu text-muted">Rubros</h2>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="row mt-30 pt-15">
                    <div class="col-md-12 col-sm-6">
                        <img src="{{asset('storage/images/vistas/isos.png')}}" alt="">

                    </div>


                </div>
            </div>
        </div>
</div>

@endsection