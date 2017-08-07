/**
 * Created by carlos on 30/07/17.
 */

  var permiteSalvar = false;


  $(document).ready(function () {
      preencherTabela();
      comboNivel();
  });

  $('.btn-salvar').on('click', function () {
      salvarOperacao();
  });

  function salvarOperacao() {
      if( permiteSalvar ){
          salvarUsuario();
      }
  }


  function salvarUsuario (  ) {
       var login = $('#login').val();
       var nome  = $('#nome').val();
       var senha = $('#senha').val();
       var nivel = $('#nivel').val();
       var ativo = $('#ativo').val();

       $.ajax({
            url  : 'funcao/usuario.php',
            type : 'post',
            dataType: 'json',
            data : {
                acao  : 'I',
                login : login,
                nome  : nome,
                senha : senha,
                nivel : nivel,
                ativo : ativo 
            },
           success : function (data) {

                if( data.retorno == 1 ){
                    mensagemSucesso( 'Opera&ccedil;&atilde;o realizada com sucesso' );
                    /*$('.modal-title').html('Parab&eacute;ns');
                    $('p.msg-body').html('Opera&ccedil;&atilde;o realizada com sucesso');
                    $('.modal-alert').modal('show');*/

                }else{
                    /*$('.modal-title').html('<strong>Ops</strong>');
                    $('p.msg-body').html('Falha na opera&ccedil;&atilde;o');
                    $('.modal-alert').modal('show');*/
                }

           }
       });
  }

  $('.btn-novo').on('click', function () {
      var form = $( '<form action="usuariocad.php" method="post">' +
                     '</form>' );
      $('body').append(form);
      form.submit();
  });

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
                   var ativo = "";
                   if( j.ativo == 'S' ){
                       ativo = "<i class='fa fa-check' aria-hidden='true'></i>";
                   }
                    $('.tbody').append(

                        "<tr>"
                            +"<td>"+ j.login +"</td>"
                            +"<td>"+ j.nome +"</td>"
                            +"<td>"+ j.nivel +"</td>"
                            +"<td>"+ ativo +"</td>"
                            +"<td> <a href='#alterar' class='btn btn-md'><i class='fa fa-edit'></i></a>" +
                        "<a href='#alterar' class='btn btn-md'><i class='fa fa-times'></i></a>"
                        +"</td>"
                        +"</tr>"
                    );
              } )

          }
      })  
  }

  function comboNivel(  ) {

      $.ajax({
          url : 'funcao/nivel.php',
          dataType: 'json',
          type: 'post',
          data :{
              acao : 'L'
          },
          success : function (data) {
              $('#nivel').find('option').remove();
              $.each( data.niveis, function (i, j) {
                  console.log("Nivel: "+j.descricao);
                  $('#nivel').append(
                      $('<option>', {
                          value : j.codigo,
                          text  : j.descricao
                      })
                  );
              } )
          }
      });
  }



    function validarCampos(){

        var login = $('#login').val();
        var nome  = $('#nome').val();
        var senha = $('#senha').val();

        if( (login != "") && ( nome != "" ) && ( senha != "" )  ){
            corCampo( "input", "login", "" );
            corCampo( "input", "nome", "" );
            corCampo( "input", "senha", "" );
            return true;
        }else{
            corCampo( "input", "login", "red" );
            corCampo( "input", "nome", "red" );
            corCampo( "input", "senha", "red" );
            return false;
        }

    }



function verificarCampos(){

    var login = $('#login').val();
    var nome  = $('#nome').val();
    var senha = $('#senha').val();
    var resenha = $('#resenha').val();

    if( (login != "") && ( nome != "" ) && ( senha != "" ) && ( resenha != "" ) && ( senha == resenha ) ){
        $('.btn-salvar').removeClass( 'btn-danger' );
        $('.btn-salvar').addClass( 'btn-primary' );
        permiteSalvar = true;
        return true;
    }else{
        $('.btn-salvar').removeClass( 'btn-primary' );
        $('.btn-salvar').addClass( 'btn-danger' );
        return false;
    }

}

    function corCampo( tipo, id, cor ) {

        $(tipo+'[id="'+id+'"]').css( "border-color", cor);

    }

    $('#login').on('blur', function () {
       verificarCampos();
       verificarLogin();
    });

    $('#nome').on('blur', function () {
        verificarCampos();
    });

    $('#senha').on('blur', function () {
        var campo = $(this).val();
        var tamanho = campo.length;
        //console.log( "Tamanho: "+tamanho );
        if( tamanho > 7 ){
            verificarCampos();
            $('span.aviso').html( '' );
        }else{
            $('span.aviso').html( '*A senha tem que ser maior ou igual a 8 d&iacute;gitos' );
            $(this).focus();
            permiteSalvar = false;
        }

    });

    $('#senha').on('keyup', function () {
        var campo = $(this).val();
        var tamanho = campo.length;
        verificarCampos();

        if( tamanho > 7 ){
            if( $('#resenha').val() != "" ){
                verificarSenha();
            }

            $('span.aviso').html( '' );
        }else{
            $('.btn-salvar').removeClass('btn-primary');
            $('.btn-salvar').addClass('btn-danger');
            permiteSalvar = false;
        }
    });




    $('#resenha').on('blur', function () {
        verificarCampos();
       if( $('#senha').val() != "" ){
           verificarSenha();
       } else{
           $('#senha').focus();
           permiteSalvar = false;
       }
    });

    $('#resenha').on('keyup', function () {
        verificarCampos();
        if( $('#senha').val() != "" ){
            verificarSenha();
        }
    });

   $('.btn-refresh').on('click', function () {
       comboNivel();
   });
    
    function verificarSenha() {
        var senha = $('#senha').val();
        var resenha = $('#resenha').val();
        if( senha == resenha ){
            corCampo( "input", "senha", "" );
            corCampo( "input", "resenha", "" );
            $('span.aviso1').html( "" );
            return true;
        }else{
            corCampo( "input", "senha", "red" );
            corCampo( "input", "resenha", "red" );
            $('span.aviso1').html( '*As senhas n&atilde;o s&atildeo iguais' );
            return false;
        }
    }

    function verificarLogin(  ) {
        var login = $('#login').val();
        console.log('Login: '+login);
        $.ajax({
            url : 'funcao/usuario.php',
            type: 'post',
            dataType : 'json',
            data : {
                acao : 'V',
                login : login
            },
            success : function (data) {
                if( data.retorno == 0 ){
                    $('span.avisologin').html( "Login j&aacute; est&aacute; em uso" );
                    $('.btn-salvar').removeClass( 'btn-primary' );
                    $('.btn-salvar').addClass( 'btn-danger' );
                    $('#login').focus();
                }else{
                    $('span.avisologin').html( "" );
                    verificarCampos();
                }
            }
        });
    }

  function mensagemSucesso( msg ) {
      var mensagem = $('.alerta');
      mensagem.empty().html('<p class="alert alert-success">' +

            '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> '+
          msg+
          '</p>').fadeIn('fast');
      mensagem.animate({"top": "100px"},"slow");
      setTimeout(function () {

          mensagem.animate({"top": "60px"},"slow");
          mensagem.fadeOut();
      },3000);
  }