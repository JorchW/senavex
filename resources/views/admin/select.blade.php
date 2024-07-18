<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Senavex : Directorio Exportador" />
    <meta property="og:title" content="Senavex : Directorio Exportador" />
    <meta property="og:description" content="Senavex : Directorio Exportador" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    <title>Senavex : Directorio Exportador</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/images/vistas/icono.png') }}" />
    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="loader">
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--text"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ URL('select') }}" class="brand-logo">
                <img src="{{ asset('/storage/images/vistas/icono.png') }}" height="50" width="50" alt="">
                <img class="brand-title" src="{{ asset('/storage/images/vistas/senavex.png') }}" height="50" width="150"
                    alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0);" role="button"
                                    data-bs-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.638 4.9936V2.3C12.638 1.5824 13.2484 1 14.0006 1C14.7513 1 15.3631 1.5824 15.3631 2.3V4.9936C17.3879 5.2718 19.2805 6.1688 20.7438 7.565C22.5329 9.2719 23.5384 11.5872 23.5384 14V18.8932L24.6408 20.9966C25.1681 22.0041 25.1122 23.2001 24.4909 24.1582C23.8709 25.1163 22.774 25.7 21.5941 25.7H15.3631C15.3631 26.4176 14.7513 27 14.0006 27C13.2484 27 12.638 26.4176 12.638 25.7H6.40705C5.22571 25.7 4.12888 25.1163 3.50892 24.1582C2.88759 23.2001 2.83172 22.0041 3.36039 20.9966L4.46268 18.8932V14C4.46268 11.5872 5.46691 9.2719 7.25594 7.565C8.72068 6.1688 10.6119 5.2718 12.638 4.9936ZM14.0006 7.5C12.1924 7.5 10.4607 8.1851 9.18259 9.4045C7.90452 10.6226 7.18779 12.2762 7.18779 14V19.2C7.18779 19.4015 7.13739 19.6004 7.04337 19.7811C7.04337 19.7811 6.43703 20.9381 5.79662 22.1588C5.69171 22.3603 5.70261 22.6008 5.82661 22.7919C5.9506 22.983 6.16996 23.1 6.40705 23.1H21.5941C21.8298 23.1 22.0492 22.983 22.1732 22.7919C22.2972 22.6008 22.3081 22.3603 22.2031 22.1588C21.5627 20.9381 20.9564 19.7811 20.9564 19.7811C20.8624 19.6004 20.8133 19.4015 20.8133 19.2V14C20.8133 12.2762 20.0953 10.6226 18.8172 9.4045C17.5391 8.1851 15.8073 7.5 14.0006 7.5Z"
                                            fill="#759791" />
                                    </svg>
                                    <span class="badge light text-white bg-secondary rounded-circle">12</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3"
                                        style="height:380px;">
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2">
                                                        <img alt="image" width="50"
                                                            src="{{ asset('admin/images/avatar/1.jpg') }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        KG
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Resport created successfully</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-success">
                                                        <i class="fa fa-home"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2">
                                                        <img alt="image" width="50"
                                                            src="{{ asset('admin/images/avatar/1.jpg') }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-danger">
                                                        KG
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Resport created successfully</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-primary">
                                                        <i class="fa fa-home"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                            class="ti-arrow-end"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <div class="header-info me-3">
                                        <span class="fs-16 font-w600">{{Auth::user()->persona->nombres}}</span>
                                        <span class="fs-16 font-w600 ">{{ Auth::user()->ci}}</span>
                                        <small class="text-end fs-14 font-w400">{{ Auth::user()->email }}</small>
                                    </div>
                                    <img src="{{ asset('admin/images/profile/pic1.jpg') }}" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
												  document.getElementById('logout-form').submit();" class="dropdown-item
                                        ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span class="ms-2">{{ __('Cerrar Sesión') }} </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="ai-icon" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Seleccionar Otra</span>
                            <div class="text-center">
                                <span class="nav-text">Empresa</span>
                            </div>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-wrench"></i>
                            <span class="nav-text">Editar Empresa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <h5 class="text-center">Seleccione una empresa...</h5>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">Productos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <h5 class="text-center">Seleccione una empresa...</h5>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <blockquote class="blockquote text-center">
                <p class="h2">Seleccione una Empresa</p>
            </blockquote>
            <div class="row text-center">
                @foreach ($empresasvencidas as $empresavencida)
                @if ($empresavencida->descripcion_estado == 'Empresa con RUEX - Vencido' && $empresavencida->ruex_estado==false)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-lg"
                            style="background-color: #f8f9fa; border-radius: 40px;border: 1px solid #006400;margin: 20px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($empresavencida->nombre_comercial, 35, $end = '...') }}</h5>
                                <p class="card-text"><strong>Nit:</strong> {{ $empresavencida->nit }}</p>
                                <p class="card-text"><strong>Ruex:</strong> {{ $empresavencida->ruex }}</p>
                                <p class="card-text"><strong>Estado:</strong> {{ $empresavencida->descripcion_estado }}</p>
                                <div class="alert alert-danger mt-auto">
                                    <strong>Empresa con RUEX - Vencido</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif    
                @endforeach
                @foreach($empresas as $empresa)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-lg"
                            style="background-color: #f8f9fa; border-radius: 40px;border: 1px solid #006400;margin: 20px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $empresa->nombre_comercial }}</h5>
                                <p class="card-text"><strong>Nit:</strong> {{ $empresa->nit }}</p>
                                <p class="card-text"><strong>Ruex:</strong> {{ $empresa->ruex }}</p>
                                <p class="card-text"><strong>Estado:</strong> {{$empresa->descripcion_estado}} </p>
                                <a href="{{ URL('home/' . Crypt::encryptString($empresa->id_empresa)) }}"
                                    class="btn btn-outline-primary mt-auto">Entrar a Empresa</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @yield('content')
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Diseñado y desarrollado por <a href="https://senavex.gob.bo/" target="_blank">Senavex</a>
                    2022</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/sweetalert.init.js') }}"></script>
    <script src="{{ asset('admin/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/deznav-init.js') }}"></script>
    <script src="{{ asset('admin/js/demo.js') }}"></script>
</body>
<script>
    $(document).ready(function () {
        $(".UpperCase").on("keypress", function () {
            $input = $(this);
            setTimeout(function () {
                $input.val($input.val().toUpperCase());
            }, 0);
        })

        $('.input-number').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        })

        $('.input-number-dec').on('input', function () {
            this.value = this.value.replace(/[^0-9,.]/g, '');
        })

        var validExtensions = ".png, .gif, .jpeg, .jpg";
        var allowedWeight = 1024;

        $('.input-image').change(function () {
            $('.text-image').text('');
            $('.img-src').attr('src', '');
            if (validateExtensionEmpresa(this)) {
                console.log('extension ok')
                if (validateWeight(this) && validateDimensionEmpresa(this)) {
                    console.log('tamaño ok')
                    viewImage1(this);
                }
            }
        });

        function validateExtensionEmpresa(data) {
            var rute = data.value;
            var extension = rute.substring(rute.lastIndexOf('.') + 1).toLowerCase();
            var extensionValida = validExtensions.indexOf(extension);
            if (extensionValida < 0) {
                $('.text-image').text('La extensión no es válida Su fichero tiene de extensión: .' + extension);
                return false;
            } else {
                return true;
            }
        }

        function validateWeightEmpresa(data) {
            if (data.files && data.files[0]) {
                var fileWeight = data.files[0].size / 1024;
                if (fileWeight > allowedWeight) {
                    $('.text-image').text('El peso maximo permitido del fichero es: ' + allowedWeight +
                        ' KBs Su fichero tiene: ' + fileWeight + ' KBs');
                    return false;
                } else {
                    return true;
                }
            }
        }

        function validateDimensionEmpresa(data) {
            var bandera = false
            var reader = new FileReader();
            reader.readAsDataURL(data.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    console.log(height, width);
                    if (height == 650 && width == 550) {
                        bandera = true;
                        console.log(bandera)
                        return bandera;
                    } else {
                        $('.text-image-2').text("La altura y el ancho deben ser 650x550 px.");
                        bandera = false;
                        console.log(bandera)
                        return bandera;
                    }
                }
            }
        }


        function viewImage1(data) {
            if (data.files && data.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img-src').attr('src', e.target.result);
                }
                reader.readAsDataURL(data.files[0]);
            }
        }




        $('.input-image-2').change(function () {
            $('.text-image-2').text('');
            $('.img-src-2').attr('src', '');
            if (validateExtension(this)) {
                console.log('extension ok')
                if (validateWeight(this) && validateDimension(this)) {
                    console.log('tamaño ok')
                    viewImage(this);
                }
            }
        });

        function validateExtension(data) {
            var rute = data.value;
            var extension = rute.substring(rute.lastIndexOf('.') + 1).toLowerCase();
            var extensionValida = validExtensions.indexOf(extension);
            if (extensionValida < 0) {
                $('.text-image-2').text('La extensión no es válida Su fichero tiene de extensión: .' +
                    extension);
                return false;
            } else {
                return true;
            }
        }
        function validateWeight(data) {
            if (data.files && data.files[0]) {
                var fileWeight = data.files[0].size / 1024;
                if (fileWeight > allowedWeight) {
                    $('.text-image-2').text('El peso maximo permitido del fichero es: ' + allowedWeight +
                        ' KBs Su fichero tiene: ' + fileWeight + ' KBs');
                    return false;
                } else {
                    return true;
                }
            }
        }

        function validateDimension(data) {
            var bandera = false
            var reader = new FileReader();
            reader.readAsDataURL(data.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    console.log(height, width);
                    if ((height == 300 && width == 300) || (height == 400 && width == 300)) {
                        bandera = true;
                        console.log(bandera)
                        return bandera;
                    } else {
                        $('.text-image-2').text("La altura y el ancho deben ser 300x300 px o 300x400 px");
                        bandera = false;
                        console.log(bandera)
                        return bandera;
                    }
                }
            }
        }



        function viewImage(data) {
            if (data.files && data.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img-src-2').attr('src', e.target.result);
                }
                reader.readAsDataURL(data.files[0]);
            }
        }
    });
</script>
</html>