jQuery(document).ready(function($) {
  ////////////////////////////////// MASONRY - DEPOIMENTOS
  var depoimentos = $('#depoimentos-incriveis > .container');
  if (depoimentos.length > 0) {
    var masonryArgs = {
      itemSelector: '.depoimento',
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer',
      percentPosition: true
    };
    depoimentos.each(function(index, el) {
      var $thisMasonry = $(el);
      $thisMasonry.masonry(masonryArgs);
      $thisMasonry.find('img').each(function(index, el) {
        $(el).on('load', function(event) {
          console.log('imagem de cliente carregou');
          $thisMasonry.masonry('layout');
        });
      });
    });
  }
});