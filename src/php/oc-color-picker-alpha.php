<?php

class OC_Color_Picker_Alpha extends WP_Customize_Color_Control {

    /**
     * alpha enabled color picker
     */
    public $type = '<%= controlType %>';

    /**
     * show alpha control if this value is enabled.
     */
    public $alphaEnabled = true;


    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @since 3.4.0
     */
    public function to_json() {
        parent::to_json();
        $this->json['alphaEnabled'] = $this->alphaEnabled;
    }

    /**
     * Render a JS template for the content of the color picker control.
     *
     * @since 4.1.0
     */
    public function content_template() {
        ?>
        <# var defaultValue = '#RRGGBBAA', defaultValueAttr = '',
            isHueSlider = data.mode === 'hue',
            alphaEnabledAttr = '';
        if ( data.defaultValue && _.isString( data.defaultValue ) && ! isHueSlider ) {
            if ( '#' !== data.defaultValue.substring( 0, 1 ) ) {
                defaultValue = '#' + data.defaultValue;
            } else {
                defaultValue = data.defaultValue;
            }
            defaultValueAttr = ' data-default-color=' + defaultValue; // Quotes added automatically.
        }
        if ( data.alphaEnabled ) {
            alphaEnabledAttr = 'data-alpha-enabled="true"'; 
        }
        #>
        <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
        <# } #>
        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>
        <div class="customize-control-content">
            <label><span class="screen-reader-text">{{{ data.label }}}</span>
            <# if ( isHueSlider ) { #>
                <input class="color-picker-hue" type="text" data-type="hue" />
            <# } else { #>
                <input class="color-picker-hex" type="text" maxlength="9" placeholder="{{ defaultValue }}" {{ defaultValueAttr }} {{ alphaEnabledAttr }} />
            <# } #>
            </label>
        </div>
        <?php
    }

}

// vi: se ts=4 sw=4 et:
