const { __ } = wp.i18n;
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
                sidebar_select: '',
                footer_select: '',
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
            title={__( 'Tutor Starter Page Settings', 'tutorstarter' )}
        >
            <PageSettingsFieldsData />
        </PluginDocumentSettingPanel>
    )
}

export default TutorStarterPageSettingsPanel;