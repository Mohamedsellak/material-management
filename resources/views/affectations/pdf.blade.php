<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de Livraison #{{ $affectation->numero_inventaire }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: white;
            color: #1f2937;
            line-height: 1.4;
            padding: 25px;
            font-size: 13px;
        }

        .header {
            margin-bottom: 25px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 15px;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: 3px;
            left: 0;
            width: 100%;
            border-bottom: 1px solid #2563eb;
        }

        .logo-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-left img {
            max-height: 70px;
        }

        .logo-right {
            text-align: right;
            color: #4b5563;
            border-left: 2px solid #e5e7eb;
            padding-left: 20px;
        }

        .logo-right p {
            margin: 3px 0;
        }

        .document-title {
            text-align: center;
            margin-bottom: 15px;
            position: relative;
            padding: 10px 0;
        }

        .document-title h1 {
            color: #1e40af;
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 5px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }

        .document-title p {
            color: #4b5563;
            font-weight: 600;
        }

        .client-info {
            background: #f8fafc;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .client-info::before {
            content: 'INFORMATIONS';
            position: absolute;
            top: -10px;
            left: 10px;
            background: #1e40af;
            color: white;
            padding: 2px 10px;
            font-size: 11px;
            border-radius: 4px;
        }

        .client-info p {
            margin: 5px 0;
        }

        .client-info strong {
            color: #1e40af;
            font-weight: 600;
            min-width: 100px;
            display: inline-block;
        }

        .content {
            margin-bottom: 25px;
        }

        .inventory-details {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .inventory-details h2 {
            color: #1e40af;
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e5e7eb;
        }

        .items-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .items-table th {
            background: linear-gradient(to bottom, #2563eb, #1e40af);
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 13px;
            border-bottom: 2px solid #1e3a8a;
        }

        .items-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .items-table tr:last-child td {
            border-bottom: none;
        }

        .items-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .signature-section {
            margin-top: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            page-break-inside: avoid;
        }

        .signature-box {
            border: 1px solid #e5e7eb;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            background: #f8fafc;
            position: relative;
        }

        .signature-box h3 {
            font-size: 13px;
            color: #1e40af;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .signature-area {
            min-height: 80px;
            border: 2px dashed #cbd5e1;
            margin: 10px 20px;
            border-radius: 4px;
            background: white;
            position: relative;
        }

        .signature-area::before {
            content: "✒️";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #cbd5e1;
            font-size: 20px;
        }

        .signature-date {
            margin-top: 10px;
            color: #6b7280;
            font-size: 11px;
            font-style: italic;
        }

        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #e5e7eb;
            text-align: center;
            font-size: 11px;
            color: #6b7280;
            page-break-inside: avoid;
        }

        .footer p {
            margin: 3px 0;
        }

        @page {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <div class="logo-left">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="logo-right">
                <p><strong>Date:</strong> {{ date('d/m/Y') }}</p>
                <p><strong>Heure:</strong> {{ date('H:i') }}</p>
                <p><strong>Réf:</strong> #{{ str_pad($affectation->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        <div class="document-title">
            <h1>Bon de Livraison</h1>
            <p>N° {{ str_pad(App\Models\Affectation::count() + 1, 6, '0', STR_PAD_LEFT) }}</p>
        </div>
    </div>

    <div class="client-info">
        <p><strong>Département:</strong> {{ $affectation->commandLine->command->fonctionaire->departement->name }}</p>
        <p><strong>Demandeur:</strong> {{ $affectation->commandLine->command->fonctionaire->nom . ' ' . $affectation->commandLine->command->fonctionaire->prenom }}</p>
        <p><strong>Local:</strong> {{ $affectation->local->name }}</p>
    </div>

    <div class="content">
        <div class="inventory-details">
            <h2>Articles à Livrer</h2>
            <table class="items-table">
                <thead>
                    <tr>
                        <th style="width: 35%">Article</th>
                        <th style="width: 45%">Description</th>
                        <th style="width: 20%">Observation</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < $affectation->commandLine->quantity; $i++)
                        <tr>
                            <td>{{ $affectation->commandLine->material->name }}</td>
                            <td>{{ $affectation->commandLine->material->description }}</td>
                            <td></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <div class="signature-section">
        <div class="signature-box">
            <h3>Le Responsable</h3>
            <div class="signature-area"></div>
            <div class="signature-date">Date et Signature</div>
        </div>
        <div class="signature-box">
            <h3>Le Demandeur</h3>
            <div class="signature-area"></div>
            <div class="signature-date">Date et Signature</div>
        </div>
    </div>

    <div class="footer">
        <p>Ce document est généré automatiquement le {{ date('d/m/Y à H:i') }}</p>
        <p>Pour toute question, veuillez contacter le service concerné</p>
    </div>
</body>
</html> 