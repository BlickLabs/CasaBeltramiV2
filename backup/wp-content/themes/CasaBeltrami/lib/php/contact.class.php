<?php
    class contact{
        static function send_mail( ){
            if( isset( $_POST['btn_send'] ) && !empty( $_POST['btn_send'] ) && isset($_POST['contact_email']) && is_email($_POST['contact_email'])  ){

                $frommail = '';
                $name = '';
                $message = '';

                $tomail = $_POST['contact_email'];
                $result = array();
                if( isset( $_POST['name'] ) && strlen( $_POST['name'] ) && trim($_POST['name']) != trim(__( 'Su nombre' , 'redcodn' ) ).' *' ) {
                    $name =  trim( $_POST['name'] );
                }else{
                    $result['contact_name'] =  __('Error, el nombre es un campo obligatorio.','redcodn');
                }

                if( isset( $_POST['email'] ) && is_email( $_POST['email'] ) && trim($_POST['email']) != trim(__( 'Su E-mail' , 'redcodn' ) ).' *' ){
                    $frommail = trim( $_POST['email'] );
                }else{
                    
                    $result['contact_email'] =  __('Error, el correo electr&oacute;nico es un campo obligatorio.','redcodn');

                }

                if( isset( $_POST['message'] ) && strlen($_POST['message']) && trim($_POST['message']) != trim(__( 'Mensaje' , 'redcodn' )).' *' ){
                    $message = '';
                    if( isset($_POST['name']) ){
                        $message .= __('Nombre de contacto: ','redcodn'). trim($_POST['name'])."\n";
                    }
                    if( isset($_POST['email']) ){
                        $message .= __('Email de contacto: ','redcodn'). trim($_POST['email'])."\n";
                    }
                    if( isset($_POST['phone']) ){
                        $message .= __('Tel&eacute;fono de contacto: ','redcodn'). trim($_POST['phone'])."\n\n";
                    }

                    $message .= trim( $_POST['message'] );
                }else{
                    $result['contact_message'] = __('Error, el contenido del mensaje es un campo obligatorio.','redcodn');
                }

                /*if( strlen( $result ) ){
                    echo $result;
                    exit();
                }*/
//var_dump($frommail); var_dump($name); var_dump($message);
                if( is_email( $tomail ) && strlen( $tomail ) && strlen( $frommail ) &&  strlen( $name ) && strlen( $message ) ){
                    $subject = __('Nuevo correo electr&oacute;nico de','redcodn'). ' '.get_bloginfo('name'). '.'.__('Sent via contact form.','redcodn');
                    wp_mail($tomail, $subject , $message);
                    $result['message'] = '<span class="success" style="color:green;">' . __('Correo electr&oacute;nico se ha enviado correctamente','redcodn') . '</span>';
                    //echo '<span class="success" style="color:green;">' . __('Email sent successfully ','redcodn') . '</span>';
                } /*else{
                    $result['message'] = __('Error, failed to send email','redcodn');
                }*/
                echo json_encode( $result );
            }
            exit;
        }

        static function get_contact_form( $email ){
?>
            <form id="comment_form" class="form comments b_contact" method="post" action="<?php echo home_url() ?>/">
              <fieldset>
                  <p class="input">
                      <input type="text" onfocus="if (this.value == '<?php _e( 'Su nombre' , 'redcodn' ); ?> *') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Su nombre' , 'redcodn' ); ?> *';}" value="<?php _e( 'Su nombre' , 'redcodn' ); ?> *" name="name" id="name" />
                  </p>
                  <p class="input">
                      <input type="text" onfocus="if (this.value == '<?php _e( 'Su Email' , 'redcodn' ); ?> *') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Su Email:' , 'redcodn' ); ?> *';}" value="<?php _e( 'Su Email' , 'redcodn' ); ?> *" name="email" id="email" />
                  </p>
                  <p class="textarea">
                      <textarea onfocus="if (this.value == '<?php _e( 'Mensaje' , 'redcodn' ); ?> *') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Mensaje' , 'redcodn' ); ?> *';}" tabindex="4" cols="50" rows="10" id="comment_widget" name="message"><?php _e( 'Mensaje' , 'redcodn' ); ?> *</textarea>
                  </p>
                  <p class="button hover">
                      <input type="button" value="<?php _e( 'Env&iacute;e el formulario de' , 'redcodn' ); ?>" name="btn_send" onclick="javascript:act.send_mail( 'contact' , '#comment_form' , 'p#send_mail_result' );" class="inp_button" />
                  </p>
                  <div  class="container_msg"></div>
                  <p id="send_mail_result">
                  </p>
                  <input type="hidden" value="<?php echo $email; ?>" name="contact_email"  />
              </fieldset>
          </form>
<?php

        }
    }
?>