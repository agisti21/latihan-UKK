@extends('layouts.master')
   
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswas.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('siswas.update',$siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS</strong>
                    <input type="text" name="nisn" value="{{ $siswa->nis }}" class="form-control" placeholder="NIS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama</strong>
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" placeholder="nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin</strong>
                    <select name="jk" id="jk" value="{{ $siswa->jk }}">
                    @if($siswa->jk)
                        <option value="{{ $siswa->jk }}" selected>{{ $siswa->jk}}</option>
                        @endif
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-Laki</option>
                    </select>
<!-- 
                    <input type="text" name="nama_belakang" value="{{ $siswa->nama_belakang }}" class="form-control" placeholder="nama_belakang"> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Lahir </strong>
                    <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" class="form-control" placeholder="tempat">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Lahir</strong>
                    <input type="date" class="form-contorl " name="tgl_lahir">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat</strong>
                    <input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control" placeholder="alamat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Asal Sekolah</strong>
                    <input type="text" name="asal_sekolah" value="{{ $siswa->asal_sekolah }}" class="form-control" placeholder="Asal Sekolah">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kelas</strong>
                    <select name="kelas" value="{{ $siswa->kelas }}">
                        @if($siswa->kelas)
                        <option value="{{ $siswa->kelas }}" selected>{{ $siswa->kelas }}</option>
                        @endif
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                        
                    </select> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jurusan</strong>
                    <select name="jurusan" value="{{ $siswa->jurusan }}">
                        @if($siswa->jurusan)
                        <option value="{{ $siswa->jurusan }}" selected>{{ $siswa->jurusan }}</option>
                        @endif
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="MMD">MMD</option>
                        <option value="OTKP">OTKP</option>
                        <option value="BDP">BDP</option>
                        <option value="TBG">TBG</option>
                        <option value="HTL">HTL</option>
                </select>
                </div>
            </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    
    <link rel="stylesheet" href="{{ URL ::asset('../css/jquery-ui.theme.css')}}" type="text/css" />
    <script type="text/javascript" src="{{ URL ::asset('../js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('../js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('../js/jquery-ui.js') }}"></script>
    <script type="text/css" src="{{ URL::asset('../js/jquery.css') }}"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });
    </script>  
@endsection