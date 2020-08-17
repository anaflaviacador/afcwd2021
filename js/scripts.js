jQuery(document).ready(function($) {
  ////////////////////////////////// canvas
  var btMenu = $('#menu-mob'),
      tagMain = $('main'),
      tagCanvas = $('.canvas'),
      tagOverlay = $('.canvas-overlay');
  tagMain.prepend( "<div class='canvas-overlay'></div>" );

  // menu normal
  function escondeCanvas() {
    $('.canvas, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').removeClass('db');
    },330)
    tagMain.off('mousedown', escondeCanvas);
    tagCanvas.off('swipeleft', escondeCanvas);
    tagOverlay.removeClass('visivel');
    console.log('escondeu');
  }

  function mostraCanvas() {
    $('.canvas, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').addClass('visivel');
    },20)
    tagMain.on('mousedown', escondeCanvas);
    tagCanvas.on('swipeleft', escondeCanvas);
  }
  btMenu.on('click', function(){
   mostraCanvas();
   console.log('clicou menu');
  }); 

  ////////////////////////////////// abinhas = accordion
  $('.aba').find('.aba-titulo').click(function(){
      $(this).next().slideToggle('fast');
      $(".aba-conteudo").not($(this).next()).slideUp('fast');
  });  


  ////////////////////////////////// Cookies: local storage
  var msgCookie = $('.mensagem-top');
  if (msgCookie.length > 0) {
    var revelarMsgCookie = function(){
      msgCookie.removeClass('hidden');
      setTimeout(function(){
        msgCookie.removeClass('esconde');    
      }, 20);
      console.log('revelou');   
    }

    if (typeof(Storage)) {
        console.log('o navegador tem sessionStorage');
        if (!sessionStorage.jaLeuMsgCookies) {
          console.log('nao existe o item no local');
          revelarMsgCookie();
        }
    } else {
        console.log('o navegador NÃO tem sessionStorage');
        revelarMsgCookie();
    }

    msgCookie.find('.fecha-msg').on('click', function(){
      var paimsg = $(this).closest('.mensagem-top');
      paimsg.addClass('esconde');
      setTimeout(function(){
        paimsg.addClass('hidden');
      }, 1000);
      if (typeof(Storage) !== "undefined") {
        sessionStorage.setItem('jaLeuMsgCookies', 'true');
      }
    });
  }  


  ////////////////////////////////// fancybox
  var abrirFancybox = $('.abre-modal');
  abrirFancybox.on('click', function(event) {
    var thisTarget = $(this).data('target');
    event.preventDefault();
    $.fancybox.open($(thisTarget));
  });


  ///////////////////////////////////////// TIME ZONE - MOSTRA WHATS
  var afcwd_BRDate = new Date(new Date().toLocaleString("en-US", {timeZone: "America/Sao_Paulo"}));
  var afcwd_BRHour = afcwd_BRDate.getHours();
  var afcwd_BRDay = afcwd_BRDate.getDay();
  var afcwd_Whaaa = $('#afc_btwhats');
  var afcwd_BTWhaaa = $('#afc_btwhats > button');
  var afcwd_StatusWhaaa = $('#afc_btwhats_status');
  var afcwd_formWhaaa = $('input#afc_btwhats_box_form_escrever');
  var afcwd_SaudacoesWhaaa = $('#afc_btwhats_box_saudacoes');
  var afcwd_ChamadaWhaaa = $('#afc_btwhats_box_chamada');

  afcwd_BTWhaaa.on('click', function(event) {
    afcwd_Whaaa.toggleClass('afc_onclick');
  });
  afcwd_formWhaaa.keyup(function() {
    var value = $( this ).val();
    $( "a#afc_btwhats_box_form_mandar" ).attr( 'href', 'https://api.whatsapp.com/send?phone=5562996269941&text=' + value );
  }).keyup();

  if (afcwd_BRHour >= 14 && afcwd_BRHour < 17 && afcwd_BRDay > 0 && afcwd_BRDay < 6) {
      afcwd_StatusWhaaa.removeClass('off').removeClass('ocupada').addClass('on');
      afcwd_SaudacoesWhaaa.append('Oi, <strong>Ana</strong> <u>online</u> aqui! 👩‍💻');
      afcwd_ChamadaWhaaa.append('Está pronta para tirar do papel o projeto dos seus sonhos? 🥳');
  }
  else if (afcwd_BRHour >= 8 && afcwd_BRHour < 14 && afcwd_BRDay > 0 && afcwd_BRDay < 6) {
      afcwd_StatusWhaaa.removeClass('off').removeClass('on').addClass('ocupada');
      afcwd_SaudacoesWhaaa.append('Oi, bom dia! <em>Já já estarei de volta!</em> ✌️');
      afcwd_ChamadaWhaaa.append('E você? Está pronta para tirar do papel o projeto dos seus sonhos? 🎉 Fale comigo, em breve te retorno!');
  }
  else if (afcwd_BRDay === 0 || afcwd_BRDay === 6) {
      afcwd_StatusWhaaa.removeClass('on').removeClass('ocupada').addClass('off');
      afcwd_SaudacoesWhaaa.append('Oi, aproveitando o <em>fim de semana</em>? 😎✨');
      afcwd_ChamadaWhaaa.append('Deixe seu recado que na segunda te respondo. Você também pode entrar em  <a href="/contato">contato por email</a>. 💌');
  } 
  else {
      afcwd_StatusWhaaa.removeClass('on').removeClass('ocupada').addClass('off');
      afcwd_SaudacoesWhaaa.append('Oi, estou <u>offline</u> agora 🙈');
      afcwd_ChamadaWhaaa.append('Deixe seu recado que te retornarei em breve, ou entre em <a href="/contato">contato por email</a>. 💌');
  }

});