const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { SelectControl, ToggleControl } = wp.components;

const PageSettingsFields = ({ updatedValue, updateMeta }) => {

    let is_page = tutorstarter_admin.is_page;

    if ('1' === is_page) {
        return (
            <Fragment>
                <SelectControl
                    label={__('Sidebar', 'tutorstarter')}
                    value={updatedValue.sidebar_select}
                    options={[
                        { label: __('--Select Option--', 'tutorstarter'), value: '' },
                        { label: __('No Sidebar', 'tutorstarter'), value: 'no-sidebar' },
                        { label: __('Left Sidebar', 'tutorstarter'), value: 'left-sidebar' },
                        { label: __('Right Sidebar', 'tutorstarter'), value: 'right-sidebar' },
                    ]}
                    onChange={(value) => updateMeta(value, 'sidebar_select')}
                />
                <SelectControl
                    label={__('Header', 'tutorstarter')}
                    value={updatedValue.header_select}
                    options={[
                        { label: __('--Select Header--', 'tutorstarter'), value: '' },
                        { label: __('Fullwidth', 'tutorstarter'), value: 'header_one' },
                        { label: __('Fullwidth Transparent', 'tutorstarter'), value: 'header_one_trans' },
                        { label: __('Standard', 'tutorstarter'), value: 'header_two' },
                        { label: __('Standard Transparent', 'tutorstarter'), value: 'header_three' },
                        { label: __('Centered Logo', 'tutorstarter'), value: 'header_four' },
                    ]}
                    onChange={(value) => updateMeta(value, 'header_select')}
                />
                <ToggleControl
                    label={__('Disable Title?', 'tutorstarter')}
                    checked={updatedValue.page_title_toggle}
                    onChange={(value) => updateMeta(value, 'page_title_toggle')}
                />
                <ToggleControl
                    label={__('Disable Header?', 'tutorstarter')}
                    checked={updatedValue.header_toggle}
                    onChange={(value) => updateMeta(value, 'header_toggle')}
                />
                <ToggleControl
                    label={__('Disable Footer?', 'tutorstarter')}
                    checked={updatedValue.footer_toggle}
                    onChange={(value) => updateMeta(value, 'footer_toggle')}
                />
            </Fragment>
        );
    } else {
        return (
            <Fragment>

            </Fragment>
        );
    }
}

export default PageSettingsFields;