<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Barges List {{ $barges->id }}</title>
    
    <style>
        /* header {
            position: fixed;
        }

        footer {
            position: fixed;
            bottom: -30px;
            height: 50px;
            line-height: 35px;
        } */
        tr.border-bottom td {
            border-bottom: 1pt solid;
        }
        tr.border-top td {
            border-top: 1pt solid;
        }
    </style>
    
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
    @foreach($bargeslist->chunk(16) as $list)
        <table border="0" cellspacing="0" width="100%">
            <tr align="left" class="border-bottom">
                <td width="75%" style="vertical-align:bottom"><b style="font-size:20px;font-family:Arial;">{{$judul}}</b></td>
                <td width="25%" align="right"><img src="{{public_path('media/photos/sucofindo-print.png')}}" alt="logos" width="90"></td>
            </tr>
        </table>
        <br><br>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td width="50%">
                    <table border="0">
                        <tr>
                            <td>VESSEL/BARGE NAME</td>
                            <td>:</td>
                            <td>{{$barges->vessel}}</td>
                        </tr>
                        <tr>
                            <td>DATE AND TIME</td>
                            <td>:</td>
                            <td>{{$barges->date}}</td>
                        </tr>
                        <tr>
                            <td>PLACE</td>
                            <td>:</td>
                            <td>{{$barges->place}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>CUSTOMER</td>
                            <td>:</td>
                            <td>{{$barges->customer}}</td>
                        </tr>
                    </table>
                </td>
                <td width="50%">
                    <table border="0">
                        <tr>
                            <td>QUANTITY</td>
                            <td>:</td>
                            <td>{{$barges->quantity}}</td>
                        </tr>
                        <tr>
                            <td>INCREMENT NUMB.</td>
                            <td>:</td>
                            <td>{{$barges->increment_numb}}</td>
                        </tr>
                        <tr>
                            <td>TYPE OF COAL</td>
                            <td>:</td>
                            <td>{{$barges->type_of_coal}}</td>
                        </tr>
                        <tr>
                            <td>SAMPLING METHOD</td>
                            <td>:</td>
                            <td>{{$barges->sampling_method}}</td>
                        </tr>
                        <tr>
                            <td>REFERENCE</td>
                            <td>:</td>
                            <td>{{$barges->reference}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table border="1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th rowspan="2">No Sublot</th>
                    <th rowspan="2">Incr No</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Time</th>
                    <th rowspan="2">Trucks / Barges Number</th>
                    <th colspan="2">Sample for</th>
                    <th rowspan="2">Seal Number</th>
                    <th rowspan="2" width="25%">Remark</th>
                </tr>
                <tr>
                    <th>GA/TM</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                    $total = 16 - $list->count();
                @endphp
                @if($total == 0)
                    @foreach($list as $row)
                    <tr align="center">
                        <td>{{$row->no_sublot}}</td>
                        <td>{{$row->incr_no}}</td>
                        <td>{{date("d" ,strtotime($row->date))}}</td>
                        <td>{{$row->time}}</td>
                        <td>{{$row->trucks_number}}</td>
                        <td>{{$row->gatm}}</td>
                        <td>{{$row->size}}</td>
                        <td>{{$row->seal_number}}</td>
                        <td>{{$row->remark}}</td>
                    </tr>
                    @endforeach
                @else
                    @foreach($list as $row)
                    @php
                    $i++;
                    @endphp
                    <tr align="center">
                        <td>{{$row->no_sublot}}</td>
                        <td>{{$row->incr_no}}</td>
                        <td>{{date("d" ,strtotime($row->date))}}</td>
                        <td>{{$row->time}}</td>
                        <td>{{$row->trucks_number}}</td>
                        <td>{{$row->gatm}}</td>
                        <td>{{$row->size}}</td>
                        <td>{{$row->seal_number}}</td>
                        <td>{{$row->remark}}</td>
                    </tr>
                    @endforeach
                    @foreach(range(0, ($total - 1)) as $t)
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td colspan="6" style="vertical-align:top">
                        <table border="0" cellspacing="0" width="100%">
                            <tr>
                                <td colspan="3">Coal Condition :</td>
                            </tr>
                            <tr>
                                <td>1. Wet</td>
                                <td>2. Moist</td>
                                <td>3. Dry</td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2">
                        <table border="0" cellspacing="0" width="100%">
                            <tr>
                                <td colspan="2">Weather Condition :</td>
                            </tr>
                            <tr>
                                <td>1. Sunny</td>
                                <td>2. Cloudy</td>
                            </tr>
                            <tr>
                                <td>3. Rain</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tfoot>
        </table>
        <br><br>
        <table border="0" cellspacing="0" width="100%">
            <tr>
                <td width="40%">
                    <table border="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="2">Sampler :</td>
                        </tr>
                        <tr>
                            <td width="10%">1. </td>
                            <td>..............................................</td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>..............................................</td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>..............................................</td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>..............................................</td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>..............................................</td>
                        </tr>
                    </table>
                </td>
                <td width="30%">
                    <table border="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="2">Sign</td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td>...........................</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>...........................</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>...........................</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>...........................</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>...........................</td>
                        </tr>
                    </table>
                </td>
                <td width="30%" style="vertical-align:top;">
                    <table border="0" cellspacing="0" width="100%">
                        <tr align="center">
                            <td>Acknowledged by : <br><br><br><br></td>

                        </tr>
                        <tr align="center">
                            <td><u>{{$barges->foreman}}</u></td>
                        </tr>
                        <tr align="center">
                            <td>Foreman</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>
        <table border="0" cellspacing="0" width="100%">
            <tr class="border-top">
                <td>FOR/COAL - OPS/007</td>
                <td align="center">Rev : 01</td>
                <td align="center">Tgl. Berlaku : 06/06/2016</td>
                <td align="right">Hal : {{$page++}} dari {{$bargeslist->chunk(16)->count()}} hal</td>
            </tr>
        </table>
    @endforeach
    </main>

</body>
</html>