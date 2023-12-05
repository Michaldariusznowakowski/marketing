@extends('_show')
@section('content')
    <!-- form import from csv -->
    <form action="{{ route('import_csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Import CSV</label>
            <input type="file" name="file" class="form-control">
            <label for="delimiter">Delimiter</label>
            <select name="separator" id="separator" class="form-control">
                <option value=";">;</option>
                <option value=",">,</option>
                <option value="\t">tab</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Import CSV</button>
    </form>

    @if (isset($csv) && isset($file))
        <!-- make a drop down to bind proper csv columns to database one -->
        <form action="{{ route('import_csv_cols') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nazwa produktu</label>
                <select name="name" id="name" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="desc">opis</label>
                <select name="desc" id="desc" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="price">Cena</label>
                <select name="price" id="price" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="csv" value="{{ json_encode($csv) }}">
                <button type="submit" class="btn btn-success">Import CSV</button>
            </div>

        </form>
    @endif
@endsection
