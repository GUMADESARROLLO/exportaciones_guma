<script type="text/javascript">
    var dtPedidos;
    $(document).ready(function() {

        $('#InputBuscar').on('keyup', function() {
            var table = $('#tblPedidos').DataTable();
            table.search(this.value).draw();
        });

        $( "#id_filter_empresa,#id_filter_tipo").change(function() {
            var table = $('#tblPedidos').DataTable();
            table.search(this.value).draw();
        });

        $( "#id_filter_row").change(function() {
            var table = $('#tblPedidos').DataTable();
            table.page.len(this.value).draw();
        });

        $('#tblPedidos').DataTable({
            'ajax':{
                "url": "pedido",
                'dataSrc': '',   
            },
            "destroy" : true,
            "info":    false,
            "lengthMenu": [[7,-1], [7,"Todo"]],
            "language": {
                "zeroRecords": "NO HAY COINCIDENCIAS",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "REALICE UNA BUSQUEDA UTILIZANDO LOS FILTROS DE FECHA",
                "search":     "BUSCAR"
            },
            'columns': [
                { "title": "id",                        "data": "id"},            
                { "title": "Nº RECIBO",                 "data": "numOrden" },
                { "title": "Nº FACTURA",                "data": "numFactura" },
                { "title": "FECHA DE DESPACHO",         "data": "fecha_despacho" },
                { "title": "FECHA DE ORDEN COMPRA",     "data": "fecha_orden" },
                { "title": "ARTICULO",                  "data": "codigo" },
                { "title": "DESCRIPCION",               "data": "descripcion" },
                { "title": "LABORATORIO",               "data": "lab"},
                { "title": "CANTIDAD",                  "data": "cantidad" ,render: $.fn.dataTable.render.number( ',', '.', 2  , '' )},
                { "title": "MIFIC",                     "data": "mific"},
                { "title": "PRECIO FARMACIA",           "data": "precio_farm" , render: $.fn.dataTable.render.number( ',', '.', 2  , 'C$ ' ) },
                { "title": "PRECIO PUBLICO",            "data": "precio_publ" , render: $.fn.dataTable.render.number( ',', '.', 2  , 'C$ ' )},
                { "title": "PRECIO INST.",              "data": "precio_inst" , render: $.fn.dataTable.render.number( ',', '.', 2  , 'C$ ' )},
                { "title": "REGENCIA NECESITA PERMISO", "data": "permiso_necesario"},
                { "title": "CONSIGNADO",                "data": "consignado"},
                { "title": "TIPO",                      "data": "tipo"},
                { "title": "COMENTARIOS",               "data": "comentarios"},
                {
                    "title": "ESTADO",
                    "data": "estado",
                    "render": function(data, type, row,meta) {

                        var Titulos = '';
                        
                        if(row.estado===0){
                            Titulos = 'TRANSITO'
                        }else if(row.estado===1){
                            Titulos = 'PRODUCTO MINSA'
                        }else{
                            Titulos = 'PEDIDO'
                        }

                        return Titulos
                    }
                },
                {
                    "title": "ACCIONES",
                    "data": "id",
                    "render": function(data, type, row,meta) {
                        return '<div class="row mr-3 ml-3">'+
                                    '<div class="col-3 d-flex justify-content-center"><i class="material-icons icon-blue" onclick="Mostrar('+  row.id +')">visibility</i></div>'+
                                    '<div class="col-3 d-flex justify-content-center"><i class="material-icons" onclick="Editar(' + row.id+ ')">edit</i></div>'+
                                    '<div class="col-3 d-flex justify-content-center"><i class="material-icons icon-red" onclick="Eliminar(' + row.id + ')">delete</i></div>'+
                                '</div>'
                    }
                },
                {
                    "title": "UNIDAD",
                    "data": "empresa",
                    "render": function(data, type, row,meta) {

                        var Titulos = '';
                        
                        if(row.estado===0){
                            Titulos = ' '
                        }else if(row.empresa===1){
                            Titulos = 'UNIMARK S,A'
                        }else{
                            Titulos = 'GUMAPHARMA'
                        }

                        return Titulos
                    }
                },
                

            ],
            "columnDefs": [
                {"className": "dt-center", "targets": [1,2,3,4,7,9,12,14,16,17 ]},
                {"className": "dt-right", "targets": [ 8,10,11 ]},
                { "width": "20%", "targets": [6 ] },
                { "width": "8%", "targets": [ 3,4,17 ] },
                { "visible":false, "searchable": false,"targets": [0,19] }
            ],
            "createdRow": function( row, data, dataIndex ) {        

                    if ( data.estado === 0) {        
                        $(row).addClass('tbl_rows_transito');
                    } else if ( data.estado === 1) {
                        $(row).addClass('tbl_rows_producto_minsa');
                    } else if ( data.estado === 2) {        
                        $(row).addClass('tbl_rows_pedido');
                    }

            },
            "footerCallback": function ( row, data, start, end, display ) {
                
            },
        });

        $("#tblPedidos_length").hide();
        $("#tblPedidos_filter").hide();


        inicializaControlFecha();

    });

    function Mostrar(gPosition){

        LoadSelect();

        var table = $('#tblPedidos').DataTable();
        var row = table.rows().data();

        const ArrayRows = Object.values(row);
        var index = ArrayRows.findIndex( s => s.id ==gPosition )

        row = row[index]

        $('#mdlResumen').modal('show');

        $("#id_numero_recibo").val(row.numOrden)
        $("#id_numero_factura").val(row.numFactura)
        $('#id_select_articulo').selectpicker('val', row.codigo);

        $("#id_fecha_despacho").val(row.fecha_despacho)
        $("#id_fecha_orden").val(row.fecha_orden)
        $("#id_select_laboratorios").val(row.lab).change();
        $("#id_precio_farmacia").val(row.precio_farm)
        $("#id_precio_publico").val(row.precio_publ);
        $("#id_precio_intitucion").val(row.precio_inst);

        $("#id_select_mific").val(row.mific).change();
        $("#id_select_regencia").val(row.permiso_necesario).change();
        $("#id_select_consignado").val(row.consignado).change();
        $("#id_select_minsa_privado").val(row.tipo).change();
        $("#id_cantidad").val(row.cantidad)
        $("#id_select_estado").val(row.estado).change();
        $("#id_coment").val(row.comentarios)
        $("#id_select_empresa").val(row.empresa).change();
        $("#id_add").hide();
        


    }
    function Editar(gPosition){

        LoadSelect();

        var table = $('#tblPedidos').DataTable();
        var row = table.rows().data();

        const ArrayRows = Object.values(row);
        var index = ArrayRows.findIndex( s => s.id ==gPosition )

        row = row[index]
        
        $("#id_row").text(row.id)

        $('#mdlResumen').modal('show');

        $("#id_numero_recibo").val(row.numOrden)
        $("#id_numero_factura").val(row.numFactura)
        $('#id_select_articulo').selectpicker('val', row.codigo);
        $("#id_fecha_despacho").val(row.fecha_despacho)
        $("#id_fecha_orden").val(row.fecha_orden)
        $("#id_select_laboratorios").val(row.lab).change();
        $("#id_precio_farmacia").val(row.precio_farm)
        $("#id_precio_publico").val(row.precio_publ)
        $("#id_precio_intitucion").val(row.precio_inst);

        $("#id_select_mific").val(row.mific).change();
        $("#id_select_regencia").val(row.permiso_necesario).change();
        $("#id_select_consignado").val(row.consignado).change();
        $("#id_select_minsa_privado").val(row.tipo).change();
        $("#id_cantidad").val(row.cantidad)
        $("#id_select_estado").val(row.estado).change();
        $("#id_coment").val(row.comentarios)
        $("#id_select_empresa").val(row.empresa).change();


        $("#id_add").show();
    }
    function Eliminar(id){
        $.ajax({
            url: 'cambiar_estado',
            data: {
                data:  {  
                    id : id
                }
            },
            type: 'post',
            async: true,
            success: function(response) {
                //console.log('Exito en guardar quimicos');
                //mensaje(response.responseText, 'success');
            },
            error: function(response) {
                //console.log("error en ajax de Quimicos");
                //mensaje(response.responseText, 'error');
            }
        }).done(function(data) {
            location.reload();
        });
    }

    function LoadSelect(){
        Articulos       = '';
        Laboratorios    = '';
        Consignado      = '';

        $.ajax({
            url: 'articulos_umk',            
            type: "GET",
            dataType: "json",
            async: false,
            success: function (datos) {
                $.each(datos, function(i, x) {                        
                    Articulos += '<option value="'+x['ARTICULO']+'" >' + x['DESCRIPCION'] + ' - [' + x['ARTICULO']  +']</option>'
                });
                
                $("#id_select_articulo").empty().append(Articulos).selectpicker('refresh');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, status) {
            }
        });
        Articulos       = '';
        $.ajax({
            url: 'articulos_gp',            
            type: "GET",
            dataType: "json",
            async: false,
            success: function (datos) {
                $.each(datos, function(i, x) {                        
                    Articulos += '<option value="'+x['ARTICULO']+'" >' + x['DESCRIPCION'] + ' - [' + x['ARTICULO']  +']</option>'
                });
                
                $("#id_select_articulo").empty().append(Articulos).selectpicker('refresh');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, status) {
            }
        });

        $.ajax({
            url: 'laboratorios',            
            type: "GET",
            dataType: "json",
            async: false,
            success: function (datos) {
                $.each(datos, function(i, x) {
                    Laboratorios += '<option value="'+x['nombre_lab']+'" >' + x['nombre_lab']  +'</option>'
                });
                
                $("#id_select_laboratorios").empty().append(Laboratorios);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, status) {
                //console.log(jqXHR);
                //alert("complete\njqXHR="+jqXHR+"\nstatus="+status);
            }
        });

        $.ajax({
            url: 'consignado',            
            type: "GET",
            dataType: "json",
            async: false,
            success: function (datos) {
                $.each(datos, function(i, x) {                        
                    Consignado += '<option value="'+x['id']+'" >' + x['Nombre']  +'</option>'
                });
                
                $("#id_select_consignado").empty().append(Consignado);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, status) {
                //console.log(jqXHR);
                //alert("complete\njqXHR="+jqXHR+"\nstatus="+status);
            }
        });
    }
    
    $('#btnAdd').on('click', function() {

        $('#mdlResumen').modal('show');
        $("#id_add").show();

        $("#id_row").text("New")
        LoadSelect();
        
    });

    $('#id_add').on('click', function() {

        var array = [];

        var id                  = $("#id_row").text();
        var nRecibo             = $("#id_numero_recibo").val();
        var nFactura            = $("#id_numero_factura").val()
        var Empresa             = $("#id_select_empresa").val()
        var Articulo            = $("#id_select_articulo").val()
        var Descripcion         = $('#id_select_articulo option:selected').text()        
        var fecha_despacho      = $("#id_fecha_despacho").val()
        var fecha_orden         = $("#id_fecha_orden").val()
        var Laboratorio         = $('#id_select_laboratorios option:selected').text()        

        var precio_farmacia     = $("#id_precio_farmacia").val()
        var precio_publico      = $("#id_precio_publico").val()
        var precio_institu      = $("#id_precio_intitucion").val()

        var mific               = $('#id_select_mific option:selected').text()        
        var regencia_permiso    = $('#id_select_regencia option:selected').text()        
        var consignado          = $('#id_select_consignado option:selected').text()        
        var minsa_privado       = $('#id_select_minsa_privado option:selected').text()    

        var cantidad            = $('#id_cantidad').val()        
        var estado              = $('#id_select_estado').val()        
        var comentarios         = $('#id_coment').val() 


        var Titulo  = '';
        var Ruta    = '';
        if (nRecibo === '') {
            Titulo = 'nRecibo'
        } else if (nFactura === '') {
            Titulo = 'nFactura'
        } else if (Articulo === '') {
            Titulo = 'Articulo'
        } else if (Empresa === '') {
            Titulo = 'Empresa'
        } else if (Descripcion === '') {
            Titulo = 'Descripcion'
        } else if (fecha_despacho === '') {
            Titulo = 'fecha_despacho'
        } else if (fecha_orden === '') {
            Titulo = 'fecha_orden'
        } else if (Laboratorio === '') {
            Titulo = 'Laboratorio'
        } else if (precio_farmacia === '') {
            Titulo = 'precio_farmacia'
        } else if (precio_publico === '') {
            Titulo = 'precio_publico'
        } else if (precio_institu === '') {
            Titulo = 'precio_institucion'
        } else if (mific === '') {
            Titulo = 'mific'
        } else if (regencia_permiso === '') {
            Titulo = 'regencia_permiso'
        } else if (consignado === '') {
            Titulo = 'consignado'
        } else if (minsa_privado === '') {
            Titulo = 'minsa_privado'
        } else if (cantidad === '') {
            Titulo = 'cantidad'
        } else if (estado === '') {
            Titulo = 'Recibo'
        } else if (comentarios === '') {
            Titulo = 'comentarios'
        }else{

            if (id ==='New') {
                Ruta = 'guardar_pedido'
                id = '0';
            } else {
                Ruta = 'editar_pedido'
            }
            array[0] = {  
                    id : id,
                    orden: nRecibo, 
                    factura: nFactura, 
                    codigo: Articulo, 
                    empresa: Empresa,
                    descripcion: Descripcion, 
                    fecha_despacho: fecha_despacho,
                    fecha_orden: fecha_orden,                   
                    lab: Laboratorio, 
                    precio_farm: precio_farmacia,
                    precio_public: precio_publico,
                    precio_institu: precio_institu,
                    mific: mific, 
                    permiso_necesario: regencia_permiso,                     
                    consignado: consignado,
                    tipo: minsa_privado, 
                    cantidad: cantidad,
                    estado: estado,
                    comentarios: comentarios
                };
                console.log(Titulo);
                $.ajax({
                    url: Ruta,
                    data: {
                        data: array
                    },
                    type: 'post',
                    async: true,
                    success: function(response) {
                        //console.log('Exito en guardar quimicos');
                        //mensaje(response.responseText, 'success');
                    },
                    error: function(response) {
                        //console.log("error en ajax de Quimicos");
                        //mensaje(response.responseText, 'error');
                    }
                }).done(function(data) {
                    location.reload();
                });
        }
        
    });

    
    


    /********INICIALIZANDO CONTROL FECHA - START********/
    function inicializaControlFecha() {
    $('input[class="input-fecha"]').daterangepicker({
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "D",
                "L",
                "M",
                "M",
                "J",
                "V",
                "S"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 0
        },
        singleDatePicker: true,
        showDropdowns: true
    });
    }
</script>