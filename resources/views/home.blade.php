@extends('layouts.main')
@section('metodosjs')
@include('jsViews.js_home')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/detailStyle.css') }}"> 

 <style>
    a {
        cursor: pointer;
        color: #5E5E5E;
        text-decoration: none;

    }

    
    .dataTables_paginate {
        display: flex;
        align-items: center;
        padding-top: 20px;

    }

    .dataTables_paginate a {
        padding: 0 10px;
        /*border:1px solid #979797;*/
        /* background: linear-gradient(to bottom, white 0%, #0F85FC 100%);*/
        margin-inline: 5px;
    }

    .custom {
        min-width: 70%;
        min-height: 100%;
    }

    .custom_detail {
        min-width: 80%;
        min-height: 100%;
    }

    u.dotted {
        border-bottom: 1px dashed #999;
        text-decoration: none;
        font-size: 1.3em;
    }

    .dBorder {
        border: 1px solid #ccc !important;
    }

    .text-primary {
        color: #4e73df !important;
    }

    .text-success {
        color: #1cc88a !important;
    }

    .text-info {
        color: #36b9cc !important;
    }

    .text-warning {
        color: #f6c23e !important;
    }

    .border-left-primary {
        border-left: .25rem solid #4e73df !important;
    }

    .border-left-success {
        border-left: .25rem solid #1cc88a !important;
    }

    .border-left-info {
        border-left: .25rem solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: .25rem solid #f6c23e !important;
    }

    .color-focus {
        color: #0894ff !important;
    }
    .nav-tabs > .nav-item {
        padding-left: 3.25rem;
    }

    @media (min-width: 768px) {
        .nav-tabs .nav-item {
            padding-left: 1.5rem;
        }
    }
    @media (min-width: 992px) {
        .nav-tabs .nav-item {
            padding-left: 1.75rem;
        }
    }
    @media (min-width: 1200px) {
        .nav-tabs .nav-item {
            padding-left: 2.25rem;
        }
    }
    .DateRange {
        border: 2px solid #f6c23e !important;
    }
    .sizebadge{
        font-size: 1.2em;
    }
    
</style>
@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                    <div class="row g-gs ">
                            <div class="col-lg-3">
                                <div class="row g-gs ">
                                    <div class="col-md-12 col-lg-12 ">
                                        <div class="card card-bordered border-left-primary">

                                            <div class="card-inner">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="text-xs  text-primary text-uppercase mb-1">MIFIC</h6>
                                                            </div>
                                                        </div>

                                                        <div class="card-stats">
                                                            <div class="card-stats-group g-2">
                                                                <div class="card-stats-data">
                                                                    <div class="title">CON SI</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_si_mific">0.00</u></div>
                                                                </div>
                                                                <div class="card-stats-data">
                                                                    <div class="title">CON NO </div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_no_mific">0.00</u></div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-info-circle  fa-2x text-gray-300" id="id_icon_info"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="row g-gs">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card card-bordered border-left-success">
                                            <div class="card-inner">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="text-xs font-weight-bold text-success text-uppercase mb-1">REGENCIA NECESITA PERMISO</h6>
                                                            </div>
                                                        </div>                                                       
                                                        <div class="card-stats">
                                                            <div class="card-stats-group g-2">
                                                                <div class="card-stats-data">
                                                                    <div class="title"> SI</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_si_refencia">0.00</u></div>
                                                                </div>
                                                                <div class="card-stats-data">
                                                                    <div class="title">NO </div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_no_refencia">0.00</u></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-info-circle fa-2x text-gray-300" id=""></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">
                                <div class="row g-gs">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card card-bordered border-left-info">
                                            <div class="card-inner">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="card-title-group align-start">
                                                            <div class="card-title">
                                                                <h6 class="text-xs font-weight-bold text-info text-uppercase mb-1"> MINSA ó Privado</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-stats">
                                                            <div class="card-stats-group g-2">
                                                                <div class="card-stats-data">
                                                                    <div class="title">PRIVADO</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_tipo_privado">0.00</u></div>
                                                                </div>
                                                                <div class="card-stats-data">
                                                                    <div class="title">MINSA</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_tipo_misa">0.00</u></div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                    <i class="fas fa-info-circle fa-2x text-gray-300" id=""></i>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="row g-gs">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card card-bordered border-left-warning">
                                            <div class="card-inner">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="text-xs font-weight-bold text-warning text-uppercase mb-1">ESTADOS</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-stats">
                                                            <div class="card-stats-group g-2">
                                                                <div class="card-stats-data">
                                                                    <div class="title">Transito</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_estado_01">0.00</u></div>
                                                                </div>
                                                                <div class="card-stats-data">
                                                                    <div class="title">Producto Minsa</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_estado_02">0.00</u></div>
                                                                </div>
                                                                <div class="card-stats-data">
                                                                    <div class="title">PEDIDO</div>
                                                                    <div class="amount OnClickSearch" ><u class="dotted" id="id_estado_03">0.00</u></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                    <i class="fas fa-info-circle fa-2x text-gray-300" id=""></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="row g-gs ">
                                    <div class="col-md-12 col-lg-12 ">
                                        <div class="card">
                                            <div class="card-header ">
                                                <div class="form-row">
                                                    <div class="form-group col-md-9">
                                                        <div class="input-group" style="width: 100%;" id="cont_search">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="material-icons text-black ml-1">search</i>
                                                            </span>
                                                            <input type="text" id="InputBuscar" class="form-control bg-white" placeholder="Buscar..." aria-label="Username" aria-describedby="basic-addon1">
                                                            <div class="input-group-prepend" id="btnAdd">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <i class="material-icons icon-blue ml-1">add</i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1 ">
                                                        <select class="form-control" id="id_filter_empresa">
                                                            <option value="">Todo</option>
                                                            <option>UNIMARK S,A</option>
                                                            <option>GUMA PHARMA</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-1 ">
                                                        <select class="form-control" id="id_filter_tipo">
                                                            <option value="">Todo</option>
                                                            <option>TRANSITO</option>
                                                            <option>PRODUCTO MINSA</option>
                                                            <option>PEDIDO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-1 ">
                                                        <select class="form-control" id="id_filter_row">
                                                            <option value="-1">Todo</option>
                                                            <option value="7">7</option>
                                                            <option value="20">20</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            
                                            <div class="form-group col-md-12 mb-3">
                                                <div class="table-responsive" >
                                                    <table class="table table-hover" id="tblPedidos" width="99%"></table>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->


<div class="modal fade modal-fullscreen" id="mdlResumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Pedido / Tránsito </h5> <span id="id_row">0.00</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row mt-3 ">
                    <div class="form-group col-md-1">
                        <p class="text-muted m-2">Nº RECIBO</p>
                        <input type="text" class="form-control" id="id_numero_recibo">
                    </div>
                    <div class="form-group col-md-1">
                        <p class="text-muted m-2">Nº FACTURA</p>
                        <input type="text" class="form-control" id="id_numero_factura">
                    </div>
                    <div class="form-group col-md-2 ">
                        <p class="text-muted">UNIDAD DE NEGOCIO</p>
                        <select class="form-control" id="id_select_empresa">
                            <option value="0">...</option>
                            <option value="1">UNIMARK S,A</option>
                            <option value="2">GUMAPHARMA</option>
                        </select>
                    </div>

                    <div class="form-group col-md-7 " id="cont-articulo">
                        <p class="text-muted m-2">Descripción / Código</p>
                        <select class="selectpicker col-sm-12 form-control " id="id_select_articulo" data-show-subtext="false" data-live-search="true" data-size="5"></select>
                    </div>
                    
                    <div class="form-group col-md-7" id="cont_new_articulo" style="display: none;">

                        <div class="row">
                            <div class="form-group col-md-4">
                                <p class="text-muted m-2">Codigo</p>
                                <input class="form-control" type="text" id="id_new_articulo_cod">
                            </div>
                            <div class="form-group col-md-8">
                                <p class="text-muted m-2">Articulo</p>
                                <input class="form-control" type="text" id="id_new_articulo_descripcion">
                            </div>
                        </div>

                        
                        
                    </div>

                    <div class="form-group col-md-1" id="opc-articulo" >       
                        <p class="text-muted m-2">&nbsp;</p>                 
                        <button type="button" id="btn_Add_Product" class="btn btn-outline-info">+</button>
                    </div>

                    <div class="form-group col-md-1 " id="cont-close" style="display: none;">
                        <p class="text-muted m-2">&nbsp;</p>                 
                        <button type="button" id="btn_close"class="btn btn-outline-danger">x</button>
                    </div>
                    
                </div>

                <div class="form-row mt-3 ">
                    <div class="form-group col-md-2">
                        <p class="text-muted m-2">FECHA DE DESPACHO</p>
                        <input type="text" class="input-fecha" id="id_fecha_despacho">
                    </div>
                    <div class="form-group col-md-2">
                        <p class="text-muted m-2">FECHA ORDEN COMPRA</p>
                        <input type="text" class="input-fecha" id="id_fecha_orden">
                    </div>

                    <div class="form-group col-md-2 ">
                        <p class="text-muted">LABORATORIO</p>
                        <select class="form-control" id="id_select_laboratorios">
                            <option>LAB 01</option>
                            <option>LAB 02</option>
                            <option>LAB 03</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">PRECIO FARMACIA C$.</p>
                        <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" id="id_precio_farmacia" class="form-control" placeholder="C$ 00.00">
                    </div>
                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">PRECIO PUBLICO C$.</p>
                        <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" id="id_precio_publico" class="form-control" placeholder="C$ 00.00">
                    </div>
                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">PRECIO INTITUCION C$.</p>
                        <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" id="id_precio_intitucion" class="form-control" placeholder="C$ 00.00">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">MIFIC</p>
                        <select class="form-control" id="id_select_mific">
                            <option>SI</option>
                            <option>NO</option>
                            <option>SOLICITADO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">REGENCIA NECESITA PERMISO </p>
                        <select class="form-control" id="id_select_regencia">
                            <option>SI</option>
                            <option>NO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <p class="text-muted m-2">CONSIGNADO </p>
                        <select class="form-control" id="id_select_consignado">

                        </select>
                    </div>

                    <div class="form-group col-md-2 ">
                        <p class="text-muted m-2">MINSA ó Privado</p>
                        <select class="form-control" id="id_select_minsa_privado">
                            <option>MINSA</option>
                            <option>PRIVADO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">CANTIDAD:</label>
                            <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" id="id_cantidad" class="form-control" placeholder=" 00.00">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="id_select_estado" class="col-form-label">ESTADO:</label>
                            <select class="form-control" id="id_select_estado">
                                <option value="0">TRANSITO</option>
                                <option value="1">PRODUCTO MINSA</option>
                                <option value="2">PEDIDO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label" id="id-nota">Comentarios:</label>
                    <textarea class="form-control" id="id_coment" placeholder="Escriba una nota."></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_add">
                    <i class="material-icons text-white ml-2">note_add</i>
                </button>

            </div>
        </div>
    </div>
</div>
@endsection