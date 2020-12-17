import PropTypes from 'prop-types';

const { __ } = wp.i18n;
const { SelectControl } = wp.components;
const { Component, Fragment } = wp.element;

class TypographyComponent extends Component {
	constructor( props ) {
		super( props );
		let value = props.control.setting.get();
		let defaultParams = {
			weight_default: 700,
			text_transform: 'none',
		};

		if ( ! value ) {
			value = this.getEmptyValue();
		}

		if ( props.control.params.input_attrs.length ) {
			const input_attrs = JSON.parse( props.control.params.input_attrs );
			if ( input_attrs.default_is_empty ) {
				defaultParams = this.getEmptyDefault();
			}
		}

		this.controlParams = props.control.params.input_attrs
			? {
					...defaultParams,
					...JSON.parse( props.control.params.input_attrs ),
			  }
			: defaultParams;

		this.state = {
			fontWeight: value.fontWeight,
			textTransform: value.textTransform,
		};

		this.renderFontWeight = this.renderFontWeight.bind( this );
		this.renderTextTransform = this.renderTextTransform.bind( this );
		this.updateValues = this.updateValues.bind( this );
	}

	getEmptyValue( prop = '' ) {
		const emptyValue = {
			fontWeight: 700,
			textTransform: 'none',
		};
		if ( prop && emptyValue[ prop ] ) {
			return emptyValue[ prop ];
		}
		return emptyValue;
	}

	getEmptyDefault() {
		return {
			weight_default: 700,
			text_transform: 'none',
		};
	}

	render() {
		return (
			<Fragment>
				{ this.props.control.params.label && (
					<span className="customize-control-title">
						{ this.props.control.params.label }
					</span>
				) }
				<div className="tutorstarter-typography-control tutorstarter-background-control">
					{ this.renderFontWeight() }
					{ this.renderTextTransform() }
				</div>
			</Fragment>
		);
	}

	updateValues( value ) {
		this.props.control.setting.set( {
			...this.props.control.setting.get(),
			...value,
		} );
	}

	renderFontWeight() {
		return (
			<div className="select-inline font-weight">
				<span className="customize-control-title">
					{ __( 'Font Weight', 'tutorstarter' ) }
				</span>
				<SelectControl
					value={ this.state.fontWeight }
					options={ [
						{ value: 'none', label: __( 'None', 'tutorstarter' ) },
						{ value: 100, label: '100' },
						{ value: 200, label: '200' },
						{ value: 300, label: '300' },
						{ value: 400, label: '400' },
						{ value: 500, label: '500' },
						{ value: 600, label: '600' },
						{ value: 700, label: '700' },
						{ value: 800, label: '800' },
						{ value: 900, label: '900' },
					] }
					onChange={ ( fontWeight ) => {
						this.setState( { fontWeight } );
						this.updateValues( { fontWeight } );
					} }
				/>
			</div>
		);
	}

	renderTextTransform() {
		return (
			<div className="select-inline text-transform">
				<span className="customize-control-title">
					{ __( 'Text Transform', 'tutorstarter' ) }
				</span>
				<SelectControl
					value={ this.state.textTransform }
					options={ [
						{ value: 'none', label: __( 'None', 'tutorstarter' ) },
						{
							value: 'capitalize',
							label: __( 'Capitalize', 'tutorstarter' ),
						},
						{
							value: 'lowercase',
							label: __( 'Lowercase', 'tutorstarter' ),
						},
						{
							value: 'uppercase',
							label: __( 'Uppercase', 'tutorstarter' ),
						},
					] }
					onChange={ ( textTransform ) => {
						this.setState( { textTransform } );
						this.updateValues( { textTransform } );
					} }
				/>
			</div>
		);
	}
}

TypographyComponent.propTypes = {
	control: PropTypes.object.isRequired,
};

export default TypographyComponent;
