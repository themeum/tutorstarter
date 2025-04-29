import FontFamilyComponent from './font-family-component';

export const FontFamilyControl = wp.customize.Control.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <FontFamilyComponent control={control} />,
            control.container[0]
        );
    }
});
