@extends('templates/main', ['titulo'=>"DETALHES DO EIXO"])

@section('conteudo')

    <form action="{{ route('eixo.store') }}" method="POST">
        @csrf
        <x-textbox name="nome" label="Nome" type="text" value="{{$data->nome}}" disabled="true"/>
        <div class="row">
            <div class="col text-start">
                <x-button label="Voltar" type="link" route="eixo.index" color="secondary"/>
            </div>
        </div>
    </form>
    
@endsection