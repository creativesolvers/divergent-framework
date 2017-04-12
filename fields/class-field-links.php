<?php
 /** 
  * Displays a link styling field
  */
namespace Classes\Divergent\Fields;

// Bail if accessed directly
if ( ! defined( 'ABSPATH' ) )
    die;

class Divergent_Field_Links implements Divergent_Field {
    
    public static function render($field = array()) {
        
        $output = '';
        
        $link_states = array(
            'link' => __('Default Link Color', 'divergent'),
            'hover' => __('Hover Link Color', 'divergent'),
            'visited' => __('Visited Link Color', 'divergent'),
            'active' => __('Selected Link Color', 'divergent')
        );
                        
        // Background Colorpicker
        foreach($link_states as $key => $link_state) {
            
            $colorpicker['values']  = isset($field['values'][$key]) ? $field['values'][$key] : '';
            $colorpicker['name']    = $field['name'] . '[' . $key . ']';
            $colorpicker['id']      = $field['id'] . '-' . $key;
            
            $output .= '<div class="divergent-field-left link-state-' . $key . '">';
            $output .= '    <p>' . $link_state . '</p>';
            $output .=      Divergent_Field_Colorpicker::render($colorpicker);
            $output .= '</div>';
        }

        return $output;    
    }
    
    public static function configurations() {
        $configurations = array(
            'type' => 'links'
        );
            
        return $configurations;
    }
    
}