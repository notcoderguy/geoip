# 🌍 GeoIP Service 🚀

Welcome to **GeoIP** - the dynamic geolocation service that empowers your applications by detecting user IPs and providing essential geolocation information. Perfect for customizing user experiences with local language and currency settings! 🎉

## Features ✨

- **IP Detection**: Instantly identifies the user's IP address.
- **Geolocation Data**: Fetches country, city, latitude, longitude, and more.
- **Language Customization**: Sets the application's language based on the user's location.
- **Currency Information**: Provides local currency information to tailor financial interactions.
- **Easy Integration**: Designed with simplicity in mind for seamless integration into your system.

## Getting Started 🚀

Integrating GeoIP into your project is as easy as pie! 🥧 Follow these steps to get started:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/notcoderguy/geoip.git
   cd geoip
   ```

2. **Environment Setup**

   Make sure you have Docker installed and running on your machine. Then, build and run the containers:

   ```bash
   docker-compose up --build
   ```

3. **API Usage**

   Send a GET request to `/api/detect` to retrieve geolocation information:

   ```bash
   curl http://localhost:8000/api/detect
   ```

   You can also get the geolocation information for a custom IP by sending a GET request to `/api/detect/{USER_IP}`:

   ```bash
   curl http://localhost:8000/api/detect/{USER_IP}
   ```

   Replace `USER_IP` with the actual IP address you wish to query.

## Documentation 📚

Dive deeper into GeoIP with our comprehensive API documentation available at `/docs`. Learn about all the endpoints, request formats, and sample responses to make the most out of our service.

## Examples 🌟

- **Language Switcher**: Automatically update your application's language based on user location.
- **Currency Converter**: Display prices in the user's local currency for a personalized shopping experience.

## Contributing 🤝

Got a spicy 🌶️ idea or improvement? Contributions are more than welcome!

1. Fork the repo.
2. Create your feature branch (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -am 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a pull request.

## License 📜

Distributed under the MIT License. See `LICENSE` for more information.

## Support 💪

Need help? Open an issue or contact us at support@geoip.com. We love to help!

Let's make the internet a more localized place, one IP at a time! 🌐✨