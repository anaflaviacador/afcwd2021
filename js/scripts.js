jQuery(document).ready(function($) {
  ////////////////////////////////// canvas
  $( "main" ).prepend( "<div class='canvas-overlay'></div>" );

  function escondeCanvas() {
    $('.canvas, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').removeClass('db');
    },330)
    $('main').off('mousedown', escondeCanvas);
    $('.canvas').off('swipeleft', escondeCanvas);
    $('.canvas-overlay').removeClass('visivel');
    console.log('escondeu');
    
  }

  function mostraCanvas() {
    $('.canvas, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').addClass('visivel');
    },20)
    $('main').on('mousedown', escondeCanvas);
    $('.canvas').on('swipeleft', escondeCanvas);
  }

  function escondeCanvasCliente() {
    $('.canvascliente, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('.canvascliente, .canvas-overlay').removeClass('db');
    },330)
    $('main').off('mousedown', escondeCanvasCliente);
    $('.canvascliente').off('swipeleft', escondeCanvasCliente);
    $('.canvas-overlay').removeClass('visivel');
    console.log('escondeu');
    
  }

  function mostraCanvasCliente() {
    $('.canvascliente, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('.canvascliente, .canvas-overlay').addClass('visivel');
    },20)
    $('main').on('mousedown', escondeCanvasCliente);
    $('.canvascliente').on('swipeleft', escondeCanvasCliente);
  }


  $('.btmenucanvas').on('click', function(){
    mostraCanvas();
  });

  $('li.area-cliente-mob > a').on('click', function(){
    mostraCanvasCliente();
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
  var BRDate = new Date(new Date().toLocaleString("en-US", {timeZone: "America/Sao_Paulo"}));
  var BRHour = BRDate.getHours();
  var BRDay = BRDate.getDay();
  var btWhats = $('#btwhats');
  var btWhatsMSG = $('#btwhats > span');

  if (BRHour >= 14 && BRHour < 17 && BRDay > 0 && BRDay < 6) {
      btWhatsMSG.text('Oi, estou online agora! :)');
  } else {
      btWhatsMSG.text('Oi, atendo das 14h às 17h!');
  }
  if (BRDay === 0 || BRDay === 6) {
      btWhats.css('display','none');
  }

});