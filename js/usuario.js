/**
 * Created by carlos on 30/07/17.
 */


  $(document).ready(function () {
      preencherTabela();
  })

  function preencherTabela() {
      $('.tbody').find('tr').remove();
      $.ajax({
          url   : 'funcao/usuario.php',
          dataType: 'json',
          type : 'post',
          data : {
              acao : 'G'
          },
          success : function (data) {

              $.each( data.usuarios, function (i, j) {
                    $('.tbody').append(
                        "<tr>"
                            +"<td>"+ j.login +"</td>"
                            +"<td>"+ j.nome +"</td>"
                            +"<td>"+ j.nivel +"</td>"
                            +"<td>"+ j.ativo +"</td>"
                            +"<td> <a href='#alterar' class='btn btn-md'><i class='fa fa-edit'></i></a>" +
                        "<a href='#alterar' class='btn btn-md'><i class='fa fa-times'></i></a>"
                        +"</td>"
                        +"</tr>"
                    );
              } )

          }
      })  
  } 