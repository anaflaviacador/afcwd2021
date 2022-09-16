<?php
$cancela = '<p>* Você pode assinar quando quiser e cancelar quando desejar. Zero fidelidade!</p>';

echo '<section class="todos-planos sendy" id="assinar">';

    // ========================================//
    // INICIANTE
    // ========================================// 
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Iniciante</h3>';
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">12</span><span class="freq">,90 /mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-envelope"></i> 2mil envios</span></strong> <br>ideal para sites com pequena audiência e blogs com poucas publicações mensais.</p>';
        echo '</header>';
        echo '<ul>';
            echo '<li><strong>Cota mensal de 2mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Leads, listas, segmentações e automações <em>ilimitadas</em></li>';
            echo '<li>Templates inclusos: 1</li>';
            echo '<li>Opt-in comentários Wordpress <span data-tooltip="Seu visitante pode aproveitar e assinar uma lista ao enviar um comentário!" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="https://buy.stripe.com/dR601QfazgxwbxmcMQ" target="_blank" class="button azul">assinar!</a>'; 
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
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">39</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-envelope"></i> 10mil envios </span></strong><br>ideal para sites com público fiel e blogs com publicações semanais.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 10mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Leads, listas, segmentações e automações <em>ilimitadas</em></li>';
            echo '<li>Templates inclusos: 2</li>';
            echo '<li>Opt-in comentários Wordpress <span data-tooltip="Seu visitante pode aproveitar e assinar uma lista ao enviar um comentário!" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="https://buy.stripe.com/00g4i63rR1CCfNCdQV" target="_blank" class="button verde">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';


    // ========================================//
    // INFLUENCER
    // ========================================//
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Influencer</h3>';
            

            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">74</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-envelope"></i> 50mil envios</span></strong> <br>ideal para blogs com posts diários, microempresas e lojas de pequeno porte.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 50mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Leads, listas, segmentações e automações <em>ilimitadas</em></li>';
            echo '<li>Templates inclusos: 3</li>';
            echo '<li>Opt-in comentários Wordpress <span data-tooltip="Seu visitante pode aproveitar e assinar uma lista ao enviar um comentário!" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Integração com Woocommerce <span data-tooltip="Capture os emails de compradores e vincule produtos a listas específicas" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="https://buy.stripe.com/eVaeWK5zZ0yy6d228e" target="_blank" class="button">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';


    // ========================================//
    // BUSINESS
    // ========================================//
    echo '<div class="plano emailmkt">';
        echo '<header>';
            echo '<h3>Business</h3>';
            echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano">99</span><span class="freq">,90/mês*</span></data>';
            echo '<p><strong><span><i class="fas fa-envelope"></i> 100mil envios</span></strong> <br>ideal para sites e blogs com audiência engajada e lojas virtuais em ascensão.</p>';
        echo '</header>';
        echo '<ul>';

            echo '<li><strong>Cota mensal de 100mil envios</strong> <span data-tooltip="São todos os emails enviados pela sua conta no total, incluindo confirmações de cadastrados e automações" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Leads, listas, segmentações e automações <em>ilimitadas</em></li>';
            echo '<li>Templates inclusos: 4</li>';
            echo '<li>Opt-in comentários Wordpress <span data-tooltip="Seu visitante pode aproveitar e assinar uma lista ao enviar um comentário!" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Integração com Woocommerce <span data-tooltip="Capture os emails de compradores e vincule produtos a listas específicas" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
            echo '<li>Integração com Zapier <span data-tooltip="Com acesso a API, é possível vincular suas capturas com outros serviços" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

        echo '</ul>';
        echo '<footer id="basic">';
            echo $cancela;
            echo '<div class="botao">';
                echo '<a href="https://buy.stripe.com/8wM3e20fFgxwcBqdQX" target="_blank" class="button rosa">assinar!</a>'; 
            echo '</div>';
        echo '</footer>';
    echo '</div>';
echo '</section>';