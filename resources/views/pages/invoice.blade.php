<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 5px;">
            <h2>DANADIPA AUTO GARAGE</h2><br>
            <small>JL KALIMANTAN NO 13, Jember, East Java, Indonesia 68121
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No Order</li>
                    <li>Nama</li>
                    <li>Tahun Rakit</li>
                    <li>Type</li>
                    <li>KM</li>
                    <li>Warna</li>
                    <li>Service</li>
                    <li>Keluhan</li>
                    <li>Tanggal</li>
                </ul>
            </div>
            <div class="right">
                <ul><b>
                    <li> {{ $invoice->transaction_id }} </li>
                    <li> {{ $invoice->fullname }} </li>
                    <li> {{ $invoice->trakit }} </li>
                    <li> {{ $invoice->type }} </li>
                    <li> {{ $invoice->km }} </li>
                    <li> {{ $invoice->warna }} </li>
                    <li> {{ $invoice->nproduk }} </li>
                    <li> {{ $invoice->notes }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($invoice->updated_at)) }} </li>
                    </b>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div>
                <ul>
                    <li><b>Total</b></li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li><b>Rp {{ number_format($invoice->price) }}</b></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
</body>
</html>