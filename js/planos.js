jQuery(document).ready(function($) {
	var $caixasPlanos = $(".plano");
	var $trocaCliente = $("#troca-cliente input");

	$caixasPlanos.each(function(index, el) {
		$(el).find(".valor-plano").attr('data-ja-cliente', $(el).find(".valor-plano").text());
		$(el).find(".btAssinarPlano").attr('data-ja-cliente', $(el).find(".btAssinarPlano").attr("href"));
	});

	$trocaCliente.on('change', function(event) {
		var $clienteSelecionado = $trocaCliente.filter(":checked");
		var attrNovo;
		if ($clienteSelecionado.is("#input-jacliente")) {
			attrNovo = "data-ja-cliente";
		}
		if ($clienteSelecionado.is("#input-novocliente")) {
			attrNovo = "data-novo-cliente";
		}
		$caixasPlanos.each(function(index, el) {
			$(el).find(".valor-plano").text($(el).find(".valor-plano").attr(attrNovo));
			$(el).find(".btAssinarPlano").attr("href", $(el).find(".btAssinarPlano").attr(attrNovo));
		});
	});
});