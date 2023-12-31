<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EMenu</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg-with-no-stroke.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- Google Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body onload="window.print('#table')">
    <div style="width: 400px; background: #008ae3; padding: 30px 5px; border-radius: 8px; margin: 20px auto">
        <table id="table" style="margin: auto; background: white; width: 350px; padding: 20px; border-radius: 8px">
            <thead>
                <tr>
                    <th style="text-align: center" colspan="2"><img src="{{ $restaurant->media->url }}" width="70px" style="border: 1px solid black; border-radius: 50%"></th>
                </tr>
                <tr>
                    <th colspan="2">
                        <h3 style="margin: 0; text-transform: uppercase; font-family: 'Khmer OS Content'">{{ $restaurant->name_kh }}</h3>  
                    </th>
                    
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                            <h3 style="margin: 0;font-weight: normal; font-family: 'Khmer OS Content'">
                               ស្កេនមើលមុខម្ហូប
                            </h3>
                            <i class="material-icons">expand_more</i>
                        </center> 
                    </td>
                </tr>
                <tr align="center" style="display: block">
                    <td colspan="2" style="border: 2px solid #134; padding: 10px; padding-bottom: 0; border-radius: 8px">
                           <img src="data:image/png;base64, 
                            {!! base64_encode(QrCode::format('png')
                            ->merge('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png', .3, true)
                            ->size(200)
                            ->errorCorrection('H')
                            ->generate($data->website_url ?? '' )) !!} " style="width: 100%">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 8px">
                        <h3 style="margin: -7px; font-size: 22px; letter-spacing: -1px; font-family: 'Khmer OS Bokor', 'Arial'">{{ $data->name }}</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 14px">
                        {{--<hr style="height: 1px; background: #134">--}}
                        <center>
                            <span style="font-size: 14px">{{ $restaurant->phone_number }}</span><br><br>
                            <span style="font-size: 14px">POWERED BY</span><br>
                            <img src="{{ asset('adminlte/dist/img/logo/papa-deliver.png') }}" alt="" width="20%" style="margin-top: 10px">
                        </center>
                    </td>
                </tr>  
            </tbody> 
        </table>
    </div>   
</body>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
</html>