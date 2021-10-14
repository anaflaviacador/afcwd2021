<?php
$cancela = '<p>* Você pode assinar quando quiser e cancelar quando desejar. Zero fidelidade!</p>';

echo '<section class="todos-planos sendy" id="assinar">';

    // ========================================//
    // INICIANTE
    // ========================================// 
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Iniciante</h3>';
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">9</span><span class="freq">,90 /mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites com baixa audiência, blogs pessoais e iniciantes em email marketing.</p>';
        echo '</header>';
        echo '<ul>';
            echo '<li><strong>Cota mensal de 2mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Templates inclusos: 1</li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="'.$url.'?add-to-cart=5827" class="button azul">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';


    // ========================================//
    // ENTUSIASTA
    // ========================================// 
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Entusiasta</h3>';
            echo '<label>+ pedido</label>';
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">32</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites e blogs que já têm público fiel e quer aumentar sua conexão.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 10mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Templates inclusos: 2</li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="'.$url.'?add-to-cart=5828" class="button verde">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';


    // ========================================//
    // INFLUENCER
    // ========================================//
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Influencer</h3>';
            

            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">59</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites que produzem conteúdos frequentes, microempresas e lojas de pequeno porte.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 50mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Templates inclusos: 3</li>';
            echo '<li>Integração com Woocommerce <span data-tooltip="Capture os emails de compradores e vincule produtos a listas específicas" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="'.$url.'?add-to-cart=5829" class="button">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';


    // ========================================//
    // BUSINESS
    // ========================================//
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Business</h3>';
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">84</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites com audiência engajada e lojas virtuais em ascensão.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 100mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Templates inclusos: 4</li>';
            echo '<li>Integração com Woocommerce <span data-tooltip="Capture os emails de compradores e vincule produtos a listas específicas" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Integração com Zapier <span data-tooltip="Com acesso a API, é possível vincular suas capturas com outros serviços" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="'.$url.'?add-to-cart=5830" class="button rosa">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';
echo '</section>';