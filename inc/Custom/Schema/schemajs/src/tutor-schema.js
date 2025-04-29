const { render } = wp.element;

import TutorSchemaFields from './schema/fields/schema-fields';

render(
    <TutorSchemaFields />,
    document.getElementById('tutorstarter-schema-data')
);