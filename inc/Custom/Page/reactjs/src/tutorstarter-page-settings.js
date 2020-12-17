const { registerPlugin } = wp.plugins;

import QubelyStartersPageSettingsPanel from './page-settings';

let is_page = qubelystarters_admin.is_page;

if ('1' === is_page) {
    registerPlugin('qubelystarters-settings-panel', {
        render: QubelyStartersPageSettingsPanel,
        icon: ''
    });
}
