<form action="{{url('barang/'.$data->id)}}" method="post"  id="form">

{{csrf_field()}}
{{method_field("PUT")}}

<div class="form-group">
<label>nama_barang</label>
<input type='text' class='form-control' name='nama_barang' value='{{$data->nama_barang}}'>
</div>
<div class="form-group">
<label>kategori</label>
<select class='form-control' name='kategori'>

@foreach($kategori as $kategori)
<option {{$kategori->id == $data->kategori ? "selected":""}} value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
@endforeach
</select>
</div>

	
</form>