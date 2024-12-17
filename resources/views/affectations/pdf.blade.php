<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affectation #{{ $affectation->numero_inventaire }}</title>
    <style>
        /* Base styles */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: white;
            padding: 2rem;
            color: #1f2937;
            line-height: 1.5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 16px;
            color: #4b5563;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .label {
            font-weight: 600;
            color: #374151;
            margin-right: 0.5rem;
        }

        .value {
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Détails de l'Affectation</h1>
            <p>Numéro d'inventaire: {{ $affectation->numero_inventaire }}</p>
        </div>

        <div class="card">
            <div class="grid">
                <div class="info-item">
                    <span class="label">État:</span>
                    <span class="value">{{ $affectation->etat->name }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Local:</span>
                    <span class="value">{{ $affectation->local->name }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Ligne de Commande:</span>
                    <span class="value">#{{ $affectation->commandLine->id }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Date de création:</span>
                    <span class="value">{{ $affectation->created_at->format('d/m/Y H:i') }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Dernière modification:</span>
                    <span class="value">{{ $affectation->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 