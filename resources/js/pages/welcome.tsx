import AppLogoIcon from '@/components/app-logo-icon'; // Assuming this is the path to your logo icon
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'; // Assuming shadcn components are here
import { Skeleton } from '@/components/ui/skeleton'; // For loading state
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

interface GeoIpData {
    IP: string;
    ASN: {
        number: string | number;
        organization: string;
    };
    city: {
        name: string;
        postal: string;
        location: {
            latitude: number | string;
            longitude: number | string;
        };
    };
    country: {
        name: string;
        ISO: string;
    };
    continent: {
        name: string;
        code: string;
    };
    language: Record<string, string> | string;
    currency: Record<string, string> | string;
}

export default function Welcome() {
    const [geoIpData, setGeoIpData] = useState<GeoIpData | null>(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        const fetchData = async () => {
            setLoading(true);
            setError(null);
            // Check if running locally (adjust hostname check if needed)
            const isLocal = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
            const apiUrl = isLocal ? '/api/detect/8.8.8.8' : '/api/detect';

            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data: GeoIpData = await response.json();
                setGeoIpData(data);
            } catch (e: unknown) {
                console.error('Failed to fetch GeoIP data:', e);
                let errorMessage = 'Failed to load data.';
                if (e instanceof Error) {
                    errorMessage = e.message;
                } else if (typeof e === 'string') {
                    errorMessage = e;
                }
                setError(errorMessage);
                // Optionally set default data or handle error state
                // For now, we'll just show an error message
            } finally {
                setLoading(false);
            }
        };

        fetchData();
    }, []);

    const renderInfoItem = (label: string, value: React.ReactNode) => (
        <div className="flex items-center justify-between gap-4 py-2">
            <span className="font-medium">{label}:</span>
            <span className="text-right">{value || 'N/A'}</span>
        </div>
    );

    const formatLocation = (data: GeoIpData) => {
        const parts = [data.city?.name, data.country?.name, data.country?.ISO].filter(Boolean);
        return parts.join(', ') || 'Unknown';
    };

    const formatAsn = (data: GeoIpData) => {
        if (!data.ASN || data.ASN.number === 'Unknown') return 'Unknown';
        return `AS${data.ASN.number} (${data.ASN.organization || 'Unknown'})`;
    };

    const formatCoordinates = (data: GeoIpData) => {
        if (data.city?.location?.latitude === 'Unknown' || data.city?.location?.longitude === 'Unknown') return 'Unknown';
        return `${data.city?.location?.latitude}° N, ${data.city?.location?.longitude}° W`;
    };

    const formatLanguage = (lang: Record<string, string> | string) => {
        if (typeof lang === 'string') return lang;
        if (!lang) return 'Unknown';
        return Object.entries(lang)
            .map(([code, name]) => `${name} (${code})`)
            .join(', ');
    };

    const formatCurrency = (curr: Record<string, string> | string) => {
        if (typeof curr === 'string') return curr;
        if (!curr) return 'Unknown';
        return Object.entries(curr)
            .map(([code, name]) => `${name} (${code})`)
            .join(', ');
    };

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="bg-background text-foreground flex min-h-screen flex-col items-center p-6 lg:justify-center lg:p-8">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl"></header>
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-4xl lg:flex-row">
                        {/* Left Panel: IP Info */}
                        <Card className="bg-card flex-1 rounded-tl-none rounded-tr-none rounded-br-lg rounded-bl-lg border p-6 pb-12 text-sm leading-[20px] lg:rounded-tl-lg lg:rounded-br-none lg:p-10">
                            <CardHeader className="mb-4 p-0 lg:mb-6">
                                <CardTitle className="mb-1 text-base font-medium">
                                    <span className="flex items-center gap-2">
                                        <AppLogoIcon className="text-foreground size-4 fill-current" />
                                        <span>GeoIP - IP Information</span>
                                    </span>
                                </CardTitle>
                            </CardHeader>
                            <CardContent className="p-0">
                                {loading ? (
                                    <div className="flex flex-col gap-4">
                                        <Skeleton className="h-5 w-full" />
                                        <Skeleton className="h-5 w-full" />
                                        <Skeleton className="h-5 w-full" />
                                        <Skeleton className="h-5 w-full" />
                                        <Skeleton className="h-5 w-2/3" />
                                        <Skeleton className="h-5 w-3/4" />
                                        <Skeleton className="h-5 w-1/2" />
                                    </div>
                                ) : error ? (
                                    <div className="text-destructive">Error loading data: {error}</div>
                                ) : geoIpData ? (
                                    <div className="mb-4 flex flex-col gap-1 lg:mb-6">
                                        {renderInfoItem('IP Address', geoIpData.IP)}
                                        {renderInfoItem('Location', formatLocation(geoIpData))}
                                        {renderInfoItem('ASN', formatAsn(geoIpData))}
                                        {renderInfoItem('Coordinates', formatCoordinates(geoIpData))}
                                        {renderInfoItem(
                                            'Continent',
                                            `${geoIpData.continent?.name || 'Unknown'} (${geoIpData.continent?.code || 'N/A'})`,
                                        )}
                                        {renderInfoItem('Language(s)', formatLanguage(geoIpData.language))}
                                        {renderInfoItem('Currency', formatCurrency(geoIpData.currency))}
                                    </div>
                                ) : (
                                    <div>No data available.</div>
                                )}

                                <ul className="mb-4 flex flex-col lg:mb-6">
                                    {/* Documentation Link */}
                                    <li className="relative flex items-center gap-4 py-2">
                                        <span className="bg-card relative py-1">
                                            <span className="border-border bg-background flex h-3.5 w-3.5 items-center justify-center rounded-full border shadow-sm">
                                                <span className="bg-muted-foreground/50 h-1.5 w-1.5 rounded-full" />
                                            </span>
                                        </span>
                                        <span>
                                            Read the
                                            <a
                                                href="https://docs.geoip.in/"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="text-primary ml-1 inline-flex items-center space-x-1 font-medium underline underline-offset-4"
                                            >
                                                <span>Documentation</span>
                                                <svg
                                                    width={10}
                                                    height={11}
                                                    viewBox="0 0 10 11"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    className="h-2.5 w-2.5"
                                                >
                                                    <path
                                                        d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                                        stroke="currentColor"
                                                        strokeLinecap="square"
                                                    />
                                                </svg>
                                            </a>
                                        </span>
                                    </li>
                                    {/* Removed Laracasts link as it wasn't requested to be kept */}
                                </ul>
                                {/* Removed Deploy button as it wasn't requested */}
                            </CardContent>
                        </Card>

                        {/* Right Panel: Map */}
                        <div className="bg-muted relative -mb-px aspect-[335/376] w-full shrink-0 overflow-hidden rounded-t-lg lg:mb-0 lg:-ml-px lg:aspect-auto lg:w-[438px] lg:rounded-t-none lg:rounded-r-lg">
                            {loading ? (
                                <div className="flex h-full items-center justify-center">
                                    <Skeleton className="h-full w-full" />
                                </div>
                            ) : error ||
                              !geoIpData ||
                              geoIpData.city?.location?.latitude === 'Unknown' ||
                              geoIpData.city?.location?.longitude === 'Unknown' ? (
                                <div className="text-muted-foreground flex h-full items-center justify-center p-4 text-center">
                                    Map unavailable {error ? `(${error})` : '(location unknown)'}
                                </div>
                            ) : (
                                <iframe
                                    width="100%"
                                    height="100%"
                                    style={{ border: 0, filter: 'grayscale(100%)' }} // Apply grayscale filter
                                    loading="lazy"
                                    allowFullScreen
                                    referrerPolicy="no-referrer-when-downgrade"
                                    src={`https://www.openstreetmap.org/export/embed.html?bbox=${Number(geoIpData.city.location.longitude) - 0.1},${Number(geoIpData.city.location.latitude) - 0.1},${Number(geoIpData.city.location.longitude) + 0.1},${Number(geoIpData.city.location.latitude) + 0.1}&layer=mapnik&marker=${geoIpData.city.location.latitude},${geoIpData.city.location.longitude}`}
                                ></iframe>
                            )}
                            <div className="absolute inset-0 rounded-t-lg shadow-[inset_0px_0px_0px_1px_hsl(var(--border))] lg:rounded-t-none lg:rounded-r-lg" />
                        </div>
                    </main>
                </div>
                <div className="hidden h-14.5 lg:block"></div>
                <footer className="flex w-full items-center justify-center bg-transparent py-4 text-sm">
                    <a
                        href="https://notcoderguy.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        className="text-foreground underline decoration-dashed underline-offset-4"
                    >
                        Made with ❤️ by notcoderguy
                    </a>
                </footer>
            </div>
        </>
    );
}
