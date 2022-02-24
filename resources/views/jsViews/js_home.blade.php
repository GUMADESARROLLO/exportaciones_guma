<script type="text/javascript">
    var dtPedidos;
    $(document).ready(function() {
        dtPedidos = $('#tblPedidos').DataTable({ // Costos por ORDEN
            "ajax": {
                "url": "pedido",
                'dataSrc': '',
            },
            "order": [
                [0, "desc"]
            ],
            "destroy": true,
            "bPaginate": false,
            "pagingType": "full",
            "info": false,
            "language": {
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "emptyTable": `<p class="text-center">N/A</p>`,
                "search": "BUSCAR",
                "oPaginate": {
                    sNext: " Siguiente ",
                    sPrevious: " Anterior ",
                    sFirst: "Primero ",
                    sLast: " Ultimo",
                },
            },
            "columns": [{
                    "title": "Seleccionar",
                    "data": "id",
                    "render": function(data, type, row) {
                        if (data) {
                            return '<div class="form-check">' +
                                '<input class="form-check-input" name="id" type="checkbox" value="' + data + '" id="flexCheckChecked" >' +
                                '</div>';

                        } else {
                            return '<div class="form-check">' +
                                '<input class="form-check-input" name="id" type="checkbox" id="flexCheckChecked" disabled>' +
                                '</div>';
                        }
                    }
                }, {
                    "title": "Pedido/Tránsito",
                    "data": "tipo_export",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<select class="form-control m-0 p-0" name="tipo_export" id="tipo_export">' +
                                '<option value = "PEDIDO"> PEDIDO </option>' +
                                '<option value = "TRANSITO"> TRANSITO </option> </select>'
                        }
                    }

                }, {
                    "title": "NO. ORDEN",
                    "data": "numOrden",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="numOrden">'
                        }
                    }
                },
                {
                    "title": "FECHA DE DESPACHO",
                    "data": "fecha_despacho",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input type="text" class="input-fecha-dos form-control m-0 p-0" id="" name="fecha_despacho">'
                        }
                    }
                },
                {
                    "title": "FECHA DE ORD.COMPRA",
                    "data": "fecha_orden",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input type="text" class="input-fecha-dos form-control m-0 p-0" id="" name="fecha_orden">'
                        }
                    }
                },
                {
                    "title": "CÓDIGO",
                    "data": "codigo",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="codigo">'
                        }
                    }
                },
                {
                    "title": "DESCRIPCIÓN",
                    "data": "descripcion",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="descripcion">'
                        }
                    }
                },
                {
                    "title": "LAB",
                    "data": "lab",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="lab">'
                        }
                    }
                },
                {
                    "title": "CANT.",
                    "data": "cantidad",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="cantidad">'
                        }
                    }
                },
                {
                    "title": "MIFIC",
                    "data": "mific",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<select class="form-control m-0 p-0" name="mific" >' +
                                '<option value = "SI"> SI </option>' +
                                '<option value = "NO"> NO </option> </select>'
                        }
                    }
                },
                {
                    "title": "PRECIO FARMACIA",
                    "data": "precio_farm",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="precio_farm">'
                        }
                    }
                },
                {
                    "title": "PRECIO PUBLICO",
                    "data": "precio_publ",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="precio_publ">'
                        }
                    }

                },
                {
                    "title": "REGENCIA NECESITA PERMISO",
                    "data": "permiso_necesario",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<select class="form-control m-0 p-0" name="permiso_necesario" >' +
                                '<option value = "SI" > SI </option>' +
                                '<option value = "NO" > NO </option> </select>'
                        }
                    }
                },
                {
                    "title": "CONSIGNADO",
                    "data": "consignado",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="consignado">'
                        }
                    }
                },
                {
                    "title": "MINSA O PRIVADO",
                    "data": "tipo",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<select class="form-control m-0 p-0" name="tipo">' +
                                '<option value = "MINSA" > MINSA </option>' +
                                '<option value = "PRIVADO" > PRIVADO </option> </select>'
                        }
                    }
                },
                {
                    "title": "COMENTARIOS",
                    "data": "comentarios",
                    "render": function(data, type, row) {
                        if (data) {
                            return data;
                        } else {
                            return '<input class="input-dt m-0 p-0" type="text" name="comentarios">'
                        }
                    }
                },
                {
                    "title": "EStADO",
                    "data": "estado",
                    "render": function(data, type, row) {
                        if (data) {
                            return '<span class = "badge badge-success" name="estado"> Activo </span>'
                        } else {
                            return '<span class = "badge badge-danger" name="estado"> Inactivo </span>'
                        }
                    }
                },
            ],
            "columnDefs": [{
                "targets": [0],
                "className": "dt-center",
            }, ]
        });

        $("#tblPedidos_filter").hide();
        $("#tblPedidos_length").hide();
        $('#cont_search').show();
        $('#InputBuscar').on('keyup', function() {
            var table = $('#tblPedidos').DataTable();
            table.search(this.value).draw();
        });
        inicializaControlFecha();
        $('#tblPedidos > thead').addClass('bg-success text-white');

    });

    //Añadir filas
    $(document).on('click', '.add-row-dt-pedidos', function() {
        var last_row_ = dtPedidos.row(":last").data();
        dtPedidos.row.add([{}]).draw();
        inicializaControlFecha();
    });

    //Guardar
    $('#btn-Guardar').on('click', function() {
        let i = 0;
        var array = [];
        var data = dtPedidos.$(':input,select').serializeArray();
        let tipo_export, numOrden, fecha_despacho, quimico, codigo, descripcion, lab,
            cantidad, mific, precio_farm, precio_publ, permiso_necesario, consignado, tipo, comentarios
        // console.log(data);
        $.each(data, function(ind, elem) {
            dtPedidos.rows().eq(0).each(function(index) {
                row = dtPedidos.row(index);
                data = row.data();
                id = data['id'];
                /*if (elem.name === 'tipo_export') {
                    tipo_export = elem.value;
                } else if (elem.name === 'numOrden') {
                    numOrden = elem.value;
                } else if (elem.name === 'fecha_despacho') {
                    fecha_despacho = elem.value;
                } else if (elem.name === 'fecha_orden') {
                    fecha_orden = elem.value;
                } else if (elem.name === 'codigo') {
                    codigo = elem.value;
                } else if (elem.name === 'descripcion') {
                    descripcion = elem.value;
                } else if (elem.name === 'lab') {
                    lab = elem.value;
                } else if (elem.name === 'cantidad') {
                    cantidad = elem.value;
                } else if (elem.name === 'mific') {
                    mific = elem.value;
                } else if (elem.name === 'precio_farm') {
                    precio_farm = elem.value;
                } else if (elem.name === 'precio_publ') {
                    precio_publ = elem.value;
                } else if (elem.name === 'permiso_necesario') {
                    permiso_necesario = elem.value;
                } else if (elem.name === 'consignado') {
                    consignado = elem.value;
                } else if (elem.name === 'tipo') {
                    tipo = elem.value;
                } else if (elem.name === 'comentarios') {
                    comentarios = elem.value;
                }*/     

                array[i] = {
                    tipo_export: tipo_export, //1
                    orden: numOrden, //2
                    fecha_despacho: fecha_despacho, //3
                    fecha_orden: quimico, //4
                    codigo: codigo, //5
                    descripcion: descripcion, //6
                    lab: lab, //7
                    cantidad: cantidad, //8
                    mific: mific, //9
                    precio_farm: precio_farm, //10 
                    precio_farm: precio_publ, //11
                    permiso_necesario: permiso_necesario, //12
                    consignado: consignado, //13
                    tipo: tipo, //14
                    comentarios: comentarios //15
                };
            });
           // +i++
        });

        i++;
        console.log(array);

        dtPedidos.rows().eq(0).each(function(index) {
            var row = dtPedidos.row(index);
            var data_tabla = row.data();
            var pos = data[0];
            var id = pos;

            //   console.log(data_tabla);
        });


    });


    /********INICIALIZANDO CONTROL FECHA - START********/
    function inicializaControlFecha() {
        $('input[class="input-fecha-dos form-control m-0 p-0"]').daterangepicker({
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