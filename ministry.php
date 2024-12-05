<?php include 'includes/header.php'; ?>

<!-- Required dependencies -->
<script src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<div id="root"></div>

<script type="text/babel">
// Ministry data array
const ministries = [
    {
        id: 1,
        name: "Media Ministry",
        category: "media",
        description: "Spreading the Gospel through digital platforms and technical support",
        image: ["uploads/457749428_813050380978537_898420521643038981_n.jpg", "uploads/C:\wamp64\www\churchweb\uploads\camera.jpg"],
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
            "uploads/media2.jpg"
        ]
    },
    {
        id: 2,
        name: "Men's Fellowship",
        category: "men",
        description: "Building strong Christian men through fellowship and discipleship",
        image: ["uploads/men1.jpg", "uploads/men2.jpg"],
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
        ]
    },
    {
        id: 3,
        name: "Women's Fellowship",
        category: "women",
        description: "Strengthening women in faith and fellowship",
        image: ["uploads/women1.jpg", "uploads/women2.jpg"],
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
        image: ["uploads/ladies1.jpg", "uploads/ladies2.jpg"],
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
        image: ["uploads/children.jpg", "uploads/childrens2.jpg", "uploads/childrens3.jpg"],
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
        ]
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
        name: "Ushering Ministry",
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
        ]
    }
];

const MinistryPage = () => {
    const [ministry, setMinistry] = React.useState(null);
    const [filter, setFilter] = React.useState('all');
    
    React.useEffect(() => {
        // Get ministry ID from URL
        const params = new URLSearchParams(window.location.search);
        const ministryId = parseInt(params.get('id'));
        
        // Find ministry data
        const ministryData = ministries.find(m => m.id === ministryId);
        setMinistry(ministryData);
        
        // Initialize animations
        AOS.init({
            duration: 1000,
            once: true
        });
    }, []);

    if (!ministry) return <div>Loading...</div>;

    return (
        <div className="ministry-detail-page">
            {/* Filter Buttons */}
            <div className="text-center mb-5" data-aos="fade-up">
                <div className="btn-group flex-wrap">
                    <button 
                        className={`btn ${filter === 'all' ? 'btn-primary' : 'btn-outline-primary'}`}
                        onClick={() => setFilter('all')}
                    >
                        All Ministries
                    </button>
                    {/* ... rest of your filter buttons ... */}
                </div>
            </div>

            {/* Ministry Hero Section */}
            <section className="hero-section position-relative">
                <img 
                    src={Array.isArray(ministry.image) ? ministry.image[0] : ministry.image} 
                    alt={ministry.name}
                    className="w-100 h-100 object-fit-cover position-absolute"
                />
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-3 fw-bold" data-aos="fade-down">
                            {ministry.name}
                        </h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">
                            {ministry.description}
                        </p>
                    </div>
                </div>
            </section>

            {/* Ministry Details */}
            <section className="py-5">
                <div className="container">
                    <div className="row g-4">
                        {/* Left Column - Info */}
                        <div className="col-lg-8" data-aos="fade-right">
                            <div className="card shadow-sm">
                                <div className="card-body">
                                    <h2 className="card-title">About Our Ministry</h2>
                                    <p className="lead">{ministry.description}</p>
                                    
                                    <h3 className="mt-4">Our Activities</h3>
                                    <div className="row g-4 mt-2">
                                        {ministry.activities.map((activity, index) => (
                                            <div key={index} className="col-md-6">
                                                <div className="activity-card p-3 bg-light rounded">
                                                    <i className="fas fa-check-circle text-primary me-2"></i>
                                                    {activity}
                                                </div>
                                            </div>
                                        ))}
                                    </div>

                                    {ministry.subMinistries && (
                                        <>
                                            <h3 className="mt-4">Sub Ministries</h3>
                                            <div className="row g-4 mt-2">
                                                {ministry.subMinistries.map((sub, index) => (
                                                    <div key={index} className="col-md-6">
                                                        <div className="sub-ministry-card p-3 border rounded">
                                                            <h4>{sub.name}</h4>
                                                            <p><i className="fas fa-user me-2"></i>{sub.leader}</p>
                                                            <p><i className="fas fa-clock me-2"></i>{sub.schedule}</p>
                                                        </div>
                                                    </div>
                                                ))}
                                            </div>
                                        </>
                                    )}
                                </div>
                            </div>
                        </div>

                        {/* Right Column - Contact & Schedule */}
                        <div className="col-lg-4" data-aos="fade-left">
                            <div className="card shadow-sm mb-4">
                                <div className="card-body">
                                    <h3>Ministry Leader</h3>
                                    <p><i className="fas fa-user me-2"></i>{ministry.leader}</p>
                                    
                                    <h3 className="mt-4">Schedule</h3>
                                    <p><i className="fas fa-clock me-2"></i>{ministry.schedule}</p>
                                    
                                    <a href="#join" className="btn btn-primary w-100 mt-3">
                                        Join This Ministry
                                    </a>
                                </div>
                            </div>

                            {/* Gallery */}
                            <div className="card shadow-sm">
                                <div className="card-body">
                                    <h3>Gallery</h3>
                                    <div className="row g-2">
                                        {ministry.gallery.map((image, index) => (
                                            <div key={index} className="col-6">
                                                <img 
                                                    src={image} 
                                                    alt="" 
                                                    className="img-fluid rounded"
                                                />
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<MinistryPage />, document.getElementById('root'));
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
</style>

<?php include 'includes/footer.php'; ?>