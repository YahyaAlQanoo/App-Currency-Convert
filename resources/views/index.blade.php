<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Currency converter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="currency-row-outer">
    <div class="currency-converter">
      <h2>Currency Converter</h2>
      <form action="{{ route('store')}}" method="POST">
        @csrf
        <div class="field grid-50-50">
            <div class="colmun col-left">
                <input type="number" class="form-input" name="number" id="number" value="{{ $count ?? ''}}" placeholder="00">
            </div>
            <div class="colmun col-right">
                <div class="select">
                    <select name="currency" class="currency">
                        @foreach ($countries["symbols"] as $key =>  $item  )
                            <option value="{{ $key }}" @selected( $currency_code == $key   ) >{{ $key .' - '. $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="colmun">
                <table style="width: 100%;">
                    <thead>
                        <tr>    
                            @if (!$currency['USD'])
                                {{ $currency_code = '' }}
                            @endif
                            
							@if($currency_code != 'USD') <th>USD</th> @endif
							@if($currency_code != 'ILS') <th>ILS</th> @endif
							@if($currency_code != 'JOD') <th>JOD</th> @endif
							@if($currency_code != 'EGP') <th>EGP</th> @endif
							@if($currency_code != 'AED') <th>AED</th> @endif
							@if($currency_code != 'EUR') <th>EUR</th> @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if ($currency['USD'])
                                @if($currency_code != 'USD')    <td>{{ $currency['USD'] * $count}}</td>   @endif
                                @if($currency_code != 'ILS')    <td>{{ $currency['ILS'] * $count}}</td>   @endif
                                @if($currency_code != 'JOD')    <td>{{ $currency['JOD'] * $count}}</td>   @endif
                                @if($currency_code != 'EGP')    <td>{{ $currency['EGP'] * $count}}</td>   @endif
                                @if($currency_code != 'AED')    <td>{{ $currency['AED'] * $count}}</td>   @endif
                                @if($currency_code != 'EUR')    <td>{{ $currency['EUR'] * $count}}</td>   @endif
                            @endif        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="field">
            <div class="colmun">
                <input type="submit" value="Convert" class="btn">
            </div>
        </div>

    </form>

    </div>
  </div>

</body>

</html>