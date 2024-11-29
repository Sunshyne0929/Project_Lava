<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiveSecure - Explore the Depths of Calapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Hero Section */
        #hero {
            background: url('/public/images/scuba.jpeg') no-repeat center center/cover;
            height: 100vh;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 1;
        }

        #hero div {
            position: relative;
            z-index: 2;
        }

        #hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        #hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        #hero a {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            text-decoration: none;
        }

        #hero .btn-primary {
            background-color: #007bff;
            border: none;
        }

        #hero .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        /* Section Headings */
        section h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: bold;
            color: #0056b3;
        }

        /* Section Padding */
        section {
            padding: 4rem 0;
        }

        /* Dive Packages Section */
        #packages .col-md-4 {
            margin-bottom: 2rem;
            text-align: center;
        }

        #packages h3 {
            margin-bottom: 1rem;
            color: #003d73;
        }

        #packages p {
            margin-bottom: 0.5rem;
        }

        /* Registration Form */
        #registration form {
            max-width: 600px;
            margin: 0 auto;
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #registration form .form-label {
            font-weight: bold;
        }

        #registration button {
            width: 100%;
        }

        /* Dive Spots Map */
        #dive-spots #map {
            margin: 2rem 0;
            border: 2px solid #0056b3;
        }
        
        #dive-spots {
            background-color: #f8f9fa;  /* Light background for the section */
            border-radius: 8px;         /* Rounded corners for the section */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Subtle shadow effect */
        }

        #dive-spots h2 {
            color: #007bff;  /* Bootstrap-like blue color */
            font-weight: 600;
        }

        #dive-spots p {
            font-size: 1.25rem;
            color: #6c757d;  /* Muted text color */
            margin-bottom: 1.5rem;
        }

        #dive-spots ul {
            padding-left: 0;
            display: inline-block;
        }

        #dive-spots li {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        #dive-spots .leaflet-container {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #dive-spots ul li strong {
            color: #007bff; /* Highlight the spot names */
        }


        /* Safety Guidelines */
        #safety {
            background-color: #f8f9fa;  /* Light gray background */
            padding-top: 3rem;
            padding-bottom: 3rem;
    }

#safety h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #007bff;  /* Bootstrap primary color */
}

#safety ul {
    padding-left: 0;
}

#safety .list-group-item {
    font-size: 1.1rem;
    padding: 1.25rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
    margin-bottom: 0.75rem;
}

#safety .list-group-item:last-child {
    margin-bottom: 0;
}

#safety .container {
    max-width: 800px;  /* Limit the width of the content */
}


        /* Testimonials Section */
        #testimonials {
    background-color: #f8f9fa; /* Light background */
    padding-top: 3rem;
    padding-bottom: 3rem;
}

#testimonials h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #007bff; /* Bootstrap primary color */
}

#testimonials p {
    font-size: 1.25rem;
    font-style: italic;
}

#testimonials strong {
    font-size: 1rem;
    font-weight: bold;
    color: #333;
}


        /* FAQ Accordion */
        #faqs .accordion-button {
            background-color: #f8f9fa;
            border: none;
            color: #0056b3;
            font-weight: bold;
        }

        #faqs .accordion-body {
            background-color: #f1f1f1;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            padding: 1rem 0;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        #about {
    background-color: #f8f9fa;  /* Light background for the section */
    border-radius: 8px;         /* Rounded corners for the section */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Subtle shadow effect */
}

#about h2 {
    color: #007bff;  /* Bootstrap-like blue color */
    font-weight: 600;
}

#about .lead {
    font-size: 1.25rem;
    color: #6c757d;  /* Muted text color */
    margin-bottom: 1.5rem;
}

#about ul {
    padding-left: 0;
    display: inline-block;
}

#about li {
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

#about .bi-check-circle {
    margin-right: 10px;
    font-size: 1.2rem;
}

        



    </style>
</head>
<body>

    <?php include APP_DIR.'views/templates/header.php'; ?>

    <div id="app">
        <?php include APP_DIR.'views/templates/nav.php'; ?>

        <!-- Hero Section -->
        <div id="hero">
            <div>
                <h1>Explore the Depths of Calapan: Dive into Adventure!</h1>
                <p>Discover the underwater wonders of Calapan with our expert dive packages and courses.</p>
                <a href="register_diver" class="btn btn-primary">Register for Your Dive</a>
                <a href="#about" class="btn btn-secondary">Learn More</a>
            </div>
        </div>

        <!-- About Scuba Diving in Calapan -->
        <section id="about" class="text-center py-5">
    <h2 class="display-4">About Scuba Diving in Calapan</h2>
    <p class="lead">Calapan City offers a world-class scuba diving experience with its rich marine biodiversity and pristine dive spots. From vibrant coral reefs to fascinating wrecks, you'll find an underwater paradise here.</p>
    <p><strong class="h4">Why Dive Here?</strong></p>
    <ul class="list-unstyled">
        <li><i class="bi bi-check-circle text-success"></i> Stunning coral reefs teeming with marine life.</li>
        <li><i class="bi bi-check-circle text-success"></i> Exciting wreck dives for adventure seekers.</li>
        <li><i class="bi bi-check-circle text-success"></i> Witness rare marine species found only in this region.</li>
    </ul>
</section>


        <!-- Dive Packages Section -->
        <section id="packages">
            <h2>Our Dive Packages</h2>
            <div class="row">
                <!-- Beginner Courses -->
                <div class="col-md-4">
                    <h3>Beginner Courses</h3>
                    <p>Intro to Diving</p>
                    <p>Duration: 2 Days</p>
                    <p>Price: ₱5000</p>
                    <p>Inclusions: Gear, Instructor, Boat</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#courseModal">More Info</button>
                </div>
                <!-- Advanced Courses -->
                <div class="col-md-4">
                    <h3>Advanced Courses</h3>
                    <p>Advanced Diving Techniques</p>
                    <p>Duration: 3 Days</p>
                    <p>Price: ₱7000</p>
                    <p>Inclusions: Gear, Instructor, Boat</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#courseModal">More Info</button>
                </div>
                <!-- Guided Dives -->
                <div class="col-md-4">
                    <h3>Guided Dives</h3>
                    <p>Explore Dive Sites with Expert Guides</p>
                    <p>Duration: 1 Day</p>
                    <p>Price: ₱3000</p>
                    <p>Inclusions: Gear, Guide, Boat</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#courseModal">More Info</button>
                </div>
            </div>
        </section>

        <!-- Registration and Permit System -->
        <section id="registration">
            <h2>Registration and Permit System</h2>
            <form>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="certification" class="form-label">Dive Certification (if applicable)</label>
                    <input type="file" class="form-control" id="certification">
                </div>
                <div class="mb-3">
                    <label for="bookingDate" class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="bookingDate" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register for Dive</button>
            </form>
        </section>

        <!-- Dive Spot Highlights -->
    <section id="dive-spots" class="text-center py-5">
        <h2 class="display-4">Explore Dive Spots</h2>
        <div id="map" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom mb-4" style="height: 400px;"></div>
        <p><strong class="h4">Featured Spots:</strong></p>
            <ul class="list-unstyled">
                <li><strong>Spot 1:</strong> The Coral Gardens</li>
                <li><strong>Spot 2:</strong> The Wreck of the Sunken Ship</li>
                <li><strong>Spot 3:</strong> The Shark Reef</li>
            </ul>
    </section>


        <!-- Safety Guidelines -->
        <section id="safety" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Safety Guidelines</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Always dive with a certified instructor.</li>
            <li class="list-group-item">Never exceed your experience level.</li>
            <li class="list-group-item">Stay hydrated and avoid alcohol before diving.</li>
            <li class="list-group-item">Follow all safety protocols and guidelines during your dive.</li>
        </ul>
    </div>
</section>


<section id="testimonials" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">What Our Divers Say</h2>
        <div class="row">
            <div class="col-md-4">
                <p class="text-center">
                    <i class="bi bi-quote"></i> "The best dive experience ever! Calapan's marine life is stunning, and the dive operators are so professional."
                </p>
                <p class="text-center"><strong>- John Doe, Happy Diver</strong></p>
            </div>
            <div class="col-md-4">
                <p class="text-center">
                    <i class="bi bi-quote"></i> "An unforgettable adventure! The underwater world is beyond beautiful, and the guides made us feel completely safe."
                </p>
                <p class="text-center"><strong>- Jane Smith, Adventurous Diver</strong></p>
            </div>
            <div class="col-md-4">
                <p class="text-center">
                    <i class="bi bi-quote"></i> "The diving spots are amazing. I highly recommend diving in Calapan for anyone who loves marine life!"
                </p>
                <p class="text-center"><strong>- Mark Lee, Ocean Explorer</strong></p>
            </div>
        </div>
    </div>
</section>



        <!-- FAQs Accordion -->
        <section id="faqs">
            <h2>Frequently Asked Questions</h2>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the best time to go scuba diving in Calapan?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            The best time for diving in Calapan is during the dry season, typically from December to May.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Do I need prior diving experience to register for courses?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            No, we offer courses for both beginners and advanced divers. Our instructors will guide you through every step.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer>
            <div class="container text-center">
                <p>&copy; 2024 DiveSecure. All Rights Reserved.</p>
                <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        // Initialize Map for Dive Spots
        const map = L.map('map').setView([13.415, 121.147], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const diveSpots = [
            { name: "Balingawan Point", lat: 13.400, lng: 121.145, description: "Intermediate to Advanced, depth 10-30m" },
            { name: "Silonay Mangrove Conservation Area", lat: 13.430, lng: 121.158, description: "Beginner, depth 5-15m" }
        ];

        diveSpots.forEach(spot => {
            L.marker([spot.lat, spot.lng]).addTo(map)
                .bindPopup(`<b>${spot.name}</b><br>${spot.description}`);
        });
    </script>
</body>
</html>
