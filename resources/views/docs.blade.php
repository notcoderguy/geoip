@extends('layouts.base')

@section('body')
    <div class="bg-base-200 flex min-h-screen">
        <!-- Sidebar -->
        <nav class="bg-base-300 rounded-lg text-content-text font-medium p-4 w-64 hidden sm:block">
            <div class="sticky top-10 pl-3">
                <ul>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#getting-started">Getting Started</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#api">API</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#rate-limiting">Rate Limiting</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#error-handling">Error Handling</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#privacy-policy">Privacy Policy</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#terms-of-service">Terms of Service</a>
                    </li>
                    <li
                        class="mb-2 transition-transform transform hover:text-secondary hover:underline hover:decoration-dashed">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="flex-1 md:space-y-12 p-8">
            <h1 class="text-3xl font-medium sm:text-5xl mb-16">Documentation</h1>

            <!-- Section 1: Getting Started -->
            <section id="getting-started" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Getting Started</h2>
                <p>Welcome to our geolocation API, designed specifically for webmasters and website owners. Our service
                    enables you to geo-locate your users, offering them customized data for an enhanced browsing experience.
                    Start leveraging our API today to track user locations and deliver the best possible results—no signup
                    required.</p>
            </section>

            <!-- Section 2: API -->
            <section id="api" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># API</h2>
                <p>Our API grants access to user location data, including the country flag, language, and currency, to
                    provide tailored content and services. Utilize our endpoints:</p>
                <ul>
                    <li class="py-1"><code class="bg-base-content text-base-100 p-1">/api/detect</code> - Automatically detects the user's IP for location data.</li>
                    <li class="py-1"><code class="bg-base-content text-base-100 p-1">/api/detect/{IP}</code> - Retrieves location data for a specified IP address.</li>
                </ul>
                <p>Example usage and responses will guide you through integrating our API seamlessly into your services.</p>
            </section>

            <!-- Section 3: Rate Limiting -->
            <section id="rate-limiting" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Rate Limiting</h2>
                <p>Our API is designed to accommodate a wide range of requests without stringent rate limits. In the rare
                    event of excessive requests, such as a DDos attack, we ensure stability by rate limiting to protect our
                    services.</p>
            </section>

            <!-- Section 4: Error Handling -->
            <section id="error-handling" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Error Handling</h2>
                <p>Our system is built to manage errors efficiently, ensuring you receive optimal output. In case of an
                    incorrect IP format, the API will respond with an error, guiding you to correct the request.</p>
            </section>

            <!-- Section 5: Privacy Policy -->
            <section id="privacy-policy" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Privacy Policy</h2>
                <p>Your privacy is paramount. Our service does not log or collect any user data, ensuring full anonymity and
                    security in your use of our API.</p>
            </section>

            <!-- Section 6: Terms of Service -->
            <section id="terms-of-service" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Terms of Service</h2>
                <p>By using our service, you agree to our terms, crafted to ensure a safe and reliable experience. While we
                    impose no specific restrictions, we encourage responsible use of our API.</p>
            </section>

            <!-- Section 7: Contact -->
            <section id="contact" class="mb-8">
                <h2 class="text-secondary text-3xl font-medium mb-4 underline decoration-dashed"># Contact</h2>
                <p>For support or inquiries, reach out directly on Discord (@notcoderguy). Please include all relevant
                    details in your initial message to ensure a swift and accurate response.</p>
            </section>

        </div>

    </div>
@endsection
