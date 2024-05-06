<!DOCTYPE html>
<html>
<head>
    <title>Data historis</title>
</head>
<body>
    <h1>Data historis</h1>
    <ul>
    @foreach($historis as $data)
        <!-- Replace 'time' with the historis column name for time -->
        <li>Time: {{ $data->time }}</li>

        <!-- Replace 'CO2' with the historis column name for CO2 -->
        <li>CO2: {{ $data->CO2 }}</li>
        <li>T: {{ $data->Temperature }}</li>
        <li>H: {{ $data->Humidity }}</li>
        <li>WS: {{ $data->Wspeed }}</li>
        <li>WD: {{ $data->Wdirection }}</li>
    @endforeach
    </ul>
</body>
</html>
