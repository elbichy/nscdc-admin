@extends('layouts.app', ['title' => 'Dashboard - New Redeployment'])

@section('content')
<div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">ADD NEW REDEPLOYMENT</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
					<p class="formMsg white center">NOTE: This section is Compulsory! all fields are required.</p>
					<form action="{{ route('redeployment_store') }}" method="POST" name="create_form" id="create_form">
						@csrf
						<div class="row">
							<div class="col s12 l2">
								<label for="type">Select Type</label>
								<select id="type" name="type" class=" browser-default" required>
									<option disabled>Select Type</option>
									<option value="external" selected>External</option>
									<option value="internal">Internal</option>
								</select>
							</div>
							<div class="input-field col s12 l3">
								<input id="fullname" name="fullname" type="text">
								@if ($errors->has('fullname'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('fullname') }}</strong>
									</span>
								@endif
								<label for="fullname">Fullname</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="service_number" name="service_number" type="number" required>
								@if ($errors->has('service_number'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('service_number') }}</strong>
									</span>
								@endif
								<label for="service_number">Service Number</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="file_number" name="file_number" type="number" required>
								@if ($errors->has('file_number'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('file_number') }}</strong>
									</span>
								@endif
								<label for="file_number">File Number</label>
							</div>
							<div class="col s12 l3">
								<label for="rank">Select Rank</label>
								<select id="rank" name="rank" class=" browser-default" required>
									<option disabled selected>Select Rank</option>
									<option value="Deputy Commandant of Corps">Deputy Commandant of Corps</option>
									<option value="Assistant Commandant of Corps">Assistant Commandant of Corps</option>
									<option value="Chief Superintendent of Corps">Chief Superintendent of Corps</option>
									<option value="Superintendent of Corps">Superintendent of Corps</option>
									<option value="Deputy Superintendent of Corps">Deputy Superintendent of Corps</option>
									<option value="Assistant Superintendent of Corps I">Assistant Superintendent of Corps I</option>
									<option value="Assistant Superintendent of Corps II">Assistant Superintendent of Corps II</option>
									<option value="Deputy Chief Inspector of Corps">Deputy Chief Inspector of Corps</option>
									<option value="Assistant Chief Inspector of Corps">Assistant Chief Inspector of Corps</option>
									<option value="Principal Inspector of Corps I">Principal Inspector of Corps I</option>
									<option value="Principal Inspector of Corps II">Principal Inspector of Corps II</option>
									<option value="Senior Inspector of Corps">Senior Inspector of Corps</option>
									<option value="Inspector of Corps">Inspector of Corps</option>
									<option value="Assistant Inspector of Corps">Assistant Inspector of Corps</option>
									<option value="Chief Corps Assistant">Chief Corps Assistant</option>
									<option value="Principal Corps Assistant">Principal Corps Assistant</option>
									<option value="Senior Corps Assistant">Senior Corps Assistant</option>
									<option value="Corps Assistant I">Corps Assistant I</option>
									<option value="Corps Assistant II">Corps Assistant II</option>
									<option value="Corps Assistant III">Corps Assistant III</option>
								</select>
								@if ($errors->has('rank'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('rank') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 l3">
								<input id="from" name="from" type="text" placeholder="Current command/location" required>
								@if ($errors->has('from'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('from') }}</strong>
									</span>
								@endif
								<label for="from">From (Formation)</label>
							</div>
							<div class="input-field col s12 l3">
								<input id="to" name="to" type="text" placeholder="New command/location" required>
								@if ($errors->has('to'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('to') }}</strong>
									</span>
								@endif
								<label for="to">To (Formation)</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="date" name="date" type="text" class="datepicker" required>
								@if ($errors->has('date'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('date') }}</strong>
									</span>
								@endif
								<label for="date">Date</label>
							</div>
							<div class="input-field col s12 l4">
								<button class="submit btn waves-effect waves-light right" type="submit"><i class="material-icons right">send</i>ADD RECORD</button>
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
			$('.datepicker').datepicker({
				defaultDate: new Date(),
            	setDefaultDate: true
			});
			$('#create_form').submit(function (e) { 
				$('.submit').prop('disabled', true).html('ADDING RECORD...');
			});
		});
	</script>
@endpush