const { registerPlugin } = wp.plugins;

import TutorstarterSchemaPanel from './schema';

registerPlugin('tutorstarter-schema-panel', {
    render: TutorstarterSchemaPanel,
    icon: ''
});
