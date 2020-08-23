@extends('layout.app')
@section('title','$title')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
      	<div class="box-header">
          <div class="row">
          	<div class="col-md-12" align="left">
              <h3 class="box-title"><i class="fa fa-search"></i> Pencarian " {{ $cariUnit }} "</h3>
            </div>
          </div>
        </div>
        <div class="box-body">
        	<form action="{{ URL('inventory/cari') }}" method="GET">
        	{{ csrf_field() }}
        	<div class="row">
      		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="unit" name="cariUnit" placeholder="Cari Unit" value="{{ $cariUnit }}" style="border-color: green; box-shadow: 0px 0px 5px;">
                <span class="fa fa-search form-control-feedback"></span>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            	<button class="btn btn-success btn-flat"><i class="fa fa-search"></i> Cari</button>
            </div> 	
          </div>
          </form>
          <hr>
          
          <div class="col-md-12">
          <div class="row">
            <div class="table-responsive">
            <table id="tableIn" class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                    <th>#</th>
                    <th>Unit</th>
                    <th>Warna</th>
                    <th>Stok</th>
                    <th>Tahun</th>
                    <th>Lokasi</th>
                    <th>Jenis</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php ($no = 1)
                  @foreach($data as $o)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $o->nama_motor }}</td>
                    @include('template.tdwarna')
                    <td>{{ $o->stok }}</td>
                    <td>{{ $o->tahun }}</td>
                    <td>{{ $o->nama_dealer }}</td>
                    <td>{{ $o->jenis }}</td>
                  </tr>
                  @endforeach
                  </tbody>
            </table>
          </div> 
          </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
  $(function () {
    $('#tableIn').DataTable({
      "aLengthMenu": [[50, 75, -1], [50, 75, "All"]],
      "iDisplayLength": 50
    })
  })
</script>
@endsection