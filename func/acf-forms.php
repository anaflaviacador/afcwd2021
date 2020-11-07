<?php

// ========================================//
// FUNCOES
// ========================================//

function afc_forms_atributos_btn( $attributes, $form, $args ) {
    $attributes['class'] .= ' button grafite pequeno envioform';
    return $attributes;
}
add_filter( 'af/form/button_attributes', 'afc_forms_atributos_btn', 10, 3 );

// contato
function afc_forms_contato_args( $args, $form ) {  
    $args['submit_text'] = 'Enviar';
    return $args;
}
add_filter( 'af/form/args/key=form_5efb867474157', 'afc_forms_contato_args', 10, 2 );


// briefing
function afc_forms_briefing_args( $args, $form ) {  
    $args['submit_text'] = 'Enviar briefing';
    return $args;
}
add_filter( 'af/form/args/key=form_5cc98ff56cee8', 'afc_forms_briefing_args', 10, 2 );

function afc_forms_briefing_nav( $attributes, $field ) {
    $attributes['class'] .= ' button pequeno';
    return $attributes;
}
add_filter( 'af/form/next_button_atts', 'afc_forms_briefing_nav', 10, 2 );
add_filter( 'af/form/previous_button_atts', 'afc_forms_briefing_nav', 10, 2 );




// ========================================//
// DEPOIMENTOS
// ========================================//
function afc_forms_depo_args( $args, $form ) {  
    $args['submit_text'] = 'Enviar depoimento';
    return $args;
}
add_filter( 'af/form/args/key=form_5f91e6e6224e4', 'afc_forms_depo_args', 10, 2 );

function afc_forms_depo_headers( $headers, $email, $form, $fields ) {
  $clienteMail = af_get_field('depo_email');
  $headers[] = 'Reply-To: ' . $clienteMail;
  return $headers;
}
add_filter( 'af/form/email/headers/key=form_5f91e6e6224e4', 'afc_forms_depo_headers', 10, 4 );

function afc_forms_depo_remove_enqueues() {
  // Stylized select (including user and post fields)
  wp_dequeue_script( 'select2' );
  wp_dequeue_style( 'select2' );

  // Date picker
  wp_dequeue_script( 'jquery-ui-datepicker' );
  wp_dequeue_style( 'acf-datepicker' );

  // Date and time picker
  wp_dequeue_script( 'acf-timepicker' );
  wp_dequeue_style( 'acf-timepicker' );

  // Color picker
  wp_dequeue_script( 'wp-color-picker' );
  wp_dequeue_style( 'wp-color-picker' );
}
add_action( 'af/form/enqueue/key=form_5f91e6e6224e4', 'afc_forms_depo_remove_enqueues' );

function afc_forms_depo_foto( $post ) {
  $foto = af_get_field( 'depo_foto' );
  set_post_thumbnail( $post->ID, $foto ); // adicionar img destacada
}
add_action( 'af/form/editing/post_created/key=form_5f91e6e6224e4', 'afc_forms_depo_foto', 10, 1 );



// ========================================//
// CONFIG - FORM
// ========================================//
function register_forms() {

  ////////// CONTATO
  af_register_form( array(
    'key' => 'form_5efb867474157',
    'title' => 'Form de Contato',
    'display' => array(
      'description' => 'Form de contato',
      'success_message' => '<p class="has-text-align-center"><strong>Formulário de contato enviado!</strong></p><p>&nbsp;</p>
  <p class="has-text-align-center">Em até 1 dia útil você receberá uma resposta.<br />
  <em>Ah! E não esqueça de verificar sua caixa de spam, ok?</em></p><p>&nbsp;</p><p>&nbsp;</p>
  ',
    ),
    'create_entries' => true,
    'restrictions' => array(
      'entries' => false,
      'user' => false,
      'schedule' => false,
    ),
    'emails' => array(
      array(
        'name' => 'E-mail de contato',
        'active' => true,
        'recipient_type' => 'custom',
        'recipient_field' => false,
        'recipient_custom' => 'ana@afcweb.design',
        'from' => '{field:form_nome} <{field:form_email}>',
        'subject' => 'AFC Web Design | {field:form_assunto}',
        'content' => '<p>De: {field:form_nome} {field:form_sobrenome} &lt;{field:form_email}&gt; {field:form_url}<br />
  Assunto: {field:form_assunto}<br />
  Categoria: {field:form_tipo_estrutura}<br />
  Ecommerce: {field:form_loja_tipo}<br />
  Suporte: {field:form_suporte}<br />
  Inten&ccedil;&atilde;o de in&iacute;cio: {field:form_preparacao}<br />
  Referência: {field:form_referencia} &#8211; {field:form_referencia_indicacao}{field:form_referencia_blogsite}{field:form_referencia_midia}<br />
  Newsletter: {field:form_newsletter}</p>
  <blockquote><p>{field:form_mensagem_orcamento}{field:form_mensagem_suporte}</p></blockquote>
  ',
      ),
    ),
    'editing' => array(
      'user' => false,
      'post' => false,
      'term' => false,
    ),
    'slack' => false,
    'mailchimp' => false,
    'zapier' => array(
      'webhook_url' => 'https://hooks.zapier.com/hooks/catch/7925472/o8cxyu6/',
    ),
    'calculated' => array(
    ),
  ) );  


  ////////// DEPOIMENTO
  af_register_form( array(
    'key' => 'form_5f91e6e6224e4',
    'title' => 'Depoimento',
    'display' => array(
      'description' => '',
      'success_message' => '<h3 style="text-align: center;">Relato enviado, <em>yay</em>!</h3>
  <p style="text-align: center;">Ele entrará em análise e em breve será publicado no site.</p>
  ',
    ),
    'create_entries' => true,
    'restrictions' => array(
      'entries' => false,
      'user' => false,
      'schedule' => false,
    ),
    'emails' => array(
      array(
        'name' => 'Notificacao',
        'active' => true,
        'recipient_type' => 'custom',
        'recipient_field' => false,
        'recipient_custom' => 'ana@afcweb.design',
        'from' => 'wordpress@afcweb.design',
        'subject' => 'Depoimento recebido no site!',
        'content' => '<p><strong>Depoimento novo no site!</strong></p>
  <p>Nome: {field:depo_nome}<br />
  E-mail: {field:depo_email}<br />
  Domínio: {field:depo_site}</p>
  <p>Relato:</p>
  <p>{field:depo_experiencia}</p>
  <p>&nbsp;</p>
  ',
      ),
    ),
    'editing' => array(
      'user' => false,
      'post' => array(
        'post_type' => 'afc_depoimentos',
        'post_status' => 'pending',
        'post_title' => array(
          'field' => 'field_5f91e4a0170f3',
          'format' => '',
        ),
        'post_content' => array(
          'field' => 'field_5f91e5d9170f5',
          'format' => '',
        ),
        'map_all_fields' => true,
      ),
      'term' => false,
    ),
    'slack' => false,
    'mailchimp' => false,
    'zapier' => false,
    'recaptcha' => false,
    'calculated' => array(
    ),
  ) );


  ////////// BRIEFING
  af_register_form( array(
    'key' => 'form_5cc98ff56cee8',
    'title' => 'Briefing',
    'display' => array(
      'description' => '',
      'success_message' => '<p style="text-align: center;">O formulário estará para edição até o fechamento do contrato.<br>Após início de produção, o formulário estará inapto à edição.</p><hr /><p>Caso deseje mudar alguma informação ou acrescentar algo, basta <span style="text-decoration: underline;">clicar no menu ao lado, no item <strong>Editar Briefing</strong></span>. Com isso, abrirá uma nova janela com um painel administrativo para você fazer a edição do seu formulário (conforme o print abaixo). Só não se esqueça de me avisar sobre tal edição, ok?</p>
  <p><img class="aligncenter size-full wp-image-2777" src="https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing.png" alt="" width="1472" height="504" srcset="https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing.png 1472w, https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing-300x103.png 300w, https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing-768x263.png 768w, https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing-1024x351.png 1024w, https://afcweb.design/wp-content/uploads/2019/05/como-editar-briefing-550x188.png 550w" sizes="(max-width: 1472px) 100vw, 1472px" /></p>
  ',
    ),
    'create_entries' => true,
    'restrictions' => array(
      'entries' => false,
      'user' => array(
        'message' => 'Logue no sistema para preencher o formulário de briefing.',
      ),
      'schedule' => false,
    ),
    'emails' => array(
      array(
        'name' => 'Briefing preenchido',
        'active' => true,
        'recipient_type' => 'custom',
        'recipient_field' => array(
        ),
        'recipient_custom' => 'ana@afcweb.design',
        'from' => 'wordpress@afcweb.design',
        'subject' => 'AFC Web Design | Briefing preenchido',
        'content' => '<p>O formulário referente ao projeto de {field:bform_estr} [ {field:bform_nome} ] foi preenchido com sucesso!</p>
  ',
      ),
    ),
    'editing' => array(
      'user' => false,
      'post' => false,
      'term' => false,
    ),
    'slack' => false,
    'mailchimp' => false,
    'zapier' => false,
    'calculated' => array(
    ),
  ) );
}
add_action( 'af/register_forms', 'register_forms' );