@extends('layouts.app')

@section('title', 'Rooms & Suites')

@section('content')
<div style="padding-top: 70px; min-height: 100vh; background: #f8f9fa;">
    <!-- Hero Section -->
    <section style="background: linear-gradient(135deg, #2c5aa0 0%, #1e3d72 100%); color: white; padding: 3rem 0; text-align: center;">
        <div class="container">
            <h1 style="font-size: 3rem; font-weight: 700; margin-bottom: 1rem;">Our Luxury Rooms</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                Discover comfort and elegance in our thoughtfully designed accommodations
            </p>
        </div>
    </section>
    
    <!-- Filters Section -->
    <section style="background: white; padding: 1.5rem 0; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
                <!-- Filters -->
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;">
                    <select id="roomTypeFilter" style="padding: 0.75rem 1rem; border: 2px solid #ddd; border-radius: 8px; background: white;">
                        <option value="">All Room Types</option>
                        <option value="single">Single Room</option>
                        <option value="double">Double Room</option>
                        <option value="suite">Suite</option>
                        <option value="deluxe">Deluxe Room</option>
                    </select>
                    
                    <select id="guestFilter" style="padding: 0.75rem 1rem; border: 2px solid #ddd; border-radius: 8px; background: white;">
                        <option value="">Any Guests</option>
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4+ Guests</option>
                    </select>
                    
                    <div style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 0.75rem 1rem; min-width: 200px;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Price Range:</label>
                        <input type="range" id="priceRange" class="slider" min="0" max="12000" value="12000" style="width: 100%; margin-bottom: 0.25rem;">
                        <div style="display: flex; justify-content: space-between; font-size: 0.9rem; color: #666;">
                            <span>KSH 0</span>
                            <span id="maxPrice" style="font-weight: 600; color: #2c5aa0;">KSH 12,000</span>
                        </div>
                    </div>
                    
                    <button id="clearFilters" class="btn btn-outline">Clear All</button>
                </div>
                
                <!-- Sort Options -->
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <select id="sortBy" style="padding: 0.75rem 1rem; border: 2px solid #ddd; border-radius: 8px; background: white;">
                        <option value="price-asc">Price: Low to High</option>
                        <option value="price-desc">Price: High to Low</option>
                        <option value="name-asc">Name: A to Z</option>
                        <option value="type-asc">Room Type</option>
                    </select>
                    
                    <div style="display: flex; background: #f1f1f1; border-radius: 8px; padding: 4px;">
                        <button id="gridView" style="padding: 0.5rem; background: white; border: none; border-radius: 6px; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">⊞</button>
                        <button id="listView" style="padding: 0.5rem; background: none; border: none; border-radius: 6px; cursor: pointer;">☰</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Loading State -->
    <div id="loadingState" style="display: flex; justify-content: center; align-items: center; padding: 4rem 0;">
        <div style="text-align: center;">
            <div style="width: 50px; height: 50px; border: 3px solid #f3f3f3; border-top: 3px solid #2c5aa0; border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto 1rem;"></div>
            <p style="color: #666; font-size: 1.1rem;">Loading rooms...</p>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container" style="padding: 2rem 0;">
        <!-- Results Info -->
        <div id="resultsInfo" style="margin-bottom: 2rem; display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <h2 style="font-size: 1.75rem; font-weight: 700; color: #333;">
                    <span id="roomCount">0</span> Room<span id="roomCountPlural">s</span> Available
                </h2>
                <button id="checkAvailabilityBtn" class="btn btn-primary">
                    Check Availability
                </button>
            </div>
        </div>
        
        <!-- Rooms Container -->
        <div id="roomsContainer" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
            <!-- Rooms will be loaded here -->
        </div>
        
        <!-- No Results -->
        <div id="noResults" style="text-align: center; padding: 4rem 0; display: none;">
            <div style="max-width: 400px; margin: 0 auto;">
                <div style="width: 80px; height: 80px; background: #f1f1f1; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; color: #999;">
                    🏨
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #333; margin-bottom: 0.75rem;">No rooms match your criteria</h3>
                <p style="color: #666; margin-bottom: 1.5rem;">Try adjusting your filters to see more options</p>
                <button id="clearFiltersBtn" class="btn btn-primary">
                    Show All Rooms
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Utility Classes */
.hidden {
    display: none !important;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s ease;
}

.btn-primary {
    background: #2c5aa0;
    color: white;
}

.btn-primary:hover {
    background: #1e3d72;
    transform: translateY(-1px);
}

.btn-outline {
    background: transparent;
    color: #666;
    border: 2px solid #ddd;
}

.btn-outline:hover {
    background: #f5f5f5;
    border-color: #999;
}

/* Room Card Styles */
.room-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid #e1e1e1;
}

.room-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.room-image-container {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.room-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.room-card:hover .room-image {
    transform: scale(1.03);
}

.room-type-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #2c5aa0;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.room-price-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.95);
    color: #333;
    padding: 6px 12px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 0.85rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.room-content {
    padding: 20px;
}

.room-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.3;
}

.room-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 16px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.room-features {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 16px;
}

.feature-tag {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: #f5f5f5;
    color: #555;
    padding: 4px 8px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
}

.room-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.room-btn-primary {
    flex: 1;
    background: #2c5aa0;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    text-align: center;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.room-btn-primary:hover {
    background: #1e3d72;
    transform: translateY(-1px);
}

.room-btn-secondary {
    flex: 1;
    background: white;
    color: #2c5aa0;
    border: 2px solid #2c5aa0;
    padding: 8px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    text-align: center;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.room-btn-secondary:hover {
    background: #2c5aa0;
    color: white;
    transform: translateY(-1px);
}

/* List View */
.rooms-list .room-card {
    display: flex;
    align-items: stretch;
    height: auto;
}

.rooms-list .room-image-container {
    width: 250px;
    flex-shrink: 0;
}

.rooms-list .room-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .rooms-list .room-card {
        flex-direction: column;
    }
    
    .rooms-list .room-image-container {
        width: 100%;
        height: 200px;
    }
    
    #roomsContainer {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 480px) {
    .room-actions {
        flex-direction: column;
    }
    
    .room-btn-primary, .room-btn-secondary {
        width: 100%;
        flex: none;
    }
}

.slider::-moz-range-track {
    background: #e2e8f0;
    border-radius: 4px;
    height: 6px;
    border: none;
}

.slider::-moz-range-thumb {
    background: #2c5aa0;
    border-radius: 50%;
    height: 18px;
    width: 18px;
    cursor: pointer;
    border: none;
    box-shadow: 0 2px 6px rgba(44, 90, 160, 0.3);
}

.slider::-webkit-slider-track {
    background: #e2e8f0;
    border-radius: 4px;
    height: 6px;
}

.slider::-webkit-slider-thumb {
    appearance: none;
    background: #2c5aa0;
    border-radius: 50%;
    height: 18px;
    width: 18px;
    cursor: pointer;
    margin-top: -6px;
    box-shadow: 0 2px 6px rgba(44, 90, 160, 0.3);
}

/* Simple Animations */
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-slide-up {
    animation: slideUp 0.4s ease-out;
}

@endpush

@push('scripts')
<script>
let allRooms = [];
let filteredRooms = [];
let currentView = 'grid';

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    loadRooms();
    setupEventListeners();
    setupViewToggle();
});

function setupEventListeners() {
    // Helper function to safely add event listener
    function safeAddEventListener(elementId, event, handler) {
        const element = document.getElementById(elementId);
        if (element) {
            element.addEventListener(event, handler);
        } else {
            console.warn(`Element with id '${elementId}' not found`);
        }
    }
    
    // Filter event listeners
    safeAddEventListener('roomTypeFilter', 'change', applyFilters);
    safeAddEventListener('guestFilter', 'change', applyFilters);
    safeAddEventListener('priceRange', 'input', handlePriceChange);
    safeAddEventListener('sortBy', 'change', applySorting);
    
    // Clear filters
    safeAddEventListener('clearFilters', 'click', clearAllFilters);
    safeAddEventListener('clearFiltersBtn', 'click', clearAllFilters);
    
    // View toggle buttons
    safeAddEventListener('gridView', 'click', () => setView('grid'));
    safeAddEventListener('listView', 'click', () => setView('list'));
    
    // Check availability button
    safeAddEventListener('checkAvailabilityBtn', 'click', openAvailabilityCheck);
}

function handlePriceChange() {
    const priceRange = document.getElementById('priceRange');
    const maxPrice = document.getElementById('maxPrice');
    
    if (priceRange && maxPrice) {
        const value = parseInt(priceRange.value);
        maxPrice.textContent = `KSH ${value.toLocaleString()}`;
        applyFilters();
    }
}

function setupViewToggle() {
    setView('grid'); // Default to grid view
}

function setView(viewType) {
    currentView = viewType;
    
    const gridBtn = document.getElementById('gridView');
    const listBtn = document.getElementById('listView');
    const container = document.getElementById('roomsContainer');
    
    if (gridBtn && listBtn) {
        if (viewType === 'grid') {
            // Update button styles
            gridBtn.style.cssText = 'background: white; color: #2c5aa0; padding: 10px 16px; border-radius: 8px; border: 2px solid #2c5aa0; font-weight: 600;';
            listBtn.style.cssText = 'background: transparent; color: #666; padding: 10px 16px; border-radius: 8px; border: 2px solid transparent; font-weight: 500;';
        } else {
            // Update button styles
            gridBtn.style.cssText = 'background: transparent; color: #666; padding: 10px 16px; border-radius: 8px; border: 2px solid transparent; font-weight: 500;';
            listBtn.style.cssText = 'background: white; color: #2c5aa0; padding: 10px 16px; border-radius: 8px; border: 2px solid #2c5aa0; font-weight: 600;';
        }
    }
    
    if (container) {
        if (viewType === 'grid') {
            // Update container
            container.style.cssText = 'display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 32px;';
            container.classList.remove('rooms-list');
        } else {
            // Update container
            container.style.cssText = 'display: flex; flex-direction: column; gap: 24px;';
            container.classList.add('rooms-list');
        }
    }
    
    // Re-render rooms with new view
    displayRooms(filteredRooms);
}

async function loadRooms() {
    try {
        showLoading(true);
        
        const response = await fetch('{{ url("/rooms/all") }}');
        const data = await response.json();
        
        allRooms = Array.isArray(data.rooms) ? data.rooms : Object.values(data.rooms || {});
        filteredRooms = [...allRooms];
        
        displayRooms(filteredRooms);
        updateResultsInfo();
        
    } catch (error) {
        console.error('Error loading rooms:', error);
        showError();
    } finally {
        showLoading(false);
    }
}

function displayRooms(rooms) {
    const container = document.getElementById('roomsContainer');
    const noResults = document.getElementById('noResults');
    
    if (!container) return;
    
    if (!rooms || rooms.length === 0) {
        container.innerHTML = '';
        if (noResults) noResults.classList.remove('hidden');
        return;
    }
    
    if (noResults) noResults.classList.add('hidden');
    
    // Create room cards with animation
    const roomsHTML = rooms.map((room, index) => {
        return createRoomCardHTML(room, index);
    }).join('');
    
    container.innerHTML = roomsHTML;
    
    // Add event listeners to newly created cards
    setupRoomCardListeners();
}

function createRoomCardHTML(room, index) {
    const imageUrl = (room.images && room.images.length > 0) 
        ? `{{ asset('storage') }}/${room.images[0]}` 
        : `{{ asset('images/room-placeholder.jpg') }}`;
    
    // Handle amenities as string or array
    let amenities = [];
    if (typeof room.amenities === 'string' && room.amenities) {
        amenities = room.amenities.split(',').map(a => a.trim().toLowerCase()).slice(0, 3);
    } else if (Array.isArray(room.amenities)) {
        amenities = room.amenities.slice(0, 3);
    }
    
    const amenityIcons = {
        'wifi': '📶',
        'ac': '❄️', 
        'tv': '📺',
        'minibar': '🍷',
        'balcony': '🏢',
        'room_service': '🍽️',
        'safe': '🔒'
    };
    
    return `
        <div class="room-card animate-slide-up" data-room-id="${room.id}" data-price="${room.base_price}" data-type="${room.type}" data-guests="${room.max_guests}" style="animation-delay: ${index * 100}ms">
            <div class="room-image-container">
                <img src="${imageUrl}" alt="${room.name}" class="room-image">
                <div class="room-type-badge">${room.type.charAt(0).toUpperCase() + room.type.slice(1)}</div>
                <div class="room-price-badge">KSH ${parseInt(room.base_price).toLocaleString()}<span style="font-size: 0.7rem; opacity: 0.7;">/night</span></div>
            </div>
            
            <div class="room-content">
                <h3 class="room-title">${room.name}</h3>
                <p class="room-description">${room.description || 'Experience comfort and luxury in this beautifully appointed room.'}</p>
                
                <div class="room-features">
                    <div class="feature-tag">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Up to ${room.max_guests} guests
                    </div>
                    ${amenities.map(amenity => `
                        <div class="feature-tag">
                            <span>${amenityIcons[amenity] || '✓'}</span>
                            ${formatAmenityName(amenity)}
                        </div>
                    `).join('')}
                </div>
                
                <div class="room-actions">
                    <a href="{{ url('/rooms/details') }}/${room.id}" class="room-btn-secondary view-details-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Details
                    </a>
                    <button class="room-btn-primary book-now-btn" data-room-id="${room.id}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    `;
}

function formatAmenityName(amenity) {
    const names = {
        'wifi': 'WiFi',
        'ac': 'A/C',
        'tv': 'TV', 
        'minibar': 'Mini Bar',
        'balcony': 'Balcony',
        'room_service': 'Room Service',
        'safe': 'Safe'
    };
    return names[amenity] || amenity.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
}

function setupRoomCardListeners() {
    // Book now buttons
    document.querySelectorAll('.book-now-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const roomId = this.getAttribute('data-room-id');
            const room = allRooms.find(r => r.id == roomId);
            if (room) {
                window.location.href = `{{ url('/rooms/details') }}/${room.id}`;
            }
        });
    });
}

function applyFilters() {
    const roomTypeEl = document.getElementById('roomTypeFilter');
    const guestFilterEl = document.getElementById('guestFilter');
    const priceRangeEl = document.getElementById('priceRange');
    
    const roomType = roomTypeEl ? roomTypeEl.value : '';
    const guestCapacity = guestFilterEl ? guestFilterEl.value : '';
    const maxPrice = priceRangeEl ? parseInt(priceRangeEl.value) : 12000;
    
    filteredRooms = allRooms.filter(room => {
        // Room type filter
        if (roomType && room.type !== roomType) return false;
        
        // Guest capacity filter
        if (guestCapacity && room.max_guests < parseInt(guestCapacity)) return false;
        
        // Price filter
        if (parseFloat(room.base_price) > maxPrice) return false;
        
        return true;
    });
    
    applySorting();
    displayRooms(filteredRooms);
    updateResultsInfo();
}

function applySorting() {
    const sortByEl = document.getElementById('sortBy');
    const sortBy = sortByEl ? sortByEl.value : 'price-asc';
    
    filteredRooms.sort((a, b) => {
        switch (sortBy) {
            case 'price-asc':
                return parseFloat(a.base_price) - parseFloat(b.base_price);
            case 'price-desc':
                return parseFloat(b.base_price) - parseFloat(a.base_price);
            case 'name-asc':
                return a.name.localeCompare(b.name);
            case 'type-asc':
                return a.type.localeCompare(b.type);
            default:
                return 0;
        }
    });
}

function clearAllFilters() {
    document.getElementById('roomTypeFilter').value = '';
    document.getElementById('guestFilter').value = '';
    document.getElementById('priceRange').value = '12000';
    document.getElementById('maxPrice').textContent = 'KSH 12,000';
    document.getElementById('sortBy').value = 'price-asc';
    
    filteredRooms = [...allRooms];
    applySorting();
    displayRooms(filteredRooms);
    updateResultsInfo();
}

function updateResultsInfo() {
    const resultsInfo = document.getElementById('resultsInfo');
    const roomCount = document.getElementById('roomCount');
    const roomCountPlural = document.getElementById('roomCountPlural');
    
    const count = filteredRooms.length;
    
    if (roomCount) roomCount.textContent = count;
    if (roomCountPlural) roomCountPlural.textContent = count === 1 ? '' : 's';
    
    if (resultsInfo) {
        if (count > 0) {
            resultsInfo.classList.remove('hidden');
        } else {
            resultsInfo.classList.add('hidden');
        }
    }
}

function openAvailabilityCheck() {
    // Redirect to homepage with booking form
    window.location.href = '{{ url("/") }}#booking-form';
}

function showLoading(show) {
    const loadingState = document.getElementById('loadingState');
    const resultsInfo = document.getElementById('resultsInfo');
    const roomsContainer = document.getElementById('roomsContainer');
    
    if (show) {
        if (loadingState) loadingState.classList.remove('hidden');
        if (resultsInfo) resultsInfo.classList.add('hidden');
        if (roomsContainer) roomsContainer.innerHTML = '';
    } else {
        if (loadingState) loadingState.classList.add('hidden');
    }
}

function showError() {
    const container = document.getElementById('roomsContainer');
    container.innerHTML = `
        <div class="col-span-full text-center py-16">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Something went wrong</h3>
                <p class="text-gray-600 mb-6">We couldn't load the rooms. Please try again.</p>
                <button onclick="loadRooms()" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-200">
                    Try Again
                </button>
            </div>
        </div>
    `;
}
</script>
@endpush

@endsection
