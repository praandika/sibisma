@extends('layout.app')
@section('title','$title')

@section('content')
<div class="row">
    <div class="col-xs-12 col-lg-12">
      <div class="box">
      	<div class="box-header">
          <div class="row">
            <div class="col-md-9" align="left">
              <h3 class="box-title">Tabel Leasing</h3>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
          <div class="row">
            <div class="col-lg-6" align="left">
               <button class="btn btn-success" data-toggle="modal" data-target="#myData"><i class="fa fa-plus"></i> Tambah</button>
            </div>
          </div>
         <br><br>
          @endif
          <div class="table-responsive">
          	<form action="{{ URL('leasing/deleteall') }}" method="POST">
          	{{ csrf_field() }}
        	<table id="myTable" class="table table-bordered table-striped table-hover">
        		<thead>
                <tr>
                  @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <th><input type="checkbox" id="checkAll"> <label for="checkAll">#</label></th>
                  @else
                  <th>#</th>
                  @endif
                  <th>Leasing</th>
                   @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <th>Aksi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @php ($no = 1)
                @foreach($data as $o)
                <tr>
                	<td><input type="checkbox" id="checkData" name="pilih[]" value="{{ $o->id_leasing }}"> {{ $no++ }}</td>
                	<td>{{ $o->nama_leasing }}</td>
                  @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <td>
                    <abbr title="Edit"><a class="btn btn-primary" data-toggle="modal" data-target="#myEdit{{ $o->id_leasing }}"><i class="fa fa-pencil"></i></a></abbr> 
                  </td>
                  @endif
                </tr>
                @endforeach
                </tbody>
        	</table>
          @if(Session::get('akses') == "super")
        	<button class="btn btn-danger" onclick="return tanya('Yakin hapus data ini?')"><i class="fa fa-trash"></i> Hapus Terpilih</button>
          @endif
        	</form>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- ========================================================== -->
@foreach($data as $o)
<!-- Modal Edit Leasing -->
<div class="modal fade" id="myEdit{{ $o->id_leasing }}" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Header Modal -->
      <div class="modal-header">
        <div class="row">
          <div class="col-lg-11">
            <h4 class="modal-title">Edit Leasing</h4>
          </div>
          <div class="col-lg-1">
            <!-- Button Close -->
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <!-- End Button Close -->
          </div>
        </div>
      </div>
      <!-- End Header Modal -->

      <!-- Modal Body -->
      <form action="{{URL('leasing/update')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="container">
            <input type="hidden" name="id" value="{{ $o->id_leasing }}">
            <div class="row">
            <div class="col-lg-6">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nama Leasing" name="nama" required="required" value="{{ $o->nama_leasing }}" autofocus="autofocus">
                <span class="fa fa-file form-control-feedback"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
    <!-- End Modal Body -->

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" name="add"><i class="fa fa-floppy-o"></i> Ubah</button>
          <button class="btn btn-warning" type="reset" name="reset"><i class="fa fa-repeat"></i> Reset</button>
        </div>
      </form>
      <!-- End Modal Footer -->
      
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- =================================================================== -->
@endforeach
<!-- ========================================================== -->
<!-- Modal Tambah Leasing -->
<div class="modal fade" id="myData" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Header Modal -->
      <div class="modal-header">
        <div class="row">
          <div class="col-lg-11">
            <h4 class="modal-title">Tambah Leasing</h4>
          </div>
          <div class="col-lg-1">
            <!-- Button Close -->
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <!-- End Button Close -->
          </div>
        </div>
      </div>
      <!-- End Header Modal -->

      <!-- Modal Body -->
      <form action="{{URL('leasing/store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="container">
          	<div class="row">
            <div class="col-lg-6">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nama Leasing" name="nama" required="required" autofocus="autofocus">
                <span class="fa fa-file form-control-feedback"></span>
              </div>
            </div>
            </div>
          </div>
        </div>
    <!-- End Modal Body -->

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" name="add"><i class="fa fa-floppy-o"></i> Simpan</button>
          <button class="btn btn-warning" type="reset" name="reset"><i class="fa fa-repeat"></i> Reset</button>
        </div>
      </form>
      <!-- End Modal Footer -->
      
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- =================================================================== -->

@endsection
@section('script')
<script>
  $(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[50, 75, -1], [50, 75, "All"]],
      "iDisplayLength": 50
    })
  })
</script>

<script>
  $("#checkAll").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection