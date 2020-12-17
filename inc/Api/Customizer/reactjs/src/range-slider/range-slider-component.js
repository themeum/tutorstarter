import PropTypes from 'prop-types';

const { RangeControl } = wp.components;
const { useState, useEffect } = wp.element;

const RangeSliderComponent = ({ control }) => {

    useEffect(() => {
        document.addEventListener('qubelystarters-customizer-event', (e) => {
            if (!e.detail) return false;
            if (e.detail.id !== control.id) return false;
            updateValues(e.detail.value);
        });
    }, []);

    const [value, setValue] = useState(control.setting.get());
    const defaults = { min: 0, max: 100, defaultVal: 16, step: 1 };
    const controlProps = { ...defaults, ...(control.params.input_attrs || {}) };
    const { label } = control.params;
    const { defaultVal, min, max, step } = controlProps;

    const updateValues = (newVal) => {
        setValue(newVal);
        control.setting.set(newVal);
    }

    return (
        <div className='qubelystarters-background-control qubelystarters-range-control'>
            <div className='qubelystarters-control-header'>
                {label && <span className='customize-control-title'>{label}</span>}
            </div>
            <div className='range-wrap'>
                <RangeControl
                    resetFallbackValue={defaultVal === 0 ? 0 : (defaultVal || '')}
                    value={parseInt(value) === 0 ? 0 : (value || '')}
                    min={min < 0 ? min : 0}
                    max={max || 100}
                    step={step || 1}
                    allowReset
                    onChange={updateValues}
                />
            </div>
        </div>
    )
}

RangeSliderComponent.propTypes = {
    control: PropTypes.object.isRequired
}

export default RangeSliderComponent;
