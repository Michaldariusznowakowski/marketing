@extends('admin._show')
@section('content')
    <form action="{{ route('admin.items.importCsv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" class="text-gray-700">Import CSV</label>
            <input type="file" name="file" class="form-control">
            <label for="delimiter" class="text-gray-700">Delimiter</label>
            <select name="separator" id="separator" class="form-control">
                <option value=";">;</option>
                <option value=",">,</option>
                <option value="\t">tab</option>
            </select>
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Import
            CSV</button>
    </form>

    @if (isset($csv) && isset($file))
        <!-- make a drop down to bind proper csv columns to database one -->
        <form action="{{ route('admin.items.importCsvWithCols') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="text-gray-700">Nazwa produktu</label>
                <select name="name" id="name" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="desc" class="text-gray-700">opis</label>
                <select name="desc" id="desc" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="price" class="text-gray-700">Cena</label>
                <select name="price" id="price" class="form-control">
                    @foreach ($csv[0] as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="csv" value="{{ json_encode($csv) }}">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Import
                    CSV</button>
            </div>

        </form>
    @endif
@endsection
