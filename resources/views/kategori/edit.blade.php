<form action="{{url('kategori/'.$data->id)}}" method="post"  id="form">

{{csrf_field()}}
{{method_field("PUT")}}

<div class="form-group">
<label>nama_kategori</label>
<input type='text' class='form-control' name='nama_kategori' value='{{$data->nama_kategori}}'>
</div>

	
</form>