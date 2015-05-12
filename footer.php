<?php
/*
Template Name: Footer
*/

$ph_name = "NOME";
$ph_email = "E-MAIL";
$ph_message = "MENSAGEM";

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
 $email = wp_mail(get_option("admin_email"),trim($_POST[your_name])." enviou uma mensagem para ".get_option("blogname"),stripslashes(trim($_POST[your_message])),"From: ".trim($_POST[your_name])." <".trim($_POST[your_email]).">\r\nReply-To:".trim($_POST[your_email]));
 }
} ?>
<a name="contato"></a>
<footer>
	<div class="container">
        <div class="footer_box">
            <div class="col-xs-12 col-sm-3" id="footer_box_left">
                <img id="footer_logo" src = "<?php bloginfo('stylesheet_directory');?>/img/logo_vcl_neg.png"/>
                <p>AV. IMPERATRIZ LEOPOLDINA, 454 - SALA 03
                CEP 09770-420 - BAIRRO NOVA PETRÓPOLIS
                SÃO BERNARDO DO CAMPO - SP</p>
                <p id="footer_tel"> T. 11 3522-7295</p>
                <a href="mailto:contato@vclservicos.com.br">contato@vclservicos.com.br</a>
            </div>

            <div id="footer_box_right">
                <?php if($email){ ?>
                    <div class = "alert alert-success" role = "alert" data-dismiss = "alert">
                        <a href = "#" class = "alert-link">Muito obrigado! Seu e-mail foi enviado com sucesso.</a>
                    </div>
                <?php } else { if($error) { ?>
                    <div class = "alert alert-danger" role = "alert" data-dismiss = "alert">
                        <a href = "#" class = "alert-link">Precisa preencher por completo.</a>
                    </div>
                <?php echo $error; ?>
                
                <?php } else {  } ?>

                <?php if( $post_response ) : ?>
                    <div class = "alert alert-<?php echo $post_response->status ?>">
                        <?php echo $post_response->message ?>
                    </div>
                <?php endif ?>
                    <form action="<?php the_permalink(); ?>" method="post">
                    <input type="hidden" name="sent" id="sent" value="1" />
                        <div class = "form-group">
                            <div id = "input-field"><input class = "form-control input-lg" type = "text" name = "your_name" id = "your_name" value = "<?php echo $_POST[your_name];?>" placeholder = "<?php echo $ph_name; ?>" /></div>
                        </div>
                        <div class = "form-group">
                            <div id = "input-field"><input class = "form-control input-lg" type="text" name="your_email" id="your_email" value="<?php echo $_POST[your_email];?>" placeholder = "<?php echo $ph_email; ?>" /></div>
                        </div>
                        <div class = "form-group">
                            <div id = "input-field"><textarea style="height: 80px !important" class = "form-control input-lg" rows = "5" name="your_message" id="your_message" placeholder = "<?php echo $ph_message; ?>"><?php echo stripslashes($_POST[your_message]); ?></textarea></div>
                        </div>
                        <button type = "submit" name = "send" class = "btn btn-danger">Enviar</button>
                    </form>              
                <?php } ?>
            </div>
        </div> <!-- footer_box -->
    </div> <!-- container -->
</footer>		
<?php wp_footer(); ?>
</body>
</html>