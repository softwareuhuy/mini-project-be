<!DOCTYPE html>
<html>
<head>
    <title>Data dummy</title>
</head>
<body>
    <h1>Data dummy</h1>
    <ul>
    @foreach($dummy as $data)
        <!-- Replace 'time' with the dummy column name for time -->
        <li>Time: {{ $data->time }}</li>

        <!-- Replace 'CO2' with the dummy column name for CO2 -->
        <li>CO2: {{ $data->CO2 }}</li>
    @endforeach
    </ul>
</body>
</html>
