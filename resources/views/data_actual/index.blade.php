<!DOCTYPE html>
<html>
<head>
    <title>Data Actual</title>
</head>
<body>
    <h1>Data Actual</h1>
    <ul>
    @foreach($dataActual as $data)
        <!-- Replace 'time' with the actual column name for time -->
        <li>Time: {{ $data->time }}</li>

        <!-- Replace 'CO2' with the actual column name for CO2 -->
        <li>CO2: {{ $data->CO2 }}</li>
    @endforeach
    </ul>
</body>
</html>
