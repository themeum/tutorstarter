const { registerPlugin } = wp.plugins;

import TutorStarterPageSettingsPanel from './page-settings';

let is_page = tutorstarter_admin_page.is_page;

if ('1' === is_page) {
    registerPlugin('tutorstarter-settings-panel', {
        render: TutorStarterPageSettingsPanel,
        icon: ''
    });
}