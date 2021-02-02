const { useState } = wp.element;
const { ColorPicker } = wp.components;
 
const ColorComponent = ( { control } ) => {

    const [ color, setColor ] = useState( control.setting.get() );
    const [ displayColor, setDisplayColor ] = useState( false );

    const displayColorContainer = () => {
        setDisplayColor( ! displayColor );
    }

    return (
        <div className='tutorstarter-background-control'>
            <div className='color-control'>
                <span className='customize-control-title'>
                    { control.params.label }
                </span>
                <div className='color-box' style={{backgroundColor: `rgba(${color.rgb.r}, ${color.rgb.g}, ${color.rgb.b}, ${color.rgb.a})`}} onClick={displayColorContainer}></div>
            </div>
           { displayColor && <div className='color-popup'>
            <ColorPicker
                color={ color }
                onChangeComplete={ ( updatedColor ) => {
                    setColor( updatedColor );
                    control.setting.set( updatedColor );
                } }
            />
            </div>}
        </div>
    );
}

export default ColorComponent;
