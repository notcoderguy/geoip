<!DOCTYPE html>

<html>

<head>
    {{-- <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#1e2124" />
    <link rel="apple-touch-icon" sizes="180x180" href="%PUBLIC_URL%/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="%PUBLIC_URL%/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="%PUBLIC_URL%/favicon-16x16.png">
    <link rel="mask-icon" href="%PUBLIC_URL%/safari-pinned-tab.svg" color="#1e2124">
    <meta name="apple-mobile-web-app-title" content="NotCoderGuy">
    <meta name="application-name" content="NotCoderGuy">
    <meta name="msapplication-TileColor" content="#1e2124">
    <meta name="msapplication-TileImage" content="%PUBLIC_URL%/mstile-144x144.png">
    <meta name="theme-color" content="#1e2124">

    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" /> --}}

    <title>GeoIP</title>
    {{-- <meta name="title" content="GeoIP">
    <meta name="description" content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today."/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geoip.in/">
    <meta property="og:title" content="GeoIP">
<meta property="og:description" content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today." />
    <meta property="og:image" content="%PUBLIC_URL%/banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="NotCoderGuy">
    <meta property="twitter:description"
        content="Welcome to my website! Explore my portfolio showcasing my passion for developing logical applications and bringing static art to life in games. I specialize in C, C++, C#, Python, PHP, and JavaScript (with React). With a focus on game development and backend development, I create fun experiences for all users. This portfolio, built with Tailwind CSS, reflects my career path and technical interests. Visit my Linkedin profile for more information.">
    <meta property="twitter:image" content="%PUBLIC_URL%/banner.png"> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background font-sans">

    <!-- Navbar -->
    <nav class="sm:hidden sticky top-0">
        <ul class="grid grid-cols-3 text-center bg-secondary text-white font-extrabold p-4">
            <li class="mb-2 transition-transform transform hover:scale-105"><a href="#getting-started">Getting Started</a></li>
            <li class="mb-2 transition-transform transform hover:scale-105"><a href="#installation">Installation</a></li>
            <li class="mb-2 transition-transform transform hover:scale-105"><a href="#usage">Usage</a></li>
        </ul>
    </nav>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <nav class="bg-secondary text-white font-extrabold p-4 w-64 hidden sm:block">
            <div class="sticky top-10 pl-5">
                <ul>
                    <li class="mb-2 transition-transform transform hover:scale-105"><a href="#getting-started">Getting Started</a></li>
                    <li class="mb-2 transition-transform transform hover:scale-105"><a href="#installation">Installation</a></li>
                    <li class="mb-2 transition-transform transform hover:scale-105"><a href="#usage">Usage</a></li>
                </ul>
            </div>
        </nav>

        <div class="flex-1 p-8">
            <h1 class="text-3xl font-extrabold sm:text-5xl mb-4">Documentation</h1>

            <!-- Section 1: Getting Started -->
            <section id="getting-started" class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Getting Started</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officia vitae nesciunt nostrum ab fugit et beatae dolores nihil aliquam perferendis non neque voluptas, asperiores ullam praesentium vero amet assumenda repellat delectus! Animi vero facilis ex, necessitatibus eaque nesciunt ea aut assumenda tempore, nostrum incidunt numquam, dicta provident! Doloribus reiciendis voluptatibus similique in tempora? Architecto autem at aspernatur exercitationem eveniet. Accusamus, laboriosam cumque. Iusto quasi nobis quam, esse quia dolorum molestias quod eum porro, fuga ipsa a. Alias voluptates placeat dolorem rem molestiae nobis animi nam mollitia eveniet perspiciatis minima ipsum voluptas omnis sit, ratione nisi distinctio voluptatum blanditiis eaque quam, consequatur ipsam facere? Quis enim assumenda quisquam itaque? Dolore autem dolorum tenetur obcaecati mollitia corrupti iure porro aperiam repellat consectetur. Accusantium cum porro repudiandae consequatur suscipit dolores, accusamus veritatis atque fugit sapiente libero. Iure voluptate rem harum sapiente dolorum et consectetur, officia nostrum dignissimos non molestias nulla, omnis, veritatis assumenda animi accusantium iusto quo autem aspernatur quas doloremque repellendus fugiat. Ipsam veritatis expedita accusamus exercitationem libero quis suscipit aperiam recusandae earum! A, dolor nostrum placeat veniam illo doloremque vel aliquid fugit expedita laudantium earum quibusdam ullam! Culpa possimus ratione perspiciatis sit excepturi voluptas, inventore, unde eaque aperiam natus vel porro. Soluta ab perspiciatis, velit voluptas voluptate, modi earum beatae accusamus, praesentium laudantium ad porro voluptatibus iusto saepe error temporibus quae alias consectetur magni quos fuga. Est error esse, nisi, ratione cumque consequatur alias ex rem fugit beatae exercitationem repudiandae voluptatem ut. Tempora deleniti ea nobis obcaecati eius officiis, debitis reprehenderit consectetur porro, doloremque, quisquam accusamus ad rem! Maiores ut ab earum placeat distinctio rem nisi dolorum impedit laudantium deleniti itaque esse suscipit, delectus labore optio amet unde voluptate fugiat sequi quidem exercitationem repellat explicabo eligendi! Neque repudiandae aliquid debitis quia id quisquam, dignissimos culpa nulla. Quaerat reiciendis repellendus libero.</p>
            </section>

            <!-- Section 2: Installation -->
            <section id="installation" class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Installation</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam dolores fuga repudiandae quas pariatur quia, laborum saepe quisquam eaque corrupti nobis eveniet in consequuntur velit labore mollitia numquam odit officiis odio, ipsum temporibus eius? Dolorem beatae minima voluptatem fugiat labore, sequi reprehenderit praesentium. Temporibus ad quae similique molestias tenetur tempore asperiores repellat explicabo aperiam corrupti, perspiciatis veritatis provident magni veniam fuga nihil blanditiis, saepe tempora ratione quam doloribus. Non rem quos eligendi quis voluptate ad nisi provident fuga dolorum, aliquam officiis excepturi maxime magnam distinctio laboriosam, ratione odio dicta est cum voluptatem eum expedita autem eveniet. Ipsam fuga ipsum ratione facere, tempora inventore veniam maxime recusandae deserunt provident. Voluptatem facere voluptatum nisi eveniet maiores, illo, molestiae quod accusamus ipsum sit harum? Animi qui culpa dolores officia voluptatum blanditiis dignissimos mollitia. Culpa saepe, dolores itaque ea vero nihil esse perferendis quae sed suscipit ipsa, voluptate iste aliquid id totam perspiciatis. Eos ipsum sequi aliquam? Non accusantium excepturi eius expedita magni eaque. Illum a cum at quisquam cumque beatae ipsam iusto? Corporis excepturi labore aperiam voluptates neque quam eum, placeat, fugit, dolorem iste et doloribus sequi. Suscipit nihil impedit inventore debitis quaerat maiores molestiae nostrum! Natus debitis eligendi quos quam vel non nemo voluptatem ullam error iure vero dignissimos commodi, odio impedit corrupti asperiores ipsam mollitia ab aperiam aliquid blanditiis? Pariatur, fugiat cupiditate fugit suscipit exercitationem molestiae quis consequuntur at voluptatum illum, quaerat, neque porro dicta excepturi saepe commodi iure sint mollitia natus deleniti consequatur sunt. Aliquid rem quas pariatur dolor, similique odit, molestias commodi voluptates totam corporis corrupti? Cupiditate esse sed perferendis, ex inventore quaerat alias ullam ipsam odit quae illo totam rem vel fuga, laudantium nemo dolor aspernatur deserunt quia excepturi harum rerum accusantium nostrum nisi? At doloremque, qui nobis magni ducimus officia nihil praesentium earum rerum reprehenderit dolores ad, asperiores, incidunt exercitationem autem repellendus non eligendi. Quae quasi molestiae exercitationem facilis reprehenderit sunt alias, repellat vitae dolorum enim tempora maxime eaque dolorem. Facere itaque, iusto cupiditate eum vitae tempora earum error libero animi aspernatur autem, quisquam placeat, mollitia sunt ullam totam at sint quod impedit vero amet a. Laudantium?</p>
            </section>

            <!-- Section 3: Usage -->
            <section id="usage" class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Usage</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At mollitia ipsum quas magni ea quia, consequuntur accusamus molestias aliquam nesciunt et reprehenderit, soluta exercitationem corporis voluptatem amet temporibus. Dolorum odio rerum facilis ipsum distinctio ipsam corrupti earum? Modi, assumenda velit quaerat sit a unde nostrum molestiae minima, itaque voluptatem facere? Maiores, necessitatibus quia iure reprehenderit consectetur ipsam obcaecati officiis sapiente inventore tempora, voluptate quo doloribus minus minima nulla. Labore tempora ipsam vel voluptates molestias rerum eius nam eum similique maxime, libero autem deserunt distinctio corrupti cumque animi expedita sint aliquam! Ipsum natus debitis beatae reiciendis dicta nisi quisquam? Deserunt veniam voluptas debitis saepe est. Fugit dolorem maiores esse, quia animi assumenda tempora quo doloribus, corrupti incidunt eligendi laboriosam molestiae eum perferendis mollitia quod dolorum aliquam facilis, at debitis? Atque inventore iste sapiente at ea facilis excepturi veritatis adipisci, accusantium nemo obcaecati illo molestiae totam odio? Odit quibusdam necessitatibus iure, magnam ab laboriosam nam temporibus quis aut hic impedit praesentium recusandae doloremque voluptas minus doloribus dolore eius quo quaerat eos consectetur ut dolorem eum quam. Nulla consectetur perferendis architecto, atque earum, dolores provident alias aspernatur facere quasi dignissimos necessitatibus saepe. Dolorem doloremque soluta accusamus repellat deserunt, alias modi ipsum quas eius!</p>
            </section>
        </div>

    </div>

    <footer class="bg-gray-800 text-white p-4">
        <div class="text-gray-400 text-center md:text-left">
           <span class="font-medium">Created with <span class="text-red-500">&hearts;</span> by <a
                href="https://notcoderguy.com">NotCoderGuy</a>
            </span>
        </div>
    </footer>

</body>

</html>