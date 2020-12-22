const General = () => {

    const adminUrl = tutorstarter_dashboard.admin_url;

    return (
        <div className="thm-opt-wrapper">
            <header className="thm-opt-header">
                <div className="thm-opt-container header-content">
                    <div className="thm-title">
                        <h1>Tutor Starter</h1>
                    </div>
                    <div className="thm-tagline">Version <span><strong>1.0.0</strong></span></div>
                </div>
            </header>
            <main className="thm-opt-container">
                <div className="thm-opt-content">
                    <div className="thm-opt-main">
                        <div className="thm-opt-card">
                            <h4 className="title">
                                <span>Customizer Quick Links</span>
                            </h4>
                            <ul className="links">
                                <li>
                                    <div className="item">
                                        <i className="fas fa-paint-brush"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_colors_section`}>Colors</a>
                                    </div>
                                    <div className="item">
                                        <i className="fas fa-columns"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_layout_section`}>Layout</a>
                                    </div>
                                </li>
                                <li>
                                    <div className="item">
                                        <i className="fas fa-paint-roller"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_header_section`}>Header</a>
                                    </div>
                                    <div className="item">
                                        <i className="fas fa-th"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_footer_section`}>Footer</a>
                                    </div>
                                </li>
                                <li>
                                    <div className="item">
                                        <i className="fas fa-font"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_typography_section`}>Typography</a>
                                    </div>
                                    <div className="item">
                                        <i className="far fa-edit"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_blog_section`}>Blog</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div className="thm-opt-sidebar">
                        <div className="thm-opt-card">
                            <h4 className="title">
                                <i className="fas fa-paint-brush"></i>
                                <span>Unleash your creativity</span>
                            </h4>
                            <div className="miscellaneous">
                                <p>With Tutor Starter, your creativity just got a power-up! Enjoy the freedom of customization and speed that you never had before.</p>
                                <a href="https://www.themeum.com/product/tutor-lms/">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    )
}

export default General;