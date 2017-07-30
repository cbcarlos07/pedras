/**
 * Created by carlos.bruno on 26/07/2017.
 */

$('#senha').keypress(function (e) {
    /*
     * verifica se o evento é Keycode (para IE e outros browsers)
     * se não for pega o evento Which (Firefox)
     */
    var tecla = (e.keyCode?e.keyCode:e.which);
    /* verifica se a tecla pressionada foi o ENTER */
    if( tecla == 13 ){
        $('.btn-logar').click();
    }
});

$('#login').keypress(function (e) {
    /*
     * verifica se o evento é Keycode (para IE e outros browsers)
     * se não for pega o evento Which (Firefox)
     */
    var tecla = (e.keyCode?e.keyCode:e.which);
    /* verifica se a tecla pressionada foi o ENTER */
    if( tecla == 13 ){
        var flogin  =  $('#login');
        var fsenha  =  $('#senha');
        var login = flogin.val();
        var senha =  fsenha.val();

        if( (login != "") && ( senha != "" )){
            $('.btn-logar').click();
        }else{
            if( login == "" ){
                arteCampo( "login", "red" );
            }

            if( login != "" ){
                arteCampo( "login", "" );
                fsenha.focus();
            }


        }


    }
});


$('.btn-logar').on('click', function () {

    if( verificaCampos() ){
        var login =  $('#login').val();
        var senha =  $('#senha').val();
        var check =  document.getElementById('lembrar');
        var lembrar = "N";
        if( check.checked )
            lembrar = "S";

        console.log("Checkbox: "+lembrar);


        $.ajax({
            url   : 'funcao/usuario.php',
            dataType: 'json',
            type: 'post',
            beforeSend : carregando,
            data : {
                acao : 'L',
                login : login,
                senha : senha,
                lembrar : lembrar

            },
            success : function ( data ) {
                if( data.sucesso == 1 ){
                    sucesso('');
                }else if( data.sucesso == 0 ){
                    errosendlogin();
                }else if (data.sucesso == -1){
                    errosend();
                }
            }
        });
    }





});

function carregando(){
    var mensagem = $('.alerta-login');
    //alert('Carregando: '+mensagem);
    mensagem.empty().html('<p class="alert alert-warning"><img src="image/loading.gif" alt="Carregando..."> Verificando dados!</p>').fadeIn("fast");


}

    function errosendlogin(){
        var mensagem = $('.alerta-login');
        mensagem.empty().html('<p class="alert alert-danger"><strong>Restri&ccedil;&atilde;o!</strong> Voc&ecirc; n&atilde;o t&ecirc;m permiss&atilde;o para acessar este m&oacute;dulo</p>').fadeIn("fast");
    }
    function sucesso(msg){
        var mensagem = $('.alerta-login');
        mensagem.empty().html('<p class="alert alert-success"><strong>OK.</strong> Estamos redirecionando </p>').fadeIn("fast");
        var url = 'principal.php';
        var form = $('<form action="' + url + '" method="post">' +

            '</form>');
        $('body').append(form);
        form.submit();
        //   location.href = "usuario?acao=S";

        //window.setTimeout()
        //delay(2000);
    }

    function errosend(){
        var mensagem = $('.alerta-login');
        mensagem.empty().html('<p class="alert alert-danger"><strong>Opa!</strong> Por favor, verifique seu login e/ou sua senha</p>').fadeIn("fast");
    }

  function verificaCampos() {
      var login =  $('#login').val();
      var senha =  $('#senha').val();
      if( (login != "") && ( senha != "" )){
          arteCampo( "login", "" );
          arteCampo( "senha", "" );
          return true;
      }else{
          if( login == "" ){
              arteCampo( "login", "red" );
          }

          if( senha == "" ){
              arteCampo( "senha", "red" );
          }
          return false;
      }

  }

  function arteCampo( id, cor ) {
      $('input[id="'+ id +'"]').css( 'border-color',cor );
  }