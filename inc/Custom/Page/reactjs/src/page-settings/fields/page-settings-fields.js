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
                    value={null !== updatedValue ? updatedValue.sidebar_select : 'no-sidebar'}
                    options={[
                        { label: __('--Select Option--', 'tutorstarter'), value: '' },
                        { label: __('No Sidebar', 'tutorstarter'), value: 'no-sidebar' },
                        { label: __('Left Sidebar', 'tutorstarter'), value: 'left-sidebar' },
                        { label: __('Right Sidebar', 'tutorstarter'), value: 'right-sidebar' },
                    ]}
                    onChange={(value) => updateMeta(value, 'sidebar_select')}
                />
                <SelectControl
                    label={__('Footer', 'tutorstarter')}
                    value={null !== updatedValue ? updatedValue.footer_select : ''}
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
                    checked={null !== updatedValue ? updatedValue.page_title_toggle : false}
                    onChange={(value) => updateMeta(value, 'page_title_toggle')}
                />
                <ToggleControl
                    label={__('Disable Header?', 'tutorstarter')}
                    checked={null !== updatedValue ? updatedValue.header_toggle : false}
                    onChange={(value) => updateMeta(value, 'header_toggle')}
                />
                <ToggleControl
                    label={__('Enable Transparent Header?', 'tutorstarter')}
                    checked={null !== updatedValue ? updatedValue.header_trans_toggle : false}
                    onChange={(value) => updateMeta(value, 'header_trans_toggle')}
                />
                <ToggleControl
                    label={__('Disable Footer?', 'tutorstarter')}
                    checked={null !== updatedValue ? updatedValue.footer_toggle : false}
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