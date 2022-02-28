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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group" style="width: 100%;" id="cont_search">
                                <input type="text" id="InputBuscar" class="form-control bg-white" placeholder="Buscar..." aria-label="Username" aria-describedby="basic-addon1">
                                    <div class="input-group-prepend" id="btnAdd">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="material-icons text-black ml-1">add</i>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-striped table-bordered table-sm post_back mt-3" width="100%" id="tblPedidos">
                                <thead class="bg-blue text-light"></thead>
                            </table>
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
                <h5 class="modal-title">Nueva Pedido / Tránsito </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-sm-12 ">
                        <p class="text-muted m-2">Descripción / Código</p>
                        <select class="selectpicker col-sm-12 form-control " id="select-cate" data-show-subtext="false" data-live-search="true" >
                        </select>
                    </div>
                </div>	
                
                <div class="row mt-3 ">
                    <div class="col-sm-2">
                        <p class="text-muted m-2">FECHA DE DESPACHO</p>
                        <input type="text" class="input-fecha" id="f2">
                    </div>
                    <div class="col-sm-2">
                        <p class="text-muted m-2">FECHA ORDEN COMPRA</p>
                        <input type="text" class="input-fecha" id="f2">
                    </div>
                    
                    <div class="col-sm-4 border-right">
                        <p class="text-muted m-2">LAB</p>
                        <select class="selectpicker col-sm-12">
                            <option>LAB 01</option>
                            <option>LAB 02</option>
                            <option>LAB 03</option>
                        </select>
                    </div>
                    <div class="col-sm-2 ">
                        <p class="text-muted m-2">PRECIO FARMACIA</p>
                        <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="form-control"  placeholder="C$ 00.00">
                    </div>
                    <div class="col-sm-2 ">
                        <p class="text-muted m-2">PRECIO PUBLICO</p>
                        <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="form-control"  placeholder="C$ 00.00">
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 ">
                        <p class="text-muted m-2">MIFIC</p>
                        <select class="selectpicker">
                            <option>SI</option>
                            <option>NO</option>
                            <option>SOLICITADO</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-2 ">
                        <p class="text-muted m-2">REGENCIA NECESITA PERMISO </p>
                        <select class="selectpicker">
                            <option>SI</option>
                            <option>NO</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <p class="text-muted m-2">Consignado </p>
                        <select class="selectpicker">
                            <option>SI</option>
                            <option>NO</option>
                            <option>SOLICITADO</option>
                        </select>
                    </div>

                    <div class="col-sm-2 border-right">
                        <p class="text-muted m-2">MINSA ó Privado</p>
                        <select class="selectpicker">
                            <option>MINSA</option>
                            <option>PRIVADO</option>
                        </select>
                    </div>    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label" >CANTIDAD:</label>
                            <input type="number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="form-control" placeholder=" 00.00">
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group col-sm-12">
                            <label for="recipient-name" class="col-form-label" >ESTADO:</label>
                            <select class="selectpicker">
                                <option>TRANSITO</option>
                                <option>PRODUCTO MINSA</option>
                                <option>PEDIDO</option>
                            </select>
                        </div>
                    </div>  
                </div>
                
                <div class="form-group">
                    <label for="message-text" class="col-form-label" id="id-nota">Comentarios:</label>
                    <textarea class="form-control" id="id-coment" placeholder="Escriba una nota."></textarea>
                </div>


            </div>
		<div class="modal-footer">			
			<button type="button" class="btn btn-primary" id="id-print-pdf">
                <i class="material-icons text-white ml-2">note_add</i>
            </button>
            
		</div>
		</div>
	</div>
</div>
@endsection