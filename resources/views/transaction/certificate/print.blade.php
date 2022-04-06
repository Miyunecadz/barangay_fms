<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay Clearance</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
</head>
<body>

    <div class="d-flex justify-content-center">
        <div class="my-3">
            <div class="d-flex">
                <div class="me-auto"></div>
                <button class="btn btn-primary my-2" onclick="printJS({printable: 'paper', type: 'html', style: '@page { size: A4 portrait; }', css: '{{asset('css/app.css')}}' })">Print</button>
            </div>
            <div class="card paper" id="paper" style="width: 21cm; height: 29cm;">
                <div class="paper-header text text-center mt-5">
                    <p class="mb-0"><b>Republic of the Philippines</b></p>
                    <p class="mb-0"><b>PROVINCE OF SOUTHERN LEYTE</b></p>
                    <p class="mb-0"><b>Municipality of Sogod</b></p>
                    <p class="mb-0"><b>Barangay Zone 1</b></p>
                </div>

                <div class="paper-title text text-center mt-4">
                    <p><h3>OFFICE OF THE BARANGAY CHAIRMAN</h3></p>
                    <p><i>Barangay Clearance</i></p>
                </div>

                <div class="body" style="margin-right: 2.44cm; margin-left: 2.44cm;">
                    <div class="paper-greeting text mt-4">
                        <p><b>TO WHOM IT MAY CONCERN</b></p>
                    </div>

                    <div class="paper-body text mb-2" style="text-align: justify; text-justify: inter-word;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        THIS IS TO CERTIFY that <span style="border-bottom-style:solid; border-bottom-width:thin">&nbsp;{{$certificate->name}}&nbsp;</span>, of legal age, Filipino Citizen, Single/Married/Widow and a resident of Barangay Zone 1, Sogod Southern Leyte is personally known to me to a good moral character and high integrity in the community.
                    </div>

                    <div class="paper-body text mt-2" style="text-align: justify; text-justify: inter-word;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        THIS IS TO CERTIFY ALSO that as per verification of records kept on file in this office will show, there is no information of any case that has been filed against him in office before.
                    </div>

                    <div class="paper-body text mt-2" style="text-align: justify; text-justify: inter-word;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Done this <span style="border-bottom-style:solid; border-bottom-width:thin">&nbsp;{{Carbon\Carbon::parse($certificate->issued_date)->format('F d Y')}}&nbsp;</span> at Barangay Zone 1 Sogod, Southern Leyte.
                    </div>

                    <div class="paper-honored mt-5" style="float: right;">
                        <p>Noted by:</p>
                        <p><b>HON. {{$captain->name}}</b></p>
                        <p>Punong Barangay</p>
                    </div>

                    <div class="paper-OR" style="margin-top: 13rem; font-size: 10px;">
                        <p>Paid OR No: {{$certificate->or_number}}</p>
                        <p>Issued at Brgy Zone 1, Sogod, Southern Leyte</p>
                        <p>Issued on: {{Carbon\Carbon::parse($certificate->issued_date)->format('F d Y')}}</p>
                    </div>
                </div>



            </div>
        </div>
    </div>

    {{-- <style>
        .paper-honored{
            float: right;
        }

        .paper-OR{
            margin-top: 13rem;
            font-size: 10px;
        }
        /* .text{
            font-size: 12px;
        } */
        .paper-body{
            text-align: justify;
            text-justify: inter-word;
        }
        .paper{
            width: 21cm;
            height: 29cm;
        }
    </style> --}}

</body>
</html>
