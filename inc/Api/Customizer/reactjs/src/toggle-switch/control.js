import ToggleSwitchComponent from './toggle-switch-component';

export const ToggleSwitchControl = wp.customize.Control.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <ToggleSwitchComponent control={control} />,
            control.container[0]
        );
    }
});
