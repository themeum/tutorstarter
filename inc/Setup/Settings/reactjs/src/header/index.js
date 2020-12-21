import { Link } from 'react-router-dom';

const Header = () => {
    return (
        <header>
            <div className="navigation-container">
                <Link to='/wp-admin/admin.php?page=tutorstarter'>
                    General
                </Link>
                <Link to='/wp-admin/admin.php?page=demo-import'>
                    Demo Import
                </Link>
                <Link to='/wp-admin/admin.php?page=tutorstarter-useful-plugins'>
                    Useful Plugins
                </Link>
                <Link to='/wp-admin/admin.php?page=tutorstarter-extra-resources'>
                    Extra Resources
                </Link>
            </div>
        </header>
    );
}

export default Header;