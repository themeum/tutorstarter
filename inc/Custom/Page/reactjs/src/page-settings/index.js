const { compose } = wp.compose;
const { PluginDocumentSettingPanel } = wp.editPost;
const { select, withSelect, withDispatch } = wp.data;

import PageSettingsFields from './fields/page-settings-fields';

const PageSettingsFieldsData = compose([
    withSelect(() => {
        return {
            updatedValue: select('core/editor').getEditedPostAttribute('meta')._tutorstarter_page_metadata,
        }
    }),
    withDispatch((dispatch) => ({
        updateMeta(value, prop) {
            let meta = select('core/editor').getEditedPostAttribute('meta')._tutorstarter_page_metadata;
            meta = {
                sidebar_select: 'no-sidebar',
                footer_select: 'footer_four',
                page_title_toggle: false,
                header_toggle: false,
                header_trans_toggle: false,
                footer_toggle: false,
                ...meta
            };
            meta[prop] = value;

            dispatch('core/editor').editPost({ meta: { _tutorstarter_page_metadata: meta } });
        }
    })),
])(PageSettingsFields);

const TutorStarterPageSettingsPanel = () => {

    return (
        <PluginDocumentSettingPanel
            name='tutorstarter-settings-panel'
            title='Tutor Starter Page Settings'
        >
            <PageSettingsFieldsData />
        </PluginDocumentSettingPanel>
    )
}

export default TutorStarterPageSettingsPanel;