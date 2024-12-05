<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
const BranchesPage = () => {
    const branches = [
        { 
            id: "001", 
            name: "Headquarters (Mataheko)", 
            description: "Main FEMW Church - Mataheko Branch",
            lat: 5.565990,  // Updated coordinates for Mataheko
            lng: -0.245470  // Mataheko, Accra
        },
        { id: "002", name: "Osu", lat: 5.5577, lng: -0.1870 },
        { id: "003", name: "Accra-Central", lat: 5.5500, lng: -0.2167 },
        { id: "004", name: "Bubiashie", lat: 5.5651, lng: -0.2397 },
        { id: "005", name: "Mamponse", lat: 5.5480, lng: -0.2250 },
        { id: "006", name: "Lashibie", lat: 5.6901, lng: -0.0289 },
        { id: "007", name: "Awoshie", lat: 5.5778, lng: -0.2856 },
        { id: "008", name: "Cape-Coast", lat: 5.1315, lng: -1.2795 },
        { id: "009", name: "Odorkor", lat: 5.5776, lng: -0.2606 },
        { id: "010", name: "La Wireless", lat: 5.5564, lng: -0.1775 },
        { id: "011", name: "La Shepherd", lat: 5.5597, lng: -0.1741 },
        { id: "012", name: "Camara", lat: 5.5533, lng: -0.2167 },
        { id: "013", name: "Tudu", lat: 5.5476, lng: -0.2062 },
        { id: "014", name: "Teshie", lat: 5.5833, lng: -0.1000 },
        { id: "015", name: "Chorkor", lat: 5.5306, lng: -0.2361 },
        { id: "016", name: "Beach Road", lat: 5.5478, lng: -0.1961 },
        { id: "017", name: "Glefe", lat: 5.5408, lng: -0.2492 },
        { id: "018", name: "Kokomlemle", lat: 5.5703, lng: -0.2062 },
        { id: "019", name: "Dansoman", lat: 5.5397, lng: -0.2597 },
        { id: "020", name: "Prampram", lat: 5.7284, lng: 0.1124 },
        { id: "021", name: "Mamprobi", lat: 5.5339, lng: -0.2283 },
        { id: "022", name: "Mandela SCC", lat: 5.5589, lng: -0.2194 },
        { id: "023", name: "Tema", lat: 5.6698, lng: -0.0167 },
        { id: "024", name: "Mallam", lat: 5.5787, lng: -0.2856 },
        { id: "025", name: "Palas Town", lat: 5.5563, lng: -0.2156 },
        { id: "026", name: "Antie Aku", lat: 5.5612, lng: -0.2198 },
        { id: "027", name: "Akorkorma", lat: 5.7823, lng: 0.0634 },
        { id: "028", name: "Fodzoku", lat: 6.2833, lng: 0.0333 },
        { id: "029", name: "Takoradi", lat: 4.8898, lng: -1.7519 },
        { id: "030", name: "Akim Oda", lat: 5.9261, lng: -0.9851 },
        { id: "031", name: "Kwao Boadi", lat: 5.5534, lng: -0.2145 },
        { id: "032", name: "Mame Krobo", lat: 6.1089, lng: -0.0921 },
        { id: "033", name: "Ekye", lat: 6.1500, lng: -0.0667 },
        { id: "034", name: "Dim", lat: 5.5623, lng: -0.2178 },
        { id: "035", name: "Tailor Kope", lat: 5.7912, lng: 0.0723 },
        { id: "036", name: "Akorkoaso I", lat: 6.3167, lng: -0.9833 },
        { id: "037", name: "Akorkoaso II", lat: 6.3178, lng: -0.9844 },
        { id: "038", name: "Adabraka", lat: 5.5600, lng: -0.2167 },
        { id: "039", name: "Korle-Gonno", lat: 5.5308, lng: -0.2225 },
        { id: "040", name: "Abofu", lat: 5.6023, lng: -0.2145 },
        { id: "041", name: "Madina", lat: 5.6685, lng: -0.1677 },
        { id: "042", name: "West Hills", lat: 5.5689, lng: -0.3089 },
        { id: "043", name: "Osudoku", lat: 6.0667, lng: 0.0667 },
        { id: "044", name: "Kotwea", lat: 6.1203, lng: -0.9892 },
        { id: "045", name: "Agege", lat: 5.5534, lng: -0.2189 },
        { id: "046", name: "Nsawam", lat: 5.8089, lng: -0.3503 },
        { id: "047", name: "Manhean", lat: 5.5823, lng: -0.3012 },
        { id: "048", name: "Nsakinaa", lat: 5.8234, lng: -0.3645 },
        { id: "049", name: "Okpoi Gonno", lat: 5.5789, lng: -0.1534 },
        { id: "050", name: "Ada Kasseh", lat: 5.8178, lng: 0.6411 },
        { id: "051", name: "Adjei Kojo", lat: 5.6456, lng: -0.0234 },
        { id: "052", name: "Bediako", lat: 5.6789, lng: -0.0345 },
        { id: "053", name: "Saaman", lat: 5.9345, lng: -0.9756 }
    ];

    const [searchTerm, setSearchTerm] = React.useState("");
    const [selectedBranch, setSelectedBranch] = React.useState(null);
    const [map, setMap] = React.useState(null);
    const [markers, setMarkers] = React.useState([]);

    React.useEffect(() => {
        // Initialize the map centered on Mataheko headquarters
        const mapInstance = L.map('map').setView([5.565990, -0.245470], 11);
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mapInstance);

        // Add special marker for headquarters
        const hqMarker = L.marker([5.565990, -0.245470], {
            icon: L.divIcon({
                className: 'custom-div-icon',
                html: `<div class="marker-pin hq-pin">001</div>`,
                iconSize: [30, 42],
                iconAnchor: [15, 42]
            })
        })
        .bindPopup(`
            <div class="p-3">
                <h5 class="mb-2">FEMW Church Headquarters</h5>
                <p class="mb-1"><strong>Branch ID:</strong> 001</p>
                <p class="mb-1">Mataheko, Accra</p>
                <p class="mb-0"><strong>Location:</strong> 5.565990, -0.245470</p>
            </div>
        `)
        .addTo(mapInstance);

        // Add markers for other branches
        branches.forEach(branch => {
            if (branch.id !== "001") { // Skip headquarters as it's already added
                const marker = L.marker([branch.lat, branch.lng])
                    .bindPopup(`
                        <div class="p-3">
                            <h5 class="mb-2">${branch.name}</h5>
                            <p class="mb-1"><strong>Branch ID:</strong> ${branch.id}</p>
                            <p class="mb-0"><strong>Location:</strong> ${branch.lat.toFixed(4)}, ${branch.lng.toFixed(4)}</p>
                        </div>
                    `)
                    .addTo(mapInstance);
            }
        });

        setMap(mapInstance);
    }, []);

    // Filter branches based on search term
    const filteredBranches = branches.filter(branch => 
        branch.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        branch.id.includes(searchTerm)
    );

    // Function to handle branch selection from list
    const handleBranchSelect = (branch) => {
        setSelectedBranch(branch);
        if (map) {
            map.panTo({ lat: branch.lat, lng: branch.lng });
            map.setZoom(15);
            
            // Find and trigger click on the corresponding marker
            const markerObj = markers.find(m => m.marker.getTitle() === `${branch.id} - ${branch.name}`);
            if (markerObj) {
                google.maps.event.trigger(markerObj.marker, 'click');
            }
        }
    };

    return (
        <div className="branches-page">
            {/* Hero Section */}
            <div className="branches-hero position-relative">
                <img 
                    src="assets/static/images/branches-hero.jpg" 
                    className="w-100" 
                    style={{height: '400px', objectFit: 'cover'}} 
                    alt="Our Branches"
                    onError={(e) => e.target.src = 'https://placehold.co/1200x400'} 
                />
                <div className="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                     style={{background: 'rgba(0,0,0,0.6)'}}>
                    <div className="container text-white">
                        <h1 className="display-4 fw-bold">Our Branches</h1>
                        <p className="lead">Find a FEMW Church near you</p>
                    </div>
                </div>
            </div>

            {/* Map Section */}
            <section className="py-5">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8">
                            <div id="map" style={{height: '700px', width: '100%', borderRadius: '10px'}}></div>
                        </div>
                        <div className="col-lg-4">
                            <div className="card branch-card">
                                <div className="card-body">
                                    <h3 className="section-header h4">Our Locations</h3>
                                    <div className="cross-divider">✟</div>
                                    {/* Branch content */}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<BranchesPage />, document.getElementById('root'));
</script>

<style>
.branch-item:hover {
    background-color: #f8f9fa;
}

.branch-list::-webkit-scrollbar {
    width: 6px;
}

.branch-list::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.branch-list::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.branch-list::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.custom-div-icon {
    background: transparent;
    border: none;
}

.marker-pin {
    width: 30px;
    height: 30px;
    border-radius: 50% 50% 50% 0;
    background: #007bff;
    position: absolute;
    transform: rotate(-45deg);
    left: 50%;
    top: 50%;
    margin: -15px 0 0 -15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.marker-pin::after {
    content: '';
    width: 24px;
    height: 24px;
    margin: 3px 0 0 3px;
    background: #fff;
    position: absolute;
    border-radius: 50%;
}

.hq-pin {
    background: #dc3545; /* Different color for headquarters */
    transform: rotate(-45deg) scale(1.2); /* Slightly larger */
}

.marker-pin span {
    transform: rotate(45deg);
    display: block;
    z-index: 1;
}
</style>

<!-- Replace the Google Maps script with these Leaflet CDN links -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<?php include 'includes/footer.php'; ?> 