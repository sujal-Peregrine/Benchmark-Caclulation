<!DOCTYPE html>
<html>
<head>
    <title>{{ $formulaData['name'] }} Results</title>
    <style>
        body { font-family: sans-serif; }
        h1 { color: #4f46e5; }
        h2 { margin-top: 20px; color: #1f2937; }
        h3 { margin-top: 15px; }
        p { margin: 5px 0; }

        .progress { 
            background: #ddd; 
            height: 20px; 
            border-radius: 8px; 
            overflow: hidden; 
            margin-top: 8px; 
            margin-bottom: 15px; 
        }
        .progress-bar { 
            background: #4f46e5; /* solid color (works in dompdf) */
            height: 100%; 
        }
    </style>
</head>
<body>
    <h1>{{ $formulaData['name'] }} Results</h1>

    <h2>Analyzed Text</h2>
    <p style="margin-bottom: 20px">{{ $chatbotResponse }}</p>

    <h2>Analysis Results</h2>
    @foreach ($results as $key => $value)
        <h3>{{ ucwords(str_replace('_', ' ', $key)) }}</h3>
        @if (is_numeric($value))
            <p>Score: {{ number_format($value, 2) }}</p>
            <div class="progress">
                @php
                    $max = $formulaData['max'] ?? 1;
                    $width = ($value / $max) * 100;
                    $width = max(0, min($width, 100)); // clamp to 0–100%
                @endphp
                <div class="progress-bar" style="width: {{ $width }}%"></div>
            </div>
        @else
            <p>{{ $value }}</p>
        @endif
    @endforeach
</body>
</html>
