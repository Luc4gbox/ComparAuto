<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Constructeur;
use App\Entity\Quiz;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;
use App\Entity\Annonce;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Carburant;


class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $constructeurs = [
            [
                'nom' => 'Audi',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1909-04-25',
                'logo' => 'audi_logo.png',
                "icon"=> "de",
                "description" => "Audi est une entreprise allemande qui a été fondée en 1909. Elle fait partie du groupe Volkswagen. Audi est réputée pour ses véhicules de haute qualité, ses innovations technologiques et ses designs sophistiqués. Elle propose une gamme de véhicules qui comprend des compactes, des berlines, des SUV et des voitures de sport. Audi est également connue pour son implication en compétition automobile, notamment aux 24 Heures du Mans."
            ],
            [
                'nom' => 'BMW',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1916-03-07',
                'logo' => 'bmw_logo.png',
                "icon"=> "de",
                "description"=> "BMW, ou Bayerische Motoren Werke AG, est une entreprise allemande fondée en 1916. BMW est connue pour ses voitures de luxe, ses motos et ses moteurs d'avions. BMW se distingue par la qualité de sa construction, la précision de ses ingénieries et le plaisir de conduite qu'offrent ses véhicules."
            ],
            [
                'nom' => 'Mercedes-Benz',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1926-06-28',
                'logo' => 'mercedes_logo.png',
                "icon"=> "de",
                "description"=> "Fondée en 1926, Mercedes-Benz est une marque du groupe allemand Daimler AG. Elle est réputée pour ses véhicules de luxe, ses autobus et ses camions. Mercedes-Benz est également reconnue pour son innovation technologique, ayant été la première à introduire de nombreuses fonctionnalités de sécurité et de confort qui sont maintenant standard dans l'industrie automobile."
            ],
            [
                'nom' => 'Toyota',
                'pays_origine' => 'Japon',
                'date_fondation' => '1937-08-28',
                'logo' => 'toyota_logo.png',
                "icon"=> "jp",
                "description"=> "Toyota est une entreprise japonaise qui a été fondée en 1937. Elle est l'un des plus grands constructeurs automobiles du monde. Toyota est connue pour ses véhicules durables, fiables et écoénergétiques. Elle a été pionnière dans la production de véhicules hybrides avec la Toyota Prius."
            ],
            [
                'nom' => 'Ford',
                'pays_origine' => 'États-Unis',
                'date_fondation' => '1903-06-16',
                'logo' => 'ford_logo.png',
                "icon"=> "us",
                "description"=> "Ford Motor Company est une entreprise américaine fondée en 1903 par Henry Ford. Ford a révolutionné l'industrie automobile avec son modèle T et la méthode de la chaîne de montage, rendant l'automobile accessible à la classe moyenne. Ford propose une large gamme de véhicules, des petites voitures aux pick-ups et SUV."
            ],
            [
                'nom' => 'Chevrolet',
                'pays_origine' => 'États-Unis',
                'date_fondation' => '1911-11-03',
                'logo' => 'chevrolet_logo.png',
                "icon"=> "us",
                "description"=> "Chevrolet, souvent appelée Chevy, est une marque américaine fondée en 1911 et est une division de General Motors. Chevrolet produit une grande variété de véhicules, des petites voitures compactes aux grandes berlines, SUV, pick-ups et camions. Honda => Honda est une entreprise japonaise fondée en 1948, connue pour ses voitures, motos et équipements motorisés. Honda est reconnue pour la fiabilité et l'efficacité de ses véhicules. Elle produit également le HondaJet, un jet d'affaires léger."
            ],
            [
                'nom' => 'Honda',
                'pays_origine' => 'Japon',
                'date_fondation' => '1948-09-24',
                'logo' => 'honda_logo.png',
                "icon"=> "jp",
                "description"=> "Honda est une entreprise japonaise fondée en 1948, connue pour ses voitures, motos et équipements motorisés. Honda est reconnue pour la fiabilité et l'efficacité de ses véhicules. Elle produit également le HondaJet, un jet d'affaires léger."
            ],
            [
                'nom' => 'Nissan',
                'pays_origine' => 'Japon',
                'date_fondation' => '1933-12-26',
                'logo' => 'nissan_logo.png',
                "icon"=> "jp",
                "description"=> "Nissan est une entreprise japonaise fondée en 1933. Nissan offre une large gamme de véhicules, des berlines aux SUV et camions, ainsi que des véhicules électriques comme la Nissan Leaf. Elle possède également la marque de luxe Infiniti."
            ],
            [
                'nom' => 'Peugeot',
                'pays_origine' => 'France',
                'date_fondation' => '1810-01-01',
                'logo' => 'peugeot_logo.png',
                "icon"=> "fr",
                "description"=> "Peugeot est une marque française fondée en 1810. Elle a commencé par produire des moulins à café et des bicyclettes, puis a commencé à produire des voitures en 1889. Peugeot est connue pour ses designs élégants et ses innovations technologiques."
            ],
            [
                'nom' => 'Renault',
                'pays_origine' => 'France',
                'date_fondation' => '1899-02-25',
                'logo' => 'renault_logo.png',
                "icon"=> "fr",
                "description"=> "Renault est un constructeur automobile français fondé en 1899. Renault produit une large gamme de voitures et de véhicules utilitaires. Renault est également connue pour son implication en Formule 1."
            ],
            [
                'nom' => 'Fiat',
                'pays_origine' => 'Italie',
                'date_fondation' => '1899-07-11',
                'logo' => 'fiat_logo.png',
                "icon"=> "it",
                "description"=> "Fiat, acronyme de Fabbrica Italiana Automobili Torino, est un constructeur automobile italien fondé en 1899. Fiat est réputée pour ses véhicules citadins, tels que la Fiat 500. En plus de ses petites voitures, Fiat produit une gamme de véhicules plus grands et de voitures de sport à travers ses marques affiliées comme Alfa Romeo et Maserati."
            ],
            [
                'nom' => 'Alfa Romeo',
                'pays_origine' => 'Italie',
                'date_fondation' => '1910-06-24',
                'logo' => 'alfa_romeo_logo.png',
                "icon"=> "it",
                "description"=> "Alfa Romeo est un constructeur automobile italien de voitures de luxe, fondé en 1910. Alfa Romeo est connu pour ses voitures de sport et de luxe qui incarnent le style et la performance italiens. La gamme de modèles Alfa Romeo comprend des berlines, des coupés et des SUV."
            ],
            [
                'nom' => 'Ferrari',
                'pays_origine' => 'Italie',
                'date_fondation' => '1939-12-13',
                'logo' => 'ferrari_logo.png',
                "icon"=> "it",
                "description"=> "Ferrari est une marque de voitures de sport de luxe italienne fondée en 1939 par Enzo Ferrari. Ferrari est connue dans le monde entier pour sa performance sur la piste et sur la route, ainsi que pour la passion qu'elle suscite chez les amateurs d'automobiles."
            ],
            [
                'nom' => 'Lamborghini',
                'pays_origine' => 'Italie',
                'date_fondation' => '1963-10-30',
                'logo' => 'lamborghini_logo.png',
                "icon"=> "it",
                "description"=> "Lamborghini est une marque de voitures de sport de luxe italienne fondée en 1963. Lamborghini est célèbre pour ses voitures de sport au design audacieux et à la performance extrême. Les modèles Lamborghini portent généralement des noms de taureaux de combat, en hommage à l'intérêt du fondateur pour la tauromachie."
            ],
            [
                'nom' => 'Maserati',
                'pays_origine' => 'Italie',
                'date_fondation' => '1914-12-01',
                'logo' => 'maserati_logo.png',
                "icon"=> "it",
                "description"=> "Maserati est un constructeur automobile italien de voitures de luxe, fondé en 1914. Connue pour son trident emblématique, Maserati produit des véhicules qui allient luxe, performance et style italien. La gamme de modèles Maserati comprend des berlines, des coupés, des cabriolets et des SUV."
            ],
            [
                'nom' => 'Lancia',
                'pays_origine' => 'Italie',
                'date_fondation' => '1906-11-29',
                'logo' => 'lancia_logo.png',
                "icon"=> "it",
                "description"=> "Lancia est un constructeur automobile italien fondé en 1906. Reconnu pour sa tradition d'innovation technologique, Lancia a introduit de nombreux équipements dans l'industrie automobile, y compris la première carrosserie monocoque, le premier moteur V4 et la première application large de la traction avant. La marque est également célèbre pour ses nombreuses victoires en rallye, en particulier avec le modèle Stratos dans les années 1970. Bien que la production de voitures Lancia soit aujourd'hui limitée en raison de difficultés commerciales, la marque reste un nom prestigieux dans l'histoire de l'automobile."
            ],
            [
                'nom' => 'Pagani',
                'pays_origine' => 'Italie',
                'date_fondation' => '1992-01-01',
                'logo' => 'pagani_logo.png',
                "icon"=> "it",
                "description"=> "Pagani est un constructeur italien de supercars, fondé en 1992. Pagani est connu pour son attention au détail, son design artistique et sa technologie avancée."
            ],
            [
                'nom' => 'Volvo',
                'pays_origine' => 'Suède',
                'date_fondation' => '1927-04-14',
                'logo' => 'volvo_logo.png',
                "icon"=> "se",
                "description"=> "Volvo est un constructeur automobile suédois, fondé en 1927. Volvo est connu pour sa technologie de sécurité avancée et ses voitures familiales durables. Leurs véhicules incluent des berlines, des SUV, des break et des véhicules commerciaux."
            ],
            [
                'nom' => 'Volkswagen',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1937-05-28',
                'logo' => 'volkswagen_logo.png',
                "icon"=> "de",
                "description"=> "Fondée en 1937 en Allemagne, Volkswagen est l'une des plus grandes entreprises automobiles au monde. Le nom Volkswagen signifie 'voiture du peuple' en allemand, ce qui reflète l'objectif initial de la marque => produire des voitures abordables pour les masses. Volkswagen propose une large gamme de véhicules, de la petite Polo au SUV de luxe Touareg."
            ],
            [
                'nom' => 'Porsche',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1931-04-25',
                'logo' => 'porsche_logo.png',
                "icon"=> "de",
                "description"=> "Porsche est un constructeur automobile allemand spécialisé dans les véhicules de haute performance. Fondée en 1931 par Ferdinand Porsche, la société est connue pour ses voitures de sport, notamment la 911, ainsi que pour ses SUV comme le Cayenne et le Macan."
            ],
            [
                'nom' => 'Mitsubishi',
                'pays_origine' => 'Japon',
                'date_fondation' => '1870-04-13',
                'logo' => 'mitsubishi_logo.png',
                "icon"=> "jp",
                "description"=> "Mitsubishi Motors est un constructeur automobile japonais, fondé en 1970. Mitsubishi est connu pour ses voitures robustes et fiables, y compris les SUV et les pick-ups. L'un des modèles les plus célèbres de Mitsubishi est l'Evo, une voiture de rallye de haute performance."
            ],
            [
                'nom' => 'Mazda',
                'pays_origine' => 'Japon',
                'date_fondation' => '1920-01-30',
                'logo' => 'mazda_logo.png',
                "icon"=> "jp",
                "description"=> "Mazda est un constructeur automobile japonais fondé en 1920, initialement connu pour la production d'outils industriels et de motos. Ils ont commencé à produire des voitures dans les années 1930. Mazda est surtout reconnu pour sa technologie du moteur rotatif Wankel, qui est utilisée dans des voitures comme la célèbre RX-7 et RX-8. Ce type de moteur se distingue par sa compacité, son fonctionnement doux et sa grande puissance pour son poids, bien qu'il soit aussi critiqué pour sa consommation de carburant élevée et ses problèmes d'émission. Au-delà du moteur rotatif, Mazda est également connu pour ses véhicules sportifs, tels que le roadster MX-5 Miata, qui est l'une des voitures de sport les plus vendues au monde."
            ],
            [
                'nom' => 'Hyundai',
                'pays_origine' => 'Corée du Sud',
                'date_fondation' => '1967-12-29',
                'logo' => 'hyundai_logo.png',
                "icon"=> "kr",
                "description"=> "Hyundai est un constructeur automobile sud-coréen fondé en 1967. Hyundai est connu pour offrir une grande valeur, avec des véhicules fiables et bien équipés pour le prix. La gamme de produits Hyundai comprend des berlines, des SUV, des voitures électriques et des voitures à hydrogène."
            ],
            [
                'nom' => 'Kia',
                'pays_origine' => 'Corée du Sud',
                'date_fondation' => '1944-06-09',
                'logo' => 'kia_logo.png',
                "icon"=> "kr",
                "description"=> "Kia Motors est un constructeur automobile sud-coréen, fondé en 1944. Il est le deuxième plus grand constructeur automobile de Corée du Sud après Hyundai. Kia est connue pour ses véhicules abordables et de qualité, offrant une excellente garantie."
            ],
            [
                'nom' => 'Subaru',
                'pays_origine' => 'Japon',
                'date_fondation' => '1953-07-15',
                'logo' => 'subaru_logo.png',
                "icon"=> "jp",
                "description"=> "Subaru est un constructeur automobile japonais, fondé en 1953. Subaru est connu pour son utilisation de la transmission intégrale dans la plupart de ses véhicules et pour son moteur boxer. Subaru produit une gamme de véhicules, y compris des berlines, des wagons et des SUV."
            ],
            [
                'nom' => 'Suzuki',
                'pays_origine' => 'Japon',
                'date_fondation' => '1909-10-17',
                'logo' => 'suzuki_logo.png',
                "icon"=> "jp",
                "description"=> "Fondée en 1909, Suzuki est une marque automobile japonaise qui a commencé par la fabrication de métiers à tisser avant de se lancer dans la production de véhicules. Suzuki est devenu un leader mondial dans la production de voitures compactes et de motos. Il est particulièrement connu pour ses voitures compactes et ses SUV légers, tels que le Swift et le Jimny, qui sont reconnus pour leur fiabilité, leur efficacité énergétique et leur valeur globale. Suzuki est également un acteur majeur dans le secteur des motos, avec une gamme de produits allant des petites motos de ville aux puissantes sportives et aux motos tout-terrain. Au fil des ans, Suzuki a maintenu une réputation de fabrication de véhicules durables et de grande qualité, tout en offrant une gamme de modèles adaptés aux besoins d'un large éventail de clients."
            ],
            [
                'nom' => 'Jaguar',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1922-09-04',
                'logo' => 'jaguar_logo.png',
                "icon"=> "gb",
                "description"=> "Jaguar est un constructeur automobile britannique de luxe, fondé en 1922. Jaguar est connu pour ses berlines élégantes et ses voitures de sport, offrant une performance supérieure et un style distinctif britannique. La gamme de modèles Jaguar comprend des berlines, des coupés, des cabriolets et des SUV."
            ],
            [
                'nom' => 'Land Rover',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1948-04-30',
                'logo' => 'land_rover_logo.png',
                "icon"=> "gb",
                "description"=> "Land Rover est un constructeur automobile britannique spécialisé dans les véhicules tout-terrain et les SUV de luxe, fondé en 1948. Connue pour ses modèles robustes et luxueux tels que le Defender et le Range Rover, Land Rover est une référence dans le domaine des véhicules tout-terrain."
            ],
            [
                'nom' => 'Aston Martin',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1913-01-15',
                'logo' => 'aston_martin_logo.png',
                "icon"=> "gb",
                "description"=> "Aston Martin est un constructeur automobile britannique de luxe et de haute performance, fondé en 1913. Réputée pour ses voitures sportives élégantes et puissantes, Aston Martin a une longue association avec la franchise de films James Bond, ce qui a renforcé son image de glamour et de sophistication."
            ],
            [
                'nom' => 'Bentley',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1919-01-18',
                'logo' => 'bentley_logo.png',
                "icon"=> "gb",
                "description"=> "Bentley est un constructeur automobile britannique de luxe, fondé en 1919. Bentley est connu pour ses véhicules de luxe qui combinent performance, style et raffinement."
            ],
            [
                'nom' => 'Rolls-Royce',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1904-03-15',
                'logo' => 'rolls_royce_logo.png',
                "icon"=> "gb",
                "description"=> "Rolls-Royce est un constructeur britannique de voitures ultra-luxe, fondé en 1904. Rolls-Royce est synonyme de luxe ultime, avec des véhicules fabriqués à la main offrant des niveaux exceptionnels de qualité, de raffinement et de prestige."
            ],
            [
                'nom' => 'Bugatti',
                'pays_origine' => 'France',
                'date_fondation' => '1909-10-16',
                'logo' => 'bugatti_logo.png',
                "icon"=> "fr",
                "description"=> "Bugatti est un constructeur automobile de luxe français, fondé en 1909. Connue pour ses voitures ultra-luxueuses et ultra-performantes, Bugatti a produit des modèles tels que le Veyron et le Chiron qui détiennent des records de vitesse mondiaux. Bugatti est synonyme de performance extrême, de luxe et de design exclusif."
            ],
            [
                'nom' => 'Citroën',
                'pays_origine' => 'France',
                'date_fondation' => '1919-06-16',
                'logo' => 'citroen_logo.png',
                "icon"=> "fr",
                "description"=> "Citroën est un constructeur automobile français fondé en 1919 par André Citroën. Il est réputé pour sa capacité d'innovation et a introduit plusieurs technologies nouvelles dans l'industrie automobile, y compris la traction avant. Citroën est aussi célèbre pour ses modèles emblématiques comme la 2CV et la DS. Aujourd'hui, la marque se concentre sur le confort, le design original et l'efficacité de ses véhicules."
            ],
            [
                'nom' => 'Skoda',
                'pays_origine' => 'République tchèque',
                'date_fondation' => '1895-12-18',
                'logo' => 'skoda_logo.png',
                "icon"=> "cz",
                "description"=> "Škoda est un constructeur automobile tchèque fondé en 1895, ce qui en fait l'une des entreprises les plus anciennes de l'industrie. Škoda a été acheté par Volkswagen en 1991, et depuis lors, il a connu une résurgence importante, en offrant des véhicules qui combinent fiabilité, confort et rapport qualité-prix. Ses modèles, comme l'Octavia ou le Superb, sont populaires pour leur qualité de construction et leur espace intérieur généreux."
            ],
            [
                'nom' => 'SEAT',
                'pays_origine' => 'Espagne',
                'date_fondation' => '1950-05-09',
                'logo' => 'seat_logo.png',
                "icon"=> "es",
                "description"=> "SEAT (Sociedad Española de Automóviles de Turismo) est un constructeur automobile espagnol fondé en 1950 et est désormais une filiale du groupe Volkswagen. SEAT est reconnu pour ses voitures qui allient design distinctif et technologie allemande. La marque cible principalement une clientèle jeune avec des modèles sportifs et énergiques comme l'Ibiza et la Leon. En plus de ses modèles traditionnels, SEAT développe aussi sa gamme de voitures électriques et hybrides."
            ],
            [
                'nom' => 'Tesla',
                'pays_origine' => 'États-Unis',
                'date_fondation' => '2003-07-01',
                'logo' => 'tesla_logo.png',
                "icon"=> "us",
                "description"=> "Tesla, Inc. est une entreprise américaine fondée en 2003, connue pour ses véhicules électriques et ses solutions énergétiques renouvelables. Tesla a été pionnière dans la production de véhicules électriques de luxe et de performance, en commençant par la Roadster, puis en élargissant sa gamme avec la Model S, la Model X, la Model 3 et la Model Y."
            ],
            [
                'nom' => 'Dacia',
                'pays_origine' => 'Roumanie',
                'date_fondation' => '1966-08-20',
                'logo' => 'dacia_logo.png',
                "icon"=> "ro",
                "description"=> "Dacia est un constructeur automobile roumain fondé en 1966 et qui est devenu une filiale du groupe Renault en 1999. Dacia a connu un succès majeur avec sa philosophie de fournir des voitures robustes, spacieuses et abordables. Les modèles comme le Duster et la Sandero sont populaires pour leur bon rapport qualité-prix. Dacia reste une marque incontournable pour les conducteurs qui recherchent une voiture fonctionnelle à un prix très compétitif."
            ],
            [
                'nom' => 'Opel',
                'pays_origine' => 'Allemagne',
                'date_fondation' => '1862-01-21',
                'logo' => 'opel_logo.png',
                "icon"=> "de",
                "description"=> "Opel est un constructeur automobile allemand qui a été fondé en 1862 en tant que fabricant de machines à coudre, avant de commencer à produire des voitures en 1899. Depuis 2017, Opel appartient au groupe PSA (devenu le Groupe Stellantis en 2021). La marque est réputée pour ses voitures familiales et utilitaires de qualité, comme la Astra et le Vivaro. Opel combine la précision de l'ingénierie allemande avec une attention aux détails pour offrir des voitures abordables et bien équipées."
            ],
            [
                'nom' => 'MINI',
                'pays_origine' => 'Royaume-Uni',
                'date_fondation' => '1959-08-26',
                'logo' => 'mini_logo.png',
                "icon"=> "gb",
                "description"=> "MINI est une marque britannique de voitures de petite taille initialement produites par British Motor Corporation en 1959. Aujourd'hui, MINI est une filiale de BMW. La marque est connue pour son modèle emblématique, la Mini Cooper, qui combine un design compact et élégant avec une performance dynamique. MINI se distingue par ses voitures qui allient plaisir de conduire, style britannique et qualité premium."
            ],
            [
                'nom' => 'Dodge',
                'pays_origine' => 'États-Unis',
                'date_fondation' => '1900-11-14',
                'logo' => 'dodge_logo.png',
                "icon"=> "us",
                "description"=> "Dodge est une marque américaine d'automobiles et de camions fondée par les frères Dodge en 1900. Aujourd'hui, Dodge est une division de Stellantis. Dodge est célèbre pour ses voitures de performance et ses camions robustes. Les modèles comme le Ram, le Charger et le Challenger sont emblématiques de l'ADN de Dodge => performance, puissance et style audacieux. La marque est particulièrement populaire auprès des passionnés de muscle cars et de pick-ups."
            ],
            [
                'nom' => 'Jeep',
                'pays_origine' => 'États-Unis',
                'date_fondation' => '1941-01-01',
                'logo' => 'jeep_logo.png',
                "icon"=> "us",
                "description"=> "Jeep est une marque américaine de véhicules tout-terrain et de SUV, fondée en 1941. Originellement conçus pour l'armée, les véhicules Jeep sont connus pour leur capacité à gérer des terrains difficiles. Les modèles populaires incluent le Wrangler et le Grand Cherokee."
            ],
        ];


        foreach ($constructeurs as $constructeurData) {
            $constructeur = new Constructeur();
            $constructeur->setNom($constructeurData['nom']);
            $constructeur->setPays($constructeurData['pays_origine']);
            $constructeur->setDateFondation(new \DateTime($constructeurData['date_fondation']));
            $constructeur->setLogo($constructeurData['logo']);
            $constructeur->setIcon($constructeurData['icon']);
            $constructeur->setDescription($constructeurData['description']);

            $manager->persist($constructeur);
            $this->addReference('constructeur-' . $constructeurData['nom'], $constructeur);
        }

        $categories = [
            ['nom' => 'Citadine'],
            ['nom' => 'Berline compacte'],
            ['nom' => 'Berline intermédiaire'],
            ['nom' => 'Berline de luxe'],
            ['nom' => 'Coupé'],
            ['nom' => 'Cabriolet'],
            ['nom' => 'Familiale'],
            ['nom' => 'SUV'],
            ['nom' => '4x4'],
            ['nom' => 'Pick-up'],
            ['nom' => 'Sportive'],
            ['nom' => 'Hypercar'],
            ['nom' => 'Utilitaire'],
        ];

        foreach ($categories as $categorieData) {
            $categorie = new Categorie();
            $categorie->setNom($categorieData['nom']);
            $manager->persist($categorie);
            $this->addReference('categorie-' . $categorieData['nom'], $categorie);
        }

        //Utilisateur Admin
        $utilisateurAdmin = new Utilisateur();
        $utilisateurAdmin->setEmail('user@gmail.com');
        $utilisateurAdmin->setRoles(['ROLE_ADMIN']);
        $utilisateurAdmin->setNom('User');
        $utilisateurAdmin->setPrenom('user');
        $utilisateurAdmin->setPassword($this->passwordEncoder->hashPassword($utilisateurAdmin, 'user'));

        $manager->persist($utilisateurAdmin);

        // Utilisateur test
        $utilisateurTest = new Utilisateur();
        $utilisateurTest->setEmail('test@gmail.com');
        $utilisateurTest->setRoles(['ROLE_USER']);
        $utilisateurTest->setNom('Test');
        $utilisateurTest->setPrenom('test');
        $utilisateurTest->setPassword($this->passwordEncoder->hashPassword($utilisateurTest, 'azertyuiop'));
        $manager->persist($utilisateurTest);


        // Annonce test
        $annonceTest = new Annonce();
        $annonceTest->setTitre('Vend audi Q5');
        $annonceTest->setDescription('Vend voiture de la marque Audi dattant de 2020.');
        $annonceTest->setPrix('25000.00');
        $annonceTest->setUtilisateur($utilisateurAdmin);
        $annonceTest->setConstructeur($this->getReference('constructeur-Audi'));
        $annonceTest->setCategorie($this->getReference('categorie-SUV'));
        $annonceTest->setNomVoiture('Audi Q5');
        $annonceTest->setAnnee(2020);
        $annonceTest->setKilometrage(15000);
        $annonceTest->setCouleur('Noir');
        $annonceTest->setTypeCarburant('ESSENCE');
        $annonceTest->setMotorisation('2.0 TFSI');
        $annonceTest->setPuissance(180);
        $annonceTest->setImage('audi_q5.jpeg');
        $annonceTest->setPoidsTotal(2000);
        $annonceTest->setStockageCoffre(550);
        $manager->persist($annonceTest);

        // Annonce 1
        $annonce1 = new Annonce();
        $annonce1->setTitre('Ford Mustang GT');
        $annonce1->setDescription('Voiture sportive emblématique avec une puissance de 450 chevaux.');
        $annonce1->setPrix('55000.00');
        $annonce1->setUtilisateur($utilisateurAdmin);
        $annonce1->setConstructeur($this->getReference('constructeur-Ford'));
        $annonce1->setCategorie($this->getReference('categorie-Sportive'));
        $annonce1->setNomVoiture('Mustang GT');
        $annonce1->setAnnee(2018);
        $annonce1->setKilometrage(20000);
        $annonce1->setCouleur('Bleu');
        $annonce1->setTypeCarburant('ESSENCE');
        $annonce1->setMotorisation('5.0 V8');
        $annonce1->setPuissance(450);
        $annonce1->setImage('mustang_gt.jpg');
        $annonce1->setPoidsTotal(1800);
        $annonce1->setStockageCoffre(300);
        $manager->persist($annonce1);

        // Annonce 2
        $annonce2 = new Annonce();
        $annonce2->setTitre('Tesla Model S');
        $annonce2->setDescription('Voiture électrique haut de gamme avec une autonomie de plus de 600 km.');
        $annonce2->setPrix('75000.00');
        $annonce2->setUtilisateur($utilisateurAdmin);
        $annonce2->setConstructeur($this->getReference('constructeur-Tesla'));
        $annonce2->setCategorie($this->getReference('categorie-Berline de luxe'));
        $annonce2->setNomVoiture('Model S');
        $annonce2->setAnnee(2019);
        $annonce2->setKilometrage(15000);
        $annonce2->setCouleur('Blanc');
        $annonce2->setTypeCarburant('ELECTRIQUE');
        $annonce2->setMotorisation('Moteur électrique');
        $annonce2->setPuissance(450);
        $annonce2->setImage('tesla_model_s.jpg');
        $annonce2->setPoidsTotal(2100);
        $annonce2->setStockageCoffre(800);
        $manager->persist($annonce2);

        // Annonce 3
        $annonce3 = new Annonce();
        $annonce3->setTitre('Mercedes-Benz Classe E');
        $annonce3->setDescription('Voiture de luxe avec un intérieur en cuir et une technologie de pointe.');
        $annonce3->setPrix('65000.00');
        $annonce3->setUtilisateur($utilisateurAdmin);
        $annonce3->setConstructeur($this->getReference('constructeur-Mercedes-Benz'));
        $annonce3->setCategorie($this->getReference('categorie-Berline de luxe'));
        $annonce3->setNomVoiture('Classe E');
        $annonce3->setAnnee(2020);
        $annonce3->setKilometrage(10000);
        $annonce3->setCouleur('Gris');
        $annonce3->setTypeCarburant('DIESEL');
        $annonce3->setMotorisation('2.0 CDI');
        $annonce3->setPuissance(200);
        $annonce3->setImage('mercedes_classe_e.jpg');
        $annonce3->setPoidsTotal(1900);
        $annonce3->setStockageCoffre(600);
        $manager->persist($annonce3);

        // Annonce 4
        $annonce4 = new Annonce();
        $annonce4->setTitre('Porsche 911 Carrera S');
        $annonce4->setDescription('Voiture sportive haut de gamme avec une puissance de 450 chevaux.');
        $annonce4->setPrix('120000.00');
        $annonce4->setUtilisateur($utilisateurAdmin);
        $annonce4->setConstructeur($this->getReference('constructeur-Porsche'));
        $annonce4->setCategorie($this->getReference('categorie-Sportive'));
        $annonce4->setNomVoiture('911 Carrera S');
        $annonce4->setAnnee(2021);
        $annonce4->setKilometrage(5000);
        $annonce4->setCouleur('Rouge');
        $annonce4->setTypeCarburant('ESSENCE');
        $annonce4->setMotorisation('3.0 Turbo');
        $annonce4->setPuissance(450);
        $annonce4->setImage('porsche_911.jpg');
        $annonce4->setPoidsTotal(1600);
        $annonce4->setStockageCoffre(150);
        $manager->persist($annonce4);

        // Annonce 5
        $annonce5 = new Annonce();
        $annonce5->setTitre('BMW X7');
        $annonce5->setDescription('Voiture de luxe avec un intérieur spacieux et une grande capacité de rangement.');
        $annonce5->setPrix('85000.00');
        $annonce5->setUtilisateur($utilisateurAdmin);
        $annonce5->setConstructeur($this->getReference('constructeur-BMW'));
        $annonce5->setCategorie($this->getReference('categorie-SUV'));
        $annonce5->setNomVoiture('X7');
        $annonce5->setAnnee(2020);
        $annonce5->setKilometrage(18000);
        $annonce5->setCouleur('Noir');
        $annonce5->setTypeCarburant('DIESEL');
        $annonce5->setMotorisation('3.0d');
        $annonce5->setPuissance(265);
        $annonce5->setImage('bmw_x7.jpg');
        $annonce5->setPoidsTotal(2400);
        $annonce5->setStockageCoffre(750);
        $manager->persist($annonce5);

        // Annonce 6
        $annonce6 = new Annonce();
        $annonce6->setTitre('Aston Martin DB11');
        $annonce6->setDescription('Voiture de sport de luxe avec une carrosserie en fibre de carbone.');
        $annonce6->setPrix('180000.00');
        $annonce6->setUtilisateur($utilisateurAdmin);
        $annonce6->setConstructeur($this->getReference('constructeur-Aston Martin'));
        $annonce6->setCategorie($this->getReference('categorie-Sportive'));
        $annonce6->setNomVoiture('DB11');
        $annonce6->setAnnee(2021);
        $annonce6->setKilometrage(1000);
        $annonce6->setCouleur('Jaune');
        $annonce6->setTypeCarburant('ESSENCE');
        $annonce6->setMotorisation('5.2 V12');
        $annonce6->setPuissance(630);
        $annonce6->setImage('aston_martin_db11.jpg');
        $annonce6->setPoidsTotal(1800);
        $annonce6->setStockageCoffre(270);
        $manager->persist($annonce6);

        //Annonce 7
        $annonce7 = new Annonce();
        $annonce7->setTitre('Ferrari 488 Pista');
        $annonce7->setDescription('Voiture de sport de luxe avec une puissance de 710 chevaux.');
        $annonce7->setPrix('350000.00');
        $annonce7->setUtilisateur($utilisateurAdmin);
        $annonce7->setConstructeur($this->getReference('constructeur-Ferrari'));
        $annonce7->setCategorie($this->getReference('categorie-Sportive'));
        $annonce7->setNomVoiture('488 Pista');
        $annonce7->setAnnee(2022);
        $annonce7->setKilometrage(500);
        $annonce7->setCouleur('Rouge');
        $annonce7->setTypeCarburant('ESSENCE');
        $annonce7->setMotorisation('3.9 V8');
        $annonce7->setPuissance(710);
        $annonce7->setImage('ferrari_488.jpg');
        $annonce7->setPoidsTotal(1400);
        $annonce7->setStockageCoffre(170);
        $manager->persist($annonce7);

        // Annonce 8
        $annonce8 = new Annonce();
        $annonce8->setTitre('Jaguar F-Type');
        $annonce8->setDescription('Voiture sportive avec une conception légère et un style intemporel.');
        $annonce8->setPrix('65000.00');
        $annonce8->setUtilisateur($utilisateurAdmin);
        $annonce8->setConstructeur($this->getReference('constructeur-Jaguar'));
        $annonce8->setCategorie($this->getReference('categorie-Sportive'));
        $annonce8->setNomVoiture('F-Type');
        $annonce8->setAnnee(2019);
        $annonce8->setKilometrage(25000);
        $annonce8->setCouleur('Noir');
        $annonce8->setTypeCarburant('ESSENCE');
        $annonce8->setMotorisation('3.0 V6');
        $annonce8->setPuissance(380);
        $annonce8->setImage('jaguar_f_type.jpg');
        $annonce8->setPoidsTotal(1600);
        $annonce8->setStockageCoffre(250);
        $manager->persist($annonce8);

        // Annonce 9
        $annonce9 = new Annonce();
        $annonce9->setTitre('Land Rover Defender');
        $annonce9->setDescription('Véhicule tout-terrain emblématique avec une conception robuste.');
        $annonce9->setPrix('45000.00');
        $annonce9->setUtilisateur($utilisateurAdmin);
        $annonce9->setConstructeur($this->getReference('constructeur-Land Rover'));
        $annonce9->setCategorie($this->getReference('categorie-4x4'));
        $annonce9->setNomVoiture('Defender');
        $annonce9->setAnnee(2020);
        $annonce9->setKilometrage(30000);
        $annonce9->setCouleur('Vert');
        $annonce9->setTypeCarburant('DIESEL');
        $annonce9->setMotorisation('2.0 D');
        $annonce9->setPuissance(240);
        $annonce9->setImage('land_rover_defender.jpg');
        $annonce9->setPoidsTotal(2200);
        $annonce9->setStockageCoffre(800);
        $manager->persist($annonce9);

        // Quiz
        $question1 = new Quiz();
        $question1->setQuestion('Quel constructeur est réputé pour ses voitures de luxe ?');
        $question1->setReponse(['Mercedes', 'Peugeot', 'Toyota', 'Fiat']);
        $question1->setOk(0);
        $manager->persist($question1);

        $question2 = new Quiz();
        $question2->setQuestion('Quel constructeur est célèbre pour la production de la Mini ?');
        $question2->setReponse(['Volkswagen', 'BMW', 'Hyundai', 'Ford']);
        $question2->setOk(1);
        $manager->persist($question2);

        $question3 = new Quiz();
        $question3->setQuestion('Quel constructeur est le plus grand producteur de véhicules électriques ?');
        $question3->setReponse(['Nissan', 'Chevrolet', 'Tesla', 'Bugatti']);
        $question3->setOk(2);
        $manager->persist($question3);

        $question4 = new Quiz();
        $question4->setQuestion('Quel constructeur a produit la voiture la plus rapide du monde ?');
        $question4->setReponse(['Aston Martin', 'McLaren', 'Ferrari', 'Bugatti']);
        $question4->setOk(3);
        $manager->persist($question4);

        $question5 = new Quiz();
        $question5->setQuestion('Quel constructeur est réputé pour sa fiabilité ?');
        $question5->setReponse(['Lamborghini', 'Porsche', 'Toyota', 'Jeep']);
        $question5->setOk(2);
        $manager->persist($question5);

        $question6 = new Quiz();
        $question6->setQuestion('Quel constructeur a produit la célèbre voiture "Mustang" ?');
        $question6->setReponse(['Ford', 'Chevrolet', 'Dodge', 'Toyota']);
        $question6->setOk(0);
        $manager->persist($question6);

        $question7 = new Quiz();
        $question7->setQuestion('Quel constructeur a lancé le modèle "911" ?');
        $question7->setReponse(['Audi', 'Porsche', 'Volkswagen', 'Mercedes']);
        $question7->setOk(1);
        $manager->persist($question7);

        $question8 = new Quiz();
        $question8->setQuestion('Quel constructeur est associé au modèle "Prius" ?');
        $question8->setReponse(['Honda', 'Hyundai', 'Toyota', 'Tesla']);
        $question8->setOk(2);
        $manager->persist($question8);

        $question9 = new Quiz();
        $question9->setQuestion('Quel constructeur est célèbre pour ses camions ?');
        $question9->setReponse(['Toyota', 'Mercedes', 'Volvo', 'Volkswagen']);
        $question9->setOk(2);
        $manager->persist($question9);

        $question10 = new Quiz();
        $question10->setQuestion('Quel constructeur est célèbre pour la voiture "Beetle" ou "Coccinelle" ?');
        $question10->setReponse(['BMW', 'Volkswagen', 'Audi', 'Ford']);
        $question10->setOk(1);
        $manager->persist($question10);

        $question11 = new Quiz();
        $question11->setQuestion('Quel constructeur est célèbre pour sa série de voitures "M" ?');
        $question11->setReponse(['BMW', 'Mercedes', 'Audi', 'Bentley']);
        $question11->setOk(0);
        $manager->persist($question11);

        $question12 = new Quiz();
        $question12->setQuestion('Quel constructeur produit la gamme de voitures "RS" ?');
        $question12->setReponse(['Ford', 'Chevrolet', 'Audi', 'Volkswagen']);
        $question12->setOk(2);
        $manager->persist($question12);

        $question13 = new Quiz();
        $question13->setQuestion('Quel constructeur produit le modèle "Evoque" ?');
        $question13->setReponse(['Land Rover', 'Toyota', 'Nissan', 'Jeep']);
        $question13->setOk(0);
        $manager->persist($question13);

        $question14 = new Quiz();
        $question14->setQuestion('Quel constructeur est célèbre pour sa série de voitures "Z" ?');
        $question14->setReponse(['Nissan', 'Toyota', 'Honda', 'Mazda']);
        $question14->setOk(0);
        $manager->persist($question14);

        $question15 = new Quiz();
        $question15->setQuestion('Quel constructeur produit le modèle "Wrangler" ?');
        $question15->setReponse(['Land Rover', 'Ford', 'Jeep', 'Chevrolet']);
        $question15->setOk(2);
        $manager->persist($question15);

        $question16 = new Quiz();
        $question16->setQuestion('Quel constructeur produit le modèle "Corvette" ?');
        $question16->setReponse(['Ford', 'Chevrolet', 'Dodge', 'Tesla']);
        $question16->setOk(1);
        $manager->persist($question16);

        $question17 = new Quiz();
        $question17->setQuestion('Quel constructeur produit le modèle "Fiesta" ?');
        $question17->setReponse(['Peugeot', 'Toyota', 'Hyundai', 'Ford']);
        $question17->setOk(3);
        $manager->persist($question17);

        $question18 = new Quiz();
        $question18->setQuestion('Quel constructeur produit le modèle "Leaf" ?');
        $question18->setReponse(['Nissan', 'Tesla', 'Honda', 'Toyota']);
        $question18->setOk(0);
        $manager->persist($question18);

        $question19 = new Quiz();
        $question19->setQuestion('Quel constructeur produit le modèle "S-Class" ?');
        $question19->setReponse(['BMW', 'Audi', 'Mercedes', 'Volvo']);
        $question19->setOk(2);
        $manager->persist($question19);

        $question20 = new Quiz();
        $question20->setQuestion('Quel constructeur est célèbre pour sa série de voitures "Boxster" ?');
        $question20->setReponse(['Porsche', 'Ferrari', 'Lamborghini', 'Maserati']);
        $question20->setOk(0);
        $manager->persist($question20);

        $question21 = new Quiz();
        $question21->setQuestion('Quelle voiture est également connue comme la "voiture du peuple" ?');
        $question21->setReponse(['Ford Model T', 'Volkswagen Beetle', 'Mini Cooper', 'Fiat 500']);
        $question21->setOk(1);
        $manager->persist($question21);

        $question22 = new Quiz();
        $question22->setQuestion('Quelle marque de voiture a conçu la première voiture de production avec un moteur Wankel ?');
        $question22->setReponse(['Mazda', 'Toyota', 'Honda', 'Nissan']);
        $question22->setOk(0);
        $manager->persist($question22);

        $question23 = new Quiz();
        $question23->setQuestion('Quelle marque de voiture a produit la voiture la plus rapide du monde en 2020 ?');
        $question23->setReponse(['Bugatti', 'Koenigsegg', 'Hennessey', 'SSC North America']);
        $question23->setOk(3);
        $manager->persist($question23);

        $question24 = new Quiz();
        $question24->setQuestion('Quel constructeur automobile est associé à la couleur rouge de course ?');
        $question24->setReponse(['Ferrari', 'Lamborghini', 'Aston Martin', 'Bugatti']);
        $question24->setOk(0);
        $manager->persist($question24);

        $question25 = new Quiz();
        $question25->setQuestion('Quel constructeur automobile a conçu la première voiture hybride de production ?');
        $question25->setReponse(['Honda', 'Toyota', 'Nissan', 'Chevrolet']);
        $question25->setOk(1);
        $manager->persist($question25);

        $question26 = new Quiz();
        $question26->setQuestion('Quel constructeur automobile a produit le modèle "Scenic" ?');
        $question26->setReponse(['Renautl', 'Peugoet', 'BMW', 'Bugatti']);
        $question26->setOk(0);
        $manager->persist($question26);

        $question27 = new Quiz();
        $question27->setQuestion('Quelle marque de voiture a produit le modèle "Countach", très populaire dans les années 80 ?');
        $question27->setReponse(['Ferrari', 'Porsche', 'Lamborghini', 'Maserati']);
        $question27->setOk(2);
        $manager->persist($question27);

        $question28 = new Quiz();
        $question28->setQuestion('Quel constructeur automobile est célèbre pour ses voitures "muscle car", comme la "Mustang" ?');
        $question28->setReponse(['Ford', 'Chevrolet', 'Dodge', 'Pontiac']);
        $question28->setOk(0);
        $manager->persist($question28);

        $question29 = new Quiz();
        $question29->setQuestion('Quelle marque de voiture est associée à l\'étoile à trois branches dans un cercle comme logo ?');
        $question29->setReponse(['BMW', 'Audi', 'Mercedes-Benz', 'Volvo']);
        $question29->setOk(2);
        $manager->persist($question29);

        $question30 = new Quiz();
        $question30->setQuestion('Quel constructeur automobile produit le modèle "Civic" ?');
        $question30->setReponse(['Toyota', 'Honda', 'Nissan', 'Subaru']);
        $question30->setOk(1);
        $manager->persist($question30);

        $question31 = new Quiz();
        $question31->setQuestion('Identifiez le constructeur automobile qui a produit le modèle "Elantra".');
        $question31->setReponse(['Hyundai', 'Toyota', 'Honda', 'Subaru']);
        $question31->setOk(0);
        $manager->persist($question31);

        $question32 = new Quiz();
        $question32->setQuestion('Le logo de quel constructeur automobile représente un lion ?');
        $question32->setReponse(['Audi', 'Peugeot', 'Jaguar', 'Skoda']);
        $question32->setOk(1);
        $manager->persist($question32);

        $question33 = new Quiz();
        $question33->setQuestion('Parmi ces options, laquelle représente un modèle produit par Aston Martin ?');
        $question33->setReponse(['Vantage', 'Supra', 'Sentra', 'Escalade']);
        $question33->setOk(0);
        $manager->persist($question33);

        $question34 = new Quiz();
        $question34->setQuestion('Lequel de ces constructeurs automobiles est célèbre pour produire des voitures de luxe et des moteurs d\'avion ?');
        $question34->setReponse(['Rolls-Royce', 'Bentley', 'Aston Martin', 'Bugatti']);
        $question34->setOk(0);
        $manager->persist($question34);

        $question35 = new Quiz();
        $question35->setQuestion('Parmi ces constructeurs, lequel a gagné le plus grand nombre de fois les 24h du Mans ?');
        $question35->setReponse(['Audi', 'Toyota', 'Porsche', 'Renault']);
        $question35->setOk(2);
        $manager->persist($question35);

        $question36 = new Quiz();
        $question36->setQuestion('Quel constructeur automobile est associé au modèle "Aventador" ?');
        $question36->setReponse(['Ferrari', 'Lamborghini', 'Maserati', 'Bugatti']);
        $question36->setOk(1);
        $manager->persist($question36);

        $question37 = new Quiz();
        $question37->setQuestion('Quelle marque de voiture utilise un trident comme logo ?');
        $question37->setReponse(['BMW', 'Audi', 'Maserati', 'Mercedes-Benz']);
        $question37->setOk(2);
        $manager->persist($question37);

        $question38 = new Quiz();
        $question38->setQuestion('Parmi ces options, laquelle représente un modèle produit par Subaru ?');
        $question38->setReponse(['Impreza', 'Focus', 'Cruze', 'Camry']);
        $question38->setOk(0);
        $manager->persist($question38);

        $question39 = new Quiz();
        $question39->setQuestion('Lequel de ces constructeurs automobiles est célèbre pour sa voiture "F-Type" ?');
        $question39->setReponse(['Jaguar', 'Bentley', 'Rolls-Royce', 'Aston Martin']);
        $question39->setOk(0);
        $manager->persist($question39);

        $question40 = new Quiz();
        $question40->setQuestion('Parmi ces constructeurs, lequel est connu pour la production du modèle "R8" ?');
        $question40->setReponse(['Audi', 'BMW', 'Mercedes-Benz', 'Volkswagen']);
        $question40->setOk(0);
        $manager->persist($question40);

        $question41 = new Quiz();
        $question41->setQuestion('Quel constructeur automobile est connu pour sa technologie "quattro", un système de transmission intégrale ?');
        $question41->setReponse(['BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen']);
        $question41->setOk(2);
        $manager->persist($question41);

        $manager->flush();
    }
}
