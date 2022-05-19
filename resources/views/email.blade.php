<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <style>
            /*html, body {
                background: #FCEEB5;
                font-family: Abel, Arial, Verdana, sans-serif;
            }

            .center {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
            }

            .card {
                width: 350px;
                height: 200px;
                background-color: #fff;
                background: linear-gradient(#f8f8f8, #fff);
                box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
                border-radius: 6px;
                overflow: hidden;
                position: relative;
                margin: 1.5rem;
            }

            .card h1 {
                text-align: center;
            }

            .card .general {

                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 1;
                box-sizing: border-box;
                padding: 1rem;
                padding-top: 0;
            }

            .card .general .more {
                position: absolute;
                bottom: 1rem;
                right: 1rem;
                font-size: 0.9em;
            }*/
        </style>
    </head>
    <body>
        {{--<div class="center">
            <div class="card">
                <div class="general">
                    <h1>Notificacion</h1>
                    <p>Se ha editado la factura con el codigo <b> 88 </b></p>
                    <span class="more"></span>
                </div>
            </div>
        </div>--}}

        <div class="notification-list notification-list--unread text-dark">
            <div class="notification-list_img">
                <img src="{{ asset('images/user/avatar-4.jpg') }}" alt="user">
            </div>
            <div class="notification-list_detail">
                <p><b>John Doe</b> <br><span class="text-muted">Cambios de XXXXXXX en 000</span></p>
                <p class="nt-link text-truncate">Referente a que cambio.</p>
            </div>
            <p><small>10 mins ago</small></p>
        </div>

        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
