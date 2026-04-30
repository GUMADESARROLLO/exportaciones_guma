<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil del Cliente - Rifa</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                background-color: #f8f9fa;
                font-family: 'Nunito', sans-serif;
            }
            .client-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 2rem 0;
                margin-bottom: 2rem;
            }
            .client-info-card {
                background: white;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .raffle-card {
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.08);
                padding: 1.25rem;
                margin-bottom: 1rem;
                transition: transform 0.2s, box-shadow 0.2s;
                border-left: 4px solid #667eea;
            }
            .raffle-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            }
            .raffle-number {
                display: inline-block;
                background: #e9ecef;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                margin: 0.25rem;
                font-weight: 600;
                color: #495057;
                font-size: 0.9rem;
            }
            .raffle-number.active {
                background: #28a745;
                color: white;
            }
            .raffle-number.winner {
                background: #ffc107;
                color: #212529;
            }
            .status-badge {
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-size: 0.85rem;
                font-weight: 600;
            }
            .status-active {
                background: #d4edda;
                color: #155724;
            }
            .status-pending {
                background: #fff3cd;
                color: #856404;
            }
            .status-completed {
                background: #d1ecf1;
                color: #0c5460;
            }
            .info-label {
                font-weight: 600;
                color: #6c757d;
                font-size: 0.85rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .info-value {
                font-size: 1.1rem;
                color: #212529;
                font-weight: 500;
            }
            .section-title {
                color: #495057;
                font-weight: 700;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid #667eea;
            }
        </style>
    </head>
    <body>
        <!-- Cliente Header -->
        <div class="client-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold fs-2 mb-2">
                            <i class="fas fa-user-circle me-3"></i>                            
                            {{ $cliente['nombre'] ?? 'Juan Perez' }}
                        </h1>
                        <p class="lead mb-0">
                            <i class="fas fa-qrcode me-2"></i>
                            <strong>{{ $cliente['codigo'] ?? 'N/D' }}</strong>
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="client-stats">
                            <div class="stat-item">
                                <i class="fas fa-ticket-alt fa-2x"></i>
                                <span class="stat-number">{{ $cliente['total_acciones'] ?? 5 }}</span>
                                <span class="stat-label">Acciones</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Información del Cliente -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="client-info-card">
                        <h4 class="section-title">
                            <i class="fas fa-id-card me-2"></i>Información del Cliente
                        </h4>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="info-label">Nombre Completo</p>
                                <p class="info-value">{{ $cliente['nombre'] ?? ' - ' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Código de Cliente</p>
                                <p class="info-value">{{ $cliente['codigo'] ?? ' - ' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Teléfono 1</p>
                                <p class="info-value">{{ $cliente['TELEFONO1'] ?? ' - ' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Teléfono 2</p>
                                <p class="info-value">{{ $cliente['TELEFONO2'] ?? ' - ' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones/Rifas del Cliente -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="client-info-card">
                        <h4 class="section-title">
                            <i class="fas fa-ticket-alt me-2"></i>Acciones en la Rifa
                        </h4>
                        <p class="text-muted mb-4">
                            <i class="fas fa-info-circle me-1"></i>
                            Las acciones se agrupan por cada factura realizada. Cada factura otorga acciones para participar en la rifa.
                        </p>
                        
                        @forelse($cliente['facturas'] ?? [] as $factura)
                        <div class="raffle-card">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h5 class="mb-2">
                                        <i class="fas fa-file-invoice text-primary me-2"></i>
                                        Factura: {{ $factura['folio'] ?? 'FAC-001' }}
                                    </h5>
                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <span class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $factura['fecha'] ?? '15/12/2024' }}
                                        </span>
                                        <span class="text-muted">
                                            <i class="fas fa-dollar-sign me-1"></i>
                                            Total: C${{ number_format($factura['monto'] ?? 1500, 2) }}
                                        </span>
                                        <!-- <span class="status-badge status-{{ $factura['estado'] ?? 'active' }}">
                                            <i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i>
                                            {{ $factura['estadoTexto'] ?? 'Pagada' }}
                                        </span> -->
                                    </div>
                                </div>
                                <div class="col-md-5 text-md-end">
                                    <small class="text-muted">
                                        <i class="fas fa-ticket me-1"></i>
                                        Acciones obtenidas ({{ $factura['cantidad_acciones'] ?? 5 }}):
                                    </small>
                                    <div class="mt-2">
                                        @forelse($factura['acciones'] ?? [] as $accion)
                                        <span class="raffle-number">
                                            {{ $accion['numero'] ?? str_pad($loop->index + 1, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                        @empty
                                        <span class="raffle-number">00000</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Datos de ejemplo si no hay facturas -->
                        <div class="raffle-card">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h5 class="mb-2">
                                        <i class="fas fa-file-invoice text-primary me-2"></i>
                                        Factura:  -
                                    </h5>
                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <span class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            --/--/----
                                        </span>
                                        <span class="text-muted">
                                            <i class="fas fa-dollar-sign me-1"></i>
                                            Total: C$ 0.00
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-5 text-md-end">
                                    <small class="text-muted">
                                        <i class="fas fa-ticket me-1"></i>
                                        Acciones obtenidas (0):
                                    </small>
                                    <div class="mt-2">
                                        <span class="raffle-number">00000</span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Resumen de Acciones -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="client-info-card">
                        <h4 class="section-title">
                            <i class="fas fa-list-ol me-2"></i>Resumen de Todas las Acciones
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Acciones Activas ({{ $cliente['total_acciones'] ?? 0 }})
                                </h6>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($cliente['Acciones'] ?? [] as $accion)
                                        <span class="raffle-number active">
                                            {{ $accion}}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Stats adicionales -->
                        <div class="row mt-4">
                            <div class="col-md-4 text-center">
                                <div class="border rounded p-3">
                                    <i class="fas fa-file-invoice fa-2x text-primary mb-2"></i>
                                    <h4 class="mb-0">{{ $cliente['total_facturas'] }}</h4>
                                    <small class="text-muted">Facturas</small>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="border rounded p-3">
                                    <i class="fas fa-ticket-alt fa-2x text-success mb-2"></i>
                                    <h4 class="mb-0">{{ $cliente['total_acciones'] }}</h4>
                                    <small class="text-muted">Acciones Totales</small>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="border rounded p-3">
                                    <i class="fas fa-dollar-sign fa-2x text-info mb-2"></i>
                                    <h4 class="mb-0">C$ {{ number_format($cliente['total_compras'] ?? 0, 2) }}</h4>
                                    <small class="text-muted">Total Comprado</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
