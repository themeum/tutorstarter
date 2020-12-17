const { registerPlugin } = wp.plugins;

import TutorStarterSchemaPanel from './schema';

registerPlugin('tutorstarter-schema-panel', {
    render: TutorStarterSchemaPanel,
    icon: ''
});
