const { __ } = wp.i18n;
const { Fragment, useState } = wp.element;
const { SelectControl, ToggleControl } = wp.components;

const PageSettingsFields = () => {

    let page_meta = JSON.parse( tutorstarter_admin_schema.page_meta );

    const[page_title_toggle, setDisableTitle] = useState(page_meta.page_title_toggle);
    const[header_toggle, setDisableHeader] = useState(page_meta.header_toggle);
    const[footer_toggle, setDisableFooter] = useState(page_meta.footer_toggle);
    const[sidebar_select, setSidebar] = useState( page_meta.sidebar_select );
    const[header_select, setHeader] = useState( page_meta.header_select );
    const[footer_select, setFooter] = useState( page_meta.footer_select );

    return (
        <Fragment>
            <SelectControl
                label={__('Sidebar', 'tutorstarter')}
                id='sidebar_select'
                name='sidebar_select'
                value={sidebar_select}
                options={[
                    { label: __('--Select Option--', 'tutorstarter'), value: '' },
                    { label: __('No Sidebar', 'tutorstarter'), value: 'no-sidebar' },
                    { label: __('Left Sidebar', 'tutorstarter'), value: 'left-sidebar' },
                    { label: __('Right Sidebar', 'tutorstarter'), value: 'right-sidebar' },
                ]}
                onChange={(value) => setSidebar(value)}
            />
            <SelectControl
                label={__('Header', 'tutorstarter')}
                id='header_select'
                name='header_select'
                value={header_select}
                options={[
                    { label: __('--Select Header--', 'tutorstarter'), value: '' },
                    { label: __('Fullwidth', 'tutorstarter'), value: 'header_one' },
                    { label: __('Fullwidth Transparent', 'tutorstarter'), value: 'header_one_trans' },
                    { label: __('Standard', 'tutorstarter'), value: 'header_two' },
                    { label: __('Standard Transparent', 'tutorstarter'), value: 'header_three' },
                    { label: __('Centered Logo', 'tutorstarter'), value: 'header_four' },
                ]}
                onChange={(value) => setHeader(value)}
            />
            <SelectControl
                label={__('Footer', 'tutorstarter')}
                id='footer_select'
                name='footer_select'
                value={footer_select}
                options={[
                    { label: __('--Select Footer--', 'tutorstarter'), value: '' },
                    { label: __('Type 1', 'tutorstarter'), value: 'footer_one' },
                    { label: __('Type 2', 'tutorstarter'), value: 'footer_two' },
                    { label: __('Type 3', 'tutorstarter'), value: 'footer_three' },
                    { label: __('Type 4', 'tutorstarter'), value: 'footer_four' },
                    { label: __('Type 5', 'tutorstarter'), value: 'footer_five' },
                ]}
                onChange={(value) => setFooter(value)}
            />
            <ToggleControl
                label={__('Disable Title?', 'tutorstarter')}
                id='page_title_toggle'
                name='page_title_toggle'
                checked={page_title_toggle}
                onChange={(value) => setDisableTitle(value)}
            />
            <ToggleControl
                label={__('Disable Header?', 'tutorstarter')}
                id='header_toggle'
                name='header_toggle'
                checked={header_toggle}
                onChange={(value) => setDisableHeader(value)}
            />
            <ToggleControl
                label={__('Disable Footer?', 'tutorstarter')}
                id='footer_toggle'
                name='footer_toggle'
                checked={footer_toggle}
                onChange={(value) => setDisableFooter(value)}
            />
        </Fragment>
    );
}

export default PageSettingsFields;