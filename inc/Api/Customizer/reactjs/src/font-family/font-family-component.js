import PropTypes from 'prop-types';
import FontFamilySelector from './font-family-selector.js';

const { Component, Fragment } = wp.element;

class FontFamilyComponent extends Component {
    constructor(props) {
        super(props);
        const value = props.control.setting.get();
        this.state = {
            fontFamily: value,
            fontFamilySource: null
        }

        const defaultParams = {
            default_is_inherit: false
        }

        this.controlParams = props.control.params.input_attrs ? {
            ...defaultParams,
            ...JSON.parse(props.control.params.input_attrs)
        } : defaultParams
    }

    maybe_get_typekit_font(font) {
        if (Object.prototype.hasOwnProperty.call(tutorstarter_customizer, 'typekitSlugs') === false) {
            return font;
        }
        const typekitSlugs = tutorstarter_customizer.typekitSlugs;
        if (Object.prototype.hasOwnProperty.call(typekitSlugs, font)) {
            return typekitSlugs[font];
        }
        return font;
    }

    render() {
        const self = this;
        return (
            <Fragment>
                {this.props.control.params.label &&
                    <span className='customize-control-title'>
                        {this.props.control.params.label}
                    </span>}
                <div className='tutorstarter-typeface-control tutorstarter-background-control'>
                    <FontFamilySelector
                        selected={this.state.fontFamily}
                        onFontChoice={(fontFamilySource, fontFamily) => {
                            self.setState({ fontFamily, fontFamilySource });
                            self.updateControl();
                        }}
                        inheritDefault={this.controlParams.default_is_inherit}
                        maybeGetTypekit={this.maybe_get_typekit_font}
                    />
                </div>
            </Fragment>
        )
    }

    updateControl() {
        setTimeout(() => {
            this.props.control.setting.set(this.maybe_get_typekit_font(this.state.fontFamily))
            wp.customize.previewer.send('font-selection', {
                value: this.maybe_get_typekit_font(this.state.fontFamily),
                source: this.state.fontFamilySource,
                controlId: this.props.control.id,
                inherit: this.controlParams.default_is_inherit
            })
        }, 100)
    }
}

FontFamilyComponent.propTypes = {
    control: PropTypes.object.isRequired
}

export default FontFamilyComponent;
