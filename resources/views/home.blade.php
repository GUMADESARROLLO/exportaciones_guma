@extends('layouts.main')
@section('metodosjs')
@include('jsViews.js_home') 
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/detailStyle.css') }}"> -->

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
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>LISTA DE REGISTROS</h5>
                                    </div>
                                </div>
                                <!-- <div class="row justify-content-end">
                                        <div class="card-block">
                                            <table class=" table-bordered" width="35%">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" scope="col">SIGNIFICADO DE COLORES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <th scope="row">TRANSITO</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <th scope="row">PRODUCTO MINSA</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <th scope="row">PEDIDO</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                <div class="row mt-3 mx-4">
                                    <div class="col-md-9">
                                        <div class="input-group" style="width: 100%;" id="cont_search">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" id="InputBuscar" class="form-control bg-white" placeholder="Buscar..." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="input-group  justify-content-center">
                                            <button class="btn btn-primary add-row-dt-pedidos">Agregar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="input-group  justify-content-center">
                                            <button class="btn btn-success" id="btn-Guardar">Guardar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="input-group  justify-content-center">
                                            <button class="btn btn-danger add-row-dt-pedidos">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block table-border-style mt-4">
                                    <div class="table-responsive">
                                        <table class="table table-hover " id="tblPedidos" width="100%">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Tabla Categorias ] end -->
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- [ Main Content ] end -->
@endsection