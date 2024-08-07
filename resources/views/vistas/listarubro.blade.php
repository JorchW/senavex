@extends('welcome')
@section('vista')
        <br><br><br><br>
        <section>
            <div class="container mt-30 mb-30 pt-30 pb-0">
                <div class="container mt-20">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mt-0 line-height-1">
                                Lista de <span class="text-theme-colored3">Rubros</span>
                            </h2>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <div class="search-form">
                                    <form method="get" class="search-form" action="{{ route('rubros')}}">
                                        <div class="input-group">
                                            <input type="text" placeholder="Haga clic para buscar"
                                                id="buscador_rubro" name="buscador_rubro" value="{{ $buscador_rubro }}"
                                                class="form-control search-input" />
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 blog-pull-left">
                        @if (count($rubros) > 0)
                        @foreach ($rubros as $rubro)
                            <div class="upcoming-events bg-white-f3 mb-20">
                                <div class="row">
                                    <div class="col-sm-4 pr-0 pr-sm-15">
                                        <div class="thumb pt-15 pb-15">
                                        </div>
                                    </div>
                                    <div class="col-sm-8 pl-0 pl-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            <h4 class="text-theme-colored media-heading font-weight-500">
                                                {{ $rubro->descripcion_rubro }}
                                            </h4>
                                            <a class="pull-right text-gray font-13 pb-5" href="{{route('list-prod-rubros', ['id_rubro' =>Crypt::encryptString($rubro->id_rubro)])}}"><i
                                                    class="fa fa-angle-double-right text-theme-colored"></i>
                                                Ver productos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <br>
                            <br>
                            <br>
                            <br>
                            <h1> Lo siento no se  </h1>
                            <h1>  encontraron Rubros </h1>                            
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        @endif
                        <div class="pagination theme-colored pull-right xs-pull-center mb-xs-40"> {!!$rubros->links()!!}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar sidebar-left mt-sm-30">
                            <div class="widget p-30">
                                <h4 class="widget-title">Certificacion</h4>
                                <div class="latest-posts">
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img
                                                src="{{ asset('storage/images/vistas/iso1.png') }}" alt="" /></a>
                                    </article>
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img
                                                src="{{ asset('storage/images/vistas/iso2.png') }}" alt="" /></a>
                                    </article>
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img
                                                src="{{ asset('storage/images/vistas/iso3.png') }}" alt="" /></a>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
