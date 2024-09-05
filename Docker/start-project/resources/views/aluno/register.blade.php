@section('script')
<script type="text/javascript">
document.getElementById('curso_id').addEventListener('change', function() {
// Obtém id do curso selecionado
let curso_id = this.value
// Requisição a API
$.getJSON('/api/turma/'+curso_id, function(data) {
// Remove todos os Elementos do Select$('#turma_id').children().remove().end()
// Preenche o Select
data.map((item) => {
$('#turma_id').append(new Option(item.ano, item.id))
});
// Habilita Select
$('#turma_id').removeAttr('disabled');
});
// Desabilita Select
// $('#id').attr('disabled', 'disabled');
});
</script>
@endsection
