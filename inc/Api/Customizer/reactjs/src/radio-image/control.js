import RadioImageComponent from './radio-image-component';

export const RadioImageControl = wp.customize.Control.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <RadioImageComponent control={control} />,
            control.container[0]
        );
    }
});
