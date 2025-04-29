const { __ } = wp.i18n;

const General = () => {

    const adminUrl = tutorstarter_dashboard.admin_url;

    return (
        <div className="tutorstarter-opt-wrapper">
            <header className="tutorstarter-opt-header">
                <div className="tutorstarter-opt-container header-content">
                    <div className="thm-title">
                        <h1>{__('Tutor Starter', 'tutorstarter')}</h1>
                    </div>
                    <p style={{fontWeight: 200, fontSize: '16px'}}> - v{tutorstarter_dashboard.theme_version}</p>
                </div>
                <h4 className="title">
                    <span>{__('Customizer Quick Links', 'tutorstarter')}</span>
                </h4>
            </header>
            <main className="tutorstarter-opt-container">
                <div className="tutorstarter-opt-content">
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_colors_section`}>
                        <span className="dashicons dashicons-color-picker"></span>
                        <p>{__('Colors', 'tutorstarter')}</p>
                    </a>
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_layout_section`}>
                        <span className="dashicons dashicons-layout"></span>
                        <p>{__('Layouts', 'tutorstarter')}</p>
                    </a>
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_header_section`}>
                        <span className="dashicons dashicons-archive"></span>
                        <p>{__('Header', 'tutorstarter')}</p>
                    </a>
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_footer_section`}>
                        <span className="dashicons dashicons-table-row-before"></span>
                        <p>{__('Footer', 'tutorstarter')}</p>
                    </a>
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_typography_section`}>
                        <span className="dashicons dashicons-editor-spellcheck"></span>      
                        <p>{__('Typography', 'tutorstarter')}</p>
                    </a>
                    <a className="tutorstarter-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_blog_section`}>
                        <span className="dashicons dashicons-edit-page"></span>
                        <p>{__('Blog', 'tutorstarter')}</p>
                    </a>
                </div>
            </main>
        </div>
    )
}

export default General;