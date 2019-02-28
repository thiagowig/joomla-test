<?php
/**
 * @package     Expose
 * @version     4.0
 * @author      ThemeXpert http://www.themexpert.com
 * @copyright   Copyright (C) 2010 - 2011 ThemeXpert
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3
 * @file        stylus.php
 **/

//prevent direct access
defined ('EXPOSE_VERSION') or die ('resticted aceess');

//import parent gist class
expose_import('core.widget');

/**
 *
 * Custom styling widget.
 * Specially designed for applying custom style on frontend
 *
 **/

class ExposeWidgetStylus extends ExposeWidget{

    public $name = 'stylus';

    public function isInMobile()
    {
        return TRUE;
    }
    
    public function isEnabled(){
        return TRUE;
    }

    public function init()
    {
        global $expose;

        $css = '';

        $css .= "
            body{
                background-color: #{$this->get('background-color')};
                {$this->setBackgroundImage('background-image')}
            }


            #header-wrap{
                {$this->setBackgroundImage('header-image', '')};
                min-height: {$this->get('header-height')};
                background-position : {$this->get('header-position')};
                background-size: cover;
                background-position: 50% 50%;
            }

        ";

        $expose->addInlineStyles($css);

    }

    public function setBackgroundImage($param, $dir='backgrounds')
    {
        global $expose;

        $image = $this->get($param);
//        $repeat = $this->get($param.'-repeat','repeat');
        $css = '';

        if($image == -1) return;
      
      	

        if( $dir != '' ){
            $path  = $expose->templateUrl . '/images/'. $dir .'/' . $image;
        }else{
            $path = $image;
        }
            
		$path = JUri::root(true) . '/' . $path;
        
        $css  .= "background-image: url({$path});";
        $css  .= "background-repeat: no-repeat";

        return $css;
    }
}

?>

