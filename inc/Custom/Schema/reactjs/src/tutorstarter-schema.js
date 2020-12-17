const { registerPlugin } = wp.plugins;

import QubelyStartersSchemaPanel from './schema';

registerPlugin('qubelystarters-schema-panel', {
    render: QubelyStartersSchemaPanel,
    icon: ''
});
