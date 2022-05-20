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
		@php
		$page = 1;
		@endphp
		@foreach($weightlist->chunk(20) as $list)
		<table border="1" cellspacing="0" width="100%">
			<tr align="center">
				<td width="75%"><b>{{$judul}}</b></td>
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
							@php 
								$i=1;
								$gross=0;
								$tare=0;
								$net=0;
								$total = 20 - $list->count();
							@endphp
							@if($total == 0)
								@foreach ($list as $row)
								<tr>
									<td align="center">{{$i++}}</td>
									<td align="center">{{$row->no_reg}}</td>
									<td align="center">{{$row->gross}}</td>
									<td align="center">{{$row->tare}}</td>
									<td align="center">{{$row->net}}</td>
									@php
									$gross = $gross + $row->gross;
									$tare = $tare + $row->tare;
									$net = $net + $row->net;
									@endphp
								</tr>
								@endforeach
							@else
								@foreach ($list as $row)
								<tr>
									<td align="center">{{$i++}}</td>
									<td align="center">{{$row->no_reg}}</td>
									<td align="center">{{$row->gross}}</td>
									<td align="center">{{$row->tare}}</td>
									<td align="center">{{$row->net}}</td>
									@php
									$gross = $gross + $row->gross;
									$tare = $tare + $row->tare;
									$net = $net + $row->net;
									@endphp
								</tr>
								@endforeach
								@foreach(range(0, ($total - 1)) as $t)
								<tr>
									<td align="center">{{$i + $t}}</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								@endforeach
							@endif
							<tr>
								<td colspan="2" align="center"><b>Total</b></td>
								<td align="center"><b>{{$gross}}</b></td>
								<td align="center"><b>{{$tare}}</b></td>
								<td align="center"><b>{{$net}}</b></td>
							</tr>
						</tbody>
					</table>

					<table border="0" width="100%">
						<tr>
							<td align="center">
								<h5>Acknowledged by :</h5>
								<br>
								<u>{{$weight->rep}}</u>
								<br>
								REPRESENTATIVE
							</td>
							
							<td align="center">
								<h5>.........................., ...................</h5>
								<br>
								<u>{{$weight->insp}}</u>
								<br>
								INSPECTOR/SURVEYOR
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br>

		<table border="1" cellspacing="0" width="100%">
			<tr>
				<td align="center" width="30%">FOR/KSP-AGRI/40</td>
				<td align="center" width="20%">Rev : 01</td>
				<td align="center" width="50%">
					<table border="0" cellspacing="0" width="100%">
						<tr>
							<td align="center" width="70%">Tgl. Berlaku : 11/07/2019</td>
							<td align="center" width="30%">Hal {{$page++}} dari {{$weightlist->chunk(20)->count()}} hal</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		@endforeach
    </main>

</body>
</html>