@extends('layout.app')
@section('title','$title')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
      	<div class="box-header">
          <div class="row">
          	<div class="col-md-12" align="left">
              <h3 class="box-title"><i class="fa fa-search"></i> Pencarian</h3>
            </div>
          </div>
        </div>
        <div class="box-body">
        	<form action="{{ URL('inventory/cari') }}" method="GET">
        	{{ csrf_field() }}
        	<div class="row">
      		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="unit" name="cariUnit" placeholder="Cari Unit" value="{{ old('cariUnit') }}" style="border-color: green; box-shadow: 0px 0px 5px;">
                <span class="fa fa-search form-control-feedback"></span>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            	<button class="btn btn-success btn-flat"><i class="fa fa-search"></i> Cari</button>
            </div> 	
            </div>
            </form>
            <hr>
			
			@if((Session::get('akses') == "super") OR (Session::get('akses') == "owner"))
            <div class="row">
            	<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($yearSale , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Group | <span style="cursor:pointer;" id="detailJual1" class="label label-default">Detail <i class="fa fa-caret-right"></i></span> | <span style="cursor:pointer;" id="hideJual1" class="label label-default">Hide <i class="fa fa-caret-left"></i></span>
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>

		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($monthSale , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Group | <span style="cursor:pointer;" id="detailJual2" class="label label-default">Detail <i class="fa fa-caret-right"></i></span> | <span style="cursor:pointer;" id="hideJual2" class="label label-default">Hide <i class="fa fa-caret-left"></i></span>
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>

		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hari Ini</span>
		              <span class="info-box-number">{{ number_format($daySale , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Group | <span style="cursor:pointer;" id="detailJual3" class="label label-default">Detail <i class="fa fa-caret-right"></i></span> | <span style="cursor:pointer;" id="hideJual3" class="label label-default">Hide <i class="fa fa-caret-left"></i></span>
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
            </div>
            <hr>

<!-- DETAIL JUAL ===================================================================== -->
            <div class="row" id="info1" hidden="hidden">
            	<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR Supratman {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset Road {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset Road
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
            </div>

            <div class="row" id="info2" hidden="hidden">
            	<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR Supratman {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset Road {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset Road
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
            </div>

            <div class="row" id="info3" hidden="hidden">
            	<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR Supratman Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset Road Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset Road
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
		        <div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>				
            </div>
            <!-- END DETAIL JUAL ===================================================== -->
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0101"))
            <div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sentral Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS01 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sentral
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0102"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan BMM Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS02 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma BMM
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Hasanuddin Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS04 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Hasanuddin
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0105"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan TTS Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS05 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma TTS
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0106"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo` {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo`
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo` {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo`
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Imbo` Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS06 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Imbo`
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0107"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Mandiri Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS07 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Mandiri
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0108"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan WR Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS08 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma WR Supratman
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0109"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Sunset Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS09 , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Bisma Sunset
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104F"))
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-blue">
		            <span class="info-box-icon"><i class="fa fa-sort"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship {{ $tahun }}</span>
		              <span class="info-box-number">{{ number_format($YS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-green">
		            <span class="info-box-icon"><i class="fa fa-caret-left"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship {{ $bln }}</span>
		              <span class="info-box-number">{{ number_format($MS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>
				
				<div class="col-md-4 col-sm-6 col-xs-12">
		          <div class="info-box bg-orange">
		            <span class="info-box-icon"><i class="fa fa-caret-right"></i></span>

		            <div class="info-box-content">
		              <span class="info-box-text">Penjualan Flagship Hari Ini</span>
		              <span class="info-box-number">{{ number_format($DS04F , 0, ',', '.') }} Unit</span>

		              <div class="progress">
		                <div class="progress-bar" style="width: 100%"></div>
		              </div>
		                  <span class="progress-description">
		                    Flagship
		                  </span>
		            </div>
		            <!-- /.info-box-content -->
		          </div>
		          <!-- /.info-box -->
		        </div>		
			</div>
			@endif

			@if((Session::get('akses') == "super") OR (Session::get('akses') == "owner"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0101"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual01->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Sentral</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data01 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0102"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual02->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit BMM</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data02 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual04->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Hasanuddin</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data04 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0105"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual05->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit TTS</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data05 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0106"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual06->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Imbo</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data06 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0107"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual07->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Mandiri</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data07 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0108"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual08->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit WR Supratman</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data08 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0109"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual09->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Sunset</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data09 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104F"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartJual04F->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Unit Flagship</strong></h4>
            			<br>
            			<i><strong>Penjualan</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($data04F as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            </div>
            @endif
			<hr>	
			
			@if((Session::get('akses') == "super") OR (Session::get('akses') == "owner"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0101"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk01->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar01->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0102"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk02->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar02->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk04->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar04->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0105"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk05->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar05->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0106"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk06->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar06->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0107"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk07->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar07->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0108"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk08->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar08->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0109"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk09->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar09->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104F"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartMasuk04F->container() !!}
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            		{!! $chartKeluar04F->container() !!}
            	</div>
            </div>
            @endif
            <hr>
			
			@if((Session::get('akses') == "super") OR (Session::get('akses') == "owner"))
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService->container() !!}
            	</div>
            </div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0101"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Sentral</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok01 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService01->container() !!}
            	</div>
            </div>
			@elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0102"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok BMM</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok02 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService02->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Hasanuddin</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok04 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService04->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0105"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok TTS</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok05 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService05->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0106"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Imbo</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok06 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService06->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0107"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Mandiri</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok07 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService07->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0108"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok WR Supratman</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok08 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService08->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0109"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Sunset</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok09 as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService09->container() !!}
            	</div>
            </div>
            @elseif((Session::get('akses') == "admin") AND (Session::get('dealer') == "AA0104F"))
			<div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            		<center>
            			<h4><strong>Top 5 Stok Flagship</strong></h4>
            			<br>
            			<i><strong>Terbanyak</strong></i>
            		</center>
            		<div class="table-responsive">
			            <table id="tableIn" class="table table-bordered table-striped table-hover">
			              <thead>
			                  <tr>
			                    <th>Unit</th>
			                    <th>QTY</th>
			                  </tr>
			              </thead>
			              <tbody>
			                  @foreach($dataStok04F as $o)
			                  <tr>
			                    <td>{{ $o->nama_motor }}</td>
			                    <td>{{ $o->jumlah }}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			         </div>   
            	</div>
            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            		{!! $chartService04F->container() !!}
            	</div>
            </div>
			@endif
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')

@if($chartJual)
	  {!! $chartJual->script() !!}
@endif

<!--  -->
@if($chartJual01)
	  {!! $chartJual01->script() !!}
@endif
@if($chartJual02)
	  {!! $chartJual02->script() !!}
@endif
@if($chartJual04)
	  {!! $chartJual04->script() !!}
@endif
@if($chartJual05)
	  {!! $chartJual05->script() !!}
@endif
@if($chartJual06)
	  {!! $chartJual06->script() !!}
@endif
@if($chartJual07)
	  {!! $chartJual07->script() !!}
@endif
@if($chartJual08)
	  {!! $chartJual08->script() !!}
@endif
@if($chartJual09)
	  {!! $chartJual09->script() !!}
@endif
@if($chartJual04F)
	  {!! $chartJual04F->script() !!}
@endif
<!--  -->

@if($chartService)
	  {!! $chartService->script() !!}
@endif

<!--  -->
@if($chartService01)
	  {!! $chartService01->script() !!}
@endif
@if($chartService02)
	  {!! $chartService02->script() !!}
@endif
@if($chartService04)
	  {!! $chartService04->script() !!}
@endif
@if($chartService05)
	  {!! $chartService05->script() !!}
@endif
@if($chartService06)
	  {!! $chartService06->script() !!}
@endif
@if($chartService07)
	  {!! $chartService07->script() !!}
@endif
@if($chartService08)
	  {!! $chartService08->script() !!}
@endif
@if($chartService09)
	  {!! $chartService09->script() !!}
@endif
@if($chartService04F)
	  {!! $chartService04F->script() !!}
@endif
<!--  -->

@if($chartMasuk)
	  {!! $chartMasuk->script() !!}
@endif

<!--  -->
@if($chartMasuk01)
	  {!! $chartMasuk01->script() !!}
@endif
@if($chartMasuk02)
	  {!! $chartMasuk02->script() !!}
@endif
@if($chartMasuk04)
	  {!! $chartMasuk04->script() !!}
@endif
@if($chartMasuk05)
	  {!! $chartMasuk05->script() !!}
@endif
@if($chartMasuk06)
	  {!! $chartMasuk06->script() !!}
@endif
@if($chartMasuk07)
	  {!! $chartMasuk07->script() !!}
@endif
@if($chartMasuk08)
	  {!! $chartMasuk08->script() !!}
@endif
@if($chartMasuk09)
	  {!! $chartMasuk09->script() !!}
@endif
@if($chartMasuk04F)
	  {!! $chartMasuk04F->script() !!}
@endif
<!--  -->

@if($chartKeluar)
	  {!! $chartKeluar->script() !!}
@endif

<!--  -->
@if($chartKeluar01)
	  {!! $chartKeluar01->script() !!}
@endif
@if($chartKeluar02)
	  {!! $chartKeluar02->script() !!}
@endif
@if($chartKeluar04)
	  {!! $chartKeluar04->script() !!}
@endif
@if($chartKeluar05)
	  {!! $chartKeluar05->script() !!}
@endif
@if($chartKeluar06)
	  {!! $chartKeluar06->script() !!}
@endif
@if($chartKeluar07)
	  {!! $chartKeluar07->script() !!}
@endif
@if($chartKeluar08)
	  {!! $chartKeluar08->script() !!}
@endif
@if($chartKeluar09)
	  {!! $chartKeluar09->script() !!}
@endif
@if($chartKeluar04F)
	  {!! $chartKeluar04F->script() !!}
@endif
<!--  -->

<script>
  $(function () {
    $('#tableIn').DataTable({
      "searching": false,
      "paging": false,
      "lengthChange": false,
      "ordering": false
    })
  })
</script>

<script>
$(document).ready(function(){
  $("#detailJual1").click(function(){
    $("#info1").show(500);
    $("#info2").hide(500);
    $("#info3").hide(500);
  });
});

$(document).ready(function(){
  $("#detailJual2").click(function(){
    $("#info2").show(500);
    $("#info1").hide(500);
    $("#info3").hide(500);
  });
});

$(document).ready(function(){
  $("#detailJual3").click(function(){
    $("#info3").show(500);
    $("#info2").hide(500);
    $("#info1").hide(500);
  });
});

$(document).ready(function(){
  $("#hideJual1").click(function(){
    $("#info1").hide(500);
  });
});
$(document).ready(function(){
  $("#hideJual2").click(function(){
    $("#info2").hide(500);
  });
});
$(document).ready(function(){
  $("#hideJual3").click(function(){
    $("#info3").hide(500);
  });
});

$(document).ready(function(){
  $("#detailChartJual").click(function(){
    $("#chartjual").show(500);
  });
});
$(document).ready(function(){
  $("#hideChartJual").click(function(){
    $("#chartjual").hide(500);
  });
});
</script>

@endsection