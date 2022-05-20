var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1).replace('#!', '',);
var band = false;

$("nav.pcoded-navbar div div ul li").each(function () {
    var link = $(this).find('a').attr('href');
    var sub_clase = '';

    if (typeof link !== "undefined") {
        const ruta = link.substring(link.lastIndexOf("/") + 1);

        if (ruta == pgurl) {
            sub_clase = $(this).parent().parent().parent().parent().attr('class');

            if (sub_clase == 'nav-item pcoded-hasmenu') {
                $(this).parent().parent().removeClass().addClass("nav-item pcoded-hasmenu active pcoded-trigger")
                $(this).parent().parent().parent().parent().removeClass().addClass("nav-item pcoded-hasmenu active pcoded-trigger")
            } else {
                sub_clase = $(this).parent().parent().attr('class');

                if (sub_clase == 'nav-item pcoded-hasmenu') {
                    $(this).parent().parent().removeClass().addClass("nav-item pcoded-hasmenu active pcoded-trigger")
                } else {
                    sub_clase = $(this).attr('class');

                    if (sub_clase == 'nav-item') {
                        $(this).removeClass().addClass("nav-item active")
                    }
                }
            }
            $(this).removeClass('text-secondary').addClass("active");
        }

    }

});

//METODO QUE PERMITE ENVIAR POR POST AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function mensaje(mensaje, tipo) {
    /*
    Tipos:
    success, error, warning, info, question
    +*/
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    toast({
        type: tipo,
        title: mensaje
    })
}

$("body").click(function (e) {
    if ($("#sidebar").hasClass('active') || $(e.target).hasClass('active-menu')) {
        $("#sidebar").toggleClass('active');
    }
});

// Sidebar toggle behavior
$('#sidebarCollapse').on('click', function () {
    $.removeCookie('navbar');
    if ($("#sidebar-menu-left").hasClass('active')) {
        $.cookie('navbar', true)

    } else {
        $.cookie('navbar', false)

    }
    $('#sidebar-menu-left, #content').toggleClass('active');


});

function fullScreen() {
    //SI ESTA EN UN TELEFONO
    if (($('header').width() <= 420)) {
        $('#sidebar-menu-left, #content')
            .addClass('active')
            .removeClass('notactive');
    }

    if ($.cookie('navbar') == 'true') {
        $('#sidebar-menu-left, #content')
            .addClass('notactive')
            .removeClass('active');
    } else if ($.cookie('navbar') == 'false') {
        $('#sidebar-menu-left, #content')
            .addClass('active')
            .removeClass('notactive');
    }
}

function inicializaControlFecha() {
    $('input[class="input-fecha form-control"]').daterangepicker({
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



//Nueva notificacion

exist_notify();


$('#tinkerbell').on('show.bs.dropdown', function () {
    getAllNotificaciones();
    exist_notify();
 })
 $('#tinkerbell').on('shown.bs.dropdown', function () {
    exist_notify();
    setTimeout(function() {
        changeState();
        exist_notify();
    }, 2000);
 })
 $('#tinkerbell').on('hidden.bs.dropdown    ', function () {
    changeState();
    $('#message_content').empty();
 })


function exist_notify() {
    $.ajax({
        url: "./Allnotificaciones",
        type: "GET",
        async: true,
        cache:false, 
        success: function (data) {
            
           
            count = 0;
            data.forEach(element => {
                if (element.leido == 0) {
                    count++;
                }
            });

            if (count > 0) {
                $('#count').addClass('unread-notification');
            } else {
                $('#count').removeClass('unread-notification');
            }



        }
    });

}

//Cambiar estado
function changeState() {
    $.ajax({
        url: "updateState",
        type: "POST",
        dataType: "json",
        data: {},
        async: true,
        cache:false, 
        success: function (response) {
            console.log(response);
            console.log('Estado cambiado');

        }
    });
}

/*$('#navbarDropdown').on('click', function (e) {
});*/


function getAllNotificaciones() {
    $.ajax({
        url: "./Allnotificaciones",
        type: "GET",
        async: true,
        dataType: "json",
        cache:false, 
        success: function (data) {
            console.log(data);
            var i = 0;
             if (Object.keys(data).length === 0) {
                var scriptHTML = `<div class="notification-ui_dd-header">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h6 class="card-header-title mb-0">Notificaciones</h6>
                                        </div>
                                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Ver Todos</a></div>
                                    </div>
                                </div>
                                <div class="notification-ui_dd-content">
                                    <a href="#!" class="notification-list text-dark">
                                        <div class="notification-list_detail justify-content-center">
                                            <p>No hay notificaciones</p>
                                        </div>
                                    </a>
                                </div>`;
                    $("#message_content").append(scriptHTML);
            }else{
                var scriptHTML = `<div class="notification-ui_dd-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                      <h6 class="card-header-title mb-0">Notificaciones</h6>
                    </div>
                    <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Ver Todos</a></div>
                </div>
             </div>
             <div class="notification-ui_dd-content">`;
                data.forEach(element => {
                    cambiarCadena(element)
                    if (element.leido == 0) {
                        scriptHTML += `
                            <a href="#!" class="notification-list notification-list--unread text-dark">
                                <div class="notification-list_img">
                                    <img src="images/user/avatar-4.jpg" alt="user">
                                </div>
                                <div class="notification-list_detail">
                                    <p><b>`+ element.nombre + `</b> <br><span class="text-muted">` + element.title + `</span></p>
                                    <p class="nt-link">` + element.message + `</p>
                                </div>
                                <p><small>` + element.created_at + `</small></p>
                            </a>`;
                    } else {
                        if (i <= 9) {
                            scriptHTML += `
                                <a href="#!" class="notification-list text-dark">
                                    <div class="notification-list_img">
                                            <img src="images/user/avatar-4.jpg" alt="user">
                                    </div>
                                    <div class="notification-list_detail">
                                            <p><b>`+ element.nombre + `</b> <br><span class="text-muted">` + element.title + `</span></p>
                                            <p class="nt-link">` + element.message + `</p>
                                        </div>
                                        <p><small>` + element.created_at + `</small></p>
                                    </a>`;
                        }
                        i++;
                    }
                });
                scriptHTML += ` </div></div>`;
                $("#message_content").append(scriptHTML);
            }

        }
    });
}

