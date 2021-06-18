jQuery(document).ready(function($) {
  
  var janela = $(window),
      janelaWidth = $(window).width();


  ////////////////////////////////// canvas
  var btMenu = $('#menu-mob'),
      btMenuCliente = $('.menu-cliente'),
      btMenuAfiliada = $('.menu-afiliada'),
      tagMain = $('main'),
      tagCanvas = $('#canvas-bar'),
      tagCanvasCliente = $('#canvas-cliente'),
      tagCanvasAfiliada = $('#canvas-afiliada'),
      tagOverlay = $('.canvas-overlay');
  tagMain.prepend( "<div class='canvas-overlay'></div>" );


  // menu normal
  function escondeCanvas() {
    $('#canvas-bar, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('#canvas-bar, .canvas-overlay').removeClass('db');
    },330)
    tagMain.off('mousedown', escondeCanvas);
    tagCanvas.off('swipeleft', escondeCanvas);
    tagOverlay.removeClass('visivel');
    console.log('escondeu');
  }
  function mostraCanvas() {
    $('#canvas-bar, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('#canvas-bar, .canvas-overlay').addClass('visivel');
    },20)
    tagMain.on('mousedown', escondeCanvas);
    tagCanvas.on('swipeleft', escondeCanvas);
  }
  btMenu.on('click', function(){
   mostraCanvas();
   console.log('clicou menu bar');
  });


  // menu cliente
  function escondeCanvasCliente() {
    $('#canvas-cliente, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('#canvas-cliente, .canvas-overlay').removeClass('db');
    },330)
    tagMain.off('mousedown', escondeCanvasCliente);
    tagCanvasCliente.off('swipeleft', escondeCanvasCliente);
    tagOverlay.removeClass('visivel');
    console.log('escondeu');
  }  
  function mostraCanvasCliente() {
    $('#canvas-cliente, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('#canvas-cliente, .canvas-overlay').addClass('visivel');
    },20)
    tagMain.on('mousedown', escondeCanvasCliente);
    tagCanvasCliente.on('swipeleft', escondeCanvasCliente);
  }
  btMenuCliente.on('click', function(){
   mostraCanvasCliente();
   console.log('clicou menu cliente');
  });


  // menu afiliada
  function escondeCanvasAfiliada() {
    $('#canvas-afiliada, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('#canvas-afiliada, .canvas-overlay').removeClass('db');
    },330)
    tagMain.off('mousedown', escondeCanvasAfiliada);
    tagCanvasAfiliada.off('swipeleft', escondeCanvasAfiliada);
    tagOverlay.removeClass('visivel');
    console.log('escondeu');
  }  
  function mostraCanvasAfiliada() {
    $('#canvas-afiliada, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('#canvas-afiliada, .canvas-overlay').addClass('visivel');
    },20)
    tagMain.on('mousedown', escondeCanvasAfiliada);
    tagCanvasAfiliada.on('swipeleft', escondeCanvasAfiliada);
  }
  btMenuAfiliada.on('click', function(){
   mostraCanvasAfiliada();
   console.log('clicou menu afiliada');
  });




  ////////////////////////////////// abinhas = accordion
  var accordion = $('.aba');
  accordion.find('.aba-titulo').on('click', function(event) {
    var $thisArticle = $(this).siblings('.aba-conteudo');
    
    accordion.find('.aba-titulo').not($(this)).removeClass('ativo');
    $(this).toggleClass('ativo');

    accordion.find('.aba-conteudo').not($thisArticle).slideUp();
    $thisArticle.slideToggle();
  });


  //////////////////////////////////////// JUMP PARA QUALQUER LUGAR
  $(document).on('click', 'a.jump[href^="#"]', function (event) {
      event.preventDefault();

      $('html, body').animate({
          scrollTop: $($.attr(this, 'href')).offset().top
      }, 1000);
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
    $.fancybox.open(
      $(thisTarget),
      {
        beforeShow: function(instance,slide){
          $('html').addClass('noscroll');
          // console.log('abriu');
        },
        afterClose: function(instance,slide){
          $('html').removeClass('noscroll');
          // console.log('feshow');
        }
      }
    );
  });

  var abrirIMG = $('.afczoom');
  if (abrirIMG.length > 0) { abrirIMG.fancybox(); }



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

  if (afcwd_Whaaa.length > 0) {
    afcwd_BTWhaaa.on('click', function(event) {
      afcwd_Whaaa.toggleClass('afc_onclick');
    });
    afcwd_formWhaaa.keyup(function() {
      var value = $( this ).val();
      $( "a#afc_btwhats_box_form_mandar" ).attr( 'href', 'https://api.whatsapp.com/send?phone=5562996269941&text=' + value );
    }).keyup();

    $fraseON = 'Quer orçar o projeto dos seus sonhos? Está com dúvidas sobre um produto da loja? Fale comigo! ✨';
    $fraseOFF = 'Fale comigo que te respondo no próximo dia útil. Aproveite e conheça meu <a href="https://afcweb.design/loja/temas/aurora/">tema premium à venda</a>! ✨';

    if (afcwd_BRHour >= 14 && afcwd_BRHour < 17 && afcwd_BRDay > 0 && afcwd_BRDay < 6) {
        afcwd_StatusWhaaa.removeClass('off').removeClass('ocupada').addClass('on');
        afcwd_SaudacoesWhaaa.append('Oi, <strong>Ana</strong> <u>online</u> aqui! 👩‍💻');
      afcwd_ChamadaWhaaa.append($fraseON);
    }
    else if (afcwd_BRHour >= 8 && afcwd_BRHour < 14 && afcwd_BRDay > 0 && afcwd_BRDay < 6) {
        afcwd_StatusWhaaa.removeClass('off').removeClass('on').addClass('ocupada');
        afcwd_SaudacoesWhaaa.append('Oi, bom dia! <em>Já já estarei online!</em> ✌️');
      afcwd_ChamadaWhaaa.append($fraseON);
    }
    else if (afcwd_BRDay === 0 || afcwd_BRDay === 6) {
        afcwd_StatusWhaaa.removeClass('on').removeClass('ocupada').addClass('off');
        afcwd_SaudacoesWhaaa.append('Oi, aproveitando o <em>fim de semana</em>? 😎✨');
      afcwd_ChamadaWhaaa.append($fraseOFF);
    } 
    else {
        afcwd_StatusWhaaa.removeClass('on').removeClass('ocupada').addClass('off');
        afcwd_SaudacoesWhaaa.append('Oi, estou <u>offline</u> agora 🙈');
      afcwd_ChamadaWhaaa.append($fraseOFF);
    }    
  }
  


  //////////////////////////////////////// POP UP RECURSOS
  var popupTempo = $('#popupTempo'),
      popupScroll = $('#popupScroll'),
      popupSaida = $('#popupSaida');
  // var popupDelay = popupTempo.data('tempo');

  // se eh por tempo
  if (popupTempo.length > 0 && sessionStorage.getItem('popupTempoAbriu') !== 'true') {
    setTimeout(function(){
      $.fancybox.open(popupTempo, {
        afterClose: function(){
          sessionStorage.setItem('popupTempoAbriu','true');
        }
      });
    },8000);
  }

  // se eh por rolagem
  if (popupScroll.length > 0 && sessionStorage.getItem('popupScrollAbriu') !== 'true') {
    var popupScrollJaAbriu = false;

    janela.on("scroll", function () {
       if ($(this).scrollTop() > 2500 && popupScrollJaAbriu === false) {
          popupScrollJaAbriu = true;
          $.fancybox.open(popupScroll, {
            afterClose: function(){
              sessionStorage.setItem('popupScrollAbriu','true');
            }
          });
       } 
    });
  }

  // se eh na saida da janela
  if (popupSaida.length > 0 && sessionStorage.getItem('popupSaidaAbriu') !== 'true') {
    var popupSaidaJaAbriu = false;
    $(document).on('mouseleave', function(event) {
      if (!popupSaidaJaAbriu) {
        popupSaidaJaAbriu = true;
        $.fancybox.open(popupSaida, {
          afterClose: function(){
            sessionStorage.setItem('popupSaidaAbriu','true');
          }
        });
      }
    });
  }  


});