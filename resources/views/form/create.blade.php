@extends('main')

@section('content')
    <div class="col-12">
        <form>
            <div class="form-group">
                <label for="state">Negeri</label>
                <select class="form-control" name="state" id="state">
                    <option></option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="district">Daerah</label>
                <select class="form-control" name="district" id="district" disabled>
                </select>
            </div>
            <div class="form-group">
                <label for="parliament">Parlimen</label>
                <select class="form-control" name="parliament" id="parliament" disabled>
                </select>
            </div>
            <div class="form-group">
                <label for="dun">Dun</label>
                <select class="form-control" name="dun" id="dun" disabled>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        var districts = JSON.parse('{!! $districts !!}');
        var parliaments = JSON.parse('{!! $parliaments !!}');
        var duns = JSON.parse('{!! $duns !!}');

        $(document).ready(function () {

            // state change
            $('select#state').change(function() {
                var district = $('select#district');
                district.empty().append('<option></option>');
                $.each(districts, function (idx, val) {
                    if (val.state_id == $('select#state').val()) {
                        district.append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                });

                if (district.find('option').length) {
                    district.removeAttr('disabled');
                } else {
                    district.attr('disabled', 'disabled');
                }

                $('select#parliament').val('');
                $('select#dun').val('');
            });

            // district change
            $('select#district').change(function() {
                var parliament = $('select#parliament');
                parliament.empty().append('<option></option>');
                $.each(parliaments, function (idx, val) {
                    if (val.district_id == $('select#district').val()) {
                        parliament.append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                });

                if (parliament.find('option').length) {
                    parliament.removeAttr('disabled');
                } else {
                    parliament.attr('disabled', 'disabled');
                }

                $('select#dun').val('');
            });

            // parliament change
            $('select#parliament').change(function() {
                var dun = $('select#dun');
                dun.empty().append('<option></option>');
                $.each(duns, function (idx, val) {
                    if (val.parliament_id == $('select#parliament').val()) {
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
