import { useLocation } from 'react-router-dom';

import General from './general';
import DemoImport from './demo-import';
import Header from './header';

const { Fragment } = wp.element;

const useQuery = () => {
    return new URLSearchParams(useLocation().search);
  }

const Dashboard = () => {
    let query = useQuery();
    return (
        <Fragment>
            <Header />
            <PageComponent page={query.get('page')} />
        </Fragment>
    );
}

const PageComponent = ({ page }) => {
    return (
        <Fragment>
            {'tutorstarter' === page && <General />}
            {'demo-import' === page && <DemoImport />}
        </Fragment>
    )
}

export default Dashboard;