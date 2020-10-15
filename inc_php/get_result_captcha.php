<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of get_result_captcha
 *
 * @author Clemente-PC
 */
class get_result_captcha {
    private $get_captcha_result_output;
    public function get_captcha_result( $get_captcha_result_input )
    {
        $get_captcha_result_output = "OFF";
        if ( $_SESSION['captcha'] == $get_captcha_result_input )
        {
            $get_captcha_result_output = "ON";
        }
        
        unset( $_SESSION['captcha'] );
        
        return $get_captcha_result_output;
    }
}
