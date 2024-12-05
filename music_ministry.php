<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
function MusicMinistryPage() {
    return (
        <div className="ministry-page">
            {/* Hero Section with Image Carousel */}
            <section className="hero-section py-5 text-center">
                <div id="carouselExample" className="carousel slide" data-ride="carousel">
                    <div className="carousel-inner">
                        <div className="carousel-item active">
                            <img src="uploads/musc1.jpg" className="d-block w-100" alt="First slide" />
                        </div>
                        <div className="carousel-item">
                            <img src="uploads/musc2.jpg" className="d-block w-100" alt="Second slide" />
                        </div>
                        <div className="carousel-item">
                            <img src="uploads/musc3.jpg" className="d-block w-100" alt="Third slide" />
                        </div>
                    </div>
                    <a className="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span className="sr-only">Previous</span>
                    </a>
                    <a className="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                        <span className="sr-only">Next</span>
                    </a>
                </div>
            </section>

            {/* About Section */}
            <section className="py-5">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-10">
                            <div className="card shadow-sm">
                                <div className="card-body p-4">
                                    <h2 className="text-center mb-4">About Music Ministry</h2>
                                    <p className="mb-3">
                                        The Music Ministry of Faith Evangelical Mission Worldwide is dedicated to leading 
                                        the congregation in worship through song and instrumental music. We believe in 
                                        using our musical gifts to glorify God and create an atmosphere of worship.
                                    </p>
                                    <p className="mb-3">
                                        Our ministry comprises dedicated vocalists and instrumentalists who serve with 
                                        excellence and passion. Through regular practice and spiritual preparation, 
                                        we aim to facilitate meaningful worship experiences.
                                    </p>
                                    <div className="text-center mt-4">
                                        <blockquote className="blockquote">
                                            <p className="mb-0">
                                                "Make a joyful noise unto the Lord, all the earth: make a loud noise, 
                                                and rejoice, and sing praise."
                                            </p>
                                            <footer className="blockquote-footer">Psalm 98:4</footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Teams Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="text-center mb-5">Our Teams</h2>
                    <div className="row g-4">
                        {/* Choir */}
                        <div className="col-md-6">
                            <div className="card h-100">
                                <div className="card-body">
                                    <h3 className="card-title">Choir</h3>
                                    <p className="card-text">
                                        Our choir leads the congregation in worship through powerful vocal performances.
                                    </p>
                                    <p className="mb-2"><strong>Leader:</strong> Brother/Sister [Name]</p>
                                    <p className="mb-0"><strong>Practice:</strong> Thursdays at 6:00 PM</p>
                                </div>
                            </div>
                        </div>

                        {/* Instrumentalists */}
                        <div className="col-md-6">
                            <div className="card h-100">
                                <div className="card-body">
                                    <h3 className="card-title">Instrumentalists</h3>
                                    <p className="card-text">
                                        Our instrumental team provides musical accompaniment and special performances.
                                    </p>
                                    <p className="mb-2"><strong>Leader:</strong> Brother [Name]</p>
                                    <p className="mb-0"><strong>Practice:</strong> Saturdays at 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Leadership Section */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5">Our Leadership</h2>
                    <div className="row g-4 justify-content-center">
                        <div className="col-md-4">
                            <div className="card text-center">
                                <div className="card-body">
                                    <h4 className="card-title">Brother [Name]</h4>
                                    <p className="text-muted">Music Director</p>
                                    <a href="mailto:music.director@email.com" className="btn btn-outline-primary">
                                        Contact
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
}

// Render the component
ReactDOM.render(<MusicMinistryPage />, document.getElementById('root'));
</script>

<style>
.hero-section {
    position: relative;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.blockquote {
    font-size: 1.1rem;
    color: #555;
}

.blockquote-footer {
    color: #777;
}
</style>

<?php include 'includes/footer.php'; ?> 