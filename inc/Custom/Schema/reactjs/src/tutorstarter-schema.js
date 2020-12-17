const { registerPlugin } = wp.plugins;

import QubelyStartersSchemaPanel from './schema';

registerPlugin('tutorstarter-schema-panel', {
    render: QubelyStartersSchemaPanel,
    icon: ''
});
