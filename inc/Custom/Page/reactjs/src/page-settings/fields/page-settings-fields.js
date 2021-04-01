const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { SelectControl, ToggleControl } = wp.components;

const PageSettingsFields = ({ updatedValue, updateMeta }) => {

    let is_page = tutorstarter_admin_page.is_page;

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
                        { label: __('Header Default', 'tutorstarter'), value: 'header_default' },
                        { label: __('Header Transparent', 'tutorstarter'), value: 'header_transparent' },
                        { label: __('Header Right', 'tutorstarter'), value: 'header_right' },
                        { label: __('Header Fullwidth', 'tutorstarter'), value: 'header_fullwidth' },
                    ]}
                    onChange={(value) => updateMeta(value, 'header_select')}
                />
                <SelectControl
                    label={__('Footer', 'tutorstarter')}
                    value={updatedValue.footer_select}
                    options={[
                        { label: __('--Select Footer--', 'tutorstarter'), value: '' },
                        { label: __('Type 1', 'tutorstarter'), value: 'footer_one' },
                        { label: __('Type 2', 'tutorstarter'), value: 'footer_two' },
                        { label: __('Type 3', 'tutorstarter'), value: 'footer_three' },
                        { label: __('Type 4', 'tutorstarter'), value: 'footer_four' },
                        { label: __('Type 5', 'tutorstarter'), value: 'footer_five' },
                    ]}
                    onChange={(value) => updateMeta(value, 'footer_select')}
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