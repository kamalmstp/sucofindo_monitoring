<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Briefing Prosedur dan K3</title>
    
</head>
<body>
    <header>
        
    </header>

    <footer>
        
    </footer>

    <main>
        @foreach($detail as $row)
        <div>
            <table border="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" border="0"><b>{{$judul}}</b></td>
                    <td align="center" width="25%"><img src="{{public_path('media/photos/sucofindo-print.png')}}" alt="logos" width="75" height="52"></td>
                </tr>
            </table>
            <hr>
            <br>
            <table border="0" cellspacing="0" width="100%">
                <tr>
                    <td width="30%">Nama Pegawai</td>
                    <td width="2%">:</td>
                    <td width="68%">{{$row->nama}}</td>
                </tr>
                <tr>
                    <td>NPP</td>
                    <td>:</td>
                    <td>{{$row->npp}}</td>
                </tr>
                <!-- Status Pegawai -->
                <tr>
                    <td>Status Pegawai</td>
                    <td>:</td>
                    <td>
                        <table border="0" cellspacing="0" width="100%">
                            <tr>
                                <td width="5%">
                                    <input type="checkbox" @if($row->status == "PT") {{ 'checked' }} @endif>
                                </td>
                                <td>
                                    PT
                                </td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->status == "PTT") {{ 'checked' }} @endif>
                                </td>
                                <td>
                                    PTT
                                </td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->status == "PTT Proyek") {{ 'checked' }} @endif>
                                </td>
                                <td>
                                    PTT Proyek
                                </td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->status == "LS") {{ 'checked' }} @endif>
                                </td>
                                <td>
                                    LS
                                </td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->status == "Harian") {{ 'checked' }} @endif>
                                </td>
                                <td>
                                    Lainnya
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Briefing</td>
                    <td>:</td>
                    <td>
                        {{date('d, M Y',strtotime($brief->tanggal))}} &nbsp;&nbsp; Jam : &nbsp;{{date('H:i',strtotime($brief->jam))}}
                    </td>
                </tr>
                <!-- Jenis Pekerjaan -->
                <tr>
                    <td>Jenis Pekerjaan</td>
                    <td>:</td>
                    <td>
                        @if($row->bidang == 'Sampler')
                            {{$row->bidang}}
                        @elseif($row->bidang == 'Driver')
                            {{$row->bidang}}
                        @else
                            Marine
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tempat/Lokasi Briefing</td>
                    <td>:</td>
                    <td>{{$brief->lokasi_briefing}}</td>
                </tr>
                <!-- Posisi Pekerjaan -->
                <tr>
                    <td>Posisi Pekerjaan</td>
                    <td>:</td>
                    <td>
                        <table border="0" cellspacing="0" width="100%">
                            <tr>
                                <td width="5%">
                                    <input type="checkbox" @if($row->bidang == "Sampler") {{ 'checked' }} @endif>
                                </td>
                                <td>Sampler/Inspektor</td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->bidang == "Inspector 1" || $row->bidang == "Sampling & Preparation Spec. 1") {{ 'checked' }} @endif>
                                </td>
                                <td>Junior Marine Surveyor</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Preparator</td>
                                <td width="5%">
                                    <input type="checkbox" @if($row->bidang == "Inspector 2" || $row->bidang == "Sampling & Preparation Spec. 2") {{ 'checked' }} @endif>
                                </td>
                                <td>Marine Surveyor</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Analis/Senior Analis</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Foreman Sampler/Inspector</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Teknisi</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Checker / Tallyman</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td>Administrasi</td>
                                @if($row->bidang == 'Driver')
                                    <td width="5%">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td>Driver</td>
                                @else
                                    <td width="5%">
                                        <input type="checkbox">
                                    </td>
                                    <td>Lainnya .............................</td>
                                @endif
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Lokasi Pekerjaan</td>
                    <td>:</td>
                    <td>{{$brief->lokasi_kerja}}</td>
                </tr>
                <tr>
                    <td>Alat Pelindung Diri (APD) Yang Digunakan</td>
                    <td>:</td>
                    <td>
                        <table border="0" cellspacing="0" width="100%">
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Life Jacket</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Dust Masker</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Safety Shoes</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Gas Masker</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Safety Helmet</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Rompi Scotligh</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Safety Gloves</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Jas Lab</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Safety Glasses</td>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td width="45%">Earplug/Earmuff</td>
                            </tr>
                            <tr>
                                <td width="5%">
                                    <input type="checkbox">
                                </td>
                                <td colspan="3">Lainnya ........................................................................................</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Petugas Pemberi Briefing</td>
                    <td>:</td>
                    <td>{{$brief->nama}}</td>
                </tr>
            </table>
            <p align="justify">
                Dengan ini saya telah diberikan briefing mengenai prosedur kerja dan aturan safety serta hal-hal lainnya
                yang berhubungan dengan prosedur kerja dan aturan K3. Kami telah memahami dan mengerti setiap
                prosedur kerja dan tahapannya serta aturan K3 serta alat pelindung diri (APD) yang harus kami gunakan
                selama menjalani pekerjaan yang diberikan PT. SUCOFINDO (Persero) Cabang Banjarmasin.
            </p>
            <p align="justify">
                Apabila terjadi pelanggaran terhadap prosedur kerja dan aturan K3 serta berdampak pada hasil kerja
                yang telah kami lakukan sehingga mengakibatkan kerugian kepada PT. SUCOFINDO (Persero) Cabang Banjarmasin
                baik secara material dan non material maka kami bersedia diberikan sanksi yang berlaku sesuai ketentuan 
                perusahaan dan undang-undang yang berlaku di Negara Republik Indonesia.
            </p>
            <p align="justify">
                Dengan ini saya menyatakan sanggup menjalankan tugas dan tidak akan meninggalkan tempat tugas sampai pekerjaan selesai.
            </p>
            <p align="justify">Demikian pernyataan ini dibuat tanpa adanya tekanan dari pihak manapun.</p>
            <table border="0" width="100%">
                <tr>
                    <td width="40%" align="center">
                        <p>Petugas yang menerima briefing</p>
                        <br><br><br>
                        ({{$row->nama}})
                    </td>
                    <td width="20%" align="center">
                        <p>Tanggal</p>
                        <p>{{date('d, M Y',strtotime($brief->tanggal))}}</p>
                    </td>
                    <td width="40%" align="center">
                        <p>Petugas pemberi briefing</p>
                        <br><br><br>
                        ({{$brief->nama}})
                    </td>
                </tr>
            </table>
            <br>
            <hr>
            <table border="0" width="100%">
                <tr>
                    <td align="left" width="40%">FOR/BJM-SMK3/47</td>
                    <td align="center" width="20%">Rev : 00</td>
                    <td align="right" width="40%">Halaman 1 dari 1 hal</td>
                </tr>
            </table>
        </div>
        @endforeach

    </main>

</body>
</html>