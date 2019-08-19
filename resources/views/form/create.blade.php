@extends('main')

@section('content')
    <div class="col-12">
        <form name="formTest" id="formTest" action="{{ route('form.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="state_id">Negeri</label>
                <select class="form-control" name="state_id" id="state_id">
                    <option></option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="district_id">Daerah</label>
                <select class="form-control" name="district_id" id="district_id" disabled>
                </select>
            </div>
            <div class="form-group">
                <label for="parliament_id">Parlimen</label>
                <select class="form-control" name="parliament_id" id="parliament_id" disabled>
                </select>
            </div>
            <div class="form-group">
                <label for="dun_id">Dun</label>
                <select class="form-control" name="dun_id" id="dun_id" disabled>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input class="form-control" name="name" id="name" placeholder="">
            </div>
            <div class="form-group">
                <label for="identification_no">ID No</label>
                <input class="form-control" name="identification_no" id="identification_no" placeholder="">
            </div>
            <div class="form-group">
                @foreach($health_problems as $health)
                    <label><input type="checkbox" name="health_problems[]" value="{{ $health->id }}" /> {{ $health->name }}</label>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        var districts = JSON.parse('{!! $districts !!}');
        var parliaments = JSON.parse('{!! $parliaments !!}');
        var duns = JSON.parse('{!! $duns !!}');

        $(document).ready(function () {

            // state change
            $('select#state_id').change(function() {
                var district = $('select#district_id');
                district.empty().append('<option></option>');
                $.each(districts, function (idx, val) {
                    if (val.state_id == $('select#state_id').val()) {
                        district.append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                });

                if (district.find('option').length) {
                    district.removeAttr('disabled');
                } else {
                    district.attr('disabled', 'disabled');
                }

                $('select#parliament_id').val('');
                $('select#dun_id').val('');
            });

            // district change
            $('select#district_id').change(function() {
                var parliament = $('select#parliament_id');
                parliament.empty().append('<option></option>');
                $.each(parliaments, function (idx, val) {
                    if (val.district_id == $('select#district_id').val()) {
                        parliament.append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                });

                if (parliament.find('option').length) {
                    parliament.removeAttr('disabled');
                } else {
                    parliament.attr('disabled', 'disabled');
                }

                $('select#dun_id').val('');
            });

            // parliament change
            $('select#parliament_id').change(function() {
                var dun = $('select#dun_id');
                dun.empty().append('<option></option>');
                $.each(duns, function (idx, val) {
                    if (val.parliament_id == $('select#parliament_id').val()) {
                        dun.append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                });

                if (dun.find('option').length) {
                    dun.removeAttr('disabled');
                } else {
                    dun.attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
