<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("Location: login.php");

  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExoEra - Discover Talent</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <div class="app-container">
        <!-- Header -->
        <header>
            <div class="logo">
                <h1>ExoEra</h1>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="">Explore</a></li>
                    <li><a href="#">Auditions</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="./Dashboard/about.html">About</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                </button>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                
<form method="post" action="logout.php" style="margin-left: 10px;">
  <button style="padding: 8px 12px; background-color: #ef4444; color: white; border: none; border-radius: 6px; cursor: pointer;">Logout</button>
</form>

<button class="user-profile">
                    <img src="/placeholder.svg?height=40&width=40" alt="Profile">
                </button>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </header>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Explore</a></li>
                <li><a href="#">Auditions</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-content">
                    <h1>Welcome <?php echo   $_SESSION['username']; ?> to ExoEra</h1>
                    <p>Your gateway to the entertainment industry. Showcase your talent, find auditions, and connect with professionals.</p>
                    <div class="hero-buttons">
                        <button class="btn primary">Get Started</button>
                        <button class="btn secondary">Learn More</button>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="./images/exoera.jpg" alt="ExoEra Platform">
                </div>
            </section>

            <!-- Dashboard Button -->
            <div class="dashboard-button-container">
                <button class="dashboard-button" id="dashboardBtn">
                    <i class="fas fa-user-circle"></i>
                    <span>User Dashboard</span>
                </button>
            </div>

            <!-- Dashboard Panel (Hidden by default) -->
            <div class="dashboard-panel" id="dashboardPanel">
                <div class="dashboard-header">
                    <h3>Your Dashboard</h3>
                    <button class="close-btn" id="closeDashboardBtn"><i class="fas fa-times"></i></button>
                </div>
                <div class="dashboard-content">
                    <div class="profile-summary">
                        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Profile">
                        <div>
                            <h4><?php echo $_SESSION['username']; ?></h4>
                            <p>Actor & Director</p>
                        </div>
                    </div>
                    <div class="dashboard-stats">
                        <div class="stat-item">
                            <span class="stat-number">24</span>
                            <span class="stat-label">Connections</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">7</span>
                            <span class="stat-label">Applications</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">12</span>
                            <span class="stat-label">Notifications</span>
                        </div>
                        
                    </div>
                    <div class="quick-actions">
                        <a href="./Dashboard/portfolio.html"><button><i class="fas fa-edit"></i> Edit Profile</button></a>
                        <a href="./Dashboard/uploadReel.html"><button><i class="fas fa-video"></i> Upload Reel</button></a>
                        <a href="./Dashboard/Notification.html"><button><i class="fas fa-bell"></i> Notifications</button></a>
                        <a href="./Dashboard/skills.html"><button><i class="fas fa-lightbulb"></i> Skills</button></a>
                        <a href="./Dashboard/messages.html"><button><i class="fas fa-envelope"></i> Messages</button></a>
                        <a href="./Dashboard/engagement.html"><button><i class="fas fa-users"></i> Engagements</button></a>
                        <a href="./Dashboard/settings.html"><button><i class="fas fa-cog"></i> Settings</button></a>
                    </div>
                    
                </div>
            </div>

            <!-- Reel Feed Section -->
            <section class="section reels-section">
                <div class="section-header">
                    <h2>Reel Feed</h2>
                    <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="reels-container">
                    <div class="reel-card">
                        <div class="reel-video">
                            <img src="/placeholder.svg?height=300&width=200" alt="Reel Thumbnail">
                            <button class="play-btn"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="reel-info">
                            <div class="reel-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>Sarah Johnson</span>
                            </div>
                            <p>My latest theater performance #acting #drama</p>
                            <div class="reel-actions">
                                <button><i class="fas fa-heart"></i> 245</button>
                                <button><i class="fas fa-comment"></i> 32</button>
                                <button><i class="fas fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="reel-card">
                        <div class="reel-video">
                            <img src="/placeholder.svg?height=300&width=200" alt="Reel Thumbnail">
                            <button class="play-btn"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="reel-info">
                            <div class="reel-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>Michael Chen</span>
                            </div>
                            <p>Behind the scenes of my new film project #filmmaking</p>
                            <div class="reel-actions">
                                <button><i class="fas fa-heart"></i> 189</button>
                                <button><i class="fas fa-comment"></i> 24</button>
                                <button><i class="fas fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="reel-card">
                        <div class="reel-video">
                            <img src="/placeholder.svg?height=300&width=200" alt="Reel Thumbnail">
                            <button class="play-btn"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="reel-info">
                            <div class="reel-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>Emma Davis</span>
                            </div>
                            <p>My audition tape for "The Last Chapter" #audition</p>
                            <div class="reel-actions">
                                <button><i class="fas fa-heart"></i> 312</button>
                                <button><i class="fas fa-comment"></i> 47</button>
                                <button><i class="fas fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="reel-card">
                        <div class="reel-video">
                            <img src="/placeholder.svg?height=300&width=200" alt="Reel Thumbnail">
                            <button class="play-btn"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="reel-info">
                            <div class="reel-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>James Wilson</span>
                            </div>
                            <p>Voice acting sample for animated series #voiceover</p>
                            <div class="reel-actions">
                                <button><i class="fas fa-heart"></i> 178</button>
                                <button><i class="fas fa-comment"></i> 19</button>
                                <button><i class="fas fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Trending Posts Section -->
            <section class="section trending-section">
                <div class="section-header">
                    <h2>Trending Posts</h2>
                    <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="trending-container">
                    <div class="trending-card">
                        <div class="trending-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Trending Post">
                        </div>
                        <div class="trending-content">
                            <div class="trending-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>Robert Anderson</span>
                            </div>
                            <h3>How I Landed My First Major Role</h3>
                            <p>Sharing my journey and tips that helped me break into the industry...</p>
                            <div class="trending-stats">
                                <span><i class="fas fa-eye"></i> 2.4k views</span>
                                <span><i class="fas fa-heart"></i> 567 likes</span>
                                <span><i class="fas fa-comment"></i> 89 comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="trending-card">
                        <div class="trending-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Trending Post">
                        </div>
                        <div class="trending-content">
                            <div class="trending-user">
                                <img src="/placeholder.svg?height=30&width=30" alt="User">
                                <span>Sophia Martinez</span>
                            </div>
                            <h3>5 Essential Tips for Your Next Audition</h3>
                            <p>Industry secrets that will help you stand out in your next casting call...</p>
                            <div class="trending-stats">
                                <span><i class="fas fa-eye"></i> 1.8k views</span>
                                <span><i class="fas fa-heart"></i> 423 likes</span>
                                <span><i class="fas fa-comment"></i> 67 comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Two Column Layout for AI Connections and Auditions -->
            <div class="two-column-layout">
                <!-- AI-Suggested Connections -->
                <section class="section connections-section">
                    <div class="section-header">
                        <h2>AI-Suggested Connections</h2>
                        <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="connections-container">
                        <div class="connection-card">
                            <img src="/placeholder.svg?height=80&width=80" alt="Connection">
                            <div class="connection-info">
                                <h3>David Miller</h3>
                                <p>Casting Director at Universal Studios</p>
                                <div class="connection-mutual">
                                    <span><i class="fas fa-user-friends"></i> 3 mutual connections</span>
                                </div>
                            </div>
                            <button class="connect-btn">Connect</button>
                        </div>
                        <div class="connection-card">
                            <img src="/placeholder.svg?height=80&width=80" alt="Connection">
                            <div class="connection-info">
                                <h3>Jennifer Lee</h3>
                                <p>Talent Agent at Creative Artists</p>
                                <div class="connection-mutual">
                                    <span><i class="fas fa-user-friends"></i> 5 mutual connections</span>
                                </div>
                            </div>
                            <button class="connect-btn">Connect</button>
                        </div>
                        <div class="connection-card">
                            <img src="/placeholder.svg?height=80&width=80" alt="Connection">
                            <div class="connection-info">
                                <h3>Thomas Wright</h3>
                                <p>Film Producer at Paramount Pictures</p>
                                <div class="connection-mutual">
                                    <span><i class="fas fa-user-friends"></i> 2 mutual connections</span>
                                </div>
                            </div>
                            <button class="connect-btn">Connect</button>
                        </div>
                    </div>
                </section>

                <!-- Upcoming Auditions -->
                <section class="section auditions-section">
                    <div class="section-header">
                        <h2>Upcoming Auditions</h2>
                        <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="auditions-container">
                        <div class="audition-card">
                            <div class="audition-header">
                                <h3>Lead Role in "The Last Frontier"</h3>
                                <span class="audition-type">Feature Film</span>
                            </div>
                            <div class="audition-details">
                                <p><i class="fas fa-map-marker-alt"></i> Los Angeles, CA</p>
                                <p><i class="fas fa-calendar"></i> May 15, 2025</p>
                                <p><i class="fas fa-user"></i> Male, 25-35 years</p>
                            </div>
                            <div class="audition-footer">
                                <span class="audition-pay">$5,000 - $8,000</span>
                                <button class="apply-btn">Apply Now</button>
                            </div>
                        </div>
                        <div class="audition-card">
                            <div class="audition-header">
                                <h3>Supporting Role in "City Lights"</h3>
                                <span class="audition-type">TV Series</span>
                            </div>
                            <div class="audition-details">
                                <p><i class="fas fa-map-marker-alt"></i> New York, NY</p>
                                <p><i class="fas fa-calendar"></i> May 22, 2025</p>
                                <p><i class="fas fa-user"></i> Female, 20-30 years</p>
                            </div>
                            <div class="audition-footer">
                                <span class="audition-pay">$3,000 - $4,500</span>
                                <button class="apply-btn">Apply Now</button>
                            </div>
                        </div>
                        <div class="audition-card">
                            <div class="audition-header">
                                <h3>Voice Actor for "Dreamworld"</h3>
                                <span class="audition-type">Animated Series</span>
                            </div>
                            <div class="audition-details">
                                <p><i class="fas fa-map-marker-alt"></i> Remote</p>
                                <p><i class="fas fa-calendar"></i> June 5, 2025</p>
                                <p><i class="fas fa-user"></i> All genders, 18-40 years</p>
                            </div>
                            <div class="audition-footer">
                                <span class="audition-pay">$2,000 - $3,000</span>
                                <button class="apply-btn">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Meetups Section -->
            <section class="section meetups-section">
                <div class="section-header">
                    <h2>Upcoming Meetups & Events</h2>
                    <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="meetups-container">
                    <div class="meetup-card">
                        <div class="meetup-date">
                            <span class="day">15</span>
                            <span class="month">MAY</span>
                        </div>
                        <div class="meetup-content">
                            <h3>Actors Networking Night</h3>
                            <p><i class="fas fa-map-marker-alt"></i> The Creative Hub, Los Angeles</p>
                            <p><i class="fas fa-clock"></i> 7:00 PM - 10:00 PM</p>
                            <p class="meetup-description">Connect with fellow actors and industry professionals in a relaxed environment.</p>
                            <div class="meetup-footer">
                                <span><i class="fas fa-users"></i> 78 attending</span>
                                <button class="register-btn">Register</button>
                            </div>
                        </div>
                    </div>
                    <div class="meetup-card">
                        <div class="meetup-date">
                            <span class="day">22</span>
                            <span class="month">MAY</span>
                        </div>
                        <div class="meetup-content">
                            <h3>Filmmaking Workshop</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Digital Arts Center, New York</p>
                            <p><i class="fas fa-clock"></i> 10:00 AM - 4:00 PM</p>
                            <p class="meetup-description">Learn essential filmmaking techniques from industry experts.</p>
                            <div class="meetup-footer">
                                <span><i class="fas fa-users"></i> 45 attending</span>
                                <button class="register-btn">Register</button>
                            </div>
                        </div>
                    </div>
                    <div class="meetup-card">
                        <div class="meetup-date">
                            <span class="day">05</span>
                            <span class="month">JUN</span>
                        </div>
                        <div class="meetup-content">
                            <h3>Industry Mixer & Panel Discussion</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Grand Hotel, Chicago</p>
                            <p><i class="fas fa-clock"></i> 6:30 PM - 9:30 PM</p>
                            <p class="meetup-description">Panel discussion with top casting directors followed by networking.</p>
                            <div class="meetup-footer">
                                <span><i class="fas fa-users"></i> 120 attending</span>
                                <button class="register-btn">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    <script src="index.js"></script>
</body>
</html>
