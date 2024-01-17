@extends('admin._show')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <form action="{{ route('admin.items.importCsv') }}" method="POST" enctype="multipart/form-data" class="w-1/2">
            @csrf
            <div class="mb-4">
                <label for="file" class="text-gray-700">Import CSV</label>
                <input type="file" name="file" class="form-control">
            </div>
            <div class="mb-4">
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
    </div>

    @if (isset($csv) && isset($file))
        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('admin.items.importCsvWithCols') }}" method="POST" enctype="multipart/form-data"
                class="w-1/2">
                @csrf
                <div class="mb-4">
                    <label for="name" class="text-gray-700">Nazwa produktu</label>
                    <select name="name" id="name" class="form-control">
                        @foreach ($csv[0] as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="desc" class="text-gray-700">opis</label>
                    <select name="desc" id="desc" class="form-control">
                        @foreach ($csv[0] as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="text-gray-700">Cena</label>
                    <select name="price" id="price" class="form-control">
                        @foreach ($csv[0] as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="csv" value="{{ json_encode($csv) }}">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Import
                    CSV</button>
            </form>
        </div>
    @endif
@endsection
