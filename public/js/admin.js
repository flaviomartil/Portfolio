var item;
const tableAdmin = {
  language: {
    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
  },
  columns: [
    { 'data': 'id' },
    { 'data': 'nome' },
    { 'data': 'descrição' },
    { 'data': 'categoria' },
    { 'data': 'imagem' },
    { 'data': 'link' },
    { 'data': 'actions', 'searchable': false, 'orderable': false },
  ],
  lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'todas']],
  responsive: true,
  order: [[1, "asc"]],
};
$(function () {
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "escapeHtml": false
  }
  var table = $('#tableAdmin').DataTable(tableAdmin);
  teste();
  function teste() {
    newCsrfToken();
    table.clear();
    $.ajax({
      url: '/admin/projects',
      success: function (data) {
        for (let table of data) {
          var row =
            $('#tableAdmin').DataTable().row.add({
              'id': table.id,
              'nome': table.nome,
              'descrição': table.descricao,
              'categoria': table.nome_categoria,
              'imagem': table.imagem,
              'link': table.link,
              'actions': createBtns(table.id)
            })

        }
        table.draw();
      }
    });
  }

  $('#tableAdmin').on('click', '.delete', function () {
    data = {
      'id': item
    };
    if (confirm("Você tem certeza que deseja excluir o projeto?")) {
      $.ajax({
        url: "/admin/delete",
        type: "POST",
        data: data,
        success: function (data) {
          teste();
          toastr.success('Excluído com sucesso');
        }, error: function (e) {
          toastr.error('Erro ao excluir');
        }
      });
    }
  });
});
function newCsrfToken() {
  $.ajax({
    url: "/newCsrf",
    type: 'get',
    dataType: 'json',
    success: function (result) {
      $('meta[name="csrf-token"]').attr('content', result.token);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': result.token
        }
      });
    },
    error: function (xhr, status, error) {
    }
  });
}

function createBtns(id) {
  item = id
  return `
    <a title="editar" href="/admin/editar/${id}" data-id="${id}" class="edit btn btn-sm btn-icon btn-pure btn-default on-default">
      <i class="far fa-edit"></i>
    </a>
    <a title="excluir" class="delete btn btn-sm btn-icon btn-pure btn-default on-default">
      <i class="fas fa-trash"></i>
    </a>`;
}



