<?php include 'includes/header.php'; ?>

<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div id="root"></div>

<script type="text/babel">
const mensFellowshipData = {
    name: "Men's Fellowship",
    description: "Building strong Christian men through fellowship and discipleship",
    aboutFellowship: {
        title: "About Men's Fellowship",
        content: [
            "The Men's Fellowship of Faith Evangelical Mission Worldwide is a vibrant community of Christian men committed to growing in faith and leadership. We believe in nurturing spiritual growth, fostering brotherhood, and developing godly character.",
            "Our fellowship provides a platform for men to support one another through prayer, Bible study, and meaningful relationships. We focus on equipping men to be spiritual leaders in their homes, workplace, and community.",
            "Through regular gatherings, mentorship programs, and community service, we strive to build men who are anchored in Christ and ready to make a positive impact in society."
        ],
        scripture: {
            verse: "Iron sharpens iron, so one man sharpens another.",
            reference: "Proverbs 27:17"
        }
    },
    leadership: [
        {
            name: "Brother [Name]",
            role: "Fellowship Leader",
            image: "uploads/mens1.jpg",
            contact: "leader@email.com"
        },
        {
            name: "Brother [Name]",
            role: "Assistant Leader",
            image: "uploads/mens2.jpg",
            contact: "assistant@email.com"
        }
    ],
    activities: [
        {
            name: "Prayer Warriors",
            description: "Early morning prayer sessions focusing on spiritual warfare and intercession.",
            icon: "fa-pray"
        },
        {
            name: "Bible Study",
            description: "In-depth study of God's word for spiritual growth and understanding.",
            icon: "fa-bible"
        },
        {
            name: "Community Outreach",
            description: "Reaching out to the community through various service projects.",
            icon: "fa-hands-helping"
        },
        {
            name: "Leadership Training",
            description: "Developing effective Christian leaders for family and society.",
            icon: "fa-users-cog"
        }
    ],
    upcomingEvents: [
        {
            name: "Men's Conference 2024",
            date: "March 15-17, 2024",
            description: "Annual gathering for spiritual enrichment and fellowship",
            venue: "Main Church Auditorium"
        },
        {
            name: "Father-Son Retreat",
            date: "April 20, 2024",
            description: "Building stronger family bonds through fellowship",
            venue: "Church Retreat Center"
        }
    ],
    gallery: [
        "uploads/mens1.jpg",
        "uploads/mens2.jpg",
        "uploads/mens3.jpg"
    ]
};

function MensFellowshipPage() {
    React.useEffect(() => {
        AOS.init({
            duration: 1000,
            once: true
        });
    }, []);

    console.log("Activities:", mensFellowshipData.activities);
    console.log("Leadership:", mensFellowshipData.leadership);

    return (
        <div className="mens-fellowship-page">
            {/* Hero Section */}
            <section 
                className="hero-section position-relative" 
                style={{
                    backgroundImage: `url('${mensFellowshipData.gallery[0]}')`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    height: '60vh'
                }}
            >
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-3 fw-bold" data-aos="fade-down">
                            {mensFellowshipData.name}
                        </h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">
                            {mensFellowshipData.description}
                        </p>
                    </div>
                </div>
            </section>

            {/* New About Section */}
            <section className="py-5 bg-light">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-10" data-aos="fade-up">
                            <div className="card shadow-sm border-0">
                                <div className="card-body p-4 p-lg-5">
                                    <h2 className="text-center mb-4">{mensFellowshipData.aboutFellowship.title}</h2>
                                    <div className="about-content">
                                        {mensFellowshipData.aboutFellowship.content.map((paragraph, index) => (
                                            <p key={index} className="mb-4">
                                                {paragraph}
                                            </p>
                                        ))}
                                        <div className="scripture-quote text-center mt-5">
                                            <blockquote className="blockquote">
                                                <p className="mb-2 font-italic">
                                                    "{mensFellowshipData.aboutFellowship.scripture.verse}"
                                                </p>
                                                <footer className="blockquote-footer">
                                                    {mensFellowshipData.aboutFellowship.scripture.reference}
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Activities */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Our Activities</h2>
                    <div className="row g-4">
                        {mensFellowshipData.activities.map((activity, index) => (
                            <div key={index} className="col-md-6 col-lg-3" data-aos="fade-up">
                                <div className="card h-100 text-center shadow-sm">
                                    <div className="card-body">
                                        <i className={`fas ${activity.icon} fa-3x mb-3 text-primary`}></i>
                                        <h4 className="card-title h5">{activity.name}</h4>
                                        <p className="card-text">{activity.description}</p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Leadership */}
            <section className="py-5">
                <div className="container">
                    <h2 className="text-center mb-5" data-aos="fade-up">Our Leadership</h2>
                    <div className="row g-4 justify-content-center">
                        {mensFellowshipData.leadership.map((leader, index) => (
                            <div key={index} className="col-md-6 col-lg-4" data-aos="fade-up">
                                <div className="card h-100 text-center shadow-sm">
                                    <div className="card-body">
                                        <img 
                                            src={leader.image} 
                                            alt={leader.name} 
                                            className="rounded-3 mb-3"
                                            style={{
                                                width: "200px",
                                                height: "200px",
                                                objectFit: "cover"
                                            }}
                                        />
                                        <h4 className="card-title">{leader.name}</h4>
                                        <p className="text-muted">{leader.role}</p>
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
        </div>
    );
}

ReactDOM.render(<MensFellowshipPage />, document.getElementById('root'));
</script> 
<?php include 'includes/footer.php'; ?> 