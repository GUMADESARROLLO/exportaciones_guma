<script type="text/javascript">
    var dtPedidos;
    $(document).ready(function() {
        $('#InputBuscar').on('keyup', function() {
            var table = $('#tblPedidos').DataTable();
            table.search(this.value).draw();
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
                { "title": "id",                "data": "id"},            
                { "title": "Nº RECIBO",         "data": "numOrden" },
                { "title": "Nº FACTURA",        "data": "numFactura" },
                { "title": "FECHA DE DESPACHO",            "data": "fecha_despacho" },
                { "title": "FECHA DE ORDEN COMPRA",             "data": "fecha_orden" },
                { "title": "ARTICULO",          "data": "codigo" },
                { "title": "DESCRIPCION",             "data": "descripcion" },
                { "title": "LABORATORIO",          "data": "lab"},
                { "title": "CANTIDAD",            "data": "cantidad"},
                { "title": "MIFIC",            "data": "mific"},
                { "title": "PRECIO FARMACIA",            "data": "precio_farm"},
                { "title": "PRECIO PUBLICO",            "data": "precio_publ"},
                { "title": "REGENCIA NECESITA PERMISO",            "data": "permiso_necesario"},
                { "title": "CONSIGNADO",            "data": "consignado"},
                { "title": "TIPO",            "data": "tipo"},
                { "title": "COMENTARIOS",            "data": "comentarios"},
                { "title": "ESTADO",            "data": "estado"},
                

            ],
            "columnDefs": [
                {"className": "dt-center", "targets": [1,2,3,4 ]},
                {"className": "dt-right", "targets": [ 8,10,11 ]},
                { "width": "12%", "targets": [ 3,4] },
                { "width": "8%", "targets": [  ] },
                { "visible":false, "searchable": false,"targets": [0] }
            ],
            "createdRow": function( row, data, dataIndex ) {
                    /*if ( data.STATUS == 4) {        
                        $(row).addClass('tbl_rows_recibo_color');
                    }*/

            },
            "footerCallback": function ( row, data, start, end, display ) {
                /*var api = this.api();

                var intVal = function ( i ) {
                        return typeof i === 'string' ?
                        i.replace(/[^0-9.]/g, '')*1 :
                        typeof i === 'number' ?
                        i : 0;
                    };

                    var Pendiete    = 0;
                    var Ingresado   = 0;
                    var Verificado  = 0;
                    var Total       = 0;

                    total = api.column( 6 ).data().reduce( function (a, b){
                        return intVal(a) + intVal(b);
                    }, 0 );

                    for (var i = 0; i < data.length; i++) {
        
                        if (data[i].STATUS == "Pendiente")
                            Pendiete += intVal(data[i].TOTAL);
                        else if(data[i].STATUS == "Ingresado"){
                            Ingresado += intVal(data[i].TOTAL);
                        }else{
                            Verificado += intVal(data[i].TOTAL);
                        }
                    }

                    //Total = Pendiete + Ingresado + Verificado;
                    Total = Pendiete + Ingresado + Verificado;

                    $('#id_valor_pendiente').text("C$ " + numeral(Pendiete).format('0,0.00'));
                    $('#id_valor_ingresado').text("C$ " + numeral(Ingresado).format('0,0.00'));
                    $('#id_valor_verificado').text("C$ " + numeral(Verificado).format('0,0.00'));
                    $('#id_valor_Total').text("C$ " + numeral(Total).format('0,0.00'));*/
            },
        });

        $("#tblPedidos_length").hide();
        $("#tblPedidos_filter").hide();


       

        inicializaControlFecha();

    });

  
    //Guardar
    $('#btnAdd').on('click', function() {
        $('#mdlResumen').modal('show');
        cate = '';
        $.ajax({
            url: 'articulos',            
            type: "GET",
            dataType: "json",
            async: false,
            success: function (datos) {
                $.each(datos, function(i, x) {
                        
                        cate += `<option>` + x['DESCRIPCION'] + ` - [` + x['ARTICULO']  +`]</option>`
                    });
                
                $("#select-cate").empty().append(cate).selectpicker('refresh');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, status) {
                //console.log(jqXHR);
                //alert("complete\njqXHR="+jqXHR+"\nstatus="+status);
            }
        });
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