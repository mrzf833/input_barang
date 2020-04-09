@extends('barang.master')
@section('content')
<div class="card bg-secondery p-3  mr-auto ml-auto mt-3" style="width: 500px">
    <form action="{{ route('barang.store') }}" method="post">
        @csrf
        <div class="form-group row mx-auto">
            <label for="nama" class="col-4 col-form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="col-8 form-control" required>
        </div>
        <div class="form-group row mx-auto">
            <label for="exp" class="col-4 col-form-label">Exp Barang</label>
            <input type="date" name="exp" id="exp" class="col-8 form-control selector" required>
        </div>
        <div class="form-group row mx-auto">
            <button type="submit" class="btn btn-primary ml-auto mr-2">Simpan Barang</button>
            <button type="button" class="btn btn-danger mr-auto" id="kosong">Kosongkan Inputan</button>
        </div>
    </form>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#kosong').click(function(){
                //alert('saas');
                $('form #nama').val('');
                $('form #exp').val('');
            });
        })
    </script>
@endsection
