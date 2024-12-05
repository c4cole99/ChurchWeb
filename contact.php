<?php include 'includes/header.php'; ?>

<!-- Add Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div id="root"></div>

<script type="text/babel">
const ContactPage = () => {
    const [map, setMap] = React.useState(null);

    React.useEffect(() => {
        // Make sure Leaflet is loaded
        if (typeof L !== 'undefined') {
            // Initialize the map
            const mapInstance = L.map('contact-map').setView([5.565990, -0.245470], 16);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(mapInstance);

            // Add marker for headquarters
            const marker = L.marker([5.565990, -0.245470])
                .bindPopup(`
                    <div class="p-3">
                        <h5 class="mb-2">FEMW Church Headquarters</h5>
                        <p class="mb-1">Mataheko, Accra</p>
                        <p class="mb-0">Ghana</p>
                    </div>
                `)
                .addTo(mapInstance);

            // Open popup by default
            marker.openPopup();
            
            setMap(mapInstance);
        }

        // Cleanup function
        return () => {
            if (map) map.remove();
        };
    }, []); // Empty dependency array

    return (
        <div className="contact-page">
            {/* Hero Section */}
            <div className="hero-section" style={{backgroundImage: 'url(assets/images/church-hero.jpg)'}}>
                <div className="hero-overlay">
                    <div className="container">
                        <h1 className="display-4 fw-bold">Contact Us</h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead">Get in touch with our church family</p>
                    </div>
                </div>
            </div>

            {/* Contact Info & Map Section */}
            <section className="py-5">
                <div className="container">
                    <div className="row g-5">
                        {/* Contact Information */}
                        <div className="col-lg-6">
                            <h2 className="h3 mb-4">Get In Touch</h2>
                            <div className="d-flex mb-4">
                                <i className="fas fa-map-marker-alt text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h3 className="h5 mb-2">Church Location</h3>
                                    <p className="mb-0">FEMW Church Headquarters</p>
                                    <p className="mb-0">Mataheko, Accra</p>
                                    <p className="mb-0">Ghana</p>
                                </div>
                            </div>
                            <div className="d-flex mb-4">
                                <i className="fas fa-phone text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h3 className="h5 mb-2">Phone</h3>
                                    <p className="mb-0">[Your Phone Number]</p>
                                </div>
                            </div>
                            <div className="d-flex mb-4">
                                <i className="fas fa-envelope text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h3 className="h5 mb-2">Email</h3>
                                    <p className="mb-0">[Your Email]</p>
                                </div>
                            </div>
                        </div>

                        {/* Map */}
                        <div className="col-lg-6">
                            <div id="contact-map" style={{height: '400px', borderRadius: '10px'}}></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<ContactPage />, document.getElementById('root'));
</script>

<style>
.contact-info i {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(13, 110, 253, 0.1);
}
</style>

<?php include 'includes/footer.php'; ?> 