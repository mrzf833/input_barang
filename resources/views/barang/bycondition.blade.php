@extends('barang.master')
@section('style')
    
@endsection
@section('content')
    <div class="mt-3">
        <h2 class=" text-info text-uppercase text-center">by condition {{ $kondisi }}</h2>
    </div>
    <div class="card mt-3">
        <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Tanggal Input Barang</th>
                  <th scope="col">Exp Barang</th>
                  <th scope="col">Message</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($barangs as $barang)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="align-items-center">{{ $barang->nama }}</td>
                    <td>{{ $barang->created_at }}</td>
                    <td>{{ $barang->exp_barang }}</td>
                    <td><div class="btn text-uppercase {{ $barang->bg_alert }}">{{ $barang->message }}</div></td>
                    <td>
                        <a href="{{ route('barang.edit.kondisi',[$barang->id,$kondisi_sebelum_dirubah]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('barang.destroy',$barang->id) }}" class=" d-inline-block" method="post">
                          @csrf
                          @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    
                @endforelse
              </tbody>
            </table>
          </div>
    </div>
@endsection
@section('script')
    
@endsection