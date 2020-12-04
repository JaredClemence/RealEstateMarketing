@push('font-style')
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" >
@endpush
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/flipclock.css')}}" >
@endpush

<div class="cd100"><!-- Clock is generated here --></div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type='text/javascript' src='{{asset('js/flipclock.min.js')}}' ></script>
<script type='text/javascript' src='{{asset('js/countdowntime.js')}}' ></script>
<script>
    $('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: {{$days}},
			endtimeHours: {{$hours}},
			endtimeMinutes: {{$minutes}},
			endtimeSeconds: {{$seconds}},
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
</script>
@endpush