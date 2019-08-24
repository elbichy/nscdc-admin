@extends('layouts.app', ['title' => 'Dashboard - Edit Redeployment'])

@section('content')
<div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">EDIT REDEPLOYMENT</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
					<p class="formMsg white center">NOTE: This section is Compulsory! all fields are required.</p>
					<form action="{{ route('redeployment_update', $redeployment->id) }}" method="POST" name="edit_form" id="edit_form">
						@method('PATCH')
						@csrf
						<div class="row">
							<div class="col s12 l2">
								<label for="type">Select Type</label>
								<select id="type" name="type" class=" browser-default" required>
									<option disabled>Select Type</option>
									<option value="external" {{ $redeployment->type == 'external' ? 'selected' : '' }}>External</option>
									<option value="internal" {{ $redeployment->type == 'internal' ? 'selected' : '' }}>Internal</option>
								</select>
							</div>
							<div class="input-field col s12 l3">
								<input id="fullname" name="fullname" type="text" value="{{ $redeployment->fullname }}">
								@if ($errors->has('fullname'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('fullname') }}</strong>
									</span>
								@endif
								<label for="fullname">Fullname</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="service_number" name="service_number" type="number" value="{{ $redeployment->service_number }}" required>
								@if ($errors->has('service_number'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('service_number') }}</strong>
									</span>
								@endif
								<label for="service_number">Service Number</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="file_number" name="file_number" type="number" value="{{ $redeployment->file_number }}" required>
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
									<option value="Deputy Commandant of Corps" {{ $redeployment->rank == 'Deputy Commandant of Corps' ? 'selected' : '' }}>Deputy Commandant of Corps</option>

									<option value="Assistant Commandant of Corps" {{ $redeployment->rank == 'Assistant Commandant of Corps' ? 'selected' : '' }}>Assistant Commandant of Corps</option>

									<option value="Chief Superintendent of Corps" {{ $redeployment->rank == 'Chief Superintendent of Corps' ? 'selected' : '' }}>Chief Superintendent of Corps</option>

									<option value="Superintendent of Corps" {{ $redeployment->rank == 'Superintendent of Corps' ? 'selected' : '' }}>Superintendent of Corps</option>

									<option value="Deputy Superintendent of Corps" {{ $redeployment->rank == 'Deputy Superintendent of Corps' ? 'selected' : '' }}>Deputy Superintendent of Corps</option>

									<option value="Assistant Superintendent of Corps I" {{ $redeployment->rank == 'Assistant Superintendent of Corps I' ? 'selected' : '' }}>Assistant Superintendent of Corps I</option>

									<option value="Assistant Superintendent of Corps II" {{ $redeployment->rank == 'Assistant Superintendent of Corps II' ? 'selected' : '' }}>Assistant Superintendent of Corps II</option>

									<option value="Chief Inspector of Corps" {{ $redeployment->rank == 'Chief Inspector of Corps' ? 'selected' : '' }}>Chief Inspector of Corps</option>

									<option value="Deputy Chief Inspector of Corps" {{ $redeployment->rank == 'Deputy Chief Inspector of Corps' ? 'selected' : '' }}>Deputy Chief Inspector of Corps</option>

									<option value="Assistant Chief Inspector of Corps" {{ $redeployment->rank == 'Assistant Chief Inspector of Corps' ? 'selected' : '' }}>Assistant Chief Inspector of Corps</option>

									<option value="Principal Inspector of Corps I" {{ $redeployment->rank == 'Principal Inspector of Corps I' ? 'selected' : '' }}>Principal Inspector of Corps I</option>

									<option value="Principal Inspector of Corps II" {{ $redeployment->rank == 'Principal Inspector of Corps II' ? 'selected' : '' }}>Principal Inspector of Corps II</option>

									<option value="Senior Inspector of Corps" {{ $redeployment->rank == 'Senior Inspector of Corps' ? 'selected' : '' }}>Senior Inspector of Corps</option>

									<option value="Inspector of Corps" {{ $redeployment->rank == 'Inspector of Corps' ? 'selected' : '' }}>Inspector of Corps</option>

									<option value="Assistant Inspector of Corps" {{ $redeployment->rank == 'Assistant Inspector of Corps' ? 'selected' : '' }}>Assistant Inspector of Corps</option>

									<option value="Chief Corps Assistant" {{ $redeployment->rank == 'Chief Corps Assistant' ? 'selected' : '' }}>Chief Corps Assistant</option>

									<option value="Principal Corps Assistant" {{ $redeployment->rank == 'Principal Corps Assistant' ? 'selected' : '' }}>Principal Corps Assistant</option>

									<option value="Senior Corps Assistant" {{ $redeployment->rank == 'Senior Corps Assistant' ? 'selected' : '' }}>Senior Corps Assistant</option>

									<option value="Corps Assistant I" {{ $redeployment->rank == 'Corps Assistant I' ? 'selected' : '' }}>Corps Assistant I</option>

									<option value="Corps Assistant II" {{ $redeployment->rank == 'Corps Assistant II' ? 'selected' : '' }}>Corps Assistant II</option>

									<option value="Corps Assistant III" {{ $redeployment->rank == 'Corps Assistant III' ? 'selected' : '' }}>Corps Assistant III</option>

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
								<input id="from" name="from" type="text" placeholder="Current command/location" value="{{ $redeployment->from }}" required>
								@if ($errors->has('from'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('from') }}</strong>
									</span>
								@endif
								<label for="from">From (Command)</label>
							</div>
							<div class="input-field col s12 l3">
								<input id="to" name="to" type="text" placeholder="New command/location" value="{{ $redeployment->to }}" required>
								@if ($errors->has('to'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('to') }}</strong>
									</span>
								@endif
								<label for="to">To (Command)</label>
							</div>
							<div class="input-field col s12 l2">
								<input id="date" name="date" type="text" class="datepicker" value="{{ $redeployment->date }}" required>
								@if ($errors->has('date'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('date') }}</strong>
									</span>
								@endif
								<label for="date">Date</label>
							</div>
							<div class="input-field col s12 l4">
								<button class="submit btn waves-effect waves-light left" type="submit"><i class="material-icons right">send</i>UPDATE RECORD</button>
								<button class="delete btn waves-effect waves-light right" type="submit" onclick="deleteRecord(event)"><i class="material-icons right">close</i>DELETE RECORD</button>
							</div>
						</div>
					</form>
					<form action="{{ route('redeployment_delete', $redeployment->id) }}" method="post" id="delete_form">
						@method('DELETE')
						@csrf
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
			$('#edit_form').submit(function (e) { 
				$('.submit').prop('disabled', true).html('UPDATING RECORD...');
			});
		});
		function deleteRecord(e){
			e.preventDefault();
			$('.delete').prop('disabled', true).html('DELETING RECORD...');
			$('#delete_form').submit();
		}
	</script>
@endpush