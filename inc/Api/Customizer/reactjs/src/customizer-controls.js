import { TypographyControl } from './typography/control';
import { FontFamilyControl } from './font-family/control';
import { RadioImageControl } from './radio-image/control';
import { RangeSliderControl } from './range-slider/control';
import { ToggleSwitchControl } from './toggle-switch/control';
import { ResponsiveRangeSliderControl } from './responsive-range-slider/control';

wp.customize.controlConstructor.tutorstarter_typography = TypographyControl;
wp.customize.controlConstructor.tutorstarter_font_family = FontFamilyControl;
wp.customize.controlConstructor.tutorstarter_radio_image = RadioImageControl;
wp.customize.controlConstructor.tutorstarter_range_slider = RangeSliderControl;
wp.customize.controlConstructor.tutorstarter_toggle_switch = ToggleSwitchControl;
wp.customize.controlConstructor.tutorstarter_responsive_range_slider = ResponsiveRangeSliderControl;