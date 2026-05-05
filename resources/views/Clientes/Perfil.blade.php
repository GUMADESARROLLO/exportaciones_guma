<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil del Cliente - Rifa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            :root {
                --primary: #4e73df;
                --success: #1cc88a;
                --info: #36b9cc;
                --warning: #f6c23e;
                --danger: #e74a3b;
                --dark: #5a5c69;
                --light: #f8f9fc;
            }
            body {
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
                font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            }
            .profile-banner {
                background: linear-gradient(135deg, var(--primary) 0%, #1cc88a 100%);
                padding: 2.5rem 0 4rem;
                position: relative;
                overflow: hidden;
            }
            .profile-banner::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -10%;
                width: 400px;
                height: 400px;
                background: rgba(255,255,255,0.08);
                border-radius: 50%;
            }
            .profile-banner::after {
                content: '';
                position: absolute;
                bottom: -30%;
                left: -5%;
                width: 300px;
                height: 300px;
                background: rgba(255,255,255,0.05);
                border-radius: 50%;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 8px 24px rgba(0,0,0,0.15);
                position: relative;
                z-index: 1;
            }
            .profile-avatar i {
                font-size: 3rem;
                background: linear-gradient(135deg, var(--primary), #1cc88a);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .profile-name {
                color: white;
                font-weight: 700;
                font-size: 1.75rem;
            }
            .profile-code {
                color: rgba(255,255,255,0.85);
                font-size: 0.95rem;
            }
            .metrics-wrapper {
                margin-top: -3rem;
                position: relative;
                z-index: 2;
                padding-bottom: 2rem;
            }
            .metric-card {
                background: white;
                border-radius: 12px;
                padding: 1.5rem;
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                border-left: 4px solid transparent;
                position: relative;
                overflow: hidden;
            }
            .metric-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            }
            .metric-card.facturas { border-left-color: var(--primary); }
            .metric-card.acciones { border-left-color: var(--success); }
            .metric-card.total { border-left-color: var(--info); }
            .metric-card .icon-bg {
                position: absolute;
                right: -10px;
                bottom: -10px;
                font-size: 5rem;
                opacity: 0.08;
            }
            .metric-card .metric-icon {
                width: 48px;
                height: 48px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 0.75rem;
            }
            .metric-card.facturas .metric-icon { background: rgba(78,115,223,0.1); color: var(--primary); }
            .metric-card.acciones .metric-icon { background: rgba(28,200,138,0.1); color: var(--success); }
            .metric-card.total .metric-icon { background: rgba(54,185,204,0.1); color: var(--info); }
            .metric-card .metric-value {
                font-size: 1.75rem;
                font-weight: 700;
                color: var(--dark);
                line-height: 1;
            }
            .metric-card .metric-label {
                font-size: 0.8rem;
                color: #858796;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-top: 0.25rem;
            }
            .section-card {
                background: white;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.06);
                margin-bottom: 1.5rem;
                overflow: hidden;
            }
            .section-card .section-header {
                padding: 1.25rem 1.5rem;
                border-bottom: 1px solid #e3e6f0;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            .section-card .section-header h5 {
                margin: 0;
                font-weight: 700;
                color: var(--dark);
            }
            .section-card .section-header .badge {
                font-size: 0.75rem;
                padding: 0.35em 0.65em;
            }
            .info-item {
                padding: 1rem 1.5rem;
                border-bottom: 1px solid #f1f3f8;
                display: flex;
                align-items: center;
                gap: 1rem;
            }
            .info-item:last-child { border-bottom: none; }
            .info-item .info-icon {
                width: 36px;
                height: 36px;
                border-radius: 8px;
                background: var(--light);
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--primary);
                flex-shrink: 0;
            }
            .info-item .info-content { flex: 1; }
            .info-item .info-label {
                font-size: 0.75rem;
                color: #858796;
                text-transform: uppercase;
                margin: 0;
            }
            .info-item .info-value {
                font-size: 0.95rem;
                color: var(--dark);
                font-weight: 500;
                margin: 0;
            }
            .raffle-card {
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.08);
                padding: 1.5rem;
                margin-bottom: 1rem;
                transition: all 0.25s ease;
                border-left: 4px solid var(--primary);
                position: relative;
            }
            .raffle-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0,0,0,0.12);
                border-left-color: var(--success);
            }
            .raffle-card .factura-index {
                position: absolute;
                top: 1rem;
                right: 1rem;
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background: var(--light);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 0.85rem;
            }
            .raffle-card .factura-folio {
                font-weight: 700;
                color: var(--dark);
                font-size: 1.1rem;
                margin-bottom: 0.5rem;
            }
            .raffle-card .factura-folio i {
                color: var(--primary);
            }
            .raffle-card .factura-meta {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                flex-wrap: wrap;
            }
            .raffle-card .factura-meta .meta-item {
                display: flex;
                align-items: center;
                gap: 0.4rem;
                color: #858796;
                font-size: 0.9rem;
            }
            .raffle-card .factura-meta .meta-item i {
                width: 16px;
                text-align: center;
            }
            .raffle-card .factura-meta .meta-amount {
                color: var(--success);
                font-weight: 600;
            }
            .raffle-card .acciones-header {
                font-size: 0.8rem;
                color: #858796;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 0.75rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            .raffle-card .acciones-header .count-badge {
                background: var(--success);
                color: white;
                padding: 0.15rem 0.5rem;
                border-radius: 10px;
                font-size: 0.75rem;
                font-weight: 600;
            }
            .raffle-number {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 52px;
                padding: 0.4rem 0.85rem;
                background: linear-gradient(135deg, #f8f9fc, #e8ecf4);
                border: 1px solid #d1d3e2;
                border-radius: 8px;
                margin: 0.2rem;
                font-weight: 600;
                color: var(--dark);
                font-size: 0.85rem;
                transition: all 0.2s ease;
            }
            .raffle-number:hover {
                background: linear-gradient(135deg, var(--primary), #3a5fc8);
                color: white;
                border-color: var(--primary);
                transform: scale(1.05);
            }
            .raffle-number.active {
                background: linear-gradient(135deg, var(--success), #17a673);
                color: white;
                border-color: var(--success);
            }
            .empty-state {
                text-align: center;
                padding: 3rem 1rem;
                color: #858796;
            }
            .empty-state i {
                font-size: 3.5rem;
                opacity: 0.3;
                margin-bottom: 1rem;
            }
            .actions-overview {
                background: linear-gradient(135deg, rgba(28,200,138,0.05), rgba(54,185,204,0.05));
                border-radius: 10px;
                padding: 1.25rem;
            }
            .divider {
                height: 1px;
                background: linear-gradient(90deg, transparent, #e3e6f0, transparent);
                margin: 1.5rem 0;
            }
        </style>
    </head>
    <body>
        <!-- Banner de Perfil -->
        <div class="profile-banner">
            <div class="container position-relative" style="z-index: 1;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h1 class="profile-name mb-1">{{ $cliente['nombre'] ?? 'Cliente' }}</h1>
                        <p class="profile-code mb-0">
                            <i class="fas fa-qrcode me-1"></i>
                            Código: {{ $cliente['codigo'] ?? 'N/D' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Métricas -->
        <div class="container metrics-wrapper">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="metric-card facturas">
                        <i class="fas fa-file-invoice icon-bg"></i>
                        <div class="metric-icon">
                            <i class="fas fa-file-invoice fa-lg"></i>
                        </div>
                        <div class="metric-value">{{ $cliente['total_facturas'] ?? 0 }}</div>
                        <div class="metric-label">Facturas</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-card acciones">
                        <i class="fas fa-ticket-alt icon-bg"></i>
                        <div class="metric-icon">
                            <i class="fas fa-ticket-alt fa-lg"></i>
                        </div>
                        <div class="metric-value">{{ $cliente['total_acciones'] ?? 0 }}</div>
                        <div class="metric-label">Acciones</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-card total">
                        <i class="fas fa-dollar-sign icon-bg"></i>
                        <div class="metric-icon">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                        <div class="metric-value">C$ {{ number_format($cliente['total_compras'] ?? 0, 2) }}</div>
                        <div class="metric-label">Total Comprado</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row g-4">
                <!-- Columna Izquierda: Info del Cliente -->
                <div class="col-lg-4">
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-id-card text-primary"></i>
                            <h5>Información</h5>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="info-content">
                                <p class="info-label">Nombre Completo</p>
                                <p class="info-value">{{ $cliente['nombre'] ?? ' - ' }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-hashtag"></i>
                            </div>
                            <div class="info-content">
                                <p class="info-label">Código de Cliente</p>
                                <p class="info-value">{{ $cliente['codigo'] ?? ' - ' }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <p class="info-label">Teléfono 1</p>
                                <p class="info-value">{{ $cliente['TELEFONO1'] ?? ' - ' }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info-content">
                                <p class="info-label">Teléfono 2</p>
                                <p class="info-value">{{ $cliente['TELEFONO2'] ?? ' - ' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Facturas y Acciones -->
                <div class="col-lg-8">
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-receipt text-success"></i>
                            <h5>Facturas y Acciones</h5>
                            <span class="badge bg-primary rounded-pill ms-auto">{{ count($cliente['facturas'] ?? []) }}</span>
                        </div>
                        <div class="p-3">
                            @forelse($cliente['facturas'] ?? [] as $index => $factura)
                            <div class="raffle-card">
                                <div class="factura-index">{{ $index + 1 }}</div>
                                <div class="row align-items-center">
                                    <div class="col-xl-5">
                                        <div class="factura-folio">
                                            <i class="fas fa-file-invoice me-2"></i>
                                            {{ $factura['folio'] ?? 'Sin folio' }}
                                        </div>
                                        <div class="factura-meta">
                                            <div class="meta-item">
                                                <i class="fas fa-calendar"></i>
                                                {{ $factura['fecha'] ?? '--/--/----' }}
                                            </div>
                                            <div class="meta-item meta-amount">
                                                <i class="fas fa-dollar-sign"></i>
                                                C$ {{ number_format($factura['monto'] ?? 0, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="acciones-header">
                                            <i class="fas fa-ticket-alt text-success"></i>
                                            Acciones
                                            <span class="count-badge">{{ $factura['cantidad_acciones'] ?? 0 }}</span>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            @forelse($factura['acciones'] ?? [] as $accion)
                                            <span class="raffle-number">
                                                {{ $accion['numero'] ?? str_pad($loop->index + 1, 3, '0', STR_PAD_LEFT) }}
                                            </span>
                                            @empty
                                            <span class="text-muted fst-italic small">Sin acciones</span>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="raffle-card">
                                <div class="row align-items-center">
                                    <div class="col-xl-5">
                                        <div class="factura-folio">
                                            <i class="fas fa-file-invoice me-2"></i>
                                            Sin facturas
                                        </div>
                                        <div class="factura-meta">
                                            <div class="meta-item">
                                                <i class="fas fa-calendar"></i>
                                                --/--/----
                                            </div>
                                            <div class="meta-item meta-amount">
                                                <i class="fas fa-dollar-sign"></i>
                                                C$ 0.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="acciones-header">
                                            <i class="fas fa-ticket-alt text-success"></i>
                                            Acciones
                                            <span class="count-badge">0</span>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <span class="raffle-number">00000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Resumen de Todas las Acciones -->
                    @if(!empty($cliente['Acciones']))
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-layer-group text-info"></i>
                            <h5>Todas las Acciones</h5>
                            <span class="badge bg-success rounded-pill ms-auto">{{ count($cliente['Acciones'] ?? []) }}</span>
                        </div>
                        <div class="p-3">
                            <div class="actions-overview">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($cliente['Acciones'] ?? [] as $accion)
                                        <span class="raffle-number active">
                                            {{ $accion }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
