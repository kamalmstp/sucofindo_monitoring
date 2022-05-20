<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Weight List {{ $weight->id }}</title>
    
    <!-- <style>
        header {
            position: fixed;
        }

        footer {
            position: fixed;
            bottom: -30px;
            height: 50px;
            line-height: 35px;
        }
    </style> -->
    
</head>
<body>
    <header>
        
    </header>

    <footer>
        
    </footer>

    <main>

        <table border="1" cellspacing="0" width="100%">
			<tr>
				<td width="75%">
                    <table border="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center"><b>{{$judul}}</b></td>
                            <td align="center" width="25%"><img src="{{public_path('media/photos/sucofindo-print.png')}}" alt="logos" width="75" height="52"></td>
                        </tr>
                    </table>
                </td>
			</tr>
		</table>

        <br>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td>
                    <table border="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">VESSEL</td>
                            <td width="1%">:</td>
                            <td width="75%">{{$weight->vess}}</td>
                        </tr>
                        <tr>
                            <td>QUANTITY</td>
                            <td>:</td>
                            <td>{{$weight->quan}}</td>
                        </tr>
                        <tr>
                            <td>COMMODITY</td>
                            <td>:</td>
                            <td>{{$weight->comm}}</td>
                        </tr>
                        <tr>
                            <td>PLACE OF WEIGHING</td>
                            <td>:</td>
                            <td>{{$weight->place}}</td>
                        </tr>
                        <tr>
                            <td>DATE OF WEIGHING</td>
                            <td>:</td>
                            <td>{{$weight->date}}</td>
                        </tr>
                        <tr>
                            <td>SHIPPERS / CLIENT</td>
                            <td>:</td>
                            <td>{{$weight->ship}}</td>
                        </tr>
                        <tr>
                            <td>SHORE TANK NO.</td>
                            <td>:</td>
                            <td>{{$weight->shore}}</td>
                        </tr>
                    </table>

                    <br>
                    <table border="1" cellspacing="0" width="100%">
                        <thead>
                            <tr align="center">
                                <td width="8%">SHEET NO.</td>
                                <td width="13%">TOTAL TRUCKS</td>
                                <td width="">WEIGHT OF TRUCKS PLUS CARGO IN KG (GROSS)</td>
                                <td width="">WEIGHT OF EMPTY TRUCKS IN KG (TARE)</td>
                                <td width="">TOTAL WEIGHT OF CARGO IN KG (NET)</td>
                                <td width="25%">DATA OF SCALE</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
           </tr>
        </table>
    </main>

</body>
</html>