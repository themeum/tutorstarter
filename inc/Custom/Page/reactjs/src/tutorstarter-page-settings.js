const { registerPlugin } = wp.plugins;

import tutorstarterPageSettingsPanel from './page-settings';

let is_page = tutorstarter_admin.is_page;

if ('1' === is_page) {
    registerPlugin('tutorstarter-settings-panel', {
        render: tutorstarterPageSettingsPanel,
        icon: ''
    });
}
