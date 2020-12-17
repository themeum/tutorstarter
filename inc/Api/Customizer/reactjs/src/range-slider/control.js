import RangeSliderComponent from './range-slider-component';

export const RangeSliderControl = wp.customize.Control.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <RangeSliderComponent control={control} />,
            control.container[0]
        );
    }
});
