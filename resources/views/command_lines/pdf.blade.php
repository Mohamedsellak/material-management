<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ligne de Commande #{{ $commandLine->id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #1f2937;
            padding: 40px 50px;
            font-size: 13px;
        }
        .header {
            margin-bottom: 40px;
            display: block;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
        }
        .logo-section {
            width: 100%;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .logo-section img {
            width: 100%;
            height: auto;
            max-height: 120px;
            object-fit: contain;
        }
        .logo-text {
            color: #4b5563;
            font-weight: 600;
        }
        .header-info {
            flex-grow: 1;
            text-align: center;
        }
        .document-title {
            color: #1e40af;
            font-size: 26px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        .document-number {
            color: #4b5563;
            font-weight: 600;
        }
        .header-date {
            text-align: right;
            min-width: 120px;
            padding: 10px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }
        .header-date p {
            margin-bottom: 4px;
            font-size: 11px;
            color: #4b5563;
        }
        .header-date strong {
            color: #1e40af;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f8fafc;
            color: #1e40af;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        .section-title {
            color: #1e40af;
            font-size: 16px;
            margin: 30px 0 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
        }
        .meta-info {
            display: flex;
            gap: 30px;
            margin: 20px 0;
            padding: 20px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }
        .meta-info-item {
            flex: 1;
        }
        .meta-info-label {
            font-size: 11px;
            color: #4b5563;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .meta-info-value {
            font-weight: 600;
            color: #1e40af;
        }
        .signature-section {
            margin-top: 60px;
            margin-bottom: 30px;
            width: 100%;
        }
        .signature-box {
            color: #1e40af;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            position: relative;
            display: inline-block;
        }
        .signature-box:first-child {
            float: left;
            margin-left: 100px;
        }
        .signature-box:last-child {
            float: right;
            margin-right: 100px;
        }
        .footer {
            margin-top: 60px;
            padding: 15px 0;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo">
        </div>
        <div class="header-info">
            <h1 class="document-title">Bon de sortie</h1>
            <p class="document-number">Référence: LC-{{ str_pad($commandLine->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>
        {{-- <div class="header-date">
            <p>Date d'émission</p>
            <strong>{{ date('d/m/Y') }}</strong>
        </div> --}}
    </div>

    <div class="meta-info">
        {{-- <div class="meta-info-item">
            <span class="meta-info-label">Date de création</span>
            <span class="meta-info-value">{{ $commandLine->created_at->format('d/m/Y') }}</span>
        </div> --}}
        <div class="meta-info-item">
            <span class="meta-info-label">Commande N°</span>
            <span class="meta-info-value">{{ $commandLine->command->id }}</span>
        </div>
        {{-- <div class="meta-info-item">
            <span class="meta-info-label">Quantité totale</span>
            <span class="meta-info-value">{{ $commandLine->quantity }}</span>
        </div> --}}
        <div class="meta-info-item">
            <span class="meta-info-label">Demandeur :</span>
            <span class="meta-info-value">{{ $commandLine->command->fonctionaire->nom . ' ' . $commandLine->command->fonctionaire->prenom }}</span>
        </div>
    </div>

    <div class="content">
        @if($commandLine->affectations->count() > 0)
            <div class="section-title">Affectations ({{ $commandLine->affectations->count() }}/{{ $commandLine->quantity }})</div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 15%">N° Inventaire</th>
                        <th style="width: 25%">Article</th>
                        <th style="width: 25%">Observation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandLine->affectations as $affectation)
                        <tr>
                            <td>{{ $affectation->numero_inventaire }}</td>
                            <td>{{ $commandLine->material->name }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="section-title">Détails de l'Article</div>
            <table>
                <tr>
                    <th style="width: 30%">Article</th>
                    <th style="width: 45%">Description</th>
                    <th style="width: 25%">Observation</th>
                </tr>
                <tr>
                    <td>{{ $commandLine->material->name }}</td>
                    <td>{{ $commandLine->material->description }}</td>
                    <td></td>
                </tr>
            </table>
        @endif
    </div>

    <div class="signature-section">
        <div class="signature-box">Signature du résponsable</div>
        <div class="signature-box">FES, le {{ $commandLine->created_at->format('d/m/Y') }}</div>
    </div>

    {{-- <div class="footer">
        <p>Document généré le {{ date('d/m/Y H:i') }}</p>
    </div> --}}
</body>
</html>
