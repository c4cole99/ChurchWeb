<?php include 'includes/header.php'; ?>

<!-- Add required libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<div id="root"></div>

<script type="text/babel">
const HomePage = () => {
    React.useEffect(() => {
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Swiper
        new Swiper('.swiper-main', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });

        // Initialize testimonials slider
        new Swiper('.swiper-testimonials', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            },
            pagination: {
                el: '.swiper-pagination-testimonials',
                clickable: true
            }
        });
    }, []);

    return (
        <div className="homepage">
            {/* Video Hero Section */}
            <section className="hero-video position-relative vh-100">
                <video 
                    autoPlay 
                    muted 
                    loop 
                    className="w-100 h-100 object-fit-cover position-absolute"
                >
                    <source src="uploads/bacground.mp4" type="video/mp4" />
                </video>
                <div className="position-absolute w-100 h-100 bg-overlay d-flex align-items-center">
                    <div className="container text-white text-center">
                        <h1 
                            className="display-2 fw-bold mb-4"
                            data-aos="fade-down"
                            data-aos-delay="200"
                        >
                            Welcome to FEMW Church
                        </h1>
                        <p 
                            className="lead mb-4"
                            data-aos="fade-up"
                            data-aos-delay="400"
                        >
                            Transforming Lives Through Christ's Love
                        </p>
                        <div 
                            className="mt-5"
                            data-aos="fade-up"
                            data-aos-delay="600"
                        >
                            <a href="#welcome" className="btn btn-primary btn-lg me-3">Learn More</a>
                            <a href="contact.php" className="btn btn-outline-light btn-lg">Contact Us</a>
                        </div>
                    </div>
                </div>
            </section>

            {/* Main Slider Section */}
            <section className="py-5">
                <div className="container">
                    <div className="swiper swiper-main">
                        <div className="swiper-wrapper">
                            <div className="swiper-slide">
                                <img src="assets/images/slider/slide1.jpg" className="w-100" alt="Church Service" />
                                <div className="slide-content">
                                    <h3>Sunday Service</h3>
                                    <p>Join us every Sunday at 9:00 AM</p>
                                </div>
                            </div>
                            {/* Add more slides */}
                        </div>
                        <div className="swiper-pagination"></div>
                        <div className="swiper-button-next"></div>
                        <div className="swiper-button-prev"></div>
                    </div>
                </div>
            </section>

            {/* Welcome Section */}
            <section id="welcome" className="py-5 bg-light text-center">
                <div className="container">
                    <div className="row align-items-center justify-content-center">
                        <div className="col-lg-6" data-aos="fade-right">
                            <h2 className="section-header">Welcome to Our Church</h2>
                            <div className="cross-divider">✟</div>
                            <p className="lead">Experience the love of Christ in our community</p>
                            <p>Join us in worship and fellowship as we grow together in faith.</p>
                        </div>
                    </div>
                    {/* Sliding Text for Service Times */}
                    <div className="mt-4">
                        <div className="sliding-text">
                            <h3 className="h4 text-primary">
                                <span className="slide active">Join Us This Sunday: 9:00 AM - 11:00 AM</span>
                                <span className="slide">Children's Ministry: Sundays at 9:00 AM</span>
                                <span className="slide">Midweek Bible Study: Wednesdays at 7:00 PM</span>
                                <span className="slide">Youth Group: Fridays at 6:00 PM</span>
                                <span className="slide">Join us for our Special Events!</span>
                            </h3> 
                        </div>
                    </div>
                </div>
            </section>

            {/* Testimonials Section */}
            <section className="py-5">
                <div className="container">
                    <h2 className="section-header text-center mb-5">Testimonials</h2>
                    <div className="swiper swiper-testimonials">
                        <div className="swiper-wrapper">
                            {/* Add testimonial slides */}
                        </div>
                        <div className="swiper-pagination-testimonials"></div>
                    </div>
                </div>
            </section>

            {/* Upcoming Events Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="section-header text-center" data-aos="fade-up">Upcoming Events</h2>
                    <div className="cross-divider">✟</div>
                    
                    <div className="row g-4">
                        {/* Featured Events Slider */}
                        <div className="swiper swiper-events">
                            <div className="swiper-wrapper">
                                <div className="swiper-slide" data-aos="fade-up" data-aos-delay="100">
                                    <div className="event-card">
                                        <div className="event-date">
                                            <span className="day">25</span>
                                            <span className="month">DEC</span>
                                        </div>
                                        <img src="assets/images/events/christmas-service.jpg" alt="Christmas Service" className="img-fluid" />
                                        <div className="event-content">
                                            <h3>Christmas Service</h3>
                                            <p className="mb-2"><i className="fas fa-clock me-2"></i>9:00 AM - 11:00 AM</p>
                                            <p className="mb-2"><i className="fas fa-map-marker-alt me-2"></i>Main Sanctuary</p>
                                            <a href="events.php" className="btn btn-primary mt-3">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                {/* Add more event slides */}
                            </div>
                            <div className="swiper-pagination-events"></div>
                        </div>
                    </div>
                    
                    <div className="text-center mt-5">
                        <a href="events.php" className="btn btn-lg btn-primary" data-aos="fade-up">
                            View All Events
                        </a>
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<HomePage />, document.getElementById('root'));
</script>

<style>
/* Hero Video Styles */
.bg-overlay {
    background: rgba(0, 0, 0, 0.5);
}

/* Slider Styles */
.swiper-main {
    border-radius: 15px;
    overflow: hidden;
}

.slide-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
}

/* Testimonial Styles */
.testimonial-card {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* Animation Classes */
.fade-up {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

.fade-up.active {
    opacity: 1;
    transform: translateY(0);
}

.rounded-top-left {
    border-top-left-radius: 2rem;
}

/* Sliding Text Animation */
.sliding-text {
    overflow: hidden;
    white-space: nowrap;
    box-sizing: border-box;
    position: relative;
}

.sliding-text h3 {
    display: inline-block;
}

.slide {
    display: none; /* Hide all slides by default */
}

.slide.active {
    display: inline-block; /* Show only the active slide */
    animation: fade 1s ease-in-out; /* Add fade-in animation */
}

@keyframes fade {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

/* Logo Size Adjustment */
.logo-size {
    max-width: 10%; /* Adjust this value as needed */
    height: auto; /* Maintain aspect ratio */
}

/* Centering and Inverted Pyramid Layout */
#welcome {
    position: relative;
}

.section-header {
    font-size: 2.5rem; /* Adjust size as needed */
}

.cross-divider {
    font-size: 2rem;
    margin: 1rem 0;
}

.lead {
    font-size: 1.25rem; /* Adjust size as needed */
}

.mt-4 {
    margin-top: 2rem; /* Adjust spacing as needed */
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function showNextSlide() {
            slides[currentIndex].classList.remove('active'); // Hide current slide
            currentIndex = (currentIndex + 1) % slides.length; // Move to the next slide
            slides[currentIndex].classList.add('active'); // Show next slide
        }

        // Check if there are slides before setting the interval
        if (slides.length > 0) {
            slides[currentIndex].classList.add('active'); // Show the first slide
            setInterval(showNextSlide, 3000); // Change slide every 3 seconds
        }
    });
</script>

<?php include 'includes/footer.php'; ?> 