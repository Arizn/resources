<div class="form-group {{ $errors->has('src_id') ? 'has-error' : ''}}">
    <label for="src_id" class="col-md-4 control-label">{{ 'Source' }}</label>
    <div class="col-md-6">
		<select id="src_id" required name="src_id" class="form-control input-large select2">
			@foreach(\App\Models\Token::all() as $tkn)
				@foreach( $tkn->gateways as $gate )
				<option src_type="\App\Models\Token" src_gateway="{{$gate['name']}}"  symbol="{{$tkn->symbol}}" @if(isset($rate->src_id)&&$rate->src_id==$tkn->id  && $rate->dst_gateway == $gate['name'] ) selected @endif value="{{$tkn->id}}">{{$tkn->symbol }} ( {{$gate['name']}} )</option>
				@endforeach
			@endforeach
			@if(setting('enableFiat',true))
				@foreach(\App\Models\Country::all() as $tkn)
					@foreach( $tkn->gateways as $gate )
					<option src_type="\App\Models\Country" src_gateway="{{$gate['name']}}"  symbol="{{$tkn->symbol}}" @if(isset($rate->src_id)&&$rate->src_id==$tkn->id && $rate->src_gateway == $gate['name'] ) selected @endif value="{{$tkn->id}}">{{$tkn->symbol }} ( {{$gate['name'] }} )</option>
					@endforeach
				@endforeach
			@endif
		</select>
   
        {!! $errors->first('src_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('dst_id') ? 'has-error' : ''}}">
    <label for="dst_id" class="col-md-4 control-label">{{ 'Destination' }}</label>
    <div class="col-md-6">
		<select id="dst_id" required name="dst_id" class="form-control input-large select2">
			@foreach(\App\Models\Token::all() as $tkn)
				@foreach( $tkn->gateways as $gate )
				<option dst_type="\App\Models\Token" dst_gateway="{{$gate['name']}}" symbol="{{$tkn->symbol}}" @if(isset($rate->dst_id)&&$rate->dst_id==$tkn->id && $rate->dst_gateway == $gate['name'] ) selected @endif value="{{$tkn->id}}">{{$tkn->symbol }} ( {{$gate['name']}} )</option>
				@endforeach
			@endforeach
			@if(setting('enableFiat',true))
			@foreach(\App\Models\Country::all() as $tkn)
				@foreach( $tkn->gateways as $gate )
				<option dst_type="\App\Models\Country" dst_gateway="{{$gate['name']}}" symbol="{{$tkn->symbol}}" @if(isset($rate->dst_id)&&$rate->dst_id==$tkn->id  && $rate->dst_gateway == $gate['name'] ) selected @endif value="{{$tkn->id}}"> {{$tkn->symbol }} ( {{$gate['name']}} )</option>
				@endforeach
			@endforeach
			@endif
			
			
		</select>
   
        {!! $errors->first('dst_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('pair_id') ? 'has-error' : ''}}">
    <label for="pair_id" class="col-md-4 control-label">{{ 'Pair Id' }}</label>
    <div class="col-md-6">
		<input type="hidden" id="src_type" name="src_type" value="{{ $rate->src_type or ''}}">
		<input type="hidden" id="dst_type" name="dst_type" value="{{ $rate->dst_type or ''}}">
		<input type="hidden" id="src_gateway" name="src_gateway" value="{{ $rate->src_gateway or ''}}">
		<input type="hidden" id="dst_gateway" name="dst_gateway" value="{{ $rate->dst_gateway or ''}}">
		<input type="hidden" id="tosym" name="tosym" value="{{ $rate->tosym or ''}}">
		<input type="hidden" id="fromsym" name="fromsym" value="{{ $rate->fromsym or ''}}">
        <input  class="form-control" readonly name="pair_id" type="text" id="pair_id" value="{{ $rate->pair_id or ''}}" >
        {!! $errors->first('pair_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    <label for="rate" class="col-md-4 control-label">{{ 'Rate' }}</label>
    <div class="col-md-6">
        <input  placeholder="Enter rate or % overhead" class="form-control" name="rate" type="text" id="rate" value="{{ $rate->rate or ''}}" required>
		<p class="help-block"><strong style="color:red" id="ratemsg">How Many destination coins are in one source coin ?</strong>. This rate will be automatically adjusted to Market rates if the Pair exists and autoupdate rates is set below. </p>
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fees') ? 'has-error' : ''}}">
    <label for="fees" class="col-md-4 control-label">{{ '%Fees' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fees" type="text" id="fees" value="{{ $rate->fees or ''}}" required>
		<p class="help-block">What % does admin charge? </p>
        {!! $errors->first('fees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('minimum') ? 'has-error' : ''}}">
    <label for="minimum" class="col-md-4 control-label">{{ 'Minimum (source)' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="minimum" type="text" id="minimum" value="{{ $rate->minimum or ''}}" required>
        {!! $errors->first('minimum', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('maximum') ? 'has-error' : ''}}">
    <label for="maximum" class="col-md-4 control-label">{{ 'Maximum (source)' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="maximum" type="text" id="maximum" value="{{ $rate->maximum or ''}}" required>
		
        {!! $errors->first('maximum', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="col-md-4 control-label">{{ 'Message' }}</label>
    <div class="col-md-6">
        <textarea class="form-control message" rows="5"  name="message" type="textarea" id="message" >{{ $rate->message or ''}}</textarea>
		<p class="help-block">Message will be shown on the Exchange Page</p>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('autoupdate') ? 'has-error' : ''}}">
    <label for="message" class="col-md-4 control-label">{{ 'Auto Update rates' }}</label>
    <div class="col-md-6">
		<input value="1" type="checkbox" name="autoupdate" @if(isset($rate->autoupdate)&&$rate->autoupdate == 1) checked @endif >
        {!! $errors->first('autoupdate', '<p class="help-block">:autoupdate</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('autocomplete') ? 'has-error' : ''}}">
    <label for="message"  class="col-md-4 control-label">{{ 'Auto Complete Exchange' }}</label>
    <div class="col-md-6">
		<input type="checkbox" value="1" name="autocomplete" @if(isset($rate->autocomplete)&&$rate->autocomplete == 1) checked @endif >
        {!! $errors->first('autocomplete', '<p class="help-block">:autocomplete</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
	<a href="{{ url('/admin/rates') }}" title="Back"><button class="btn btn-danger btn"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button></a>
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endpush
@section('js')
<script>
	$(function () {
		$('.select2').select2();
		var setrate = function(){
			var src = $('#src_id').find(":selected").attr('symbol');
			var dst = $('#dst_id').find(":selected").attr('symbol');
			var ir = $('#rate').val();
			$('#ratemsg').text('1'+src.toUpperCase()+' = '+ir+dst.toUpperCase());
		}
		$('.select2').change(function(e) {
			var src = $('#src_id').find(":selected");
			var dst = $('#dst_id').find(":selected");
			var sym = src.attr('src_gateway')+src.attr('symbol')+"_"+ dst.attr('dst_gateway')+dst.attr('symbol')
			var src_type = src.attr('src_type');
			var dst_type = dst.attr('dst_type');
			var src_gateway = src.attr('src_gateway');
			var dst_gateway = dst.attr('dst_gateway');
			var fromSym = src.attr('symbol');
			var toSym = dst.attr('symbol');
			$('#src_type').val(src_type);
			$('#dst_type').val(dst_type);
			$('#src_gateway').val(src_gateway);
			$('#dst_gateway').val(dst_gateway);
			$('#fromsym').val(fromSym);
			$('#tosym').val(toSym);
			$('#pair_id').val(sym);
			setrate();
		});
		
		$('#rate').keyup(function(e) {
			setrate();
		});
	  })
       
    </script>
@endsection
