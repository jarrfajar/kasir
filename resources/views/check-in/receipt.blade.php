{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            /* border-top: 1px dashed black; */
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;

        }
        table .total{
            border-top: 1px dashed black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;

        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 70px;
            max-width: 70px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 300px;
            max-width: 300px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="ticket" id="ticket">
        <!-- <img src="./logo.png" alt="Logo"> -->
        <p class="centered">RECEIPT EXAMPLE
            <br>Address line 1
            <br>Address line 2
        </p>
        <p align="center">
            <br>Invoice: {{ $receipt['invoice'] }}
            <br>Nomor Kamar: {{ $receipt['kamar_id'] }}
            <br>Tanggal: {{ $receipt['deposit'] }}
            <br>Kasir: {{ $receipt['kasir'] }}
            <br>Pelanggan: {{ $receipt['tamu_id'] }}
        </p>
        <table>
            <tbody>
                <tr class="total">
                    <td class="quantity">{{ $receipt['tipe_kamar'] }}</td>
                    <td class="description">{{ $receipt['paket'] }}</td>
                    <td>{{ $receipt['qty'] }}</td>
                    <td class="price" align="right">{{ $receipt['harga'] }}</td>
                </tr>
                <tr align="right" class="total">
                    <td class="description" colspan="3">Total</td>
                    <td class="price">{{ $receipt['total'] }}</td>
                </tr>
                <tr align="right">
                    <td class="description" colspan="3">Diskon</td>
                    <td class="price">
                        @if ($receipt['diskon'] == null)
                            {{ '-' }}
                        @else
                            {{ $receipt['diskon'] }}
                        @endif
                    </td>
                </tr>
                <tr align="right">
                    <td class="description" colspan="3">Grand Total</td>
                    <td class="price">{{ $receipt['grandTotal'] }}</td>
                </tr>
                <tr align="right" class="total">
                    <td class="description" colspan="3">Tunai</td>
                    <td class="price">{{ $receipt['jumlahUang'] }}</td>
                </tr>
                <tr align="right">
                    <td class="description" colspan="3">Kembali</td>
                    <td class="price">{{ $receipt['kembalian'] }}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Thanks for your purchase!
            <br>parzibyte.me/blog
        </p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script>
        // const $btnPrint = document.querySelector("#btnPrint");
        // $btnPrint.addEventListener("click", () => {
        //     window.print();
        // });
        window.addEventListener("load", function() {
            // document.getElementById('ticket').style.display = 'none';
            // window.print();
        })
    </script>
</body>

</html> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 130px;
            max-width: 130px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 200px;
            max-width: 200px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            html,
            body {
                height: 100%;
            }

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="ticket">
        <p class="centered">RECEIPT EXAMPLE
            <br>Address line 1
            <br>Address line 2
        </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Q.</th>
                    <th class="description">Description</th>
                    <th class="price">$$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="quantity">1.00</td>
                    <td class="description">ARDUINO UNO R3</td>
                    <td class="price">$25.00</td>
                </tr>
                <tr>
                    <td class="quantity">2.00</td>
                    <td class="description">JAVASCRIPT BOOK</td>
                    <td class="price">$10.00</td>
                </tr>
                <tr>
                    <td class="quantity">1.00</td>
                    <td class="description">STICKER PACK</td>
                    <td class="price">$10.00</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">TOTAL</td>
                    <td class="price">$55.00</td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Thanks for your purchase!
            <br>parzibyte.me/blog
        </p>
    </div>
    {{-- <button id="btnPrint" class="hidden-print">Print</button> --}}
    <script src="script.js"></script>
</body>

</html>
