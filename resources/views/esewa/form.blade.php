<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="https://uat.esewa.com.np/epay/main" method="POST">
        <input value="100" name="tAmt" type="hidden"> {{-- amt+txamt+psc+pdc --}}
        <input value="90" name="amt" type="hidden"> {{-- product amount --}}
        <input value="5" name="txAmt" type="hidden"> {{-- Tax amount --}}
        <input value="2" name="psc" type="hidden"> {{-- service charge amount --}}
        <input value="3" name="pdc" type="hidden"> {{-- delivery charge amount --}}
        <input value="EPAYTEST" name="scd" type="hidden"> {{-- merchant code which is provided by esewa --}}
        <input value="1212333" name="pid" type="hidden">
        <input value="http://localhost:8000/esewa/success" type="hidden" name="su">
        <input value="http://localhost:8000/esewa/fail" type="hidden" name="fu">
        <input value="Submit" type="submit">
        </form>
</body>
</html>