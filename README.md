# GeoIP Service

GeoIP is a geolocation service that detects user IPs and provides geolocation data.

## Features

- IP detection
- Geolocation data (country, city, coordinates)
- Language customization
- Currency information
- Easy integration

## Quick Start

1. Clone the repo:

   ```bash
   git clone https://github.com/notcoderguy/geoip.git
   cd geoip
   ```

2. Start with Docker:

   ```bash
   docker-compose up --build
   ```

## API Usage

Get geolocation:

```bash
curl http://localhost:8000/api/detect
```

Query specific IP:

```bash
curl http://localhost:8000/api/detect/{IP_ADDRESS}
```

## Documentation

See `/docs` for API details and examples.

## Examples

- Auto language switching
- Local currency display

## Contributing

1. Fork the repo
2. Create a feature branch
3. Commit changes
4. Push to branch
5. Open a PR

## License

Unlicense - See [LICENSE](LICENSE)

## Support

Open an issue or email <me@notcoderguy.com>
