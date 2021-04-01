<!DOCTYPE html>
<html>
<head>
    <img alt="image" src="{{ asset('../assets/img/logo-wk.png') }}" class="rounded-circle mr-1" style="width: 50px">
    <title>Laporan Peminjaman</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
p {
  align:justivy;
   padding-top: 20px;
   padding-right: 50px;
   padding-bottom: 800px;
   padding-left: 0px;
}
</style>
</head>
<body onafterprint="redirect()">
    <br>
    @php if(isset($startDate) && isset($endDate)){ @endphp
    <h2 style="margin-left: 1%;">Laporan Peminjaman: @php echo $startDate @endphp sampai @php echo $endDate @endphp</h2>
    @php }else{ @endphp
    <h2><center>Laporan Peminjaman</center></h2>
    @php } @endphp
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>

                </tr>
            </thead>
             @foreach ($laporans as $siswa)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->nis}}</td>
            <td>{{ $siswa->nama}}</td>
            <td>{{ $siswa->jk}}</td>
            <td>{{ $siswa->tempat_lahir}}</td>
            <td>{{ $siswa->tgl_lahir}}</td>
            <td>{{ $siswa->alamat}}</td>
            <td>{{ $siswa->asal_sekolah}}</td>
            <td>{{ $siswa->kelas}}</td>
            <td>{{ $siswa->jurusan}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
 <br>
 <br>
 
 
 <h6 align="right">
@php $tgl=date('d-m-Y'); @endphp
   Bogor,{{$tgl}} 
   </br>
Kepala Sekolah

</h6>
</br>
</br>
</br>
</br>
</br>

<h6 align="right"> 
Agisti Setia Putri S.Kom

</h6>
<script type="text/javascript">
    window.print();
</script>


<script type="text/javascript">
    function redirect() {
        window.location.href = '@php echo $redirect; @endphp';
    }
</script>
</html>