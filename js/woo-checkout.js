jQuery(document).ready(function($) {
	labelAffiliado = $("div.woocommerce-additional-fields > label");

	if (labelAffiliado.length > 0) {
		labelAffiliado.replaceWith("<label for=\"woocommerce-affiliate\">Programa de afiliadas: <em>quem indicou esse produto?</em><br><small style=\"font-size: 12px; width: 100%; line-height: 1.5;\"><span style=\"color:var(--cor-negacao)\">Atenção:</span> Insira corretamente o <u>username</u> ou <u>ID</u> fornecido diretamente pela afiliada. Caso não saiba, deixe em branco e/ou confirme com a afiliada que indicou os produtos do studio para ti.</small></label>" );
	}

});