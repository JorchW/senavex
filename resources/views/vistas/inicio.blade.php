@extends('welcome')
@section('vista')
<div class="main-content">
    <section id="home" class="divider">
        <div class="container-fluid p-0">
            <div id="rev_slider_home_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                data-alias="news-gallery34"
                style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
                <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;"
                    data-version="5.0.7">
                    <ul>
                        <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default"
                            data-easein="default" data-easeout="default" data-masterspeed="default"
                            data-thumb="{{ asset('storage/images/vistas/inicio1.png') }}" data-rotate="0"
                            data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Make an Impact">
                            <img src="{{ asset('storage/images/vistas/inicio1.png') }}" alt=""
                                data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                                id="slide-1-layer-1" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-start="1000" data-basealign="slide" data-responsive_offset="on"
                                style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" id="slide-1-layer-2"
                                data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']"
                                data-y="['top','top','top','top']" data-voffset="['220','200','170','190']"
                                data-fontsize="['56','46','40','36']" data-lineheight="['70','60','50','45']"
                                data-fontweight="['800','700','700','700']" data-width="['700','650','600','420']"
                                data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none"
                                data-splitout="none" data-responsive_offset="on"
                                style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                Directorio de <span class="text-theme-coloredv">Exportadores</span>
                            </div>
                            <div  class="tp-caption tp-resizeme text-white rs-parallaxlevel-0 rounded-circle"  id="slide-1-layer-3"
                                data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']"
                                data-y="['top','top','top','top']" data-voffset="['380','320','280','280']"
                                data-fontsize="['18','18','16','13']" data-lineheight="['40','30','28','25']"
                                data-fontweight="['10','10','10','10']" data-width="['1000','650','600','420']"
                                data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="none"
                                data-splitout="none" data-responsive_offset="on"
                                style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                <form action="{{ route('productos') }}" method="GET" class="slider-search-form"
                                    style="max-width: 100%; margin: 0 auto; text-align: center;">
                                    <input class="btn-circled" type="text" name="descripcion_busqueda" id="descripcion_busqueda"
                                        placeholder="Buscar Productos..."
                                        style="width: 70%; padding: 10px; font-size: 18px;">
                                    <button class="btn-circled btn-theme-colored2" type="submit"
                                        style="padding: 10px 20px; font-size: 18px;">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                var tpj = jQuery;
                var revapi34;
                tpj(document).ready(function () {
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
                });
            </script>
        </div>
    </section>
    <section id="about">
        <div class="container pb-0 pb-sm-90">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h2 class="mt-0 mt-sm-30 line-height-1 line-bottom-edu">Bienvenido al Directorio Exportador<span
                                class="text-theme-colored3"> "Hecho en Bolivia"</span></h2>
                        <p class="font-15">Busca, selecciona y contactate directamente con el productor Boliviano</p>
                        <p class="font-15">El Directorio Exportador verifica que los productos ofrecidos cuentan con la
                            Declaración Jurada de Origen
                        </p>
                        <a class="btn btn-colored btn-circled btn-xl btn-theme-colored2 mt-10 mb-sm-30"
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
                </div>
                <div class="row mt-30 pt-15">
                    <div class="col-md-12 col-sm-6">
                        <img src="{{asset('storage/images/vistas/isos.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection