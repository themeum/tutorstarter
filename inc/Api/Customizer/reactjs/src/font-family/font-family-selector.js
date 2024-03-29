import PropTypes from 'prop-types';
import FontPreviewLink from './font-preview-link';
import VisibilitySensor from 'react-visibility-sensor';

const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { Popover, Button, TextControl, Dashicon, Spinner } = wp.components;

class FontFamilySelector extends Component {
    constructor(props) {
        super(props);
        localStorage.setItem('localFonts', JSON.stringify(tutorstarter_customizer.fonts));
        const getFonts = JSON.parse(localStorage.getItem('localFonts'));

        if (getFonts.Google.length < tutorstarter_customizer.fonts.Google.length) {
            localStorage.removeItem('localFonts');
        }

        this.state = {
            fonts: getFonts ? getFonts : [],
            isVisible: false,
            search: '',
            loadUntil: 20,
            delayFontInclusion: true
        }
    }

    getFonts() {
        const fontGroups = this.state.fonts;
        const self = this;
        const result = {};

        Object.keys(fontGroups).map((key) => {
            result[key] = fontGroups[key].filter(value => value.toLowerCase()
                .includes(self.state.search.toLowerCase()))
        })
        return result;
    }

    getFontList() {
        const fontGroups = this.getFonts();
        const options = [];
        const self = this;

        options.push(
            <li
                key='default' className={'default-value ' + !this.props.selected
                    ? 'selected'
                    : ''}
            >
                <FontPreviewLink
                    fontFace='default'
                    delayLoad={false}
                    label={this.props.inheritDefault
                        ? __('Inherit', 'tutorstarter')
                        : __('Default', 'tutorstarter')}
                    onClick={() => {
                        this.setState({ isVisible: false })
                        this.props.onFontChoice('system', false)
                    }}
                />
            </li>
        )
        Object.keys(fontGroups).map((key) => {
            fontGroups[key].length > 0 && options.push(
                <li className='font-group-header' key={key}>
                    {key}
                </li>
            )
            fontGroups[key].map((font, index) => {
                if (index < self.state.loadUntil) {
                    options.push(
                        <li
                            key={font} className={
                                (
                                    font === this.props.selected
                                ) ? 'selected' : ''
                            }
                        >
                            <FontPreviewLink
                                delayLoad={this.state.delayFontInclusion}
                                label={font}
                                fontFace={this.props.maybeGetTypekit(font)} onClick={() => {
                                    this.setState({ isVisible: false })
                                    this.props.onFontChoice(key, font)
                                }}
                            />
                        </li>
                    )
                }
            })
        })
        if (this.state.loadUntil < options.length && this.state.search === '') {
            options.push(
                <VisibilitySensor
                    key='load-more'
                    onChange={(isVisible) => {
                        if (isVisible) {
                            this.setState({
                                loadUntil: (self.state.loadUntil + 5),
                                delayFontInclusion: false
                            })
                        }
                    }}
                >
                    <li className='load-more'>
                        <Spinner />
                    </li>
                </VisibilitySensor>
            )
        }

        return (
            <Fragment>
                <div className='popover-content'>
                    <div className='popover-header'>
                        <div className='search'>
                            <TextControl
                                placeholder={__('Search', 'tutorstarter') + '...'}
                                value={this.state.search}
                                onChange={e => {
                                    this.setState({
                                        search: e,
                                        loadUntil: 20
                                    })
                                }}
                            />
                            <a
                                className='close-font-selector'
                                onClick={(e) => {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    this.setState({ isVisible: false });
                                }}
                            ><Dashicon icon='no' />
                            </a>
                        </div>
                    </div>
                    <ul className='tutorstarter-fonts-list'>
                        {options.length ? options
                            : <li className='no-result' key='no-results'>{__('No results.', 'tutorstarter')}</li>}
                    </ul>
                </div>
            </Fragment>
        )
    }

    render() {
        // eslint-disable-next-line max-len
        const defaultFontface = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
        const font = this.props.maybeGetTypekit(this.props.selected);
        return (
            <div className='tutorstarter-font-family-control'>
                <span className='customize-control-title'>
                    {__('Font Family', 'tutorstarter')}
                </span>
                <Button
                    className='font-family-selector-toggle'
                    isSecondary
                    onClick={() => {
                        this.setState({ isVisible: true })
                    }}
                >
                    <span className='ff-name'>{
                        this.props.selected ||
                        (this.props.inheritDefault
                            ? __('Inherit', 'tutorstarter')
                            : __('Default', 'tutorstarter'))
                    }
                    </span>
                    <span
                        className='ff-preview'
                        style={{
                            fontFamily: font || defaultFontface
                        }}
                    >Abc
                    </span>
                    {this.state.isVisible && (
                        <Popover
                            position='bottom left'
                            onFocusOutside={() => this.setState({ isVisible: false })}
                        >
                            {this.state.fonts ? this.getFontList()
                                : __('Loading...', 'tutorstarter')}
                        </Popover>
                    )}
                </Button>
            </div>
        )
    }
}

FontFamilySelector.propTypes = {
    onFontChoice: PropTypes.func.isRequired,
    maybeGetTypekit: PropTypes.func.isRequired,
    inheritDefault: PropTypes.bool.isRequired,
    selected: PropTypes.oneOfType([PropTypes.string, PropTypes.bool])
}

export default FontFamilySelector;
