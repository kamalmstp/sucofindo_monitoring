<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Weight List {{ $weight->id }}</title>
</head>
<body>
    <table border="1" cellspacing="0" width="100%">
		<tr align="center">
			<td width="75%"><b>{{$judul}} - LIST</b></td>
			<td width="25%"><img src="{{public_path('media/photos/sucofindo-print.png')}}" alt="logos" width="75" height="52"></td>
		</tr>
	</table>
    <br>			
	<table border="1" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" style="padding: 10px;" width="100%">
					<tr>
						<td width="30%">VESSEL</td>
						<td width="2%"> : </td>
						<td><b>{{ $weight->vess }}</b></td>
					</tr>
					<tr>
						<td>COMMODITY</td>
						<td>: </td>
						<td><b>{{ $weight->comm }}</b></td>
					</tr>
					<tr>
						<td>QUANTITY</td>
						<td>: </td>
						<td><b>{{ $weight->quan }} </b></td>
					</tr>
					<tr>
						<td>SHIPPERS/CLIENTS</td>
						<td>: </td>
						<td><b>{{ $weight->ship }} </b></td>
					</tr>
					<tr>
						<td>BUYER/CONSIGNEE</td>
						<td>: </td>
						<td><b>{{ $weight->buyer }} </b></td>
					</tr>
					<tr>
						<td>PLACE OF WIEGHING</td>
						<td>: </td>
						<td><b>{{ $weight->place }}</b></td>
					</tr>
					<tr>
						<td>DATE OF WIEGHING</td>
						<td>: </td>
						<td><b>{{ date('M d, Y', strtotime($weight->date)) }}</b>     Time <b>{{ date('H:i',strtotime($weight->time)) }}</b> hrs     until <b>{{ date('H:i',strtotime($weight->until)) }}</b> hrs  </td>
					</tr>
                    <tr>
                        <td>SHORE TANK NO.</td>
                        <td>: </td>
                        <td><b>{{ $weight->shore }}</b></td>
                    </tr>
				
				</table>

                <table border="1" style="padding: 10px;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">TRUCK'S REGISTERED NO.</th>
                            <th style="text-align: center;">WEIGHT OF TRUCK PLUS CARGO IN KG (GROSS)</th>
                            <th style="text-align: center;">WEIGHT OF EMPTY TRUCK IN KG (TARE)</th>
                            <th style="text-align: center;">WEIGHT OF CARGO IN KG (NET)</th>
                        </tr>
                    </thead>
                    <tbody>