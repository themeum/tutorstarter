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
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_colors_section`} target="_blank">Colors</a>
                                    </div>
                                    <div className="item">
                                        <i class="fas fa-columns"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_layout_section`} target="_blank">Layout</a>
                                    </div>
                                </li>
                                <li>
                                    <div className="item">
                                        <i class="fas fa-paint-roller"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_header_section`} target="_blank">Header</a>
                                    </div>
                                    <div className="item">
                                        <i className="fas fa-th"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_footer_section`} target="_blank">Footer</a>
                                    </div>
                                </li>
                                <li>
                                    <div className="item">
                                        <i className="fas fa-font"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_typography_section`} target="_blank">Typography</a>
                                    </div>
                                    <div className="item">
                                        <i className="far fa-edit"></i>
                                        <a href={`${adminUrl}customize.php?autofocus[section]=tutorstarter_blog_section`} target="_blank">Blog</a>
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
                            <img
                                width="760"
                                height="560"
                                src="https://qubely.io/wp-content/uploads/2020/11/Fundraising.png"
                                alt=""
                            />
                            <div className="miscellaneous">
                                <p>With Tutor Starter, your creativity just got a power-up! Enjoy the freedom of customization and speed that you never had before.</p>
                                <a href="https://qubely.io">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    )
}

export default General;