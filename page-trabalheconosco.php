<?php

  //response generation function

$response = "";

  //function to generate response
function my_contact_form_generate_response($type, $message){

  global $response;

  if($type == "success") $response = "<div style='font-size: 40px; color: green;' class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}

  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Por favor complete todos os campos.";
$email_invalid   = "E-mail Inválido.";
$message_unsent  = "Mensagem não enviada, tente novamente.";
$message_sent    = "Mensagem enviada, obrigado.";

  //user posted variables
$assunto = "Currículo";
$pessoa_options = "";
if(isset($_POST["pessoa"])) {
  if(is_array($_POST["pessoa"])) {
    $pessoa_options = implode("\r\n", $_POST["pessoa"]);
  }
  else {
    $pessoa_options = $_POST["pessoa"];
  }
}
$sexo = $_POST['sexo'];
$cpf = $_POST['message_cpf'];
$cnpj = $_POST['message_cnpj'];
$name = $_POST['message_name'];
$name_empresa = $_POST['message_name_empresa'];
$email = $_POST['message_email'];
$cidade = $_POST['message_cidade'];
$uf = $_POST['message_uf'];
$datanasc = $_POST['message_datanasc'];
$numbercnh = $_POST['message_numbercnh'];
$cat = $_POST['message_cat'];
$firstcnh = $_POST['message_firstcnh'];
$tel = $_POST['message_tel'];
$cel = $_POST['message_cel'];
$options = "";
if(isset($_POST["check_list"])) {
  if(is_array($_POST["check_list"])) {
    $options = implode("\r\n", $_POST["check_list"]);
  }
  else {
    $options = $_POST["check_list"];
  }
}
$message = $_POST['message_text'];
$human = $_POST['message_human'];

  //php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
'Reply-To: ' . $email . "\r\n";

$message = strip_tags("Assunto: " . $assunto . "\r\n" . "Pessoa: " . $pessoa_options . "\r\n" . "\r\n" . "CPF: " . $cpf . "\r\n" . "CNPJ: " . $cnpj . "\r\n" . "Nome: " . $name . "\r\n" . "Nome da Empresa: " . $name_empresa . "\r\n" . "E-mail: " . $email . "\r\n" . "Cidade: " . $cidade . "\r\n" . "UF: " . $uf . "\r\n" . "Data de Nascimento: " . $datanasc . "\r\n" . "Sexo: " . $sexo . "\r\n" . "Número CNH: " . $numbercnh . "\r\n" . "Categoria CNH: " . $cat . "\r\n" . "Data da 1ª Habilitação: " . $firstcnh . "\r\n" . "Telefone: " . $tel . "\r\n" . "Celular: " . $cel . "\r\n" . $options . "\r\n" . "Mensagem: " . $message . "\r\n");




if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($email) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, $message, $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

  ?>

  <?php get_header(); ?>

  <div class="contato" style="margin-top: 150px">
    <div class="container">

      <div class="title_cadastre">
        <h2>Seja um Prestador de Serviços VCL</h2>
        <p>Para ser um prestador de serviços da VCL Serviços, preencha as informações abaixo.</p>
        <p>Todas as informações serão encaminhadas à área responsável.</p>

      </div>

      <div id="respond">
        <?php echo $response; ?>
        <form action="<?php the_permalink(); ?>" method="post">

         <div class="form-group" style="padding: 15px 0 0 15px">
          <div class="radio-inline">
            <label><input type="radio" name="pessoa" value="Fisica" checked>Física</label>
          </div>
          <div class="radio-inline">
            <label><input type="radio" name="pessoa" value="Juridica">Jurídica</label>
          </div>
        </div> 

        <div class="col-sm-6">
          <div class="form-group"><label for="message_name">Nome: </label><input type="text" class="form-control" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></div>
          <div class="form-group"><label for="message_email">Email: </label><input type="text" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></div>
          <div class="form-group"><label for="message_cidade">Cidade: </label><input type="text" class="form-control" name="message_cidade" value="<?php echo esc_attr($_POST['message_cidade']); ?>"></div>
          <div class="form-group"><label for="message_uf">UF: </label>
            <select class="form-control" name="message_uf" value="<?php echo esc_attr($_POST['message_uf']); ?>">
              <option>Acre</option> 
              <option>Alagoas</option> 
              <option>Amazonas</option> 
              <option>Amapá</option> 
              <option>Bahia</option> 
              <option>Ceará</option> 
              <option>Distrito Federal</option> 
              <option>Espírito Santo</option> 
              <option>Goiás</option> 
              <option>Maranhão</option> 
              <option>Mato Grosso</option> 
              <option>Mato Grosso do Sul</option> 
              <option>Minas Gerais</option> 
              <option>Pará</option> 
              <option>Paraíba</option> 
              <option>Paraná</option> 
              <option>Pernambuco</option> 
              <option>Piauí</option> 
              <option>Rio de Janeiro</option> 
              <option>Rio Grande do Norte</option> 
              <option>Rondônia</option> 
              <option>Rio Grande do Sul</option> 
              <option>Roraima</option> 
              <option>Santa Catarina</option> 
              <option>Sergipe</option> 
              <option>São Paulo</option> 
              <option>Tocantins</option> 
            </select>
          </div>
          <div class="form-group"><label for="message_tel">Telefone: </label><input type="tel" class="form-control" name="message_tel" value="<?php echo esc_attr($_POST['message_tel']); ?>"></div>
          <div class="form-group"><label for="message_cel">Celular: </label><input type="tel" class="form-control" name="message_cel" value="<?php echo esc_attr($_POST['message_cel']); ?>"></div>
        </div> <!-- col-sm-6 -->

        <div id="fisica">
          <div class="col-sm-6">
            <div class="form-group" style="margin-top: 34px">
              <div class="radio-inline">
                <label><input type="radio" name="sexo" value="masculino" checked>Masculino</label>
              </div>
              <div class="radio-inline">
                <label><input type="radio" name="sexo" value="feminino">Feminino</label>
              </div>
            </div>
            <div class="form-group"><label for="message_cpf">CPF: </label><input type="text" class="form-control" name="message_cpf" value="<?php echo esc_attr($_POST['message_cpf']); ?>"></div>
            <div class="form-group"><label for="message_datanasc">Data de Nascimento: </label><input type="date" class="form-control" name="message_datanasc" value="<?php echo esc_attr($_POST['message_datanasc']); ?>"></div>
            <div class="form-group"><label for="message_numbercnh">Número CNH: </label><input type="text" class="form-control" name="message_numbercnh" value="<?php echo esc_attr($_POST['message_numbercnh']); ?>"></div>
            <div class="form-group"><label for="message_cat">Categoria: </label><input type="text" class="form-control" name="message_cat" value="<?php echo esc_attr($_POST['message_cat']); ?>"></div>
            <div class="form-group"><label for="message_firstcnh">1º Habilitação: </label><input type="date" class="form-control" name="message_firstcnh" value="<?php echo esc_attr($_POST['message_firstcnh']); ?>"> </div> 
          </div><!-- col-sm-6 -->
        </div> <!-- #fisica -->

        <div id="juridica">
          <div class="col-sm-6">
           <div class="form-group"><label for="message_cnpj">CNPJ: </label><input type="text" class="form-control" name="message_cnpj" value="<?php echo esc_attr($_POST['message_cnpj']); ?>"></div>
           <div class="form-group"><label for="message_name_empresa">Nome da Empresa: </label><input type="text" class="form-control" name="message_name_empresa" value="<?php echo esc_attr($_POST['message_name_empresa']); ?>"></div>
         </div> <!-- col-sm-6 -->
       </div> <!-- #juridica -->

       <div class="col-sm-12">
        <div class="form-group" style="margin-top: 15px">
         <div class="col-sm-6">
           <ul>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> Bombeiro ( Sistema de Combate Contra Incêndio )
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox2" value="option2"> Chaveiro
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox3" value="option3"> Dedetização
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox4" value="option4"> Desentupimento
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox5" value="option5"> Elétrica
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox6" value="option6"> Gesso / Forro /Parede
            </label></li>
            <li><label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox7" value="option7"> Hidráulica
            </label></li>
          </ul>
        </div><!-- col-sm-6 -->

        <div class="col-sm-6">
         <ul>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox15" value="option15"> Informática ( T.I)
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox16" value="option16"> Manutenção em Portas de Enrolar ( Manual / Motorizada )
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox17" value="option17"> Marceneiro
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox18" value="option18"> Reparos Civil
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox19" value="option19"> Serralheria
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox20" value="option20"> Telhados
          </label></li>
          <li><label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox21" value="option21"> Vidraçaria
          </label></li>
        </ul>
      </div><!-- col-sm-6 -->
    </div>
  </div><!-- col-sm-12 -->



  <div class="col-sm-12">  
    <div class="form-group"><label for="message_text">Descreva Sua Experiência Profissional: </label><textarea type="text" class="form-control" rows="10" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></div>
  </div><!-- col-sm-12 -->
  <div class="col-sm-12"> 
    <div class="form-group" style="text-align: center"><label for="message_human">Verificação: </label><input type="text" class="form-control" name="message_human" style="width: 30px; display: inline-block; margin: 0 10px"><p style="display: inline-block; font-size: 18px; font-weight: bold">  +  3  =  5</p>
      <input type="hidden" name="submitted" value="1">
      <input class="btn btn-default" type="submit" value="Enviar" style="background-color: #636363; margin-top: 0px;">
      </div>
    </div><!-- col-sm-6 -->
  </form>
</div> <!-- #respond -->

</div><!-- containert -->
</div><!-- contato -->

<div style="height: 150px; background-color: #000; margin-top:15px">
  <div class="container" style="text-align: center">
    <img style="margin-top:15px" id="footer_logo" src="<?php bloginfo('stylesheet_directory');?>/img/logo_vcl_neg.png" alt="Logo VCL Serviços Rodapé"/>
    <p style="display:inline-block; margin-left:15px" id="footer_tel"> T. 11 3522-7295</p>
    <a style="color: #fff; margin-left:15px" href="mailto:contato@vclservicos.com.br">contato@vclservicos.com.br</a>
    <p style="color: #fff; text-transform:uppercase">av. imperatriz leopoldina, 454 - sala 03 CEP 09770-420 - bairro nova petrópolis são bernardo do campo - sp</p>   
  </div> <!-- container -->
</div>   

<script>
  $('input[name="pessoa"]').bind('change',function(){
    $('#juridica').toggle();
    $('#fisica').toggle();
  }); 
</script>
