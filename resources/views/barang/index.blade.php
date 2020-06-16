@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{@$title}}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{@$title}}</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
       
      
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Barang Data</h3>
                </div>
                <div class="col text-right">
                  <button data-title="Tambah Data" data-src="{{url('barang/create')}}" class="btn btn-primary create-btn btn-sm">Create</button>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
             
<table class="table table-striped" id="table">
  <thead>
    <th>nama_barang</th>
<th>kategori</th>
<th>created_at</th>
<th>updated_at</th>

  
    <th>Options</th>
  </thead>

  <tbody>
  </tbody>
</table>

            </div>
          </div>
        </div>
       
      </div>

      @endsection

@push('scripts')
<script>

$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url(Request::segment(env('SEGMENT')).'/json') !!}',
        columns: [
         {data:'nama_barang',name:'nama_barang'},
{data:'kategori',name:'kategori'},
{data:'created_at',name:'created_at'},
{data:'updated_at',name:'updated_at'},
{data:'action',name:'action'}
     
        ]
    });
});


</script>
@endpush

