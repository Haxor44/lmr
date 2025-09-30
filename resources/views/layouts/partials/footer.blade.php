<footer style="background: #1a1a1a; color: white; padding: 3rem 0 1rem; margin-top: 3rem;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color); font-size: 1.5rem;">MatFam Resort</h3>
                <p style="color: #ccc; line-height: 1.6; margin-bottom: 1rem;">
                    Experience luxury redefined with our exceptional accommodations, world-class amenities, and personalized service for an unforgettable stay.
                </p>
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <a href="#" style="width: 40px; height: 40px; background: #34495e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s ease;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" style="width: 40px; height: 40px; background: #34495e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s ease;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" style="width: 40px; height: 40px; background: #34495e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s ease;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" style="width: 40px; height: 40px; background: #34495e; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s ease;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Quick Links</h3>
                <ul style="list-style: none;">
                    <li style="padding: 0.25rem 0;">
                        <a href="{{ url('/rooms') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-bed" style="margin-right: 0.5rem;"></i>
                            Rooms & Suites
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="{{ url('/services') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-concierge-bell" style="margin-right: 0.5rem;"></i>
                            Services
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="{{ url('/about') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i>
                            About Us
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="#contact" style="color: #ccc; text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Our Services</h3>
                <ul style="list-style: none;">
                    <li style="padding: 0.25rem 0;">
                        <a href="#" style="color: #ccc; text-decoration: none;">
                            <i class="fas fa-spa" style="margin-right: 0.5rem;"></i>
                            Spa & Wellness
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="#" style="color: #ccc; text-decoration: none;">
                            <i class="fas fa-utensils" style="margin-right: 0.5rem;"></i>
                            Fine Dining
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="#" style="color: #ccc; text-decoration: none;">
                            <i class="fas fa-glass-cheers" style="margin-right: 0.5rem;"></i>
                            Restaurant & Bar
                        </a>
                    </li>
                    <li style="padding: 0.25rem 0;">
                        <a href="#" style="color: #ccc; text-decoration: none;">
                            <i class="fas fa-calendar-alt" style="margin-right: 0.5rem;"></i>
                            Events & Functions
                        </a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Contact Us</h3>
                <div style="color: #ccc; line-height: 1.6;">
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem; color: var(--primary-color);"></i>
                        Lanet-Ndundori Rd, opp Barracks<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Nakuru City, Kenya
                    </p>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-phone" style="margin-right: 0.5rem; color: var(--primary-color);"></i>
                        +254 700 000 000
                    </p>
                    <p style="margin-bottom: 0.5rem;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem; color: var(--primary-color);"></i>
                        info@lanetmatfamresort.co.ke
                    </p>
                    <p>
                        <i class="fas fa-clock" style="margin-right: 0.5rem; color: var(--primary-color);"></i>
                        24/7 Customer Service
                    </p>
                </div>
            </div>
        </div>
        
        <div style="border-top: 1px solid #333; padding-top: 1rem; display: flex; justify-content: space-between; align-items: center; color: #999; font-size: 0.9rem; flex-wrap: wrap; gap: 1rem;">
            <p>&copy; {{ date('Y') }} MatFam Resort. All rights reserved.</p>
            <div style="display: flex; gap: 2rem;">
                <a href="#" style="color: #999; text-decoration: none;">Privacy Policy</a>
                <a href="#" style="color: #999; text-decoration: none;">Terms & Conditions</a>
                <a href="#" style="color: #999; text-decoration: none;">FAQs</a>
            </div>
        </div>
    </div>
</footer>
