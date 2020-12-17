import ResponsiveRangeSliderComponent from './responsive-range-slider-component.js';
const { render } = wp.element;

export const ResponsiveRangeSliderControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    const control = this
    render(
      <ResponsiveRangeSliderComponent control={control} />,
      control.container[0]
    )
  }
});
