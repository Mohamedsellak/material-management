<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bon de Livraison #{{ $affectation->numero_inventaire }}</title>
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
            text-align: center;
            margin: 20px 0;
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
            <h1 class="document-title">Bon de Livraison</h1>
            <p class="document-number">Référence: BL-{{ str_pad($affectation->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>
        <div class="header-date">
            <p>Date d'émission</p>
            <strong>{{ date('d/m/Y') }}</strong>
        </div>
    </div>

    <div class="meta-info">
        <div class="meta-info-item">
            <span class="meta-info-label">Département</span>
            <span class="meta-info-value">{{ $affectation->commandLine->command->fonctionaire->departement->name }}</span>
        </div>
        <div class="meta-info-item">
            <span class="meta-info-label">Demandeur</span>
            <span class="meta-info-value">{{ $affectation->commandLine->command->fonctionaire->nom . ' ' . $affectation->commandLine->command->fonctionaire->prenom }}</span>
        </div>
        <div class="meta-info-item">
            <span class="meta-info-label">Local</span>
            <span class="meta-info-value">{{ $affectation->local->name ?? 'Local non défini' }}</span>
        </div>
    </div>

    <div class="content">
        <div class="section-title">Articles à Livrer</div>
        <table>
            <thead>
                <tr>
                    <th>N° inventaire</th>
                    <th style="width: 35%">Article</th>
                    <th style="width: 20%">Observation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $affectation->numero_inventaire }}</td>
                    <td>{{ $affectation->commandLine->material->name }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-box">Le Responsable</div>
        <div class="signature-box">Le Demandeur</div>
    </div>

    <div class="footer">
        <p>Document généré le {{ date('d/m/Y H:i') }}</p>
    </div>
</body>
</html>
