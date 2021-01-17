jQuery(document).ready(function($) {
  
  var janela = $(window),
      janelaWidth = $(window).width();

  if (janelaWidth >= 810) {

      var tagArtigo = $("article.post-blog");
      var colIndice = $("aside.colmenor");
      var wrapArtigo = $("section.area-artigo");
      var tagIndice = $("#indice-post");


      var $indice = $("#indice-post > .wrap > ul");
      var nomeHeadings = ["h2","h3","h4","h5"];
      var $headingsPost = tagArtigo.children(nomeHeadings.join(", "));
      var contagemHeadings = {};
      for (var i = 0; i < nomeHeadings.length; i++) {
        contagemHeadings[nomeHeadings[i]] = 0;
      }
      var $templateItemIndice = $("<li><a class=\"jump\" href=\"\"><strong></strong></a></li>");

      $headingsPost.each(function(index, el) {
        var thisTagName = $(el).prop("tagName").toLowerCase();
        var thisID = $(el).attr("id");
        var thisTexto = $(el).text();
        var thisHierarquia = nomeHeadings.indexOf(thisTagName);
        contagemHeadings[thisTagName]++;
        var thisNumero = String(contagemHeadings[thisTagName]);

        for (var i = thisHierarquia + 1; i < nomeHeadings.length; i++) {
          contagemHeadings[nomeHeadings[i]] = 0;
        }
        for (var i = thisHierarquia-1; i >= 0; i--) {
          thisNumero = contagemHeadings[nomeHeadings[i]] +"."+thisNumero;
        }

        var $cloneItemIndice = $templateItemIndice.clone();
        $cloneItemIndice
          .find("a")
          .attr("href","#"+(thisID ? thisID : ""))
          .find("strong")
          .text(thisNumero)
          .end().append(thisTexto);

        $indice.append($cloneItemIndice);
      }); 


      
      
      var posicoesRedesFixas = {}

      var attPosicoes = function(){
        posicoesRedesFixas = {
          comeco: 
            wrapArtigo.offset().top - 30,
          fim: 
            wrapArtigo.offset().top
             + wrapArtigo.height()
             - colIndice.height() 
        }
        // console.log(posicoesRedesFixas);
      }

      attPosicoes();

      var timerAttPosicoes = setInterval(attPosicoes, 3000);

      var timeOutAttPosicoes = setTimeout(function(){}, 0);

      janela.on('resize', function(event) {
        clearTimeout(timeOutAttPosicoes);
        timeOutAttPosicoes = setTimeout(attPosicoes, 200);
      });


      janela.on('scroll', function(event) {
        var scrollNovo = janela.scrollTop();
        if (scrollNovo >= posicoesRedesFixas.fim) {
          colIndice.addClass('pos-fixado').removeClass('fixo');
          wrapArtigo.removeClass('aorolar');
        }
        else if(scrollNovo >= posicoesRedesFixas.comeco){
          colIndice.addClass('fixo').removeClass('pos-fixado');
          wrapArtigo.addClass('aorolar');
        }
        else{
          colIndice.removeClass('pos-fixado fixo');
          wrapArtigo.removeClass('aorolar');
        }
      })
  }

});  