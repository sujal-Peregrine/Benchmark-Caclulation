<!DOCTYPE html>
<html>
<head>
    <title>{{ $formulaData['name'] }} Results</title>
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
    <h1>Benchmark Result: {{ $formulaData['name'] }}</h1>
    
    <h2>Analyzed Text</h2>
    <p style="margin-bottom: 20px">{{ $chatbotResponse }}</p>

    @php
        // $formula, $results, $formulaData are available from the session data passed by the controller.
        $metricName = $formula; 
        // The $results array in the session is: ['formula_name' => value], so we access it by $formula key.
        $metricValue = $results[$metricName] ?? 0; 
        $max = $formulaData['max'] ?? 1;
        $percentage = ($metricValue / $max) * 100;
        $percentage = max(0, min($percentage, 100));
    @endphp

    <div class="section">
        <h2>{{ $formulaData['name'] }} ({{ $formulaData['icon'] }})</h2>
        <p>
            <strong>Description:</strong> {{ $formulaData['details'] }}
        </p>
        <p>
            <strong>Score ({{ ucwords(str_replace('_', ' ', $metricName)) }}):</strong> 
            {{ number_format($metricValue, 2) }} / {{ $max }}
        </p>
        <div class="progress">
            <div class="progress-bar" style="width: {{ $percentage }}%"></div>
        </div>
    </div>
</body>
</html>