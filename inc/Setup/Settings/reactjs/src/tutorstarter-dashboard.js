const { render } = wp.element;
import { BrowserRouter as Router } from 'react-router-dom';

import Dashboard from './index';

render(
    <Router>
        <Dashboard />
    </Router>,
    document.getElementById('tutorstarter-dashboard')
);