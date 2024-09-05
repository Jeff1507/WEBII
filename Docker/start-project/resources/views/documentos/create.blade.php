@extends('templates.main', [
    "title" => "Novo Documento",
    "header" => "Cadastrar Documento"
])

@section('content')
    <form action="{{route('documentos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nome" class="form-control"><br>
        <input type="file" id="documento" name="documento" class="form-control">
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>
@endsection