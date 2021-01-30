jQuery(document).ready(function($) {
	labelAffiliado = $("div.woocommerce-additional-fields > label");

	if (labelAffiliado.length > 0) {
		labelAffiliado.replaceWith( "<label for=\"woocommerce-affiliate\">Quem indicou esse produto?<br><small>Insira corretamente o username ou ID fornecido pela afiliada.</small></label>" );
	}

});