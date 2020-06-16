<form action="{{url('barang')}}" method="post"  id="form">

{{csrf_field()}}


<div class="form-group">
<label>nama_barang</label>
<input type='text' class='form-control' name='nama_barang' value=''>
</div>
<div class="form-group">
<label>kategori</label>
<select class='form-control' name='kategori'>

@foreach($kategori as $kategori)
<option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
@endforeach
</select>
</div>

	
</form>