import { TypographyControl } from './typography/control';
import { FontFamilyControl } from './font-family/control';
import { RadioImageControl } from './radio-image/control';
import { RangeSliderControl } from './range-slider/control';
import { ToggleSwitchControl } from './toggle-switch/control';
import { ResponsiveRangeSliderControl } from './responsive-range-slider/control';

wp.customize.controlConstructor.qubelystarters_typography = TypographyControl;
wp.customize.controlConstructor.qubelystarters_font_family = FontFamilyControl;
wp.customize.controlConstructor.qubelystarters_radio_image = RadioImageControl;
wp.customize.controlConstructor.qubelystarters_range_slider = RangeSliderControl;
wp.customize.controlConstructor.qubelystarters_toggle_switch = ToggleSwitchControl;
wp.customize.controlConstructor.qubelystarters_responsive_range_slider = ResponsiveRangeSliderControl;