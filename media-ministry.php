<?php include 'includes/header.php'; ?>

<!-- Dependencies -->
<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/ministry-detail.css">

<div id="root"></div>

<script type="text/babel">
const mediaMinistryData = {
    name: "Media Department",
    verse: "Go into all the world and preach the gospel to all creation. - Mark 16:15",
    backgroundImage: "./uploads/Oc2020-04652-X4.jpg",
    mission: "To leverage digital platforms and technology to spread the Gospel and enhance worship experience.",
    description: `Our Media Team serves as the technical backbone of our church's outreach efforts, 
    ensuring that the Word of God reaches beyond our physical walls through various digital platforms 
    and technical support services.`,
    
    teams: [ 
        {
            name: "Live Streaming Team",
            description: "Manages live broadcasts of services and events",
            image: "uploads/live stream team.jpg",
            responsibilities: [
                "Setting up streaming equipment",
                "Managing live broadcasts",
                "Quality control of audio/video",
                "Archive management"
            ]
        },
        {
            name: "Photography & Videography",
            image: "uploads/photography.jpg",
            description: "Captures and documents church events and activities",
            responsibilities: [
                "Event photography",
                "Video production",
                "Content editing",
                "Archive maintenance"
            ]
        },
        {
            name: "Social Media Team",
            image: "uploads/457749428_813050380978537_898420521643038981_n.jpg",
            description: "Manages church's online presence across platforms",
            responsibilities: [
                "Content creation",
                "Platform management",
                "Community engagement",
                "Analytics tracking"
            ]
        },
        {
            name: "Audio/Visual Support",
            image: "uploads/360_F_672337448_4NWfjWdtUrClii2oY4tvtqSw45igJ179.jpg",
            description: "Ensures quality sound and visual experience during services",
            responsibilities: [
                "Sound mixing",
                "Projection management",
                "Equipment maintenance",
                "Technical support"
            ]
        },
        {
            name: "Interviewers & Reporters",
            image: "uploads/interviewer and reporter.jpg",
            description: "Conducts interviews and creates engaging content through reporting church events and testimonies",
            responsibilities: [
                "Conducting interviews with church members",
                "Covering special events and programs",
                "Creating engaging written content",
                "Documenting testimonies",
                "Collaborating with social media team for content distribution"
            ]
        },
        {
            name: "Website Management",
            image: "uploads/website management.jpg",
            description: "Maintains and updates church website",
            responsibilities: [
                "Content updates",
                "Website maintenance",
                "User experience optimization",
                "Technical troubleshooting"
            ]
        }
    ],
    
    schedule: {
        regular: [
            "Sunday Services: 7:30 AM - 1:00 PM",
            "Wednesday Announcement Shoot: 6:30 PM - 8:00 PM",
            "Special Events: As scheduled"
        ]
    },
    
    requirements: [
        "Passion for technology and ministry",
        "Commitment to scheduled duties",
        "Basic technical knowledge (training provided)",
        "Team player mindset",
        "Willingness to learn and grow"
    ],
    
    gallery: [
        "uploads/media/streaming.jpg",
        "uploads/media/photography.jpg",
        "uploads/media/social-media.jpg",
        "uploads/media/audio-visual.jpg",
        "uploads/media/website.jpg"
    ],
    formUrl: "https://docs.google.com/forms/d/e/YOUR_FORM_ID/viewform"
};

function MediaMinistryPage() {
    const [selectedImage, setSelectedImage] = React.useState(null);
    const [showFormModal, setShowFormModal] = React.useState(false);

    React.useEffect(() => {
        console.log("Hero Image Path:", mediaMinistryData.heroImage);
        
        AOS.init({
            duration: 1000,
            once: true
        });
    }, []);

    return (
        <div className="ministry-detail-page">
            {/* Hero Section */}
            <section 
                className="hero-section position-relative" 
                style={{
                    backgroundImage: `url('${mediaMinistryData.backgroundImage}')`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    height: '60vh'
                }}
            >
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-4 fw-bold" data-aos="fade-down">
                            {mediaMinistryData.name}
                        </h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">
                            {mediaMinistryData.verse}
                        </p>
                    </div>
                </div>
            </section>

            {/* Mission & Description */}
            <section className="py-5">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-8 text-center" data-aos="fade-up">
                            <h2 className="section-title">Our Mission</h2>
                            <p className="lead mb-4">{mediaMinistryData.mission}</p>
                            <p>{mediaMinistryData.description}</p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Ministry Teams */}
            <section className="py-5 bg-light">
                <div className="container">
                    <h2 className="section-title text-center mb-5" data-aos="fade-up">Our Teams</h2>
                    <div className="row g-4">
                        {mediaMinistryData.teams.map((team, index) => (
                            <div key={index} className="col-md-6 col-lg-4" data-aos="fade-up">
                                <div className="team-card h-100 bg-white rounded shadow-sm">
                                    <div className="team-image-wrapper">
                                        <img 
                                            src={team.image} 
                                            alt={team.name} 
                                            className="team-image w-100 cursor-pointer"
                                            onClick={() => setSelectedImage(team.image)}
                                        />
                                    </div>
                                    <div className="p-4">
                                        <h3 className="h4 mb-3">{team.name}</h3>
                                        <p className="mb-3">{team.description}</p>
                                        <h4 className="h6 mb-2">Responsibilities:</h4>
                                        <ul className="list-unstyled">
                                            {team.responsibilities.map((resp, idx) => (
                                                <li key={idx} className="mb-2">
                                                    <i className="fas fa-check-circle text-success me-2"></i>
                                                    {resp}
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Schedule */}
            <section className="py-5">
                <div className="container">
                    <h2 className="section-title text-center mb-5" data-aos="fade-up">Schedule</h2>
                    <div className="row justify-content-center">
                        <div className="col-md-8" data-aos="fade-up">
                            <div className="schedule-card p-4 bg-light rounded">
                                <h3 className="h4 mb-4">Service Schedule</h3>
                                <ul className="list-unstyled">
                                    {mediaMinistryData.schedule.regular.map((item, index) => (
                                        <li key={index} className="mb-3">
                                            <i className="far fa-clock me-2"></i>
                                            {item}
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Join Us */}
            <section className="py-5 bg-light">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-8 text-center" data-aos="fade-up">
                            <h2 className="section-title mb-4">Join Our Team</h2>
                            <p className="mb-4">Requirements for joining the Media Ministry:</p>
                            <ul className="list-unstyled">
                                {mediaMinistryData.requirements.map((req, index) => (
                                    <li key={index} className="mb-2">
                                        <i className="fas fa-check-circle text-success me-2"></i>
                                        {req}
                                    </li>
                                ))}
                            </ul>
                            <button 
                                className="btn btn-primary mt-4"
                                onClick={() => setShowFormModal(true)}
                            >
                                Apply to Join
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            {/* Application Form Modal */}
            {showFormModal && (
                <div className="form-modal">
                    <div className="form-modal-content">
                        <div className="form-modal-header">
                            <h3>Media Ministry Application</h3>
                            <button 
                                className="close-button"
                                onClick={() => setShowFormModal(false)}
                            >
                                &times;
                            </button>
                        </div>
                        <div className="form-modal-body">
                            <iframe 
                                src={mediaMinistryData.formUrl}
                                width="100%" 
                                height="600px" 
                                frameBorder="0" 
                                marginHeight="0" 
                                marginWidth="0"
                            >
                                Loading form...
                            </iframe>
                        </div>
                    </div>
                </div>
            )}

            {/* Image Preview Modal */}
            {selectedImage && (
                <div 
                    className="image-preview-modal"
                    onClick={() => setSelectedImage(null)}
                >
                    <div className="modal-content">
                        <span className="close-button" onClick={() => setSelectedImage(null)}>&times;</span>
                        <img src={selectedImage} alt="Preview" />
                    </div>
                </div>
            )}
        </div>
    );
}

// Initialize root and render
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<MediaMinistryPage />);
</script>

<style>
.section-title {
    position: relative;
    margin-bottom: 2rem;
    color: var(--church-primary);
}

.section-title::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background-color: var(--church-primary);
}

.team-image-wrapper {
    height: 200px;
    overflow: hidden;
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
}

.team-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.team-card:hover .team-image {
    transform: scale(1.05);
}

.team-card {
    transition: transform 0.3s ease;
    overflow: hidden;
}

.team-card:hover {
    transform: translateY(-5px);
}

.schedule-card {
    height: 100%;
    transition: transform 0.3s ease;
}

.schedule-card:hover {
    transform: translateY(-5px);
}

.gallery-image {
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
}

.hero-section {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.cursor-pointer {
    cursor: pointer;
}

.image-preview-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    cursor: pointer;
}

.modal-content {
    position: relative;
    max-width: 90%;
    max-height: 90vh;
}

.modal-content img {
    max-width: 100%;
    max-height: 90vh;
    object-fit: contain;
}

.close-button {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 30px;
    cursor: pointer;
    padding: 5px;
}

.close-button:hover {
    color: #ddd;
}

/* Optional: Add loading animation */
.modal-content img {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.form-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1100;
}

.form-modal-content {
    background-color: white;
    width: 90%;
    max-width: 800px;
    max-height: 90vh;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

.form-modal-header {
    padding: 1rem;
    background-color: var(--church-primary, #007bff);
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form-modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
}

.form-modal-body {
    padding: 1rem;
    max-height: calc(90vh - 60px);
    overflow-y: auto;
}

.close-button {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background-color 0.3s;
}

.close-button:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

@media (max-width: 768px) {
    .form-modal-content {
        width: 95%;
        max-height: 95vh;
    }

    .form-modal-body {
        max-height: calc(95vh - 60px);
    }
}
</style>

<?php include 'includes/footer.php'; ?> 