import { TypographyControl } from './typography/control';
import { FontFamilyControl } from './font-family/control';
import { RadioImageControl } from './radio-image/control';
import { ToggleSwitchControl } from './toggle-switch/control';

wp.customize.controlConstructor.tutorstarter_typography = TypographyControl;
wp.customize.controlConstructor.tutorstarter_font_family = FontFamilyControl;
wp.customize.controlConstructor.tutorstarter_radio_image = RadioImageControl;
wp.customize.controlConstructor.tutorstarter_toggle_switch = ToggleSwitchControl;