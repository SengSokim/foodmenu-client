<div class="modal" id="qr-code" tabindex="-1" role="dialog" aria-hidden="true">
    <div style="width: 400px; border-radius: 8px; margin: 20px auto;">
        <table id="qrcode" style="margin: auto; background: white; width: 350px;border-radius: 8px;  border: 5px solid #154D97">
            <thead>
                <tr>
                    <th style="text-align: center" colspan="2"><img src="" width="70px" style="border: 1px solid black; border-radius: 50%"></th>
                </tr>
                <tr>
                    <th colspan="2">
                        <h3 style="margin: 0; text-transform: uppercase; font-family: 'Khmer OS Content'"></h3>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center style="padding-bottom: 20px !important; ">
                            <h3 style="margin: 0;font-weight: normal;font-size: 23px; font-family: 'Khmer OS Content'">
                               ស្កេនមើលមុខម្ហូប
                            </h3>
                        </center>
                    </td>
                </tr>
                <tr align="center" style="display: block">
                    <td colspan="2" style="border: 2px solid #134; padding: 10px; padding-bottom: 0; border-radius: 8px; margin-top: 1rem;">
                        <img src="{{ asset('assets/images/qr-code.png') }}" alt="" width="150px" height="150px">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 8px">
                        <h3 style="margin: -7px; font-size: 22px; letter-spacing: -1px; font-family: 'Khmer OS Bokor', 'Arial'"></h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 8px">
                        <a href="{{ asset('assets/images/qr-code.png') }}" download class="btn btn-primary btn-sm"><i class="fas fa-download"></i> ទាញយក</a>
                    </td>
                </tr>
                <tr style="padding-bottom: 1rem;">
                    <td colspan="2" style="padding-top: 14px">
                        {{--<hr style="height: 1px; background: #134">--}}
                        <center  style="padding-bottom: 35px !important;">
                            <span style="font-size: 14px">POWERED BY</span><br>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" width="20%" style="margin-top: 10px; border-radius: 13px;">
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
