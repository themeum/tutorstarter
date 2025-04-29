import PropTypes from 'prop-types';

const { __ } = wp.i18n;
const { ToggleControl } = wp.components;
const { useState, useEffect } = wp.element;

const ToggleSwitchComponent = ({ control }) => {

    useEffect(() => {
        document.addEventListener('tutorstarter-customizer-event', (e) => {
            if (!e.detail) {
                return false;
            }
            if (e.detail.id !== control.id) {
                return false;
            }
            setValue(e.detail.value);
        })
    }, [])

    const [value, setValue] = useState(control.setting.get());

    return (
        <div className='tutorstarter-background-control flex-contents'>
            <ToggleControl
                className='tutorstarter-toggle-control'
                checked={value}
                label={control.params.label}
                onChange={(updatedValue) => {
                    setValue(updatedValue);
                    control.setting.set(updatedValue);
                }}
            />
        </div>
    );
}

ToggleSwitchComponent.propTypes = {
    control: PropTypes.object.isRequired
}

export default ToggleSwitchComponent;