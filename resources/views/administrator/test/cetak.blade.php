<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Test</title>
    
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
        {{$judul}} <br>
        TEST <br>
            @php
            $i = 1;
            @endphp
            @foreach($data->chunk(10) as $row)
                @php
                $total = 10 - $row->count();
                @endphp
                {{$total}}
                @if($total == 0)
                    <p>bagian {{$i++}}</p>
                    <table border="1">
                    @php
                    $list = 1;
                    @endphp
                    @foreach($row as $r)
                    
                        <tr>
                            <td>{{$list++}}</td>
                            <td>{{$r->no_reg}}</td>
                        </tr>
                    
                    @endforeach
                    </table>
                    <br>
                @else
                    <p>bagian {{$i++}}</p>
                    <table border="1">
                    @php
                    $list = 1;
                    @endphp
                    @foreach($row as $r)    
                        <tr>
                            <td>{{$list++}}</td>
                            <td>{{$r->no_reg}}</td>
                        </tr>
                    @endforeach
                    @foreach(range(0, ($total - 1)) as $item)
                        <tr>
                            <td>{{$list + $item}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </table>
                @endif
            @endforeach
        
    </main>

</body>
</html>