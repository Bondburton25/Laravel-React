<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <!-- Styles -->
        
    </head>
    <body class="py-5">
        <div class="container">
            <h5>คอลล์เย็น</h5>
            @foreach($installation_steps->where('coil', 'evaporator') as $installation_step)
                {{ $installation_step->step }} {{ $installation_step->name }}
                <ul>
                    @foreach($installation_step->inspections as $inspection)
                    <li>{{ $inspection->name }}</li>
                    @endforeach
                </ul>
            @endforeach
            <h5>คอลล์ร้อน</h5>
            @foreach($installation_steps->where('coil', 'condenser') as $installation_step)
                {{ $installation_step->step }} {{ $installation_step->name }}
                <ul>
                    @foreach($installation_step->inspections as $inspection)
                    <li>{{ $inspection->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </body>
</html>