@extends('layouts.master')
@section('pagetitle')
    <img alt="image" src="{{ asset('../assets/img/logo-wk.png') }}" class="rounded-circle mr-1" style="width: 50px">
    <h1>Laporan Pinjaman</h1>
@endsection
@section('content')
    <br>
    <br>
    <div class="row" class="form-control">
        <div class="col-lg-12 margin-tb">
                <form action="/laporan/cari" method="GET">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <p>Tanggal Awal</p>
                            <input type="date" ¬ss="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                            @error('starDate')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                        <div class="col-auto">
                            <label class="col-sm-2 mb-3"><b>-</b></label>
                        </div>
                        <div class="col-auto">
                            <p>Tanggal Akhir</p>
                            <input type="date" class="form-contorl @error('endDate')is-invalid @enderror mb-3" name="endDate" id="endDate">
                            @error('endDate')
                            <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="col-auto">
                        <br>
                        <br>
                            <button type="submit" class="btn btn-primary mb-3">Cari</button>
                            @php if(isset($startDate) && isset($endDate)){ @endphp
                            <a href="{{ route('laporanprint', ['startDate' => $startDate, 'endDate' => $endDate]) }}" class="btn btn-info mb-3 ml-2">Cetak</a>
                            @php }else{ @endphp
                            <a href="{{ route('laporanprint') }}" class="btn btn-info mb-3 ml-2">Cetak</a>
                            @php } @endphp
                        </div>

                </form>
        </div>
    </div>
    <table class="table" id="table">
        <tr>
        
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Asal Sekolah</th>
            <th>Kelas</th>
            <th>Jurusan</th>
          
        </tr>
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
     	
   </section>
@endsection

@push('page-scripts')
  
@endpush

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush