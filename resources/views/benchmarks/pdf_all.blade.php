<!DOCTYPE html>
<html>
<head>
    <title>All Benchmarks Results</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { color: #4f46e5; text-align: center; }
        h2 { color: #1f2937; margin-top: 20px; }
        p { margin: 5px 0; }
        .progress { 
            background: #ddd; 
            height: 20px; 
            width: 100%; 
            border-radius: 10px; 
            overflow: hidden; 
            margin-top: 8px;   
            margin-bottom: 10px; 
        }
        .progress-bar { 
            background: #4f46e5;
            height: 100%; 
        }
        .section { 
            margin-bottom: 20px; 
            padding: 15px; 
            border: 1px solid #e5e7eb; 
            border-radius: 10px; 
        }
    </style>
</head>
<body>
    <h1>All Benchmarks Results</h1>

    <h2>Analyzed Text</h2>
    <p >{{ $chatbotResponse }}</p>

    @foreach ($formulas as $formula => $formulaData)
        @php
            $results = $allResults['all'] ?? [];
            $primaryMetric = $formula;
            $primaryValue = $results[$primaryMetric] ?? 0;
            $max = $formulaData['max'] ?? 1;
            $percentage = ($primaryValue / $max) * 100;
            $percentage = max(0, min($percentage, 100));
        @endphp

        <div class="section">
            <h2>{{ $formulaData['name'] }}</h2>
            <p>
                <strong>{{ ucwords(str_replace('_', ' ', $primaryMetric)) }}:</strong> 
                {{ number_format($primaryValue, 2) }}
            </p>
            <div class="progress">
                <div class="progress-bar" style="width: {{ $percentage }}%"></div>
            </div>
        </div>
    @endforeach

    @if (!empty($errors))
        <div class="section">
            <h2>Errors</h2>
            @foreach ($errors as $formula => $error)
                <p>{{ $formulas[$formula]['name'] ?? $formula }}: {{ $error }}</p>
            @endforeach
        </div>
    @endif
</body>
</html>
