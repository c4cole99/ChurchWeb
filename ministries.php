<?php include 'includes/header.php'; ?>

<!-- React and Other Dependencies -->
<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/ministries.css">

<div id="root"></div>

<script type="text/babel">
// Ministry data array
const ministries = [
    {
        id: 1,
        name: "Media Ministry",
        category: "media",
        description: "Spreading the Gospel through digital platforms and technical support",
        image: ["uploads/457749428_813050380978537_898420521643038981_n.jpg", "uploads/camera.jpg"],
        leader: "Brother [Name]",
        schedule: "Service Times",
        activities: [
            "Live Streaming",
            "Photography & Videography",
            "Social Media Management",
            "Audio/Visual Support",
            "Church Website Management"
        ],
        gallery: [
            "uploads/457749428_813050380978537_898420521643038981_n.jpg",
            "uploads/camera.jpg"
        ],
        link: "media-ministry.php"
    },
    {
        id: 2,
        name: "Men's Fellowship",
        category: "men",
        description: "Building strong Christian men through fellowship and discipleship",
        image: ["uploads/mens1.jpg", "uploads/mens2.jpg"],
        leader: "Brother [Name]",
        schedule: "Saturdays at 7:00 AM",
        activities: [
            "Men's Prayer Meetings",
            "Bible Study",
            "Leadership Development",
            "Community Service",
            "Men's Retreat"
        ],
        gallery: [
            "uploads/men1.jpg",
            "uploads/men2.jpg"
        ],
        link: "mens_fellowship.php"
    },
    {
        id: 3,
        name: "Women's Fellowship",
        category: "women",
        description: "Strengthening women in faith and fellowship",
        image: ["uploads/womens1.jpg", "uploads/womens2.jpg", "uploads/womens3.jpg"],
        leader: "Sister [Name]",
        schedule: "Wednesdays at 6:00 PM",
        activities: [
            "Women's Prayer Meetings",
            "Bible Study",
            "Outreach Programs",
            "Skills Development",
            "Women's Conferences"
        ],
        gallery: [
            "uploads/women1.jpg",
            "uploads/women2.jpg"
        ]
    },
    {
        id: 4,
        name: "Ladies Fellowship",
        category: "ladies",
        description: "Nurturing young ladies in Christian values and leadership",
        image: ["uploads/", "uploads/ladies2.jpg"],
        leader: "Sister [Name]",
        schedule: "Fridays at 5:00 PM",
        activities: [
            "Ladies Prayer Meetings",
            "Mentorship Programs",
            "Leadership Training",
            "Social Activities",
            "Ladies Retreat"
        ],
        gallery: [
            "uploads/ladies1.jpg",
            "uploads/ladies2.jpg"
        ]
    },
    {
        id: 5,
        name: "Children's Fellowship",
        category: "children",
        description: "Nurturing young hearts in the love of Christ",
        image: ["uploads/chldren1.jpg", "uploads/chldren2.jpg", "uploads/chldren3.jpg"],
        leader: "Sister [Name]",
        schedule: "Sundays at 9:00 AM",
        activities: [
            "Sunday School",
            "Bible Stories",
            "Children's Choir",
            "Bible Quiz",
            "Holiday Programs"
        ],
        gallery: [
            "uploads/children.jpg",
            "uploads/childrens2.jpg",
            "uploads/childrens3.jpg"
        ],
        link: "children_ministries.php"
    },
    {
        id: 6,
        name: "Intercessors",
        category: "prayer",
        description: "Dedicated to prayer and spiritual warfare",
        image: ["uploads/intercessors1.jpg", "uploads/intercessors2.jpg"],
        leader: "Elder [Name]",
        schedule: "Daily at 5:00 AM",
        activities: [
            "Morning Prayer",
            "Fasting & Prayer",
            "Prayer Chain",
            "Prayer Counseling",
            "Night Vigils"
        ],
        gallery: [
            "uploads/intercessors1.jpg",
            "uploads/intercessors2.jpg"
        ]
    },
    {
        id: 7,
        name: "Protocol Department",
        category: "ushers",
        description: "Serving the church through order and hospitality",
        image: ["uploads/ushers1.jpg", "uploads/ushers2.jpg"],
        leader: "Brother/Sister [Name]",
        schedule: "Service Times",
        activities: [
            "Welcoming Visitors",
            "Maintaining Order",
            "Offering Collection",
            "Church Events Support",
            "Security Assistance"
        ],
        gallery: [
            "uploads/ushers1.jpg",
            "uploads/ushers2.jpg"
        ]
    },
    {
        id: 8,
        name: "Music Ministry",
        category: "music",
        description: "Leading worship through choir and instrumentals",
        image: ["uploads/musc.jpg", "uploads/musc2.jpg"],
        leader: "Brother [Name]",
        schedule: "Practice: Fridays at 6:00 PM",
        activities: [
            "Choir Practice",
            "Instrumental Training",
            "Special Performances",
            "Worship Workshops",
            "Music Training"
        ],
        subMinistries: [
            {
                name: "Choir",
                leader: "Brother/Sister [Name]",
                schedule: "Practice: Thursdays at 6:00 PM"
            },
            {
                name: "Instrumentalists",
                leader: "Brother [Name]",
                schedule: "Practice: Saturdays at 4:00 PM"
            }
        ],
        gallery: [
            "uploads/musc.jpg",
            "uploads/musc2.jpg"
        ],
        link: "music_ministry.php"
    },
    {
        id: 9,
        name: "Youth Ministry",
        category: "youth",
        description: "Empowering young people to grow in faith and leadership",
        image: ["uploads/youth.jpg", "uploads/youth2.jpg"],
        leader: "Brother [Name]",
        schedule: "Saturdays at 3:00 PM",
        activities: [
            "Youth Bible Study",
            "Worship Sessions",
            "Leadership Training",
            "Sports & Games",
            "Youth Camps",
            "Community Service"
        ],
        subMinistries: [
            {
                name: "Teens Fellowship",
                leader: "Brother/Sister [Name]",
                schedule: "Saturdays at 2:00 PM"
            },
            {
                name: "Campus Ministry",
                leader: "Brother [Name]",
                schedule: "Fridays at 4:00 PM"
            }
        ]
    }
];

function MinistriesPage() {
    React.useEffect(() => {
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Swiper
        const swipers = document.querySelectorAll('.ministry-swiper');
        swipers.forEach(element => {
            new Swiper(element, {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
        });
    }, []);

    return (
        <div className="ministries-page">
            {/* Hero Section */}
            <section 
                className="hero-section position-relative" 
                style={{
                    backgroundImage: `url('uploads/ministry backg.jpg')`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat',
                    height: '60vh'
                }}
            >
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
            
            {/* Ministries Grid */}
            <section className="py-5">
                <div className="container">
                    <div className="row g-4">
                        {ministries.map(ministry => (
                            <div key={ministry.id} className="col-md-6 col-lg-4" data-aos="fade-up">
                                <a href={ministry.link || `ministry.php?id=${ministry.id}`} className="ministry-card">
                                    <div className="ministry-image">
                                        {Array.isArray(ministry.image) ? (
                                            <div className="swiper ministry-swiper">
                                                <div className="swiper-wrapper">
                                                    {ministry.image.map((img, index) => (
                                                        <div key={index} className="swiper-slide">
                                                            <img src={img} alt={`${ministry.name} ${index + 1}`} />
                                                        </div>
                                                    ))}
                                                </div>
                                                <div className="swiper-pagination"></div>
                                                <div className="swiper-button-next"></div>
                                                <div className="swiper-button-prev"></div>
                                            </div>
                                        ) : (
                                            <img src={ministry.image[0]} alt={ministry.name} />
                                        )}
                                        <div className="ministry-overlay">
                                            <h2 className="ministry-name">{ministry.name}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
}

// Initialize root and render
let root;
if (!root) {
    root = ReactDOM.createRoot(document.getElementById('root'));
}
root.render(<MinistriesPage />);
</script>

<style>
/* Ministry Page Styles */
.ministry-detail-page .hero-section {
    height: 60vh;
    position: relative;
    overflow: hidden;
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
    color: var(--church-primary);
}

.activity-card {
    transition: transform 0.3s ease;
}

.activity-card:hover {
    transform: translateY(-5px);
}

.sub-ministry-card {
    transition: transform 0.3s ease;
    background: white;
}

.sub-ministry-card:hover {
    transform: translateY(-5px);
}

/* Filter Button Styles */
.btn-group {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
}

.btn-group .btn {
    border-radius: 25px;
    padding: 0.5rem 1.5rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .ministry-detail-page .hero-section {
        height: 50vh;
    }
    
    .btn-group {
        gap: 0.25rem;
    }
    
    .btn-group .btn {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
    }
}

.ministry-card {
    display: block;
    height: 320px;
    overflow: hidden;
    position: relative;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.ministry-image {
    height: 100%;
}

.ministry-image img,
.swiper {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.ministry-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    padding: 1rem;
}

.ministry-name {
    color: white;
    font-size: 1.2rem;
    margin: 0;
}

/* Responsive adjustments */
@media (max-width: 800px) {
    .ministry-card {
        height: 200px;
    }
    
    .ministry-name {
        font-size: 1rem;
    }
}
</style>
<script>
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
                        <a href={ministry.link || `ministry.php?id=${ministry.id}`} className="ministry-container">
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
</script>

<?php include 'includes/footer.php'; ?>