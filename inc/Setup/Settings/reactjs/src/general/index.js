const General = () => {

    const adminUrl = tutorstarter_dashboard.admin_url;

    return (
        <div className="thm-opt-wrapper">
            <header className="thm-opt-header">
                <div className="thm-opt-container header-content">
                    <div className="thm-title">
                        <h1>Tutor Starter</h1>
                    </div>
                    <p style={{fontWeight: 200, fontSize: '16px'}}> - v{tutorstarter_dashboard.theme_version}</p>
                </div>
                <h4 className="title">
                    <span>Customizer Quick Links</span>
                </h4>
            </header>
            <main className="thm-opt-container">
                <div className="thm-opt-content">
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_colors_section`}>
                        <i className="fas fa-paint-brush"></i>
                        <p>Colors</p>
                    </a>
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_layout_section`}>
                        <i className="fas fa-columns"></i>
                        <p>Layouts</p>
                    </a>
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_header_section`}>
                        <i className="fas fa-paint-roller"></i>
                        <p>Header</p>
                    </a>
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_footer_section`}>
                        <i className="fas fa-th"></i>
                        <p>Footer</p>
                    </a>
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_typography_section`}>
                        <i className="fas fa-font"></i>       
                        <p>Typography</p>
                    </a>
                    <a className="thm-opt-card" href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_blog_section`}>
                        <i className="far fa-edit"></i>
                        <p>Blog</p>
                    </a>
                </div>
            </main>
        </div>
    )
}

export default General;