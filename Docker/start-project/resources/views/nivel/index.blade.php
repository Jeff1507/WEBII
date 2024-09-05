@extends('templates/main', ['titulo'=>"NÍVEL"])

@section('conteudo')

    <x-datatable 
        title="Tabela de Niveis" 
        :header="['ID', 'Nome', 'Ações']" 
        crud="nivel" 
        :data="$data"
        :fields="['id', 'nome']" 
        :hide="[true, false, false]"
        remove="nome"
        add="true" 
    /> 
@endsection