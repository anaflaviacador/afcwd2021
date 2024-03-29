<?php
global $product;
$nomeproduto = get_field('nome_produto',$product->ID);
echo '<div class="afclp-recomendacoes">';
    echo '<header>';
        echo '<i class="icone fal fa-heart" aria-hidden="true"></i>';
        echo '<h3 class="marca-dagua">Serviços que amo e indico <span>queridinhos do studio</span></h3>';
        echo '<p>Escolhidos a dedo para você e o máximo desempenho do '.$nomeproduto.'.</p>';
    echo '</header>';

    echo '<div class="item-servico" data-aos="fade-right">';
        echo '<figure style="background: #2EC9D4">';
            echo '<svg style="padding-bottom:25px" title="Marca Nuvem Hospedagem" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 76 56"><path fill="#fff" d="M63.2 26a16.03 16.03 0 00-2.89-1.4 1.74 1.74 0 01-1.27-2.05 7.95 7.95 0 00-.57-4.7 7.9 7.9 0 00-10.34-3.99l-.06.04c-.14.09-.3.16-.45.22h-.05c-.23.08-.48.1-.74.08a1.9 1.9 0 01-1.04-.45c-.19-.23-.3-.35-.46-.6a27.13 27.13 0 00-1.86-2 20.98 20.98 0 00-14.51-5.8c-6.51 0-12.33 2.95-16.2 7.6a20.96 20.96 0 00-4.59 16.88l.1.43v.02c-.01.41-.22.78-.54 1a.73.73 0 01-.07.05h-.02l-.28.12A13.16 13.16 0 000 42.91v.01a12.96 12.96 0 0011.1 12.49l.15.01a6 6 0 001.12.11h.2a5.9 5.9 0 005.67-5.89v-7.1a3.09 3.09 0 01-2.26-5.62v-.01l5.27-4.28 5.44-4.41 2.44-1.98c.1-.1.23-.2.35-.3a3.06 3.06 0 013.91.31l1.31 1.08 1.74 1.43.08.06 4.18 3.42 5.52 4.54a2.53 2.53 0 01.58.39c.06.04.06.07.1.12l.05.05.03.03c.58.56.92 1.29.92 2.16a3.1 3.1 0 01-3.65 3.04 11.18 11.18 0 00-.04 3.5 11.1 11.1 0 0012.67 9.34h.03A15.95 15.95 0 0063.2 26"/><path fill="#050305" fill-opacity=".1" d="M63.2 26a15.93 15.93 0 00-2.89-1.4 1.74 1.74 0 01-1.27-2.05 7.89 7.89 0 00-11.42-8.43h-.05a1.85 1.85 0 01-1 .03 10.83 10.83 0 015.7 14.43 13.85 13.85 0 01-3.28 25.05 11.04 11.04 0 007.9 1.78h.03A15.95 15.95 0 0063.2 26"/><path fill="#fff" d="M75.37 40.8v-.4c0-8.17-4.66-15.26-11.47-18.75h-.01a13 13 0 00-.3-2.25A13.03 13.03 0 0050.92 9.08c-.37 0-.5-.04-1.03.03-.1.01-.37.11-.48.12-.51.24-1.12.51-1.58.82l-.4-.49c-.66-.8-1.38-1.56-2.15-2.26a21.6 21.6 0 00-22.12-5.07A21.02 21.02 0 0149.49 9c1.26-.46 2.92-.76 4.27-.76a10.54 10.54 0 0110.5 11.42 17.42 17.42 0 0111.1 21.14M45.08 39.58h-3.76v11.45a11.05 11.05 0 01-7.26 4.52v-7.48h-5.3v6.96a12.86 12.86 0 01-4.5-2.81l-.01-.02a.95.95 0 01-.08-.07.58.58 0 00-.37-.13H21.4v-5.36-7.06h-3.7L31.4 28.32l13.68 11.26z"/></svg>';

            echo '<figcaption><i class="far fa-tags"></i> AFC30</figcaption>';
        echo '</figure>';

        echo '<aside>';
            echo '<header>';
                echo '<div class="intro">Melhor Hospedagem + Domínio</div>';
                echo '<h3>Nuvem Hospedagem</h3>';
            echo '</header>';
            echo '<p>Hospedagem com servidores nacionais de altíssima qualidade, suporte incrível e 100% humanizado. Use o cupom do studio e ganhe 30% de desconto no 1º ciclo de assinatura (mensal, trimestral ou semestral).</p>';
        echo '</aside>';

        echo '<a class="link" href="https://cliente.nuvemhospedagem.com.br/aff.php?aff=20" target="_blank" rel="noopener" title="Acessar o site da Nuvem Hospedagem"></a>';
    echo '</div>';


    // echo '<div class="item-servico">';
    //     echo '<figure style="background: #2A7AE3">';
    //         echo '<svg title="Marca Focus NFe" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 60 52"><path fill="#fff" fill-rule="nonzero" d="M6.18 5.27c1.36 11.66 1.75 22.5-5.59 27.9h7.5c5.32-3.03 6.16-16.46 5.72-23.8-4.56-2.55-7.65-4.23-7.63-4.1zM13.23.22c.39 3.03.58 6.09.58 9.14 12.2 6.8 34.9 19.77 36.77 20.81 0 0-5 13.12-13.8 21.46h8.94c8.59-9.29 13.7-25.4 13.7-25.4-2.55-1.44-46.24-26.46-46.19-26z"/></svg>';
    //     echo '</figure>';

    //     echo '<aside>';
    //         echo '<header>';
    //             echo '<div class="intro">Notas fiscais no Woocommerce</div>';
    //             echo '<h3>Focus NFe</h3>';
    //         echo '</header>';
    //         echo '<p>Oferece planos acessíveis para qualquer tamanho de loja, principalmente para quem emite poucas notas fiscais ao mês. O suporte é bastante atencioso e auxilia na integração com a loja.</p>';
    //     echo '</aside>';

    //     echo '<a class="link" href="https://integracaonfe.com.br/" rel="noopener nofollow" target="_blank" title="Acessar o site da Focus NFe"></a>';
    // echo '</div>';


    // echo '<div class="item-servico" data-aos="fade-left">';
    //     echo '<figure style="background: #252AFF">';
    //         echo '<svg title="Marca Juno Pagamentos" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 96 28"><path fill="#fff" d="M.25 23.96v-.01a.32.32 0 01-.01-.45l3.6-3.7c.1-.11.26-.13.4-.05 1.6 1.05 2.9 1.58 3.91 1.58A5.86 5.86 0 0014 15.46l.02-13.35c0-.17.14-.32.31-.32h5.03c.18 0 .32.14.32.32l-.02 13.35c0 6.38-5.15 11.55-11.5 11.55a11.54 11.54 0 01-7.9-3.05zM36.77 10l-2.75-4.23a.32.32 0 01.09-.44L40.78.86c.48-.33 1.04-.5 1.62-.5a2.97 2.97 0 012.95 2.99l.05 12.47c0 6.35-5.03 11.46-11.23 11.46a11.36 11.36 0 01-11.26-11.45V2.1c0-.18.14-.32.32-.32l4.96.03c.17 0 .3.14.31.31l.02 13.71a5.7 5.7 0 005.65 5.74c3.1 0 5.62-2.56 5.62-5.71l-.03-7.47-2.55 1.7a.32.32 0 01-.44-.08zm11.3-8.04c0-.87.72-1.58 1.6-1.58.4 0 .79.15 1.08.43l1.93 1.83A11.04 11.04 0 0159.33.43c6.22 0 11.26 5.13 11.26 11.45v13.73c0 .18-.14.32-.31.32l-4.96-.02a.32.32 0 01-.32-.32l-.02-13.7a5.7 5.7 0 00-5.65-5.75 5.67 5.67 0 00-5.62 5.71l.04 7.31 2.54-1.71c.15-.1.35-.06.44.09l2.75 4.23c.1.15.05.34-.09.44l-6.67 4.48c-.48.32-1.04.5-1.62.5a3.05 3.05 0 01-3.03-3.01V1.98zM84.7.37c6.17 0 11.18 5.06 11.18 11.3v4.35c0 6.24-5 11.31-11.18 11.31A11.25 11.25 0 0173.5 16.02v-4.34C73.5 5.43 78.51.36 84.7.36zm0 5.65a5.63 5.63 0 00-5.6 5.66v4.34c0 3.12 2.5 5.65 5.6 5.65 3.08 0 5.59-2.53 5.59-5.65v-4.34c0-3.13-2.5-5.66-5.6-5.66"/></svg>';
    //     echo '</figure>';

    //     echo '<aside>';
    //         echo '<header>';
    //             echo '<div class="intro">Gateway de pagamento para Woocomerce</div>';
    //             echo '<h3>Juno Pagamentos</h3>';
    //         echo '</header>';
    //         echo '<p>É o gateway que studio usa para pagamentos nacionais. É o mais completo com as tarifas mais acessíveis do mercado! Venda por pix, boleto, cartão e até planos de assinatura em sua loja virtual.</p>';
    //     echo '</aside>';

    //     echo '<a class="link" href="https://app.juno.com.br/#/onboarding/775831:b02a84" rel="noopener nofollow" target="_blank" title="Criar conta na Juno"></a>';
    // echo '</div>';

    echo '<div class="item-servico" data-aos="fade-left">';
        echo '<figure style="background: #5b687e">';
            echo '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 51 53"><path fill="#343a44" d="M25.66.667C11.72 1.118.5 12.638.5 26.5c0 13.862 11.22 25.382 25.16 25.833C39.6 51.882 50.82 40.362 50.82 26.5 50.82 12.638 39.6 1.118 25.66.667Z"/><path fill="#fff" d="M25.66 1.599c13.358.54 24.051 11.608 24.051 24.894 0 13.286-10.693 24.354-24.05 24.894-13.358-.54-24.052-11.608-24.052-24.894 0-13.286 10.694-24.354 24.051-24.894Zm0 2.645c12.293 0 22.408 10.053 22.408 22.27 0 12.216-10.115 22.27-22.408 22.27-12.292 0-22.408-10.054-22.408-22.27 0-12.217 10.116-22.27 22.408-22.27Z"/><path fill="url(#a)" d="M37.195 88.63h8.12l13.738 14.406H23.457L37.195 88.63ZM22.703 76.947 34.386 88.63l-11.683 11.665V76.947Zm37.103 0L48.124 88.63l11.682 11.665V76.947Z" transform="matrix(.805 0 0 .80003 -7.55 -45.503)"/><defs><linearGradient id="a" x1="0" x2="1" y1="0" y2="0" gradientTransform="matrix(0 26.0886 -18.3439 0 41.255 76.947)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#d9d9d9"/></linearGradient></defs></svg>';
        echo '</figure>';

        echo '<aside>';
            echo '<header>';
                echo '<div class="intro">Email marketing acessível</div>';
                echo '<h3>Sendy Email Marketing</h3>';
            echo '</header>';
            echo '<p>Integre com seu site, blog ou loja virtual nosso serviço de newsletter com sequencias, segmentações, listas e quantidade ilimitada de contatos a partir de R$9,90 ao mês.</p>';
        echo '</aside>';

        echo '<a class="link" href="https://afcweb.design/servicos/email-marketing" rel="noopener nofollow" target="_blank" title="Conhecer planos e benefícios"></a>';
    echo '</div>';
echo '</div>';