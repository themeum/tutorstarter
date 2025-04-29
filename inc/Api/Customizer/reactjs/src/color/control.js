import ColorComponent from './color-component';

export const ColorControl = wp.customize.Control.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <ColorComponent control={ control } />,
            control.container[0]
        );
    }
});
