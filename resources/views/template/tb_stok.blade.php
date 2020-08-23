        <div class="table-responsive">
        	<table id="myTable" class="table table-bordered table-striped table-hover">
        		<thead>
                <tr>
                  @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <th><input type="checkbox" id="checkAll"> <label for="checkAll">#</label></th>
                  @else
                  <th>#</th>
                  @endif
                  <th>Unit</th>
                  <th>Warna</th>
                  <th>Stok</th>
                  <th>Jenis</th>
                  <th>Tahun</th>
                   @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <th>Aksi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @php ($no = 1)
                @foreach($data as $o)
                <tr>
                	<td><input type="checkbox" id="checkData" name="pilih[]" value="{{ $o->id_stok }}">{{ $no++ }}</td>
                	<td>{{ $o->nama_motor }}</td>
                	@include('template.tdwarna')
                	<td>{{ $o->stok }}</td>
                	<td>{{ $o->jenis }}</td>
                  <td>{{ $o->tahun }}</td>
                  @if((Session::get('akses') == "super") OR (Session::get('akses') == "admin"))
                  <td>
                    <abbr title="Detail"><a class="btn btn-flat btn-success" data-toggle="modal" data-target="#myDetail{{ $o->id_stok }}"><i class="fa fa-eye"></i></a></abbr> 
                  </td>
                  @endif
                </tr>
                @endforeach
                </tbody>
        	</table>
          </div>