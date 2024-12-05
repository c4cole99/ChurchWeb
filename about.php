<?php include 'includes/header.php'; ?>

<!-- Add required libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<div id="root"></div>

<script type="text/babel">
const AboutPage = () => {
    const [activeTab, setActiveTab] = React.useState('history');
    const [isVideoPlaying, setIsVideoPlaying] = React.useState(false);

    React.useEffect(() => {
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Light Gallery
        const galleries = document.querySelectorAll('.gallery');
        galleries.forEach(gallery => {
            lightGallery(gallery, {
                speed: 500,
                download: false
            });
        });

        // Initialize Timeline Slider
        new Swiper('.timeline-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });

        // Initialize Leadership Slider
        new Swiper('.leadership-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    }, []);

    const timelineEvents = [
        {
            year: "1990",
            title: "Church Foundation",
            description: "FEMW Church was established with a small congregation.",
            image: "assets/images/about/timeline/1990.jpg"
        },
        // Add more timeline events...
    ];

    const leadershipTeam = [
        {
            name: "Rev. [Name]",
            role: "Senior Pastor",
            image: "assets/images/about/leadership/senior-pastor.jpg",
            bio: "Leading the church since [year]..."
        },
        // Add more leadership members...
    ];

    const galleryImages = [
        {
            src: "assets/images/about/gallery/1.jpg",
            thumb: "assets/images/about/gallery/thumbs/1.jpg",
            title: "Church Service"
        },
        // Add more gallery images...
    ];

    return (
        <div className="about-page">
            {/* Hero Section */}
            <section className="hero-section position-relative">
                <video 
                    className="w-100 h-100 object-fit-cover position-absolute"
                    autoPlay 
                    muted 
                    loop
                >
                    <source src="assets/videos/about-hero.mp4" type="video/mp4" />
                </video>
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-3 fw-bold" data-aos="fade-down">About Our Church</h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">A Community of Faith, Love, and Service</p>
                    </div>
                </div>
            </section>

            {/* Navigation Tabs */}
            <section className="py-5">
                <div className="container">
                    <ul className="nav nav-pills justify-content-center mb-5" data-aos="fade-up">
                        <li className="nav-item">
                            <button 
                                className={`nav-link ${activeTab === 'history' ? 'active' : ''}`}
                                onClick={() => setActiveTab('history')}
                            >
                                Our History
                            </button>
                        </li>
                        <li className="nav-item">
                            <button 
                                className={`nav-link ${activeTab === 'vision' ? 'active' : ''}`}
                                onClick={() => setActiveTab('vision')}
                            >
                                Vision & Mission
                            </button>
                        </li>
                        <li className="nav-item">
                            <button 
                                className={`nav-link ${activeTab === 'leadership' ? 'active' : ''}`}
                                onClick={() => setActiveTab('leadership')}
                            >
                                Leadership
                            </button>
                        </li>
                        <li className="nav-item">
                            <button 
                                className={`nav-link ${activeTab === 'gallery' ? 'active' : ''}`}
                                onClick={() => setActiveTab('gallery')}
                            >
                                Gallery
                            </button>
                        </li>
                    </ul>

                    {/* Tab Content */}
                    <div className="tab-content">
                        {/* History Tab */}
                        <div className={`tab-pane fade ${activeTab === 'history' ? 'show active' : ''}`}>
                            <div className="row g-4">
                                <div className="col-lg-6" data-aos="fade-right">
                                    <h2 className="section-header">Our Journey of Faith</h2>
                                    <div className="cross-divider">✟</div>
                                    <p className="lead">From humble beginnings to a thriving community</p>
                                    <p>Detailed history text goes here...</p>
                                </div>
                                <div className="col-lg-6" data-aos="fade-left">
                                    <div className="swiper timeline-slider">
                                        <div className="swiper-wrapper">
                                            {timelineEvents.map((event, index) => (
                                                <div key={index} className="swiper-slide">
                                                    <div className="timeline-card">
                                                        <img src={event.image} alt={event.title} />
                                                        <div className="timeline-content">
                                                            <span className="year">{event.year}</span>
                                                            <h3>{event.title}</h3>
                                                            <p>{event.description}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            ))}
                                        </div>
                                        <div className="swiper-button-next"></div>
                                        <div className="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Vision & Mission Tab */}
                        <div className={`tab-pane fade ${activeTab === 'vision' ? 'show active' : ''}`}>
                            <div className="row g-4">
                                <div className="col-lg-6" data-aos="fade-up">
                                    <div className="vision-card">
                                        <h3>Our Vision</h3>
                                        <p>Vision statement goes here...</p>
                                    </div>
                                </div>
                                <div className="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                    <div className="mission-card">
                                        <h3>Our Mission</h3>
                                        <p>Mission statement goes here...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Leadership Tab */}
                        <div className={`tab-pane fade ${activeTab === 'leadership' ? 'show active' : ''}`}>
                            <div className="swiper leadership-slider">
                                <div className="swiper-wrapper">
                                    {leadershipTeam.map((leader, index) => (
                                        <div key={index} className="swiper-slide">
                                            <div className="leader-card" data-aos="fade-up">
                                                <div className="leader-image">
                                                    <img src={leader.image} alt={leader.name} />
                                                </div>
                                                <div className="leader-content">
                                                    <h3>{leader.name}</h3>
                                                    <p className="role">{leader.role}</p>
                                                    <p className="bio">{leader.bio}</p>
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                                <div className="swiper-pagination"></div>
                            </div>
                        </div>

                        {/* Gallery Tab */}
                        <div className={`tab-pane fade ${activeTab === 'gallery' ? 'show active' : ''}`}>
                            <div className="gallery row g-4">
                                {galleryImages.map((image, index) => (
                                    <div key={index} className="col-md-4 col-lg-3" data-aos="fade-up">
                                        <a href={image.src} className="gallery-item">
                                            <img src={image.thumb} alt={image.title} className="img-fluid" />
                                        </a>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<AboutPage />, document.getElementById('root'));
</script>

<style>
/* Hero Section */
.hero-section {
    height: 60vh;
    position: relative;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Navigation Pills */
.nav-pills .nav-link {
    color: var(--church-primary);
    border: 1px solid var(--church-primary);
    margin: 0 5px;
    border-radius: 20px;
    padding: 8px 20px;
}

.nav-pills .nav-link.active {
    background-color: var(--church-primary);
    color: white;
}

/* Timeline Card */
.timeline-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.timeline-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.timeline-content {
    padding: 1.5rem;
}

.year {
    display: inline-block;
    background: var(--church-primary);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    margin-bottom: 10px;
}

/* Leadership Card */
.leader-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.leader-image {
    height: 300px;
    overflow: hidden;
}

.leader-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.leader-content {
    padding: 1.5rem;
}

/* Gallery */
.gallery-item {
    display: block;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: scale(1.05);
}

/* Vision & Mission Cards */
.vision-card,
.mission-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    height: 100%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.vision-card:hover,
.mission-card:hover {
    transform: translateY(-5px);
}
</style>

<?php include 'includes/footer.php'; ?> 