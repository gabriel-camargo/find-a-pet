/////////////////////////////////////////////////////
//////////////// EFEITOS DA SIDEBAR ////////////////
/////////////////////////////////////////////////////

// Hide submenus
$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
  SidebarCollapse();
});

function SidebarCollapse () {
  $('.menu-collapsed').toggleClass('d-none');
  $('.sidebar-submenu').toggleClass('d-none');
  $('.submenu-icon').toggleClass('d-none');
  $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

  // Treating d-flex/d-none on separators with title
  var SeparatorTitle = $('.sidebar-separator-title');
  if ( SeparatorTitle.hasClass('d-flex') ) {
      SeparatorTitle.removeClass('d-flex');
  } else {
      SeparatorTitle.addClass('d-flex');
  }

  // Collapse/Expand icon
  $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

///////////////////////////////////////////////////////////////////////////
//////////////// CHECKBOX MARCAR TODOS OS OUTROS CHECKBOX ////////////////
///////////////////////////////////////////////////////////////////////////

var checkTodosCachorro = $("#check-todos-cachorro");
checkTodosCachorro.click(function () {
  if ( $(this).is(':checked') ){
    $('.check-cachorro').prop("checked", true);
  }else{
    $('.check-cachorro').prop("checked", false);
  }
});

var checkTodosGato = $("#check-todos-gato");
checkTodosGato.click(function () {
  if ( $(this).is(':checked') ){
    $('.check-gato').prop("checked", true);
  }else{
    $('.check-gato').prop("checked", false);
  }
});

//////////////////////////////////////////////////////
//////////////// FILTRO DE PESQUISAS /////////////////
//////////////////////////////////////////////////////
$("input:checkbox").click(function () {

  var raca = ['Pastor-alemão', 'Dalmata', 'Vira-lata', 'Persa', 'Siamês', 'Sphynx'];
  var sexo = ['M', 'F'];
  var status = ['perdido', 'adocao'];
  var faixa = ['Filhote', 'Comum', 'Velho'];

  //SE NENHUM CHECKBOX FOR MARCADO, A LISTA PERMANECE COM TODOS OS ELEMENTOS
  //SE ALGUM CHECKBOX FOR MARCADO, A LISTA FICA APENAS COM OS VALORES DOS CHECKBOX MARCADOS
  if ($('.check-cachorro:checked').length > 0){
    raca=[];
    $('.check-cachorro:checked').each(function() {
      raca[raca.length] = $(this).val();
    });
  }

  if ($('.check-gato:checked').length > 0){
    raca =[];
    $('.check-gato:checked').each(function() {
      raca[raca.length] = $(this).val();
    });
  }

  if ($('.check-sexo:checked').length > 0){
    sexo =[];
    $('.check-sexo:checked').each(function() {
      sexo[sexo.length] = $(this).val();
    });
  }

  if ($('.check-faixa:checked').length > 0){
    faixa =[];
    $('.check-faixa:checked').each(function() {
      faixa[faixa.length] = $(this).val();
    });
  }

  if ($('.check-status:checked').length > 0){
    status =[];
    $('.check-status:checked').each(function() {
      status[status.length] = $(this).val();
    });
  }

  //ESCONDE TODAS AS TABELAS(PUBLICAÇÕES)
  $('table').hide();

  //MOSTRA AS TABELAS QUE CONTEREM AS INFORMAÇÕES DAS LISTAS ACIMA
  //OU SEJA, APENAS OS QUE TIVEREM SEUS CHECKBOX MARCADOS
  //OU, CASO NENHUM SEJA MARCADO, MOSTRAR TODOS OS VALORES
  $('table').each(function(i){
      var tr_raca   = $(this).find('tr td.publicacao-raca').text();
      var tr_faixa    = $(this).find('tr td.publicacao-faixa').text();
      var tr_sexo = $(this).find('tr td.publicacao-sexo').text();
      var tr_status    = $(this).find('tr td.publicacao-status').text();
      if ((raca.indexOf(tr_raca) >= 0) &&
          (faixa.indexOf(tr_faixa) >= 0) &&
          (sexo.indexOf(tr_sexo) >= 0)&&
          (status.indexOf(tr_status) >= 0) ){
            $(this).show();
          }
  });
});
