import TypographyComponent from './typography-component';
const { render } = wp.element;

export const TypographyControl = wp.customize.Control.extend( {
	renderContent: function renderContent() {
		const control = this;
		render(
			<TypographyComponent control={ control } />,
			control.container[ 0 ]
		);
	},
} );
