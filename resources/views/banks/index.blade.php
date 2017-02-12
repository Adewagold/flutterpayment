<div class="row">
<select name="Banks">
		@foreach($banks as $bank)	
  <option value="{{$bank}}">{{$bank}}</option>
	@endforeach
	</select>
</div>