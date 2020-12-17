import PropTypes from 'prop-types';
import classnames from 'classnames';

const { useState } = wp.element;

const RadioImageComponent = ({ control }) => {
    const [value, setValue] = useState(control.setting.get());
    const { choices, label } = control.params;

    const updateValue = (newVal) => {
        setValue(newVal);
        control.setting.set(newVal);
    }

    const renderOptions = () => Object.keys(choices).map((choice, index) => {
        const { name, image } = choices[choice];
        const buttonClass = classnames([{ active: choice === value }]);
        return (
            <div className='option' key={index}>
                <label>
                    {name && <span>{name}</span>}
                    <button
                        className={buttonClass}
                        onClick={(e) => {
                            e.preventDefault();
                            updateValue(choice);
                        }}
                    >
                        <img src={image} alt={name || `Option ${choice}`} />
                    </button>
                </label>
            </div>
        )
    });

    return (
        <div>
            <div className='tutorstarter-control-header'>
                {label && <span className='customize-control-title'>{label}</span>}
            </div>
            <div className='tutorstarter-radio-image'>
                {renderOptions()}
            </div>
        </div>
    );
}

RadioImageComponent.propTypes = {
    control: PropTypes.object.isRequired
}

export default RadioImageComponent;
