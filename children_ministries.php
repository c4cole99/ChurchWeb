<?php include 'includes/header.php'; ?>

<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Lightbox for gallery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<div id="root"></div>

<script type="text/babel">
function ChildrenMinistries() {
    React.useEffect(() => {
        AOS.init({
            duration: 1000,
            once: true
        });

        const filterButtons = document.querySelectorAll('.btn-group .btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');
                
                const category = button.textContent;
                const galleryItems = document.querySelectorAll('.gallery-item');
                
                galleryItems.forEach(item => {
                    if (category === 'All' || item.dataset.category === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }, []);

    const ageGroups = [
        {
            name: "Little Lambs",
            age: "Ages 2-4",
            description: "Early childhood program focusing on basic Bible stories and God's love",
            activities: ["Songs & Dance", "Bible Stories", "Arts & Crafts", "Playtime"]
        },
        {
            name: "Kingdom Kids",
            age: "Ages 5-7",
            description: "Building foundational faith through interactive learning",
            activities: ["Sunday School", "Bible Memory Verses", "Puppet Shows", "Group Activities"]
        },
        {
            name: "Faith Warriors",
            age: "Ages 8-12",
            description: "Deeper biblical understanding and character development",
            activities: ["Bible Study", "Leadership Training", "Community Service", "Worship Team"]
        }
    ];

    const upcomingEvents = [
        {
            title: "Vacation Bible School",
            date: "July 15-19, 2024",
            time: "9:00 AM - 12:00 PM",
            description: "A week of fun, learning, and adventure with Jesus!"
        },
        {
            title: "Children's Christmas Program",
            date: "December 18, 2024",
            time: "6:00 PM",
            description: "Annual holiday celebration featuring our children's choir and drama team"
        },
        {
            title: "Easter Egg Hunt",
            date: "March 31, 2024",
            time: "10:00 AM",
            description: "Community event with games, prizes, and the Easter story"
        }
    ];

    const leadershipTeam = [
        {
            role: "Children's Ministry Director",
            name: "Sister Sarah Johnson",
            image: "uploads/mogmusicc-e1656425716593.jpg",
            message: "Welcome to our Children's Ministry! Our passion is to see every child grow in their relationship with Jesus Christ. We believe in creating a fun, safe, and nurturing environment where children can learn about God's love.",
            contact: "sarah.johnson@church.com"
        },
        {
            role: "Sunday School Coordinator",
            name: "Brother Michael Thompson",
            image: "uploads/chef.jpg",
            message: "Our dedicated team of teachers is committed to providing excellent biblical education that's both engaging and age-appropriate.",
            contact: "michael.t@church.com"
        },
        {
            role: "Children's Worship Leader",
            name: "Sister Rachel Davis",
            image: "uploads/leader-rachel.jpg",
            message: "Music and worship play a vital role in helping children express their love for God and understand His word in creative ways.",
            contact: "rachel.davis@church.com"
        }
    ];

    const volunteerTeam = [
        {
            name: "Mary Wilson",
            role: "Nursery Coordinator",
            image: "uploads/volunteer-mary.jpg"
        },
        {
            name: "John Peters",
            role: "Activities Director",
            image: "uploads/volunteer-john.jpg"
        },
        {
            name: "Lisa Anderson",
            role: "Safety Coordinator",
            image: "uploads/volunteer-lisa.jpg"
        }
        // Add more volunteers as needed
    ];

    const galleryImages = [
        {
            id: 1,
            url: "uploads/gallery/children1.jpg",
            caption: "Sunday School Fun",
            category: "Activities"
        },
        {
            id: 2,
            url: "uploads/gallery/children2.jpg",
            caption: "Vacation Bible School 2023",
            category: "Events"
        },
        {
            id: 3,
            url: "uploads/gallery/children3.jpg",
            caption: "Christmas Program",
            category: "Performances"
        },
        // Add more images as needed
    ];

    const videoGallery = [
        {
            id: 1,
            url: "https://www.youtube.com/embed/YOUR_VIDEO_ID",
            title: "Children's Choir Performance",
            thumbnail: "uploads/video-thumbnails/choir.jpg"
        },
        {
            id: 2,
            url: "https://www.youtube.com/embed/YOUR_VIDEO_ID",
            title: "VBS Highlights",
            thumbnail: "uploads/video-thumbnails/vbs.jpg"
        },
        // Add more videos as needed
    ];

    return (
        <div className="children-ministry-page">
            {/* Hero Section */}
            <section className="hero-section position-relative">
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-3 fw-bold" data-aos="fade-down">
                            Children's Ministry
                        </h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">
                            "Let the little children come to me" - Matthew 19:14
                        </p>
                    </div>
                </div>
            </section>

            {/* Welcome Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-lg-6" data-aos="fade-right">
                            <img src="uploads/children-welcome.jpg" alt="Children Welcome" className="img-fluid rounded shadow" />
                        </div>
                        <div className="col-lg-6" data-aos="fade-left">
                            <h2 className="mb-4">Welcome to Our Children's Ministry</h2>
                            <p className="lead">We believe every child is a gift from God and has the potential to make a difference in the world.</p>
                            <p>Our mission is to partner with parents in nurturing children's faith journey through:</p>
                            <ul className="list-unstyled">
                                <li>✓ Biblical Teaching</li>
                                <li>✓ Worship & Prayer</li>
                                <li>✓ Character Development</li>
                                <li>✓ Fun & Fellowship</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {/* Leadership Team Section */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Our Leadership Team</h2>
                    
                    {/* Main Leader */}
                    <div className="row mb-5 align-items-center" data-aos="fade-up">
                        <div className="col-lg-4">
                            <div className="text-center">
                                <img 
                                    src={leadershipTeam[0].image} 
                                    alt={leadershipTeam[0].name}
                                    className="leader-image mb-3 shadow"
                                    style={{
                                        width: "280px",
                                        height: "200px",
                                        objectFit: "cover",
                                        borderRadius: "12px"
                                    }}
                                />
                                <h3>{leadershipTeam[0].name}</h3>
                                <h5 className="text-muted">{leadershipTeam[0].role}</h5>
                            </div>
                        </div>
                        <div className="col-lg-8">
                            <div className="card shadow">
                                <div className="card-body">
                                    <h4 className="card-title">Message from our Director</h4>
                                    <p className="lead font-italic">"{leadershipTeam[0].message}"</p>
                                    <div className="mt-3">
                                        <a href={`mailto:${leadershipTeam[0].contact}`} className="btn btn-primary">
                                            Contact Director
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Other Leaders */}
                    <div className="row g-4">
                        {leadershipTeam.slice(1).map((leader, index) => (
                            <div className="col-md-6" key={index} data-aos="fade-up" data-aos-delay={index * 100}>
                                <div className="card h-100 shadow">
                                    <div className="card-body text-center">
                                        <img 
                                            src={leader.image} 
                                            alt={leader.name}
                                            className="leader-image mb-3"
                                            style={{
                                                width: "240px",
                                                height: "180px",
                                                objectFit: "cover",
                                                borderRadius: "10px"
                                            }}
                                        />
                                        <h4>{leader.name}</h4>
                                        <h6 className="text-muted mb-3">{leader.role}</h6>
                                        <p className="card-text">{leader.message}</p>
                                        <a href={`mailto:${leader.contact}`} className="btn btn-outline-primary">
                                            Contact
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Volunteer Team Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Our Volunteer Team</h2>
                    <div className="row g-4">
                        {volunteerTeam.map((volunteer, index) => (
                            <div className="col-md-4" key={index} data-aos="fade-up" data-aos-delay={index * 100}>
                                <div className="card h-100 shadow text-center">
                                    <div className="card-body">
                                        <img 
                                            src={volunteer.image} 
                                            alt={volunteer.name}
                                            className="volunteer-image mb-3"
                                            style={{
                                                width: "220px",
                                                height: "160px",
                                                objectFit: "cover",
                                                borderRadius: "8px"
                                            }}
                                        />
                                        <h5>{volunteer.name}</h5>
                                        <p className="text-muted">{volunteer.role}</p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Age Groups Section */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Our Age Groups</h2>
                    <div className="row g-4">
                        {ageGroups.map((group, index) => (
                            <div className="col-lg-4" key={index} data-aos="fade-up" data-aos-delay={index * 100}>
                                <div className="card h-100 shadow">
                                    <div className="card-body">
                                        <h3 className="card-title">{group.name}</h3>
                                        <h6 className="text-muted">{group.age}</h6>
                                        <p className="card-text">{group.description}</p>
                                        <h6>Activities:</h6>
                                        <ul>
                                            {group.activities.map((activity, i) => (
                                                <li key={i}>{activity}</li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Upcoming Events */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Upcoming Events</h2>
                    <div className="row g-4">
                        {upcomingEvents.map((event, index) => (
                            <div className="col-lg-4" key={index} data-aos="fade-up" data-aos-delay={index * 100}>
                                <div className="card h-100 shadow">
                                    <div className="card-body">
                                        <h3 className="card-title">{event.title}</h3>
                                        <p className="text-primary mb-1">{event.date}</p>
                                        <p className="text-muted">{event.time}</p>
                                        <p className="card-text">{event.description}</p>
                                        <button className="btn btn-primary">Learn More</button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Photo Gallery Section */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Photo Gallery</h2>
                    
                    {/* Gallery Filter */}
                    <div className="text-center mb-4" data-aos="fade-up">
                        <div className="btn-group" role="group">
                            <button className="btn btn-outline-primary active">All</button>
                            <button className="btn btn-outline-primary">Activities</button>
                            <button className="btn btn-outline-primary">Events</button>
                            <button className="btn btn-outline-primary">Performances</button>
                        </div>
                    </div>

                    {/* Gallery Grid */}
                    <div className="row g-4">
                        {galleryImages.map((image, index) => (
                            <div className="col-md-4" key={image.id} data-aos="zoom-in" data-aos-delay={index * 100}>
                                <div className="gallery-item">
                                    <img 
                                        src={image.url} 
                                        alt={image.caption}
                                        className="img-fluid rounded shadow"
                                    />
                                    <div className="gallery-overlay">
                                        <h5>{image.caption}</h5>
                                        <p>{image.category}</p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Video Gallery Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Video Highlights</h2>
                    
                    {/* Featured Video */}
                    <div className="row mb-5" data-aos="fade-up">
                        <div className="col-lg-8 mx-auto">
                            <div className="ratio ratio-16x9 shadow rounded overflow-hidden">
                                <iframe 
                                    src={videoGallery[0].url}
                                    title={videoGallery[0].title}
                                    allowFullScreen
                                ></iframe>
                            </div>
                        </div>
                    </div>

                    {/* Video Grid */}
                    <div className="row g-4">
                        {videoGallery.slice(1).map((video, index) => (
                            <div className="col-md-4" key={video.id} data-aos="fade-up" data-aos-delay={index * 100}>
                                <div className="video-card shadow rounded overflow-hidden">
                                    <div className="video-thumbnail">
                                        <img 
                                            src={video.thumbnail} 
                                            alt={video.title}
                                            className="img-fluid"
                                        />
                                        <div className="play-button">
                                            <i className="fas fa-play"></i>
                                        </div>
                                    </div>
                                    <div className="p-3">
                                        <h5>{video.title}</h5>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Get Involved Section */}
            <section className="py-5">
                <div className="container text-center">
                    <h2 className="mb-4" data-aos="fade-up">Get Involved</h2>
                    <p className="lead mb-5" data-aos="fade-up">Join our team of dedicated volunteers!</p>
                    <div className="row g-4">
                        <div className="col-md-4" data-aos="fade-up">
                            <div className="card h-100 shadow">
                                <div className="card-body">
                                    <h4>Volunteer</h4>
                                    <p>Share your gifts and make a difference in children's lives</p>
                                    <button className="btn btn-outline-primary">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div className="card h-100 shadow">
                                <div className="card-body">
                                    <h4>Donate</h4>
                                    <p>Support our ministry with resources and materials</p>
                                    <button className="btn btn-outline-primary">Give Now</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div className="card h-100 shadow">
                                <div className="card-body">
                                    <h4>Contact Us</h4>
                                    <p>Have questions? We'd love to hear from you!</p>
                                    <button className="btn btn-outline-primary">Get in Touch</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
}

ReactDOM.createRoot(document.getElementById('root')).render(<ChildrenMinistries />);
</script>

<style>
.hero-section {
    height: 60vh;
    background: url('uploads/children-hero.jpg') center/cover no-repeat;
    position: relative;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7));
    display: flex;
    align-items: center;
    justify-content: center;
}

.cross-divider {
    font-size: 2rem;
    margin: 1rem 0;
    color: #ffd700;
}

.card {
    transition: transform 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
}

@media (max-width: 768px) {
    .hero-section {
        height: 40vh;
    }
}

.leader-image, .volunteer-image {
    transition: transform 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.leader-image:hover, .volunteer-image:hover {
    transform: translateY(-5px);
}

.font-italic {
    font-style: italic;
}

.card .btn {
    transition: all 0.3s ease;
}

.card .btn:hover {
    transform: translateY(-2px);
}

/* Gallery Styles */
.gallery-item {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    margin-bottom: 1.5rem;
}

.gallery-item img {
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    bottom: -100%;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 1rem;
    transition: bottom 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    bottom: 0;
}

/* Video Styles */
.video-card {
    transition: transform 0.3s ease;
}

.video-card:hover {
    transform: translateY(-5px);
}

.video-thumbnail {
    position: relative;
    overflow: hidden;
}

.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.play-button i {
    color: #dc3545;
    font-size: 24px;
}

.video-card:hover .play-button {
    background: rgba(255, 255, 255, 1);
    transform: translate(-50%, -50%) scale(1.1);
}

/* Filter Button Styles */
.btn-group .btn {
    margin: 0 5px;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.btn-group .btn.active {
    background-color: var(--bs-primary);
    color: white;
}
</style>

<?php include 'includes/footer.php'; ?> 