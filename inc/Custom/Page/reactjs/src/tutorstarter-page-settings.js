const { render } = wp.element;

import PageSettingsFields from './page-settings/fields/page-settings-fields';

render(
    <PageSettingsFields />,
    document.getElementById('tutorstarter-page-settings')
);