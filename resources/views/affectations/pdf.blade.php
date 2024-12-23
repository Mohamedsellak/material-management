<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de Livraison #{{ $affectation->numero_inventaire }}</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: white;
            color: #1f2937;
            line-height: 1.6;
            padding: 20px;
        }

        /* Header styles */
        .header {
            margin-bottom: 30px;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .document-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .document-title h1 {
            color: #1a56db;
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .document-title p {
            color: #4b5563;
            font-size: 16px;
        }

        /* Client info section */
        .client-info {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .client-info p {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .client-info strong {
            color: #374151;
            font-weight: 600;
        }

        /* Main content */
        .content {
            margin-bottom: 30px;
        }

        .inventory-details {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-item {
            padding: 10px;
            background: #f9fafb;
            border-radius: 6px;
        }

        .label {
            font-weight: 600;
            color: #374151;
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .value {
            color: #6b7280;
            font-size: 14px;
        }

        /* Table styles */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .items-table th {
            background: #f3f4f6;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        /* Footer section */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-section">
            <!-- Logo placeholder -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-height: 80px;">
        </div>

        <div class="document-title">
            <h1>Bon de Livraison</h1>
            <p>N° {{ App\Models\Affectation::count() + 1 }} - {{ date('d/m/Y') }}</p>
        </div>
    </div>

    <div class="client-info">
        <p><strong>Département:</strong> {{ $affectation->commandLine->command->fonctionaire->departement->name }}</p>
        <p><strong>Demandeur:</strong> {{ $affectation->commandLine->command->fonctionaire->nom . ' ' . $affectation->commandLine->command->fonctionaire->prenom }}</p>
    </div>

    <div class="content">
        <div class="inventory-details">
            <h2 style="margin-bottom: 15px; color: #1f2937;">Détails de l'Affectation</h2>
            <div class="info-grid">
                    @if ($affectation->numero_inventaire)
                        <div class="info-item">
                            <span class="label">Numéro d'inventaire</span>
                            <span class="value">{{ $affectation->numero_inventaire }}</span>
                        </div>
                    @endif  

                    <div class="info-item">
                        <span class="label">État</span>
                        <span class="value">{{ $affectation->etat->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Local</span>
                        <span class="value">{{ $affectation->local->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Ligne de Commande</span>
                        <span class="value">#{{ $affectation->commandLine->id }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Date de création</span>
                        <span class="value">{{ $affectation->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Dernière modification</span>
                        <span class="value">{{ $affectation->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>

                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Description</th>
                            <th>Observation</th>
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

    <div class="footer">
        <p>Document généré le {{ date('d/m/Y à H:i') }}</p>
    </div>
</body>
</html> 