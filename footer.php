<?php

if($_POST[sent]){
 $error = "";
 if(!trim($_POST[your_name])){
   $ph_name = "POR FAVOR DIGITE SEU NOME";
 }
 if(!filter_var(trim($_POST[your_email]),FILTER_VALIDATE_EMAIL)){
   $ph_email = "DIGITE UM E-MAIL VÁLIDO";
 }
 if(!trim($_POST[your_message])){
   $ph_message = "MENSAGEM NÃO ENVIADA, NÃO DEIXE NENHUM CAMPO VAZIO. DIGITE SUA MENSAGEM";
 }
 if(!$error){
  $email = wp_mail(get_option("admin_email"),trim($_POST[your_name])." enviou uma mensagem pelo site ".get_option("blogname"),stripslashes(trim($_POST[your_message])),"From: ".trim($_POST[your_name])." <".trim($_POST[your_email]).">\r\nReply-To:".trim($_POST[your_email]));
 }
} ?>
<a id="contato"></a>
<footer>
	<div class="container">
    <div class="footer_box">
      <div class="col-xs-12 col-sm-3" id="footer_box_left">
        <img id="footer_logo" src="<?php bloginfo('stylesheet_directory');?>/img/logo_vcl_neg.png" alt="Logo VCL Serviços Rodapé"/>
        <p>av. imperatriz leopoldina, 454 - sala 03
          CEP 09770-420 - bairro nova petrópolis
          são bernardo do campo - sp</p>
          <p class="footer_tel"><img src="<?php bloginfo('stylesheet_directory');?>/img/iconetel.png" alt="Ícone telefone"/> 11&emsp;3522-7295</p>
          <p class="footer_tel"><img src="<?php bloginfo('stylesheet_directory');?>/img/iconewhatsapp.png" alt="Ícone whatsapp"/> 11 9.9772-7085</p>
          <a href="mailto:contato@vclservicos.com.br">contato@vclservicos.com.br</a>
        </div>

        <div id="footer_box_right">
          <?php if($email){ ?>
          <div class="alert alert-success" role="alert" data-dismiss="alert">
            <a href="#" class="alert-link">Muito obrigado! Seu e-mail foi enviado com sucesso.</a>
          </div>
          <?php } else { if($error) { ?>
          <div class="alert alert-danger" role="alert" data-dismiss="alert">
            <a href="#" class="alert-link">Precisa preencher por completo.</a>
          </div>
          <?php echo $error; ?>
          
          <?php } else { the_content(); } ?>

          <?php if( $post_response ) : ?>
            <div class = "alert alert-<?php echo $post_response->status ?>">
              <?php echo $post_response->message ?>
            </div>
          <?php endif ?>
          <form action="" method="post">
            <input type="hidden" name="sent" id="sent" value="1" />
            <div class="form-group">
              <div><input class="form-control input-lg" type="text" name="your_name" value="<?php echo $_POST[your_name];?>" placeholder="NOME" /></div>
            </div>
            <div class="form-group">
              <div><input class="form-control input-lg" type="text" name="your_email" value="<?php echo $_POST[your_email];?>" placeholder="E-MAIL" /></div>
            </div>
            <div class="form-group">
              <div><textarea style="height: 80px !important" class="form-control input-lg" rows="5" name="your_message" placeholder="MENSAGEM"><?php echo stripslashes($_POST[your_message]); ?></textarea></div>
            </div>
            <button type="submit" class="btn btn-danger">Enviar</button>
          </form>              
          <?php } ?>
        </div>
      </div> <!-- footer_box -->
    </div> <!-- container -->
  </footer>		
  <?php wp_footer(); ?>
</body>
</html>