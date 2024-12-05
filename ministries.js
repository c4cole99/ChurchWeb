function MinistriesPage() {
    return (
        <div className="ministries-page">
            {/* Hero Section */}
            <section className="hero-section">
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-3 fw-bold" data-aos="fade-down">
                            Our Ministries
                        </h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">
                            Serving God Through Different Callings
                        </p>
                    </div>
                </div>
            </section>

            {/* Ministries List - Updated to full-width rows */}
            <section className="ministries-section">
                {ministries.map(ministry => (
                    <div key={ministry.id} className="ministry-row" data-aos="fade-up">
                        <a href={`ministry.php?id=${ministry.id}`} className="ministry-container">
                            <div className="ministry-image">
                                <img src={ministry.image[0]} alt={ministry.name} />
                            </div>
                            <div className="ministry-content">
                                <h2 className="ministry-name">{ministry.name}</h2>
                                <p className="ministry-description">{ministry.description}</p>
                            </div>
                        </a>
                    </div>
                ))}
            </section>
        </div>
    );
} 

