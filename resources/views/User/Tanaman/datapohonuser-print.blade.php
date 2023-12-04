<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <style>
        @media print {
            body {
                font-family: 'Times New Roman', sans-serif;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            h1 {
                font-size: 24px;
                font-weight: bold;
                text-align: center;
                margin-bottom: 20px;
            }

            p {
                font-size: 16px;
                margin-bottom: 10px;
            }

            table{
                table-layout: fixed;
            }
            td{
                word-wrap:break-word;
                overflow:hidden;
            }
            tr{
                word-wrap:break-word;
            }
        }
    </style>
</head>
<body>
    <table width="100%" border="0">
        <tbody>
          <tr>
            <td width="15%" rowspan="2">
                <img src="{{ asset('sbadmin/img/egclogo1.png') }}"  width="100%" class="img-fluid" alt="Logo EGC">
            </td>
            <td width="90%" align="center" style="font-size: 25px"><b>Universitas Islam Negeri Raden Fatah Palembang<b><br>
            Fakultas Sains dan Teknologi</td>
          </tr>
          <tr>
            <td align="center" style="font-size: 15px">Jln Prof. KH Zainal Abidin Fikri KM 3,5 Telp. (0711) 353347, Fax. (0711) 354668, Website:ecogreen.radenfatah.ac.id, Email:ecogreen@radenfatah.ac.id</td>
          </tr>
        </tbody>
    </table>
    <hr color="#00000">
    <p align="center" style="font-size: 20px"><b>Data Pengajuan Tanaman {{ $datapohonuser->nama }}</b></p>
    <br>
    <br>
    <table width="" border="0" style="border-collapse:collapse;">
        <tbody>
            <tr>
                <td>
                    <td width="150px;"><b>Nama</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->nama }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>NIM/NIP/NIDN</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->nim }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>No Hp</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->nohp }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Pekerjaan</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->pekerjaan }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Fakultas</b></td>
                    <td>:</td>
                    {{-- <td width="150px;">{{ $datapohonuser->fakultas }}</td> --}}
                    <td width="150px;">{{ $datapohonuser->getFakultasLabelAttribute() }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Jenis Bibit Tanaman</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->jenistanaman }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Tinggi Bibit Tanaman</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->tinggitanaman }} (cm)</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Jumlah Tanaman</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->jumlahtanaman }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Latitude</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->latitude }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Longitude</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->longitude }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Bukti Penanaman</b></td>
                    <td>:</td>
                    <td width="150px;">
                        @if ($datapohonuser->formFile)
                        <img src="{{ asset('storage/images/' . $datapohonuser->formFile) }}" alt="" style="width: 200px;">
                        @else
                        Tidak ada gambar
                        @endif
                    </td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Dibuat</b></td>
                    <td>:</td>
                    <td width="150px;">{{ Carbon\Carbon::parse($datapohonuser->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Diperbarui</b></td>
                    <td>:</td>
                    <td width="150px;">{{ Carbon\Carbon::parse($datapohonuser->updated_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Keterangan</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->keterangan }}</td>
                </td>
            </tr>
            <tr>
                <td>
                    <td width="150px;"><b>Status</b></td>
                    <td>:</td>
                    <td width="150px;">{{ $datapohonuser->status }}</td>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <table width="100%" border="0">
        <tbody>
          <tr>
            <td width="67%">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
            <td width="43%">
                <p>Palembang, <span id="currentDate"></span></p>
                Ketua Ecogreen Campus UIN Raden Fatah</p>
                <p>
                    <img src="{{ asset('sbadmin/img/ttd_ketua.png') }}" width="25%" class="img-fluid" alt="ttd" style="display: inline-block; margin-left:35%">
                </p>
                <p>Dr. Ir. Ledis Heru Saryono Putro, M.Si.</p>
            </td>
          </tr>
        </tbody>
      </table>

    {{-- <div class="container">
        <h1>Data Pengajuan Pohon {{ $datapohonuser->nama }}</h1>
        
        <p>Nama: {{ $datapohonuser->nama }}</p>
        <p>NIM/NIP/NIDN: {{ $datapohonuser->nim }}</p>
        <p>No Hp: {{ $datapohonuser->nohp }}</p>
        <p>Pekerjaan {{ $datapohonuser->pekerjaan }}</p>
        <p>Fakultas: {{ $datapohonuser->fakultas }}</p>
        <p>Jenis bibit tanaman: {{ $datapohonuser->jenistanaman }}</p>
        <p>Tinggi bibit tanaman: {{ $datapohonuser->tinggitanaman }} cm</p>
        <p>Latitude: {{ $datapohonuser->latitude }}</p>
        <p>Longitude: {{ $datapohonuser->longitude }}</p>
        <p>Bukti Penanaman: 
        @if ($datapohonuser->formFile)
            <img src="{{ asset('storage/images/' . $datapohonuser->formFile) }}" alt="" style="width: 350px;">
        @else
            Tidak ada gambar
        @endif
        </p>
        <p>Created: {{ Carbon\Carbon::parse($datapohonuser->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
        <p>Status: {{ $datapohonuser->status }}</p>

        <button onclick="window.print()">Cetak</button>
    </div> --}}
</body>
</html>

<script>
    // Mendapatkan tanggal saat ini dalam format "tanggal-bulan-tahun"
    var currentDate = new Date().toLocaleDateString('en-GB');
    document.getElementById('currentDate').textContent = currentDate;
</script>
