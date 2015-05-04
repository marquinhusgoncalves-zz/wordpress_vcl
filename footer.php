<footer>
	<div>
        <div>
            <img>Logo</img>
            <p>AV. IMPERATRIZ LEOPOLDINA, 454 - SALA 03</br>
            CEP 09770-420 - BAIRRO NOVA PETRÓPOLIS</br>
            SÃO BERNARDO DO CAMPO - SP</br>
            <p> T. 11 3522-7297</p>
            <a href="mailto:contato@vclservicos.com.br">contato@vclservicos.com.br</a>
        </div>

        <div>
                <?php if($email){ ?>
                    <div class = "alert alert-success" role = "alert" data-dismiss = "alert">
                        <a href = "#" class = "alert-link">Muito obrigado! Seu e-mail foi enviado com sucesso.</a>
                    </div>
                <?php } else { if($error) { ?>
                    <div class = "alert alert-danger" role = "alert" data-dismiss = "alert">
                        <a href = "#" class = "alert-link">Precisa preencher por completo.</a>
                    </div>
                <?php echo $error; ?>
                
                <?php } else { the_content(); } ?>

                <?php if( $post_response ) : ?>
                    <div class = "alert alert-<?php echo $post_response->status ?>">
                        <?php echo $post_response->message ?>
                    </div>
                <?php endif ?>

                    <form action="<?php the_permalink(); ?>" id="contact_me" method="post">
                    <input type="hidden" name="sent" id="sent" value="1" />
                        <div class = "form-group">
                            <div id = "input-field"><input class = "form-control input-lg" type = "text" name = "your_name" id = "your_name" value = "<?php echo $_POST[your_name];?>" placeholder = "<?php echo $ph_name; ?>" /></div>
                        </div>
                        <div class = "form-group">
                            <div id = "input-field"><input class = "form-control input-lg" type="text" name="your_email" id="your_email" value="<?php echo $_POST[your_email];?>" placeholder = "<?php echo $ph_email; ?>" /></div>
                        </div>
                        <div class = "form-group">
                            <div id = "input-field"><input class = "form-control input-lg" type="text" name="your_subject" id="your_subject" value="<?php echo $_POST[your_subject];?>" placeholder = "<?php echo $ph_subject; ?>" /></div>
                        </div>
                        <div class = "form-group">
                            <div id = "input-field"><textarea class = "form-control input-lg" rows = "5" name="your_message" id="your_message" placeholder = "<?php echo $ph_message; ?>"><?php echo stripslashes($_POST[your_message]); ?></textarea></div>
                        </div>

                        <button type = "submit" name = "send" class = "btn btn-danger btn-lg">Enviar</button>
                    </form>
                    
                <?php } ?>
        </div>
    </div>
</footer>		

</div> <!-- stage -->
<?php wp_footer(); ?>
</body>
</html>