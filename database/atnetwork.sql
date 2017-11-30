-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2017 at 08:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'W',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@atnet.com', '$2y$10$1nOhP110ELLkDiqwDCNHT.NhJIP0z8ah.nMFL04KKqaCXSsiI4LPq', 'W', 'XppTXMe8awtk47ZToTkOHDSf3sVAWtwzAfeFatVHlCkLSjefNHxUcKJkMsvn', '2017-04-28 02:15:36', '2017-11-23 09:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins_password_resets`
--

CREATE TABLE `admins_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner_list`
--

CREATE TABLE `banner_list` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` tinytext NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y' COMMENT 'N-Inactive,Y-active',
  `position` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_list`
--

INSERT INTO `banner_list` (`id`, `name`, `description`, `image`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'banner1', 'lorem lipsum dummy text-1', 'f76735e467d3bb51423a06bd6c419f9f.jpg', 'N', 0, '2017-06-19 06:24:30', '2017-08-16 07:19:50'),
(2, 'banner2', 'lorem lipsum dummy text-2', '3f0cc8973301bada9645aa04b2ff1b5b.jpg', 'N', 0, '2017-06-20 14:07:09', '2017-08-16 07:19:50'),
(3, 'Video Conferencing', '', 'e8e991121f44720fcecac92a5248ea50.png', 'N', 0, '2017-07-21 10:22:21', '2017-08-16 07:19:50'),
(4, 'Virtual Classroom', '', '6b72ac19c58e6f929a6253dadcc2364a.png', 'N', 0, '2017-07-21 10:23:15', '2017-08-16 07:19:50'),
(5, 'Surgery Recording', '', 'fdfb49ebadb64c6dfde2099e5f0794c7.png', 'Y', 3, '2017-07-21 10:23:49', '2017-08-17 04:43:19'),
(6, 'eLearning', '', '9f436c98176a04720cd5dcd576ea2b0a.jpg', 'N', 0, '2017-07-21 10:24:22', '2017-08-16 07:19:50'),
(7, 'Telemedicine', '', '95647dffc7f186574bb5d689be207772.png', 'Y', 6, '2017-07-21 10:24:44', '2017-08-17 04:44:29'),
(8, 'Video Conferencing', '', 'cd98afa158c1f385785b92ed16722cfb.png', 'N', 1, '2017-08-16 07:07:04', '2017-08-24 08:16:34'),
(9, 'Virtual Classroom', '', 'e631ad097246cc5af90163835a58cad3.jpg', 'Y', 2, '2017-08-16 07:09:28', '2017-08-31 12:28:59'),
(10, 'Video Streaming', '', '88fbe542fd4d53fe4676d63fe1531f0a.png', 'N', 4, '2017-08-16 07:11:58', '2017-08-24 08:17:46'),
(11, 'eLearning', '', '52b06d828e046370fd3a3f5d19eed979.png', 'N', 5, '2017-08-16 07:12:53', '2017-08-24 12:16:26'),
(12, 'Video Conferencing', '', 'f776a13303eba900278ddb3aa2e3d8d9.jpg', 'Y', 1, '2017-08-24 08:17:07', '2017-08-31 12:23:57'),
(13, 'Video Streaming', '', '83e0c79bb9baae20e0289b4c5840651a.jpg', 'Y', 4, '2017-08-24 08:18:19', '2017-09-02 04:43:45'),
(14, 'eLearning', '', 'ece2cd114de1431cb917b6b321d9f648.PNG', 'Y', 5, '2017-08-24 12:17:06', '2017-08-29 06:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` date NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_status` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `post_title`, `post_slug`, `post_content`, `post_date`, `post_author`, `post_status`, `created_at`, `updated_at`) VALUES
(1, 'NCAST for PSG Institute of Medical Sciences & Research', 'ncast-for-psg-institute-of-medical-sciences-research', '<p>A&amp;T is to implement a project for setting up Multimedia classroom Lecture Capture with Live and on Demand Webcasting in 6 classrooms and 2 Seminar halls at the prestigious PSG Institute of Medical Sciences &amp; Rsearch at Coimbatore. This is the first of its kind project in a Medical institution in India.</p>\r\n<p class=\"line-h-26\">The Institute spread over a sprawling campus along with its 1000 + beds hospital is known for maintaining very high level of standards in infrastructure, faculty, technology and training methodology. The need for this project was felt as part of technology based learning and modernisation programme to develop the multimedia based curriculum as well as to add value for students by offering them anytime access to recorded lecture sessions.</p>\r\n<p class=\"line-h-26\">The project will use state of the art capturing encoders from in each lecture halls with a central server for content Management and on Demand webcasting &ndash; all from NCAST, the leader in Streaming Rich media communications. PSG institute will develop the curriculum for all years of its graduate and Post graduate medical courses.and plans to eventually build a massive multimedia digital library. The lectures would be accessbile from the Institutes\' website for their students who get authenticated.</p>\r\n<p class=\"line-h-26\">A &amp; T\'s Design &amp; Engineering team has provided the design for the AV integration and will implement the project, train the faculty, &amp; offer onsite engineering support for a period of one year.</p>', '2017-10-07', '1', 1, '2017-10-07 10:07:24', '2017-10-07 10:07:24'),
(2, 'A & T implements Virtual Classrooms at IIM', 'a-t-implements-virtual-classrooms-at-iim', '<p>A &amp; T Video Networks bagged the prestigious Indian Institute of Management Trichy\'s order for Virtual Classroom Solution for multiple classrooms as well as Board Room automation solution at their Trichy and Chennai campus. The project with the latest Group 700 Polycom video conferencing systems and state of the art audio systems provides for a near presence classroom experience for IIM students at both campuses irrespective of the faculty\'s presence.</p>', '2017-09-15', '1', 1, '2017-09-15 08:16:29', '2017-09-15 08:16:29'),
(3, 'Twenty Years in IT - People matter', 'twenty-years-in-it-people-matter', '<p>On April 18th 2015, I completed&nbsp;20 years in the IT industry having ventured in 1995. As a technocrat, the journey has been highly satisfying for the Technologist in me and very challenging for the entreprenuer in me.</p>\r\n<p>Passion in technology has been the driving force to continue innovating and providing some of the most difficult solutions which we have been able to design and deliver ahead of anyone else in the market. I could go on listing several challenges, pleasures of acheivement and firsts to our credit, but below are some of the unknown ones which gave me the highest satisfaction.</p>\r\n<p>&ndash; The first website which I built by own hands for MADITSSIA with the help of a friend.</p>\r\n<p>&ndash; The first Online Order tracking system for a reputed export house on their website ( \'portal\' was not yet coined )</p>\r\n<p>&ndash; Seeing the passengers use our implemented&nbsp;Touch screen information kiosk for the first time at Madurai Railway station providing interactive live PNR enquiry</p>\r\n<p>&ndash; The challenge to implement a Motorola Vanguard Router at an engineering college against a monopolised brand product.</p>\r\n<p>&ndash; Our first HDSL extender implemented at Indian Railways which we sold at 100 times the current price of a far superior DSL technology product</p>\r\n<p>&ndash; Our first telemedicine project which we implemented in Dibrugarh ( 4 full days of Rail journey from Madurai )</p>\r\n<p>&ndash; Travels across rural parts of India &ndash; North East, Madhya Pradesh, AP, and other places &ndash; for exploring Telemedicine and ending up learning that there are other more&nbsp;basic needs required.</p>\r\n<p>&ndash;&nbsp; Doing a demo for two way video Communication in between the tracks at Madurai and Koodal Nagar Railway station for proving our solution for Accident Site communication across Railway offices.</p>\r\n<p>&ndash; The first ICU interactive solution developed for a dynamic Hospital head of a Union Territory to provide value add to the patients relatives in a Government set up &ndash; who says Government officers don\'t think out of the box &nbsp;?</p>\r\n<p>&ndash; Completing the supply and implementation of the entire RAILNET infrastructure at Kolkotta Railways in a record 100 days.</p>\r\n<p>&ndash; Arranging a Video conferencing between from the middle of the famous 100 year old Pamban railway brdige on the way to Rameswararm over a temporary wireless network to the Madurai venue from where Mrs.Sonia Gandhi inaugurated the revamped cantilevel bridge.</p>\r\n<p>&ndash; The collaborative Multimedia Classroom project at the Indian Institute of Science using an obscure niche product which we won against the more pronounced and branded products ( over a period of 5 1/2 months and 6 full fledged demo sessions), going back to school in learning a lot from the learned professors questioning some difficult technology, &hellip;.</p>\r\n<p>Along the way, I was helping people use technology to succeed for themselves. I believe in collaboration and I believe People\'s success is my success. The biggest acheivement however are&nbsp;the people &ndash; who worked under A &amp; T and are today in highly successful positions and remembering their professional alma mater.</p>\r\n<p>All this was possible bcoz of People &ndash; People at A &amp; T, People at Customer sites, People on the way whom I met, and I realise that only People Matter. Against all odds few stuck with me, few left with friendly goodbyes, few customers just reposed thier unbinding faith in me. But for them, A &amp; T as an organisation could not have acheived some of the technological breakthroughs. I salute and thank all these wonderful partners in my journey.</p>\r\n<p>And across these years I learnt being an enreprenuer and the nuances of running an organisation. The challenge of running a technology organsiation against all odds from a city like Madurai. Organisations moved to Chennai to grow, I took this in my stride. When in 2001 I went to Delhi to talk about Video Conferencing technology, people there asked how come you are form Madurai, today people in the industry across the country recognise A &amp; T as a innovative solution provider but then even now people do ask the same question&hellip;.</p>\r\n<p>The journey continues&hellip; every day is a new direction, new learning, and new success.</p>', '2017-09-15', '1', 1, '2017-09-15 07:48:11', '2017-09-15 07:48:11'),
(4, 'Unfied Collaboration System', 'unfied-collaboration-system', '<p><strong>Unified Collaboration System</strong> is the first of a new generation of online meeting solutions that enables meetings to be held by participants from their desktops, in a meeting room, over IP Network. The solution uses a convergence of video, voice and data to provide a real meeting like experience, with high quality video and audio systems and a full set of data collaboration tools. The combination of video, audio and data on a single personal client, providing access to online meetings whenever a broadband connection is available, has the potential to fundamentally change the way we work. Communication can always be done face to face, bringing all the benefits of direct communication to the desktop.&nbsp;&nbsp; &nbsp;A &amp; T Network Systems &ndash; Unified Collaboration</p>\r\n<p>People will join a meeting from their own desktop, they can join the meeting when needed, and when the chairman calls them in, rather than sitting through hours of irrelevant discussion. Because participants are usually connected from their own desktop computers, if a piece of data is required during conference, it can be sourced from one of the participant&rsquo;s computer systems and can be shared online in moments.</p>', '2017-09-15', '1', 1, '2017-09-15 07:50:08', '2017-09-15 07:50:08'),
(5, 'Importance of AV over IP Technology Projects', 'importance-of-av-over-ip-technology-projects', '<p>Audio Video technologies are today merging with IP Network based technologies to deliver AV communications seamlessly over IP networks across the globe. Understanding &nbsp;both Networking and A/V technologies is critical to fulfill any Systems integration projects in the AV over IP space. The three pillars of an effective AV over IP integration project are</p>\r\n<p>1)<strong>Technology</strong> Networks, Hardware, Software, Audio equipments, Video equipments</p>\r\n<p>2)<strong>Space</strong> Interiors, Environment, etc.</p>\r\n<p>3)<strong>Content</strong> presentations, Info graphics, etc.</p>\r\n<p>While Technology covering the entire spectrum is essential for an effective delivery mechanism, it has been observed that Space and Content also play a very critical role in the final experience of the audience. It is important that the technology provider designs and &nbsp;coordinates with Specialized interior designers. Content of course is user driven but can be effectively developed to make use of the relevant technology incorporated for the audience experience.&nbsp;</p>\r\n<p><strong>A &amp; T in the above context </strong></p>\r\n<p>A &amp; T has understanding of IP network technology since 1998 and Video technologies since 1999 and introduced Video conferencing in 1999 as a Network solution rather than as office automation product.</p>\r\n<p>Processes at A &amp; T are certified under ISO 9001 &ndash; 2008 since 2005 to offer a delightful experience for customers. This includes the Solution / systems design as well.</p>\r\n<p>Human resources are the key to a successful implementation and technology support. The processes also ensures the competency of personnel as training, retraining, etc. are part of ISO system to ensure precise implementation and support. The training includes exhaustive internal training, on the field training and training and certification from product OEM&rsquo;s. A &amp; T&rsquo;s engineers are trained at BICSI ( for networking ) and &nbsp;Infocomm ( for Audi Video ), both of these organizations offer vendor neutral training and not specific to any one product.</p>\r\n<p>A &amp; T also runs a practice school concept ( second company in Tamilnadu to do so after TVS ) launched by CII in 2008 by which students from colleges spent 2 days a week for 2 years in our organization. This has enabled us to have a vast pool of industry ready engineers to offer onsite support to customers who actually need it in such large projects.</p>\r\n<p>A &amp; T is also a member of various organizations including MAIT ( IT hardware) , NASSCOM ( software ) and INFOCOMM ( Audio Video ). This gives the organization access to technical resources both in Networking and Audio / Video technologies and as well to software development companies for customer centric customization.</p>\r\n<p>All these initiatives continue to enhance the technology capability of A &amp; T&rsquo;s personnel apart from the vast repository of technology and technical knowledge gained over the past 20 years.</p>\r\n<p>With more than 300 smart multimedia classrooms and 40 high end integrated designed classrooms already implemented in coordination with specialist interior design organisations like the BECIL, A &amp; T has the exposure to practical user experience and project implementation pitfalls which are now used continuously towards better project implementation strategies to add value to our esteemed customers.&nbsp;</p>\r\n<p>For more info, please free to email <a href=\"mailto:ashwin@atnetindia.net\" target=\"_blank\" rel=\"noopener noreferrer\">ashwin@atnetindia.net</a> for an insight into the technology and its impact on Education, Healthcare, and Corporate boardroom solutions.</p>', '2017-09-15', '1', 1, '2017-09-15 08:09:09', '2017-09-15 08:09:09'),
(6, 'Mirror - Oct Nov-2014', 'mirror-oct-nov-2014', '<p>GIVE IT A THOUGHT:</p>\r\n<p style=\"font-weight: normal;\">I received &nbsp;a message today morning from a friend it read, &rdquo;Whenever you are in a Condition to Help someone, Just Do It and be Glad Be- cause God is answering someone&rsquo;s Prayer through you. reading it lots of thoughts flashed across.</p>\r\n<p style=\"font-weight: normal;\">For us all whenever someone talks about &lsquo;GIVING&rsquo; we think about Money we say &ldquo;one needs money to do social service or with so many expenses where do we have excess amount to spare or We do it on the death anniversary of our beloveds&rdquo; etc.</p>\r\n<p style=\"font-weight: normal;\">Don&rsquo;t you think that such answers are just excuses. Don\'t we ? at times spend on things not so necessary. What I mean is spending time gossip- ing, spending time in outwitting someone, spending precious time in plotting against someone or for that matter lazing time in watching stupid things on the TV.</p>\r\n<p>Giving can be in form of Time or Energy. &nbsp;one can help by devoting time to someone in need. Just try doing it once the amount of satisfaction one gets is immense, you feel you are worth something. Your self confidence grows, you are blessed much more and you keep good health with all the positive vibrations around you.</p>\r\n<p style=\"font-weight: normal;\">I would share an incident from Mother Teresa&rsquo;s life.</p>\r\n<p style=\"font-weight: normal;\">&lsquo;One day she received a cover with $15 from a man who has been on his back for twenty years (disabled) and the only part that he can move was his right hand. The only companion that he enjoyed was smoking. He had written inside : &ldquo;I did not smoke for one week, and I send you this money.&rdquo; It must have been a terrible sacrifice for him but see how beautiful, how he shared. And with that money Mother Teresa brought bread and gave to those who are hungry with a joy on both sides. He was giving and the poor were receiving.</p>\r\n<p style=\"font-weight: normal;\">This is something you and I can do &ndash; it is a gift of God to us to be able to share our love with others.</p>', '2017-09-15', '1', 1, '2017-09-15 08:14:12', '2017-09-15 08:14:12'),
(7, 'IP   Surveillance', 'ip-surveillance', '<p>IP-based systems deliver a great deal of additional functionality. For instance, they provide motion detection, auto time and date stamps, easy transfer of visuals, and pre- and post-alarm messaging. Business owners are notified immediately if an event is occurring; they can then log on to the system remotely to see what\'s happening in their offices and businesses.</p>\r\n<p>An enormous variety of organizations have already installed IP-based surveillance systems to help secure both the interior and exterior of buildings. A few examples include retail stores, banks, law firms, gas stations, parking garages, schools and government offices; but these systems provide greater security to all organizations and businesses. Users have found that IP surveillance,</p>\r\n<ul class=\"\">\r\n<li>Enhances and expedites law enforcement and emergency services to high-risk calls.</li>\r\n<li>Contributes to reliable identification of criminals and reduces the need for eyewitnesses.</li>\r\n<li>Can be used locally and remotely.</li>\r\n<li>Integrates easily with CCTV cameras, thus preserving existing security investments.</li>\r\n</ul>\r\n<p>Most users also have discovered that IP surveillance is very affordable, since companies already have many components of the system in place (such as an IP network and broadband connectivity). Other system components include an 802.11 wireless LAN, an access router, a video server, an IP camera (existing analog cameras can also be used) and host PC surveillance software.</p>\r\n<p>IP technology is the next step forward for surveillance systems. IP-based streaming video surveillance lets organizations monitor, prevent and/or respond to emergency situations more effectively and affordably, via the Internet. At the same time, the technology allows law enforcement, security companies and other emergency personnel to prepare better and respond more fully to emergencies. Thus, the physical safety of a company\'s vital human and business assets is far more secure and protected.</p>', '2017-10-16', '1', 1, '2017-10-16 05:29:47', '2017-10-16 05:29:47'),
(8, 'Video Conference Technology', 'video-conference-technology', '<p>The core technology used in a <strong>video conference</strong> (VC) system is digital compression of audio and video streams in real time. The hardware or software that performs compression is called a codec (coder/decoder). Compression rates of up to 1:500 can be achieved. The resulting digital stream of 1\'s and 0\'s is subdivided into labelled packets, which are then transmitted through a digital network of some kind (usually ISDN or IP). The use of audio modems in the transmission line allow for the use of POTS, or the plain telephony network in some low-speed applications, such as video telephony, because they convert the digital pulses to/from analog waves in the audio spectrum range.</p>\r\n<p><strong>The other components required for a VC system include:</strong></p>\r\n<ul class=\"page-content\">\r\n<li>video input : video camera or webcam</li>\r\n<li>video output : computer monitor or television</li>\r\n<li>audio input : microphones</li>\r\n<li>audio output : usually loudspeakers associated with the display device or telephone</li>\r\n<li>data transfer : analog or digital telephone network, LAN or Internet</li>\r\n</ul>', '2017-09-15', '1', 1, '2017-09-15 08:22:27', '2017-09-15 08:22:27'),
(9, 'Guidelines for a Video conference room preparation', 'guidelines-for-a-video-conference-room-preparation', '<p><strong>FACTORS : </strong></p>\r\n<ul class=\"pagecontent \">\r\n<li>Correct illumination</li>\r\n<li>Good acoustics</li>\r\n<li>Better background colours</li>\r\n</ul>\r\n<p><strong>CORRECT&nbsp; ILLUMINATION : </strong></p>\r\n<ul class=\"pagecontent \">\r\n<li>It&rsquo;s better to control room illumination by creating an ambience with artificial lighting</li>\r\n<li>It&rsquo;s strongly recommended to separate the area reserved for the speakers from the audience area</li>\r\n<li>Concentrate artificial light on the area reserved for the speakers</li>\r\n<li>Illuminate the rest of the room with soft light</li>\r\n<li>Do not illuminate devices used as displays (monitors, projection screens, plasma</li>\r\n<li>It&rsquo;s suggested to darken the windows with curtains, better if made of materials that deaden also possible sound reverberations</li>\r\n<li>Don&rsquo;t use tables or furniture made of / laminated with materials that reflect the light</li>\r\n</ul>\r\n<p><strong>Suggested lighting parameters</strong></p>\r\n<ul class=\"pagecontent \">\r\n<li>Use lamps with a color temperature value of 3500&deg; Kelvin</li>\r\n<li>Brightness, measured as a reflection off the face of the speaker, should have a value of 500 Lux.</li>\r\n</ul>\r\n<p><strong>GOOD ACOUSTICS :</strong></p>\r\n<p>The following steps are suggested in order to avoid echoes and sound reverberation</p>\r\n<ul class=\"pagecontent \">\r\n<li>Avoid furnishings made of reflecting materials, such as</li>\r\n</ul>\r\n<p>Wood chairs,</p>\r\n<p>marble floors</p>\r\n<p>plasterboard false ceilings</p>\r\n<p>big windows</p>\r\n<ul class=\"pagecontent \">\r\n<li>solve possible acoustic problems by\r\n<ul class=\"pagecontent \">\r\n<li>Covering walls, windows and/or glass surfaces with curtains and/or materials that deaden reverberations</li>\r\n<li>Covering the floor with fitted carpets (moquette)</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p><strong>BETTER BACKGROUND COLOURS: </strong></p>\r\n<ul class=\"pagecontent \">\r\n<li>To improve light distribution in the room, enhancing quality of video pictures, it&rsquo;s suggested to choose curtains and/or upholstery with a light color (such as gray or light blue)</li>\r\n<li>A good climate control is also recommended in order to ensure not only that the equipment operates properly, but also that the people using the room are comfortable.</li>\r\n</ul>\r\n<p><strong>NOTES : </strong></p>\r\n<ul class=\"pagecontent \">\r\n<li>Don&rsquo;t place cameras facing light sources (avoid filming with backlighting)</li>\r\n<li>Don&rsquo;t place projection screens and/or monitors near lights or windows.</li>\r\n<li>Don&rsquo;t install loudspeakers near microphones</li>\r\n<li>Wall mounted loudspeakers should be installed at an height from 2,20 to 2,50 meters to ensure a correct hearing</li>\r\n<li>Never install loudspeakers behind the listeners:<strong> they could get confused. </strong></li>\r\n</ul>\r\n<p><strong>For more information, contact :&nbsp;</strong>Engineering &amp; Design &ndash; ed@atnetindia.net</p>', '2017-09-15', '1', 1, '2017-09-15 08:31:30', '2017-09-15 08:31:30'),
(10, 'Bhutan The land of hunder dragon', 'bhutan-the-land-of-hunder-dragon', '<p>Our Trip To &lsquo;The Land of Thunder Dragon&rdquo;-Bhutan:</p>\r\n<p>All A &amp; T ians would be aware of the term GNH (for those who don\'t ,means you haven\'t really paid heed during the A &amp; T Profile/Culture presentation during induction) Gross National Happiness .It was because of this unique concept that we got interested in visiting Bhutan, It was my first foreign trip (though visa is on arrival and Bhutan shares Open border with India, so its actually not Foreign as it seems) Any ways we &nbsp;were excited. We went to Kolkata and from there took a flight to Paro (the only airport in Bhutan).Just before landing we were dumb struck to see the Himalayas and the Kanchenjunga and Mt.Everest. It was wow. The landing too was awesome as the pilot had to maneuver the aircraft thru the hills to make a safe landing.</p>\r\n<p>We had a &lsquo;Home stay&rsquo; experience on the 1st day that is we stayed in one farmer&rsquo;s house, old typical Bhutanese house made from wood and glass and full of beautiful carvings. Our host served us &lsquo;Butter Tea&rdquo; called Po Cha, oh my god! That was one thing that made me sick and gave me the opportunity to experience Bhutan&rsquo;s hospitality to the core. I was hospitalized in the Paro Govt. Hospital. The hospital was spike and span, very clean and neat and free of cost. Medical expenses are borne by the Govt.there.</p>\r\n<p>We saw places like the Paro Dzong (Dzong meaning a place where monastery&ndash; Buddhist temple and Govt.Offices reside together) the National Museum ,Drugyal Dzong,etc.One place we missed visiting because of my illness was &lsquo;The Tiger&rsquo;s Nest&rsquo; or Taktsang Lhakhang.Its breath taking view is something one cannot forget in lifetime. It&rsquo;s a steep climb taking about 3-4 hrs.</p>\r\n<p>After Paro the next place we visited was Punakha,via Dochela Pass ,a beautiful valley with a magnificent Dzong also called &lsquo;The Palace of Happiness&rsquo; built in 1637 on the confluence of 2 rivers, Pho Chhu (father river) and Mo Chuu (mother river). This is the place where the Coronation of the king takes place and the blessings received.</p>\r\n<p>Ema datshi is the national dish made from chilies and cheese, The National dress for male is called Gho and for ladies is called Kira. The importance of the national dress is not merely in the constitution or in the books, each and everyone respects it and wear only Gho while on official duty(even our driver and guide wore Gho) they aren\'t allowed to enter the Dzong without this dress. Even small girls and boys wear it. Even the youth present there, respects this tradition (unlike our country Youths, who are attracted towards the western culture)</p>\r\n<p>Next stop was the capital city of Thimpu, we saw the Takin Preserve Centre (Takin is the National animal of Bhutan, it resembles a mountain goat)</p>\r\n<p>The Majestic Shakyamuni Buddha &ndash; a 51.5.metre big statue made from bronze and gilded in gold and installed on the mountain top over looking the Thimpu town, It houses 1 Hundred thousand smaller Buddha Statues.. There is a hand made paper factory, the Choki school of traditional art school (where Drishti had few friends),To watch the young generation carry forward their traditional art and culture was highly appreciative, youngsters were not glued to ipads or mobiles but drawing boards ,chisel and embroidery rings.</p>\r\n<p>We had the rare opportunity of meeting the Ex- Education Minister H. H. Mr. Thakur Singh Powdyel, its was a pleasure listening to him for about 2 &frac12; hrs talking about the GNH(Gross National Happiness) concept and the Green School concept. He was so humble that he even came till the entrance to leave us till our car and asked the driver whether or not he would have tea. We even went to see a Bhutanese Movie.</p>\r\n<p>We flew back to Kolkata with lovely memories of the humble people, their rich culture and tradition and beautifully rich monasteries.</p>\r\n<p>Truly the land of Shangri-La.</p>', '2017-09-14', '1', 1, '2017-09-14 08:05:16', '2017-09-14 08:05:16'),
(11, 'NLF (National Lead Foundation) To initiate entrepreneurship at grass root levels  in the southern districts', 'nlf-national-lead-foundation-to-initiate-entrepreneurship-at-grass-root-levels-in-the-southern-districts', '<p>nlf-national-lead-foundation-to-initiate-entrepreneurship-at-grass-root-levels-in-the-southern-districts</p>', '2017-08-10', '1', 1, '2017-08-10 10:24:51', '2017-08-10 10:24:51'),
(12, 'NIT (implements Virtual Classrooms with Lifesize UVC  Clearsea)', 'nit-implements-virtual-classrooms-with-lifesize-uvc-clearsea-', '<p>NIT Trichy were looking at a low cost implementation of virtual video conference classroom solutions for 10 classrooms as per the model video conference classroom set up under the guidance of NIC.</p>\r\n<p>After technical evaluation and a vigorous demo, NIT selected A&amp;T as their vendor. A &amp; T offered the Lifesize UVC Clearsea central video Conferencing infrastructure with PC end points in each classroom, USB PTZ Cameras, audio microphones, speakers and smart classroom components of Dual large LED Displays, projectors, visualisers, wireless interactive tablets, etc.</p>\r\n<p>The project has been completed succesfully and A &amp; T thanks NIT for reposing its faith on the video technology capabilities.</p>', '2017-09-14', '1', 1, '2017-09-14 08:23:09', '2017-09-14 08:23:09'),
(14, 'eLearning', 'elearning', '<p>Education has undergone vast changes along with technological, economical, social and political developments taking place across the World. &nbsp;Today educationists and institutions are grappling to find solution and means to address issues like</p>\r\n<p>a) Enhancing Students capability and efficiency.</p>\r\n<p>b) Preserving and sharing of hard to find specialist teaching content /resources</p>\r\n<p>c) Implementing various effective delivery mechanisms. &nbsp;</p>\r\n<p>d) Reaching out to remote rural areas where the educational standards cannot be maintained at par with their urban counterpart.</p>\r\n<p>g) Extending formal and non formal educational opportunities and involving groups traditionally excluded from education due to cultural or social reasons such as ethnic minorities, girls and women, persons with disabilities, and the elderly, as well as all others who for reasons of cost or because of time constraints are unable to enroll on campus.</p>\r\n<p>The diagram below represents various components of the eco system for an inclusive and Interactive Distance Learning Continuity Program.</p>\r\n<p><strong>Distance Classes:</strong></p>\r\n<p>The current distance education programs have inherent drawbacks due to scarcity of resources and effective delivery mechanism of available resources. A proper implementation of Video conferencing and capturing and streaming technology can immensely benefit in conducting classes remotely by utilising the best of resources available in urban areas.</p>\r\n<p>While Video Conferencing technology has been in use for quite some time now by educational institutions, it is restricted to classrooms / auditoriums for conducting intra institution multiple classroom lectures and/or specialist faculty sessions. These can be extended to inter institution exchanges by forming CLUSTER and other programmes. Delivery of content to wider student community at low bandwidths can enhance the mechanism to make available the rich lecture content and reach out to remote areas hitherto not possible. This can be achieved by streaming / broadcasting of the live lectures and providing access to archived content.</p>\r\n<p><strong>Content Creation in the Classroom:</strong></p>\r\n<p>Capturing lecture sessions happening in the classroom or digitising lectures, creating a ready content, broadcasting it to large number of students anywhere, recording and archiving it for providing access anytime has also been felt as a very important need so as to preserve valuable insights of various specialist faculties and as well to avoid repetitive physical delivery of the same content by resources.</p>\r\n<p><strong>Streaming &amp; Webcasting &ndash; Few applications for Educational Institutions</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>Capture lectures and make digital lecture content ready for future references and downloads by students and faculties.</li>\r\n</ul>\r\n<ul class=\"pagecontent\">\r\n<li value=\"2\">Live as well as on demand multimedia lectures over internet from home or wherever they are at &ndash; benefits students for attending classes and review.&nbsp;</li>\r\n<li value=\"3\">Access to Library magazines, research papers and other content in Digitized format for access anytime, anywhere.</li>\r\n</ul>\r\n<p><strong>Impact of Tele- Education services:</strong></p>\r\n<p>As tele education program prepares to become effective and operational, it is important to share the availability of services.&nbsp; In most cases, the initiative has two target audiences,</p>\r\n<p>&nbsp;</p>\r\n<p>INSTITUTIONS:</p>\r\n<ul class=\"pagecontent\">\r\n<li>Institutions who may benefit from the availability of tele-education services by means of providing value added service apart from conventional education system to Student bodies.</li>\r\n<li>Educational Institutions having Tele-education facility can levy service charges for each Tele-education seminar / class.</li>\r\n<li>The entire system opens up new possibilities for tele-education or continuing medical education or training industry professionals for isolated or remote colleges, who may not be able to reach easily to take part in professional meetings or educational opportunities.</li>\r\n<li>As part of social objective, institutions can conduct classes and reach out to rural and underprivileged students.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>STUDENTS:</p>\r\n<ul class=\"pagecontent\">\r\n<li>Benefits the Students as they gain knowledge through interactive multimedia platforms without having to leave their place.</li>\r\n<li>General Students, who may derive substantial benefits from improved access to various knowledge centers / institutions with sharing of knowledge not only with local experts / professors but also with foreign professors / experts</li>\r\n</ul>', '2017-09-15', '1', 1, '2017-09-15 08:27:30', '2017-09-15 08:27:30'),
(15, 'A&T Wins Services Industry Award', 'a-t-wins-services-industry-award', '<p>We are pleased to inform you that we have been awarded the MADITSSIA &ndash; TVS&nbsp;<br /> <strong>\"SERVICE INDUSTRY AWARD\"</strong> for the year 2009. It is recognition of our passion in the emerging technology<br /> area and for our innovativeness, and commitment towards fulfilling our Customers expectations.</p>', '2017-09-15', '1', 1, '2017-09-15 08:27:53', '2017-09-15 08:27:53'),
(16, 'MD leading the MADITISSIA team', 'md-leading-the-maditissia-team', '<p>Our MD leading the MADITISSIA team for a discussion with Tamilnadu state IT Minister Mr.K.A. Sengottaiyan on December 2011.</p>', '2017-09-15', '1', 1, '2017-09-15 09:22:24', '2017-09-15 09:22:24'),
(17, 'Demystifying a  smart  virtual classroom', 'demystifying-a-smart-virtual-classroom', '<p class=\"line-h-26\">The self-paced, online learning market has been projected to reach $12 Billion in India by 2016 with a CAGR of almost 18%. At the same time, student adoption of tablets and smartphones has increased rapidly compared to earlier years. How do colleges and educational institutions keep pace with these trends and provide students the facility to learn at their pace, their place and on their device of choice?</p>\r\n<p class=\"line-h-26\">Many institutions in India have adopted digital learning systems to supplement their classrooms. Effective video &amp; audio capture and webcast of lectures in multimedia format is the key to their success. There are several components for a successful implementation of a Digital Learning System in an educational institution.</p>\r\n<p class=\"line-h-26\">There are several components for a successful implementation of a Digital Learning System in an educational institution.</p>\r\n<div class=\"col-xs-12 col-md-6 col-sm-6 col-lg-6\"><img class=\"img-responsive m-auto d-block\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/Digital_Learning_system.jpg\" /></div>\r\n<div class=\"col-xs-12 col-md-6 col-sm-6 col-lg-6\">\r\n<p>1.The Smart Classroom</p>\r\n<p>2.The Virtual Classroom</p>\r\n<p>3.Lecture Capture for Curriculum Development</p>\r\n<p>4.Operation Theatre Recording and broadcasting</p>\r\n<p>5.Telemedicine</p>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<p class=\"line-h-26\">But how do you keep the students engaged in a webcast? How can you combine different sources of information &ndash; like videos from the internet, info-graphics, presentations and the capture of the lecture itself? How do you store these lectures and make them available for students to view on-demand? How do you share it with other colleges within your network?</p>\r\n<p class=\"line-h-26\">In the article below, I have sought to share my experience with you &ndash; experience that has come from implementing Smart and Virtual classrooms for a number of colleges and universities across India.This is the first of a series of articles I am writing on how classrooms, operation theatres and healthcare delivery capabilities are undergoing radical changes in India &ndash; brought about by advances in technology.</p>\r\n<p><strong>1.The smart classroom</strong></p>\r\n<div class=\"pull-left pr-6\"><img class=\"img-responsive\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/Smart_Edu_station.jpg\" /></div>\r\n<p class=\"line-h-26\">The world has moved away from blackboards long back. Whiteboards ensured a cleaner and healthier classroom environment. However, many universities have taken a giant leap forward and have implemented Smart Classrooms. These Universities are redefining the way students and instructors engage with each other and the way lectures are delivered. The instructor uses a smart station which not only helps deliver the lecture but also includes presentations, videos and info-graphics. Smart stations are a combination of various cutting edge technologies like LED displays, Smart/ Interactive Boards, Projectors and Audio systems. This ensures that the lectures are more interesting and captivating. Instructors can now deliver lectures that combine multiple sources of content. It has been found that students respond better to video clips and info-graphics and retain information better.</p>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<ul class=\"pagecontent \">\r\n<li>Students become active participants in the lecture rather than passive observers. With tablets and laptops, students can actually share their own presentations and observations with the entire class. Multiple students can respond to instructor questions in real time. It becomes a tool for assessment of learning and therefore, improvement. By making the class more interactive, the student&rsquo;s attention span increases, thereby making optimum use of the entire duration of the lecture.</li>\r\n<li>Audio systems in Smart Classrooms change the way lectures are delivered. With microphones and speakers, instructors can now deliver lectures in a normal voice, decreasing instructor fatigue. Long discussions are no longer a challenge since the lecturer does not have the strain of ensuring that even the backbenchers are able to hear the instructions clearly.</li>\r\n</ul>\r\n<p><strong>2.The Virtual Classroom</strong></p>\r\n<div class=\"pull-left pr-6\"><img class=\"img-responsive\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/IIM.jpg\" /></div>\r\n<p class=\"line-h-26\">Today, one of the challenges faced by medical colleges is the availability of senior guest faculty &ndash; experts in their own area of practice. With limitations in lecture hall space and availability of all students at a given time, colleges have started adopting the Virtual Classroom. While Smart Classrooms have ensured that lectures are captivating and interactive, Virtual Classrooms ensure that these lectures are available to a larger audience &ndash; both live and on-demand</p>\r\n<p class=\"line-h-26\">There are three distinct features that you should look at implementing while deploying a Virtual Classroom.</p>\r\n<ul class=\"pagecontent \">\r\n<li><strong>Interaction</strong> with all live viewers: an effective Virtual Classroom allows students in remote locations can interact with instructors and doctors just as they would if they were present on-location.&nbsp; Speakers located strategically relay their questions to the classroom.&nbsp; The instructor can also view the students asking the question on a LCD TV.&nbsp; Remote students can also give their feedback and make their own presentations just as a in-classroom student would.&nbsp;</li>\r\n<li><strong>Lecture capture</strong>: Hi definition cameras in Classrooms capture high resolution videos of the lecture.&nbsp; The audio, presentations and info-graphics from the Smart Classroom system is integrated into the video to make the experience complete for the remote student.</li>\r\n<li>The <strong>infrastructure</strong>:&nbsp; Once captured on video, lectures can be transmitted to viewers across the globe.&nbsp; However, the way this is done is extremely crucial.&nbsp; Given the state of the internet in India today, only systems that utilize extremely low bandwidth will succeed.&nbsp; Unless careful attention is paid to this while choosing your Smart Virtual Classroom, the project will die before it takes off.&nbsp;</li>\r\n</ul>\r\n<p class=\"line-h-26\">In conclusion &ndash; by implementing a Smart Virtual Classroom, colleges can not only develop their curriculum by creating a library of lectures and reach out to more students, but also make lecture webcasts interesting and interactive.</p>', '2017-09-14', '1', 1, '2017-09-14 08:26:19', '2017-09-14 08:26:19'),
(18, 'July 2014', 'july-2014', '<p>July 2014</p>', '2017-08-26', '1', 0, '2017-09-15 08:28:15', '2017-09-15 08:28:15'),
(19, 'Technology - AV over IP Network', 'technology-av-over-ip-network', '<p>Technology - AV over IP Network</p>', '2017-08-26', '1', 0, '2017-09-15 08:28:15', '2017-09-15 08:28:15'),
(20, 'Video Conferencing Usage in Education', 'video-conferencing-usage-in-education', '<p>Video Conferencing Usage in Education - A&amp;T Video Network</p>', '2017-09-15', '1', 0, '2017-10-17 05:27:13', '2017-10-17 05:27:13'),
(21, 'Commercial Benefits of Video Conferencing', 'commercial-benefits-of-video-conferencing', '<p>Commercial Benefits of Video Conferencing</p>', '2017-09-15', '1', 0, '2017-10-17 05:26:53', '2017-10-17 05:26:53'),
(22, 'VC Systems Standards', 'vc-systems-standards', '<p>VC Systems Standards</p>', '2017-09-15', '1', 0, '2017-10-07 11:39:36', '2017-10-07 11:39:36'),
(23, 'Government should encourage Small IT Companies In Madurai IT Park', 'government-should-encourage-small-it-companies-in-madurai-it-park', '<p>Government should encourage Small IT Companies In Madurai IT Park Ashwin Desai.MD,A&amp;T Video Networks Pvt Ltd</p>', '2017-09-15', '1', 1, '2017-09-15 09:26:03', '2017-09-15 09:26:03'),
(24, 'Mirror October 2014', 'mirror-october-2014', '<p>Mirror October 2014</p>', '2017-08-26', '1', 0, '2017-09-15 09:26:18', '2017-09-15 09:26:18'),
(26, 'Technology', 'technology', '<p>Video Conferencing</p>\r\n<p class=\"line-h-26\">The core technology used in a video conferencing (VC) system is digital compression of audio and video streams in real time. The hardware or software that performs compression is called a codec (coder/decoder). Compression rates of up to 1:500 can be achieved. The resulting digital stream of 1\'s and 0\'s is subdivided into labelled packets, which are then transmitted through a digital network of some kind (usually ISDN or IP). The use of audio modems in the transmission line allow for the use of POTS, or the plain telephony network in some low-speed applications, such as video telephony, because they convert the digital pulses to/from analog waves in the audio spectrum range.</p>\r\n<p>The other components required for a VC system include:</p>\r\n<ul class=\"pagecontent\">\r\n<li>video input : video camera or webcam</li>\r\n<li>video output : computer monitor or television</li>\r\n<li>audio input : microphones</li>\r\n<li>audio output : usually loudspeakers associated with the display device or telephone</li>\r\n<li>data transfer : analog or digital telephone network, LAN or Internet</li>\r\n</ul>\r\n<p>Basic kinds of VC systems and Standards.</p>\r\n<p>Applications of Video Conferencing</p>\r\n<p>Why ISDN Video Conferencing better than Internet based VC?</p>\r\n<p class=\"mt-3 font-blue font-16\"><strong>Life Size :</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>LifeSize Products supports dozens of resolutions to ensure interoperability with standards based HD and SD endpoints</li>\r\n<li>Spatial Resolutions is &gt;200 and whereas with other players it is only 9.</li>\r\n<li>Lifesize Products offer Virtual Multiway Layout that lets users select custom layouts of multiple images on one display</li>\r\n<li>Lifesize Products is 20% size of other players making it easier to deploy</li>\r\n<li>Datasharing and XGA(for Presentation sharing) pricing included in the Lifesize product price itself and other players offers it as optional features.</li>\r\n<li>LifeSize Products automatically adjust resolution as bandwidth decreases while maintaining frame rate for the best experience</li>\r\n</ul>\r\n<p class=\"line-h-26 font-blue font-16 mt-3\"><strong>Why Lifesize?</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>Pioneer in High Definition Video conferencing</li>\r\n<li>First High Definition Video conferencing and 1080p support</li>\r\n<li>Leader in HD video communications: delivered world&rsquo;s first HD video products</li>\r\n<li>More than 15,000 unique customers in over 100 countries</li>\r\n<li>Founded in 2003 by industry veterans</li>\r\n<li>Product Excellence</li>\r\n<li>LifeSize is a division of Logitech a leader in PC video communication.</li>\r\n<li>Easy Installation with User friendly GUI</li>\r\n<li>In Multi conferencing also maintaining full HD 1080p resolution</li>\r\n<li>Range of product and can select based on the specific requirement</li>\r\n<li>First HD video conferencing which is officially Microsoft&reg; qualified with Microsoft&reg; Office</li>\r\n<li>Communications Server 2007 R2 &nbsp;&nbsp;</li>\r\n</ul>', '2017-10-16', '1', 1, '2017-10-16 05:37:45', '2017-10-16 05:37:45'),
(28, 'Technology Era', 'technology-era', '<p>Video Streaming</p>\r\n<p class=\"text-justify line-h-26\">Streaming media is media that is consumed (read, heard, viewed) while it is being delivered. Streaming is more a property of the delivery system than the media itself. The distinction is usually applied to media that are distributed over computer networks; most other delivery systems are either inherently streaming (radio, television) or inherently non-streaming (books, video cassettes, audio CDs).</p>\r\n<p class=\"text-justify line-h-26\">The word \'stream\' is also used as a verb, meaning to deliver streaming media. The difference between Video Conferencing and Video streaming in simple terms is that Video conferencing is a two way and multiway collaboration of audio, video and data, whereas streaming is a one way delivery of audio, video and data. Ofcourse the return path can be a data chat mode in a streaming application.</p>\r\n<p class=\"text-justify line-h-26\">The big challenge in Video conferencing application is the high bandwidth requirement at the central Multi Conference Server which will be twice the number of users connected multiplied by the bandwidth at which the conference is taking place and hence the reachability is limited based on the available bandwidth on the unicast mode.</p>\r\n<p class=\"text-justify line-h-26\">In Streaming, over a multicast network, only the bandwidth at which the stream is captured is used irrespective of the number of users who receive the stream. Over the unicast mode, the bandwidth required would be equal to the number of users multiplied by the bandwidth at which the stream is being captured.</p>\r\n<p class=\"text-justify line-h-26 font-16 font-blue\"><strong>Live &amp; On Demand Streaming</strong></p>\r\n<p class=\"text-justify line-h-26\">The Streaming technology allows to stream LIVE sessions of any audio+Video+ data files. These can also be stored and streamed later ON DEMAND whenever the user wants anytime over any network to any devices like media players, laptops, mobile, etc.</p>\r\n<p class=\"text-justify line-h-26 font-16 font-blue\"><strong>Protocol Issue</strong></p>\r\n<p class=\"text-justify line-h-26\">Designing a network protocol to support streaming media raises many issues. Datagram protocols, such as the User Datagram Protocol (UDP), send the media stream as a series of small packets. This is simple and efficient; however, packets are liable to be lost or corrupted in transit. Depending on the protocol and the extent of the loss, the client may be able to recover the data with error correction techniques, may interpolate over the missing data, or may suffer a dropout.</p>\r\n<p class=\"text-justify line-h-26\">Designing a network protocol to support streaming media raises many issues. Datagram protocols, such as the User Datagram Protocol (UDP), send the media stream as a series of small packets. This is simple and efficient; however, packets are liable to be lost or corrupted in transit. Depending on the protocol and the extent of the loss, the client may be able to recover the data with error correction techniques, may interpolate over the missing data, or may suffer a dropout.</p>\r\n<p class=\"text-justify line-h-26\">The Real Time Streaming Protocol (RTSP), Real-time Transport Protocol (RTP) and the Real-time Transport Control Protocol (RTCP) were specifically designed to stream media over networks. The latter two are built on top of UDP.</p>\r\n<p class=\"text-justify line-h-26\">Reliable protocols, such as the Transmission Control Protocol (TCP), guarantee correct delivery of each bit in the media stream. However, they accomplish this with a system of timeouts and retries, which makes them more complex to implement. It also means that when there is data loss on the network, the media stream stalls while the protocol handlers detect the loss and retransmit the missing data. Clients can minimize the effect of this by buffering data for display.</p>\r\n<p class=\"text-justify line-h-26\">Hence when designing a streaming applciation, knowledge of Networks design, Quality of service over IP network, and the multimedia capturing tools &ndash; audio, video, data &ndash; are essential to deliver a smooth media stream.</p>\r\n<p class=\"text-justify line-h-26\">Applications of multi media streaming are primarily in Education, Healthcare, Corporate training, and Media organisations.</p>', '2017-09-18', '1', 1, '2017-09-18 06:20:14', '2017-09-18 06:20:14');
INSERT INTO `blogs` (`id`, `post_title`, `post_slug`, `post_content`, `post_date`, `post_author`, `post_status`, `created_at`, `updated_at`) VALUES
(29, 'Launch of Brickyard at Didac India', 'launch-of-brickyard-at-didac-india', '<p>A&amp;T has a significant presence in the high end digitization of leading educational institutions for over a decade now. We offer Solutions for Education institutions which include various digital technologies like</p>\r\n<ul class=\"pagecontent\">\r\n<li>Smart multimedia classrooms</li>\r\n<li>Collaborative Virtual classroom with Video conferencing</li>\r\n<li>Live Lecture Capture and webcasting solutions</li>\r\n</ul>\r\n<div class=\"pull-left pr-6\"><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Didac1.jpg\" width=\"448\" height=\"325\" /></div>\r\n<p class=\"line-h-26\">To mark our successful journey of 20+ years and our quest for innovation in Technology we launched an Integrated Digital learning Platform <strong>&ldquo;Brickyard</strong>&rdquo; at the show. Brickyard is the amalgamation of experience, expertise and learning outcomes. The objective behind the launch is to revolutionize the way student learn and trainers train.</p>\r\n<p>Brickyard offers a technology platform to Create and manage course content, Impart education online and assess the students, Share and accelerate the training to reach beyond physical campus for anywhere, anytime learning using.</p>\r\n<p>&nbsp;</p>\r\n<p>Lecture Capture with Digital Library platform eLearning with Student Collaboration platform and Virtual Live webinar and interactive classes platform.</p>\r\n<div class=\"pull-left pr-6\"><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Didac2.jpg\" width=\"448\" height=\"325\" /></div>\r\n<p class=\"line-h-26\">Some of the new Products of interest for educational institutions display by us at the show were:</p>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<ul class=\"pagecontent \">\r\n<li>Wireless Teacher Microphone</li>\r\n<li>Classroom Speakers</li>\r\n<li>Hardware based Lecture capture and live streaming recorders and streamers</li>\r\n</ul>\r\n<div class=\"pull-left pr-6\"><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Didac3.jpg\" width=\"448\" height=\"325\" /></div>\r\n<p class=\"line-h-26\">Brickyard outweighed all other display products and scored high from the visitors most liked product poll. We received good feedback for the product displayed on the booth of which, it was good to hear from the Visitor that &ldquo;Brickyard was need of the hour and in the world of high competition it is highly beneficial for Faculties and Students to overcome the challenges in Traditional method of teaching.</p>\r\n<p class=\"line-h-26\">For more info on AV solutions,&nbsp;<a href=\"http://atnetindia.net/educations\">Click Here</a></p>\r\n<p class=\"line-h-26\">For more info on Brickyard,&nbsp;<a href=\"http://www.brickyard.education/\">Click Here</a></p>', '2017-11-21', '1', 1, '2017-11-21 07:57:10', '2017-11-21 07:57:10'),
(30, 'Infocomm India 2017', 'infocomm-india-2017', '<p>A &amp; T Video Networks Pvt. Ltd. is a Value Added Distributor of Video Conferencing &amp; Video Streaming technologies comprising hardware, software and cloud-based services that run on secured, next-generation networks.</p>\r\n<p><span style=\"font-weight: 400;\"><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/1 - Copy 1.jpg\" alt=\"\" width=\"290\" height=\"230\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG_20170927_170129.jpg\" width=\"270\" height=\"290\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG20170927155209.jpg\" width=\"290\" height=\"230\" /></span></p>\r\n<p><span style=\"font-weight: 400;\">We have just completed a successful exhibition of our products at Infocomm 2017 and so far as one of our key driving principles suggests - \'innovation\' was not only limited to our video solutions! The A&amp;T team, dressed in the traditional South Indian attire of a veshti, stood by as the booth was inaugurated by lighting the \'velakku\' (lamp), as a harbinger of goodwill and prosperity. Mr.Sivakumar, CEO of ICTACT, Tamil Nadu graced our booth and lit the lamp while Matthieu Lourdel Business Manager - Southeast Asia from Kickle was the guest of honor. To further mark our unique presence at the exhibition, we launched three new products - \'<a href=\"http://atnetindia.net/video-as-a-service/video-conferen\">Cloudline\'</a>, \'<a href=\"http://www.brickyard.education/\">Brickyard</a>\' and \'<a href=\"http://atnetindia.net/distribution/video-conference/video-conf-Kickle\">Kickle</a>\'.</span></p>', '2017-10-12', '1', 1, '2017-10-12 10:43:46', '2017-10-12 10:43:46'),
(31, 'Video Conference Systems: Capitalize on Cloud, Small Meeting Rooms', 'video-conference-systems-capitalize-on-cloud-small-meeting-rooms', '<p>Businesses and consumers have heard for decades that video calls are the next big thing, that their adoption is just around the corner and that everyone will use them. In reality, though, video conferencing adoption hasn\'t lived up to its hype. But maybe now video is ready for its close-up.</p>\r\n<p><span style=\"font-weight: 400;\">With the help of cloud technology and enhanced hardware, the availability of video conference systems has soared, while costs have tumbled. In other trends, businesses are deploying video conference systems in&nbsp;</span><span style=\"font-weight: 400;\">small meeting rooms</span><span style=\"font-weight: 400;\">&nbsp;and across desktops.</span></p>\r\n<p><span style=\"font-weight: 400;\">According to a recent Nemertes Research survey of 132 organizations, 64% of companies are using video conference systems in meeting rooms of all sizes. Nearly 30% are planning deployments this year, and just 5% have no video conferencing plans. Organizations that have deployed video conferencing have done so in at least half their meeting rooms.</span></p>\r\n<p><span style=\"font-weight: 400;\">Cloud-based video conference systems, in particular, have gathered steam. In 2016, 31% of organizations were using&nbsp;</span><span style=\"font-weight: 400;\">Cloud Video Conferencing</span><span style=\"font-weight: 400;\">. This year, that number jumped to 40%, with another 41% planning to use cloud video conferencing.&nbsp;&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">\"Video conferencing in the cloud has skyrocketed,\" said Irwin Lazar, a Nemertes analyst. \"Cloud has become the elixir that allows companies to rapidly expand video without having to make a huge capital investment upfront.\"</span></p>\r\n<p><strong>Measuring video deployment success</strong></p>\r\n<p><span style=\"font-weight: 400;\">Nemertes, a tech advisory firm based in Mokena, Ill., defines cloud video conferencing as&nbsp;</span><span style=\"font-weight: 400;\">Software as a Service</span><span style=\"font-weight: 400;\">&nbsp;that enables video interconnectivity.</span></p>\r\n<p><span style=\"font-weight: 400;\">Primarily, these cloud systems look to replace on-premises&nbsp;multipoint control&nbsp;units</span><span style=\"font-weight: 400;\">(MCUs)</span><span style=\"font-weight: 400;\">&nbsp;-- pieces of hardware that reside in organizations\' data centers. These meeting-based cloud services are designed to integrate with existing room systems.</span></p>\r\n<p><span style=\"font-weight: 400;\">Organizations using cloud video conference systems have higher success rates than those not using&nbsp;</span><span style=\"font-weight: 400;\">cloud services</span><span style=\"font-weight: 400;\">. Success is a self-rated metric, however, according to Nemertes. The research firm asks organizations how they measure success. Typically, organizations measure success via business value, employee adoption and reduction in travel.</span></p>\r\n<p><span style=\"font-weight: 400;\">Most businesses are using PC laptops or existing room systems as endpoints with their cloud services, according to the survey. With a cloud video provider, organizations can expand video rapidly to support </span><span style=\"font-weight: 400;\">dedicated room systems</span><span style=\"font-weight: 400;\">&nbsp;or PCs, and do so with usage-based billing and minimal upfront investment.</span></p>\r\n<p><strong>Video infiltrates small meeting rooms</strong></p>\r\n<p><span style=\"font-weight: 400;\">Nemertes found 64% of companies this year are increasing their video conferencing deployments in small meeting rooms that have five seats or fewer. That\'s a big increase from 2016 when only 32% of companies were increasing video conferencing in small rooms.</span></p>\r\n<p><span style=\"font-weight: 400;\">Organizations typically deploy video in small rooms in one of two ways. They buy a laptop or PC with a web camera, install software and don\'t really have to manage the device. This approach provides&nbsp;</span><span style=\"font-weight: 400;\">significant publicity</span><span style=\"font-weight: 400;\">, since organizations can run any app they want.</span></p>\r\n<p><span style=\"font-weight: 400;\">The other approach is a dedicated room system in which organizations outfit a room with a video screen, microphone and camera. Typically, these rooms are connected to a back-end service or MCU for multiparty conferencing.&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For the most part, organizations are picking a video conferencing provider and buying a dedicated room system, which translates to greater success. With a dedicated room system, organizations can take advantage of analytics and track usage of the video service. While dedicated systems might be more restrictive, they can ease management and implementation costs in an enterprise-wide deployment.</span></p>\r\n<p><span style=\"font-weight: 400;\">The laptop approach also encounters some problems. If a laptop is replaced, for example, the new laptop might not have the horsepower to run video. Some laptops could face antivirus issues; others may not have a&nbsp;WebRTC-e</span><span style=\"font-weight: 400;\">nabled&nbsp;browser&nbsp;</span><span style=\"font-weight: 400;\">or can\'t install a plug-in.</span></p>\r\n<p><strong>For success, deploy video to more desktops</strong></p>\r\n<p><span style=\"font-weight: 400;\">According to Nemertes, 65% of companies have rolled out desktop video conferencing -- but to less than 5% of their employee base. Just 5% of companies have rolled out desktop video to more than half of their employees, but this group also reported a higher success rate.</span></p>\r\n<p><span style=\"font-weight: 400;\">Nearly half of the organizations said they were increasing their&nbsp;desktop videos&nbsp;</span><span style=\"font-weight: 400;\">rollouts</span><span style=\"font-weight: 400;\">&nbsp;in 2017. The more organizations make video available, Lazar said, the more they feel their video initiative is delivering business value.</span></p>\r\n<p><span style=\"font-weight: 400;\">\"There\'s growing interest in video conferencing,\" Lazar said in a&nbsp;</span><span style=\"font-weight: 400;\">recent webinar</span><span style=\"font-weight: 400;\">. \"People are continuing to roll it out in increasing numbers. Those that have extended video to the desktop are seeing the greatest success.\"</span></p>\r\n<p><span style=\"font-weight: 400;\">So, what else is driving video conference systems? According to Nemertes, companies want to use video simply to improve the collaboration experience for people in different areas. If people are just on an&nbsp;</span><span style=\"font-weight: 400;\">audio bridge</span><span style=\"font-weight: 400;\">, they might lack engagement, Lazar said. But on a video call, participants see each other, which enhances meeting engagement.</span></p>\r\n<p><span style=\"font-weight: 400;\">Other key reasons for adoption include curbing travel, ease of use, employees demanding video and company mandates in which a senior-level executive requires the use of video.</span></p>\r\n<p><strong>Four keys to success</strong></p>\r\n<p><span style=\"font-weight: 400;\">Among survey participants, the ability to pair their smartphones with a video conference screen to initiate a session was the most important feature. Ease of deployment was also an important factor, but cost was not a top consideration.</span></p>\r\n<p><span style=\"font-weight: 400;\">\"People aren\'t making their video conferencing decisions primarily on who\'s the cheapest endpoint,\" Lazar said. \"They\'re looking at a variety of factors.\" Also low on the priority list is the ability to project content wirelessly from a laptop to a video screen. Users don\'t seem to mind plugging in an&nbsp;</span><span style=\"font-weight: 400;\">HDMI Cable</span><span style=\"font-weight: 400;\">&nbsp;to share their content.</span></p>\r\n<p><span style=\"font-weight: 400;\">Lazar offered four keys to video conferencing success:</span></p>\r\n<p><span style=\"font-weight: 400;\">Make video available on desktops.</span></p>\r\n<p><span style=\"font-weight: 400;\">Use dedicated room systems.</span></p>\r\n<p><span style=\"font-weight: 400;\">Take advantage of the cloud.</span></p>\r\n<p><span style=\"font-weight: 400;\">Work with a managed service provider that can support and troubleshoot video systems.</span></p>\r\n<p><span style=\"font-weight: 400;\">Finally, implement a program to encourage&nbsp;</span><span style=\"font-weight: 400;\">user adoption</span><span style=\"font-weight: 400;\">. If you roll out video to desktops and rooms, but don\'t sell users on the business value, you probably won\'t have much success. Ultimately, organizations should map the benefits of video conferencing to the way people work.</span></p>', '2017-10-17', '1', 0, '2017-11-09 13:18:54', '2017-11-09 13:18:54'),
(33, 'Exceptional images deserve an exceptional presentation-Infocomm', 'exceptional-images-deserve-an-exceptional-presentation-infocomm', '<p>&nbsp;Snapshots exclusively for you from Inauguration, crowd, product Demo at Infocomm from Day 1 to Day 3 at Infocomm India Mumbai.</p>\r\n<p><span style=\"font-weight: 400;\"><img style=\"float: left;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/1 - Copy 2.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/2 - Copy 1.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/3 - Copy 1.jpg\" width=\"293\" height=\"220\" /></span></p>\r\n<p><span style=\"font-weight: 400;\"><img style=\"float: left;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/4.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG_20170927_170129.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/6.jpeg\" width=\"293\" height=\"220\" /></span></p>\r\n<p><span style=\"font-weight: 400;\"><img style=\"float: left;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/7.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/9.jpg\" width=\"293\" height=\"220\" /></span></p>', '2017-11-21', '1', 1, '2017-11-21 07:06:40', '2017-11-21 07:06:40'),
(34, 'The power behind the photographs-Didac', 'the-power-behind-the-photographs-didac', '<p><strong>The power behind the photos-Didac</strong></p>\r\n<p>Visual presentation from Day 1 &nbsp;to Day 3 at Didac India in Mumbai</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"><img style=\"float: left;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/1 - Copy 3.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/2 - Copy 2.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/3 - Copy 4.jpg\" width=\"293\" height=\"220\" /></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/4 - Copy 1.jpg\" width=\"293\" height=\"220\" /><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/5.jpg\" width=\"293\" height=\"220\" /></strong></p>\r\n<p><strong><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/7 - Copy 1.jpg\" width=\"293\" height=\"220\" /><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/8 - Copy 1.jpg\" width=\"293\" height=\"220\" /><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/9 - Copy 1.jpg\" width=\"293\" height=\"220\" /></strong></p>\r\n<div class=\"clearfix\">&nbsp;</div>', '2017-11-21', '1', 1, '2017-11-21 07:55:11', '2017-11-21 07:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog_image`
--

CREATE TABLE `blog_image` (
  `id` int(255) NOT NULL,
  `blog_id` int(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_image`
--

INSERT INTO `blog_image` (`id`, `blog_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 11, '40f2a87a0ca20666ceb2bc271a0ef754.jpg', 1, '2017-08-10 10:24:51', '2017-08-10 10:24:51'),
(12, 15, '414b43df9f057a83b9996eedf0991027.png', 1, '2017-09-14 07:59:03', '2017-09-14 07:59:03'),
(13, 10, '390a1323d903d7def9697c9dac0f08c6.jpg', 1, '2017-09-14 08:05:16', '2017-09-14 08:05:16'),
(14, 10, '0793bfbf1f9c375dca099833f1a8d285.jpg', 1, '2017-09-14 08:05:16', '2017-09-14 08:05:16'),
(15, 10, '11d6c225afad2ceb1eca568389c08a2d.jpg', 1, '2017-09-14 08:05:16', '2017-09-14 08:05:16'),
(16, 12, '21720719a8e1fa03422a0ef0beba3fc2.JPG', 1, '2017-09-14 08:18:51', '2017-09-14 08:18:51'),
(17, 12, '79b090940910212cb027296f3cc32f2a.PNG', 1, '2017-09-14 08:18:52', '2017-09-14 08:18:52'),
(18, 12, '780f12f34d9af6c687608cfb4f69dd21.JPG', 1, '2017-09-14 08:18:53', '2017-09-14 08:18:53'),
(19, 17, '973969243455e10962b218cf2a375f66.jpg', 1, '2017-09-14 08:26:19', '2017-09-14 08:26:19'),
(21, 23, 'b18cb7790db28b2e45ee06092a617481.jpg', 1, '2017-09-14 12:53:52', '2017-09-14 12:53:52'),
(23, 3, '83523fb07e6bd1632e94d888b2933148.jpg', 1, '2017-09-15 07:48:11', '2017-09-15 07:48:11'),
(24, 4, 'c5e5369c606a5c905cc353561d89058e.jpg', 1, '2017-09-15 07:50:08', '2017-09-15 07:50:08'),
(25, 5, 'cdc774d4ea6ac0433fe6bfae546d2e9f.jpg', 1, '2017-09-15 08:09:09', '2017-09-15 08:09:09'),
(26, 6, 'c91d469bae287077ea37866ccc75df39.jpg', 1, '2017-09-15 08:14:12', '2017-09-15 08:14:12'),
(28, 2, 'dda9ff04073633a448b4429f5153596d.png', 1, '2017-09-15 08:16:29', '2017-09-15 08:16:29'),
(29, 1, '45c6b7e1abd787965a99e8ed8ac83f13.jpg', 1, '2017-09-15 08:18:13', '2017-09-15 08:18:13'),
(30, 7, '5bc1a804aa4a674bdce8b9bec027633d.jpg', 1, '2017-09-15 08:19:59', '2017-09-15 08:19:59'),
(31, 8, '9e8c858bd5b431bfb79ca3654e22685f.jpg', 1, '2017-09-15 08:22:27', '2017-09-15 08:22:27'),
(32, 9, '5b2504e1b5c02b88f400f68c1a10a7ba.jpg', 1, '2017-09-15 08:24:43', '2017-09-15 08:24:43'),
(33, 14, '123f2bffca267a3d853030785cbb2382.png', 1, '2017-09-15 08:27:30', '2017-09-15 08:27:30'),
(34, 16, '5bef0893d1f17c1c2440e231463e35f0.jpg', 1, '2017-09-15 09:21:18', '2017-09-15 09:21:18'),
(36, 20, '2d3d8dcbcb9a398a987d8a79736ee804.jpg', 1, '2017-09-15 09:30:57', '2017-09-15 09:30:57'),
(37, 21, '80d792209f28086d9d19dbda14c66631.jpg', 1, '2017-09-15 09:32:11', '2017-09-15 09:32:11'),
(38, 22, '71ffd06f3b9073ce91d362080a9d88fb.jpg', 1, '2017-09-15 09:33:49', '2017-09-15 09:33:49'),
(39, 26, '00f0a57fd011577f10940e9465cb624e.jpg', 1, '2017-09-18 05:00:01', '2017-09-18 05:00:01'),
(40, 28, '810267658650d824bead00ab7fc1a649.jpg', 1, '2017-09-18 05:06:04', '2017-09-18 05:06:04'),
(46, 30, '899318fda9d09d850121ed203c28ecbf.jpg', 1, '2017-10-12 10:43:46', '2017-10-12 10:43:46'),
(47, 31, '3049b9c77d9b9cf45d7a9ffecfe0ea11.jpg', 1, '2017-10-17 04:46:29', '2017-10-17 04:46:29'),
(50, 33, 'd2c2105a127e48b3b1ba01ef1f5d7dbd.jpg', 1, '2017-10-28 06:41:14', '2017-10-28 06:41:14'),
(52, 34, '63c15c9dad9e7c2b4465ecd59c466fa8.jpg', 1, '2017-11-21 07:55:11', '2017-11-21 07:55:11'),
(53, 29, '894db6f883ecee09e2a3a82c625336e9.png', 1, '2017-11-21 07:57:10', '2017-11-21 07:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `c_id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  `phoneno` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `yearofpass` varchar(20) NOT NULL,
  `major` varchar(100) NOT NULL,
  `marks_grade` varchar(30) NOT NULL,
  `uni_clg` varchar(150) NOT NULL,
  `graduation_yearofpass` varchar(20) NOT NULL,
  `graduation_major` varchar(100) NOT NULL,
  `graduation_marks_grade` varchar(30) NOT NULL,
  `graduation_clg` varchar(150) NOT NULL,
  `hs_yearofpass` varchar(20) NOT NULL,
  `hs_major` varchar(100) NOT NULL,
  `hs_marks_grade` varchar(30) NOT NULL,
  `hs_clg` varchar(150) NOT NULL,
  `sec_yearofpass` varchar(20) NOT NULL,
  `sec_major` varchar(100) NOT NULL,
  `sec_marks_grade` varchar(30) NOT NULL,
  `sec_clg` varchar(150) NOT NULL,
  `last_salary` varchar(30) NOT NULL,
  `last_ctc` varchar(40) NOT NULL,
  `travel_in` varchar(10) NOT NULL,
  `travel_out` varchar(10) NOT NULL,
  `relocate` varchar(10) NOT NULL,
  `relocate_country` varchar(10) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_occp` varchar(70) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `mother_occp` varchar(70) NOT NULL,
  `dependent` varchar(10) NOT NULL,
  `siblings` varchar(30) NOT NULL,
  `siblings_emp` varchar(100) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `spouse_emp_status` varchar(60) NOT NULL,
  `emp_status` varchar(55) NOT NULL,
  `salary_expected` varchar(60) NOT NULL,
  `notice_period` varchar(55) NOT NULL,
  `place` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`c_id`, `cname`, `address`, `phoneno`, `email`, `dob`, `age`, `yearofpass`, `major`, `marks_grade`, `uni_clg`, `graduation_yearofpass`, `graduation_major`, `graduation_marks_grade`, `graduation_clg`, `hs_yearofpass`, `hs_major`, `hs_marks_grade`, `hs_clg`, `sec_yearofpass`, `sec_major`, `sec_marks_grade`, `sec_clg`, `last_salary`, `last_ctc`, `travel_in`, `travel_out`, `relocate`, `relocate_country`, `father_name`, `father_occp`, `mother_name`, `mother_occp`, `dependent`, `siblings`, `siblings_emp`, `marital_status`, `spouse_name`, `spouse_emp_status`, `emp_status`, `salary_expected`, `notice_period`, `place`, `date`, `name`, `signature`, `created_at`, `updated_date`) VALUES
(11, 'Ranveer Singh Chauhan', 'india', '7595827171', 'ranveer77@hotmail.com', '17/12/1976', 'NaN', '2002', 'MBA-IT', '68', 'Symbiosis College', '2000', 'BCom-Marketing', '60', 'Wadia college', '1996', 'cbse 12th', '58', 'Daly college', '1994', 'cbse 10th', '58', 'Daly college', '15000', '3600000', 'yes', 'yes', 'yes', 'no', 'hemraj singh', 'NA', 'praitbha', 'housewife', 'no', '2', 'NA', 'yes', 'NA', 'NA', 'NA', 'as per industry standard', '20 days', 'india', '10/16/2017', 'ranveer', '5d2878b7002b697d10982def12ec9474.pdf', '2017-10-16 02:36:24', '2017-10-16 14:36:24'),
(12, 'KARTHICK G', '12/36 , Mookapillai Street , Thallakulam', '9790011542', 'gkarthickcse@gmail.com', '11/18/1992', '24', 'Nil', 'Nil', 'Nil', 'Nil', '2014', 'BE', '82', 'SIT', '2010', 'Hsc', '70', 'Mahatma School', '2008', 'Sslc', '89', 'APT DORAIRAJ SCHOOL', '3.8 LPA', '3.8LPA', 'yes', 'yes', 'yes', 'yes', 'Govindan', 'Business', 'Vasanthi', 'Home Maker', 'no', '1', 'Unemployment', 'Single', 'N/A', 'N/A', 'N/A', 'As per the industry standards', 'Immediate Joining', 'Madurai', '10/22/2017', 'Karthick', '5ebc9dad7e4dafa39567070ac11369fd.docx', '2017-10-22 08:15:11', '2017-10-22 08:15:11'),
(13, 'Abdul Rahman', '56, seethakathi Street, Virudhunagar', '9944710107', 'mr.abdulrahman16@gmail.com', '07/07/1986', '31', '2008', 'MBA FINANCE', '58', 'MKU', '2006', 'BBA', '54', 'MKU', '2003', 'Commerce', '81', 'Hakeem syed Mohammed Jr sec', '2001', 'Gen', '59', 'Private', '15000 +PM', '20000 PM', 'yes', 'no', 'no', 'no', 'Abdul Rasheed', 'Business', 'Wahitha Banu', 'Home Maker', 'no', 'Sister', 'Home Maker', 'Married', 'Thahira Banu', 'Home Maker', '0', '20000 +employer contributions', '30 Days', 'Virudhunagar', '10/30/2017', 'Abdul Rahman', '4619c0bffeec0d33a1a29dd3ebffa664.docx', '2017-10-30 03:00:48', '2017-10-30 03:00:48'),
(14, 'ramapandi', 'madurai', '9042244683', 'ramapandi8293@gmail.com', '08/02/1993', '24', 'no', 'no', 'no', 'no', '2014', 'BE', '73', 'SBM college of engineer', '2010', 'BIO-Maths', '69', 'NS School', '2008', 'state board', '73', 'MSHSS', '13000', '1.9 L', 'yes', 'yes', 'yes', 'no', 'Duraipandi', 'store keeper', 'Kayal', 'homemaker', 'yes', 'sister', 'married', 'single', 'no', 'no', 'no', '3.5 L per annum minimum', '45 days', 'Chennai', '11/01/2017', 'Ramapandi', '/tmp/php6FTH2t', '2017-11-01 05:45:39', '2017-11-01 17:45:39'),
(15, 'vijayasaraswathy .h', '9/13 bharathiyar 5th street ,s.s.colony madurai', '9843483648', 'vijus_anju@yahoo.co.in', '18/10/1980', '37', '2002', 'SOFTWARE', 'FIRST', 'APTECH', '2001', 'BBA', 'second', 'M.K.U', '1998', 'bio maths', '60%', 'girls school', '1995', 'bio', '60%', 'girls school', '26000', '3 LAKHS', 'no', 'no', 'no', 'no', 'S V NARYANASAMY', 'RTD HEADMASTER', 'R VISALAM', 'RTD teacher', 'no', '1', 'WORKING', 'MARRIED', 'K HARIHARAN', 'BUSINESS HEAD SOUTH', '7 LAKHS', '3.5  to 4 lakhs', '1 MONTH', 'madurai', '11/06/2017', 'vijayasaraswathy', '18be8853a0add1a74aaaa6529436bf70.png', '2017-11-06 05:42:58', '2017-11-06 05:42:58'),
(16, 'PRABHUKANNAN', 'H243,ELLISNAGAR', '9047452465', 'starhousingprabhu@gmail.com', '01/21/1975', '42', '2004', 'HISTORY', 'SECOND', 'MADURAI KAMARAJ UNIVERSITY', '1995', 'COMMERCE', 'FIRST', 'SOURASTRA COLLEGE', '1992', 'COMMERCE', 'FIRST', 'VELLIAMBALAM', '1990', 'NORMAL', 'FIRST', 'ST MARYS HR SEC SCHOOL', '25000', '3 LAKHS', 'yes', 'yes', 'yes', 'yes', 'JAYACHANDRAN', 'RETD CEO', 'TAMILTHAI', 'HOMEMAKER', 'no', '1', 'EMPLOYED', 'MARRIED', 'JEYALAKSHMI', 'GOVT TEACHER', '40000', '17000 MINIMUM', 'IMMEDIATELY', 'MADURAI', '11/06/2017', 'PRABHUKANNAN', '1e2f070985e2c9705b59cc5db91afacc.png', '2017-11-06 05:58:54', '2017-11-06 05:58:54'),
(17, 'naganathan', '2B/4, Sonai meena Nagar', '7904874548', 'nathan3258@gmail.com', '11/12/1984', '32', 'Nil', 'Nil', 'Nil', 'Nil', 'B.Com', 'Commerce', '60/A', 'P.K.N Arts and science college, Thirumangalam', '+2', 'Commerce', '60', 'P.K.N Matriculation Higher Sceondary school, Thirumangalam', '10', '-', '60', 'P.K.N Boys Higher Sceondary School, Thirumangalam', '18000', '240000', 'yes', 'yes', 'yes', 'no', 'Devadass', 'Business', 'Jeyalakshmi', 'House Wife', 'yes', '1', 'Married', 'Married', 'Manjula Devi', 'House Wife', 'Nil', '20000', '15 days', 'Madurai', '11/06/2017', 'Naganathan', '5a897838941cae524f2adc63ea1bd655.png', '2017-11-06 06:28:15', '2017-11-06 06:28:15'),
(18, 'D.Geetha', 'RC 9, Door No.6A, Gandhiji 1st Street, Thirunagar, Madurai - 6', '9894412221', 'geethaanandkumar13@gmail.com', '06/02/1978', '39', 'Nil', 'na', 'na', 'na', 'BBA, 1998', 'Financial Management, Financial Accounts, Business Management', '70', '1st Class', '1995', 'Maths, Accounts, Economcs & Commerce', '948', '79%', '1993', 'Maths, Science, Social', '374', '74%', '27000', '3,24,000', 'no', 'no', 'no', 'no', 'M.Dhanuskodi', 'Retired Bank Manager', 'D.GnanaSoundari', 'House Wife', 'no', '2', 'Teacher & House Wife', 'Married', 'S.Anand Kumar', 'Service Apartment', '2 L', '35000', '15 day', 'Madurai', '11/06/2017', 'D.Geetha', 'a679393174fd14aa259fea9a6c0441f7.jpg', '2017-11-06 10:13:18', '2017-11-06 10:13:18'),
(19, 'Ragini Kumar', 'Door.no.188,Rajathi illam,Harvipatty,Madurai-5', '9994049312', 'rk_ragini@yahoo.com', '11/29/1988', '28', '2009-11', 'HR/Finance', '68%', 'MKU/Sourashtra', '2009', 'Commerce', '58%', 'Mumbai University', '2006', 'Commerce', '55%', 'S.I.E.S', '2004', 'Common', '56%', 'S.I.E.S', 'I', 'NIL', 'yes', 'no', 'no', 'no', 'Kumar', 'Hotel Business', 'K.Rajathi', 'Home maker', 'no', '2', 'Business', 'Married', 'S.Anand Kumar', 'asst.parts manager', '15000', '12000', 'within 10 days', 'Madurai', '11/21/2017', 'Ragini Kumar', '2dae7258ab9f2ead690a53dc2c3a2258.png', '2017-11-21 05:25:21', '2017-11-21 05:25:21'),
(20, 'Pradeepa Yalini', '24, Sri Meenakshi Nagar, P & TNagar', '9786281843', 'spradeepayalini@gmail.com', '12/21/1984', '32', '2010', 'MBA Financeand Systems', 'CGPA 8.34', 'Avinashilingam University', '2006', 'B E Computer Science', '73%', 'PSY Engg College', '2002', 'Biology Maths', '81%', 'Noyes Matric Hr.Sec Schol', '2000', 'All Subjects', '75%', 'YWCA Matric Hr.Sec. School', '19082', '21518', 'no', 'no', 'no', 'no', 'P Selvaraj', 'Doctor', 'S Poongothai', 'Housewife', 'no', '2', 'Employed', 'MARRIED', 'Saravanan', 'Employed', '70000', '19000 is my expectation but can accept 17000 if negotiated', 'Immediate Joining', 'Madurai', '11/21/2017', 'Pradeepa Yalini', '008fadc88a8cbba8531338b35d4fbd16.jpg', '2017-11-21 06:56:09', '2017-11-21 06:56:09'),
(21, 'Sangita', 'B3 Sharan towers 24 Gokhale Road', '9442704300', 'sangita@atnetindia.net', '01/03/1968', '49', 'NIL', 'NIL', 'NIL', 'NIL', '1989', 'Hotel Management', '78%', 'HMCTAn College,Dadar,Mumbai', '1985', 'COMMERCE', '68%', 'Dalmia College', '1983', 'All Subjects', '69%', 'Gopalji Hemraj Hr.Sec School', '10000', '12000', 'no', 'no', 'no', 'no', 'Bharatkumar Solanki', 'Retired', 'Geeta Solanki', 'Housewife', 'no', '1', 'Housewife', 'MARRIED', 'Ashwin R Desai', 'Managing Director', 'A & T Video Networks Pvt Ltd', '25000', 'Immediate', 'Madurai', '11/21/2017', 'Sangita Desai', 'bbfa90f8cb5a183508dc06f00cc5abbc.jpg', '2017-11-21 07:12:00', '2017-11-21 07:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `career_contact`
--

CREATE TABLE `career_contact` (
  `cont_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `related_person` varchar(100) NOT NULL,
  `related_cnumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_contact`
--

INSERT INTO `career_contact` (`cont_id`, `career_id`, `related_person`, `related_cnumber`) VALUES
(8, 11, 'NA', 'NA'),
(9, 11, 'NA', 'NA'),
(10, 12, 'Priya', '9791886104'),
(11, 13, 'Mr. Natarajan', '9944427413'),
(12, 15, 'Mr.vinod kumar', '00971567315644'),
(13, 15, 'Ms suganya mohan', '9626499887'),
(14, 16, 'BALAMURUGAN', '9941808070'),
(15, 16, 'CHEHIAN', '9843052668'),
(16, 17, 'Smart Jobs', '7373993339'),
(17, 18, 'Mr.Paul Solomon -', '9941006677'),
(18, 18, 'Mrs.Indira Gandhi', '9443474743'),
(19, 19, 'Mr.', '111111111'),
(20, 19, '', ''),
(21, 20, 'M Balasubramanium', '9940036358'),
(22, 21, 'Rajesh Desai', '9842126950');

-- --------------------------------------------------------

--
-- Table structure for table `career_dependant`
--

CREATE TABLE `career_dependant` (
  `dep_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_age` varchar(30) NOT NULL,
  `child_school` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_dependant`
--

INSERT INTO `career_dependant` (`dep_id`, `career_id`, `child_name`, `child_age`, `child_school`) VALUES
(9, 11, 'NA', 'NA', 'NA'),
(10, 11, 'NA', '', ''),
(11, 12, 'N/A', 'N/A', 'N/A'),
(12, 13, 'Mohammed Imran', '2', 'He is child'),
(13, 15, 'H NIRANJANA', '12', 'TVS'),
(14, 15, 'H SAHANA', '6', 'TVS'),
(15, 16, 'P.SIVASANKAR', '13', 'SPARKS VIDYALAYA'),
(16, 16, 'P.SAIRAKSHITH', '4', 'ST.JOHNS HR SEC SCHOOL'),
(17, 17, 'Lakshana Shri', '6', 'Maharishi Vidhya Mandhir School'),
(18, 18, 'A.Varsha', '11', 'TVS'),
(19, 18, 'A.Ganesh', '8', 'TVS'),
(20, 19, 'A.Shakthi', '4 Yrs', 'Amritha vidyalaya'),
(21, 19, 'A.Sarveshwar', '1 Yr', ''),
(22, 20, 'Akshanth', '5', 'Jain Vidyalaya'),
(23, 21, 'Drishti Desai', '21', 'Srishti College of Arts, Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `career_project`
--

CREATE TABLE `career_project` (
  `proj_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_project`
--

INSERT INTO `career_project` (`proj_id`, `career_id`, `company`, `description`) VALUES
(15, 11, 'solution middleast', 'VMare certified'),
(16, 11, 'solution middleast', 'Citrix certified'),
(17, 11, 'taxan gulf', 'Lifesize sales certfied'),
(18, 11, 'taxan gulf', 'Clearone spontania sales certified'),
(19, 12, 'IBM', 'Sears & Kmart and Gates'),
(20, 12, '3i infotech', 'Hosting'),
(21, 13, 'Nil', 'Nil'),
(22, 13, 'Nil', 'Nil'),
(23, 13, 'Nil', 'Nil'),
(24, 13, 'Nil', 'Nil'),
(25, 15, '--', '-'),
(26, 15, '--', ''),
(27, 15, '--', ''),
(28, 15, '--', ''),
(29, 16, 'NEST BUILDERS', 'CONSTRUCTION'),
(30, 17, 'Nil', 'Nil'),
(31, 18, 'Tally', 'Tally Version 5.4'),
(32, 18, 'Nil', 'nil'),
(33, 18, 'nil', 'nil'),
(34, 18, 'nil', 'nil'),
(35, 19, 'NIL', 'NIL'),
(36, 20, 'Shakthi Sugars', 'Production Plan'),
(37, 21, 'Leela Kempinski', 'Kitchen Management');

-- --------------------------------------------------------

--
-- Table structure for table `career_work_exp`
--

CREATE TABLE `career_work_exp` (
  `exp_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `periodofservice` varchar(100) NOT NULL,
  `location` varchar(70) NOT NULL,
  `natureofjob` varchar(255) NOT NULL,
  `salary_drawn` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_work_exp`
--

INSERT INTO `career_work_exp` (`exp_id`, `career_id`, `company`, `description`, `periodofservice`, `location`, `natureofjob`, `salary_drawn`) VALUES
(16, 11, 'Mindstec', 'Regional SalesManager', '2015-2017', 'Dubai', 'Sales', '15000'),
(17, 11, 'Taxan gulf', 'Regional Channel Sales Manager', '2013-2015', 'Dubai', 'Sales', ''),
(18, 11, 'Solution Middleeast', 'Product manager', '2009-2013', 'Dubai', 'Sales', ''),
(19, 12, 'IBM', 'Associate Technical Enginner', '2015-2016', 'Chennai', 'LEVEL 1 SYSTEM ADMINSTRATION', '3LPA'),
(20, 12, '3i Infotech', 'System Engineer', '2016-2017', 'Chennai', 'L2/L3 System Engineer', '3.8LPA'),
(21, 13, 'Deepak Padman Impex Pvt Ltd', 'Senior accountant ', 'Aug 2016 to Present', 'Sivakasi', 'Supervise and manage company accounts', '15000 +'),
(22, 13, 'ICAND Software PvtL', 'Accountant ', 'Jan 2013 to Aug 2016', 'Virudhunagar', 'Maintain accounts end to end', '11500'),
(23, 13, 'Vijayamani Contractors Pvt Ltd', '\r\nAccounts\r\nAssistant ', 'June 2008 to Dec 2013', 'Madurai', 'Maintained site accounts', ''),
(24, 14, 'fourth dimension', 'fourth dimension', '2014-still', 'chennai', 'Network engineer', '6000'),
(25, 14, 'fourth dimension', 'fourth dimension', '2014-2017', 'Chennai', 'Network engineer', '6000'),
(26, 14, 'fourth dimension', 'fourth dimension', '2014-2017', 'chennai', 'Network engineer', '6000'),
(27, 14, 'fourth dimension', 'fourth dimension', '2014-2017', 'chennai', 'Network engineer', '6000'),
(28, 15, 'oman insurance', 'branch operations', '2014-2016', 'dubai', 'insurance', '1 lac'),
(29, 15, 'fgb', 'customer service team leader', '2012-2014', 'dubai', 'Insurance', '70 k'),
(30, 15, 'fgb2', 'customer service team handling', '2011-2012', 'dubai', 'credit card/insurance', '60k'),
(31, 15, 'ssl', 'asst manager', '2007 -2009', 'madurai', 'handling whole branch customer service sales', '10 k'),
(32, 16, 'NEST BUILDERS', 'ACCOUNTS MANAGER', '2012', 'KK NAGAR', 'ACCOUNTING & FINANCE MANAGEMENT', '25000'),
(33, 16, 'ADVANCE SCREEDING LLC', 'ACCOUNTS MANAGER', '2008', '2012', 'ACCOUNTS & MAINTAIN HEAD OFFICE ACCOUNTS', '156000'),
(34, 17, 'Pharma Frenc Pharmaceuticals India Pvt Ltd', 'Asst. Accountant', '2008 to 2013', 'Baddi, Himachal Pradesh', 'Financial Accounting', '10000'),
(35, 17, 'Logon India Infrastructure Pvt Ltd', 'Asst. Accountant', '2013 to 2017', 'Pune, Maharastra', 'Financial Accounting', '18000'),
(36, 18, 'AAPL Infra Pvt.Ltd', 'CRM &HR', 'July 2016 til till date', 'Vilachery, Madurai', 'Executing Projects of Existing Clients, Sourcing Candidates from Job Sites', '27000 per month'),
(37, 18, 'Apollo Computer Education Ltd', 'Branch Incharge', 'April 2008 to June 2016', 'Thirunagar, Madurai', 'Responsible for Overall Turnover + daily Syllabus for all courses', '25000'),
(38, 18, 'Airtel', 'Customer Care Officer', '2002 to 2004', 'Simmakkal, Madurai', 'CAF, Cash', '6000'),
(39, 18, 'ARAS', 'Branch Incharge', '2001 to 2002', 'Madurai', 'Accounts & Branch Sales', '4000'),
(40, 19, 'NIL', 'NIL', 'NIL', 'NIL', 'NIL', 'NIL'),
(41, 20, 'Vaighai Agro Prod.', 'International trader', 'Feb 2016-Nov 2016', 'Madurai', 'Marketing', '19082'),
(42, 20, 'Aurolab', 'Business development Executive', 'Dec 2013- Sept 2015', 'Madurai', 'Marketing', '162332'),
(43, 21, 'HINDU', 'Resource person', '2009-2011', 'Madurai', 'Softskills develpment', '10000'),
(44, 21, 'Searock Sheraton', 'Housekeeping executive', '1991-92', 'Mumbai', 'Housekeeping adminstartion', '8000'),
(45, 21, 'Taj Mahal Group of Hotels', 'Chef trainee', '1989-90', 'Mumbai', 'Kitchen Management', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-InActive, 1-Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent`, `position`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Expertise', 'expertise', 0, NULL, 1, '2017-06-15 03:41:19', '2017-06-23 06:42:38'),
(2, 'What we do', 'what-we-do', 0, NULL, 1, '2017-06-15 04:41:19', '2017-06-27 08:16:22'),
(3, 'Partners', 'partners', 0, NULL, 1, '2017-06-15 04:41:19', '2017-06-20 06:08:36'),
(4, 'Industries', 'industries', 0, NULL, 1, '2017-06-23 07:14:03', NULL),
(5, 'Video Conferencing', 'video-conferencing', 1, NULL, 1, '2017-06-23 07:17:13', NULL),
(6, 'Virtual Classroom', 'virtual-classroom', 1, NULL, 1, '2017-06-23 07:17:41', NULL),
(7, 'Surgery Recording', 'surgery-recording', 1, NULL, 1, '2017-06-23 07:17:41', NULL),
(8, 'Video Streaming', 'video-streaming', 1, NULL, 1, '2017-06-23 07:18:11', NULL),
(9, 'eLearning', 'eLearning', 1, NULL, 1, '2017-06-23 07:18:11', NULL),
(10, 'Telemedicine', 'telemedicine', 1, NULL, 1, '2017-06-23 07:18:35', NULL),
(13, 'Distribution', 'distribution', 2, '1', 1, '2017-06-23 07:21:03', '2017-09-06 07:15:07'),
(14, 'Software', 'software', 2, '3', 1, '2017-06-23 07:21:03', '2017-09-01 11:26:42'),
(15, 'Video as a Service', 'video-as-a-service', 2, '2', 1, '2017-06-23 07:21:13', '2017-09-01 11:26:53'),
(26, 'Video Conferencing', 'video-conferencing', 13, NULL, 1, '2017-06-23 03:26:21', '2017-06-23 03:26:21'),
(33, 'Lecture Capture', 'lecture-capture', 14, '1', 1, '2017-06-23 03:27:38', '2017-10-05 13:23:25'),
(35, 'Custom Software Integration', 'custom-software-integration', 14, '4', 1, '2017-06-23 03:27:56', '2017-10-05 13:23:38'),
(36, 'Video Conferencing', 'video-conferencing', 15, NULL, 1, '2017-06-23 03:28:09', '2017-06-23 03:28:09'),
(37, 'Video Streaming', 'video-streaming', 15, NULL, 1, '2017-06-23 03:28:20', '2017-06-23 03:28:20'),
(38, 'Tele medicine Network', 'tele-medicine-network', 15, NULL, 1, '2017-06-23 03:28:29', '2017-07-04 07:18:50'),
(40, 'Partnerships', 'partnerships', 3, NULL, 1, '2017-06-23 03:32:12', '2017-06-23 03:32:12'),
(41, 'Value Added Services', 'value-added-services', 3, NULL, 1, '2017-06-23 03:32:27', '2017-06-23 03:32:27'),
(42, 'Partner Portal', 'partner-portal', 3, NULL, 1, '2017-06-23 03:32:41', '2017-06-23 03:32:41'),
(43, 'Education', 'education', 4, NULL, 1, '2017-06-23 03:33:00', '2017-06-23 03:33:00'),
(44, 'Healthcare', 'healthcare', 4, NULL, 1, '2017-06-23 03:33:12', '2017-06-23 03:33:12'),
(45, 'Enterprise', 'enterprise', 4, NULL, 1, '2017-06-23 03:34:40', '2017-06-23 03:34:40'),
(46, 'Government', 'government', 4, NULL, 1, '2017-06-23 03:34:51', '2017-06-23 03:34:51'),
(47, 'Hotels', 'hotels', 4, NULL, 1, '2017-06-23 03:35:00', '2017-06-23 03:35:00'),
(48, 'Infra & Retail', 'infra-retail', 4, NULL, 1, '2017-06-23 03:35:16', '2017-06-23 03:35:16'),
(49, 'Smart Classroom', 'smart-classroom', 43, NULL, 1, '2017-06-23 03:35:33', '2017-06-23 03:35:33'),
(50, 'Virtual Classroom', 'virtual-classroom', 43, NULL, 1, '2017-06-23 03:35:43', '2017-06-23 03:35:43'),
(51, 'Lecture Capture - Digital Library', 'lecture-capture-digital-library', 43, NULL, 1, '2017-06-23 03:35:52', '2017-08-08 05:51:32'),
(52, 'eLearning - Distance Education', 'elearning-distance-education', 43, NULL, 1, '2017-06-23 03:36:04', '2017-08-08 05:52:12'),
(53, 'Performance Capture System', 'performance-capture-system', 43, NULL, 1, '2017-06-23 03:36:17', '2017-06-23 03:36:17'),
(54, 'Surveilllance', 'surveilllance', 43, NULL, 1, '2017-06-23 03:36:31', '2017-06-23 03:36:31'),
(55, 'Network Security ', 'network-security', 43, NULL, 1, '2017-06-23 03:36:41', '2017-06-23 03:36:41'),
(56, 'Wireless Campus', 'wireless-campus', 43, NULL, 1, '2017-06-23 03:36:56', '2017-06-23 03:36:56'),
(57, 'Telemedicine', 'telemedicine', 44, NULL, 1, '2017-06-23 03:37:10', '2017-06-23 03:37:10'),
(58, 'Surgery Recording', 'surgery-recording', 44, NULL, 1, '2017-06-23 03:37:22', '2017-06-23 03:37:22'),
(59, 'ICU Interaction', 'icu-interaction', 44, NULL, 1, '2017-06-23 03:37:40', '2017-06-23 03:37:40'),
(60, 'Ambulance Video system', 'ambulance-video-system', 44, NULL, 1, '2017-06-23 03:37:51', '2017-06-23 03:37:51'),
(61, 'Surveillance', 'surveillance', 44, NULL, 1, '2017-06-23 03:38:01', '2017-06-23 03:38:01'),
(62, 'Patient Information Display System', 'patient-information-display-system', 44, NULL, 1, '2017-06-23 03:38:13', '2017-06-23 03:38:13'),
(64, 'Board Room - AV', 'board-room-av', 45, NULL, 1, '2017-06-23 03:38:37', '2017-06-23 03:38:37'),
(65, 'Small Conference / Huddle Rooms', 'small-conference-huddle-rooms', 45, NULL, 1, '2017-06-23 03:38:48', '2017-06-23 03:38:48'),
(66, 'Mobility Conferencing', 'mobility-conferencing', 45, NULL, 1, '2017-06-23 03:38:57', '2017-06-23 03:38:57'),
(67, 'Digital Training', 'digital-training', 45, NULL, 1, '2017-06-23 03:39:06', '2017-06-23 03:39:06'),
(68, 'Board Room - AV', 'board-room-av', 46, NULL, 1, '2017-06-23 03:39:17', '2017-06-23 03:39:17'),
(69, 'Small Conference / Huddle Rooms', 'small-conference-huddle-rooms', 46, NULL, 1, '2017-06-23 03:39:28', '2017-06-23 03:39:28'),
(70, 'Information Display Systems Signage', 'information-display-systems-signage', 46, NULL, 1, '2017-06-23 03:39:40', '2017-06-23 03:39:40'),
(71, 'Wired Network', 'wired-network', 46, NULL, 1, '2017-06-23 03:39:59', '2017-06-23 03:39:59'),
(72, 'Wireless Network', 'wireless-network', 46, NULL, 1, '2017-06-23 03:40:12', '2017-06-23 03:40:12'),
(73, 'Surveilllance', 'surveilllance', 46, NULL, 1, '2017-06-23 03:40:22', '2017-06-23 03:40:22'),
(74, 'Network Security', 'network-security', 46, NULL, 1, '2017-06-23 03:40:36', '2017-06-23 03:40:36'),
(76, 'Conference Rooms', 'conference-rooms', 47, NULL, 1, '2017-06-23 03:41:06', '2017-06-23 03:41:06'),
(77, 'Auditoriums', 'auditoriums', 47, NULL, 1, '2017-06-23 03:41:17', '2017-06-23 03:41:17'),
(78, 'Surveilllance', 'surveilllance', 47, NULL, 1, '2017-06-23 03:41:28', '2017-06-23 03:41:28'),
(79, 'Guest Information Display System', 'guest-information-display-system', 47, NULL, 1, '2017-06-23 03:41:37', '2017-06-23 03:41:37'),
(80, 'Wireless Hotpot', 'wireless-hotpot', 47, NULL, 1, '2017-06-23 03:41:48', '2017-06-23 04:15:52'),
(81, 'Railways', 'railways', 48, NULL, 1, '2017-06-23 03:43:41', '2017-06-23 03:43:41'),
(82, 'Airports', 'airports', 48, NULL, 1, '2017-06-23 03:43:52', '2017-06-23 03:43:52'),
(89, 'Tele education Network', 'tele-education-network', 15, NULL, 1, '2017-07-04 07:18:36', '2017-07-04 07:18:36'),
(102, 'Retail', 'retail', 48, NULL, 1, '2017-08-02 06:48:43', '2017-08-02 06:48:43'),
(103, 'Jewellery Showrooms', 'jewellery-showrooms', 102, NULL, 1, '2017-08-02 06:49:46', '2017-08-02 06:49:46'),
(104, 'Garment', 'garment', 102, NULL, 1, '2017-08-02 06:50:11', '2017-08-02 06:50:11'),
(105, 'Boutique', 'boutique', 102, NULL, 1, '2017-08-02 06:50:23', '2017-08-02 06:50:23'),
(106, 'Media', 'media', 48, NULL, 1, '2017-08-02 06:50:48', '2017-08-02 06:50:48'),
(107, 'Live Video Call Back', 'live-video-call-back', 106, NULL, 1, '2017-08-02 06:51:11', '2017-08-02 06:51:11'),
(108, 'Internet', 'internet', 106, NULL, 1, '2017-08-02 06:51:36', '2017-08-02 06:51:36'),
(125, 'Video Streaming', 'video-streaming', 13, NULL, 1, '2017-08-04 07:45:32', '2017-08-04 07:45:32'),
(129, 'Video Recording', 'video-recording', 13, NULL, 1, '2017-08-04 07:46:36', '2017-08-04 07:46:36'),
(130, 'Video Cameras', 'video-cameras', 13, NULL, 1, '2017-08-04 07:51:44', '2017-08-04 07:51:44'),
(131, 'Related Equipments', 'related-equipments', 13, NULL, 1, '2017-08-04 07:52:06', '2017-08-04 07:52:06'),
(132, 'Audio Microphones', 'audio-microphones', 131, NULL, 1, '2017-08-08 11:08:19', '2017-08-08 11:08:19'),
(133, 'Visualisers', 'visualisers', 131, NULL, 1, '2017-08-08 12:50:42', '2017-08-08 12:50:42'),
(139, 'Technical Services', 'technical-services', 2, '4', 1, '2017-09-04 06:45:03', '2017-09-06 07:19:35'),
(140, 'Onsite Technical Support', 'onsite-technical-support', 139, '3', 1, '2017-09-04 06:49:43', '2017-09-04 10:26:17'),
(141, 'Networked AV Trainng', 'networked-av-trainng', 139, '4', 1, '2017-09-04 06:50:04', '2017-09-04 10:26:03'),
(142, 'Systems Integration', 'systems-integration', 139, '2', 1, '2017-09-04 07:55:18', '2017-09-04 10:25:46'),
(143, 'ICT & AV Design', 'ict-av-design', 139, '1', 1, '2017-09-04 08:10:57', '2017-09-04 10:25:27'),
(144, 'ICT & AV Design', 'ict-av-design', 2, NULL, 1, '2017-09-04 14:24:58', '2017-09-04 14:24:58'),
(145, 'E-Learning', 'e-learning', 14, '2', 1, '2017-10-05 10:05:04', '2017-10-05 13:23:53'),
(146, 'Virtual Learning', 'virtual-learning', 14, '3', 1, '2017-10-05 10:05:33', '2017-10-05 13:24:09'),
(147, 'Video Conferencing', 'video-conf', 26, '', 1, '2017-10-05 12:50:07', '2017-10-05 12:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `cat_id` bigint(12) DEFAULT NULL,
  `parent` int(20) DEFAULT NULL,
  `page_type` varchar(255) NOT NULL,
  `short_desc` text,
  `content` text,
  `footer_title` varchar(150) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `page_link` varchar(255) DEFAULT NULL,
  `page_linktype` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text,
  `seo_keywords` text,
  `columns` varchar(55) DEFAULT NULL,
  `position` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Y-Active,N-Inactive',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `slug`, `cat_id`, `parent`, `page_type`, `short_desc`, `content`, `footer_title`, `image`, `page_link`, `page_linktype`, `seo_title`, `seo_description`, `seo_keywords`, `columns`, `position`, `status`, `updated_at`, `created_at`) VALUES
(1, 'video-conferencing', 5, 1, 'content', '20 years – 2000 unique customers ', '<p class=\"line-h-26\">The core technology used in a video conferencing (VC) system is digital compression of audio and video streams in real time. The hardware or software that performs compression is called a codec (coder/decoder). Compression rates of up to 1:500 can be achieved. The resulting digital stream of 1\'s and 0\'s is subdivided into labelled packets, which are then transmitted through a digital network of some kind (usually ISDN or IP). The use of audio modems in the transmission line allow for the use of POTS, or the plain telephony network in some low-speed applications, such as video telephony, because they convert the digital pulses to/from analog waves in the audio spectrum range.</p>\r\n<p>The other components required for a VC system include:</p>\r\n<ul class=\"pagecontent\">\r\n<li>video input : video camera or webcam</li>\r\n<li>video output : computer monitor or television</li>\r\n<li>audio input : microphones</li>\r\n<li>audio output : usually loudspeakers associated with the display device or telephone</li>\r\n<li>data transfer : analog or digital telephone network, LAN or Internet</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Basic kinds of VC systems and Standards.</p>\r\n<p>Applications of Video Conferencing</p>\r\n<p>Why ISDN Video Conferencing better than Internet based VC?</p>\r\n<p class=\"mt-3 font-blue font-16\"><strong>Life Size :</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>LifeSize Products supports dozens of resolutions to ensure interoperability with standards based HD and SD endpoints</li>\r\n<li>Spatial Resolutions is &gt;200 and whereas with other players it is only 9.</li>\r\n<li>Lifesize Products offer Virtual Multiway Layout that lets users select custom layouts of multiple images on one display</li>\r\n<li>Lifesize Products is 20% size of other players making it easier to deploy</li>\r\n<li>Datasharing and XGA(for Presentation sharing) pricing included in the Lifesize product price itself and other players offers it as optional features.</li>\r\n<li>LifeSize Products automatically adjust resolution as bandwidth decreases while maintaining frame rate for the best experience</li>\r\n</ul>\r\n<p class=\"line-h-26 font-blue font-16 mt-3\"><strong>Why Lifesize?</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>Pioneer in High Definition Video conferencing</li>\r\n<li>First High Definition Video conferencing and 1080p support</li>\r\n<li>Leader in HD video communications: delivered world&rsquo;s first HD video products</li>\r\n<li>More than 15,000 unique customers in over 100 countries</li>\r\n<li>Founded in 2003 by industry veterans</li>\r\n<li>Product Excellence</li>\r\n<li>LifeSize is a division of Logitech a leader in PC video communication.</li>\r\n<li>Easy Installation with User friendly GUI</li>\r\n<li>In Multi conferencing also maintaining full HD 1080p resolution</li>\r\n<li>Range of product and can select based on the specific requirement</li>\r\n<li>First HD video conferencing which is officially Microsoft&reg; qualified with Microsoft&reg; Office</li>\r\n<li>Communications Server 2007 R2 &nbsp;&nbsp;</li>\r\n</ul>', '', '9b8b3085c0117d8be483728697767c69.png', '', '', '', '', '', '', 0, 'Y', '2017-08-18 05:01:39', '2017-06-23 11:38:40'),
(2, 'virtual-classroom', 6, 1, 'content', 'More than 450 classrooms & seminar halls', '<p>Education institutions today need external resources, experts, and guests to deliver lectures and special addresses to enable the students gain vital indepth knowedge and exposure. Sometimes, lectures can be delivered to multiple classrooms from one classroom within a campus to accomodate many students to benefit. Classrooms can be enabled with Video conferencing technology poperly integrated with audio systems to attain this objective.</p>\r\n<p>From a simple system consisting of software based video conferencing and mics, displays and speakers to a state of the art dedicted hardware Video conferencing system with automated Control System, Motion and Voice based auto tracking features suitable for large classrooms / seminar halls / auditorium, a virtual classroom system can enable receiving and interacting lectures from remote lecturers or within multiple classrooms in a campus.</p>\r\n<p>The System can be designed with dedicated hardware video conferencing system or On Premise based software system. Cloudline Cloud based multi site video conferencing service enables a hybrid deployment on Premise as well as Cloud.</p>\r\n<p>The automated control system benefits the lecturer to control all equipments from a touch panel on the Digital Podium. The affordably designed Digital Podium is functionally effective. The auto tracking system enables focussing, Tracking, Displaying and Transmitting Lecturers movement on the dais as well as Students\' interaction with the lecturer.</p>\r\n<p>The virtual classroom sessions could also be enhanced to a lecture capture and streaming system.</p>', '', '7087a55e6bea12249372df99f89ad4aa.png', '', '', '', '', '', '', 0, 'Y', '2017-11-18 07:10:04', '2017-06-23 11:40:52'),
(3, 'surgery-recording1', 7, 1, 'content', 'VOTIS – India’s First Surgery Recording & Broadcasting Product\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '', '42861a13504d2bf681dcc6468099e300.png', '', '', '', '', '', '', 0, 'Y', '2017-08-31 14:26:11', '2017-06-23 12:08:55'),
(4, 'video-streaming', 8, 1, 'content', 'Streaming technology optimized for IP networks since 2007', '<p class=\"text-justify line-h-26\">Streaming media is media that is consumed (read, heard, viewed) while it is being delivered. Streaming is more a property of the delivery system than the media itself. The distinction is usually applied to media that are distributed over computer networks; most other delivery systems are either inherently streaming (radio, television) or inherently non-streaming (books, video cassettes, audio CDs).</p>\r\n<p class=\"text-justify line-h-26\">The word \'stream\' is also used as a verb, meaning to deliver streaming media. The difference between Video Conferencing and Video streaming in simple terms is that Video conferencing is a two way and multiway collaboration of audio, video and data, whereas streaming is a one way delivery of audio, video and data. Ofcourse the return path can be a data chat mode in a streaming application.</p>\r\n<p class=\"text-justify line-h-26\">The big challenge in Video conferencing application is the high bandwidth requirement at the central Multi Conference Server which will be twice the number of users connected multiplied by the bandwidth at which the conference is taking place and hence the reachability is limited based on the available bandwidth on the unicast mode.</p>\r\n<p class=\"text-justify line-h-26\">In Streaming, over a multicast network, only the bandwidth at which the stream is captured is used irrespective of the number of users who receive the stream. Over the unicast mode, the bandwidth required would be equal to the number of users multiplied by the bandwidth at which the stream is being captured.</p>\r\n<p class=\"text-justify line-h-26 font-16 font-blue\"><strong>Live &amp; On Demand Streaming</strong></p>\r\n<p class=\"text-justify line-h-26\">The Streaming technology allows to stream LIVE sessions of any audio+Video+ data files. These can also be stored and streamed later ON DEMAND whenever the user wants anytime over any network to any devices like media players, laptops, mobile, etc.</p>\r\n<p class=\"text-justify line-h-26 font-16 font-blue\"><strong>Protocol Issue </strong></p>\r\n<p class=\"text-justify line-h-26\">Designing a network protocol to support streaming media raises many issues. Datagram protocols, such as the User Datagram Protocol (UDP), send the media stream as a series of small packets. This is simple and efficient; however, packets are liable to be lost or corrupted in transit. Depending on the protocol and the extent of the loss, the client may be able to recover the data with error correction techniques, may interpolate over the missing data, or may suffer a dropout.</p>\r\n<p class=\"text-justify line-h-26\">Designing a network protocol to support streaming media raises many issues. Datagram protocols, such as the User Datagram Protocol (UDP), send the media stream as a series of small packets. This is simple and efficient; however, packets are liable to be lost or corrupted in transit. Depending on the protocol and the extent of the loss, the client may be able to recover the data with error correction techniques, may interpolate over the missing data, or may suffer a dropout.</p>\r\n<p class=\"text-justify line-h-26\">The Real Time Streaming Protocol (RTSP), Real-time Transport Protocol (RTP) and the Real-time Transport Control Protocol (RTCP) were specifically designed to stream media over networks. The latter two are built on top of UDP.</p>\r\n<p class=\"text-justify line-h-26\">Reliable protocols, such as the Transmission Control Protocol (TCP), guarantee correct delivery of each bit in the media stream. However, they accomplish this with a system of timeouts and retries, which makes them more complex to implement. It also means that when there is data loss on the network, the media stream stalls while the protocol handlers detect the loss and retransmit the missing data. Clients can minimize the effect of this by buffering data for display.</p>\r\n<p class=\"text-justify line-h-26\">Hence when designing a streaming applciation, knowledge of Networks design, Quality of service over IP network, and the multimedia capturing tools &ndash; audio, video, data &ndash; are essential to deliver a smooth media stream.</p>\r\n<p class=\"text-justify line-h-26\">Applications of multi media streaming are primarily in Education, Healthcare, Corporate training, and Media organisations.</p>', '', 'b3c3ee080b1f00b48ea11d3dc7fffb41.png', '', '', '', '', '', '', 0, 'Y', '2017-07-19 07:55:03', '2017-06-23 12:09:42'),
(5, 'elearning', 9, 1, 'content', 'Comprehensive Virtual Digital Learning platform ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '', 'dba2efb49870984fc74807ef1982c47b.png', '', '', '', '', '', '', 0, 'Y', '2017-07-19 07:56:45', '2017-06-23 12:10:44'),
(6, 'telemedicine', 10, 1, 'content', 'Over 380 Telemedicine centers enabled.\r\n', '<p class=\"text-justify line-h-26\"><strong>Telemedicine </strong> &ndash; With more than 318 hospitals installed with Telemedicine systems by us, our turnkey solutions will help State Government Health department to reach out to rural patients with specialty affordable health care, and help private hospital enterprises grow their network, build up brand image, earn referrals besides benefiting group medical institutions by participating in National and International CME programs.</p>\r\n<p class=\"text-justify line-h-26\"><a href=\"http://atnetindia.net/product/telemedicine/telemedicine\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Telemedicine.png\" alt=\"\" width=\"242\" height=\"181\" /></a></p>\r\n<h2 class=\"text-justify line-h-26\" style=\"text-align: center;\"><strong><a href=\"http://atnetindia.net/product/telemedicine/telemedicine\">&nbsp;Telemedicine</a></strong></h2>\r\n<p class=\"text-justify line-h-26\"><strong> Mobile Telemedicine </strong>&ndash; The mobile telemedicine van enables health care delivery for the rural masses and benefiting rural health care opportunities, besides becoming a critical need during disaster / emergency operations. We provide the concept, design and execute the same on a turnkey basis for multi specialties or specific specialty.</p>\r\n<p class=\"text-justify line-h-26\">&nbsp;</p>\r\n<p class=\"text-justify line-h-26\">&nbsp;</p>', '', '5580618ef7518a575f418c8f96966ffd.png', '', '', '', '', '', '', 0, 'Y', '2017-11-17 07:05:17', '2017-06-23 12:11:17'),
(7, 'educations', 43, 4, 'content', 'Technology is transforming the way education is delivered & A & T is at the forefront of enabling institutions to use ICT & AV technologies most comprehensively in the classrooms & beyond for a holistic anytime anywhere learning.', '<p class=\"line-h-26\">Technology is transforming the way education is delivered &amp; A &amp; T is at the forefront of enabling institutions to use ICT &amp; AV technologies most comprehensively in the classrooms &amp; beyond for a holistic anytime anywhere learning.</p>', '', 'fc471d5843da18d8cb9c15c1cd454315.png', '', '', '', '', '', '', 0, 'Y', '2017-10-07 07:11:37', '2017-06-23 12:13:40'),
(8, 'healthcares', 44, 4, 'content', 'Digital Health technologies for multispecialty hospitals to provide high level of patient care, bridge Urban - Rural Healthcare divide & conduct CME programs.', '<p class=\"text-justify line-h-26\">From Vanilla Video conferencing to Mobile Telemedicine to Operation Theatre Integration, A&amp;T provides a comprehensive product range for all hospital Video Communication needs over the IP networks using state of the art ICT Technologies. With a team of dedicated R7D personnel, we can design and implement any specific challenging requirements in the Video Network applications.</p>\r\n<p class=\"text-justify line-h-26\"><a href=\"#\"> Medical College Lecture Capture and Streaming</a></p>', '', '45a00fbda6f57908377fa73fc2d21b87.png', '', '', '', '', '', '', 0, 'Y', '2017-09-13 07:26:02', '2017-06-23 12:17:40'),
(9, 'enterprises', 45, 4, 'content', 'Enabling enterprises to incorporate video technologies as part of their business process to  improve their functional efficiency. ', '<p class=\"line-h-26\"><strong>E</strong>nabling enterprises to incorporate video technologies as part of their business process to improve their functional efficiency.</p>', '', 'ac357f7e07cd4fbe74f2a5abdcac042f.png', '', '', '', '', '', '', 0, 'Y', '2017-09-13 07:26:18', '2017-06-23 12:19:00'),
(10, 'governments', 46, 4, 'content', 'Solutions using Cost-effective, reliable, India made products for the Government departments to leverage Digital India momentum', '<p class=\"line-h-26\">Solutions using Cost-effective, reliable, India made products for the Government departments to leverage Digital India momentum</p>', '', '5dffd3937203a849db464f284240f884.png', '', '', '', '', '', '', 0, 'Y', '2017-09-13 07:27:03', '2017-06-23 12:19:44'),
(11, 'industries-hotel', 47, 4, 'content', 'Elegant video, effective audio systems & automation for the auditoriums, conference halls, restaurants, bar & the guest rooms to meet guests expectations of perfection, luxury & security. ', '<p class=\"line-h-26\">Elegant video, effective audio systems &amp; automation for the auditoriums, conference halls, restaurants, bar &amp; the guest rooms to meet guests expectations of perfection, luxury &amp; security.</p>', '', 'e389895abd206aff5648adeb65327aa8.png', '', '', '', '', '', '', 0, 'Y', '2017-09-13 11:58:09', '2017-06-23 12:20:37'),
(12, 'infra-retail', 48, 4, 'content', 'Online and in-store experience for today\'s convenience-driven shoppers & passengers for Retail chains, Railways & airports. ', '<p>Online and in-store experience for today\'s convenience-driven shoppers &amp; passengers for Retail chains, Railways &amp; airports.&nbsp;</p>', '', '088714bff1d3d1382b50417462e7a2da.png', '', '', '', '', '', '', 0, 'Y', '2017-07-15 06:50:30', '2017-06-23 12:21:02'),
(13, 'partnerships', 40, 3, 'content', 'Partner with us for our disruptive range of next generation video over IP technology products & Solutions and enjoy the benefits and strengths of A & T from its expertise, experience and its International association .', '<p>A &amp; T believes in long term business association for mutual benefit. It has &nbsp;always believed in offering value added services to customers or partners by providing them designing services for challenging solutions needed by the end users. Ethical business practices with the right kind of solution offerings &nbsp;are what matters most to A &amp; T.</p>\r\n<p><strong>Opportunity to enter the most high end of networking technology &ndash; the Video over IP market :</strong></p>\r\n<p>Video Communication&nbsp;has gained tremendous technology breakthroughs and is seeing the most explosive growth.&nbsp; Usage of Video Communication for homes and business alikes has gained importance in this current world environment. Today Video Conferencing is gaining momentum as a communication tool for a wide range of applications from Family reunions to business meetings, interviews to telemedicine. Video conferencing has revolutionized the way, we interact, the way we learn, communicate and transact business.&nbsp; A &amp; T Video Networks with its rich expertise in the next generation IP technology is the leader today in &nbsp;Video conferencing &nbsp;&amp; Video Streaming Technologies with over 19 years in the industry.&nbsp;</p>\r\n<p><strong>The Partner / Reseller</strong></p>\r\n<p>A &amp; T is looking for Partners and resellers across the Country for its range of Video communication products and solutions, so that they are available to the local customers and at the same time the Reseller enjoys the benefits and strengths of A &amp; T from its expertise, experience and its International association.&nbsp;</p>\r\n<p>We believe success of a venture comes from passion and commitment of the participating partners. For the range of products and solutions we offer, demos are crucial to win clients. Hence an investment in demo units would make our relationship stronger.&nbsp;</p>\r\n<p><strong>Partnerships :&nbsp;</strong></p>\r\n<p><strong>Reseller Partner:</strong></p>\r\n<p>Ideally you are already in reselling products and / or Systems integration of AV and IT products. &nbsp;We would be happy to have you on board to leverage your strength in the market for the disruptive products we offer. We can build up a strong go to market effort with your commitment by investing in demo units.&nbsp;</p>\r\n<p><strong>Referral Partner:</strong></p>\r\n<p>You have strong client relations but do not want to invest in demo units or the projects OR&nbsp;</p>\r\n<p>You already possess substantial experience in the Video network industry&nbsp; OR&nbsp;</p>\r\n<p>You are a specialist consultant in a specific industry&nbsp; having strong relationship with customers,&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>then we would like to have&nbsp;you refer your clients and we will do the rest.&nbsp;</p>\r\n<p><strong>Teaming Partner:</strong></p>\r\n<p>A &amp; T jointly works with strategic organisations on large projects on project basis under a teaming agreement.&nbsp;</p>\r\n<p><strong>Welcome on Board</strong></p>\r\n<p>Kindly fill in the&nbsp;<a href=\"http://atnetindia.net/partner-portal\">online application here</a>.&nbsp;</p>\r\n<p>&nbsp;</p>', '', 'e0a94144032030445aa87fd9d7090ca3.png', '', '', '', '', '', '', 0, 'Y', '2017-10-12 08:58:44', '2017-06-23 12:24:39'),
(14, 'value-added-services', 41, 3, 'content', 'Business Development, Customer engagement, System Design services and technical support to Partners to ensure Partner benefits. ', '<p><strong>Partner Engagement:&nbsp;</strong></p>\r\n<p><span style=\"font-weight: 400;\">Business Development - Go to Market customer engagement</span></p>\r\n<p><span style=\"font-weight: 400;\">Demonstration at site / Remotely</span></p>\r\n<p><span style=\"font-weight: 400;\">Social media campaigns on behalf of partners</span></p>\r\n<p>Partner Training Services</p>\r\n<p><span style=\"font-weight: 400;\">Software value adds&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">System Design Services</span></p>\r\n<p><span style=\"font-weight: 400;\">Integraton Services</span></p>\r\n<p><span style=\"font-weight: 400;\">L2 Technical Support for partners customers.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Onsite Support Services</span></p>\r\n<p>&nbsp;</p>', '', 'c1091d3ae119ca75c443e883558877a4.png', '', '', '', '', '', '', 0, 'Y', '2017-09-16 14:54:12', '2017-06-23 12:26:59'),
(15, 'partner-portal', 42, 3, 'content', 'Welcome to A & T Partner Portal. ', '<p>The Portal is designed to engage with partners for transparent Operations &amp; to support with all our value added services from training to onsite support. We hope this transparency will help in strengthening our channel relationship.</p>\r\n<p>&nbsp;</p>', 'Partner Registration', 'e8345254949c17a71ffada2bd7735641.png', '', '', 'Partner Portal', '', '', '', 1, 'Y', '2017-09-17 12:50:46', '2017-06-23 12:27:29'),
(17, 'distribution', 13, 2, 'content', 'Value Added Distribution of disruptive and innovative Video communication Products and equipments  with transparent Operations supporting partners with Business Development & system design services for a stronger Channel relationship. ', '<h2 id=\"mcetoc_1bpvkg0pq0\" style=\"text-align: center;\"><strong>VIDEO CONFERENCING &amp; VIDEO STREAMING DISTRIBUTOR</strong></h2>\r\n<p style=\"text-align: center;\">We distribute &nbsp;Video Conferencing &amp; Video Streaming Products along with the related equipments for applications in Enterprise, Healthcare, Education, Government, Hospitality, &nbsp;infrastructure &amp; Retail. Our strength comes from our experience &amp; expertise of over 20 years in the industry and hence we are able to provide value addition to OEM\'s products for the partners to benefit with the right equipments and accessories as well as software.&nbsp;</p>\r\n<p style=\"text-align: center;\">We grew as a Systems Integrator in the Video Conferncing &amp; Video Streaming technologies. Hence we distribute &nbsp;only products in these domains. With a deep domain knowledge and a passionate team, we strive to continously innovate to offer right products to the Channel partners for satisfying their clients.</p>\r\n<h3 style=\"text-align: center;\"><strong>Business Model</strong></h3>\r\n<p style=\"text-align: center;\">&nbsp;<img src=\"http://www.atnetindia.net/public/js/tinymce/fileman/Uploads/Business_Model.png\" alt=\"\" width=\"407\" height=\"527\" /></p>', '', 'dc3652501b0e9e72577fb122c02fbc99.png', '', '', '', '', 'video conferencing distributor, video streaming distributor, Video products distribution, video communication products distribution, Distribution, Distribution model, Value added distribution ', '', 0, 'Y', '2017-09-14 07:29:06', '2017-06-23 12:33:54'),
(19, 'video-as-a-service', 15, 2, 'content', 'Cloud optimized Video Conferencing & Video Streaming Service\r\n', '<ul class=\"pagecontent\">\r\n<li>Cloud based Video Conferencing &amp; Video Streaming Service</li>\r\n</ul>', '', 'ebab6733edde5f0062fe6acd4155c266.png', '', '', '', '', '', '', 0, 'Y', '2017-08-10 11:12:07', '2017-06-27 14:14:34'),
(20, 'software', 14, 2, 'content', 'Software products, services & customization on advanced framework for the web & mobile.', '<p class=\"line-h-26\">Software products, services &amp; customization on advanced framework for the web &amp; mobile.</p>', '', '93ba09279daaed85f702bf13e261a830.png', '', '', '', '', '', '', 0, 'Y', '2017-07-14 07:27:11', '2017-06-27 14:15:36'),
(34, 'footer', 9999, 0, 'content', 'Announcing the lanuch of Hybrid Hardware + Software Video Conferencing System ', '<p><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG_20170928_120417.jpg\" width=\"257\" height=\"144\" /></p>\r\n<p style=\"text-align: center;\">Launch of \"<strong>Kickle</strong>-Skype for Business\" @ Infocomm India 2017</p>', 'Recend Feed', NULL, '', '', '', '', '', 'Recent Feed', 0, 'Y', '2017-10-20 07:25:48', '2017-07-06 08:15:34'),
(35, 'footer', 9999, 0, 'content', '', '', 'Datasheets', NULL, '', '', '', '', '', 'Resources', 1, 'Y', '2017-07-14 08:48:37', '2017-07-06 08:16:39'),
(36, 'footer', 9999, 0, 'content', 'test', '<p>test</p>', 'Brochures', NULL, '', '', '', '', '', 'Resources', 2, 'Y', '2017-07-14 08:51:27', '2017-07-06 08:17:47'),
(37, 'footer', 9999, 0, 'content', '', '', 'Videos', NULL, '', '', '', '', '', 'Resources', 3, 'Y', '2017-08-31 14:26:19', '2017-07-06 08:18:05'),
(38, 'footer', 9999, 0, 'content', '', '', 'Presentations', NULL, '', '', '', '', '', 'Resources', 4, 'Y', '2017-07-14 08:49:10', '2017-07-06 08:18:22'),
(40, 'footer', 9999, 0, 'content', '', '<p><strong>About Us </strong></p>\r\n<p>A&amp;T Video Networks Pvt. Ltd. is an organization born out of our passion for video technologies and the new emerging technologies of the IP era. We are one of the pioneers and trusted Video over IP solution providers for enterprises in India.</p>\r\n<p><span style=\"font-weight: 400;\">Our vision is to&nbsp;</span>&ldquo;Make A/V communication ubiquitous in small to large education, Health and enterprise organizations by offering disruptive &amp; innovative products &amp; Services and designing customized solutions to meet their challenging needs&ldquo;</p>\r\n<p>We offer a complete suite of VoIP communication solutions comprising hardware, software, and cloud-based &lsquo;Pay Per Use&rsquo; services that run on secured, next-generation networks. &nbsp;</p>\r\n<p>Started in 1996, out of Madurai, Tamil Nadu, we have decades of experience in research, design and development of VoIP solutions. We are also recognized as the authorized distributors of global innovators such as LifeSize, NCast, Polycom, Visual Nexus, Cisco, Juniper, Cyberoam, Axis Communications, Brovis, Ruckus, Mirial, and Cayn.</p>\r\n<p>&nbsp;<strong>Our CSR initiatives</strong></p>\r\n<p><strong>Telemed Network</strong><span style=\"font-weight: 400;\">, a movement to network Tele Medicine service providers and seekers across the world with the objective of benefiting the rural masses with better health care</span></p>\r\n<p><strong>&ldquo;NETS&rdquo;</strong><span style=\"font-weight: 400;\">, a not-for-profit venture for Network for eHealth, Telemedicine and outreach Services. </span></p>\r\n<p><strong>Teleeducationnetwork, </strong><span style=\"font-weight: 400;\">an initiative to share academic as well as non academic resources between institutions and resource people worldwide using Video conferencing technologies. It also functions as a gateway to the online MOOC resources available worldwide.</span></p>\r\n<p><strong>Recognitions</strong></p>\r\n<p><span style=\"font-weight: 400;\">We are ISO 9001&ndash;2008 certified for design &amp; development of networking, data, audio &amp; video solutions and supply, installation, services of related products. We have won several state and national level awards for our innovation, and customer service excellence.</span></p>', 'Company', NULL, '', '', '', '', '', 'About Us', 1, 'Y', '2017-08-05 05:43:44', '2017-07-06 08:42:03'),
(41, 'footer1px-solidn-red', 9999, 0, 'content', 'Team', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 p-0\">\r\n<p>We are represented by 25 employees comprising solution architects and service engineers, and a network of 200 plus distributors, channel partners, and dealers spread across all major cities and towns in India, including Bengaluru, Chennai, Hyderabad, Mumbai, and New Delhi.</p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 border p-15 mb-3\">\r\n<div class=\"col-xs-12 col-sm-2 col-md-2 col-lg-2 p-0\"><img class=\"img-responsive w-200px\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/tm.jpg\" /></div>\r\n<div class=\"col-xs-12 col-sm-10 col-md-10 col-lg-10\">\r\n<p class=\"line-h-26\">Ashwin Desai, Managing Director, <span id=\"text_4\">Ashwin is responsible for overall operations, business strategy &amp; business development. He has a strong application visioning capability with strengths in international tie-ups, procurement, designing, and developing integrated solutions using ICT. He can be contacted at ashwin@atnetindia.net.</span></p>\r\n<p><a href=\"http://atnetindia.net/ashwin\">Detailed Profile</a></p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 border p-15 mb-3\">\r\n<div class=\"col-xs-12 col-sm-2 col-md-2 col-lg-2 p-0\"><img class=\"img-responsive w-200px\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/S_Saravanan_Kumar.jpg\" width=\"153\" height=\"190\" /></div>\r\n<div class=\"col-xs-12 col-sm-10 col-md-10 col-lg-10\">\r\n<p class=\"line-h-26\">Saravana Kumar, CTO &ndash;Saravana has a rich techno marketing experience and heads the innovative design solutions group. He is instrumental in rolling out VCU solutions for healthcare and virtual classroom solutions. He heads the customer centric design team. His contact is skumar@atnetindia.net</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 border p-15 mb-3\">\r\n<div class=\"col-xs-12 col-sm-2 col-md-2 col-lg-2 p-0\"><img class=\"img-responsive w-200px\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/tm3.jpg\" /></div>\r\n<div class=\"col-xs-12 col-sm-10 col-md-10 col-lg-10\">\r\n<p class=\"line-h-26\">Sangita Desai, Corporate Executive &ndash;A versatile professional with varied experience in hotel management, Sangita is in charge of soft skill training and event management. She also takes care of corporate communications and internal communications. Her email is sangita@atnetindia.net</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 border p-15 mb-3\">\r\n<div class=\"col-xs-12 col-sm-2 col-md-2 col-lg-2 p-0\"><img class=\"img-responsive w-200px\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/tm4.jpg\" /></div>\r\n<div class=\"col-xs-12 col-sm-10 col-md-10 col-lg-10\">\r\n<p><strong>Board of Advisors</strong></p>\r\n<p class=\"line-h-26 text-justify\">Ranga is a successful entrepreneur for the last 15 years with 2 successful exits from inception to acquisition. Has been in the industry for the past 25 years with experience in managing large ERP, IT Help-Desk, BI implementations.</p>\r\n<p class=\"line-h-26 text-justify\">Ranga has travelled widely and worked in Europe, Australia and Asia. Excellent networking skills with key contacts across industry verticals such as Automobile, Power &amp; Infra, BFSI and IT. Has established a good reputation in IT Industry and regular speaker at various forums such as TiE, NASSCOM, and iSPIRIT. Proven capability in turn-around strategy and scaling-up. Ranga is a qualified Electronics and Comms Engineer with Post Dip. In Management from University of New South Wales, Sydney, Australia. He is a strong believer in creating uncontested market space with Certification as a &ldquo;Blue Ocean Strategy&rdquo; Practitioner.</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 border p-15\">\r\n<div class=\"col-xs-12 col-sm-2 col-md-2 col-lg-2 p-0\"><img class=\"img-responsive w-200px\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/ac5.jpg\" /></div>\r\n<div class=\"col-xs-12 col-sm-10 col-md-10 col-lg-10\">\r\n<p class=\"line-h-26 text-justify\">R.Sundaram is a Commerce Graduate, member of the Institute of Chartered Accountants of India since 1983, practising as Corporate Laws Consultant since 1986, and is a Director in Corporate Advizory Group Pvt Limited, a Chennai based concern specialising in syndication of Debt, Equity and Merger &amp; Acquisition activities. He supports A &amp; T in its financial planning and monitoring with his vast and varied experience in the corporate financial transactions.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', 'Team', NULL, '', '', '', '', '', 'About Us', 2, 'Y', '2017-09-16 06:46:29', '2017-07-06 08:43:51'),
(42, 'footer', 9999, 0, 'content', 'Lorem ipsum dolor sit amet.', '<p class=\"\"><strong>Honours</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>Identified as A \'Pride of Madurai\' Organisation by MADITTISIA.</li>\r\n<li>Awarded with the &ldquo;Best Technical Project 2005&rsquo; from M/s Aethra, Italy, amongst 90 worldwide Partners.</li>\r\n<li>Selected as member of a Trade mission by British High commission amongst only 15 companies in India.</li>\r\n<li>Awarded with the \'MADITSSIA &ndash; TVS\' BEST service industry award for the year 2009</li>\r\n</ul>\r\n<p class=\"\"><strong>Path &ndash; Breaking Achievement </strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>First Website of a Madurai based organisation created in 1996</li>\r\n<li>First website of any industry association created in India &ndash; 1997</li>\r\n<li>First branded network of browsing centres established in India &ndash; \'cyberclub\' &ndash; 1998</li>\r\n<li>First DSL solution sold in Indian Railways &ndash; 1998</li>\r\n<li>First TRILINGUAL interactive touch screen information kiosk in India set up in 1998.</li>\r\n<li>First White Paper on Video Conferencing published in PC Quest in 1999</li>\r\n<li>First live International Internet video conferencing event held in India in 1999.</li>\r\n<li>First Direct PC &ndash; Ku band VSAT sold in India in 2001</li>\r\n<li>First Video conferencing Network of Public Video Conference Rooms launched in India &ndash; the VIN &ndash; the Video India Network &ndash; 2001</li>\r\n<li>Conducted Several Live Video Conferencing Shows with celebrities to propagate the uses and advantages of Video Conferencing.</li>\r\n<li>Set up a Telemedicine facility for pilgrims benefit between Tirumala and Tirupathi &ndash; inaugurated by Late Sri Rajasekhar Reddy, CM of AP &ndash; 2005</li>\r\n<li>Offered technical expertise for conducting several telemedicine conferences and Governmental functions.</li>\r\n<li>Organized the first of its kind 11 site Multi Conference during the 6th International Vascular Surgeons conference including for the first time connecting Sri Lanka and Lahore &ndash; 2004.</li>\r\n</ul>\r\n<p class=\"\"><strong>Innovative Projects</strong></p>\r\n<ul class=\"pagecontent\">\r\n<li>First Video Conferencing Project implemented in Indian Railways with Designing, Networking and System Integration on Railway IP Network on Hybrid networks.</li>\r\n<li>First Telemedicine project implemented in Indian Railways.</li>\r\n<li>Video conferencing in Kolkotta Judiciary: Linked 7 courts and 4 jails using video conference for daily hearings.</li>\r\n<li>Accident Site Video Transmission: First in Indian Railways for 2 way video communication with any officers on the Railway network from a accident site in between stations on the track</li>\r\n<li>WiFi Hotspot: First Railway station in India to be made entirely WiFi hotspot access at Chennai Egmore Railway station.</li>\r\n<li>First Train Information system Display System using latest technology to update particular information at particular stations and platforms.</li>\r\n<li>State of the Art Video surveillance System using Worlds best cameras at Chennai Central, Mambalam and Beach stations under implementation.</li>\r\n<li>First of its kind project of Collaborative Multimedia Classroom at the prestigious Indian Institute of Science &ndash; formerly TATA Institute &ndash; Asia&rsquo;s number one rated Technical Research Institute at 23 of the 47 departments spread around 400 acres.</li>\r\n</ul>', 'Awards & Achievements', NULL, '', '', '', '', '', 'About Us', 3, 'Y', '2017-08-08 04:46:25', '2017-07-06 08:48:12'),
(43, 'footer', 9999, 0, 'content', 'Story so Far', '<div class=\"row\">\r\n<p class=\"pull-right\"><button class=\"bg-orange font-white p-button\"> <a class=\"font-white\" href=\"http://atnetindia.net/gallery\">Gallery</a></button></p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"timeline\">\r\n<div class=\"line\">&nbsp;</div>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">&nbsp;</div>\r\n<div class=\"panel-heading icon\">&nbsp;</div>\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh0\" class=\"panel-title\">1996</h2>\r\n</div>\r\n<div class=\"timeline-content\"><img class=\"img-responsive pull-right\" style=\"width: 200px; padding-left: 10px;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/1.jpg\" />\r\n<p>Gets established in September as internet and communication technology services company, by Mr Ashwin Desai, a second generation entrepreneur.</p>\r\n<p>Makes a modest beginning with developing interactive websites, with tie ups with M/s.Folklore Communications Management Services Ltd., and M/s.India Yellow Pages.</p>\r\n<p>Diversifies into sales of post computerization hardware products for internet and intranet for corporate, SMEs and home segments.</p>\r\n<p>Becomes the Authorised Regional Distributor for M/s.Powertel Boca Ltd., makers of most reliable data modems.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh1\" class=\"panel-title\">1997</h2>\r\n</div>\r\n<div class=\"timeline-content\">\r\n<p>Segments itself into software and hardware divisions to focus on niche application areas.</p>\r\n<p>Develops innovative software applications such as the First Trilingual Touch Screen Information Kiosk installed in India at the Madurai Railway Station; a core Java-based software for educational Institutions to develop their own website and interactive intranet content, and a customer relation application for exporters to track their orders.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh2\" class=\"panel-title\">1998</h2>\r\n</div>\r\n<div class=\"timeline-content\"><img class=\"img-responsive pull-right\" style=\"width: 200px; padding-left: 10px;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/1998_2.jpg\" />\r\n<p>Enters into direct import and distribution of modem, routers and other ISDN products by tieing up with for M/s Asuscom Inc, Taiwan. Holds a massive 70% market share in South India</p>\r\n<p>Establishes the first ISDN based internet browsing parlor.</p>\r\n<p>Plays an important role in creating Cyber Club, the first network of internet browsing centres in South India</p>\r\n<p>Ties-up with a US-based international network and organises several events including an internet-based simultaneous video conferencing programme on the Valentine\'s Day. Over 100 people from 19 countries participate.</p>\r\n<p>Starts offering personal and professional video conferencing solutions in a more focused manner.</p>\r\n<p>Develops its own PC-based ISDN video conferencing kit and prices it at 60% lesser than the competition.</p>\r\n<p>Introduces cost-effective equipments from an OEM manufacturer abroad and launches the products in India under the brand name, imeet.</p>\r\n<p>Launches a full array of new generation IP communications products including IP-based phones, video phones, IP faxes and remote surveillance systems.</p>\r\n<p>Becomes a technology partner for Apollo Hospitals as the hospital initiates its first telemedicine project.</p>\r\n<p>Ties-up with RAD for leased line modems and Motorola and Cisco for routers</p>\r\n<p>Becomes the first partner for Banyan Networks Ltd., an IIT Chennai incubated company, manufacturing DSL modems.</p>\r\n<p>Becomes the first to supply DSL modems to the Indian Railways.</p>\r\n<p>Becomes the authorized agent of BSNL for marketing the latter&rsquo;s value added services. Through the partnership, BSNL achieves 120% growth in its ISDN and internet subscriber base in Tamilnadu.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh3\" class=\"panel-title\">2000</h2>\r\n</div>\r\n<div class=\"timeline-content\"><img class=\"img-responsive pull-right\" style=\"width: 200px; padding-left: 10px;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/2000_1.jpg\" />\r\n<p>Gets appointed as an agent for VSNL for internet and leased circuits for India.</p>\r\n<p>Becomes the first business partner of Hughes Escorts Communications Ltd., and brings in the Ku band VSAT based internet connectivity solutions.</p>\r\n<p>Ties up with C Com Corporation of Taiwan for bringing in next generation xDSL products to offer better performance and connectivity applications to PSU, educational Institutions, and banks.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh4\" class=\"panel-title\">2003</h2>\r\n</div>\r\n<div class=\"timeline-content\">\r\n<div class=\"row p-10\">\r\n<div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\"><img class=\"img-responsive\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/2003_1.jpg\" alt=\"\" width=\"310\" height=\"220\" /></div>\r\n<div class=\"col-xs-12 col-sm-8 col-md-8 col-lg-8\">\r\n<p class=\"mt-2\">Becomes the first Indian distributor for Aethra.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loi5\" class=\"panel-title\">2004</h2>\r\n</div>\r\n<div class=\"timeline-content\"><img class=\"img-responsive pull-right\" style=\"width: 200px; padding-left: 10px;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/2004_1.jpg\" />\r\n<p>Organizes the first of its kind 11 site multi-site virtual conference during the 6th International Vascular Surgeons conference. Connects for the first time Sri Lanka and Lahore. .</p>\r\n<p>Implements the first video conferencing project for Indian Railways with designing, networking and providing system integration on railway IP network on hybrid networks.</p>\r\n<p>Implements the first telemedicine project in Indian Railways.</p>\r\n<p>Implements video conferencing in Kolkotta Judiciary, linking 7 courts and 4 jails using video conference for daily hearings.</p>\r\n<p>Establishes Accident Site Video Transmission: First in Indian Railways for 2 way video communication with any officers on the Railway network from an accident site and other stations on the track.</p>\r\n<p>Partners with Chennai Egmore Railway Station and makes it the first railway station in India to be a WiFi zone.</p>\r\n<p>Creates the first Train Information Display System using latest technology that enables Indian Railways to update specific information at any particular station or platform.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loi6\" class=\"panel-title\">2010</h2>\r\n</div>\r\n<div class=\"timeline-content\">\r\n<p>Implements state-of-the art video surveillance system using the world&rsquo;s best cameras at Chennai Central, Mambalam and Beach stations</p>\r\n<p>Implements the first of its kind project of Collaborative Multimedia Classroom at the prestigious Indian Institute of Science &ndash; formerly TATA Institute &ndash; Asia&rsquo;s number one technical research institute. It covers 23 of the 47 departments spread around 400 acres.</p>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loi6\" class=\"panel-title\">2017</h2>\r\n</div>\r\n<div class=\"row p-10\">\r\n<div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\"><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG_20170918_183023.jpg\" width=\"200\" height=\"190\" /></div>\r\n<div class=\"col-xs-12 col-sm-8 col-md-8 col-lg-8\">\r\n<p class=\"mt-2\">Launched \"<strong>BRICKYARD</strong>-Integrated Digital Learning Platform\" at Didac India. Didac India is the most influential and relevant trade event in the region for Educational Material,Training &amp; Technology based solutions for all levels and sectors of the Indian Education &amp; Training Industry.&nbsp;Exhibited shell scheme booth in Didac&nbsp;India.&nbsp;</p>\r\n</div>\r\n</div>\r\n</article>\r\n<article class=\"panel panel-info\">\r\n<div class=\"panel-heading icon\">+</div>\r\n<div class=\"panel-heading\">\r\n<h2 id=\"mcetoc_1bnt86loh3\" class=\"panel-title\">2017</h2>\r\n</div>\r\n<div class=\"timeline-content\"><img class=\"img-responsive pull-right\" style=\"width: 200px; padding-left: 10px;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/IMG_20170928_120417.jpg\" width=\"200\" height=\"107\" />\r\n<p>Launched \"<strong>Kickle</strong>-Sype for Business\" at Infocomm India.Kickle is the next video conferencing room system generation: Skype room system, wireless display, room booking, whiteboard, annotation, and so much more.</p>\r\n<p>InfoComm India 2017 is an event to tap into opportunities to harness the power of the transformative power of professional AudioVisual (pro-AV) and Information Communications Technology (ICT).</p>\r\n<p>The event provided a platform where industry players and experts showcase, share and incubate ideas and, influencers and decision-makers seek and find solutions to propel their businesses.</p>\r\n</div>\r\n</article>\r\n</div>\r\n</div>', 'The Story so Far', NULL, '', '', '', '', '', 'About Us', 4, 'Y', '2017-10-20 07:56:58', '2017-07-06 08:50:47'),
(44, 'footer', 9999, 0, 'content', 'Education', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/3 - Copy 3.jpg\" width=\"300\" height=\"300\" />\r\n<div style=\"padding: 20px;\">\r\n<p style=\"text-align: center;\">Medical College Lecture Capture, Content Development and Delivery</p>\r\n<p class=\"text-center\" style=\"text-align: center;\"><strong><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"http://atnetindia.net/sublink_page/sublink-page-717\">Read More</a></strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--> <!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/image_2_.png\" width=\"300\" height=\"300\" />\r\n<div style=\"padding: 20px;\">\r\n<p style=\"text-align: center;\">Performance Capture System enhances Management students capability</p>\r\n<p class=\"text-center\" style=\"text-align: center;\"><strong><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"http://atnetindia.net/sublink_page/sublink-page-627\">Read More</a></strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Education', NULL, '', '', '', '', '', 'Case Studies', 1, 'Y', '2017-11-18 06:19:32', '2017-07-06 10:00:45'),
(45, 'footer', 9999, 0, 'content', 'Healthcare', '<p class=\"text-justify line-h-26\"><a href=\"#\"> Medical College Lecture Capture and Streaming</a></p>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut gravida nunc..</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Healthcare', NULL, '', '', '', '', '', 'Case Studies', 2, 'Y', '2017-10-10 06:46:23', '2017-07-06 10:01:40'),
(46, 'footer', 9999, 0, 'content', 'Enterprise', '<p>&nbsp;</p>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Textile.jpg\" width=\"294\" height=\"171\" />\r\n<div style=\"padding: 20px;\">\r\n<p style=\"text-align: center;\">Apparel exporter improves customer satisfaction VSTOR</p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"http://atnetindia.net/sublink_page/sublink-page-292\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Enterprise', NULL, '', '', '', '', '', 'Case Studies', 3, 'Y', '2017-09-15 06:04:27', '2017-07-06 10:02:25');
INSERT INTO `cms` (`id`, `slug`, `cat_id`, `parent`, `page_type`, `short_desc`, `content`, `footer_title`, `image`, `page_link`, `page_linktype`, `seo_title`, `seo_description`, `seo_keywords`, `columns`, `position`, `status`, `updated_at`, `created_at`) VALUES
(47, 'footer', 9999, 0, 'content', 'Coming Soon..', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut gravida nunc..</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Hotels', NULL, '', '', '', '', '', 'Case Studies', 5, 'Y', '2017-09-15 06:10:54', '2017-07-06 10:02:25'),
(48, 'footer', 9999, 0, 'content', 'case studies', '<p>case studies</p>', 'Case Study Questionnaires', NULL, '', '', '', '', '', 'Case Studies', 6, 'Y', '2017-09-14 13:42:19', '2017-07-06 10:07:04'),
(51, 'footer', 9999, 0, 'content', 'Careers', '<p class=\"text-justify line-h-26\">Our employment policy is also in tandem with our philosophy of long term association, Most of our staff have been with us for long years, unlike in other IT organisations. A healthy HR culture rewarding the result oriented is followed ( not necessarily exorbitant perks which defy practical business sense). Orientation, training, specialized trainings from our technology partners, practical field knowledge, all add up to the full growth of the every individual of our team.</p>\r\n<p>For referring to our detailed HR policy, <a href=\"mailto:hr@atnetindia.net\">hr@atnetindia.net</a></p>\r\n<p><strong>Following vacancies currently exist</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Head Channels&nbsp;&ndash;&nbsp;</strong><strong>Mumbai&nbsp;&ndash;&nbsp;</strong>5 years relevant working experience in IT / AV Sales, Identifying &amp; on boarding &nbsp;new partners and managing complete sales cycle for existing &amp; New partners - Technology product demos, presentations and POCs for Partners &amp; their clients, plan events and trainings, Lead generation, end user seeding, Tender support, Payment follow ups</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Manager &ndash; Inside Sales&nbsp;&ndash;&nbsp;</strong><strong>Madurai&nbsp;&ndash;&nbsp;</strong>5 years relevant working experience in IT / AV Sales&nbsp;and capable of Team coordination, Sales Follow ups,&nbsp;Payment follow ups, &nbsp;Sales Reports, &nbsp;Lead &amp; accounts database management, &nbsp;Channel Partner management, Online Sales Management</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Commercial Sales Executive&nbsp;&ndash;&nbsp;</strong><strong>Madurai&nbsp;&ndash;&nbsp;</strong>3 years of relevant work experience in IT / AV Sales,&nbsp;IT Hardware / AV products, Tender process, Excellent customer contacts, &nbsp;having handled sales to Top Management, Technology team coordination</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Product Manager Software&nbsp;&ndash;&nbsp;</strong><strong>Madurai&nbsp;&ndash;&nbsp;</strong>5 years of relevant work experience in Cloud &amp; Virtualization deployment experience</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Manager &ndash; Accounts &amp; Finance&nbsp;&ndash;&nbsp;</strong><strong>Madurai&nbsp;&ndash;&nbsp;</strong>10 &nbsp;<strong>&ndash;&nbsp;</strong>15 years of relevant experience in&nbsp;Corporate accounting systems, Accounts, costing, Finance, Banking, Imports, LC, Cash, GST, TDS, &amp; IT Returns, &nbsp;annual closing, Internal audit, Final audit, ROC filing &amp; Documentation.</p>\r\n<p class=\"text-justify line-h-26\">&nbsp;</p>\r\n<p class=\"text-justify line-h-26\"><strong>Director &ndash; Channel Sales &ndash; Mumbai </strong> &ndash; 12 &ndash;15 years of relevant working experience&nbsp;Channel and End user sales experience having relevant job exposure with excellent relationship with IT / AV resellers and capability to manage the channel business independently.</p>\r\n<p class=\"text-justify line-h-26\">&nbsp;</p>\r\n<p class=\"text-justify line-h-26\"><strong>Manager &ndash; Projects &amp; Support &ndash; Madurai </strong> &ndash; 7 &ndash; 10 years of relevant working experience in networks / AV technologies, network design, project management, technical support of products &amp; projects, managing customer support team and project team, certified in CCNA, CCNP, Redhat, MCSE.</p>\r\n<p><a class=\"btn btn-primary\" href=\"http://atnetindia.net/online_job_app\">Apply Here</a></p>', 'Careers', NULL, '', '', '', '', '', 'Connect', 5, 'Y', '2017-11-22 06:19:43', '2017-07-10 05:32:08'),
(52, 'footer', 9999, 0, 'content', 'Press', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/10171289_699964606764704_8681079.jpg\" width=\"290\" height=\"190\" />\r\n<div style=\"padding: 20px;\">\r\n<p style=\"text-align: center;\">Journey of A&amp;T</p>\r\n<p class=\"text-center\" style=\"text-align: center;\"><strong><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"http://atnetindia.net/sublink_page/sublink-page-679\">Read More</a></strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--> <!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Info3.jpg\" width=\"290\" height=\"190\" />\r\n<div style=\"padding: 20px;\">\r\n<p style=\"text-align: center;\">Infocomm 2017</p>\r\n<p class=\"text-center\" style=\"text-align: center;\"><strong><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"http://atnetindia.net/sublink_page/sublink-page-268\">Read More</a></strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Press', NULL, '', '', '', '', '', 'Connect', 6, 'Y', '2017-11-18 05:52:35', '2017-07-10 05:33:01'),
(56, 'footer', 9999, 0, 'content', 'Please find below streaming calculator', '<p>Please find below streaming calculator</p>', 'Streaming Calculator', NULL, '', '', '', '', '', 'Resources', 6, 'Y', '2017-07-14 08:52:06', '2017-07-11 11:41:13'),
(58, 'video-conference', 26, 13, 'content', 'Video Conferencing', '<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/distribution/video-conference/video-conf-tely\"><img style=\"width: 50%; height: 175px; display: block; margin: 0px auto 0px auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Tely.png\" alt=\"Tely200\" width=\"300\" height=\"175\" /></a></div>\r\n<h4 class=\"text-center mt-5\"><strong><a title=\"Tely\" href=\"http://atnetindia.net/distribution/video-conference/video-conf-tely\">Tely</a></strong></h4>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/video-conference/kickle\"><img class=\"img-responsive\" style=\"width: 50%; height: 175px; display: block; margin: 0px auto 0px auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/kickle_500_carre_v3.png\" width=\"241\" height=\"175\" /></a></div>\r\n<h4 class=\"text-center mt-5\"><strong><a title=\"Kickle\" href=\"http://atnetindia.net/product/video-conference/kickle\">Kickle</a></strong></h4>\r\n</div>', '', NULL, '', '', '', '', '', '', 1, 'Y', '2017-11-17 06:51:43', '2017-07-11 12:57:36'),
(59, 'footer', 9999, 0, 'content', 'Customer Registration', '<p><span style=\"font-weight: 400;\">Thank you for choosing A&amp;T. We assure you that all data collected will be kept strictly confidential.We promise you to provide you with best of the Products and Solutions in future too. </span></p>', 'Customer Registration', NULL, '', '', '', '', '', 'Connect', 2, 'Y', '2017-09-09 04:47:26', '2017-07-11 13:15:20'),
(60, 'footer', 9999, 0, 'content', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec tempor enim. Pellentesque nec tempor enim. Pellentesque nec tempor enim.</p>', 'Visitor/Guest Registration', NULL, '', '', '', '', '', 'Connect', 3, 'Y', '2017-08-31 04:47:40', '2017-07-12 05:09:38'),
(61, 'footer', 9999, 0, 'content', 'Customer Support', '<p style=\"text-align: center;\"><strong>Support Ticket</strong></p>\r\n<p>&nbsp;</p>', 'Customer Support', NULL, '', '', '', '', '', 'Connect', 4, 'Y', '2017-09-07 08:06:30', '2017-07-12 05:10:59'),
(64, 'footer', 9999, 0, 'content', 'Coming Soon..', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Custom text can be entered using a query string at the very end of the url.</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--> <!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Custom text can be entered using a query string at the very end of the url.</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--> <!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Custom text can be entered using a query string at the very end of the url.</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--> <!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Custom text can be entered using a query string at the very end of the url.</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end-->\r\n<div class=\"clear-fix\">&nbsp;</div>\r\n<!--one box start -->\r\n<div class=\"col-xs-12 col-sm-3 col-md-3  col-lg-3\">\r\n<div style=\"border: 1px solid black; padding: 0px; margin: 4px 0px;\"><img class=\"img-responsive\" src=\"http://atnetindia.net/assets/images/no-blog-image.png\" />\r\n<div style=\"padding: 20px;\">\r\n<p><a href=\"#\">Custom text can be entered using a query string at the very end of the url.</a></p>\r\n<p class=\"text-center\"><a style=\"border: 1px solid #fab417; padding: 2px 5px; color: #000;\" href=\"#\">Read More</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<!--one box end--></div>', 'Government', NULL, '', '', '', '', '', 'Case Studies', 4, 'Y', '2017-11-18 05:44:08', '2017-07-14 08:56:38'),
(66, 'video-signage', 13, 2, 'content', ' Video Signage', '<p>A &amp; T has been one of the earliest players in&nbsp;<strong>Video Signage</strong>&nbsp;display solutions having brought into India in 2006, just as the technology was developing. Applications of Digital Signage are primarily for Advertising and information dissemination. Organizations where these can be used are Retail chains, Infrastructure (Railways and Airports, mobile vehicles and busses), Universities, Large Enterprise campus, Hotels &amp; Hospitals, and a host of other segments.&nbsp;</p>\r\n<p>The first such information display System in Indian Railways has been implemented by us. Large corporate are taking interest in digital Signage as lot of information dissemination within a large enterprise can happen through strategically &ndash; positioned flat panel displays in the campus.</p>', '', NULL, '', '', '', '', '', '', 5, 'N', '2017-09-13 12:01:55', '2017-08-01 05:56:37'),
(71, 'video-surveillance', 13, 2, 'content', 'Video Surveillance', '<p><strong>Video Surveillance</strong></p>\r\n<p>Organizations installed closed circuit TV (CCTV) almost exclusively for security monitoring. CCTV, though, has many shortcomings. First of all, it\'s expensive and disruptive to install. Second, once installed, its capabilities are limited. CCTV records images on videocassettes, so police and other emergency personnel can\'t view the event live. Therefore, they often don\'t know an emergency is occurring or how serious it is. If they are informed of an emergency, these first responders can\'t understand its circumstances or context through CCTV. They see the event only after viewing the video, which is usually long after it\'s over.</p>\r\n<p><strong>A &amp; T Network Systems &ndash; Video Surveillance Service</strong></p>\r\n<ul>\r\n<li><a href=\"http://atnetindia.net/indoor-camera/\">Indoor Camera</a></li>\r\n<li><a href=\"http://atnetindia.net/outdoor-camer/\">Outdoor Camera</a></li>\r\n<li><a href=\"http://atnetindia.net/thermal-network-cameras/\">Thermal Camera</a>*</li>\r\n</ul>\r\n<p>In some cases, authorities can\'t ever view the event. Savvy criminals often take the tape with them as they leave the scene. In cases of fire, it\'s frequently burned. Therefore, a successor system is needed&ndash;one that delivers secure, real-time images of an emergency as well as the flexibility to show both full-motion and still images.&nbsp;</p>\r\n<p>More and more, companies are installing Internet-based IP surveillance as a far superior alternative to CCTV. This technology offers real-time delivery of video and still images from a crime or emergency scene via a LAN or the Internet.</p>\r\n<p>In a nutshell, IP surveillance uses a company\'s existing network and Internet technology to transmit images from analog cameras and/or IP cameras over public networks. These systems allow live streaming video and still image transfer (both one-way and two-way) at an average of 30 frames per second into a standard, easy-to-use Web browser, so video can be viewed in real time from police cars and other emergency vehicles.</p>\r\n<p><strong>A &amp; T Network Systems &ndash; Video Surveillance Camera</strong></p>\r\n<p>IP-based systems deliver a great deal of additional functionality. For instance, they provide motion detection, auto time and date stamps, easy transfer of visuals, and pre- and post-alarm messaging. Business owners are notified immediately if an event is occurring; they can then log on to the system remotely to see what\'s happening in their offices and businesses.&nbsp;</p>\r\n<p>An enormous variety of organizations have already installed IP-based surveillance systems to help secure both the interior and exterior of buildings. A few examples include retail stores, banks, law firms, gas stations, parking garages, schools and government offices; but these systems provide greater security to all organizations and businesses. Users have found that IP surveillance,</p>\r\n<ul>\r\n<li>Enhances and expedites law enforcement and emergency services to high-risk calls.</li>\r\n<li>Contributes to reliable identification of criminals and reduces the need for eyewitnesses.</li>\r\n<li>Can be used locally and remotely.</li>\r\n<li>Integrates easily with CCTV cameras, thus preserving existing security investments.</li>\r\n</ul>\r\n<p>Most users also have discovered that IP surveillance is very affordable, since companies already have many components of the system in place (such as an IP network and broadband connectivity). Other system components include an 802.11 wireless LAN, an access router, a video server, an IP camera (existing analog cameras can also be used) and host PC surveillance software.</p>\r\n<p>IP technology is the next step forward for surveillance systems. IP-based streaming video surveillance lets organizations monitor, prevent and/or respond to emergency situations more effectively and affordably, via the Internet. At the same time, the technology allows law enforcement, security companies and other emergency personnel to prepare better and respond more fully to emergencies. Thus, the physical safety of a company\'s vital human and business assets is far more secure and protected.</p>', '', NULL, '', '', '', '', '', '', 0, 'N', '2017-09-13 12:01:55', '2017-08-01 12:13:25'),
(74, 'video-signage', 13, 2, 'content', 'Video Signage', '<p>A &amp; T has been one of the earliest players in&nbsp;<strong>Video Signage</strong>&nbsp;display solutions having brought into India in 2006, just as the technology was developing. Applications of Digital Signage are primarily for Advertising and information dissemination. Organizations where these can be used are Retail chains, Infrastructure (Railways and Airports, mobile vehicles and busses), Universities, Large Enterprise campus, Hotels &amp; Hospitals, and a host of other segments.&nbsp;</p>\r\n<p>The first such information display System in Indian Railways has been implemented by us. Large corporate are taking interest in digital Signage as lot of information dissemination within a large enterprise can happen through strategically &ndash; positioned flat panel displays in the campus.</p>', '', NULL, '', '', '', '', '', '', 0, 'N', '2017-09-13 12:01:55', '2017-08-01 12:45:00'),
(116, 'dist-video-streaming', 125, 13, 'content', 'Video Streaming', '<p><br />NCast products and services are industry breakthroughs in the delivery of corporate presentations over IP networks. Communications and information distribution to large or small audiences, with minimal effort and involvement of network managers and technical personnel, has never been easier. <br /><br />NCast provides effective, scalable, and cost-effective methods for presenting rich content. NCast technology is revolutionizing presentation streaming with open-standard products that offer automation, ease of use, accessibility, low cost of deployment, and scalability.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/NCastLogo.png\" alt=\"\" width=\"500\" height=\"175\" /></p>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hd-basic\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/PR_HD_Basic - Copy 1.jpg\" alt=\"\" width=\"230\" height=\"125\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hd-basic\">PR-HD-Basic</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hd-extreme\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/PR_HD_Extreme.png\" alt=\"\" width=\"230\" height=\"125\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hd-extreme\">PR-HD-Extreme</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hydra\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/hr_hydra.png\" alt=\"\" width=\"230\" height=\"125\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-hydra\">PR-Hydra</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<h6 class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pesentation-server\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/NCast_presentation_server.png\" alt=\"\" width=\"230\" height=\"125\" /></a></h6>\r\n</div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pesentation-server\">Presentation Server</a></strong></h6>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n<p class=\"text-center mt-5\">Ncast introduces the new Galaxy series of Presentation Recorder/Streamers that represents a breakthrough in functionality, affordability, and size. The PR-Aries provides full frame recording and streaming with up to four graphic and text overlays. The PR-Leo adds a second input for composite layouts and the PR-Gemini adds Dual Screen recording and streaming.</p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-aries\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Galaxy_Rear_Aries_4424x1288 - Copy 1.png\" width=\"230\" height=\"100\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-aries\">PR-Aries</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-gemini\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Galaxy_Rear_Gemini_4404x1278.png\" alt=\"\" width=\"230\" height=\"100\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-gemini\">PR-Gemini</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-mini\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/PR_MINI_Left_1523x1523.png\" alt=\"\" width=\"230\" height=\"150\" /></a></div>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-mini\"> PR-Mini</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3\">\r\n<div class=\"border-grey p-10\"><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-leo\"><img class=\"m-auto d-block\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Galaxy_Rear_Leo_4404x1278.png\" alt=\"\" width=\"230\" height=\"100\" /></a></div>\r\n<h6 class=\"text-center mt-5\">&nbsp;</h6>\r\n<h6 class=\"text-center mt-5\"><strong><a href=\"http://atnetindia.net/product/dist-video-streaming/pr-leo\">PR-Leo</a></strong></h6>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-17 06:54:21', '2017-08-04 07:53:30'),
(121, 'telemedicine', 57, 44, 'content', 'TeleMedicine', '<p>Leaders in Telemedicine- Since 1999</p>\r\n<p>Installations in more than 200 hospitals</p>\r\n<p>Turnkey Solutions</p>\r\n<p>Products- Digital Medical Equipments, Hardware, Software, Video Conferencing</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Installation</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Training</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Managing</p>\r\n<p>Initiative-<a href=\"http://telemedicinenetwork.org/\"> www.telemedicinenetwork.org</a></p>\r\n<p>- A movement to network Telemedicine Service providers and rural clinics and patients.</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-08-07 12:57:46', '2017-08-07 12:57:46'),
(122, 'ambulance-video-system', 60, 44, 'content', 'Ambulance Video System', '<h1>AVTIS</h1>\r\n<p>Ambulance video transmission system We provide solutions to facilitate live video transmission from an Emergency ambulance anywhere within the city to the Hospital to enable monitoring the patients on the move.</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-03 11:03:44', '2017-08-07 13:01:48'),
(123, 'icu-interaction', 59, 44, 'content', 'ICU Interaction', '<p><strong>VCU - Virtual ICU patients Interaction System </strong> &ndash; Patient satisfaction and facilitation has become a keyword today. By a GO, it has also been made mandatory to allow relatives of patients to see them in the ICU. We have provided this solution with a visitors room, from where the relatives of patients can see live (and even interact with nurses) in the ICU using a innovative wireless mobile unit. Further integration can enable viewing from homes over the internet itself. Sir Gangaram Hospitals, Delhi, Manipal Child &amp; Womens Hospital, and Apollo Gleangles Hospitals, Kolkotta have already established this facility and many other hospitals are gearing up to provide such facilities.</p>\r\n<p>The ICU Interaction has been designed speciically for Hospitals to solve these challenges:</p>\r\n<p><strong>Visual Communication:</strong> ICU interaction permits real-time, two-way, face-to-face communication between nursing staff, patients and families in the ICU. This interaction provides important visual information that cannot easily be conveyed by telephone, such as, appearance of the abdomen, and appearance of the patient\'s breathing.</p>\r\n<p><strong>Anytime, anywhere access:</strong> The physician can virtually be near the patient\'s bedside from anywhere and evenzoom in to take a closer look at the patient or beside monitors.</p>\r\n<p><strong>Designed for the ICU:</strong> Lightweight aluminum, hidden cable management trays, height adjustable arms and pan/tilt cameras make it easy to move within the ICU.</p>\r\n<p><strong>Integrated Patient Data:</strong> Further integration enables physicians to view graphical data from a monitor or flow sheet as well as all te interactive functions from even their homes.&nbsp;</p>\r\n<p>The ICU interaction could play a significant role in the delivery of intensive care to remote areas suffering from plague, war or natural disaster, filling the present gap in the delivery of critical care.</p>\r\n<p style=\"text-align: center;\"><a href=\"http://atnetindia.net/product/icu-interaction/vcu\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/VCU1 - Copy 1.jpg\" alt=\"\" width=\"196\" height=\"216\" /></a></p>\r\n<h2 style=\"text-align: center;\"><strong><a href=\"http://atnetindia.net/product/icu-interaction/vcu\">ICU Interaction</a></strong></h2>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-17 07:06:19', '2017-08-07 13:04:42'),
(124, 'smart-classroom', 49, 43, 'content', 'Smart Classroom', '<p>Smart Multimedia Classroom to enable interactivity between your institution and other classrooms or Guest lectures from outside the campus using Video Conferencing- A state of the art classroom set up with modern acoustic design and multimedia devices.</p>\r\n<p>Apart from a designated Conference room/Class room, an auditorium/ Conference Hall can be set up having a good audio public address system and lighting to accomodate larger student gathering.</p>\r\n<p>Control system for Class Room Equipments can also be added.</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-21 05:47:26', '2017-08-07 13:14:22'),
(125, 'education-virtual-classroom', 50, 43, 'content', 'Virtual Classroom', '<p>Education institutions today need external resources, experts, and guests to deliver lectures and special addresses to enable the students gain vital indepth knowedge and exposure. Sometimes, lectures can be delivered to multiple classrooms from one classroom within a campus to accomodate many students to benefit. Classrooms can be enabled with Video conferencing technology poperly integrated with audio systems to attain this objective.&nbsp;</p>\r\n<p>From a simple system consisting of software based video conferencing and mics, displays and speakers to a&nbsp;state of the art dedicted hardware Video conferencing system with automated Control System, Motion and Voice based auto tracking features suitable for large classrooms / seminar halls / auditorium, a virtual classroom system can enable receiving and interacting lectures from remote lecturers or within multiple classrooms in a campus.</p>\r\n<p>The System can be designed with dedicated hardware video conferencing system or On Premise based software system. Cloudline Cloud based multi site video conferencing service enables a hybrid deployment on Premise as well as Cloud.&nbsp;</p>\r\n<p>The automated control system benefits the lecturer to control all equipments from a touch panel on the Digital Podium. The affordably designed Digital Podium is functionally effective. The auto tracking system enables focussing, Tracking, Displaying and Transmitting Lecturers movement on the dais as well as&nbsp;Students\' interaction with the lecturer.</p>\r\n<p>The virtual classroom sessions could also be enhanced to a lecture capture and streaming system.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-18 06:28:48', '2017-08-07 13:18:25'),
(126, 'elearning-digital-library', 52, 43, 'content', 'E-Learning Distance Education', '<p>Create as e-Learning platform by Archiving and managing the searchable educational Content in various multimedia formats for Delivery on Demand to students anytime, anywhere within the campus or remote centres.</p>\r\n<p>-Digitize Library books, Magazines, Periodicals, Research papers, etc.,</p>\r\n<p>-Upload the studio captured lecture Content Management Server.</p>\r\n<p>-Owned or hosted model.&nbsp;</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-08-08 05:54:44', '2017-08-07 13:25:53'),
(127, 'lecture-capture-distance-education', 51, 43, 'content', 'Lecture Capture-Distance Education', '<p>State of the Art Digital Studio with acoustics &amp; lighting to capture Multimedia Lectures and Guest Lectures (or regular classroom set up) and create Digital content as well as to stream live for access to students enrolled in Distance Education programs at Distance classes or from their homes.</p>\r\n<p>Capture: Several multimedia feeds, like interactive sessions, computer Presentations and Video and Audio systems.</p>\r\n<p>Compose: These feeds with PiP into a single multimedia lecture.</p>\r\n<p>Deliver: The lecture live anywhere on campus or over the internet.</p>\r\n<p>Archive: The lectures for on-demand viewing, and</p>\r\n<p>Manage: The content centrally for online/offline viewing.</p>\r\n<p>Webcast: The session live by uploading to your web server.</p>\r\n<p>Collaborate: With multiple classrooms within and outside campus.</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-08-08 04:54:43', '2017-08-07 13:39:20'),
(129, 'tele-medicine-network', 38, 15, 'content', 'Tele Medicine Network', '<p>A movement to network telemedicine providers, rural clinics and patients with the objective of benefiting the rural masses with better health care.</p>\r\n<p><a href=\"http://www.telemedicinenetwork.org/\">www.telemedicinenetwork.org</a></p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-08-08 08:23:23', '2017-08-08 08:23:23'),
(130, 'tele-education-network', 89, 15, 'content', 'Tele Education Network', '<p>A portal to share academic as well as non academic resources between institutions and resource people worldwide using Video conferencing technologies apart from being a gateway to the online MOOC resources available Worldwide.</p>\r\n<p><a href=\"http://teleeducationnetwork.com/\">http://teleeducationnetwork.com/</a></p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-08-08 08:27:46', '2017-08-08 08:27:46'),
(131, 'dist-video-recording', 129, 13, 'content', 'Video Recording', '<p>The VSTOR Premium allows 4K Ultra HD capture from Video Conference system, DVD\'s, Video Cameras or your laptop directly on to your external storage or PC HDD. Record audio using the integrated microphone while you can take snapshots using the remote control.</p>\r\n<p>&nbsp;</p>\r\n<!--\r\n<p><a title=\"VSTOR Premium\" href=\"http://atnetindia.net/product/dist-video-recording/vstor-premium\">VSTOR Premium</a></p>-->\r\n<div class=\"col-xs-12 col-sm-5 col-md-5 col-lg-5\"><a href=\"http://atnetindia.net/product/dist-video-recording/vstor-premium\"><img class=\"img-responsive\" style=\"border: 1px solid #efefef; padding: 10px; height: 170px; width: 290px;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/vstor1.png\" alt=\"VSTOR Premium\" /></a>\r\n<p class=\"text-left font-14 mt-5\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a title=\"VSTOR Premium\" href=\"http://atnetindia.net/product/dist-video-recording/vstor-premium\" data-original-title=\"VSTOR Premium\">VSTOR Premium</a></p>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-17 06:55:15', '2017-08-08 10:09:30'),
(132, 'video-cameras', 130, 13, 'content', 'VIEW Video Cameras', '<p>Just connect the View PTZ Icon HD camera system to a TV and the internet, give it power and pair it to your account to start making calls&mdash;there simply isn&rsquo;t a more powerful or easier-to-use video conferencing solution available.</p>\r\n<div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/video-cameras/roomy-board-room-integration\"><img style=\"width: 100%; height: 200px; margin: 0 auto; display: block;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Roomy.jpg\" alt=\"\" /></a></div>\r\n<h3 class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/roomy\"><strong>Roomy</strong> </a></h3>\r\n<p class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/roomy\">Board room / integration Camera</a></p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/video-cameras/klick-huddle-small-conference-room\"><img style=\"width: 100%; height: 200px; margin: 0 auto; display: block;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Klick.jpg\" alt=\"\" /></a></div>\r\n<h3 class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/klick\"><strong>Klick</strong></a></h3>\r\n<p class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/klick\">Huddle Small conference room Camera</a></p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/video-cameras/snap-wide-angle-usb\"><img style=\"width: 100%; height: 200px; margin: 0 auto; display: block;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Snap - Copy 1.jpg\" /></a></div>\r\n<h3 class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/snap\"><strong>Snap</strong></a></h3>\r\n<p class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/snap\">Wide angle USB Camera</a></p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/video-cameras/konnect-lecture-tracking-camera\"><img style=\"width: 100%; height: 200px; margin: 0 auto; display: block;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Konnect.jpg\" alt=\"\" /></a></div>\r\n<h3 class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/konnect\"><strong>Konnect</strong></a></h3>\r\n<p class=\"text-center mt-5\"><a href=\"http://atnetindia.net/product/video-cameras/konnect\">Lecture Tracking Camera</a></p>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-20 11:43:41', '2017-08-08 10:13:35'),
(133, 'related-equipments', 131, 13, 'content', 'related-equipments', '<h3 id=\"mcetoc_1brlum9jf0\">Array Microphones-Acoustic Magic</h3>\r\n<p>Since 2002, the Pioneer of Scanning Array Microphones. The long pickup range and wide field of view make the Voice Tracke ideal for meetings and lecture recording, as well as conferencing applications. The Voice Tracker I can be used as an auxiliary microphone with conventional conferencing systems that have a good AEC. The Voice Tracker II has its own built in AEC, and consequently can be used with VoIP systems that do not have a robust AEC.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"col-xs-12 col-sm-5 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/voice-tracker-i\"><img class=\"img-responsive\" style=\"width: 55%; height: 160px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/Voice_Tracker_I.jpg\" alt=\"Voice Tracker I\" /></a></div>\r\n<h6 class=\"text-center font-14 mt-2\"><strong><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/voice-tracker-i\" data-original-title=\"Tely 200\">Voice Tracker I</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-5 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/voice-tracker-ii\"><img class=\"img-responsive\" style=\"width: 55%; height: 160px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/Voice_Tracker_II.jpg\" alt=\"Voice Tracker2\" /></a></div>\r\n<h6 class=\"text-center font-14 mt-2\"><strong><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/voice-tracker-ii\" data-original-title=\"voice-tracker2\">Voice Tracker II</a></strong></h6>\r\n</div>\r\n<!--\r\n<p><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia\">Accoustic Magic</a></p>-->\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<h3 id=\"mcetoc_1brlum9jf1\">Teacher Microphone-Avermedia</h3>\r\n<p>AVerMedia Technology&rsquo;s &nbsp;passion drove them to pursue the continuous research and development of digital imaging technologies and concurrent applications. AVerMedia Technologies provides PC, tablet, and mobile TV-viewing solutions, along with high-definition video and real-time audio-visual product designs, manufacturing, and marketing.</p>\r\n<div class=\"col-xs-12 col-sm-5 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia313\"><img class=\"img-responsive\" style=\"width: 100%; height: 160px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/AW313.png\" alt=\"Voice Tracker I\" /></a></div>\r\n<h6 class=\"text-center font-14 mt-2\"><strong><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia313\" data-original-title=\"Avermedia\">Avermedia 313</a></strong></h6>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-5 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia330\"><img class=\"img-responsive\" style=\"width: 55%; height: 160px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/AW330.jpg\" alt=\"Voice Tracker I\" /></a></div>\r\n<h6 class=\"text-center font-14 mt-2\"><strong><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia330\" data-original-title=\"Avermedia\">Avermedia 330</a></strong></h6>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<!--\r\n<p><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/avermedia\">Accoustic Magic</a></p>-->\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<h3 id=\"mcetoc_1brlum9jf2\">Visualisers-Elmo&nbsp;</h3>\r\n<p>Since 1921&nbsp;&ldquo;ELMO has been a global leader in education technology for over 96 years. In recent years, ELMO has expanded its product line, bringing other technologies to the market such as soundfield generators, collaborative devices and other wireless solutions. As education continues to shift, it is ELMO&rsquo;s promise to continue to strive and exceed consumer needs by bringing only the most innovative products with quality standards at an affordable price.&rdquo;</p>\r\n<div class=\"col-xs-12 col-sm-5 col-md-5 col-lg-5\"><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/elmo-mx-1\"><img class=\"img-responsive\" style=\"border: 1px solid #efefef; padding: 10px; height: 200px; display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/elmo_1358_mx_1_visual_presenter_.jpg\" alt=\"Visualisers\" width=\"700\" height=\"180\" /></a>\r\n<h6 class=\"text-left  font-14 mt-2\" style=\"text-align: center;\"><strong><a href=\"http://atnetindia.net/product/related-equipments/audio-microphones/elmo-mx-1\">MX-1</a></strong></h6>\r\n</div>\r\n<!--\r\n<p><a title=\"L-21 id\" href=\"http://atnetindia.net/product/related-equipments/visualisers/l-21-id\">L-21 id</a></p>-->\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<h3 id=\"mcetoc_1brlum9jf2\">A/V HUB&nbsp;</h3>\r\n<p>ET 510 can take any laptop VGA or HDMI in Classroom or Boardroom and with its up-scaling feature the input content could be display in two different output screens.&nbsp;More screens, more flexibility.&nbsp;The Multi-I/O Converter Box 510 can output one video on two separate screens at the same time via different output ports.</p>\r\n<div class=\"col-xs-12 col-sm-5 col-md-5 col-lg-5\"><a href=\"http://atnetindia.net/product/related-equipments/et-510\"><img class=\"img-responsive\" style=\"border: 1px solid #efefef; padding: 10px; height: 156px; display: block; margin-left: auto; margin-right: auto; border-width: 1px;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/ET510_4 - Copy 1.jpg\" alt=\"Visualisers\" width=\"350\" height=\"600\" /></a>\r\n<h6 class=\"text-left  font-14 mt-2\" style=\"text-align: center;\"><a href=\"http://atnetindia.net/product/related-equipments/et-510\">ET-510</a></h6>\r\n</div>\r\n<!--\r\n<p><a title=\"L-21 id\" href=\"http://atnetindia.net/product/related-equipments/visualisers/l-21-id\">L-21 id</a></p>-->\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<h3 id=\"mcetoc_1brlum9jf2\">VIDA</h3>\r\n<p>Professional Seamless video switcher &amp; scaler with multiple analog/Digital interfaces.</p>\r\n<div class=\"col-xs-12 col-sm-5 col-md-5 col-lg-5\"><a href=\"http://atnetindia.net/product/related-equipments/vida\"><img class=\"img-responsive\" style=\"border: 1px solid #efefef; padding: 10px; height: 158px; display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/VIDA.png\" alt=\"Visualisers\" width=\"390\" height=\"150\" /></a>\r\n<h6 class=\"text-left  font-14 mt-2\" style=\"text-align: center;\"><a href=\"http://atnetindia.net/product/related-equipments/vida\">VIDA</a></h6>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-20 04:57:35', '2017-08-08 10:34:19'),
(136, 'footer-blog', 9999, 0, 'content', 'Blog', '<p>Blog</p>', 'Blog', NULL, '', '', 'Blog', 'Blog', 'Blog', 'Resources', 0, 'Y', '2017-08-09 11:44:43', '2017-08-09 11:44:43'),
(137, 'surgery-recording', 58, 44, 'content', 'Surgery Recording', '<h1><strong>VOTIS</strong></h1>\r\n<p><strong>Acquisition</strong>, <strong>Recording</strong>, <strong>Broadcasting</strong> and <strong>Interactive sessions</strong> of live Surgery from the OT</p>\r\n<p>&nbsp;<a href=\"http://atnetindia.net/product/surgery-recording/votis\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/VOTIS.jpg\" alt=\"\" width=\"416\" height=\"218\" /></a></p>\r\n<h2 style=\"text-align: center;\"><strong><a href=\"http://atnetindia.net/product/surgery-recording/votis\">VOTIS</a></strong></h2>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-17 07:04:29', '2017-08-10 07:47:25'),
(140, 'sublink-page-292', 10000, 0, 'content', 'Case Study Apparel Exporter improves customer satisfaction - VSTOR', '<p class=\"line-h-26\">When a leading apparel exporter in Mumbai started exploring ways to increase customer satisfaction, they were faced with a huge challenge! With a central design team and production facilities distributed across India, it became vital for teams to be able to review customer requirements at all stages of production. And they had to leverage their existing Video Conferencing systems.</p>\r\n<p class=\"line-h-26 font-20\"><strong> VSTOR records Video and Voice calls permitting them to be replayed back from any location on any media player </strong></p>\r\n<p>\"By Implementing VSTOR, we have not only been able to consistently meet customer demands but also been able to improve profitability by reducing rejection rates.\"</p>\r\n<p><strong> Rishi Rajani</strong></p>\r\n<p>CEO</p>\r\n<p><strong> The Client</strong></p>\r\n<p>One of the leading apparel exporters based in Mumbai has 14 offices in India and abroad. These include the Head Office, the Design Centre, Sales Offices and multiple manufacturing units spread across multiple locations.</p>\r\n<p>With clients spread across the world, the firm caters to multiple requests in the form of design, material and patterns.</p>\r\n<p>To improve communications within the organization and with customers, the firm had invested in Video Conferencing more than a decade back. This was paying off because Buyers, Sales persons, Production managers and Design teams could share information, material details and patterns more effectively than before.</p>\r\n<p><strong> The Challenges</strong></p>\r\n<p><strong> Client satisfaction:</strong> Being one of the leading apparel exporters in the country, the Firm has customer across the world. As expected, the biggest challenge was to meet the unique demands of each customer, in terms of material, design and finish. Overlooking a simple request means rejection of the entire batch and a drop in customer satisfaction.</p>\r\n<p><strong> Miscommunication: </strong>With Customers, the Design Team and the Production unit being in geographically different regions, communicating specifications was over video conference calls and telephone calls. Miscommunication or misinterpretation of the details were common while finalizing the design.</p>\r\n<p><strong> Expensive rejections:</strong> Finicky customers reject entire batches for differences in even small details. Simple misunderstandings between the design and production teams was starting to have a domino effect: profits were shrinking, hence prices had to be increased hence customers were starting to look at other manufacturers</p>\r\n<p><strong> The Solution</strong></p>\r\n<p>Having already built trust in A&amp;T Video Networks during the implementation of the Video Conferencing network, the Firm approached A&amp;T once more for a solution to their problems.</p>\r\n<p>A&amp;T implemented VSTOR HD Recorders that record telephone calls and video calls in a secured storage in digital format. VSTOR enables users to create digital libraries that are indexed and can therefore be searched for.</p>\r\n<p>With this, the Firm was able to record all conversations with Clients and then make them available to Design and Production teams at any location. Careful reviews of the calls became a norm which helped the Firm review and meet client expectations every time.</p>\r\n<p><strong> The Benefits</strong></p>\r\n<p>By cutting rejection rates to almost half, the firm was not only able to increase their profitability but also increase customer satisfaction dramatically.</p>\r\n<p>As a result, they were able to even reduce rates for their key clients.</p>\r\n<p>Today, not only have they been able to retain all their clients, but have been able to acquire new customers and grow their market share.</p>', 'Case Study Apparel Exporter improves customer satisfaction - VSTOR', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-09-12 12:09:08', '2017-08-31 14:30:33'),
(141, 'sublink-page-43', 10000, 0, 'content', 'dummy content', '<p>dummy content</p>', 'page2', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-08-31 14:30:52', '2017-08-31 14:30:52');
INSERT INTO `cms` (`id`, `slug`, `cat_id`, `parent`, `page_type`, `short_desc`, `content`, `footer_title`, `image`, `page_link`, `page_linktype`, `seo_title`, `seo_description`, `seo_keywords`, `columns`, `position`, `status`, `updated_at`, `created_at`) VALUES
(147, 'performancecapture', 53, 43, 'content', 'Performance Capture System', '<p>&nbsp;</p>\r\n<p>Performance Capture is the process of capturing the students performance from different angles, recording the same and reviewing it with students.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>How performance Capture Works?</strong></p>\r\n<p><br />Students are engaged by asking them to address other student audience or a panel of faculties on a particular topic. Students also use interactive tools to annotate white board and share presentation content. This is captured with one or more cameras and recorded in a high resolution digital format. This is archived in a Content Management System with name, department and year of the student, the topic, and the date of the performance done. These captured videos can then be searched based on any of the given criteria and played back by the faculty along with the student in a mentoring session. The mentoring session identifies the inaccuracy with regard to the students body gestures, postures, Facial expressions, communication and so on at the time of the students address and necessary insights and guidance is provided personally.</p>\r\n<p>The students can also review their own performance using their credentials for accessing their video anytime from anywhere on the campus network including from their mobile.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/image_1_.png\" width=\"500\" height=\"250\" /></p>\r\n<p>&nbsp;</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-23 10:32:34', '2017-09-02 05:15:46'),
(148, 'surveilllance', 54, 43, 'content', 'Surveillance', '<p>Surveillance</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:16:30', '2017-09-02 05:16:30'),
(149, 'network-security', 55, 43, 'content', 'Network Security', '<p>Network Security</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:17:17', '2017-09-02 05:17:17'),
(150, 'network-security', 74, 46, 'content', 'Network Security', '<p>Network Security</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:17:49', '2017-09-02 05:17:49'),
(151, 'surveillance', 61, 44, 'content', 'Surveillance', '<p>Surveillance</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:18:50', '2017-09-02 05:18:50'),
(152, 'patient-information-display-system', 62, 44, 'content', 'Patient Information Display system', '<p>Patient Information Display system</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:19:23', '2017-09-02 05:19:23'),
(153, 'board-room-av', 64, 45, 'content', 'Board Room AV', '<p>Board Room AV</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:20:18', '2017-09-02 05:20:18'),
(154, 'small-conference-huddle-rooms', 65, 45, 'content', 'Small Conference Huddle Rooms', '<p>As more and more remote collaboration meetings are being conducted, usage of simple &amp; easy to use video conferencing in Huddle rooms &amp; Small meeting rooms have significantly increased. Huddle room video conferencing needs the right products - like a small form factor plug &amp; play unit, Wide angle camera to cover the front seaters, etc.</p>\r\n<p style=\"text-align: center;\"><strong>Which is the right Video conferencing solution for your Huddle Room?</strong></p>\r\n<p>You already have a Multi conferencing Server and need Plug &amp; Play affordable video conferencing system for adding to your small conference rooms</p>\r\n<p style=\"text-align: center;\"><strong>Tely 200 is the choice&nbsp;</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Tely_200.jpg\" alt=\"\" width=\"412\" height=\"180\" /></p>\r\n<p>You wish to move over to Cloud services for your video meetings and populate all your meeting rooms with video conferencing ability at affordable cost</p>\r\n<p><strong>CLOUD LINE</strong> Video conferencing Cloud service - Pay as you use + KLICK PTZ Camera + Voice Tracker II microphone - all connected to your laptop or a dedicated PC in your conference room.&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Cloudline_logo_final_jpeg_01 - Copy 1.jpg\" width=\"412\" height=\"180\" /></p>\r\n<p>You already use Skype for Business or Lync or other Video conferencing cloud service but need better video and audio capability in your conference rooms</p>\r\n<p>KLICK PTZ Camera + Voice Tracker II microphone <br />OR<br />SNAP wide angle camera + Voice Tracker II microphone</p>\r\n<p>Click Here</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-09 09:05:45', '2017-09-02 05:21:00'),
(155, 'mobility-conferencing', 66, 45, 'content', 'Mobility Conferencing', '<p>Mobility Conferencing</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:21:36', '2017-09-02 05:21:36'),
(156, 'digital-training', 67, 45, 'content', 'Digital Training', '<p>Digital Training</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:21:59', '2017-09-02 05:21:59'),
(157, 'board-room-av', 68, 46, 'content', 'Board Room AV', '<p>Board Room AV</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:22:40', '2017-09-02 05:22:40'),
(158, 'small-conference-huddle-rooms', 69, 46, 'content', 'Small Conference Huddle Rooms', '<p>Small Conference Huddle Rooms</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:23:12', '2017-09-02 05:23:12'),
(159, 'information-display-systems-signage', 70, 46, 'content', 'Information Display System Signage', '<p>Information Display System Signage</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:23:46', '2017-09-02 05:23:46'),
(160, 'wired-network', 71, 46, 'content', 'Wired Network', '<p>Wired Network</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:24:08', '2017-09-02 05:24:08'),
(161, 'wireless-network', 72, 46, 'content', 'Wireless Network', '<p>Wireless Network</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:24:37', '2017-09-02 05:24:37'),
(162, 'surveilllance', 73, 46, 'content', 'Surveillance', '<p>Surveillance</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:24:57', '2017-09-02 05:24:57'),
(163, 'conference-rooms', 76, 47, 'content', 'Conference Rooms', '<p>Conference Rooms</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:25:33', '2017-09-02 05:25:33'),
(164, 'auditoriums', 77, 47, 'content', 'Auditoriums', '<p>Auditoriums</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:26:12', '2017-09-02 05:26:12'),
(165, 'surveilllance', 78, 47, 'content', 'Surveillance', '<p>Surveillance</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:26:38', '2017-09-02 05:26:38'),
(166, 'guest-information-display-system', 79, 47, 'content', 'Guest Information Display System', '<p>Guest Information Display System</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:27:08', '2017-09-02 05:27:08'),
(168, 'wireless-hotpot', 80, 47, 'content', 'Wireless Hotspot', '<p>Wireless Hotspot</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:28:58', '2017-09-02 05:28:58'),
(169, 'railways', 81, 48, 'content', 'Railways', '<p>Railways</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:29:48', '2017-09-02 05:29:48'),
(170, 'airports', 82, 48, 'content', 'Airports', '<p>Airports</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:30:18', '2017-09-02 05:30:18'),
(171, 'retail', 102, 48, 'content', 'Retail', '<p>Retail</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:30:40', '2017-09-02 05:30:40'),
(172, 'jewellery-showrooms', 103, 102, 'content', 'Jewellery Showrooms', '<p>Jewellery Showrooms</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:35:42', '2017-09-02 05:31:36'),
(173, 'garment', 104, 102, 'content', 'Garment', '<p>Garment</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:32:21', '2017-09-02 05:32:21'),
(174, 'boutique', 105, 102, 'content', 'Boutique', '<p>Boutique</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:32:49', '2017-09-02 05:32:49'),
(175, 'media', 106, 48, 'content', 'Media', '<p>Media</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:33:23', '2017-09-02 05:33:23'),
(176, 'live-video-call-back', 107, 106, 'content', 'Live Video Call Back', '<p>Live Video Call Back</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:33:41', '2017-09-02 05:33:41'),
(177, 'internet', 108, 106, 'content', 'Internet', '<p>Internet</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-02 05:34:04', '2017-09-02 05:34:04'),
(178, 'video-conferen', 36, 15, 'content', 'Video Conferencing', '<p><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Cloudline_logo_final_jpeg_01 - Copy 1.jpg\" alt=\"\" width=\"950\" height=\"250\" /><br /><br />Cloudline is a hybrid-cloud-based, high-definition, multi-point, video conferencing and collaboration solution. Cloudline permits users to connect in a dynamic display of multiple video images, multiple simultaneously shared desktops with public and private text chat. CloudLine software turns PC, tablet or smartphone with access to IP network into a video conferencing terminal. Cloudline enables you to collaborate more effectively with colleagues, customers, partners and suppliers.</p>\r\n<p>Cloudline media processing core is Voice &amp; Video Engine that provides high-quality voice and video processing and transmission over IP networks.</p>\r\n<p><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Cloudline.jpg\" width=\"950\" height=\"700\" /></p>\r\n<p><strong>Cloudline Server</strong></p>\r\n<p>Scalable software server that supports up to 1000 concurrent video channels per server and enables up to 100 interactive video participants in a conference room.&nbsp;</p>\r\n<p><strong>Client Applications</strong></p>\r\n<p>Cloudline Web</p>\r\n<p>Cloudline Space</p>\r\n<p>Cloudline for iOS</p>\r\n<p>Cloudline for Android</p>\r\n<h1 id=\"mcetoc_1bqui57lh2\" style=\"text-align: left;\">&nbsp;</h1>\r\n<p><br />&nbsp;</p>\r\n<p>&nbsp;</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-21 09:06:15', '2017-09-02 05:37:24'),
(179, 'video-stream', 37, 15, 'content', 'Video Streaming', '<p>&nbsp;</p>\r\n<p>We offer professional services of Capturing, Live streaming, web casting and On Demand Streaming of multimedia contents like audio, video, presentations, and texts with interactive chat from any venue for</p>\r\n<ul>\r\n<li>Event Webcasting</li>\r\n<li>Event recording and creating DVDs ( Ours is the only solution, where no Post editing is required ),</li>\r\n<li>Corporate Communications</li>\r\n<li>Training&nbsp; (Ready multimedia lectures can be prepared),</li>\r\n<li>CME Programs Continuous Medical Education to reach anytime, anywhere.</li>\r\n<li>Distance Learning and e learning.</li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/VMEET.jpg\" alt=\"\" width=\"394\" height=\"169\" /></p>\r\n<p style=\"text-align: center;\"><a href=\"http://atnetindia.net/product/dist-video-streaming/vmeet\">VMEET</a></p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-15 13:27:45', '2017-09-02 05:37:52'),
(180, 'lecture-capture', 33, 14, 'content', 'Lecture Capture', '<p>Brickyard offers an end to end integrated Digital Learning Platform. Teaching and training online becomes easy and engaging with us. Our Solution helps your institution to set up &amp; start delivering live online learning within minutes.(<a href=\"http://www.brickyard.education/\">Read More</a>)</p>\r\n<p><img style=\"float: none; display: block; margin: 0px auto 0px auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Brickyard.jpg\" width=\"950\" height=\"550\" /></p>\r\n<p>&nbsp;</p>', '', NULL, '', '', '', '', '', '', 1, 'N', '2017-11-21 08:36:31', '2017-09-02 05:38:28'),
(182, 'custom-software-integration', 35, 14, 'content', 'Custom Software Integration', '<p>Custom Software Integration</p>', '', NULL, '', '', '', '', '', '', 4, 'Y', '2017-10-05 13:22:52', '2017-09-02 05:39:23'),
(183, 'technical-services', 139, 2, 'content', 'Onsite Systems Integration, Project management, Training & Onsite customer support with certified engineers supporting 300 ++ projects ', '<p><span style=\"font-weight: 400;\">Onsite Systems Integration, Project management, Training &amp; Onsite customer support with certified engineers supporting 300 ++ projects </span></p>', '', 'ee31340b3553fab1e3161841a14c7ee5.png', '', '', '', '', '', '', 0, 'Y', '2017-09-09 12:49:14', '2017-09-04 06:48:41'),
(184, 'onsite-technical-support', 140, 139, 'content', 'Onsite Technical Support', '<p style=\"text-align: center;\"><strong>ATTAC Support</strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">\'Selling products is easy.</p>\r\n<p style=\"text-align: center;\">Providing Solutions is complex.</p>\r\n<p style=\"text-align: center;\">Supporting such solutions is a challenge\'</p>\r\n<p>&nbsp;</p>\r\n<p>At A &amp; T, we understand that the solution implemented has to give you results. You need to concentrate on your primary objectives, when we take care of the solutions to run them. Hence we have a separate team ATTAC &ndash; A &amp; T Technical Assistance Center, handling support. The TAC team is extremely efficient and your problems will be resolved to your utmost satisfaction. We have designed various support packages based on the needs and capability.</p>\r\n<p>Any support queries may be raised via Phone Call / Online website / Fax / email / Video Conferencing call to the ATTAC center detailed below and your support will be taken care of.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>SUPPORT ESCALATION MATRIX</strong></p>\r\n<table class=\"table table-striped\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>Sr.No.</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>Support Actions</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>Product / project is under warranty / AMC / OEM Service Care</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>Product / project is under Premium support,</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>If th</strong><strong>e call is for ON CALL support</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>1</p>\r\n</td>\r\n<td>\r\n<p>Customer Support Manager allocates call to LEVEL B &ndash; Product / Project Engineer</p>\r\n</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>2</p>\r\n</td>\r\n<td>\r\n<p>LEVEL B &ndash; Trouble shoots remotely to find the problem and resolve.</p>\r\n</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>3</p>\r\n</td>\r\n<td>\r\n<p>If problem needs onsite support</p>\r\n</td>\r\n<td>\r\n<p>Deputes a Customer Support Engineer &ndash; LEVEL C &ndash; for onsite visit</p>\r\n</td>\r\n<td>\r\n<p>Deputes a Customer Support Engineer &ndash; LEVEL C &ndash; for onsite visit</p>\r\n</td>\r\n<td>\r\n<p>A) Sales sends quotation for on call support charges.<br /> B) On confirmation, deputes a Customer Support Engineer &ndash; LEVEL &ndash; C &ndash; for onsite visit</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>4</p>\r\n</td>\r\n<td>\r\n<p>If diagnosed as hardware problem / software issues, LEVEL B</p>\r\n</td>\r\n<td>\r\n<p>coordinates with vendor for repair and / or replacement</p>\r\n</td>\r\n<td>\r\n<p>A) arranges a standby<br /> B) coordinates with vendor for repair and / or replacement</p>\r\n</td>\r\n<td>\r\n<p>A) Sales sends quotation for hardware repair / software upgrades<br /> B) On Confirmation, coordinates with vendor for repair / software upgrades.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p><strong>STILL NOT RESOLVED</strong></p>\r\n<p>Problem scaled to Level A &ndash; CTO</p>\r\n<p>If problem still not resolved, please send mail to <strong>md@atnetindia.net</strong> for direct MD&rsquo;s intervention.</p>\r\n<p><strong>Installation user training</strong></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Site inspection and Equipment Inspection and testing at site.</li>\r\n</ul>\r\n<ul>\r\n<li>Network Configuration and designing in consultation with your project manager</li>\r\n<li>Implementation planning.</li>\r\n<li>Equipment installation, configuration &amp; Functional Testing</li>\r\n<li>Interfacing with Other third party vendors for network integration, other audio, video and network equipments</li>\r\n<li>Hand-holding and final handing-over the network</li>\r\n<li>User Level and administrator training</li>\r\n<li>Charges are for Products installation and Integration only. Labour and other service charges mentioned in quotation are not included.</li>\r\n<li>Reinstallation required at any other site will be subject to installation charges again</li>\r\n</ul>\r\n<p><strong>Support services</strong><strong>&nbsp;</strong></p>\r\n<p><strong>BASIC</strong></p>\r\n<ul>\r\n<li>Telephone, Email support &ndash; 24 hours x 7 days</li>\r\n<li>Support over Audio/Video conference on Internet IP support &ndash; 8 Hours x 5 days</li>\r\n<li>Response Time : Within 180 minutes</li>\r\n<li>If Product failure, the equipment to be sent back to A &amp; T HO at customer cost</li>\r\n<li>Repair Time : Within 30 days of receipt of equipment at A &amp; T HO. ( Repair cost free if under warranty / hardware warranty extension)</li>\r\n<li>After repair / check, A &amp; T will return to customer at A &amp; T Cost. ( Repair cost free if under warranty / hardware warranty extension)</li>\r\n<li>The Basic services are for Products only. Labour and other services provided as part of the project are not included.</li>\r\n<li>Telephone, Email support &ndash; 24 hours x 7 days</li>\r\n</ul>\r\n<p><strong>&nbsp;&nbsp;</strong></p>\r\n<p><strong>PREMIUM</strong><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li>Initial support as per Support Service &ndash; Basic plan.</li>\r\n<li>Onsite Support by a specialized product trained engineer after basic Service diagnosis failure report</li>\r\n<li>Response time : Onsite engineer visit within 48 hours from report of problem</li>\r\n<li>Resolve time : Within 72 hrs from report of problem.</li>\r\n<li>Standby unit : Within 72 hours from report of problem on receipt of onsite engineers report</li>\r\n<li>If product failure, equipment taken back/couriered by A &amp; T on its cost</li>\r\n<li>Repair Time : Within 30 days of receipt of equipment at A &amp; T HO ( Repair cost free if under warranty / hardware warranty extension)</li>\r\n<li>After repair / check, A &amp; T will return to customer at A &amp; T Cost with onsite engineer for re installation and take back standby.</li>\r\n<li>The Premium services are for Products only. Labour and other services provided as part of the project are not included.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>OEM\'s Service care</strong></p>\r\n<ul>\r\n<li>OEM Service Care ( Direct from Cisco, Lifesize, Visual Nexus, Mirial, NCast etc. ) ( for Selected products only )</li>\r\n<li>This Service is mandatory to cover Hardware Warranty ( for selected products )</li>\r\n<li>Provides free major Software releases</li>\r\n<li>Priority Level 3 Technical support &ndash; within 180 minutes from OEM direct.</li>\r\n<li>Must be activated with in 90 days of installation / default Software activation</li>\r\n<li>AMS, CON SMB, CON SNT, Comprehensive Gateway Security Suite, etc all come under OEM Care.</li>\r\n</ul>\r\n<p><strong>Hardware warranty</strong></p>\r\n<p><strong>Hardware Warranty / Warranty Extension</strong> ( for Selected products only )</p>\r\n<ul>\r\n<li>All products come with one year Standard Hardware Warranty</li>\r\n<li>The warranty could be extended upto a total of 3 more years.</li>\r\n<li>This could be extended upto a total of 3 more years.</li>\r\n<li>Warranty Extension can be taken out only once &ndash; either for a year or for 2 years or for 3 years.</li>\r\n<li>Warranty Extension need to be activated before the expiry of the original standard warranty.</li>\r\n<li>Equipment to be returned to A &amp; T at customer cost</li>\r\n<li>After repair / check, A &amp; T will return to customer at A &amp; T Cost.</li>\r\n<li>Network and Power accessories like PoE, Power adaptor, Power strip, electrical items, Lan cable, electrical cable, I/O boxes, etc are not covered under warranty.</li>\r\n<li>Products damaged due to physical mishandling, natural disasters, electrical surges, lightening, etc. are not covered under warranty.</li>\r\n<li>Warranty is applicable only at the site of installation. Any materials moved and installed without our knowledge will not be covered under warranty.</li>\r\n<li>Warranty is void if the unit is opened or tampered or is used with any other third party non standard accessories .</li>\r\n</ul>\r\n<p>&nbsp;<strong>On Call Support</strong></p>\r\n<p><strong>Onsite visits, if not under Premium support plan or for installation / reinstallation</strong></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>On Site visit of a trained Product/Network engineer to troubleshoot and identify the defective system</li>\r\n<li>If Equipment defective, A &amp; T communicates estimated repair charges ( if hardware not under warranty ).</li>\r\n<li>If the rates are acceptable, equipment sent to A &amp; T for repair at customer cost,</li>\r\n<li>After repair / check, A &amp; T will return to customer at A &amp; T Cost.</li>\r\n<li>If onsite re-installation needed, on call charges will again apply.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Specialised Training</strong></p>\r\n<p>A &amp; T has a state of the art infrastructure established in their Head Office with all Network &amp; Video application technologies. Regular five days training programs in association with their technology partners are conducted for customers and business partners.</p>\r\n<p>A &amp; T conducts regular 2 / 5 days course in Video Network Technologies for partners and clients. We also offer tailor made training over web cast.</p>\r\n<ul>\r\n<li>Two Day / Five Day indepth Training Programme at our Headquarters with state of the art equipment infrastructure.</li>\r\n<li>Specialised training on equipment trouble shooting, network trouble shooting, additional specific application</li>\r\n<li>Ask for more details &ndash; <a href=\"mailto:training@atnetindia.net\">training@atnetindia.net</a></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Technical Support Services</strong></p>\r\n<ul>\r\n<li>Onsite Infrastructure Management</li>\r\n</ul>\r\n<ul>\r\n<li>Remote Infrastructure Management</li>\r\n<li>Secured Network Consultancy</li>\r\n<li>Comprehensive IT Audit</li>\r\n<li>Onsite / Remote Managed Services</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n<p><strong>Consultancy </strong></p>\r\n<ul>\r\n<li>Identifying Pain Points / bottleneck on the Network</li>\r\n</ul>\r\n<ul>\r\n<li>Designing Video centric Network for secured connectivity and optimum bandwidth utilisation</li>\r\n<li>Study and Design of add on solutions to use the equipment system to the fullest in your environment.</li>\r\n</ul>\r\n<ul>\r\n<li>Consultancy on integrating other equipments and accessories for specific application requirement.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>SUPPORT CONTACTS</strong></p>\r\n<p><strong>Phone </strong></p>\r\n<p>91 &ndash; 9443319894 (24/7 Support)</p>\r\n<p>91452-2522241, 4392222</p>\r\n<p><strong>Fax: </strong>91 &ndash; 452 &ndash; 4210890</p>\r\n<p><strong>Email: </strong><a href=\"mailto:support@atnetindia.net\">support@atnetindia.net</a></p>\r\n<p><strong>Video Conferencing Support:</strong> 59.90.175.18</p>\r\n<p><strong>Online:</strong> <a href=\"http://atnetindia.net/footer_content/customer-support\">Customer Support</a></p>', '', NULL, '', '', '', '', '', '', 3, 'Y', '2017-09-11 12:28:05', '2017-09-04 06:50:27'),
(185, 'networked-av-trainng', 141, 139, 'content', 'Coming Soon...', '<p>Coming Soon...</p>', '', NULL, '', '', '', '', '', '', 4, 'Y', '2017-09-04 09:50:55', '2017-09-04 06:50:50'),
(186, 'systems-integration', 142, 139, 'content', 'Systems Integration', '<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/ICT_AV.png\" alt=\"\" width=\"900\" height=\"450\" /></p>', '', NULL, '', '', '', '', '', '', 1, 'Y', '2017-10-05 13:16:45', '2017-09-04 08:26:57'),
(187, 'ict-av-design', 143, 139, 'content', 'ICT & AV Design', '<p>ICT &amp; AV Design</p>', '', NULL, '', '', '', '', '', '', 2, 'Y', '2017-09-04 08:27:24', '2017-09-04 08:27:24'),
(188, 'ict-av-designs', 144, 2, 'content', 'Professional ICT Systems Design Consultancy services specialising in Audio, Video technologies over secured Networks. Call us for Need analysis, simple to complex Industry & customer centric solutioning or post project documentation.', '<p>Professional ICT Systems Design Consultancy services specialising in Audio, Video technologies over secured Networks. Call us for Need analysis, simple to complex Industry &amp; customer centric solutioning or post project documentation.</p>', '', '23b51095bc237bbb6682434ad47cf699.png', '', '', '', '', '', '', 0, 'Y', '2017-09-09 12:47:30', '2017-09-04 14:25:33'),
(192, 'ashwin', 9999, 0, 'content', 'Managing Director, A & T Video Networks Pvt. Ltd.', '<p>A Video communication, Telemedicine &amp; Tele Education evangelist, handling overall operations, Business Strategy &amp; Business Development at A &amp; T.</p>\r\n<p>Key Strengths :</p>\r\n<p>Strong visioning capability, International Tie Ups, Designing &amp; Developing integrated Solutions using ICT with specialization in Video Communication over IP networks</p>\r\n<p>Personal interest : Philosophy, Culture, Tourism, Social Entreprenuership, Technology.</p>\r\n<p>Public Roles :</p>\r\n<ul>\r\n<li>\r\n<p><strong>Trustee</strong> : Native Lead Foundation, Madurai</p>\r\n</li>\r\n<li>\r\n<p><strong>Convenor - </strong>ICT Task Force, CII, Madurai</p>\r\n</li>\r\n<li>\r\n<p><strong>Member &ndash; Executive Commitee</strong> &ndash; Telemedicine Society of India.</p>\r\n</li>\r\n</ul>\r\n<p>Past Positions :</p>\r\n<ul class=\"pagecontent\">\r\n<li><strong>Founder Member &amp; Chairman </strong>: Internet Users Community of India, Madurai</li>\r\n<li><strong>Founder Member :</strong> Information Technology Development Association, Madurai</li>\r\n<li><strong>Founder Member &amp; President</strong> Software Industries Development Association &ndash; SIDA, Madurai</li>\r\n<li><strong>Chairman : IT Panel</strong>, MADITSSIA, Madurai</li>\r\n<li><strong>Member, Planning and Monitoring Board </strong> &nbsp;&ndash; &nbsp; KLN College of Information Technology.</li>\r\n<li><strong>Member</strong> &ndash;&nbsp; IT Panel, CII, Madurai.</li>\r\n<li><strong>Member </strong>&ndash; MSME Sub Committee, CII South Zone.</li>\r\n<li><strong>Chairman </strong>&ndash; Rotaract Committee &amp; Community Corps, Rotary Club of Madurai West.</li>\r\n</ul>\r\n<p class=\"mt-2\">Important Public role achievements &ndash; :</p>\r\n<ul class=\"pagecontent\">\r\n<li>Active role for bringing in Internet Access to Madurai in 1998</li>\r\n<li>Instrumental in bringing Internet over ISDN to Madurai (6th city in India).</li>\r\n<li>Conducted &lsquo;Internet for All&rsquo;, a major 3 day event attracting 6000 people, in 1998.</li>\r\n<li>Lobbied for Integrated IT park @ the Elcot IT park infrastructure&nbsp;since 2008&nbsp;</li>\r\n<li>Coordinated&nbsp;for policy / norms change in the IT parks / SEZ&rsquo;s established by TN Government so as to accommodate Small IT companies.</li>\r\n<li>Launched the first of its kind program for inculcating innovation in campuses with a unique concept of breeding companies inside the institutions.</li>\r\n</ul>\r\n<p>Notable International Conferences participated &ndash; :</p>\r\n<ul class=\"pagecontent\">\r\n<li>Part of the 15 member Inward Telecommunications Mission from India to the International Birmingham Telecom conclave.&nbsp;<br /> <strong>Selected by the British High Commission, UK &ndash; June 2002.</strong></li>\r\n<li>The Computex exhibitions and conferences at Taiwan.</li>\r\n<li>Presented a paper at the Communicasia Conference&nbsp;at Singapore.</li>\r\n</ul>\r\n<p class=\"mt-2\">Made several Presentations at various seminars &ndash; :</p>\r\n<ul class=\"pagecontent\">\r\n<li>Regular Sessions on IT industry and Entrepreneurship Development across colleges and trade bodies.</li>\r\n<li>Low Cost Surgery Recording at Telemedicon 2015, Kolkotta</li>\r\n<li>Teleeducation in Medical Training &ndash; Tel-e-Health, 2016.</li>\r\n<li>AV Technology in Education\" &ndash; at the Infocomm Conference at Chennai.</li>\r\n<li><a href=\"http://atnetindia.net/video-conferencing\">Video Conferencing</a> in Telemedicine<br /> CII seminar series &ndash; Chennai, Coimbatore, Cochin, Vizag, ..</li>\r\n<li>Applications of Video Conferencing in Railways&nbsp;at various Railway Zone</li>\r\n<li>Telemedicine &amp; Tele&nbsp;Education /&nbsp;Internetworking and Connectivity /&nbsp;Voice, Video, Data / Internet for Business</li>\r\n</ul>\r\n<p style=\"margin-left: 40px;\">The Confederation of Indian Industries,</p>\r\n<p style=\"margin-left: 40px;\">The Tamil Nadu Chamber of Commerce and Industries</p>\r\n<p style=\"margin-left: 40px;\">The Madurai District Tiny &amp; Small Scale Industries Association and various other foras and institutions.</p>', 'Ashwin Desai', NULL, '', '', '', '', '', '', 0, 'Y', '2017-09-16 06:32:42', '2017-09-15 07:16:24'),
(193, 'footer', 9999, 0, 'content', 'Reach Us', '<div class=\"col-xs-12 col-sm-6 col-md-4  col-lg-4\">\r\n<p><strong> Registered Office :</strong></p>\r\n<p>1-B, American Mission lane,</p>\r\n<p>Kamarajar Salai,</p>\r\n<p>Madurai 625 009.</p>\r\n<p>Phone : +91-452-4371457</p>\r\n<p>Fax: +91-452-2326950</p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n<p><strong> Administration Office : </strong></p>\r\n<p>A&amp;T Video Networks Pvt. Ltd.</p>\r\n<p>8-B, Abdul Gaffer Khan Road,</p>\r\n<p>Chinna Chokkikulam,</p>\r\n<p>Madurai 625 002.</p>\r\n<p>Phone/Fax : +91-452-4392222,2522241</p>\r\n<p>Fax: +91-452-4210890</p>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-4\">\r\n<p><strong> Kolkotta : </strong></p>\r\n<p>194 E, I Floor,</p>\r\n<p>Rash Behari Avenue,</p>\r\n<p>Kolkotta &ndash; 700 029</p>\r\n<p>Tel: +91-33-40085954</p>\r\n</div>', 'Reach Us', NULL, '', '', '', '', '', 'About Us', 5, 'Y', '2017-10-09 05:52:24', '2017-09-15 08:53:11'),
(194, 'e-learning', 145, 14, 'content', 'E-Learning', '<p><a href=\"http://www.brickyard.education/\"><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Brickyard.jpg\" alt=\"\" width=\"950\" height=\"250\" /></a></p>', '', NULL, '', '', '', '', '', '', 2, 'Y', '2017-10-05 13:22:07', '2017-10-05 10:07:17'),
(195, 'virtual-learning', 146, 14, 'content', 'Virtual Learning', '<p><a href=\"http://www.brickyard.education/\"><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Brickyard.jpg\" alt=\"\" width=\"950\" height=\"250\" /></a></p>', '', NULL, '', '', '', '', '', '', 3, 'Y', '2017-10-05 13:22:26', '2017-10-05 10:07:42'),
(196, 'video-conf-tely', 147, 26, 'content', 'Video Conferencing', '<p><strong>Tely</strong></p>\r\n<p><span style=\"font-weight: 400;\">Unlike traditional room-based video conferencing solutions, Tely Labs is far more affordable and easy to use (although the product is compatible with Cisco, Polycom, LifeSize and other standards-based systems).</span></p>\r\n<p><span style=\"font-weight: 400;\">Unlike webcam-based PC accessories, Tely Labs appliance solutions don&rsquo;t require a personal computer to set up or use &ndash; it&rsquo;s a self-contained appliance solution that&rsquo;s always plugged in and ready to go at the touch of a button.</span></p>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><img style=\"width: 50%; height: 175px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/telly200.png\" alt=\"Tely200\" /></div>\r\n<h4 class=\"text-center mt-5\"><strong><a title=\"Tely 200\" href=\"http://atnetindia.net/product/video-conference/tely-200\">Tely 200</a></strong></h4>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n<div style=\"border: 1px solid #efefef; padding: 10px;\"><img class=\"img-responsive\" style=\"width: 50%; height: 175px; margin: 0 auto; display: block;\" src=\"http://atnetindia.net/public/js/tinymce/fileman/Uploads/tellyhd1.jpg\" /></div>\r\n<h4 class=\"text-center mt-5\"><strong><a title=\"TelyHD Pro\" href=\"http://atnetindia.net/product/video-conference/telyhd-pro\">TelyHD Pro</a></strong></h4>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-10-12 05:13:16', '2017-10-05 12:51:25'),
(197, 'video-conf-kickle', 147, 26, 'content', 'Kickle', '<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n<h1 id=\"mcetoc_1brmah4me0\">Kickle</h1>\r\n<p>Kickle is the next generation video conferencing room system: Skype room system, wireless display, room booking, whiteboard, annotation, and so much more.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/KICKLE_UI_vidcall_dual - Copy 1.jpg\" alt=\"\" width=\"900\" height=\"400\" /></p>\r\n<h2 class=\"text-center mt-5\" style=\"text-align: center;\"><strong><a title=\"Kickle\" href=\"http://atnetindia.net/product/video-conference/kickle\">Kickle</a></strong></h2>\r\n</div>\r\n</div>', '', NULL, '', '', '', '', '', '', 0, 'N', '2017-11-17 06:49:32', '2017-10-05 13:02:48'),
(198, 'sublink-page-679', 10000, 0, 'content', 'Journey of A&T', '<p>Headquartered in Madurai, A&amp;T, a national high-tech enterprise, was founded in 1996, and provides customer centric design, development, supply and support of ICT solutions, specializing in the comprehensive delivery of Video over IP applications. A&amp;T is a value added distributor of disruptive and innovative video communication products and equipments partnering leading manufacturers of data, audio &amp; video collaboration technologies and caters primarily to Education &amp; Training, Healthcare, Enterprise and Government needs. Innovative solutions designed and implemented include Tele Healthcare and Tele Education for Indian Institute of Science, IBM, Railways, Dinamalar, Apollo Hospitals, Narayan Hrudayalaya, IIM, NIT, and others. Distribution and Solution design are complemented with VMEET, Video Conferencing Services and VSTREAM, Video Streaming services.</p>\r\n<p>A&amp;T is the most comprehensive Tele Health Solution provider with a team having abundance of Telemedicine expertise both in public and private healthcare domains and offering appropriate technologies &amp; bringing unmatched and successful delivery models in Telemedicine projects across the country since 2003. With several turnkey projects and 318 installations at almost all major hospital chains for remote telemedicine centers across the country, A &amp; T has the widest exposure in this field. In alliance with other vendors, it has the capability to offer end to end services in running &amp; managing a complete telemedicine network.</p>\r\n<p>A&amp;T&rsquo;s healthcare Solutions include Telemedicine, Mobile Telemedicine, VCU &ndash; Virtual ICU patients Interaction System, VOTIS &ndash; Virtual Operation Theater interaction system, and AVTIS Ambulance video transmission system.</p>\r\n<p>A &amp; T has a significant presence in the high end digitization of leading educational institutions with over 500 classrooms. Solutions for Education institutions include various e learning technologies like Smart multimedia classrooms, Collaborative Virtual classroom with Video conferencing, Live Lecture Capture, Recording, Live and On Demand web casting, and Digital Library.</p>\r\n<p>A &amp; T has launched an Initiative Teleeducation Network with a portal &ndash; www.teleeducationnetwork.com for &ldquo;academic and Beyond Academics&rdquo; interactive resource sharing for research and educational institutions around the world. A &amp; T has also launched a portal &ndash; www.telemedicinenetwork.org with the objective of establishing a movement to network Tele Medicine service providers and rural clinics and patients across the world with the objective of benefiting the rural masses with better health care.</p>\r\n<p>The Company has 33 employees with presence in 7 locations and is also an ISO 9001 &ndash; 2008 &lsquo;with design&rsquo; certified organization.</p>\r\n<p>Contact: Sangita A.Desai, Executive &ndash; Corporate Relations, sangita@atnetindia.net</p>', 'Journey of A&T', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-10-10 06:48:29', '2017-10-10 06:48:29'),
(199, 'sublink-page-268', 10000, 0, 'content', 'Infocomm 2017', '<p><strong>A &amp; T launches Products &amp; Services at InfoComm India 2017 Exhibition &amp; Summit</strong></p>\r\n<p><span style=\"font-weight: 400;\">A &amp; T Video Networks Pvt. Ltd. is a Value Added Distributor of Video Conferencing &amp; Video Streaming technologies comprising hardware, software and cloud-based services that run on secured, next-generation networks.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"><img style=\"float: left;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Info1.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Info2.jpg\" width=\"293\" height=\"220\" />&nbsp;<img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Info3.jpg\" width=\"293\" height=\"220\" /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">We have just completed a successful exhibition of our products at Infocomm 2017 and so far as one of our key driving principles suggests - \'innovation\' was not only limited to our video solutions! The A&amp;T team, dressed in the traditional South Indian attire of a veshti, stood by as the booth was inaugurated by lighting the \'velakku\' (lamp), as a harbinger of goodwill and prosperity. Mr.Sivakumar, CEO of ICTACT, Tamil Nadu graced our booth and lit the lamp while Matthieu Lourdel Business Manager - Southeast Asia from Kickle was the guest of honor. To further mark our unique presence at the exhibition, we launched three new products - \'Cloudline\', \'Brickyard\' and \'Kickle\'. </span></p>\r\n<p><span style=\"font-weight: 400;\">While these products are unique in their purpose of keeping up with the latest technology, they are also appropriately designed for the Indian user, and cater to fields as different as education, business and medicine. </span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>The highlight of the products launched at Infocomm are:</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Cloudline - Copy 1.jpg\" alt=\"\" width=\"293\" height=\"220\" /><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Kickle.jpg\" alt=\"\" width=\"293\" height=\"220\" /><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Brickyard_White.png\" alt=\"\" width=\"293\" height=\"220\" /></strong></p>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<ul class=\"pagecontent \">\r\n<li><strong>Cloudline:</strong><span style=\"font-weight: 400;\"> With 20 years of Video conferencing experience behind us, with Cloudline, we have stepped into video conferencing as a service. Cloudline is a hybrid On Prem and cloud based, high-definition, multi-point, video conferencing and collaboration solution. It\'s USP is that it permits users to connect in a dynamic display of multiple video images, multiple simultaneously shared desktops with public and private text chat and has been built using a distributed architecture.</span></li>\r\n<li><strong>Kickle:</strong><span style=\"font-weight: 400;\"> We launched Kickle in India for Skype-for-business enterprise boardrooms. It is the next generation video conferencing room system for Microsoft Lync, Skype for business on Premise or Office 365 users offering seamless integration of Skype for Business Video conference experience with Conference room productivity tools using wireless display, room booking, whiteboard, annotation and more.</span></li>\r\n<li><strong>Brickyard:</strong><span style=\"font-weight: 400;\"> A technology-based Software On prem and Cloud platform, catering to the growing field of online education. A platform for creating and managing content, training &amp; imparting courses using eLearning &amp; student assessment and reaching beyond the campus with specialized virtual learning tools &nbsp;Aimed at universities, educational Institutions, K 12 schools, private coaching centers, Corporate Training, it will facilitate reaching out to wider segments and in accelerated learning.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>More&nbsp;Products on Display</strong></p>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n<ul class=\"pagecontent \">\r\n<li><strong>Tely</strong>- Huddle Room</li>\r\n<li><strong>Avermedia</strong>-&nbsp;Wireless&nbsp;Microphone</li>\r\n<li><strong>Acoustic Magic</strong>- Array Microphone</li>\r\n<li><strong>Ncast-&nbsp;</strong>Presentation Recorders</li>\r\n<li><strong>VSTOR-&nbsp;</strong>PC Free Multimedia Recorders</li>\r\n<li><strong>View PTZ-&nbsp;</strong>Camera&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">We are deeply grateful to the Infocomm organizers for such a wonderful opportunity, tying </span><span style=\"font-weight: 400;\">together the power of pro-AV and ICT and for providing a platform to discover game-changing innovations.</span></p>\r\n<p><span style=\"font-weight: 400;\">Contact: Thivia CK, Executive &ndash; Digital Marketing, thivia@atnetindia.net</span></p>', 'Infocomm 2017', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-10-12 09:44:05', '2017-10-10 07:04:07'),
(200, 'sublink-page-717', 10000, 0, 'content', 'Medical College Lecture Capture, Content Development and Delivery ', '<p>&nbsp;</p>\r\n<p><img src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Education.jpg\" alt=\"\" width=\"950\" height=\"150\" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Background</strong></p>\r\n<p><br />Established in 1985, the college is one of the most renowned medical colleges in central Tamil Nadu. They offer Under Graduate, Post Graduate and Doctoral academic programs in medical sciences. They run 35 departments from a large campus that includes an 800 bed tertiary care hospital. The college&rsquo;s vision is to provide medical education of international standards to train committed health-care professionals for achieving their founders dream &ndash; &ldquo;Health for all&rdquo;</p>\r\n<p><br /><strong>The Challenge</strong></p>\r\n<p><br />As a step towards being able to provide this high level of education, the college regularly invites some of the most renowned medical practitioners and educators as their guest faculty and visiting professors. They wanted more of their students to participate in these guest lectures. But they were faced with a challenge. How to fit in so many students into their lecture halls that were not designed for the excess demand? How could they repeat the lecture once it was over? How could they build up their curriculum with these lectures?</p>\r\n<p><br /><strong>The Solution</strong></p>\r\n<p><br />The college then approached A&amp;T Video Networks to design a solution that enables them to both stream a video of the lecture and provide it on-demand to students to view at any time later.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Education1.jpg\" alt=\"\" width=\"500\" height=\"300\" /></p>\r\n<p>Since A&amp;T has been providing audio/ video and Lecture Capturing solutions since 1999, we were able to design an optimum solution for the college.&nbsp; We worked closely with them to implement the three pillars of a successful lecture capture solution:</p>\r\n<ul class=\"pagecontent\">\r\n<li><strong>Technology:</strong> Networks, hardware, software, audio &amp; video equipment</li>\r\n<li><strong>Space:</strong> Lecture hall interiors &amp; environment</li>\r\n<li><strong>Content:</strong> integration of the lecture video and voice, laptop presentation, 3D objects, microscope images, whiteboard writing and info-graphics</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>A&amp;T used NCAST Presentation Recorders as the foundation of the solution because its architecture is specifically designed for this kind of application.&nbsp; With 8 encoders, one Central Content Management module and a Streaming Server, the solution can:</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Education - Copy 1.jpg\" width=\"600\" height=\"300\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Now students are able to not only view the lecture live, but also view it from a digital library through the institution&rsquo;s portal at a time and location of their choice. Since it is tightly integrated with their LDAP, authentication and security is assured. Because of the in-built smart indexing facility, students can search for a particular lecture topic or faculty or lecture date. Students use this when they have missed a lecture or want to reference or review it at their pace. <br />The scalable solution can also be integrated with live surgery lectures from Operation Theatres using A&amp;T&rsquo;s VOTIS solution. In future, the college can also collaborate with other medical colleges and share these lectures with them on a need basis.</p>\r\n<p><br /><strong>Conclusion</strong></p>\r\n<p><br />A&amp;T&rsquo;s Lecture Capture solution has ensured that the students in the institution are able to get maximum knowledge from the eminent professors and medical experts who visit the college. By archiving the lectures, the college has been able to develop their curriculum and give their students a world-class education.<br />The quality of the video stream keeps students captivated since it merges audio, video and multi-media streams &ndash; giving students the feel of being present in the lecture hall. <br />Because of the scalable nature of the solution, the college has ensured that its investment has been protected for the foreseeable future.</p>\r\n<p>To learn more about this success story and how you can implement it in your college, contact us at:</p>\r\n<p><br /><strong>Phone:</strong> +91 94426 19821</p>\r\n<p><strong>Email:</strong> sales@atnetindia.net</p>', 'Medical College Lecture Capture, Content Development and Delivery ', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-11-21 06:00:48', '2017-11-17 11:19:04'),
(201, 'sublink-page-627', 10000, 0, 'content', 'Performance Capture System enhances Management students capability', '<p>Established in established in 1951, the college is situated in Coimbatore. The Campus is spread over 45 acres of land. The college has about 8518 students with Engineering &amp; Technology Departments.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/image_3_.png\" alt=\"\" width=\"450\" height=\"250\" /><br />Management students need to be effective speakers and need to present themselves well once they are in the industry. The institute approached A&amp;T to implement a technology based solution in their collaboration room to monitor and train the students in this aspect. A &amp; T had already implemented a video conferencing solution way back in 2005 and the Institute made effective use of Technology in Education that changed the face of education in their college premises and create more educational opportunities for the students and Faculties.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/image_2_ - Copy 1.png\" alt=\"\" width=\"450\" height=\"250\" /><br /> <br />The College&nbsp;wanted to know the best possible ways to integrate technology in their Collaboration classroom in order to make students get more interested in learning with innovative technology. A&amp;T designed a viable effective and stable Performance Capture solution. Today students are motivated to address the student audience and correction methodologies have been in place to train the students in presentation techniques. <br /> <br />The system is also being used by the institute&nbsp;for general classroom lecture recording which is useful for students who have missed the lectures.</p>', 'Performance Capture System enhances Management students capability', NULL, '', '', '', '', '', 'Sublink Page', 0, 'Y', '2017-11-21 06:18:16', '2017-11-18 06:04:46');
INSERT INTO `cms` (`id`, `slug`, `cat_id`, `parent`, `page_type`, `short_desc`, `content`, `footer_title`, `image`, `page_link`, `page_linktype`, `seo_title`, `seo_description`, `seo_keywords`, `columns`, `position`, `status`, `updated_at`, `created_at`) VALUES
(202, 'lecturecapture', 33, 14, 'content', 'Lecture Capture', '<p>Brickyard offers an end to end integrated Digital Learning Platform. Teaching and training online becomes easy and engaging with us. Our Solution helps your institution to set up &amp; start delivering live online learning within minutes.(<a href=\"http://www.brickyard.education/\">Read More</a>)</p>\r\n<p><img style=\"float: none; display: block; margin: 0px auto 0px auto;\" src=\"http://139.59.75.232/public/js/tinymce/fileman/Uploads/Brickyard.jpg\" width=\"950\" height=\"550\" /></p>\r\n<p>&nbsp;</p>', '', NULL, '', '', '', '', '', '', 0, 'Y', '2017-11-23 11:53:48', '2017-11-21 08:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

CREATE TABLE `customer_support` (
  `cs_id` int(11) NOT NULL,
  `customerid` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `product_type` varchar(40) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `p_serial_no` varchar(55) NOT NULL,
  `physical_condition` varchar(100) NOT NULL,
  `p_complaint` varchar(150) NOT NULL,
  `locally` varchar(150) NOT NULL,
  `purchase` varchar(40) NOT NULL,
  `specify` varchar(100) NOT NULL,
  `support_desc` text NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Y-Active, N-InActive',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`cs_id`, `customerid`, `subject`, `product_type`, `product_name`, `p_serial_no`, `physical_condition`, `p_complaint`, `locally`, `purchase`, `specify`, `support_desc`, `status`, `created_date`, `updated_date`) VALUES
(6, 'haneefa@systimanx.com', 'test subject', 'Video Conferencing', 'test product', '34244343', 'test', 'test', 'test', '20-10-2017', 'test', 'test content', 'Y', '2017-10-13 02:13:51', '2017-10-13 14:13:51'),
(7, 'Thiviakrishnan@outlook.com', 'Test', 'Video Conferencing', 'Test', '123456', 'Test', 'Test', 'Test', '', 'Test', 'Test', 'Y', '2017-10-16 04:46:37', '2017-10-16 04:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_survey`
--

CREATE TABLE `customer_survey` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `ontime` char(10) NOT NULL,
  `response` char(10) NOT NULL,
  `meeting` char(10) NOT NULL,
  `meeting_imp` char(10) NOT NULL,
  `towards` char(10) NOT NULL,
  `action_c` char(10) NOT NULL,
  `informing_p` char(10) NOT NULL,
  `sharing_info` char(10) NOT NULL,
  `effort` char(10) NOT NULL,
  `marinating` char(10) NOT NULL,
  `evaluated1` varchar(100) DEFAULT NULL,
  `signature` varchar(80) DEFAULT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `seal` varchar(80) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_survey`
--

INSERT INTO `customer_survey` (`survey_id`, `user_id`, `customer_name`, `ontime`, `response`, `meeting`, `meeting_imp`, `towards`, `action_c`, `informing_p`, `sharing_info`, `effort`, `marinating`, `evaluated1`, `signature`, `designation`, `date`, `department`, `seal`, `created_at`, `updated_at`) VALUES
(1, 62, 'Test', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Test', '2bafc1eef9e7c1420a4c620d79656c12.jpg', 'Test', '04-10-2017', 'Test', '96366182fc90a4dd13b4cef14592af94.jpg', '2017-10-13 10:24:48', '2017-10-13 10:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `deal_register`
--

CREATE TABLE `deal_register` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `endcustomer` varchar(150) DEFAULT NULL,
  `personincharge` varchar(100) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  `landno` varchar(70) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `opportunity_products` varchar(200) DEFAULT NULL,
  `application` varchar(200) DEFAULT NULL,
  `opportunity_value` varchar(200) DEFAULT NULL,
  `tender_private` varchar(200) DEFAULT NULL,
  `expected_closing_date` varchar(55) DEFAULT NULL,
  `other_accessories_products_needed` varchar(200) DEFAULT NULL,
  `view_my_deals` tinytext,
  `resources` tinytext,
  `status` tinyint(1) NOT NULL COMMENT '0-Pending Approval, 1-Approved, 2-Rejected ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_register`
--

INSERT INTO `deal_register` (`id`, `user_id`, `endcustomer`, `personincharge`, `designation`, `mobileno`, `landno`, `email`, `opportunity_products`, `application`, `opportunity_value`, `tender_private`, `expected_closing_date`, `other_accessories_products_needed`, `view_my_deals`, `resources`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 'ibm', 'gowri', 'SES', '1233456565', '434234', 'gowri@test.com', 'test', 'test123', 'afd', 'test', '01/01/2017', 'test', 'test', 'test', 0, '2017-08-03 15:22:45', '2017-08-03 15:22:45'),
(2, 18, 'SOA', 'jansi', 'SEDS', '2312121212', '232323', 'jansi@est.com', 'test', 'test123', 'afd', 'test', '01/01/2017', 'test', 'test', 'test', 0, '2017-08-03 15:23:25', '2017-08-03 15:23:25'),
(3, 19, 'cust1', 'haneefa', 'SES', '1233456565', '232323', 'haneefa@test.com', 'test', 'test123', 'afd', 'test', '05/08/2017', 'test', NULL, NULL, 0, '2017-08-05 13:16:01', '2017-08-05 13:16:01'),
(4, 61, 'gowri', 'mani', 'CEO', '9091919191', '234343', 'gri@test.com', 'test product', '', 'test', 'dsvf', '2017-09-08', '', NULL, NULL, 0, '2017-09-08 12:59:14', '2017-09-08 12:59:14'),
(7, 74, 'Test', 'Test', 'Test', '', '045226897', 'thiviakrishnan@ymail.com', 'Test', '', 'Test', 'Private', '12-10-2017', '', NULL, NULL, 1, '2017-09-28 05:43:49', '2017-09-28 06:03:23'),
(8, 61, 'Test', 'Test', 'Test', '94425287946', '042568794', 'thiviakrishnan@gmail.com', 'Test', '', '1crore', 'privvate', '26-10-2017', '', NULL, NULL, 1, '2017-10-11 10:19:07', '2017-10-11 10:20:37'),
(9, 61, 'test deal', 'test', 'SE', '9093939393', '054454354', 'testdeal@test.com', 'test', 'test', 'test', 'private', '22-10-2017', 'test', NULL, NULL, 0, '2017-10-22 16:34:29', '2017-10-22 16:34:29'),
(10, 86, 'ZYDUS HEALTHCARE MUMBAI', 'VANDIT UPADHYAY', 'IT HEAD', '', '07966190201', 'vandit.corporate@gmail.com', 'NCAST STREEMING AND RECORDING AND VIEW CAMERA', 'BOARDROOM', '4.5 -5 LACS', 'PRIVATE', '17-11-2017', '', NULL, NULL, 1, '2017-11-17 09:49:41', '2017-11-17 10:07:53'),
(11, 87, 'Sri Ramakrishna Hospital', 'VISWANATH D', 'Manager - Information Technology', '09842334599', '04224500000', 'it@snrsonstrust.org', 'VCU', 'ICU Interaction Solution', '500000', 'Private', '30-11-2017', '', NULL, NULL, 1, '2017-11-18 08:09:24', '2017-11-18 09:15:18'),
(12, 87, 'Sri Ramakrishna Hospital', 'VISWANATH D', 'Manager - Information Technology', '09842334599', '04224500000', 'it@snrsonstrust.org', 'VCU', 'ICU Interaction Solution', '500000', 'Private', '30-11-2017', '', NULL, NULL, 0, '2017-11-18 08:09:31', '2017-11-18 08:09:31'),
(13, 84, 'ELCOT', 'selvamuthukumar', 'Manager Sales', '9940115880', '04442940606', 'selvamuthukumar@originitfs.com', '200', '', '14', 'tender', '10-01-2018', '', NULL, NULL, 1, '2017-11-21 12:45:25', '2017-11-22 11:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `demo_feedback`
--

CREATE TABLE `demo_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `companyname` varchar(150) NOT NULL,
  `location` varchar(100) NOT NULL,
  `person_in_charge` varchar(100) NOT NULL,
  `phoneno` varchar(40) NOT NULL,
  `decision` varchar(150) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `solution_name` varchar(150) NOT NULL,
  `demo_date` varchar(30) NOT NULL,
  `demo_pre` int(10) NOT NULL,
  `demo_pre_text` tinytext NOT NULL,
  `demo_coordination` int(10) NOT NULL,
  `demo_coordination_text` tinytext NOT NULL,
  `tech_detail` int(10) NOT NULL,
  `tech_detail_text` tinytext NOT NULL,
  `product_handling` int(10) NOT NULL,
  `product_handling_text` tinytext NOT NULL,
  `demo_purpose` int(10) NOT NULL,
  `demo_purpose_text` tinytext NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `at_engineer` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_feedback`
--

INSERT INTO `demo_feedback` (`id`, `user_id`, `companyname`, `location`, `person_in_charge`, `phoneno`, `decision`, `product_name`, `solution_name`, `demo_date`, `demo_pre`, `demo_pre_text`, `demo_coordination`, `demo_coordination_text`, `tech_detail`, `tech_detail_text`, `product_handling`, `product_handling_text`, `demo_purpose`, `demo_purpose_text`, `customer_name`, `at_engineer`, `created_at`, `updated_at`) VALUES
(1, 53, 'Sony', 'gowri', 'mani', '9292929292', '02342324', 'mani@test.com', '', '', 1, 'test1', 3, 'test2', 5, 'test3', 3, 'test3', 5, 'test5', '1', '2017-08-24', '2017-08-24 09:13:44', '2017-09-07 15:13:45'),
(2, 64, 'org', 'orgd', 'gs', '9191919191', '23432443', 'org@test.com', '', '', 3, 'test', 1, 'test', 5, 'test', 6, 'test', 1, 'test', '5', '2017-09-08', '2017-09-08 13:58:10', '2017-09-08 13:58:10'),
(3, 64, 'test', 'chennai', 'test', '34324344432', 'test', 'test', 'test', '14-10-2017', 5, 'test', 3, 'test', 1, 'test', 5, 'test', 3, 'test', 'test', 'test', '2017-10-14 12:59:09', '2017-10-14 12:59:09'),
(4, 61, 'test comp', 'chennai', 'test', '0435435554', 'yes', 'test product', 'test', '22-10-2017', 5, 'test', 3, 'test', 2, 'test', 5, 'test', 5, 'test', '3', 'test', '2017-10-22 17:01:54', '2017-10-22 17:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `demo_request`
--

CREATE TABLE `demo_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request` varchar(30) NOT NULL,
  `demo_at` varchar(40) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `location` varchar(70) NOT NULL,
  `demo_date` varchar(20) NOT NULL,
  `demo_time` varchar(20) NOT NULL,
  `person_incharge` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `optradio` varchar(10) NOT NULL,
  `segment` varchar(55) NOT NULL,
  `demon` varchar(55) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `solution_name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_request`
--

INSERT INTO `demo_request` (`id`, `user_id`, `request`, `demo_at`, `company_name`, `location`, `demo_date`, `demo_time`, `person_incharge`, `phone`, `optradio`, `segment`, `demon`, `product_name`, `solution_name`, `created_at`, `updated_at`) VALUES
(1, 53, '', '', 'test', 'chenai', '2017-08-25', '12:34', 'test', '02343243243', 'on', 'education', 'videoconferencing', '', 'test', '2017-08-24 09:12:23', '2017-09-07 15:13:51'),
(4, 55, 'Demo', 'At your site', 'Test', 'Mdu', '28-10-2017', '11 : 09 AM', 'tesr', '0145368779', 'on', 'individualusers', 'Video Conferencing', 'Tely 200', 'Digital Training', '2017-10-16 05:41:27', '2017-10-16 05:41:27'),
(6, 61, 'Demo', 'At your site', 'test', 'chennai', '22-10-2017', '10 : 29 PM', 'test', '03453545435', 'yes', 'education', 'Video Conferencing', 'Tely 200', 'Smart Classroom', '2017-10-22 17:00:04', '2017-10-22 17:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `employee_id` varchar(40) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `location` varchar(70) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Y-Yes, N-No',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `employee_id`, `designation`, `mobile`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'empone', 'emp1@test.com', 'emp01', 'SE', '3412121212', 'Chennai', 'Y', '2017-07-06 08:07:06', '2017-07-06 14:03:53'),
(2, 'emptwo', 'emp2@test.com', 'emp02', 'SQ', '1556545455', 'Madurai', 'Y', '2017-07-06 08:27:48', '2017-07-06 13:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `file_manager_list`
--

CREATE TABLE `file_manager_list` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_path` varchar(300) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_manager_list`
--

INSERT INTO `file_manager_list` (`file_id`, `file_name`, `file_path`, `type`, `permission`, `title`, `parent_id`, `is_deleted`) VALUES
(56, 'PHOTOGRAPH', 'PHOTOGRAPH', 'folder', 'E,P,C,G', '', 0, 0),
(58, 'EXHIBITION-MATERIALS', 'EXHIBITION-MATERIALS', 'folder', 'E', '', 0, 0),
(65, 'OFFICE', 'PHOTOGRAPH/OFFICE', 'folder', 'E', '', 56, 0),
(66, 'CLIENT SITE', 'PHOTOGRAPH/CLIENT SITE', 'folder', 'E,P,C,G', '', 56, 0),
(72, 'BANNERS_STANDEE', 'EXHIBITION-MATERIALS/BANNERS_STANDEE', 'folder', 'E', '', 58, 0),
(73, 'POSTERS', 'EXHIBITION-MATERIALS/POSTERS', 'folder', 'E', '', 58, 0),
(74, 'BOOTH DESIGNS', 'EXHIBITION-MATERIALS/BOOTH DESIGNS', 'folder', 'E', '', 58, 0),
(143, 'IISER', 'PHOTOGRAPH/CLIENT SITE/IISER', 'folder', 'E,P,C,G', '', 66, 0),
(146, 'IISC', 'PHOTOGRAPH/CLIENT SITE/IISC', 'folder', 'C,P,G', '', 66, 0),
(148, 'SOLARTIS', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS', 'folder', 'P,C,G', '', 66, 0),
(193, 'LOGO', 'LOGO', 'folder', 'E', '', 0, 0),
(195, 'CLIENT', 'LOGO/CLIENT', 'folder', 'E', '', 193, 0),
(196, 'PARTNER', 'LOGO/PARTNER', 'folder', 'E', '', 193, 0),
(197, 'OEM', 'LOGO/OEM', 'folder', 'E', '', 193, 0),
(198, 'EDUCATION', 'LOGO/CLIENT/EDUCATION', 'folder', 'P,G,E,C', '', 195, 0),
(204, 'dr-mgr-university.jpg', 'LOGO/CLIENT/EDUCATION/dr-mgr-university.jpg', 'file', 'E', '', 198, 0),
(205, 'ICA.jpg', 'LOGO/CLIENT/EDUCATION/ICA.jpg', 'file', 'E', '', 198, 0),
(206, 'Amrita-University-.png', 'LOGO/CLIENT/EDUCATION/Amrita-University-.png', 'file', 'E', '', 198, 0),
(207, 'RICE.jpg', 'LOGO/CLIENT/EDUCATION/RICE.jpg', 'file', 'E', '', 198, 0),
(208, 'PSG.jpg', 'LOGO/CLIENT/EDUCATION/PSG.jpg', 'file', 'E', '', 198, 0),
(209, 'Alagappa University.png', 'LOGO/CLIENT/EDUCATION/Alagappa University.png', 'file', 'E', '', 198, 0),
(210, 'Biharilal University.jpg', 'LOGO/CLIENT/EDUCATION/Biharilal University.jpg', 'file', 'E', '', 198, 0),
(211, 'RLINS .jpg', 'LOGO/CLIENT/EDUCATION/RLINS .jpg', 'file', 'E', '', 198, 0),
(212, 'Manipal University.jpg', 'LOGO/CLIENT/EDUCATION/Manipal University.jpg', 'file', 'E', '', 198, 0),
(213, 'IISC logo.png', 'LOGO/CLIENT/EDUCATION/IISC logo.png', 'file', 'E', '', 198, 0),
(214, 'Acoustic Magic .png', 'LOGO/OEM/Acoustic Magic .png', 'file', 'E', '', 197, 0),
(215, 'Elmo.jpg', 'LOGO/OEM/Elmo.jpg', 'file', 'E', '', 197, 0),
(217, 'Tely.png', 'LOGO/OEM/Tely.png', 'file', 'E', '', 197, 0),
(219, 'Telemedicine', 'LOGO/CLIENT/Telemedicine', 'folder', 'P,G,E,C', '', 195, 0),
(220, 'GOVERNMENT', 'LOGO/CLIENT/GOVERNMENT', 'folder', 'P,G,E,C', '', 195, 0),
(221, 'EEPC.gif', 'LOGO/CLIENT/GOVERNMENT/EEPC.gif', 'file', 'E', '', 220, 0),
(222, 'Southern Railway.jpg', 'LOGO/CLIENT/GOVERNMENT/Southern Railway.jpg', 'file', 'E', '', 220, 0),
(223, 'municipal-office-madurai-jecm9.jpg', 'LOGO/CLIENT/GOVERNMENT/municipal-office-madurai-jecm9.jpg', 'file', 'E', '', 220, 0),
(224, 'Crisil-Research-Logo.jpg', 'LOGO/CLIENT/GOVERNMENT/Crisil-Research-Logo.jpg', 'file', 'E', '', 220, 0),
(225, 'IndianOil.jpg', 'LOGO/CLIENT/GOVERNMENT/IndianOil.jpg', 'file', 'E', '', 220, 0),
(226, 'Webel.jpg', 'LOGO/CLIENT/GOVERNMENT/Webel.jpg', 'file', 'E', '', 220, 0),
(227, 'CORPORATE', 'LOGO/CLIENT/CORPORATE', 'folder', 'E', '', 195, 0),
(228, 'Eastman.png', 'LOGO/CLIENT/CORPORATE/Eastman.png', 'file', 'E', '', 227, 0),
(229, 'Amoli.jpg', 'LOGO/CLIENT/CORPORATE/Amoli.jpg', 'file', 'E', '', 227, 0),
(230, 'EmporisAcademy.jpg', 'LOGO/CLIENT/CORPORATE/EmporisAcademy.jpg', 'file', 'E', '', 227, 0),
(231, 'JVS.jpg', 'LOGO/CLIENT/CORPORATE/JVS.jpg', 'file', 'E', '', 227, 0),
(232, 'IDFC.png', 'LOGO/CLIENT/CORPORATE/IDFC.png', 'file', 'E', '', 227, 0),
(233, 'lakshmiVilasBank.jpg', 'LOGO/CLIENT/CORPORATE/lakshmiVilasBank.jpg', 'file', 'E', '', 227, 0),
(234, 'LMT.png', 'LOGO/CLIENT/CORPORATE/LMT.png', 'file', 'E', '', 227, 0),
(235, 'Malayala-Manorama.jpg', 'LOGO/CLIENT/CORPORATE/Malayala-Manorama.jpg', 'file', 'E', '', 227, 0),
(236, 'malladi.PNG', 'LOGO/CLIENT/CORPORATE/malladi.PNG', 'file', 'E', '', 227, 0),
(237, 'Merrill.jpg', 'LOGO/CLIENT/CORPORATE/Merrill.jpg', 'file', 'E', '', 227, 0),
(238, 'Real Image.jpg', 'LOGO/CLIENT/CORPORATE/Real Image.jpg', 'file', 'E', '', 227, 0),
(239, 'RS Marketing.jpg', 'LOGO/CLIENT/CORPORATE/RS Marketing.jpg', 'file', 'E', '', 227, 0),
(240, 'SRMB.jpg', 'LOGO/CLIENT/CORPORATE/SRMB.jpg', 'file', 'E', '', 227, 0),
(241, 'Thangamayil.jpg', 'LOGO/CLIENT/CORPORATE/Thangamayil.jpg', 'file', 'E', '', 227, 0),
(242, 'EDICA.png', 'LOGO/CLIENT/CORPORATE/EDICA.png', 'file', 'E', '', 227, 0),
(243, 'Skoda Powwer.jpg', 'LOGO/CLIENT/CORPORATE/Skoda Powwer.jpg', 'file', 'E', '', 227, 0),
(245, 'Aravind.png', 'LOGO/CLIENT/Telemedicine/Aravind.png', 'file', 'E', '', 219, 0),
(246, 'Ashwini Hospital.jpg', 'LOGO/CLIENT/Telemedicine/Ashwini Hospital.jpg', 'file', 'E', '', 219, 0),
(247, 'Apollo Hospitals.jpg', 'LOGO/CLIENT/Telemedicine/Apollo Hospitals.jpg', 'file', 'E', '', 219, 0),
(248, 'CMRI.jpg', 'LOGO/CLIENT/Telemedicine/CMRI.jpg', 'file', 'E', '', 219, 0),
(249, 'Jehangir Hospital.gif', 'LOGO/CLIENT/Telemedicine/Jehangir Hospital.gif', 'file', 'E', '', 219, 0),
(250, 'IGMH.png', 'LOGO/CLIENT/Telemedicine/IGMH.png', 'file', 'E', '', 219, 0),
(251, 'KG.png', 'LOGO/CLIENT/Telemedicine/KG.png', 'file', 'E', '', 219, 0),
(252, 'KLES.png', 'LOGO/CLIENT/Telemedicine/KLES.png', 'file', 'E', '', 219, 0),
(253, 'Manipal Hospital.gif', 'LOGO/CLIENT/Telemedicine/Manipal Hospital.gif', 'file', 'E', '', 219, 0),
(254, 'Prognosys.jpg', 'LOGO/CLIENT/Telemedicine/Prognosys.jpg', 'file', 'E', '', 219, 0),
(255, 'Sankara Nethralaya.jpg', 'LOGO/CLIENT/Telemedicine/Sankara Nethralaya.jpg', 'file', 'E', '', 219, 0),
(256, 'Shri Vinoba Bhave Civil Hospital.jpg', 'LOGO/CLIENT/Telemedicine/Shri Vinoba Bhave Civil Hospital.jpg', 'file', 'E', '', 219, 0),
(257, 'Soni Hospital & Research Center.jpg', 'LOGO/CLIENT/Telemedicine/Soni Hospital & Research Center.jpg', 'file', 'E', '', 219, 0),
(258, 'sri-ramachandra-hospital.png', 'LOGO/CLIENT/Telemedicine/sri-ramachandra-hospital.png', 'file', 'E', '', 219, 0),
(259, 'St. John', 'LOGO/CLIENT/Telemedicine/St. John', 'file', 'E', '', 219, 0),
(260, 'Televital.jpg', 'LOGO/CLIENT/Telemedicine/Televital.jpg', 'file', 'E', '', 219, 0),
(261, 'Vadamalayan.jpg', 'LOGO/CLIENT/Telemedicine/Vadamalayan.jpg', 'file', 'E', '', 219, 0),
(262, 'Vasan.jpg', 'LOGO/CLIENT/Telemedicine/Vasan.jpg', 'file', 'E', '', 219, 0),
(263, 'SGRH.jpg', 'LOGO/CLIENT/Telemedicine/SGRH.jpg', 'file', 'E', '', 219, 0),
(265, 'Periyar_Maniammai_University.jpg', 'LOGO/CLIENT/EDUCATION/Periyar_Maniammai_University.jpg', 'file', 'E', '', 198, 0),
(266, 'Ayyanadar Janaki Ammal College.png', 'LOGO/CLIENT/EDUCATION/Ayyanadar Janaki Ammal College.png', 'file', 'E', '', 198, 0),
(267, 'Anand Institute of Higher Education.jpeg', 'LOGO/CLIENT/EDUCATION/Anand Institute of Higher Education.jpeg', 'file', 'E', '', 198, 0),
(269, 'Kalasalingam.png', 'LOGO/CLIENT/EDUCATION/Kalasalingam.png', 'file', 'E', '', 198, 0),
(270, 'Lady Doak College.jpg', 'LOGO/CLIENT/EDUCATION/Lady Doak College.jpg', 'file', 'E', '', 198, 0),
(271, 'Mahatma.jpg', 'LOGO/CLIENT/EDUCATION/Mahatma.jpg', 'file', 'E', '', 198, 0),
(272, 'Gandhigram University.jpg', 'LOGO/CLIENT/EDUCATION/Gandhigram University.jpg', 'file', 'E', '', 198, 0),
(276, 'Life size.png', 'LOGO/OEM/Life size.png', 'file', 'E', '', 197, 0),
(279, 'HardShop.png', 'LOGO/PARTNER/HardShop.png', 'file', 'E', '', 196, 0),
(280, 'Targus.png', 'LOGO/PARTNER/HardShop.png', 'file', 'E', '', 196, 0),
(302, 'BIRTHDAY-CELEBRATION', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION', 'folder', 'E', '', 65, 0),
(303, 'FESTIVE-CELEBRATION', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION', 'folder', 'E', '', 65, 0),
(304, 'BOOTH', 'PHOTOGRAPH/BOOTH', 'folder', 'P,C,G', '', 56, 0),
(317, 'EVENT', 'PHOTOGRAPH/BOOTH/EVENT', 'folder', 'P,C,G', '', 56, 0),
(320, 'DIAGRAMS', 'DIAGRAMS', 'folder', 'P,E,G,C', '', 0, 0),
(321, 'PICTORIAL', 'DIAGRAMS/PICTORIAL', 'folder', 'P,E,G,C', '', 320, 0),
(322, 'CONNECTIVITY', 'DIAGRAMS/CONNECTIVITY', 'folder', 'E', '', 320, 0),
(323, 'VIDEO STREAMING- TRIBUTE TO ABDUL KALAM', 'PHOTOGRAPH/BOOTH/EVENT/VIDEO STREAMING- TRIBUTE TO ABDUL KALAM', 'folder', 'E,P,C,G', '', 317, 0),
(327, '4.png', 'PHOTOGRAPH/BOOTH/EVENT/VIDEO STREAMING- TRIBUTE TO ABDUL KALAM/4.png', 'file', 'E,P,C,G', '', 323, 0),
(328, 'PRODUCT', 'PRODUCT', 'folder', 'E,P,C,G', '', 0, 0),
(339, 'DATASHEET', 'PRODUCT/DATASHEET', 'folder', 'P,C,G', '', 328, 0),
(340, 'PRESENTATION', 'PRODUCT/PRESENTATION', 'folder', 'P,C,G', '', 328, 0),
(341, 'VIDEO', 'PRODUCT/VIDEO', 'folder', 'P,C,G', '', 328, 0),
(342, 'BROCHURES', 'PRODUCT/BROCHURES', 'folder', 'P,C,G', '', 328, 0),
(441, 'VSTROR.png', 'LOGO/OEM/VSTROR.png', 'file', 'E', NULL, 197, 0),
(457, 'GALLERY', 'GALLERY', 'folder', 'im', NULL, 0, 0),
(459, '1502970403-gallery2.jpg', 'GALLERY/1502970403-gallery2.jpg', 'file', 'im', NULL, 457, 0),
(460, '1502970725-gallery1-old.png', 'GALLERY/1502970725-gallery1-old.png', 'file', 'im', NULL, 457, 0),
(461, '1502970758-gallery4.jpg', 'GALLERY/1502970758-gallery4.jpg', 'file', 'im', NULL, 457, 0),
(462, '1502970758-gallery5.jpg', 'GALLERY/1502970758-gallery5.jpg', 'file', 'im', NULL, 457, 0),
(463, '1502970759-gallery7.jpg', 'GALLERY/1502970759-gallery7.jpg', 'file', 'im', NULL, 457, 0),
(464, '1502970759-gallery6.jpg', 'GALLERY/1502970759-gallery6.jpg', 'file', 'im', NULL, 457, 0),
(465, '1502970759-gallery8.jpg', 'GALLERY/1502970759-gallery8.jpg', 'file', 'im', NULL, 457, 0),
(466, '1502970759-gallery9.jpg', 'GALLERY/1502970759-gallery9.jpg', 'file', 'im', NULL, 457, 0),
(467, '1502970760-gallery10.jpg', 'GALLERY/1502970760-gallery10.jpg', 'file', 'im', NULL, 457, 0),
(468, '1502970760-gallery11.jpg', 'GALLERY/1502970760-gallery11.jpg', 'file', 'im', NULL, 457, 0),
(469, '1502970760-gallery12.jpg', 'GALLERY/1502970760-gallery12.jpg', 'file', 'im', NULL, 457, 0),
(470, '1502970761-gallery13.jpg', 'GALLERY/1502970761-gallery13.jpg', 'file', 'im', NULL, 457, 0),
(471, '1502970761-gallery14.jpg', 'GALLERY/1502970761-gallery14.jpg', 'file', 'im', NULL, 457, 0),
(472, '1502970761-gallery15.jpg', 'GALLERY/1502970761-gallery15.jpg', 'file', 'im', NULL, 457, 0),
(473, '1502970762-gallery16.jpg', 'GALLERY/1502970762-gallery16.jpg', 'file', 'im', NULL, 457, 0),
(474, '1502970762-gallery17.jpg', 'GALLERY/1502970762-gallery17.jpg', 'file', 'im', NULL, 457, 0),
(475, '1502970762-gallery18.jpg', 'GALLERY/1502970762-gallery18.jpg', 'file', 'im', NULL, 457, 0),
(476, '1502970762-gallery19.jpg', 'GALLERY/1502970762-gallery19.jpg', 'file', 'im', NULL, 457, 0),
(477, '1502970763-gallery20.jpg', 'GALLERY/1502970763-gallery20.jpg', 'file', 'im', NULL, 457, 0),
(478, '1502970763-gallery21.jpg', 'GALLERY/1502970763-gallery21.jpg', 'file', 'im', NULL, 457, 0),
(479, '1502970763-gallery22.jpg', 'GALLERY/1502970763-gallery22.jpg', 'file', 'im', NULL, 457, 0),
(480, '1502970764-gallery23.jpg', 'GALLERY/1502970764-gallery23.jpg', 'file', 'im', NULL, 457, 0),
(481, '1502970764-gallery24.jpg', 'GALLERY/1502970764-gallery24.jpg', 'file', 'im', NULL, 457, 0),
(482, '1502970764-gallery25.jpg', 'GALLERY/1502970764-gallery25.jpg', 'file', 'im', NULL, 457, 0),
(483, '1502970765-gallery26.jpg', 'GALLERY/1502970765-gallery26.jpg', 'file', 'im', NULL, 457, 0),
(484, '1502970765-gallery27.jpg', 'GALLERY/1502970765-gallery27.jpg', 'file', 'im', NULL, 457, 0),
(485, '1502970765-gallery28.jpg', 'GALLERY/1502970765-gallery28.jpg', 'file', 'im', NULL, 457, 0),
(486, '1502970766-gallery29.jpg', 'GALLERY/1502970766-gallery29.jpg', 'file', 'im', NULL, 457, 0),
(487, '1502970876-gallery3.jpg', 'GALLERY/1502970876-gallery3.jpg', 'file', 'im', NULL, 457, 0),
(488, 'SOLUTION', 'SOLUTION', 'folder', 'P,G,E,C', NULL, 0, 0),
(489, 'EDUCATION', 'SOLUTION/EDUCATION', 'folder', 'P,G', NULL, 488, 0),
(490, 'HEALTHCARE', 'SOLUTION/HEALTHCARE', 'folder', 'P,G,E,C', NULL, 488, 0),
(491, 'ENTERPRISE', 'SOLUTION/ENTERPRISE', 'folder', 'P,G,E,C', NULL, 488, 0),
(492, 'GOVERNMENT', 'SOLUTION/GOVERNMENT', 'folder', 'P,G', NULL, 488, 0),
(493, 'HOTELS', 'SOLUTION/HOTELS', 'folder', 'P,G,E,C', NULL, 488, 0),
(494, 'INFRA & RETAIL', 'SOLUTION/INFRA & RETAIL', 'folder', 'P,G,E,C', NULL, 488, 0),
(495, 'SMART CLASSROOM', 'SOLUTION/EDUCATION/SMART CLASSROOM', 'folder', 'P,G,E,C', NULL, 489, 0),
(496, 'VIRTUAL CLASSROOM', 'SOLUTION/EDUCATION/VIRTUAL CLASSROOM', 'folder', 'P,G,E,C', NULL, 489, 0),
(497, 'LECTURE CAPTURE- DIGITAL LIBRARY', 'SOLUTION/EDUCATION/LECTURE CAPTURE- DIGITAL LIBRARY', 'folder', 'P,G,E,C', NULL, 489, 0),
(498, 'PERFORMANCE CAPTURE SYSTEM', 'SOLUTION/EDUCATION/PERFORMANCE CAPTURE SYSTEM', 'folder', 'P,G,E,C', NULL, 489, 0),
(499, 'TELEMEDICINE', 'SOLUTION/HEALTHCARE/TELEMEDICINE', 'folder', 'P,G', NULL, 490, 0),
(500, 'SURGERY RECORDING', 'SOLUTION/HEALTHCARE/SURGERY RECORDING', 'folder', 'P,G,E,C', NULL, 490, 0),
(501, 'ICU INTERACTION', 'SOLUTION/HEALTHCARE/ICU INTERACTION', 'folder', 'P,G,E,C', NULL, 490, 0),
(502, 'AMBULANCE VIDEO SYSTEM', 'SOLUTION/HEALTHCARE/AMBULANCE VIDEO SYSTEM', 'folder', 'P,G,E,C', NULL, 490, 0),
(503, 'PATIENT INFORMATION DISPLAY SYTEM', 'SOLUTION/HEALTHCARE/PATIENT INFORMATION DISPLAY SYTEM', 'folder', 'P,G,E,C', NULL, 490, 0),
(504, 'BOARD ROOM- AV', 'SOLUTION/ENTERPRISE/BOARD ROOM- AV', 'folder', 'P,G,E,C', NULL, 491, 0),
(505, 'SMALL CONFERENCE &  HUDDLE ROOMS', 'SOLUTION/ENTERPRISE/SMALL CONFERENCE &  HUDDLE ROOMS', 'folder', 'P,G,E,C', NULL, 491, 0),
(506, 'MOBILITY CONFERENCING', 'SOLUTION/ENTERPRISE/MOBILITY CONFERENCING', 'folder', 'P,G,E,C', NULL, 491, 0),
(507, 'DIGITAL TRAINING', 'SOLUTION/ENTERPRISE/DIGITAL TRAINING', 'folder', 'P,G,E,C', NULL, 491, 0),
(508, 'BOARD ROOM-AV', 'SOLUTION/GOVERNMENT/BOARD ROOM-AV', 'folder', 'P,G,E,C', NULL, 492, 0),
(509, 'SMALL CONFERENCE & HUDDLE ROOMS', 'SOLUTION/GOVERNMENT/SMALL CONFERENCE & HUDDLE ROOMS', 'folder', 'P,G,E,C', NULL, 492, 0),
(510, 'INFORMATION DISPLAY SYSTEM SIGNAGE', 'SOLUTION/GOVERNMENT/INFORMATION DISPLAY SYSTEM SIGNAGE', 'folder', 'P,G,E,C', NULL, 492, 0),
(511, 'CONFERENCE ROOMS', 'SOLUTION/HOTELS/CONFERENCE ROOMS', 'folder', 'P,G,E,C', NULL, 493, 0),
(512, 'AUDITORIUMS', 'SOLUTION/HOTELS/AUDITORIUMS', 'folder', 'P,G,E,C', NULL, 493, 0),
(513, 'GUEST INFORMATION DISPLAY SYSTEM', 'SOLUTION/HOTELS/GUEST INFORMATION DISPLAY SYSTEM', 'folder', 'P,G,E,C', NULL, 493, 0),
(514, 'RAILWAYS', 'SOLUTION/INFRA & RETAIL/RAILWAYS', 'folder', 'P,G,E,C', NULL, 494, 0),
(515, 'AIRPORTS', 'SOLUTION/INFRA & RETAIL/AIRPORTS', 'folder', 'P,G,E,C', NULL, 494, 0),
(516, 'RETAIL', 'SOLUTION/INFRA & RETAIL/RETAIL', 'folder', 'P,G,E,C', NULL, 494, 0),
(517, 'MEDIA', 'SOLUTION/INFRA & RETAIL/MEDIA', 'folder', 'P,G,E,C', NULL, 494, 0),
(529, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/1.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(530, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/2.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(531, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/3.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(532, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/4.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(533, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/5.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(534, '6.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/6.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(539, 'MKU', 'PHOTOGRAPH/CLIENT SITE/MKU', 'folder', 'P,C,G', NULL, 66, 0),
(540, 'LDC', 'PHOTOGRAPH/CLIENT SITE/LDC', 'folder', 'P,C,G', NULL, 66, 0),
(541, 'IIM', 'PHOTOGRAPH/CLIENT SITE/IIM', 'folder', 'P,C,G', NULL, 66, 0),
(542, 'RL INSTITUTE', 'PHOTOGRAPH/CLIENT SITE/RL INSTITUTE', 'folder', 'P,C,G', NULL, 66, 0),
(545, '1.JPG', 'PHOTOGRAPH/CLIENT SITE/IIM/1.JPG', 'file', 'P,C,G', NULL, 541, 0),
(546, '2.JPG', 'PHOTOGRAPH/CLIENT SITE/IIM/2.JPG', 'file', 'P,C,G', NULL, 541, 0),
(547, '1.PNG', 'PHOTOGRAPH/CLIENT SITE/MKU/1.PNG', 'file', 'P,C,G', 'P', 539, 0),
(548, '2.PNG', 'PHOTOGRAPH/CLIENT SITE/MKU/2.PNG', 'file', 'P,C,G', 'P', 539, 0),
(549, '3.PNG', 'PHOTOGRAPH/CLIENT SITE/MKU/3.PNG', 'file', 'P,C,G', 'P', 539, 0),
(550, '1.PNG', 'PHOTOGRAPH/CLIENT SITE/LDC/1.PNG', 'file', 'P,C,G', NULL, 540, 0),
(551, '2.PNG', 'PHOTOGRAPH/CLIENT SITE/LDC/2.PNG', 'file', 'P,C,G', NULL, 540, 0),
(552, '3.PNG', 'PHOTOGRAPH/CLIENT SITE/LDC/3.PNG', 'file', 'P,C,G', NULL, 540, 0),
(553, '1.png', 'PHOTOGRAPH/CLIENT SITE/RL INSTITUTE/1.png', 'file', 'P,C,G', NULL, 542, 0),
(554, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/RL INSTITUTE/2.jpg', 'file', 'P,C,G', NULL, 542, 0),
(555, '3.png', 'PHOTOGRAPH/CLIENT SITE/RL INSTITUTE/3.png', 'file', 'P,C,G', NULL, 542, 0),
(558, 'Infocomm', 'PHOTOGRAPH/BOOTH/Infocomm', 'folder', 'P,C,G', NULL, 304, 0),
(562, 'NIT', 'PHOTOGRAPH/CLIENT SITE/NIT', 'folder', 'P,C,G', NULL, 66, 0),
(563, '1.PNG', 'PHOTOGRAPH/CLIENT SITE/NIT/1.PNG', 'file', 'P,C,G', NULL, 562, 0),
(564, '2.PNG', 'PHOTOGRAPH/CLIENT SITE/NIT/2.PNG', 'file', 'P,C,G', NULL, 562, 0),
(565, '3.PNG', 'PHOTOGRAPH/CLIENT SITE/NIT/3.PNG', 'file', 'P,C,G', NULL, 562, 0),
(566, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/IIM/3.jpg', 'file', 'P,C,G', NULL, 541, 0),
(581, 'TELY', 'PRODUCT/DATASHEET/TELY', 'folder', 'P,C,G', NULL, 339, 0),
(582, 'NCAST', 'PRODUCT/DATASHEET/NCAST', 'folder', 'P,C,G', NULL, 339, 0),
(584, 'CAMERA', 'PRODUCT/DATASHEET/CAMERA', 'folder', 'P,C,G', NULL, 339, 0),
(585, 'AVERMEDIA', 'PRODUCT/DATASHEET/AVERMEDIA', 'folder', 'P,C,G', NULL, 339, 0),
(586, 'ACCOUSTIC MAGIC', 'PRODUCT/DATASHEET/ACCOUSTIC MAGIC', 'folder', 'P,C,G', NULL, 339, 0),
(588, 'TelyHDPro.pdf', 'PRODUCT/DATASHEET/TELY/TelyHDPro.pdf', 'file', 'P,C,G', NULL, 581, 0),
(589, 'Tely200.pdf', 'PRODUCT/DATASHEET/TELY/Tely200.pdf', 'file', 'P,C,G', NULL, 581, 0),
(590, 'NCast PR-HD-Basic-RD Datasheet.pdf', 'PRODUCT/DATASHEET/NCAST/NCast PR-HD-Basic-RD Datasheet.pdf', 'file', 'P,C,G', NULL, 582, 0),
(591, 'NCast-FL-PR-Mini-Flyer.pdf', 'PRODUCT/DATASHEET/NCAST/NCast-FL-PR-Mini-Flyer.pdf', 'file', 'P,C,G', NULL, 582, 0),
(592, 'NCast-DS-PR-Aries-Datasheet.pdf', 'PRODUCT/DATASHEET/NCAST/NCast-DS-PR-Aries-Datasheet.pdf', 'file', 'P,C,G', NULL, 582, 0),
(593, 'NCast-DS-PR-Gemini-Datasheet.pdf', 'PRODUCT/DATASHEET/NCAST/NCast-DS-PR-Gemini-Datasheet.pdf', 'file', 'P,C,G', NULL, 582, 0),
(594, 'NCast-DS-PR-Leo-Datasheet.pdf', 'PRODUCT/DATASHEET/NCAST/NCast-DS-PR-Leo-Datasheet.pdf', 'file', 'P,C,G', NULL, 582, 0),
(595, 'NCast-FL-Galaxy-Series.pdf', 'PRODUCT/DATASHEET/NCAST/NCast-FL-Galaxy-Series.pdf', 'file', 'P,C,G', NULL, 582, 0),
(596, 'VSTOR Premium.pdf', 'PRODUCT/DATASHEET/VSTOR/VSTOR Premium.pdf', 'file', 'P,C,G', NULL, 583, 0),
(598, '1503991541-Wireless Teacher  Mic - AW313.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/1503991541-Wireless Teacher  Mic - AW313.pdf', 'file', 'P,C,G', NULL, 585, 0),
(599, 'Wireless Classroom Audio System - AW 330.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/Wireless Classroom Audio System - AW 330.pdf', 'file', 'P,C,G', NULL, 585, 0),
(600, 'Voice Tracker I Array Microphone.pdf', 'PRODUCT/DATASHEET/ACCOUSTIC MAGIC/Voice Tracker I Array Microphone.pdf', 'file', 'P,C,G', NULL, 586, 0),
(601, 'Voice tracker II Array Microphone.pdf', 'PRODUCT/DATASHEET/ACCOUSTIC MAGIC/Voice tracker II Array Microphone.pdf', 'file', 'P,C,G', NULL, 586, 0),
(602, 'TELY', 'PRODUCT/BROCHURES/TELY', 'folder', 'G,P,C', NULL, 342, 0),
(603, 'NCAST', 'PRODUCT/BROCHURES/NCAST', 'folder', 'G,P,C', NULL, 342, 0),
(604, 'VSTOR', 'PRODUCT/BROCHURES/VSTOR', 'folder', 'G,P,C', NULL, 342, 0),
(605, 'CAMERA', 'PRODUCT/BROCHURES/CAMERA', 'folder', 'G,P,C', NULL, 342, 0),
(606, 'AVERMEDIA', 'PRODUCT/BROCHURES/AVERMEDIA', 'folder', 'G,P,C', NULL, 342, 0),
(607, 'ACCOUSTIC MAGIC', 'PRODUCT/BROCHURES/ACCOUSTIC MAGIC', 'folder', 'G,P,C', NULL, 342, 0),
(608, 'VIDA', 'PRODUCT/BROCHURES/VIDA', 'folder', 'P,C,G', NULL, 342, 0),
(609, 'VIDA.pdf', 'PRODUCT/BROCHURES/VIDA/VIDA.pdf', 'file', 'P,C,G', NULL, 608, 0),
(623, 'VIDA', 'PRODUCT/PRESENTATION/VIDA', 'folder', 'G,P', NULL, 340, 0),
(624, 'A&T VIDEO NETWORKS', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS', 'folder', 'P,C', NULL, 340, 0),
(625, 'NITT.png', 'LOGO/CLIENT/EDUCATION/NITT.png', 'file', 'E', NULL, 198, 0),
(626, 'IISER.jpg', 'LOGO/CLIENT/EDUCATION/IISER.jpg', 'file', 'E', NULL, 198, 0),
(627, 'JIPMER.PNG', 'LOGO/CLIENT/EDUCATION/JIPMER.PNG', 'file', 'E', NULL, 198, 0),
(629, 'TELY', 'LOGO/PRODUCT/TELY', 'folder', 'E', NULL, 439, 0),
(630, 'NCAST', 'LOGO/PRODUCT/NCAST', 'folder', 'E', NULL, 439, 0),
(631, 'VSTOR', 'LOGO/PRODUCT/VSTOR', 'folder', 'E', NULL, 439, 0),
(632, 'VIEW PTZ CAMERA', 'LOGO/PRODUCT/VIEW PTZ CAMERA', 'folder', 'E', NULL, 439, 0),
(633, 'AVERMEDIA', 'LOGO/PRODUCT/AVERMEDIA', 'folder', 'E', NULL, 439, 0),
(634, 'ACCOUSTIC MAGIC', 'LOGO/PRODUCT/ACCOUSTIC MAGIC', 'folder', 'E', NULL, 439, 0),
(636, 'ELMO', 'PRODUCT/DATASHEET/ELMO', 'folder', 'P,C,G', NULL, 339, 0),
(638, 'VIDA', 'PRODUCT/DATASHEET/VIDA', 'folder', 'P,C,G', NULL, 339, 0),
(651, 'View PTZ Camera.jpg', 'LOGO/PRODUCT/VIEW PTZ CAMERA/View PTZ Camera.jpg', 'file', '', NULL, 632, 0),
(660, 'OEM CERTIFICATE', 'PRODUCT/OEM CERTIFICATE', 'folder', 'P,C,G', NULL, 328, 0),
(661, 'Avermedia Distribution Certificate.pdf', 'PRODUCT/DISTRIBUTION CERTIFICATE/Avermedia Distribution Certificate.pdf', 'file', 'P,C,G', NULL, 660, 0),
(662, '7.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/7.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(663, '8.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/8.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(664, '9.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/9.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(665, '10.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/10.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(667, '11.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/11.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(668, '12.jpg', 'PHOTOGRAPH/CLIENT SITE/IISER/12.jpg', 'file', 'E,P,C,G', NULL, 143, 0),
(669, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/NIT/4.jpg', 'file', 'P,C,G', NULL, 562, 0),
(670, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/NIT/5.jpg', 'file', 'P,C,G', NULL, 562, 0),
(671, 'PSG', 'PHOTOGRAPH/CLIENT SITE/PSG', 'folder', 'P,G', NULL, 66, 0),
(672, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/PSG/1.jpg', 'file', 'P,G', NULL, 671, 0),
(673, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/PSG/2.jpg', 'file', 'P,G', NULL, 671, 0),
(674, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/PSG/3.jpg', 'file', 'P,G', NULL, 671, 0),
(675, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/PSG/4.jpg', 'file', 'P,G', NULL, 671, 0),
(676, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/PSG/5.jpg', 'file', 'P,G', NULL, 671, 0),
(687, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER KARAIKAL/1.jpg', 'file', '', NULL, 678, 0),
(688, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER KARAIKAL/2.jpg', 'file', '', NULL, 678, 0),
(689, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER KARAIKAL/3.jpg', 'file', '', NULL, 678, 0),
(690, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER KARAIKAL/4.jpg', 'file', '', NULL, 678, 0),
(691, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER KARAIKAL/5.jpg', 'file', '', NULL, 678, 0),
(697, 'A&T ', 'PRODUCT/BROCHURES/A&T ', 'folder', 'P,C,G', NULL, 342, 0),
(702, 'A&T VIDEO NETWORKS', 'LOGO/A&T VIDEO NETWORKS', 'folder', 'E', NULL, 193, 0),
(703, 'A&T logo grey bg tiff.tif', 'LOGO/A&T VIDEO NETWORKS/A&T logo grey bg tiff.tif', 'file', 'E', NULL, 702, 0),
(704, 'A&T logo with text-16.tif', 'LOGO/A&T VIDEO NETWORKS/A&T logo with text-16.tif', 'file', 'E', NULL, 702, 0),
(705, 'A&T logo transparent tiff.tif', 'LOGO/A&T VIDEO NETWORKS/A&T logo transparent tiff.tif', 'file', 'E', NULL, 702, 0),
(706, 'A&T logo transparent tiff (1).tif', 'LOGO/A&T VIDEO NETWORKS/A&T logo transparent tiff (1).tif', 'file', 'E', NULL, 702, 0),
(707, 'A&T logo white transparent tiff.tif', 'LOGO/A&T VIDEO NETWORKS/A&T logo white transparent tiff.tif', 'file', 'E', NULL, 702, 0),
(710, 'SOLARTIS CHENNAI', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI', 'folder', 'P,C,G', NULL, 148, 0),
(711, 'SOLARTIS MADURAI', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI', 'folder', 'P,C,G', NULL, 148, 0),
(712, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/1.jpg', 'file', 'P,C,G', NULL, 710, 0),
(713, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/2.jpg', 'file', 'P,C,G', NULL, 710, 0),
(714, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/3.jpg', 'file', 'P,C,G', NULL, 710, 0),
(715, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/4.jpg', 'file', 'P,C,G', NULL, 710, 0),
(716, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/5.jpg', 'file', 'P,C,G', NULL, 710, 0),
(717, '6.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/6.jpg', 'file', 'P,C,G', NULL, 710, 0),
(718, '7.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS CHENNAI/7.jpg', 'file', 'P,C,G', NULL, 710, 0),
(719, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI/1.jpg', 'file', 'P,C,G', NULL, 711, 0),
(720, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI/2.jpg', 'file', 'P,C,G', NULL, 711, 0),
(721, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI/3.jpg', 'file', 'P,C,G', NULL, 711, 0),
(722, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI/4.jpg', 'file', 'P,C,G', NULL, 711, 0),
(723, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/SOLARTIS/SOLARTIS MADURAI/5.jpg', 'file', 'P,C,G', NULL, 711, 0),
(727, 'AVERMEDIA', 'EXHIBITION-MATERIALS/POSTERS/DIDAC INDIA/AVERMEDIA', 'folder', '', NULL, 724, 0),
(728, 'NCAST', 'EXHIBITION-MATERIALS/POSTERS/DIDAC INDIA/NCAST', 'folder', '', NULL, 724, 0),
(734, 'BIMSTEC JIPMER', 'PHOTOGRAPH/EVENT/BIMSTEC JIPMER', 'folder', 'P,C,G', NULL, 317, 0),
(735, '2.PNG', 'PHOTOGRAPH/EVENT/BIMSTEC JIPMER/2.PNG', 'file', 'P,C,G', NULL, 734, 0),
(736, '1.PNG', 'PHOTOGRAPH/EVENT/BIMSTEC JIPMER/1.PNG', 'file', 'P,C,G', NULL, 734, 0),
(741, 'JIPMER', 'PHOTOGRAPH/CLIENT SITE/JIPMER', 'folder', 'P,C,G', NULL, 66, 0),
(742, 'JIPMER PONDY', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER PONDY', 'folder', 'P,C,G', NULL, 741, 0),
(743, 'JIPMER KARAIKAL', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL', 'folder', 'P,C,G', NULL, 741, 0),
(746, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER PONDY/1.jpg', 'file', 'P,C,G', NULL, 742, 0),
(747, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER PONDY/2.jpg', 'file', 'P,C,G', NULL, 742, 0),
(748, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL/1.jpg', 'file', 'P,C,G', NULL, 743, 0),
(749, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL/2.jpg', 'file', 'P,C,G', NULL, 743, 0),
(750, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL/3.jpg', 'file', 'P,C,G', NULL, 743, 0),
(751, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL/4.jpg', 'file', 'P,C,G', NULL, 743, 0),
(752, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/JIPMER/JIPMER KARAIKAL/5.jpg', 'file', 'P,C,G', NULL, 743, 0),
(753, 'ALAGAPPA UNIVERSITY', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY', 'folder', 'P,C,G', NULL, 66, 0),
(754, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY/1.jpg', 'file', 'P,C,G', NULL, 753, 0),
(755, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY/2.jpg', 'file', 'P,C,G', NULL, 753, 0),
(756, '3.JPG', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY/3.JPG', 'file', 'P,C,G', NULL, 753, 0),
(757, '4.JPG', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY/4.JPG', 'file', 'P,C,G', NULL, 753, 0),
(758, '5.JPG', 'PHOTOGRAPH/CLIENT SITE/ALAGAPPA UNIVERSITY/5.JPG', 'file', 'P,C,G', NULL, 753, 0),
(759, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/RL INSTITUTE/4.jpg', 'file', 'P,C,G', NULL, 542, 0),
(760, '1.jpg', 'PHOTOGRAPH/CLIENT SITE/IISC/1.jpg', 'file', 'C,P,G', NULL, 146, 0),
(761, '2.jpg', 'PHOTOGRAPH/CLIENT SITE/IISC/2.jpg', 'file', 'C,P,G', NULL, 146, 0),
(762, '3.jpg', 'PHOTOGRAPH/CLIENT SITE/IISC/3.jpg', 'file', 'C,P,G', NULL, 146, 0),
(763, '4.jpg', 'PHOTOGRAPH/CLIENT SITE/IISC/4.jpg', 'file', 'C,P,G', NULL, 146, 0),
(764, '5.jpg', 'PHOTOGRAPH/CLIENT SITE/IISC/5.jpg', 'file', 'C,P,G', NULL, 146, 0),
(765, 'DIDAC', 'PHOTOGRAPH/BOOTH/DIDAC', 'folder', 'P,C', NULL, 304, 0),
(768, 'OFFICE PREMISEs', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs', 'folder', '', NULL, 65, 0),
(777, '2017', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2017', 'folder', '', NULL, 768, 0),
(778, '1.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/1.jpg', 'file', '', NULL, 777, 0),
(779, '2.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/2.jpg', 'file', '', NULL, 777, 0),
(780, '3.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/3.jpg', 'file', '', NULL, 777, 0),
(781, '4.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/4.jpg', 'file', '', NULL, 777, 0),
(783, '6.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/6.jpg', 'file', '', NULL, 777, 0),
(784, '7.jpg', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/02.09.2017/7.jpg', 'file', '', NULL, 777, 0),
(794, 'INFOCOMM', 'EXHIBITION-MATERIALS/BOOTH DESIGNS/INFOCOMM', 'folder', '', NULL, 74, 0),
(795, 'DIDAC', 'EXHIBITION-MATERIALS/BOOTH DESIGNS/DIDAC', 'folder', '', NULL, 74, 0),
(796, 'AVERMEDIA', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA', 'folder', '', NULL, 72, 0),
(797, 'INVITATION BANNER', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/INVITATION BANNER', 'folder', '', NULL, 796, 0),
(798, 'ROLLUP BANNER', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/ROLLUP BANNER', 'folder', '', NULL, 796, 0),
(799, '1.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/INVITATION BANNER/1.jpg', 'file', '', NULL, 797, 0),
(800, '2.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/INVITATION BANNER/2.jpg', 'file', '', NULL, 797, 0),
(801, '3.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/INVITATION BANNER/3.jpg', 'file', '', NULL, 797, 0),
(802, '4.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/INVITATION BANNER/4.jpg', 'file', '', NULL, 797, 0),
(803, '1.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/ROLLUP BANNER/1.jpg', 'file', '', NULL, 798, 0),
(804, '2.jpg', 'EXHIBITION-MATERIALS/BANNERS_STANDEE/AVERMEDIA/ROLLUP BANNER/2.jpg', 'file', '', NULL, 798, 0),
(805, 'AVERMEDIA', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA', 'folder', '', NULL, 73, 0),
(806, '1.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/1.jpg', 'file', '', NULL, 805, 0),
(807, '2.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/2.jpg', 'file', '', NULL, 805, 0),
(808, '3.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/3.jpg', 'file', '', NULL, 805, 0),
(809, '4.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/4.jpg', 'file', '', NULL, 805, 0),
(810, '5.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/5.jpg', 'file', '', NULL, 805, 0),
(811, '6.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/6.jpg', 'file', '', NULL, 805, 0),
(812, '7.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/7.jpg', 'file', '', NULL, 805, 0),
(813, '8.pdf', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/8.pdf', 'file', '', NULL, 805, 0),
(814, '9.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/9.jpg', 'file', '', NULL, 805, 0),
(815, '10.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/10.jpg', 'file', '', NULL, 805, 0),
(816, 'Avermedia.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/Avermedia.jpg', 'file', '', NULL, 805, 0),
(817, '12.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/12.jpg', 'file', '', NULL, 805, 0),
(818, '13.jpg', 'EXHIBITION-MATERIALS/POSTERS/AVERMEDIA/13.jpg', 'file', '', NULL, 805, 0),
(822, '1.png', 'LOGO/PRODUCT/AVERMEDIA/F239/1.png', 'file', '', NULL, 819, 0),
(823, '2.png', 'LOGO/PRODUCT/AVERMEDIA/F239/2.png', 'file', '', NULL, 819, 0),
(824, '3.png', 'LOGO/PRODUCT/AVERMEDIA/F239/3.png', 'file', '', NULL, 819, 0),
(847, 'TELY', 'PRODUCT/VIDEO/TELY', 'folder', '', NULL, 341, 0),
(848, 'VIEW PTZ CAMERA', 'PRODUCT/VIDEO/VIEW PTZ CAMERA', 'folder', '', NULL, 341, 0),
(849, 'NCAST', 'PRODUCT/VIDEO/NCAST', 'folder', '', NULL, 341, 0),
(850, 'AVERMEDIA', 'PRODUCT/VIDEO/AVERMEDIA', 'folder', '', NULL, 341, 0),
(851, 'ACCOUSTIC MAGIC', 'PRODUCT/VIDEO/ACCOUSTIC MAGIC', 'folder', '', NULL, 341, 0),
(852, 'ELMO', 'PRODUCT/VIDEO/ELMO', 'folder', '', NULL, 341, 0),
(853, 'VIDA', 'PRODUCT/VIDEO/VIDA', 'folder', '', NULL, 341, 0),
(854, 'A&T VIDEO NETWORKS', 'PRODUCT/VIDEO/A&T VIDEO NETWORKS', 'folder', '', NULL, 341, 0),
(855, 'AW313', 'PRODUCT/VIDEO/AVERMEDIA-VIDEO/AW313', 'folder', '', NULL, 850, 0),
(856, 'AW330', 'PRODUCT/VIDEO/AVERMEDIA-VIDEO/AW330', 'folder', '', NULL, 850, 0),
(861, 'CV910-Datasheet.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/CV910-Datasheet.pdf', 'file', '', NULL, 585, 0),
(862, 'DS_F239+.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/DS_F239+.pdf', 'file', '', NULL, 585, 0),
(863, 'ET510_DS.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/ET510_DS.pdf', 'file', '', NULL, 585, 0),
(864, 'SE510.pdf', 'PRODUCT/DATASHEET/AVERMEDIA/SE510.pdf', 'file', '', NULL, 585, 0),
(865, 'Brickyard.jpeg', 'EXHIBITION-MATERIALS/BOOTH DESIGNS/DIDAC/Brickyard.jpeg', 'file', '', NULL, 795, 0),
(866, 'A&T .jpeg', 'EXHIBITION-MATERIALS/BOOTH DESIGNS/DIDAC/A&T .jpeg', 'file', '', NULL, 795, 0),
(867, 'TSM.jpg', 'LOGO/CLIENT/EDUCATION/TSM.jpg', 'file', '', NULL, 198, 0),
(868, 'Bharathiar University.png', 'LOGO/CLIENT/EDUCATION/Bharathiar University.png', 'file', '', NULL, 198, 0),
(869, 'CIPET.png', 'LOGO/CLIENT/EDUCATION/CIPET.png', 'file', '', NULL, 198, 0),
(870, 'Institute for Mathematical Sciences.jpg', 'LOGO/CLIENT/EDUCATION/Institute for Mathematical Sciences.jpg', 'file', '', NULL, 198, 0),
(871, 'JAWAHARLAL-NEHRU-CENTRE.jpg', 'LOGO/CLIENT/EDUCATION/JAWAHARLAL-NEHRU-CENTRE.jpg', 'file', '', NULL, 198, 0),
(872, 'Tamil_Nadu_Open_University_logo.jpg', 'LOGO/CLIENT/EDUCATION/Tamil_Nadu_Open_University_logo.jpg', 'file', '', NULL, 198, 0),
(873, 'Thiruvalluvar University.jpg', 'LOGO/CLIENT/EDUCATION/Thiruvalluvar University.jpg', 'file', '', NULL, 198, 0),
(874, 'mepco_wlogo.jpg', 'LOGO/CLIENT/EDUCATION/mepco_wlogo.jpg', 'file', '', NULL, 198, 0),
(876, 'kickle brochure.pdf', 'PRODUCT/BROCHURES/KICKLE/kickle brochure.pdf', 'file', '', NULL, 875, 0),
(877, 'KICKLE', 'EXHIBITION-MATERIALS/POSTERS/KICKLE', 'folder', '', NULL, 73, 0),
(878, 'kickle_v2-poster.PDF', 'EXHIBITION-MATERIALS/POSTERS/KICKLE/kickle_v2-poster.PDF', 'file', '', NULL, 877, 0),
(879, 'KICKLE', 'PRODUCT/PRESENTATION/KICKLE', 'folder', '', NULL, 340, 0),
(881, 'KICKLE', 'LOGO/OEM/KICKLE', 'folder', '', NULL, 197, 0),
(882, 'kickle-md.png', 'LOGO/OEM/KICKLE/kickle-md.png', 'file', '', NULL, 881, 0),
(883, 'KICKEL-favicon.png', 'LOGO/OEM/KICKLE/KICKEL-favicon.png', 'file', '', NULL, 881, 0),
(884, 'kickle-500-carre.png', 'LOGO/OEM/KICKLE/kickle-500-carre.png', 'file', '', NULL, 881, 0),
(885, 'kickle-500-carre-v2.png', 'LOGO/OEM/KICKLE/kickle-500-carre-v2.png', 'file', '', NULL, 881, 0),
(886, 'kickle-500-carre-v3.png', 'LOGO/OEM/KICKLE/kickle-500-carre-v3.png', 'file', '', NULL, 881, 0),
(887, 'KICKLE_bg33_violet.png', 'LOGO/OEM/KICKLE/KICKLE_bg33_violet.png', 'file', '', NULL, 881, 0),
(888, 'KICKLE_bg50_violet.png', 'LOGO/OEM/KICKLE/KICKLE_bg50_violet.png', 'file', '', NULL, 881, 0),
(889, 'KICKLE_bg50_white.png', 'LOGO/OEM/KICKLE/KICKLE_bg50_white.png', 'file', '', NULL, 881, 0),
(890, 'kickle-bd.png', 'LOGO/OEM/KICKLE/kickle-bd.png', 'file', '', NULL, 881, 0),
(891, 'kickle-hd.png', 'LOGO/OEM/KICKLE/kickle-hd.png', 'file', '', NULL, 881, 0),
(892, 'KICKLE', 'LOGO/PRODUCT/KICKLE', 'folder', '', NULL, 439, 0),
(923, '2017', 'PHOTOGRAPH/BOOTH/Infocomm/2017', 'folder', 'P,C,G,E', NULL, 558, 0),
(927, '4.jpeg', 'PHOTOGRAPH/BOOTH/Infocomm/2017/4.jpeg', 'file', 'P,C,G,E', NULL, 923, 0),
(928, '5.jpeg', 'PHOTOGRAPH/BOOTH/Infocomm/2017/5.jpeg', 'file', 'P,C,G,E', NULL, 923, 0),
(929, '2014', 'PHOTOGRAPH/BOOTH/Infocomm/2014', 'folder', 'P,C,G,E', NULL, 558, 0),
(930, '1.PNG', 'PHOTOGRAPH/BOOTH/Infocomm/2016/1.PNG', 'file', 'P,C,G,E', NULL, 929, 0),
(931, '4.PNG', 'PHOTOGRAPH/BOOTH/Infocomm/2016/4.PNG', 'file', 'P,C,G,E', NULL, 929, 0),
(932, '3.PNG', 'PHOTOGRAPH/BOOTH/Infocomm/2016/3.PNG', 'file', 'P,C,G,E', NULL, 929, 0),
(933, '2.PNG', 'PHOTOGRAPH/BOOTH/Infocomm/2016/2.PNG', 'file', 'P,C,G,E', NULL, 929, 0),
(939, '2017', 'PHOTOGRAPH/BOOTH/DIDAC/2017', 'folder', 'E', NULL, 765, 0),
(940, '1.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/1.jpg', 'file', 'E', NULL, 939, 0),
(941, '2.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/2.jpg', 'file', 'E', NULL, 939, 0),
(942, '3.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/3.jpg', 'file', 'E', NULL, 939, 0),
(943, '4.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/4.jpg', 'file', 'E', NULL, 939, 0),
(944, '5.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/5.jpg', 'file', 'E', NULL, 939, 0),
(945, '6.jpg', 'PHOTOGRAPH/BOOTH/DIDAC/2017/6.jpg', 'file', '', NULL, 939, 0),
(946, 'AYUDHA POOJA', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/AYUDHA POOJA', 'folder', 'E', NULL, 303, 0),
(947, '1.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/AYUDHA POOJA/1.jpg', 'file', 'E', NULL, 946, 0),
(948, '2.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/AYUDHA POOJA/2.jpg', 'file', 'E', NULL, 946, 0),
(949, '3.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/AYUDHA POOJA/3.jpg', 'file', 'E', NULL, 946, 0),
(950, '4.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/AYUDHA POOJA/4.jpg', 'file', 'E', NULL, 946, 0),
(953, 'A&T-Brochure.pdf', 'PRODUCT/BROCHURES/A&T /A&T-Brochure.pdf', 'file', '', NULL, 697, 0),
(954, 'BRICKYARD', 'PRODUCT/BROCHURES/BRICKYARD', 'folder', '', NULL, 342, 0),
(955, 'Brickyard-Brochure.pdf', 'PRODUCT/BROCHURES/BRICKYARD/Brickyard-Brochure.pdf', 'file', '', NULL, 954, 0),
(956, 'BRICKYARD', 'LOGO/BRICKYARD', 'folder', '', NULL, 193, 0),
(957, 'CLOUDLINE', 'LOGO/CLOUDLINE', 'folder', '', NULL, 193, 0),
(958, 'Brickyard logo png.png', 'LOGO/BRICKYARD/Brickyard logo png.png', 'file', '', NULL, 956, 0),
(959, 'Brickyard logo tiff.tif', 'LOGO/BRICKYARD/Brickyard logo tiff.tif', 'file', '', NULL, 956, 0),
(960, 'Brickyard logo white png-01.png', 'LOGO/BRICKYARD/Brickyard logo white png-01.png', 'file', '', NULL, 956, 0),
(961, 'brickyard logo white tiff.tif', 'LOGO/BRICKYARD/brickyard logo white tiff.tif', 'file', '', NULL, 956, 0),
(962, 'Cloudline.jpg', 'LOGO/CLOUDLINE/Cloudline.jpg', 'file', '', NULL, 957, 0),
(963, 'Cloudline logo.png', 'LOGO/CLOUDLINE/Cloudline logo.png', 'file', '', NULL, 957, 0),
(964, 'MX-1.pdf', 'PRODUCT/DATASHEET/ELMO/MX-1.pdf', 'file', '', NULL, 636, 0),
(965, 'BRICKYARD', 'PRODUCT/PRESENTATION/BRICKYARD', 'folder', '', NULL, 340, 0),
(969, 'SE510.pdf', 'PRODUCT/PRESENTATION/AVERMEDIA/SE510.pdf', 'file', '', NULL, 576, 0),
(970, 'AW313.pdf', 'PRODUCT/PRESENTATION/AVERMEDIA/AW313.pdf', 'file', '', NULL, 576, 0),
(971, 'AW330.pdf', 'PRODUCT/PRESENTATION/AVERMEDIA/AW330.pdf', 'file', '', NULL, 576, 0),
(972, 'CV910.pdf', 'PRODUCT/PRESENTATION/AVERMEDIA/CV910.pdf', 'file', '', NULL, 576, 0),
(973, 'KICKLE.pdf', 'PRODUCT/PRESENTATION/KICKLE/KICKLE.pdf', 'file', '', NULL, 879, 0),
(975, 'Brickyard.pdf', 'PRODUCT/PRESENTATION/BRICKYARD/Brickyard.pdf', 'file', '', NULL, 965, 0),
(976, 'TEAM OUTING', 'PHOTOGRAPH/OFFICE/TEAM OUTING', 'folder', '', NULL, 65, 0),
(977, '1.jpg', 'PHOTOGRAPH/OFFICE/TEAM OUTING/1.jpg', 'file', '', NULL, 976, 0),
(978, '2.jpg', 'PHOTOGRAPH/OFFICE/TEAM OUTING/2.jpg', 'file', '', NULL, 976, 0),
(979, '2017', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017', 'folder', '', NULL, 302, 0),
(980, 'Karthick.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/Karthick.jpg', 'file', '', NULL, 979, 0),
(983, 'MuthuKumar.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/MuthuKumar.jpg', 'file', '', NULL, 979, 0),
(984, 'S.Kumar.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/S.Kumar.jpg', 'file', '', NULL, 979, 0),
(985, 'Laxman&Thivia.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/Laxman&Thivia.jpg', 'file', '', NULL, 979, 0),
(986, 'Satheesh,Anandh&Navnee.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/Satheesh,Anandh&Navnee.jpg', 'file', '', NULL, 979, 0),
(987, 'Vignesh,Suriya&Subhashini.jpg', 'PHOTOGRAPH/OFFICE/BIRTHDAY-CELEBRATION/2017/Vignesh,Suriya&Subhashini.jpg', 'file', '', NULL, 979, 0),
(988, 'CUSTOMER', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS/CUSTOMER', 'folder', '', NULL, 624, 0),
(989, 'CONFERENCE&EVENTS', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS/CONFERENCE&EVENTS', 'folder', '', NULL, 624, 0),
(990, 'Tele Education in Medical Training - TSI - MGR Univ.pdf', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS/CONFERENCE&EVENTS/Tele Education in Medical Training - TSI - MGR Univ.pdf', 'file', '', NULL, 989, 0),
(993, '17.10.2017.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/17.10.2017.jpg', 'file', '', NULL, 992, 0),
(995, '17.10.2017.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/17.10.2017.jpg', 'file', '', NULL, 992, 0),
(996, '17.10.2017.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/17.10.2017.jpg', 'file', '', NULL, 992, 0),
(997, '17.10.2017.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/17.10.2017.jpg', 'file', '', NULL, 992, 0),
(998, 'DIWALI', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI', 'folder', '', NULL, 303, 0),
(999, '2017', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/2017', 'folder', '', NULL, 998, 0),
(1000, '1.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/2017/1.jpg', 'file', '', NULL, 999, 0),
(1001, '2.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/2017/2.jpg', 'file', '', NULL, 999, 0),
(1002, '3.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/2017/3.jpg', 'file', '', NULL, 999, 0),
(1003, '4.jpg', 'PHOTOGRAPH/OFFICE/FESTIVE-CELEBRATION/DIWALI/2017/4.jpg', 'file', '', NULL, 999, 0),
(1004, 'PRODUCT', 'PHOTOGRAPH/PRODUCT', 'folder', 'E', NULL, 56, 0),
(1005, 'TELY', 'PHOTOGRAPH/PRODUCT/TELY', 'folder', 'E', NULL, 1004, 0),
(1006, 'NCAST', 'PHOTOGRAPH/PRODUCT/NCAST', 'folder', 'E', NULL, 1004, 0),
(1007, 'VSTOR', 'PHOTOGRAPH/PRODUCT/VSTOR', 'folder', 'E', NULL, 1004, 0),
(1008, 'VIEW PTZ CAMERA', 'PHOTOGRAPH/PRODUCT/VIEW PTZ CAMERA', 'folder', 'E', NULL, 1004, 0),
(1009, 'AVERMEDIA', 'PHOTOGRAPH/PRODUCT/AVERMEDIA', 'folder', 'E', NULL, 1004, 0),
(1010, 'ACOUSTIC MAGIC', 'PHOTOGRAPH/PRODUCT/ACOUSTIC MAGIC', 'folder', 'E', NULL, 1004, 0),
(1011, 'ELMO', 'PHOTOGRAPH/PRODUCT/ELMO', 'folder', 'E', NULL, 1004, 0),
(1012, 'KICKLE', 'PHOTOGRAPH/PRODUCT/KICKLE', 'folder', 'E', NULL, 1004, 0),
(1013, 'Tely HD Pro.jpg', 'PHOTOGRAPH/PRODUCT/TELY/Tely HD Pro.jpg', 'file', 'E', NULL, 1005, 0),
(1014, 'Tely200.PNG', 'PHOTOGRAPH/PRODUCT/TELY/Tely200.PNG', 'file', 'E', NULL, 1005, 0),
(1015, 'Galaxy-Rear-Gemini-4404x1278.png', 'PHOTOGRAPH/PRODUCT/NCAST/Galaxy-Rear-Gemini-4404x1278.png', 'file', 'E', NULL, 1006, 0),
(1016, 'Galaxy-Rear-Aries-4424x1288.png', 'PHOTOGRAPH/PRODUCT/NCAST/Galaxy-Rear-Aries-4424x1288.png', 'file', 'E', NULL, 1006, 0),
(1017, 'PR-MINI-Right-1557x1557 (1).png', 'PHOTOGRAPH/PRODUCT/NCAST/PR-MINI-Right-1557x1557 (1).png', 'file', 'E', NULL, 1006, 0),
(1018, 'Galaxy-Rear-Leo-4404x1278.png', 'PHOTOGRAPH/PRODUCT/NCAST/Galaxy-Rear-Leo-4404x1278.png', 'file', 'E', NULL, 1006, 0),
(1019, 'PR_hydra.png', 'PHOTOGRAPH/PRODUCT/NCAST/PR_hydra.png', 'file', 'E', NULL, 1006, 0),
(1020, 'PR_HD_Basic.jpg', 'PHOTOGRAPH/PRODUCT/NCAST/PR_HD_Basic.jpg', 'file', 'E', NULL, 1006, 0),
(1021, 'Presentation Server.png', 'PHOTOGRAPH/PRODUCT/NCAST/Presentation Server.png', 'file', 'E', NULL, 1006, 0),
(1022, 'PR_HD_Extreme.png', 'PHOTOGRAPH/PRODUCT/NCAST/PR_HD_Extreme.png', 'file', 'E', NULL, 1006, 0),
(1024, 'VSTOR Premium.png', 'PHOTOGRAPH/PRODUCT/VSTOR/VSTOR Premium.png', 'file', 'E', NULL, 1007, 0),
(1025, 'Klick.jpg', 'PHOTOGRAPH/PRODUCT/VIEW PTZ CAMERA/Klick.jpg', 'file', 'E', NULL, 1008, 0),
(1026, 'Roomy.jpg', 'PHOTOGRAPH/PRODUCT/VIEW PTZ CAMERA/Roomy.jpg', 'file', 'E', NULL, 1008, 0),
(1027, 'Snap.jpg', 'PHOTOGRAPH/PRODUCT/VIEW PTZ CAMERA/Snap.jpg', 'file', 'E', NULL, 1008, 0),
(1028, 'Konnect.jpg', 'PHOTOGRAPH/PRODUCT/VIEW PTZ CAMERA/Konnect.jpg', 'file', 'E', NULL, 1008, 0),
(1029, 'AW313.jpg', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/AW313.jpg', 'file', 'E', NULL, 1009, 0),
(1030, 'AW330_feature_4.jpg', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/AW330_feature_4.jpg', 'file', 'E', NULL, 1009, 0),
(1031, 'AVerMedia ExtremeCap CV910.png', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/AVerMedia ExtremeCap CV910.png', 'file', 'E', NULL, 1009, 0),
(1032, 'F239.png', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/F239.png', 'file', 'E', NULL, 1009, 0),
(1033, 'SR310_2.png', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/SR310_2.png', 'file', 'E', NULL, 1009, 0),
(1034, 'ET510-2.png', 'PHOTOGRAPH/PRODUCT/AVERMEDIA/ET510-2.png', 'file', 'E', NULL, 1009, 0),
(1035, 'Voice_Tracker_I.jpg', 'PHOTOGRAPH/PRODUCT/ACOUSTIC MAGIC/Voice_Tracker_I.jpg', 'file', 'E', NULL, 1010, 0),
(1036, 'Voice_Tracker_II.jpg', 'PHOTOGRAPH/PRODUCT/ACOUSTIC MAGIC/Voice_Tracker_II.jpg', 'file', 'E', NULL, 1010, 0),
(1037, 'MX_1.jpg', 'PHOTOGRAPH/PRODUCT/ELMO/MX_1.jpg', 'file', 'E', NULL, 1011, 0),
(1038, 'KICKLE_UI-vidcall_dual.jpg', 'PHOTOGRAPH/PRODUCT/KICKLE/KICKLE_UI-vidcall_dual.jpg', 'file', 'E', NULL, 1012, 0),
(1039, 'KICKLE_UI-home_room-booking.jpg', 'PHOTOGRAPH/PRODUCT/KICKLE/KICKLE_UI-home_room-booking.jpg', 'file', 'E', NULL, 1012, 0),
(1040, 'A&T', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS/A&T', 'folder', '', NULL, 624, 0),
(1041, 'AT Profile.pdf', 'PRODUCT/PRESENTATION/A&T VIDEO NETWORKS/A&T/AT Profile.pdf', 'file', '', NULL, 1040, 0),
(1045, 'CLIENT LIST', 'CLIENT LIST', 'folder', 'E', NULL, 0, 0),
(1046, 'over all Partial Client List.pdf', 'CLIENT LIST/over all Partial Client List.pdf', 'file', 'E', NULL, 1045, 0),
(1047, 'Healthcare_Partial Client List (1).pdf', 'CLIENT LIST/Healthcare_Partial Client List (1).pdf', 'file', 'E', NULL, 1045, 0),
(1049, '2.jpeg', 'PHOTOGRAPH/CLIENT SITE/TVS IQL/2.jpeg', 'file', 'E', NULL, 1048, 0),
(1050, '3.jpeg', 'PHOTOGRAPH/CLIENT SITE/TVS IQL/3.jpeg', 'file', 'E', NULL, 1048, 0),
(1051, '1.jpeg', 'PHOTOGRAPH/CLIENT SITE/TVS IQL/1.jpeg', 'file', 'E', NULL, 1048, 0),
(1056, 'Konnect.pdf', 'PRODUCT/DATASHEET/CAMERA/Konnect.pdf', 'file', '', NULL, 584, 0),
(1057, 'Roomy.pdf', 'PRODUCT/DATASHEET/CAMERA/Roomy.pdf', 'file', '', NULL, 584, 0),
(1058, 'Snap.pdf', 'PRODUCT/DATASHEET/CAMERA/Snap.pdf', 'file', '', NULL, 584, 0),
(1059, 'Klick.pdf', 'PRODUCT/DATASHEET/CAMERA/Klick.pdf', 'file', '', NULL, 584, 0),
(1060, 'VIDA', 'PHOTOGRAPH/PRODUCT/VIDA', 'folder', 'E', NULL, 1004, 0),
(1061, 'VIDA.png', 'PHOTOGRAPH/PRODUCT/VIDA/VIDA.png', 'file', 'E', NULL, 1060, 0),
(1062, '2013', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013', 'folder', '', NULL, 768, 0),
(1063, '8.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/8.JPG', 'file', '', NULL, 1062, 0),
(1064, '9.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/9.JPG', 'file', '', NULL, 1062, 0),
(1065, '1.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/1.JPG', 'file', '', NULL, 1062, 0),
(1066, 'DSC_0733.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/DSC_0733.JPG', 'file', '', NULL, 1062, 0),
(1067, '5.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/5.JPG', 'file', '', NULL, 1062, 0),
(1068, '3.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/3.JPG', 'file', '', NULL, 1062, 0),
(1069, '6.JPG', 'PHOTOGRAPH/OFFICE/OFFICE PREMISEs/2013/6.JPG', 'file', '', NULL, 1062, 0),
(1070, 'A&TCorporate Brochure.pdf', 'PRODUCT/BROCHURES/A&T /A&TCorporate Brochure.pdf', 'file', '', NULL, 697, 0),
(1083, 'avermedia.jpg', 'LOGO/OEM/avermedia.jpg', 'file', '', NULL, 197, 0),
(1084, 'Smart Virtual classroom, Lecture capture, eLearning digital library.pdf', 'SOLUTION/EDUCATION/SMART CLASSROOM/Smart Virtual classroom, Lecture capture, eLearning digital library.pdf', 'file', 'C', NULL, 495, 0),
(1085, 'Surgery Recording & Broadcasting.pdf', 'SOLUTION/HEALTHCARE/SURGERY RECORDING/Surgery Recording & Broadcasting.pdf', 'file', '', NULL, 500, 0),
(1086, 'TELY1', 'PRODUCT/PRESENTATION/TELY1', 'folder', '', NULL, 340, 0),
(1087, 'Tely 200.pdf', 'PRODUCT/PRESENTATION/TELY1/Tely 200.pdf', 'file', '', NULL, 1086, 0),
(1088, 'VSTOR', 'DIAGRAMS/CONNECTIVITY/VSTOR', 'folder', 'E', NULL, 322, 0),
(1089, 'Lifesize icon 400 with Vstor Premium (1).jpg', 'DIAGRAMS/CONNECTIVITY/VSTOR/Lifesize icon 400 with Vstor Premium (1).jpg', 'file', 'E', NULL, 1088, 0),
(1090, 'panasonic 1600 with Vstor Premium (1).jpg', 'DIAGRAMS/CONNECTIVITY/VSTOR/panasonic 1600 with Vstor Premium (1).jpg', 'file', 'E', NULL, 1088, 0),
(1091, 'Polycom Group 500 with VSTOR & VT I.jpg', 'DIAGRAMS/CONNECTIVITY/VSTOR/Polycom Group 500 with VSTOR & VT I.jpg', 'file', 'E', NULL, 1088, 0),
(1092, 'Polycom group 700 with vstor premium.JPG', 'DIAGRAMS/CONNECTIVITY/VSTOR/Polycom group 700 with vstor premium.JPG', 'file', 'E', NULL, 1088, 0),
(1093, 'telemedicin.jpg', 'DIAGRAMS/CONNECTIVITY/VSTOR/telemedicin.jpg', 'file', 'E', NULL, 1088, 0),
(1094, 'Cisco sx 20 with vstor prmium (2).jpg', 'DIAGRAMS/CONNECTIVITY/VSTOR/Cisco sx 20 with vstor prmium (2).jpg', 'file', 'E', NULL, 1088, 0),
(1095, 'MD', 'PHOTOGRAPH/MD', 'folder', 'E', NULL, 56, 0),
(1096, 'Ashwin 2.JPG', 'PHOTOGRAPH/MD/Ashwin 2.JPG', 'file', '', NULL, 1095, 0),
(1097, 'Ashwin 3.JPG', 'PHOTOGRAPH/MD/Ashwin 3.JPG', 'file', '', NULL, 1095, 0),
(1098, 'Bharat speech.JPG', 'PHOTOGRAPH/MD/Bharat speech.JPG', 'file', '', NULL, 1095, 0),
(1099, 'dinamalar interview 2.JPG', 'PHOTOGRAPH/MD/dinamalar interview 2.JPG', 'file', '', NULL, 1095, 0),
(1100, 'Dinamalar interview.JPG', 'PHOTOGRAPH/MD/Dinamalar interview.JPG', 'file', '', NULL, 1095, 0),
(1101, 'inaugural speech.JPG', 'PHOTOGRAPH/MD/inaugural speech.JPG', 'file', '', NULL, 1095, 0),
(1102, 'HR Conclave - Inaugural.JPG', 'PHOTOGRAPH/MD/HR Conclave - Inaugural.JPG', 'file', '', NULL, 1095, 0),
(1103, 'inaugural speech 2.JPG', 'PHOTOGRAPH/MD/inaugural speech 2.JPG', 'file', '', NULL, 1095, 0),
(1104, 'valedictory.JPG', 'PHOTOGRAPH/MD/valedictory.JPG', 'file', '', NULL, 1095, 0),
(1105, 'valedictory 2.JPG', 'PHOTOGRAPH/MD/valedictory 2.JPG', 'file', '', NULL, 1095, 0),
(1106, 'valedictory 3.JPG', 'PHOTOGRAPH/MD/valedictory 3.JPG', 'file', '', NULL, 1095, 0),
(1107, 'VMEET', 'PRODUCT/BROCHURES/VMEET', 'folder', '', NULL, 342, 0),
(1108, 'VISIT', 'PRODUCT/BROCHURES/VISIT', 'folder', '', NULL, 342, 0),
(1109, 'vMEET - Brochure.pdf', 'PRODUCT/BROCHURES/VMEET/vMEET - Brochure.pdf', 'file', '', NULL, 1107, 0),
(1112, 'Votis.jpg', 'LOGO/OEM/Votis.jpg', 'file', '', NULL, 197, 0),
(1114, 'VCU.jpg', 'LOGO/OEM/VCU.jpg', 'file', '', NULL, 197, 0),
(1115, 'vmeet.jpg', 'LOGO/OEM/vmeet.jpg', 'file', '', NULL, 197, 0),
(1116, 'Visit.jpg', 'LOGO/OEM/Visit.jpg', 'file', '', NULL, 197, 0),
(1117, 'AcutVista.gif', 'LOGO/PARTNER/AcutVista.gif', 'file', '', NULL, 196, 0),
(1118, 'Visual Nexus.gif', 'LOGO/PARTNER/Visual Nexus.gif', 'file', '', NULL, 196, 0),
(1119, 'Aethra.jpg', 'LOGO/PARTNER/Aethra.jpg', 'file', '', NULL, 196, 0),
(1120, 'Brovis.gif', 'LOGO/PARTNER/Brovis.gif', 'file', '', NULL, 196, 0),
(1121, 'axiscommunications.jpg', 'LOGO/PARTNER/axiscommunications.jpg', 'file', '', NULL, 196, 0),
(1122, 'Cayin.gif', 'LOGO/PARTNER/Cayin.gif', 'file', '', NULL, 196, 0),
(1123, 'Cisco.png', 'LOGO/PARTNER/Cisco.png', 'file', '', NULL, 196, 0),
(1124, 'huawei.jpg', 'LOGO/PARTNER/huawei.jpg', 'file', '', NULL, 196, 0),
(1125, 'lifesize.jpg', 'LOGO/PARTNER/lifesize.jpg', 'file', '', NULL, 196, 0),
(1126, 'Mirial.jpg', 'LOGO/PARTNER/Mirial.jpg', 'file', '', NULL, 196, 0),
(1127, 'Canopy.gif', 'LOGO/PARTNER/Canopy.gif', 'file', '', NULL, 196, 0),
(1128, 'Sonicwall.jpg', 'LOGO/PARTNER/Sonicwall.jpg', 'file', '', NULL, 196, 0),
(1129, 'NCast.png', 'LOGO/PARTNER/NCast.png', 'file', '', NULL, 196, 0),
(1130, 'KICKLE(1)', 'PRODUCT/BROCHURES/KICKLE(1)', 'folder', '', NULL, 342, 0),
(1131, 'kickle brochure.pdf', 'PRODUCT/BROCHURES/KICKLE(1)/kickle brochure.pdf', 'file', '', NULL, 1130, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'tests', 'd9376540746169edd7fb2c3605e698c6.jpg', 1, '2017-08-16 06:18:08', '2017-08-16 06:18:08'),
(2, 'gallery-title', 'gallery-title', 'a3a386f48b6c9a2726c3afd7dbb81c7b.jpg', 1, '2017-08-10 07:55:15', '2017-08-10 07:55:15'),
(3, 'Launch of India Yellow Pages - yellow pages on the internet - 1996', 'launch-of-india-yellow-pages-yellow-pages-on-the-internet-1996', '35126633f215985bb81abc79c529a1a5.jpg', 1, '2017-08-16 05:59:51', '2017-08-16 05:59:51'),
(4, 'Mr.Antony, Mr.Ratnavelu, Mr.Mahendra Gandhi and our MD at the launch of India Yellow Pages - 1996', 'mr-antony-mr-ratnavelu-mr-mahendra-gandhi-and-our-md-at-the-launch-of-india-yellow-pages-1996', 'dcb8898cdfb9d124e1f6f220e1bfd96b.jpg', 1, '2017-08-16 06:09:04', '2017-08-16 06:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE `master_category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL COMMENT 'N-Inactive,Y-active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Prabhu1', 0, 'Y', '0000-00-00 00:00:00', '2017-06-03 09:52:54'),
(2, 'test', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'asdsadsadsa', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'asdsadsadsa', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'asdsadsadsa', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'asdsadsadsa', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'asdsadsadsadas', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'tesdsfdsfds', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'testasdasdsa', 0, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'test111', 1, 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'test1112', 2, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'test', 2, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'test', 1, 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'IT companies', 0, 'Y', '2017-06-03 09:53:11', '2017-06-03 09:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_18_131257_create_admins_table', 1),
(4, '2016_10_18_131630_create_admins_passowrd_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `our_client`
--

CREATE TABLE `our_client` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y' COMMENT 'N-Inactive,Y-active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_client`
--

INSERT INTO `our_client` (`id`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'http://google.com', 'a64807694c8b6ad32946444005937acd.png', 'N', '2017-06-21 13:28:19', '2017-07-19 10:59:57'),
(2, 'http://yahoo.com', '41c6abab1e9beca5f7c310dbf1c77601.png', 'N', '2017-06-21 13:29:52', '2017-07-19 10:59:57'),
(3, 'http://msn.com', '8140d3e5ca4f6b2e7eab45ae798a0fc9.png', 'N', '2017-06-21 13:30:05', '2017-07-19 10:59:57'),
(4, 'http://google.com', 'c03ce2a7a6da99a863fef27a9d1b3348.png', 'N', '2017-06-21 13:30:42', '2017-07-19 10:59:57'),
(5, 'http://test.com', 'c28429a18deb8853dcf6c7db9bf839e6.png', 'N', '2017-06-21 13:31:04', '2017-07-19 10:59:57'),
(6, 'http://systimanx.xyz/atnet_web/public/', '15c42caa6fff0bf38b4fa21d20ce6fef.jpg', 'N', '2017-07-18 11:02:23', '2017-07-19 10:59:57'),
(7, 'applo', 'c6e76bdf8b210c93b470ed9bae876593.png', 'N', '2017-07-19 11:00:12', '2017-07-19 11:00:31'),
(8, 'apollo', '6052b2d3f8c5824bf4d8c44fbbcaa895.png', 'Y', '2017-07-19 11:00:46', '2017-07-19 11:00:46'),
(9, 'http://systimanx.xyz/atnet_web/public/', 'b308092441e771a341c5effd55241f15.jpg', 'N', '2017-07-19 11:39:10', '2017-07-19 11:40:02'),
(10, 'http://systimanx.xyz/atnet_web/public/', '3396ffed1c152a6ffe6774cc9bf4eec4.png', 'N', '2017-07-19 11:39:22', '2017-07-19 11:40:02'),
(11, 'http://systimanx.xyz/atnet_web/public/', 'b4398478c0e7cd656f4883d7314f7532.jpg', 'Y', '2017-07-20 09:25:52', '2017-07-20 09:25:52'),
(12, 'http://systimanx.xyz/atnet_web/public/', 'fe09c789406c516d5ab1987a921bcb8a.png', 'Y', '2017-07-20 09:25:58', '2017-07-20 09:25:58'),
(13, 'http://systimanx.xyz/atnet_web/public/', '482aae8faaf96d6b23e7dbc8bd08f54b.jpg', 'Y', '2017-07-20 09:26:05', '2017-07-20 09:26:05'),
(14, 'http://systimanx.xyz/atnet_web/public/', '8f1bf79e5777c4a219c85c280962d9c9.jpg', 'Y', '2017-07-20 09:26:36', '2017-07-20 09:26:36'),
(15, 'http://systimanx.xyz/atnet_web/public/', '468f4b3303cb54a810a76b72780d0fba.jpg', 'Y', '2017-07-20 09:26:55', '2017-07-20 09:26:56'),
(16, 'http://systimanx.xyz/atnet_web/public/', '31d57f239cc2b243ef8b5a0ad19632a8.jpg', 'Y', '2017-07-20 09:35:21', '2017-07-20 09:35:21'),
(17, 'http://systimanx.xyz/atnet_web/public/', '5ae2c10c703da54d828217bcf80a7795.png', 'Y', '2017-07-21 07:41:21', '2017-07-21 07:41:21'),
(18, 'http://systimanx.xyz/atnet_web/public/', '896cdfc647eca0b95e759a90778b27df.jpg', 'Y', '2017-07-21 07:50:28', '2017-07-21 07:50:28'),
(19, 'http://systimanx.xyz/atnet_web/public/', '2bb4a27c3f9fe20a0c34d82a0f0f7c20.jpg', 'Y', '2017-07-21 07:57:17', '2017-07-21 07:57:17'),
(20, 'http://systimanx.xyz/atnet_web/public/', '27ab481b6e8f9e5529b149365eec9200.png', 'Y', '2017-07-24 05:50:36', '2017-07-24 05:50:36'),
(21, 'http://systimanx.xyz/atnet_web/public/', '366bb06379c05063f791e510a51e0145.jpg', 'N', '2017-07-24 05:51:30', '2017-07-24 10:20:01'),
(22, 'http://systimanx.xyz/atnet_web/public/', 'a67e0491db6f6e05c60c3970ee6b1253.jpg', 'N', '2017-07-24 05:51:55', '2017-07-24 10:19:37'),
(23, 'http://systimanx.xyz/atnet_web/public/', 'e9401a9b29888718a34b0553d3468f8c.png', 'Y', '2017-07-24 05:52:26', '2017-07-24 05:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cms_id` int(11) DEFAULT NULL,
  `features` mediumtext,
  `technical_specification` text,
  `description` text,
  `data_sheet` text,
  `benefits` text NOT NULL,
  `without_clearfix` mediumtext,
  `solution` mediumtext,
  `status` varchar(255) NOT NULL COMMENT 'Y-Active,N-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `slug`, `name`, `cms_id`, `features`, `technical_specification`, `description`, `data_sheet`, `benefits`, `without_clearfix`, `solution`, `status`, `created_at`, `updated_at`) VALUES
(8, 'pr-hd-basic', 'PR-HD Basic', 8, '<p><span style=\"font-weight: 400;\">Integrated Video and Graphics. PR-HD technology integrates high resolution graphics and video sources into a PiP(Picture-in-Picture) or Picture-by-Picture format for H.264 playback.</span></p>\r\n<p><span style=\"font-weight: 400;\">PiP Customization. Robust control set available for Picture-in-Picture technology, logo insertion and textual description. Graphical and dynamic text overlays add details.</span></p>\r\n<p><span style=\"font-weight: 400;\">Channel/Session Templates. User-defined preset templates simplify session setup.</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Resolution. Supports up to WUXGA (1920*1200) input and WXGA(1280*720) capture and streaming capabilities.</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Quality. Retain full integrity of original image using motion adaptive de-interlacing.</span></p>\r\n<p><span style=\"font-weight: 400;\">Audio Capabilities. Audio input is fully synchronized with the video and graphics presentation for flawless playback.</span></p>\r\n<p><span style=\"font-weight: 400;\">Record Capabilities. Archiving feature captures any source for later download or remote viewing.</span></p>\r\n<p><span style=\"font-weight: 400;\">Completely Automated. Automated scheduling, recording, work-flow processing and distributing.</span></p>', '<p><span style=\"font-weight: 400;\">Video Inputs. DVI, RGB, HDMI, Displayport, Composite Video</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Resolutions &amp; Performance. Simultaneously records and steams up to 720p (1280*720) at 30fps</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Outputs. W*GA(1280*720)</span></p>\r\n<p><span style=\"font-weight: 400;\">Audio. MP4</span></p>\r\n<p><span style=\"font-weight: 400;\">Network Interface.Ethernet 10/100 Mbps</span></p>\r\n<p><span style=\"font-weight: 400;\">Encoding Bitrates. Graphics 128 Kbps to 5Mbps</span></p>\r\n<p><span style=\"font-weight: 400;\">Archive Features.Archive and record options-32/64/128 GB storage</span></p>\r\n<p><span style=\"font-weight: 400;\">Streaming Capabilities. Multicast, RTSP or RTMP Unicast to a Streaming Server</span></p>', '<p><span style=\"font-weight: 400;\">The PR-HD-BASIC-M/P captures video, audio and computer feeds together into a combined HD video that records the entire presentation to the very popular H.264/MP4 open standard. The PR-HD-BASIC-M/P may also simultaneously stream the resulting file either locally within a network or across the internet with the NCast Presentation Server or other content delivery services.</span></p>', '6bff88983815a6285e04d10b83fb7e59.pdf', '<p><span style=\"font-weight: 400;\">Capture- Several multimedia feeds: graphics, video and audio</span></p>\r\n<p><span style=\"font-weight: 400;\">Compose- These feeds with PiP into a single multimedia stream</span></p>\r\n<p><span style=\"font-weight: 400;\">Encode- The stream into a standard MP4(H.264) file</span></p>\r\n<p><span style=\"font-weight: 400;\">Cast-That file on the Internet using real time streaming protocols</span></p>\r\n<p><span style=\"font-weight: 400;\">Archive- The stream for on-demand viewing.</span></p>', NULL, NULL, 'Y', '2017-08-09 06:15:52', '2017-08-09 06:15:52'),
(9, 'pr-hd-extreme', 'PR-HD Extreme', 8, '<p><span style=\"font-weight: 400;\">Integrated Video and Graphics. PR-HD technology integrates high resolution graphics and video sources into a PiP(Picture-in-Picture) or Picture-by-Picture format for H.264 playback.</span></p>\r\n<p><span style=\"font-weight: 400;\">PiP Customization. Robust control set available for Picture-in-Picture technology, logo insertion and textual description. Graphical and dynamic text overlays add details.</span></p>\r\n<p><span style=\"font-weight: 400;\">Channel/Session Templates. User-defined preset templates simplify session setup.</span></p>\r\n<p><span style=\"font-weight: 400;\">Scheduling. Schedule one or more Recorders using Google iCalendar based tools.</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Resolution. Supports up to WUXGA (1920*1200) input and WXGA(1280*720) capture and streaming capabilities.</span></p>\r\n<p><span style=\"font-weight: 400;\">Record Capabilities. Archiving feature captures any source for later download or remote viewing.</span></p>\r\n<p><span style=\"font-weight: 400;\">Playback Options. Recorded archives auto-upload to a VOD server. H.264 encoding is compatible with Flash Media Players.</span></p>\r\n<p><span style=\"font-weight: 400;\">Desktop Players. Anyone connected to the network may view a presentation via a web browser or media player(Flash, Quicktime, VLC, HTML5 etc.) Playback by Windows Media Player and more.</span></p>', '<p><span style=\"font-weight: 400;\">Garaphic and Video Inputs. DVI-I(Laptops, HD Video), RGB(DB15),Y-Pr-Pb, HDMI, Display Port, Composite Video.</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Resolutions &amp; Performance. Simultaneously records and streams up to 720p(1280*720) at 30 fps</span></p>\r\n<p><span style=\"font-weight: 400;\">Graphics Outputs. 720p(1280*720)/1080i (1920*1080)</span></p>\r\n<p><span style=\"font-weight: 400;\">Audio.MP4</span></p>\r\n<p><span style=\"font-weight: 400;\">Network Interface. RJ-45(LAN, DSL, Cable Modem), Ethernet 10/100 Mbps, DHCP</span></p>\r\n<p><span style=\"font-weight: 400;\">Encoding Birates. Graphics 128kbps to 10 Mbps</span></p>\r\n<p><span style=\"font-weight: 400;\">Archive Features-Solid state Disk- Archive and record options-32/64/128 GB storage</span></p>\r\n<p><span style=\"font-weight: 400;\">Streaming Capabilities. Multicast, RSTP or RTMP Unicast to a Streaming server.</span></p>', '<p><span style=\"font-weight: 400;\">The PR-HD-EXTREME-M/P captures video, audio and computer feeds together into a combined HD video, audio and computer feeds together into a combined HD video that records the entire presentation to the very popular H.264/MP4 open standard. The PR-HD-EXTREME-M/P may also simultaneously stream the resulting file either locally within a network or across the internet with the NCast Presentation Server or other content delivery services.</span></p>', '0827497bc67031597554656f2a60cc04.png', '<p><span style=\"font-weight: 400;\">Capture- Several multimedia feeds: graphics, video and audio</span></p>\r\n<p><span style=\"font-weight: 400;\">Compose- These feeds with PiP into a single multimedia stream</span></p>\r\n<p><span style=\"font-weight: 400;\">Encode- The stream into a standard MP4(H.264) file</span></p>\r\n<p><span style=\"font-weight: 400;\">Cast-That file on the Internet using realtime streaming protocols</span></p>\r\n<p><span style=\"font-weight: 400;\">Archive- The stream for on-demand viewing.</span></p>', NULL, NULL, 'Y', '2017-08-09 06:24:39', '2017-08-09 06:24:39'),
(11, 'pr-hydra', 'PR-Hydra', 8, '<p><span style=\"font-weight: 400;\">Three Window Capture and Streaming</span></p>\r\n<p><span style=\"font-weight: 400;\">Dual-screen Recording and Streaming</span></p>\r\n<p><span style=\"font-weight: 400;\">High-resolution, High Frame-rate Recording. The recording of 1080p 60 frame/second</span></p>\r\n<p><span style=\"font-weight: 400;\">Three compression engines.</span></p>', '<p><span style=\"font-weight: 400;\">RAM and Storage. Internal 2.5\" Hard Drive-1TB, SATA 6 Gb/s, 5400RPM, 16MB Cache</span></p>\r\n<p><span style=\"font-weight: 400;\">Video and Graphics Inputs: HDMI-1, DVI-1, Displayport, VGA, Component, 3G-SDI, HDMI-2</span></p>\r\n<p><span style=\"font-weight: 400;\">Video and Graphics Outputs: HDMI Out, VGA Out</span></p>\r\n<p><span style=\"font-weight: 400;\">Audio Inputs and Outputs: Balanced Line in Left- Phoenix Connector, Balanced Line in Right-Phoenix Connector</span></p>\r\n<p><span style=\"font-weight: 400;\">Network: Ethernet 10/100/1000 connector</span></p>', '<p><span style=\"font-weight: 400;\">The PR-Hydra is the newest of NCast\'s presentation recorder products. It is the first in the industry to record two full-screen layouts and create a composite layer. It does this while also maintaining the ability to record and stream to a single screen side-by-side. The new PR-Hydra has three windows, which allows for streaming of three views while retaining the high-quality original recording.</span></p>', '56a2656dc5c7e52d33636fddca2e8567.png', '<p><span style=\"font-weight: 400;\">Picture-by-picture Composition and Graphical Overlays</span></p>\r\n<p><span style=\"font-weight: 400;\">Huge Internal Storage</span><strong>. </strong><span style=\"font-weight: 400;\">1TB of on-board storage.</span></p>\r\n<p><span style=\"font-weight: 400;\">Multiple Command and Control Interfaces. It is simple to control the PR-Hydra from the NCast Quickstart webpage and/or serial command systems. Use RS-232 control commands with buttons to just record and stream, or provide a robust set of controls for a more comprehensive control system.</span></p>\r\n<p><span style=\"font-weight: 400;\">Archive. Auto-upload to up to two destinations including the NCast Presentation Server, YouTube, or USB.</span></p>', NULL, NULL, 'Y', '2017-08-09 06:28:42', '2017-08-09 06:28:42'),
(12, 'presentation-server', 'Presentation Server', 8, '<p><strong>All in one.</strong><span style=\"font-weight: 400;\"> The presentation Server enables an end-to-end solution for lecture capture.</span></p>\r\n<p><span style=\"font-weight: 400;\">Open Standards. The presentation Server is based on open-standards and open-architecture that are constantly evolving to meet the needs of the industry. You are not locked into a monolithic solution.</span></p>\r\n<p><strong>Video/Graphics Separation.</strong><span style=\"font-weight: 400;\"> Video and graphics may be resized independently for playback.</span></p>\r\n<p><span style=\"font-weight: 400;\">Open Standards. The presentation Server is based on open-standards and open-standards and open-architectures that are constantly evolving to meet the needs of the industry. You are not locked into a monolithic solution.</span></p>\r\n<p><strong>Video/Graphics separation</strong></p>\r\n<p><span style=\"font-weight: 400;\">Video and graphics may be resized independently for playback.</span></p>\r\n<p><strong>Software Advantages.</strong><span style=\"font-weight: 400;\"> Can organize and manage recordings. Server is both a live streaming server and a video-on demand server. Unique architecture permits customized workflows and special processing operations. Full OCR-to-Text support.</span></p>\r\n<p><strong>Futuristic Expansion</strong><span style=\"font-weight: 400;\">- Enables futuristic items such as the elimination of expensive and complicated tracking cameras, infrared necklace, and more through software upgrades that support automatic teacher tracking.</span></p>\r\n<p><strong>Hardware Advantages.</strong><span style=\"font-weight: 400;\"> Dual-redundant power supply. Hot swappable disk drives. Rack-mount 2U Chassis. Click and replace fans. Intel Xenon processors. Primary and backup storage.</span></p>', '<p><strong>Administrative Interfaces</strong><span style=\"font-weight: 400;\">: Scheduling capture of lectures and seminars. Manually uploading files to the server managing user and administrative roles.</span></p>\r\n<p><strong>Viewer Portal: </strong><span style=\"font-weight: 400;\">Authentication of viewers or provision for</span> <span style=\"font-weight: 400;\">anonymous viewing</span> <span style=\"font-weight: 400;\">Authorization of viewers for access to</span> <span style=\"font-weight: 400;\">different recorded media</span></p>\r\n<p><strong>Workflow: </strong><span style=\"font-weight: 400;\">Flexibility of playback on different media</span> <span style=\"font-weight: 400;\">players and devices</span> <span style=\"font-weight: 400;\">Capture of viewing statistics and user load</span> <span style=\"font-weight: 400;\">publishing and push of media to external systems.</span> <span style=\"font-weight: 400;\">Scheduling, Inspection of</span> <span style=\"font-weight: 400;\">media file, composition&ndash; Transcoding the</span> <span style=\"font-weight: 400;\">media to different formats and resolutions,</span> <span style=\"font-weight: 400;\">able to trim unwanted portion</span></p>', '<p><span style=\"font-weight: 400;\">The Presentation Server is an open-standards, open-architecture video and media Content Management System designed especially to handle the capture and streaming of presentations and lectures given at universities, medical facilities, research laboratories, seminars, trade shows and conference and any other setting where a knowledge expert\'s presentation and discussion will be recorded and streamed over internet networks.</span></p>', '4df0b1d3dcefdd27ed27b4dd7c429faa.png', '<p><span style=\"font-weight: 400;\">The Cloud Edition of the Presentation Server is a service and integrated platform, perfect for educational institutions and other organizations wishing to begin presenting their content without investing significant overhead into equipment or support staff. Fully integrated with Amazon\'s EC2 (Elastic Compute Cloud) service, PS provides a true turnkey, cloud-based solution, eliminating issues of storage space, broadcast bandwidth, energy costs.</span></p>', NULL, NULL, 'Y', '2017-08-09 06:30:42', '2017-08-09 06:30:42'),
(13, 'vstor-premium', 'VSTOR Premium', 129, '<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>Video Conferencing Supported Systems</strong>&nbsp;</p>\r\n<table class=\"table table-striped\" style=\"width: 464px; height: 1025px;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: center; width: 91px;\">\r\n<p><strong>Make</strong></p>\r\n</td>\r\n<td style=\"text-align: center; width: 70px;\">\r\n<p><strong>Model</strong></p>\r\n</td>\r\n<td style=\"text-align: center; width: 101px;\">\r\n<p><strong>USB Hard disk (Extrernal Upto 2 TB)</strong></p>\r\n</td>\r\n<td style=\"text-align: center; width: 80px;\">\r\n<p><strong>HDMI Splitter</strong></p>\r\n</td>\r\n<td style=\"text-align: center; width: 120px;\">\r\n<p><strong>MicroPhone</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Polycom</td>\r\n<td style=\"width: 70px; text-align: center;\">Group 500</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 101px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n<td style=\"width: 101px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Polycom</td>\r\n<td style=\"width: 70px; text-align: center;\">Group 700</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Polycom</td>\r\n<td style=\"width: 70px; text-align: center;\">Group 310</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Polycom</td>\r\n<td style=\"width: 70px; text-align: center;\">HDX series (With VCR Out)</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Lifesize&nbsp;</td>\r\n<td style=\"width: 70px; text-align: center;\">Icon 400</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">LifeSize</td>\r\n<td style=\"width: 70px; text-align: center;\">icon 600</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">LifeSize</td>\r\n<td style=\"width: 70px; text-align: center;\">icon 800</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">LifeSize</td>\r\n<td style=\"width: 70px; text-align: center;\">220 Series</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Panasonic</td>\r\n<td style=\"width: 70px; text-align: center;\">1000</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Panasonic</td>\r\n<td style=\"width: 70px; text-align: center;\">1300</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Panasonic</td>\r\n<td style=\"width: 70px; text-align: center;\">1600</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&nbsp;&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Cisco</td>\r\n<td style=\"width: 70px; text-align: center;\">SX Series</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 91px; text-align: center;\">Cisco&nbsp;</td>\r\n<td style=\"width: 70px; text-align: center;\">CX Series</td>\r\n<td style=\"width: 101px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 80px; text-align: center;\">&radic;&nbsp;</td>\r\n<td style=\"width: 120px; text-align: center;\">&radic;&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>&nbsp;</p>\r\n<p><strong>Bit rate :&nbsp;</strong><span style=\"font-weight: 400;\">Bit rate Max 16Mbps, Min 4Mbps, default 10Mbps</span></p>\r\n<p><strong>Recording file size:&nbsp;</strong><span style=\"font-weight: 400;\">Max 2GB, new recording file generated automatically after each 2GB recorded</span></p>\r\n<p><strong>Loop Through Resolution:&nbsp;</strong><span style=\"font-weight: 400;\">720*480 (30p) , 720*480(60p), 720*576(30p), 720*576(60p) 1280*720 (30p), 1280*720 (60p), 1920*1080p (30p), 1920*1080p (60p), 2560x1040, 4096x2160</span></p>\r\n<p><strong>Capture Resolution:&nbsp;</strong><span style=\"font-weight: 400;\">Up to 1080p @ 30fpsp</span></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">Instant Playback &amp; Pre-set schedule recording</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">OSD control with multi-language</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">HDMI pass-through without latency</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">Recording data rate up to 16Mbits / sec in MP4 format</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">Recording audio via integrated microphone input</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">Snapshot via remote control (IR)</span></li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">4 K Ultra HD Video Capture H.264 Compression Pre Set Scheduled Recording</span></p>', 'bf6df50ce13b2bfe78f2250f17c5a555.pdf', '<p>&nbsp;</p>\r\n<p>Record to USB or PC-HDD</p>\r\n<p>Instant playback</p>\r\n<p>Pre-set schedule recording</p>\r\n<p>HDMI Pass through without latency</p>\r\n<p>Recording rate up to 16 Mbits/sec in MP4 format</p>\r\n<p>Dual mode design, HD recording on external USB storage (Standalone) or &nbsp; &nbsp; PC HDD</p>\r\n<p>H.264 HD hardware encoding up to 1080P 30FPS</p>\r\n<p>Instant Playback &amp; Pre-set schedule recording</p>\r\n<p>OSD control with multi-language</p>\r\n<p>&nbsp;HDMI pass-through without latency</p>\r\n<p>&nbsp; Recording data rate up to 16Mbits / sec in MP4 format</p>\r\n<p>&nbsp; Recording audio via integrated microphone input</p>\r\n<p>&nbsp; Snapshot via remote control (IR)</p>', NULL, NULL, 'Y', '2017-11-10 11:40:20', '2017-08-09 13:26:38'),
(16, 'e-ptz-videoconference-camera', 'e-PTZ Videoconference Camera', 130, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'd9e56d9f4568bd84d626a383064a2cf3.pdf', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, 'N', '2017-08-10 12:32:47', '2017-08-10 12:32:47'),
(17, 'sdi-camera', 'SDI Camera', 130, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '569ad05cfecda2901ecdfd02bb40eabf.pdf', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, 'N', '2017-08-10 12:32:47', '2017-08-10 12:32:47'),
(20, 'avermedia313', 'Avermedia313', 131, '<p><span style=\"font-weight: 400;\">2.4 GHz for Stable Wireless Audio</span></p>\r\n<p><span style=\"font-weight: 400;\">Quick Charge</span></p>\r\n<p><span style=\"font-weight: 400;\">All-Day Battery Life</span></p>\r\n<p><span style=\"font-weight: 400;\">Exclusive Speaker Buzz Reduction</span></p>\r\n<p><span style=\"font-weight: 400;\">Pendant and Clip-On Style</span></p>\r\n<p><span style=\"font-weight: 400;\">Power-On and Talk: No wait Time</span></p>\r\n<p><span style=\"font-weight: 400;\">Aesthetic Design</span></p>\r\n<p><span style=\"font-weight: 400;\">Adjustable Lanyard</span></p>\r\n<p><span style=\"font-weight: 400;\">Breakaway Lanyard for safety</span></p>\r\n<p><span style=\"font-weight: 400;\">Plug-and-Play</span></p>', '<p><span style=\"font-weight: 400;\"><strong>Radio Frequency (RF):</strong> </span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Operating Band:</strong> 2.4 GHz unlicensed ISM Band</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>RF frequency Range:</strong> 2.4~2.483 GHz</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Modulation Method:</strong> 2FSK</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Linking method:</strong> 2.4GHz wireless Pairing</span></p>\r\n<p><span style=\"font-weight: 400;\">Suggested Operating Distance</span></p>\r\n<p><span style=\"font-weight: 400;\">-15~20 Meters/50~65 Feet (Line of sight)</span></p>\r\n<p><strong>Mic Audio</strong></p>\r\n<p><span style=\"font-weight: 400;\">- Audio Frequency Response: 100 Hz~10K Hz</span></p>\r\n<p><span style=\"font-weight: 400;\">-Microphone Sensitivity: -39 dB ref. 1K@1V</span></p>\r\n<p><span style=\"font-weight: 400;\">-Microphone Distortion: &le;0.5%</span></p>\r\n<p><strong>Receiver Audio</strong></p>\r\n<p><span style=\"font-weight: 400;\">-Audio DSP Processing</span></p>\r\n<p><span style=\"font-weight: 400;\">-Anti-Howling &amp; Noise Reduction</span></p>\r\n<p><span style=\"font-weight: 400;\">-Latency: 32ms</span></p>\r\n<p><strong>Mic 1/0</strong></p>\r\n<p><span style=\"font-weight: 400;\">-High sensitive Microphone</span></p>\r\n<p><span style=\"font-weight: 400;\">-Mic Input(Optional External Mic Connecting)</span></p>\r\n<p><span style=\"font-weight: 400;\">-Micro USB Connector for Battery Charging</span></p>\r\n<p><strong>Receiver 1/0</strong></p>\r\n<p><span style=\"font-weight: 400;\">-Line Out (A Mic Out SKU is also available)</span></p>\r\n<p><span style=\"font-weight: 400;\">-Micro USB connector for Battery Charging</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Battery (Mic)</strong></p>\r\n<p><span style=\"font-weight: 400;\">-350 mAh Lithium Rechargeable</span></p>\r\n<p><strong>Size/Weight:</strong></p>\r\n<p><span style=\"font-weight: 400;\">-Mic: 30*80*25mm (1.18*3.15*0.98in)/32g (1.13oz)</span></p>\r\n<p><span style=\"font-weight: 400;\">-Receiver: 70*70*19mm (2.76*2.76*0.75in)/ 45g (1.59oz)</span></p>\r\n<p><strong>Control Button</strong></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Mic:</strong> Power/ Paring/ Volume UP &amp; Down</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Receiver:</strong> Power</span></p>\r\n<p><span style=\"font-weight: 400;\">Operation Temperature: 0~35&deg;C</span></p>', '<p>Light, stylish and wearable, the AW313 Wireless Teacher Microphone is the ideal solution for your daily teaching. With 2.4 GHz wireless technology, noise and speaker buzz reduction, this hands-free system not only gives you total freedom to interact with students, it also delivers your natural voice in great clarity and stability.</p>', '4749aeb72fdf413e87b843ea17205159.pdf', '<p><span style=\"font-weight: 400;\"><strong>Pendant or Clip-On:</strong> Suitable for any outfits.</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Speaker Buzz Reduction:</strong> Reduces speaker noise and feedback for hearing protection.</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Quick Charge:</strong> 10-min charge to last a class</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>All day battery Life:</strong> 8 hour use from a full charge.</span></p>', NULL, NULL, 'Y', '2017-09-11 13:15:32', '2017-08-09 13:03:38'),
(21, 'accoustic-magic', 'Accoustic Magic', 132, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '3d9f615b46e7db6f49f52df6e2b9cefd.pdf', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, NULL, 'Y', '2017-08-08 12:39:35', '2017-08-08 12:39:35'),
(22, 'elmo-mx-1', 'Elmo MX-1', 131, '<p><span style=\"font-weight: 400;\"><strong> True 4K:</strong>&nbsp;First in True 4K.&nbsp;The MX-1 is the first True 4K Document Camera on the market. Along with a specially crafted lens, the MX-1 will give you top quality 4K image at up to 30 fps.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>USB 3.0:&nbsp;</strong>Powered by USB 3.0.&nbsp;In order to simplify the camera, the MX-1 is powered via Super Speed USB 3.0. The Super Speed USB 3.0 port allows for viewing of full HD video at up to 60 fps or True 4K at up to 30 fps. Experience no delay in the movement of objects under the camera. It also allows transmission of a True 4K image.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Lightweight &ndash; 1.04lbs:&nbsp;</strong>Only 1.04lbs.&nbsp;Weighing only 1.04lbs the MX-1 is completely portable and easy to transport. Take it with you and present anywhere.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Flexible:&nbsp;</strong>Bend it, Twist it, Fold it.&nbsp;The MX-1 can bend and fold in every which way, making it the most flexible document camera in the ELMO line up.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Quick Navigation Buttons:&nbsp;</strong>Control Menu at your finger tips.&nbsp;The MX-1 has easy access to navigation buttons, such as; image rotation, freeze frame, brightness control, zoom control and auto focus.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Magnetic Bottom:&nbsp;</strong>Smaller Footprint.&nbsp;Easily remove the base plate on your MX-1 to reveal the magnetic bottom. Stick the MX-1 to a metal surface for an even smaller footprint.</span></p>', '<p><strong>Digital Zoom:</strong> 8x (MAX)</p>\r\n<p><strong>Lens:</strong> f=2.0 FOV 79*(Diagonal)</p>\r\n<p><strong>Focus Control:</strong> One-Push AF</p>\r\n<p><strong>Pause:</strong> Provided</p>\r\n<p><strong>Lighting(LED):</strong> Provided</p>\r\n<p><strong>White Balance:</strong> Via USB</p>\r\n<p><strong>HDMI Output:</strong> 1080P/720P*thru Expansion box</p>\r\n<p><strong>Power Consumption:</strong> 3.2W</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p>The First in True 4K.&nbsp;Present your lesson plan in spectacular 4K Ultra HD. The new MX-1 Visual Presenter is the world&rsquo;s first true 4K document camera. The SuperSpeed USB 3.0 port allows for viewing of video at full HD up to 60 fps. The optional expansion box adds connectivity options for HDMI and RGB based display.</p>', 'b681393fed3672fbf663a38ed2a8e608.pdf', '<p>&nbsp;</p>\r\n<p><strong>Superb image quality, Full motion Video:</strong> Help Maintain your student\'s interest with high quality images shown in fiine details. The MX-1 uses a 13M image sensor and outputs image in 4K ultra-HD resolutions. Enhance student\'s understanding through effective use of full-motion video in 60fps. (60fps when used in high frame mode 1080p)</p>\r\n<p><br /><strong>Ultra-Compact, Easy to set up:</strong> Ultra-compact, simple stylish design, the MX-1 can easily fit inside a small handbag, making it lightweight and easy to carry in virtually any situation. The MX-1 can be connected to PC via super speed USB3.0 allows to record video or scan images straight to your PC. The optional Expansion Box allows to connect MX-1 directly to the projector or TV screen via HDMI/VGA.</p>', NULL, NULL, 'Y', '2017-10-05 10:53:40', '2017-10-05 10:53:40'),
(24, 'telyhd-pro', 'TelyHD Pro', 5, '<p><strong>Wireless Projector:</strong><span style=\"font-weight: 400;\"> The included telyShare application enables users to wirelessly share content from their Windows or Mac computer with remote users during any video conference call.</span></p>\r\n<p><strong>Smartphone Remote control:</strong><span style=\"font-weight: 400;\"> In addition to the included remote control device, the Smart Remote App makes it easy to wirelessly control your telyHD Pro from your Android or iOS smartphone or tablet.</span></p>\r\n<p><span style=\"font-weight: 400;\">Built-in Web Browser: Browse the web on your conference room TV without a computer.</span></p>\r\n<p><span style=\"font-weight: 400;\">Speakerphone: Eliminate the need for a separate speakerphone by conferencing the TelyHD Pro to existing VoIP infrastructure via SIP or by using Skype PSTN capabilities.</span></p>\r\n<p><span style=\"font-weight: 400;\">Easy to Setup and Use: All in-one design and guided setup enables anyone to setup and use a telyHD Pro in minutes. No personal computer is required. Just plug into your Ethernet network and any </span></p>', '<ul>\r\n<li><span style=\"font-weight: 400;\"> Tely HD appliance with camera, privacy shutter, codec, microphone array, universal mount</span></li>\r\n<li><span style=\"font-weight: 400;\"> 7-button remote control</span></li>\r\n<li><span style=\"font-weight: 400;\"> HDMI cable</span></li>\r\n</ul>\r\n<p><strong>Communications</strong></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\"> SIP, telyCloud VMM, Skype, Third-Party Cloud Services</span></li>\r\n</ul>\r\n<p><strong>Audio Standards</strong></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\"> SILK, G722, G722.1 codecs</span></li>\r\n</ul>\r\n<p><strong>Audio Features</strong></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\"> Built-in ringer</span></li>\r\n<li><span style=\"font-weight: 400;\"> Acoustic Echo Cancellation</span></li>\r\n<li><span style=\"font-weight: 400;\"> Full-duplex audio</span></li>\r\n<li><span style=\"font-weight: 400;\"> Automatic Gain Control</span></li>\r\n<li><span style=\"font-weight: 400;\"> Automatic Noise Suppression</span></li>\r\n<li><span style=\"font-weight: 400;\"> Packet Loss Concealment</span></li>\r\n<li><span style=\"font-weight: 400;\"> Jitter Buffer</span></li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">The HD Series products are all-in-one, plug-and-play endpoints which deliver high-quality video conferencing and collaboration experience at unprecedented value. Tely HD Pro&rsquo;s standards-based interoperability and support for popular cloud video services such as Blue Jeans and Zoom allows for easy connections to millions of users today.</span></p>', '0df9374b5691c4cf4a5dd4cd04afd654.pdf', '<p><strong>Plug &amp; Play: </strong><span style=\"font-weight: 400;\">Anyone can set up and use in minutes. No personal computer required, no technical support needed. Just plug in to your Ethernet network and any standard HDTV to get started.</span></p>\r\n<p><strong>Wireless Projector: </strong><span style=\"font-weight: 400;\">The included telyShare app enables wireless projection from Windows and Mac computers to any Tely-connected HDTV, eliminating the need for bulky, hot and expensive LCD projectors, as well as cables and adapters.</span></p>\r\n<p><strong>Easy Collaboration: </strong><span style=\"font-weight: 400;\">HD Series products make it easy to share Windows or Mac computer screens with remote users during any video conference call, using the applications you already know on the devices you already have.</span></p>', NULL, NULL, 'Y', '2017-08-09 07:59:46', '2017-08-09 07:59:46'),
(25, 'tely-200', 'Tely 200', 5, '<p>&nbsp;</p>\r\n<p>H.323 / SIP&nbsp;</p>\r\n<p>Dual Monitor - Video + Content</p>\r\n<p>1080 P Wide Angle Camera</p>\r\n<p>Wireless Content Sharing&nbsp;</p>\r\n<p>Optional Tely Portal Service</p>', '<p><span style=\"font-weight: 400;\">Integrated 1080p camera designed for huddle space field of view</span></p>\r\n<p><span style=\"font-weight: 400;\">o</span> <span style=\"font-weight: 400;\">Horizontal: 76 degrees</span></p>\r\n<p><span style=\"font-weight: 400;\">o</span> <span style=\"font-weight: 400;\">Vertical: 47 degrees</span></p>\r\n<p><span style=\"font-weight: 400;\">o</span> <span style=\"font-weight: 400;\">4x digital zoom</span></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dual or single display implementation</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Content sharing via HDMI or WiFi</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Two integrated microphones</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full duplex audio and acoustic echo cancellation</span></li>\r\n<li><span style=\"font-weight: 400;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No computer required.</span></li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With Tely, it&rsquo;s easier than ever to instantly collaborate in any huddle space with HD 1080p video conferencing and content sharing. The Tely video endpoint is designed to integrate and connect with the cloud-based video service of your choice right out of the box. This means you can be up and running with full video and audio capabilities in no time.</span></p>', '1f5a3b03c5d2a114ec6c37261dc5d029.pdf', '<p><strong>Simple to Use: </strong><span style=\"font-weight: 400;\">So easy to use that you can collaborate quickly, even for impromptu meetings. Start scheduled meetings with one-click from the calendar or directory. Share content wirelessly with Tely Share or via an HDMI connection.</span></p>\r\n<p><strong>Simple to Connect: </strong><span style=\"font-weight: 400;\">Deploy and use in as little as five minutes right out of the box (only three cables and a short guided setup). It&rsquo;s designed to instantly integrate and connect to any cloud-based video service.</span></p>\r\n<p><strong>Simple to Manage: &nbsp;</strong><span style=\"font-weight: 400;\">Tely Portal enables centralized cloud-based management. This allows to remotely configure, update, troubleshoot and report performance metrics on each HD 1080p Tely endpoint.</span></p>', NULL, NULL, 'Y', '2017-10-24 04:51:19', '2017-08-09 07:59:20'),
(26, 'voice-tracker-i', 'Voice Tracker I', 131, '<p><span style=\"font-weight: 400;\">Automatic electronic steering of \"listening beam\" to talker location.</span></p>\r\n<p><span style=\"font-weight: 400;\">Selectable steering limits (90 degrees and 180 degrees) for speech recognition and meeting recording modes.</span></p>\r\n<p><span style=\"font-weight: 400;\">Selectable LDS to reduce annoying interference of additional talkers during speech recognition or feedback during teleconferencing.</span></p>\r\n<p><span style=\"font-weight: 400;\">Two stage noise reduction(spatial filtering and noise reduction processing</span></p>\r\n<p><span style=\"font-weight: 400;\">8 element, 18 inch long array for maximum range</span></p>\r\n<p><span style=\"font-weight: 400;\">5 element \"in range\" light to indicate location of chosen taker and sufficiency of signal.</span></p>\r\n<p><span style=\"font-weight: 400;\">Microphone tilt capability to facilitate desktop, monitor top, ceiling or wall mounting</span></p>\r\n<p><span style=\"font-weight: 400;\">Weight. 1.5 pounds(excluding wall power supply)</span></p>\r\n<p><span style=\"font-weight: 400;\">Power: Converter from 120 V AC to 6V DC included</span></p>', '<p><span style=\"font-weight: 400;\">Range. 30+ feet for meeting recording</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog Output-Mic level 3.5mm mini stereo jack. Same signal on tip &amp; ring. 500ohm output impedance.</span></p>\r\n<p><span style=\"font-weight: 400;\">Frequency Response. 100Hz to 11250 Hz</span></p>\r\n<p><span style=\"font-weight: 400;\">Physical Dimensions: Length: 18\", Height: 2.5\", Weight: 2.5lbs</span></p>\r\n<p><span style=\"font-weight: 400;\">Power Equipment: 6V DC, 400ma, center Pin Positive</span></p>', '<p><span style=\"font-weight: 400;\">The Voice Tracker Array Microphone was the original implementation of our patented, automatically and electronically steering, \"listening beam\" technology. It has an analog audio output at mic level, and is powered by a wall power converter so there is no risk of loss of performance as batteries run out. A USB adapter is an available option for use with MACs, and laptops with low performance sound cards. It has built in ceiling mount capability, which removes the clutter of mics on the conference table. It can be used in conventional and VoIP conferencing systems that need the AEC built into the microphone itself.</span></p>', 'ea8665720a177d96e7ee9a9e1ecd2ece.pdf', '<p><strong>Speech Recognition: </strong><span style=\"font-weight: 400;\">Since the Voice Tracker operates differently from other types of microphones or audio input devices, you should retrain your speech recognition software. Be sure to select USB Array Microphone during the &ldquo;New User&rdquo; setup. Personalized vocabulary can usually be transferred to the retrained &ldquo;User&rdquo;.</span></p>\r\n<p><strong>Troubleshooting:</strong><span style=\"font-weight: 400;\"> Acoustic echo cancellation. If the ref signal is too strong or too weak, AEC will not work well. Make sure the playback level in the PC is set to midscale. Turn up the volume on the (external) speaker itself if more loudness is desired.</span></p>\r\n<p><strong>No Audio:</strong><span style=\"font-weight: 400;\"> Check whether the LEDs track the talker. If not, reboot (repower). If so, the problem is probably in the computer setup. Make sure it is looking for recording input where the Voice Tracker is connected (USB, Mic in, or Line in).</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog or USB Audio too strong.</span></p>\r\n<p><span style=\"font-weight: 400;\">Make sure the output level switch is set to mic level</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog or USB Audio too weak.</span></p>\r\n<p><span style=\"font-weight: 400;\">Make sure the output switch is set to line level</span></p>', NULL, NULL, 'Y', '2017-09-11 06:43:40', '2017-08-09 11:25:41');
INSERT INTO `product` (`id`, `slug`, `name`, `cms_id`, `features`, `technical_specification`, `description`, `data_sheet`, `benefits`, `without_clearfix`, `solution`, `status`, `created_at`, `updated_at`) VALUES
(27, 'voice-tracker-ii', 'Voice Tracker II', 131, '<p><span style=\"font-weight: 400;\">Automatic electronic steering of \"listening beam\" to talker location.</span></p>\r\n<p><span style=\"font-weight: 400;\">360 field of view.</span></p>\r\n<p><span style=\"font-weight: 400;\">Long-range: 20+ feet for conferencing/meeting recording/home automation voice control applications. 3 feet for desktop full vocabulary automation speech recognition applications.</span></p>\r\n<p><span style=\"font-weight: 400;\">Six \"always on\" microphone elements</span></p>\r\n<p><span style=\"font-weight: 400;\">Two-stage noise reduction(spatial filtering followed by conventional noise reduction)</span></p>\r\n<p><span style=\"font-weight: 400;\">Full-duplex operation through internal Acoustic Echo Cancellation algorithm</span></p>\r\n<p><span style=\"font-weight: 400;\">Mute button</span></p>\r\n<p><span style=\"font-weight: 400;\">USB audio output/microphone power</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog audio output jack, switchable between mic level and line level output.</span></p>\r\n<p><span style=\"font-weight: 400;\">5 element LED display to indicate location of chosen talker and mute mode.</span></p>\r\n<p><span style=\"font-weight: 400;\">Talker location signal</span></p>\r\n<p><strong>Applications</strong></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Lecture recording &amp; Distance Learning:</strong> With scanning unidirectional technology, it enables full room coverage with a single microphone.<br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Conferencing:</strong> The Microphone&rsquo;s internal Acoustic Echo Cancellation (AEC) algorithm provides performance that rivals or exceeds that of AEC boxes costing several thousand dollars.</span></p>\r\n<p><span style=\"font-weight: 400;\"><br /><strong>Meeting Recording:</strong> It can be used as an auxiliary microphone with conferencing systems, or it can be the main microphone for the desktop based VoIP-based conferencing systems.</span></p>\r\n<p><span style=\"font-weight: 400;\"><br /><strong>Home Automation:</strong> It is so sensitive, and the sound quality is so good, that it provides handheld mic accuracy at ranges of many feet, enabling voice control for assisted care, robotics, etc. </span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Security:</strong> Conventional microphones normally used with video cameras do not do an adequate job filtering the noise.</span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Speech Recognition:</strong> It is so sensitive, and its sound quality is so good, that it provides headset/handheld mic accuracy at ranges of a few feet, eliminating the encumbrance of wearing a headset or holding a handheld mic when using speech recognition software.</span></p>\r\n<p><span style=\"font-weight: 400;\"><br /><strong>Medical:</strong> The combination of applications makes the purchase of the Voice Tracker a valuable investment for doctors and medical professionals. <br /></span></p>\r\n<p><span style=\"font-weight: 400;\"><strong>Legal:</strong> The Voice Tracker array microphone has benefits in several applications of interest to lawyers especially as is pertains to legal dictation. </span></p>', '<p><span style=\"font-weight: 400;\">Dimensions: 12\"*1.5\"*1.5\"</span></p>\r\n<p><span style=\"font-weight: 400;\">Weight: 2 Lbs</span></p>\r\n<p><span style=\"font-weight: 400;\">DSP sample rate 48kHz</span></p>\r\n<p><span style=\"font-weight: 400;\">Frequency response: 100HZ-11.25 KHZ</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog Output Level: mic level or line level, unbalanced</span></p>\r\n<p><span style=\"font-weight: 400;\">Analog Output impedance: 200 Ohms</span></p>\r\n<p><span style=\"font-weight: 400;\">Acoustic Echo Cancellation:</span></p>\r\n<p><span style=\"font-weight: 400;\">Conforms to ITU-TG.167 standard</span></p>\r\n<p><span style=\"font-weight: 400;\">Convergence speed:&lt;100ms</span></p>\r\n<p><span style=\"font-weight: 400;\">Single Talk Acoustic Echo Cancellation: 70dB</span></p>\r\n<p><span style=\"font-weight: 400;\">Double Talk Acoustic Echo Cancellation:40dB</span></p>\r\n<p><span style=\"font-weight: 400;\">Tail Length: 100ms</span></p>\r\n<p><span style=\"font-weight: 400;\">Algorithm sample rate: 48KHz</span></p>\r\n<p><span style=\"font-weight: 400;\">Connections</span></p>\r\n<p><span style=\"font-weight: 400;\">Main Connection: Mini USB</span></p>\r\n<p><span style=\"font-weight: 400;\">3.5mm mono jack for analog audio output</span></p>\r\n<p><span style=\"font-weight: 400;\">3.5mm jack for far end talker reference</span></p>\r\n<p><span style=\"font-weight: 400;\">DB9 jack for serial talker location signal.</span></p>', '<p><span style=\"font-weight: 400;\">The Voice Tracker II starts with Acoustic Magic\'s unique, customer proven, patented scanning beam array microphone technology, which spatially filters undesired sounds and noise over a 360 field of view. But it has been designed to enhance its applicability for video and audio conferencing, while retaining its attributes for meetings and lecture recording, speech recognition, voice control, and security monitoring.</span></p>', '6f35dee78d40be8cae56a620beeeae25.pdf', '<p><span style=\"font-weight: 400;\">Effective at Long-range: It creates an exceptional signal to noise ratio by increasing its signal pickup while reducing room noise. It accomplishes room noise reduction through a two-stage process. First, it minimizes unwanted background noise and reverberation by beam forming. Its digital signal processor creates a \"listening beam\"(like a searchlight) that automatically and electronically focuses on the talker, spatially filtering sound from other directions. Then its proprietary noise reduction algorithms diminish the remaining background noise and reverberations. It increases the sensitivity by constructively adding the output from its six \"always on\" microphone elements. As a result, the it has applications range of more than 20 feet for conferencing, meeting recording, and home automation applications, range of several feet for hands-free/headset free full vocabulary automatic speech recognition applications.</span></p>\r\n<p><span style=\"font-weight: 400;\">Full Duplex Operation for VoIP and conventional conferencing. The Voice Tracker II has a high performance acoustic echo canceller built in. This AEC, combined with, a mute button, and the Voice Tracker II\'s long-range, make it ideal for conferencing and telephony (speakerphone) applications.</span></p>\r\n<p><span style=\"font-weight: 400;\">Portable. The Voice Tracker II has a half of the size of the original Voice Tracker, and fits easily into a briefcase. It can be powered through its USB connection, eliminating the need to carry a wall power converter and making it operable in any country.</span></p>\r\n<p><span style=\"font-weight: 400;\">Easy to use. Our patented beam steering technology, noise reduction algorithms, and AEC, all operate from an internal DSP. No software needs to be loaded on your PC, and there is no drain on your computer\'s processing capability. There are no moving parts, so the Voice Tracker II is rugged and reliable.</span></p>', NULL, NULL, 'Y', '2017-11-20 11:27:42', '2017-08-09 11:30:59'),
(28, 'avermedia330', 'Avermedia330', 26, '<p><span style=\"font-weight: 400;\">- 2.4GHz for stable Wireless Audio.</span></p>\r\n<p><span style=\"font-weight: 400;\">-Quick Charge</span></p>\r\n<p><span style=\"font-weight: 400;\">-All-Day Battery Life for MIC</span></p>\r\n<p><span style=\"font-weight: 400;\">Exclusive Speaker Buzz Reduction</span></p>\r\n<p><span style=\"font-weight: 400;\">-Pendent and Clip-on Style</span></p>\r\n<p><span style=\"font-weight: 400;\">-Power-on and Talk: No wait Time.</span></p>\r\n<p><span style=\"font-weight: 400;\">-Aesthetic Design</span></p>\r\n<p><span style=\"font-weight: 400;\">-Adjustable Lanyard</span></p>\r\n<p><span style=\"font-weight: 400;\">-Breakaway Lanyard for Safety</span></p>\r\n<p><span style=\"font-weight: 400;\">-Plug-and-Play</span></p>\r\n<p><strong>Audio Digital Signal Processing</strong></p>\r\n<p><span style=\"font-weight: 400;\">-Noise reduction</span></p>\r\n<p><span style=\"font-weight: 400;\">-Anti-Howling</span></p>\r\n<p><span style=\"font-weight: 400;\">-Optimized audio quality</span></p>\r\n<p><strong>Package Includes</strong></p>\r\n<p><span style=\"font-weight: 400;\">-Microphone</span></p>\r\n<p><span style=\"font-weight: 400;\">-Speaker</span></p>\r\n<p><span style=\"font-weight: 400;\">-Audio Cable</span></p>\r\n<p><span style=\"font-weight: 400;\">-USB Charging Cable</span></p>\r\n<p><span style=\"font-weight: 400;\">-AC Adapter for speaker</span></p>\r\n<p><span style=\"font-weight: 400;\">-Lanyard &amp; Buckle</span></p>\r\n<p><span style=\"font-weight: 400;\">-Quick Guide</span></p>', '<p><span style=\"font-weight: 400;\">Carries frequencies: 2.4 GHz unlicensed ISM Band</span></p>\r\n<p><span style=\"font-weight: 400;\">RF Frequency Range: 2.4~2.483 GHz</span></p>\r\n<p><span style=\"font-weight: 400;\">Modulation Method: 2FSK</span></p>\r\n<p><span style=\"font-weight: 400;\">Operating Range: 15-20 Meters/50~65 Feet</span></p>\r\n<p><span style=\"font-weight: 400;\">Operation Temperature: 0~35&deg;c</span></p>\r\n<p><span style=\"font-weight: 400;\">Audio: Audio DSP Processing </span></p>\r\n<p><span style=\"font-weight: 400;\">Anti-Howling &amp; Noise Reduction</span></p>\r\n<p><span style=\"font-weight: 400;\">Latency: 32ms</span></p>\r\n<p><span style=\"font-weight: 400;\">Frequency response: 100 Hz~10K Hz</span></p>\r\n<p><span style=\"font-weight: 400;\">Microphone Sensitivity: -39 dB ref. 1K@1V</span></p>\r\n<p><span style=\"font-weight: 400;\">Microphone Distortion: &le;0.5%</span></p>\r\n<p><span style=\"font-weight: 400;\">Batteries: 2600 mah Lithium Rechargeable</span></p>\r\n<p><span style=\"font-weight: 400;\">350 mah Lithium Rechargeable (8Hrs Continuous using)</span></p>', '<p class=\"line-h-26\"><span style=\"font-weight: 400;\">The AW330 Wireless Classroom Audio System is a portable sound solution for voice and multimedia both inside and outside the classroom. By utilizing 2.4GHz Wireless radio band, the microphone and speaker are able to maintain a constant 360 degree communication with virtually no signal loss or channel interferences. Our exclusive Speaker Buzz Reduction Technology reduces noise feedbacks from speakers to ensure the best audio quality for learning. Compact and lightweight with a built-in lithium polymer battery, this 20-watt audio system is easy to carry and will provide natural and ample sounds for your day-to-day teaching.</span></p>', '2a78cfdde946158572f9f0ec41a3a5e3.pdf', '<p><span style=\"font-weight: 400;\">Pendant or Clip-On: Suitable for any outfits.</span></p>\r\n<p><span style=\"font-weight: 400;\">Speaker Buzz Reduction: Reduces speaker noise and feedback for hearing protection</span></p>\r\n<p><span style=\"font-weight: 400;\">Quick Charge: 10-min charge to last a class</span></p>\r\n<p><span style=\"font-weight: 400;\">All Day Battery Life for mic</span></p>', NULL, NULL, 'Y', '2017-09-11 13:11:39', '2017-08-09 12:49:04'),
(29, 'l-21-id', 'l-21-id', 131, '<p>-HDMI Pass through</p>\r\n<p>-Powerful 96*Zoom (12*Optical zoom, 8* Digital Zoom)</p>\r\n<p>-3.4 MP CMOS Sensor</p>\r\n<p>-Full HD 1080p</p>\r\n<p>-USB Video Class Compliant (Can be seamlessly used as a webcam)</p>\r\n<p>-Multi-directional Camera Neck</p>\r\n<p>-A3 Capture Area</p>\r\n<p>-Built-in Microphone</p>\r\n<p>-Ergonomically Designed Remote Control.</p>', '<p>Pick-up device: 1/2.8\" 3,400,000 pixels</p>\r\n<p>Frame rate: 30 fps</p>\r\n<p>Zoom: Powered, 12x Optical</p>\r\n<p>Focus: Auto/Manual/Zoom Sync</p>\r\n<p>Image rotation</p>\r\n<p>Image save and recall: SD card/SDHC Card/USB flash drive</p>\r\n<p>PinP function</p>\r\n<p>Mask function &nbsp;</p>\r\n<p>Highlight function &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>Shooting area Max. : 420 x 334 mm (A3 size)</p>\r\n<p>Native RGB output: 1080p, 720p, SXGA, WXGA, XGA &nbsp;&nbsp;</p>\r\n<p>Remote control: (with strap)</p>\r\n<p>Upper light: LED light</p>\r\n<p>Ext.Control terminal: USB 2.0, Mini-B receptacle</p>\r\n<p>Weight Approx.: 3.0 kg</p>', '<p>A visualiser/document camera is an extremely flexible teaching tool which allows teachers or students to display just about anything from a piece of paper to a piano, in glorious color, or even a person in a room. You can point, annotate, zoom in and out, or get different views by turning the arm/camera-head of the visualiser. Its flexibility can also help to develop teachers&rsquo; and students&rsquo; creativities.</p>', 'befd173453186fa8d41010c06f37c996.pdf', '<p>High Quality Images &amp; 300 Swivel Camera Head &amp; Arm: The L-12iD can capture high quality full HD images from all directions. The solid camera arm stays in position and is easily operated by both left and right-handed users.</p>\r\n<p>Ultimate Connectivity: The new feature of L-12 iD is the ultimate in connectivity and usability. It supports easy integration with your interactive whiteboard, and other classroom technology.</p>\r\n<p>Presentation Support Functions. Split screen, Highlight, Mask and Scroll</p>\r\n<p>Annotate on Live Images. Combine the L-12iD with the ELMO Wireless Tablet or ELMO interactive pen and you can annotate over live images, as well as saved ones. You can also record and play back videos, and you do not need a computer to make it work.</p>', NULL, NULL, 'N', '2017-10-05 09:46:49', '2017-10-05 09:46:49'),
(31, 'view-ptz-camera', 'View PTZ Camera', 130, '<p><span style=\"font-weight: 400;\">1/2.8 inch high qulaity CMOS sensor. Resolution is up to 1920*1080 with frame rate up to 60 fps.</span></p>\r\n<p><span style=\"font-weight: 400;\">Low noise and High SNR</span></p>\r\n<p><span style=\"font-weight: 400;\">Wide-range, quiet and quick Pan/Tilt Mechanism.</span></p>\r\n<p><span style=\"font-weight: 400;\">Multi-Format Video Outputs. Multiple interfaces include: DVI(HDMI), 3G SDI, USB wired LAN</span></p>\r\n<p><span style=\"font-weight: 400;\">Multiple Control Protcol, VISCA, PELCO-D, PELCO-P Protocols, Visca protocol control through IP port.</span></p>\r\n<p><span style=\"font-weight: 400;\">Wide application. Tele-education, lecture capture, Video conferencing, Tele-training, Tele-Medicine</span></p>', '<p><span style=\"font-weight: 400;\">Video Adjustment. Brightness, color Saturation, contrast, sharpness, B/W mode, Gamma curve</span></p>\r\n<p><span style=\"font-weight: 400;\">Video compression format. H.264, H.265</span></p>', '<p><strong>HD Conference Camera</strong></p>\r\n<p>-Full HD<br />-Wide view Angle<br />-Big zoom<br />-Multi-Interfaces</p>', '7c81f9408074c96a63835d292dd3a53c.pdf', '<p><span style=\"font-weight: 400;\">View 950-U series camera offers perfect functions, superior and rich interface. With advanced ISP processing technology and algorithm, View 950-U has lifelike image, with uniform brightness, strong sense of hierarchy, high resolution and fantastic color rendition. It supports H.265/H.264 encoding which makes camera video fluent and clear even under low bandwidth.</span></p>', NULL, NULL, 'N', '2017-08-11 10:20:45', '2017-08-11 10:20:45'),
(32, 'roomy', 'Roomy', 130, '<p><span style=\"font-weight: 400;\">1/2.8 inch high qulaity CMOS sensor. Resolution is up to 1920*1080 with frame rate up to 60 fps.</span></p>\r\n<p><span style=\"font-weight: 400;\">Low noise and High SNR</span></p>\r\n<p><span style=\"font-weight: 400;\">Wide-range, quiet and quick Pan/Tilt Mechanism.</span></p>\r\n<p><span style=\"font-weight: 400;\">Multi-Format Video Outputs. Multiple interfaces include: DVI(HDMI), 3G SDI, USB wired LAN</span></p>\r\n<p><span style=\"font-weight: 400;\">Multiple Control Protcol, VISCA, PELCO-D, PELCO-P Protocols, Visca protocol control through IP port.</span></p>\r\n<p><span style=\"font-weight: 400;\">Wide application. Tele-education, lecture capture, Video conferencing, Tele-training, Tele-Medicine</span></p>', '<p><span style=\"font-weight: 400;\">Video Adjustment. Brightness, color Saturation, contrast, sharpness, B/W mode, Gamma curve</span></p>\r\n<p><span style=\"font-weight: 400;\">Video compression format. H.264, H.265</span></p>', '<p>Resolution up to 1920x1080, output frame rate up to 60 frames/sec. Variety of optical zoom lens: with 12x, 20x, 30x. Lens has 72.5&deg; without distoration wide viewing angle. Interfaces-DVI(HDMI), SDI, USB, wired LAN.</p>', 'e7f8f96631d9a2ebf915834a9d6f0bc8.pdf', '<p><span style=\"font-weight: 400;\">View 950-U series camera offers perfect functions, superior and rich interface. With advanced ISP processing technology and algorithm, View 950-U has lifelike image, with uniform brightness, strong sense of hierarchy, high resolution and fantastic color rendition. It supports H.265/H.264 encoding which makes camera video fluent and clear even under low bandwidth.</span></p>', NULL, NULL, 'Y', '2017-11-20 11:41:07', '2017-11-04 12:40:15'),
(33, 'klick', 'Klick', 130, '<p>Superb High-definition Image: UV540 employs 1/2.8 inch high quality CMOS sensor. Resolution is up to 1920x1080 with frame rate up to 60fps.</p>\r\n<p>Various Optical Zoom Lens: UV540 has 5X/10Xptical zoom lens for options. 5x zoom lens is with 83.7 &deg; wide view angle without distortion.</p>\r\n<p>Leading Auto Focus Technology: Leading auto focus algorithm makes lens a fast, accurate and stable auto-focusing.</p>\r\n<p>Low Noise and High SNR: Low Noise CMOS effectively ensure high SNR of camera video.Advanced 2D/3D noise reduction technology is also used to further reduce the noise, while ensuring image sharpness.</p>\r\n<p>Multiple video output interfaces: Support HDMI, SDI, HDBaseT, USB and LAN.</p>\r\n<p>Multiple Video compression: Support H.265/H.264 video compression</p>\r\n<p>Audio Input Interface:Support 16000,32000,44100,48000 sampling frequency and AAC,MP3,G.711A audio coding.</p>\r\n<p>Multiple Network Protocol: Support ONVIF,RTSP,RTMP protocols and support RTMP push mode,easy to link streaming media server.</p>\r\n<p>Multiple Control Interface: RS232, RS485; RS232</p>', '<p>Image Sensor: 1/2.8 Inch High Quality CMO Sensor</p>\r\n<p><br />Effective Pixels: 2.07MP, 16:9</p>\r\n<p><br />Video Stream: Dual Stream</p>\r\n<p><br />Power Consumption: 12w(Max)</p>\r\n<p><br />Package: 12V/1.5A Power Supply, Remote Controller, Manual, Warranty Card</p>', '<p>Resolution is up to 1920x1080 with frame rate up to 60fps and 5x/10x optical zoom lens is with 83.7\" wide view angle without distortion, supports HDMI, SDI, HD BaseT, USB and LAN.</p>', 'bb89a1f38a2a0f646c1db8ed62967ef8.pdf', '<p>Multiple Control Protocols: Support VISCA, Pelco-D, Pelco-P and support auto-recognize protocol.</p>\r\n<p>Low-power sleep function: Support low-power sleep/wake up,the consumption is lower than 400mW under sleep mode</p>\r\n<p>Wide-range, Quiet and Quick Pan/Tilt Mechanism: By adopting step driving motor mechanism,UV540 camera works extremely quiet and moves smoothly.</p>\r\n<p>Multiple Remoter Control: User can choose to use IR remoter or wireless remoter according to the working environment. The 2.4G wireless remoter will not be affected by angle, distance or infrared interfere. Support remoter signal pass through function, which is convenient for back-end use.</p>\r\n<p>Preset Support up to 255 presets (10 presets by remoter ): Tele-education,lecture capture,Webcasting, Videoconferencing,Tele-training,Tele-medicine, Interrogation and Emergency command systems.</p>', NULL, NULL, 'Y', '2017-11-20 11:41:59', '2017-10-26 13:24:59'),
(34, 'snap', 'Snap', 130, '<p>&bull; Ultra crystal video quality: with advanced DSP, 1/2.8 2MP sensor and high quality 12MP lens</p>\r\n<p>&bull; Smart&amp; solid design</p>\r\n<p>&bull; Plug&amp;Play, avoid focal length setting</p>\r\n<p>&bull; Standard UVC1.5 protocol, compatible with most VC application</p>\r\n<p>&bull; 12 megapixel optical lens, 4X digital zoom</p>\r\n<p>&bull; 108 degree ultra wide field of viewing</p>\r\n<p>&bull; 1920*1080p30 high definition</p>\r\n<p>&bull; No motor design, zero mechanical failure risk</p>\r\n<p>&bull; WDR, 3DNR, BLC, Anti-flicker feature</p>\r\n<p>&bull; UVC Control (via USB3.0 port)</p>', '<p>&nbsp;</p>\r\n<p><strong>Sensor:</strong> 1/2.8 inch high quality, 2.1MP Sony CMOS sensor</p>\r\n<p><strong>Optical Zoom:</strong> 12 megapixel fixed lens</p>\r\n<p><strong>Digital Zoom:</strong> 4X</p>\r\n<p><strong>View Angle:</strong>108&deg;</p>\r\n<p><strong>Focal Lenth:</strong> f=2.27mm</p>\r\n<p><strong>White Balance:</strong> Auto/Manual/Indoor/Outdoor</p>\r\n<p><strong>Electronic Shutter:</strong> Auto</p>\r\n<p>&nbsp;</p>', '<p>Cost effective, specially designed for huddle rooms, 108 degree ultra wide field of viewing, 1080p 30frame</p>\r\n<p>&nbsp;</p>', 'a6479e2c1af71a1103ceff852943011c.pdf', '<p>&nbsp;</p>\r\n<ul>\r\n<li>Flexible hinge design: fit for monitor/PC, tripod and on desk mount</li>\r\n<li>All video, control and power over single USB3.0 cable</li>\r\n<li>Works with Windows, Mac, Android, Linux OS</li>\r\n</ul>', NULL, NULL, 'Y', '2017-11-20 11:42:41', '2017-11-04 12:41:28'),
(37, 'roomy-board-room-integration', 'Roomy Board Room integration', 130, '', '', '<p>Resolution up to 1920x1080, output frame rate up to 60 frames/sec. Variety of optical zoom lens: with 12x, 20x, 30x. Lens has 72.5&deg; without distoration wide viewing angle. Interfaces-DVI(HDMI), SDI, USB, wired LAN.</p>', '8140328aa75c7f6cfbfc1bbaee629871.pdf', '', NULL, NULL, 'N', '2017-09-18 09:38:06', '2017-09-18 09:38:06'),
(38, 'roomy-board-room-integration-camera', 'Roomy Board room integration Camera', 130, '', '', '<p>Resolution up to 1920x1080, output frame rate up to 60 frames/sec. Variety of optical zoom lens: with 12x, 20x, 30x. Lens has 72.5&deg; without distoration wide viewing angle. Interfaces-DVI(HDMI), SDI, USB, wired LAN.</p>', 'f684ce22f3aa4026b611b282755e627e.pdf', '', NULL, NULL, 'N', '2017-09-18 09:45:40', '2017-09-18 09:45:40'),
(39, 'test', 'test', 26, '<p>test</p>', '<p>test</p>', '<p>test</p>', '396d025d52bc89e637b982ed106df023.ods', '<p>test</p>', NULL, NULL, 'N', '2017-09-19 05:58:13', '2017-09-19 05:58:13'),
(40, 'test-product', 'test product', 26, '<p>test</p>', '<p>test</p>', '<p>test</p>', '3c54f9c497fecfbb299b77cfa447edb8.pdf', '<p>test</p>', NULL, NULL, 'N', '2017-09-19 05:58:13', '2017-09-19 05:58:13'),
(41, 'konnect', 'Konnect', 130, '<p>Superb High-definition Image: UV100 employs 1/2.8 inch high quality CMOS sensor. Resolution is up to 1920x1080 with frame rate up to 60fps.</p>\r\n<p>Leading Focus Technology: Leading auto focus algorithm makes lens a fast, accurate and stable auto-focusing.</p>\r\n<p>Low Noise and High SNR: Low Noise CMOS effectively ensure high SNR of camera video. Advanced 2D/3D noise reduction technology is used to further reduce the noise, while ensuring image sharpness.</p>\r\n<p>&nbsp;Wide-range, Quiet and Quick Pan/Tilt Mechanism By adopting step driving motor mechanism, UV100 camera works extremely quiet and moves smoothly without any noises.lAudio Input Interface: Support 16000,32000,44100,48000 sampling frequency and AAC,MP3,PCM audio coding.</p>\r\n<p>Multiple Video Compression: Support H.264/H.264+ video compression. Support compression of resolution up to 1920x1080 with frame up to 60 fps and 2 channels 1920x1080p with 30 fps compression.</p>\r\n<p>&nbsp;Low-power Sleep Function Support low-power sleep/wake up, the consumption is lower than 400mW under sleep mode.l&nbsp;Multiple Network Protocol: Support ONVIF,RTSP,RTMP protocols and support RTMP push mode.</p>', '<p><strong>Sensor:</strong> 1/2.8 inch high quality HD CMOS sensor</p>\r\n<p><br /><strong>Optical Zoom:</strong> 12x Optical Zoom</p>\r\n<p><br /><strong>Application:</strong> Indoor</p>\r\n<p><br /><strong>Video Compress Format:</strong> H.264, H.265</p>\r\n<p><br /><strong>Remote Maintenance(LAN):</strong> Remote update, Remote reboot, Remote Reset</p>', '<p>Dedicated intelligent auto-tracking camera with cutting-edge technology for Education and training. It includes a lecturer camera and student camera fulfilling the requirements of lecture capture and remote interactive teaching.</p>', 'c38a24f39eaf28e82eaf1e8709969db7.pdf', '<p>Integrated design: Built-in panoramic camera, to achieve an integrated fusion of panoramic camera and tracking camera.</p>\r\n<p>Advanced tracking algorithms: the use of advanced human detection, locking and tracking image processing, analysis algorithm to ensure the target tracking steady, accurate and fast.</p>\r\n<p>Strong anti-interference ability: Once the tracking target is locked, not affected by the disturbances of other moving objects and projectors etc.</p>\r\n<p>Smooth tracking: The sensitivity of action can be adjusted. Tracking target&rsquo;s small movement or gestures will not cause camera&rsquo;s mis-operation.</p>\r\n<p>Video image auto adaptation: Based on the distance of tracking target, the tracking camera will automatically zoom and the video image will always maintain the appropriate size and proportion.</p>\r\n<p>Strong environmental adaptability: The tracking performance is not affected by classroom&rsquo;s size, shape and seating arrangement.</p>\r\n<p>Ultra wide dynamic exposure function to completely avoid the problem of tracking target darken under the strong light background of projectors etc.</p>', NULL, NULL, 'Y', '2017-11-20 11:43:17', '2017-11-04 12:42:11'),
(42, 'kickle', 'Kickle', 5, '<p>&nbsp;</p>\r\n<p><strong>Interactive Whiteboard:</strong> Kickle has an easy-to-use multi-touch whiteboard that launches in a flash. You can use up to 5 touch at a time and add as many pages as you want.</p>\r\n<p><strong>Wireless presentation system:</strong> Kickle MirrorOp is our wireless presentation system which allows you to easily share documents from any device: Android, Iphone, Ipad, PC, Mac.</p>\r\n<p><strong>Room booking system:</strong> Kickle allows you to book the meeting room and optimizes the occupancy rate of your rooms. Kickle is the simpliest room booking system.</p>\r\n<p><strong>Integrated apps: </strong>Directly from Kickle, you can use Word, Excel, Powerpoint, Onenote, browse the internet, or even install your own company&rsquo;s apps with Kickle.</p>', '<p>&nbsp;</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>The user-friendliest Skype for Business videoconferencing system</li>\r\n<li>Add pages, share it with meeting participants</li>\r\n<li>Endless display solution</li>\r\n<li>No need to carry your computer around</li>\r\n<li>Free up your meeting rooms</li>\r\n</ul>', '<p>&nbsp;</p>\r\n<p>Kickle is a Skype Room System, dedicated to companies using Skype for Business and Office 365.</p>\r\n<p>Discover the user-friendliest Skype for Business videoconferencing system. Call other Skype for Business or consumer Skype users, phone numbers, or anyone who has email and internet connection.</p>', '0a973c4dc48ad385f8d0203800068aad.pdf', '<p>&nbsp;</p>\r\n<p><strong>Skype Room System</strong></p>\r\n<p>A Skype Room System is a videoconferencing room solution fully based on Skype for Business. Skype for Business provides users with instant collaboration from their own devices. Kickle extends this experience to the meeting room, from the smallest one to the biggest one.</p>\r\n<p>If you use Skype for Business or Office 365, and you simply want to extend your Skype experience to your meeting room, Kickle is what you need.</p>\r\n<p><strong>Spontaneous meeting</strong></p>\r\n<p>Skype for Business users can create a planned meeting through Outlook. But anyone can use Kickle to launch a spontaneous meeting directly from the Kickle screen. Just tap on &ldquo;call&rdquo; on the Kickle screen.</p>\r\n<p><strong>Up to six Skype for business video streams</strong></p>\r\n<p>Up to six video streams or attendees can be shown at a time during the meeting. There can be as many as 250 locations/attendees joining the meeting together. The Skype for Business video stream will switch to the one who is talking.</p>', NULL, NULL, 'Y', '2017-10-04 05:33:38', '2017-10-03 13:31:25'),
(43, 'pr-aries', 'PR-Aries', 8, '<p>HDMI Input Video/Graphics recorder</p>\r\n<p>Built-in Wifi&nbsp;</p>\r\n<p>Stream and record Simultaneously</p>\r\n<p>HDMI or USB Audio</p>\r\n<p>Full-frame Hi-Definition Capture</p>\r\n<p>Scheduling</p>\r\n<p>Multiple Control Interfaces</p>', '<p>Multiple Storage options: The Base storage(32 GB provides for 20-30 hours of recording depending on the bit-rate and quality settings specified. Models with 64 GB or 128GB may be ordered to increase the available recording limits.<br />Graphics compression: H.264(ISO/IEC 14496-10). Archive files formatted as MP4\'s.<br />Networks Interface: RJ-45(LAN, DSL, Cable Modem), Ethernet 10/100 Mbps, DHCP<br />WiFi: 2.4 GHz 802.11n wireless. Configure as a client or access point.<br />Security: Embedded Linu OS, HTTPs, SSL Certificate, SSH FTP<br />Low Power: The unit requires a single 12V external supply. Power Consumption: 15 W. External supply: AC 100-240V 50/60 Hz-80W<br />Dimensions: 225 mm W x 165 mm D x 40 mm H<br />Temperature: Operating temperature 10-35 C (50-95F). Quiet, fanless operation if proper airflow is provided.<br />Light Weight: 1.4Kg</p>', '<p>Designed for manual control and/or complete and total automation of lecture capture creation activities, this recorder will start recording via calendar entry and then will automatically upload archives to video content management systems. Three different control interfaces allow remote control and monitoring of the unit. The extremely low power drain and minimal cooling requirements allow the unit to be ready for 24/7 recording</p>', 'bfa3c3bc88fbe64117a8f74f48457e7a.pdf', '<p>Easy to use Web Interface</p>\r\n<p>Video viewing- Live or Recorded</p>\r\n<p>Multiple upload options</p>\r\n<p>Robust</p>', NULL, NULL, 'Y', '2017-10-05 12:43:58', '2017-10-05 11:51:00'),
(44, 'pr-leo', 'PR-Leo', 8, '<p>HDMI Input Video/Graphics recorder</p>\r\n<p>Built-in Wifi</p>\r\n<p>Stream and record Simultaneously</p>\r\n<p>HDMI or USB Audio</p>\r\n<p>Full-frame Hi-Definition Capture</p>\r\n<p>Scheduling</p>\r\n<p>Multiple Control Interfaces</p>', '<p><strong>Multiple Storage options:</strong> The Base storage(32 GB provides for 20-30 hours of recording depending on the bit-rate and quality settings specified. Models with 64 GB or 128GB may be ordered to increase the available recording limits.<br />Graphics compression: H.264(ISO/IEC 14496-10). Archive files formatted as MP4\'s.</p>\r\n<p><strong>Networks Interface:</strong> RJ-45(LAN, DSL, Cable Modem), Ethernet 10/100 Mbps, DHCP</p>\r\n<p><strong>WiFi:</strong> 2.4 GHz 802.11n wireless. Configure as a client or access point.<br />Security: Embedded Linu OS, HTTPs, SSL Certificate, SSH FTP</p>\r\n<p><br /><strong>Low Power:</strong> The unit requires a single 12V external supply. Power</p>\r\n<p><strong>Consumption:</strong> 15 W. External supply: AC 100-240V 50/60 Hz-80W</p>\r\n<p><strong>Dimensions:</strong> 225 mm W x 165 mm D x 40 mm H</p>\r\n<p><strong>Temperature:</strong> Operating temperature 10-35 C (50-95F). Quiet, fanless operation if proper airflow is provided.<br />Light Weight: 1.4Kg</p>', '<p>Designed for manual control and/or complete and total automation of lecture capture creation activities, this recorder will start recording via calendar entry and then will automatically upload archives to video content management systems. Three different control interfaces allow remote control and monitoring of the unit. The extremely low power drain and minimal cooling requirements allow the unit to be ready for 24/7 recording</p>', '5835ba3eb9f00bc064c3a0c4dd8fb2e4.pdf', '<p>Easy to use Web Interface</p>\r\n<p>Video viewing- Live or Recorded</p>\r\n<p>Multiple upload options</p>\r\n<p>Robust</p>', NULL, NULL, 'Y', '2017-10-05 12:46:39', '2017-10-05 11:56:54'),
(45, 'pr-gemini', 'PR-Gemini', 8, '<p>HDMI Input Video/Graphics recorder</p>\r\n<p>Built-in Wifi</p>\r\n<p>Stream and record Simultaneously</p>\r\n<p>HDMI or USB Audio</p>\r\n<p>Full-frame Hi-Definition Capture</p>\r\n<p>Scheduling</p>\r\n<p>Multiple Control Interfaces</p>', '<p><strong>Multiple Storage options:</strong> The Base storage(32 GB provides for 20-30 hours of recording depending on the bit-rate and quality settings specified. Models with 64 GB or 128GB may be ordered to increase the available recording limits.<br />Graphics compression: H.264(ISO/IEC 14496-10). Archive files formatted as MP4\'s.</p>\r\n<p><strong>Networks Interface:</strong> RJ-45(LAN, DSL, Cable Modem), Ethernet 10/100 Mbps, DHCP</p>\r\n<p><strong>WiFi:</strong> 2.4 GHz 802.11n wireless. Configure as a client or access point.</p>\r\n<p><strong>Security:</strong> Embedded Linu OS, HTTPs, SSL Certificate, SSH FTP</p>\r\n<p><strong>Low Power:</strong> The unit requires a single 12V external supply. Power</p>\r\n<p><strong>Consumption:</strong> 15 W. External supply: AC 100-240V 50/60 Hz-80W</p>\r\n<p><strong>Dimensions:</strong> 225 mm W x 165 mm D x 40 mm H</p>\r\n<p><strong>Temperature:</strong> Operating temperature 10-35 C (50-95F). Quiet, fanless operation if proper airflow is provided.</p>\r\n<p><strong>Light Weight:</strong> 1.4Kg</p>', '<p>Designed for manual control and/or complete and total automation of lecture capture creation activities, this recorder will start recording via calendar entry and then will automatically upload archives to video content management systems. Three different control interfaces allow remote control and monitoring of the unit. The extremely low power drain and minimal cooling requirements allow the unit to be ready for 24/7 recording.</p>', '15ccb541b4a92137856c386cd3db7558.pdf', '<p>Easy to use Web Interface</p>\r\n<p>Video viewing- Live or Recorded</p>\r\n<p>Multiple upload options</p>\r\n<p>Robust</p>', NULL, NULL, 'Y', '2017-10-05 12:45:01', '2017-10-05 12:05:01'),
(46, 'pr-mini', 'PR-Mini', 8, '<p>Integrated camera and recorder</p>\r\n<p>Full-frame Hi-Definition capture</p>\r\n<p>Digital USB Audio</p>\r\n<p>Built-in Wifi</p>\r\n<p>Scheduling</p>\r\n<p>Multiple Control interfaces</p>\r\n<p>Internal streaming server</p>', '<p>&nbsp;</p>\r\n<p><strong>Integrated camera and recorder:</strong> This device integrates a mega-pixel varifocal lens with a high-definition 1080p30 video recorder and all-digital USB audio to produce video captures of excellent quality and fidelity.</p>\r\n<p><strong>Easy to use web interface:</strong> The web interface utilizes the same architecture and controls developed for the high-end presentation Recorders, but simplifies the operation for video-only operation. Separate tabs permit Channel parameter assignement, archive upload and download, configuration and status.<br />Total automation of scheduling, recording and upload: Designed for complete and total automation of lecture capture and lecture creation zctivities, the recorder will start recording via calendar entry and then will automatically upload archives to video content management systems.</p>', '<p>The PR-Mini Streamer-Recorder is a breakthrough in affordability, quality and size bringing video capture and streaming within the reach of nearly everyone\'s budget while maintaining a significant feature set that is highly sophisticated in its simplicity.</p>', '4e80736fb0f78c5d87b09558cfd97820.pdf', '<p>&nbsp;</p>\r\n<p>Stream and record simultaneously</p>\r\n<p>Multiple storage option</p>\r\n<p>Lower power and light weight</p>\r\n<p>Video viewing-Live or recorded</p>\r\n<p>Robust</p>\r\n<p>Easy to use Web Interface</p>\r\n<p>Automatic upload</p>', NULL, NULL, 'Y', '2017-10-05 12:46:07', '2017-10-05 12:34:41'),
(47, 'et-510', 'ET-510', 131, '<p>&nbsp;</p>\r\n<ul>\r\n<li>Supports multiple 1/0 converting</li>\r\n<li>Simultaneous dual screen output</li>\r\n<li>Upscales video image to 1080p</li>\r\n<li>Convenient Control</li>\r\n</ul>', '<p><strong>Input signal:</strong><br />&bull; HDMI x 2<br />&bull; VGA<br />&bull; 3.5 mm audio<br />&bull; Composite x 2<br />&bull; Component<br />&bull; USB 2.0 (for firmware updates)</p>\r\n<p><strong>Output signal:</strong><br />&bull; HDMI<br />&bull; VGA<br />&bull; 3.5 mm audio &amp; composite combo</p>\r\n<p><strong>System Requirements</strong><br />A/V signal from PC / media player<br />Projector, CRT / LCD / plasma monitor</p>\r\n<p><strong>In the Box</strong><br />Multi-I/O Converter Box 510<br />Vertical stand<br />HDMI cable<br />3.5 mm to component cable<br />3.5 mm to composite/audio cable x 3<br />IR extender cable<br />Remote control (batteries included)<br />AC adapter 12 V / 1.5 A<br />Quick guide</p>', '<p>The Multi-I/O Converter Box 510 is the hub that unites your A/V devices. Simply connect your notebook, tablet, Blu-ray player, and many more to this hub, and just within minutes, all the video content will be at your service in Full HD quality.</p>', '8e96dbb2a44173f1c9b223f8c77faf70.pdf', '<p>&nbsp;</p>\r\n<ul>\r\n<li>No more changing cables</li>\r\n<li>Enjoy everything in high definition</li>\r\n<li>More screens, more flexibility</li>\r\n<li>Convenient control</li>\r\n</ul>', NULL, NULL, 'Y', '2017-10-21 13:11:05', '2017-10-21 13:11:05'),
(48, 'et-510', 'ET-510', 131, '<p>&nbsp;</p>\r\n<ul>\r\n<li>Supports multiple 1/0 converting</li>\r\n<li>Simultaneous dual screen output</li>\r\n<li>Upscales video image to 1080p</li>\r\n<li>Convenient Control</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<p><strong>Input signal:</strong><br />&bull; HDMI x 2<br />&bull; VGA<br />&bull; 3.5 mm audio<br />&bull; Composite x 2<br />&bull; Component<br />&bull; USB 2.0 (for firmware updates)</p>\r\n<p><strong>Output signal:</strong><br />&bull; HDMI<br />&bull; VGA<br />&bull; 3.5 mm audio &amp; composite combo</p>\r\n<p><strong>System Requirements</strong><br />A/V signal from PC / media player<br />Projector, CRT / LCD / plasma monitor</p>\r\n<p><strong>In the Box</strong><br />Multi-I/O Converter Box 510<br />Vertical stand<br />HDMI cable<br />3.5 mm to component cable<br />3.5 mm to composite/audio cable x 3<br />IR extender cable<br />Remote control (batteries included)<br />AC adapter 12 V / 1.5 A<br />Quick guide</p>', '<p>The Multi-I/O Converter Box 510 is the hub that unites your A/V devices. Simply connect your notebook, tablet, Blu-ray player, and many more to this hub, and just within minutes, all the video content will be at your service in Full HD quality.</p>', '4fce6385d63abfb888c1e8b09fc0a734.pdf', '<p>&nbsp;</p>\r\n<ul>\r\n<li>No more changing cables</li>\r\n<li>Enjoy everything in high definition</li>\r\n<li>More screens, more flexibility</li>\r\n<li>Convenient control</li>\r\n</ul>', NULL, NULL, 'Y', '2017-10-21 13:14:33', '2017-10-21 13:14:33'),
(49, 'et-510', 'ET-510', 131, '<p>&nbsp;</p>\r\n<ul>\r\n<li>Supports multiple 1/0 converting</li>\r\n<li>Simultaneous dual screen output</li>\r\n<li>Upscales video image to 1080p</li>\r\n<li>Convenient Control</li>\r\n</ul>', '<p><strong>Input signal:</strong><br />&bull; HDMI x 2<br />&bull; VGA<br />&bull; 3.5 mm audio<br />&bull; Composite x 2<br />&bull; Component<br />&bull; USB 2.0 (for firmware updates)</p>\r\n<p><strong>Output signal:</strong><br />&bull; HDMI<br />&bull; VGA<br />&bull; 3.5 mm audio &amp; composite combo</p>\r\n<p><strong>System Requirements</strong><br />A/V signal from PC / media player<br />Projector, CRT / LCD / plasma monitor</p>\r\n<p><strong>In the Box</strong><br />Multi-I/O Converter Box 510<br />Vertical stand<br />HDMI cable<br />3.5 mm to component cable<br />3.5 mm to composite/audio cable x 3<br />IR extender cable<br />Remote control (batteries included)<br />AC adapter 12 V / 1.5 A<br />Quick guide</p>', '<p>The Multi-I/O Converter Box 510 is the hub that unites your A/V devices. Simply connect your notebook, tablet, Blu-ray player, and many more to this hub, and just within minutes, all the video content will be at your service in Full HD quality.</p>', 'bc82efd86ea83c4704e3806a35e8bdcd.pdf', '<p>&nbsp;</p>\r\n<ul>\r\n<li>No more changing cables</li>\r\n<li>Enjoy everything in high definition</li>\r\n<li>More screens, more flexibility</li>\r\n<li>Convenient control</li>\r\n</ul>', NULL, NULL, 'Y', '2017-10-21 13:14:34', '2017-10-21 13:14:34'),
(50, 'vida', 'VIDA', 131, '<p>&nbsp;</p>\r\n<ul>\r\n<li>Seamless switching between any input</li>\r\n<li>Horizontal &amp; Vertical scaling</li>\r\n<li>Configurable PIP size, position, source</li>\r\n<li>Up to 3840x640, 2304x1152/60Hz out</li>\r\n<li>On board EDID management</li>\r\n<li>Synchronized audio output</li>\r\n<li>User setting save and loading</li>\r\n<li>Multiple splicing function</li>\r\n<li>Text overlay function</li>\r\n<li>Digital and analog input</li>\r\n<li>Frame synchronization</li>\r\n<li>Optional SDI input / loop-out</li>\r\n<li>Optional timer switching</li>\r\n</ul>', '<p>Power: 100VAC-240VAC 50/60Hz<br />Consumption: 18W<br />Environment: Working temperature: 0-450C<br />Working humidity: 10%-90%<br />Input: 4*CVBS | 2*VGA | 2*DVI |1*HDMI | 1*SDI<br />Output: 1*VGA | 2*DVI| 1*DVI-LOOP</p>', '<p>Professional Seamless video switcher &amp; scaler with multiple analog/Digital interfaces.</p>', '909db6db42d67c6745536fb2b570f447.pdf', '<p>&nbsp;</p>\r\n<ul>\r\n<li>Seamless switching</li>\r\n<li>Configurable PIP</li>\r\n<li>Part/Full screen display</li>\r\n<li>Text overlay</li>\r\n<li>Multiple cascading splice</li>\r\n</ul>', NULL, NULL, 'Y', '2017-11-03 06:59:59', '2017-11-03 06:59:59'),
(51, 'votis', 'VOTIS', 7, '<p>&nbsp;</p>\r\n<p>High resolution routing at up to 1920*1080p60</p>\r\n<p>Routing capabilities for both analog and digital sources-adds versatality and</p>\r\n<p>flexibility, for growing needs.</p>\r\n<p>Raw HD Format capturing</p>\r\n<p>Multiple feed selection</p>\r\n<p>Streaming and display of 3 videos</p>\r\n<p>Perfectly synchronized audio</p>\r\n<p>Remote diagnostic &amp; calibration features</p>\r\n<p>Unlimited user Client Licenses</p>\r\n<p>Communication &amp; Recording in H.264 format</p>', '<p>&nbsp;</p>\r\n<p>Digital audio unobbtrusive Wireless headset for the surgeon</p>\r\n<p>22\" LCD (Optional Touch Screen)</p>\r\n<p>Digital Audio System with ECHO suppression</p>\r\n<p>Built in speaker</p>\r\n<p>Multiple Video Connection and PC Connection sockets</p>\r\n<p>Video Scalar Panel for transmitting high end video. Trolley mount features</p>\r\n<p>360 degree flexi movement of PTZ Camera (with Trolley mount)</p>\r\n<p>Cr-Ni steel frame with Powder coated steel trolley.</p>', '<p>With increasing specialisations and super-specialisations in the field of medical practice, it has become essential for students to get practical and live exposure to operations and other procedures conducted by expert Surgeons. But such experts are few and the students are many. <br />With VOTIS it is now possible to record and transmit live, high resolution videos of a surgery along with patient parameters and instructions given by the surgeon while the surgery is being performed.</p>', '26b1e19fd69372327729728e53547ab0.pdf', '<p><strong>For the Student:</strong> Students can access surgery videos at any time, from anywhere on a device of their choice.</p>\r\n<p><strong>For the Hospital:</strong> VOTIS is a low cost, no frills solution that effectively integrates with existing video and data systems in the OT, independent of the manufacturer, protecting current investments.</p>\r\n<p><strong>System Flexibility:</strong> VOTIS is modular, extendable and scalable with the option to integrate with Patient Data HIS.</p>\r\n<p><strong>Easy to install and easier to use:</strong> VOTIS is designed exclusively for the OT to ensure that it does not interfere with regular OT procedures, yet giving close up videos</p>', NULL, NULL, 'Y', '2017-11-03 08:11:08', '2017-11-03 07:55:54'),
(52, 'telemedicine', 'Telemedicine', 10, '<p>XXX</p>', '<p>&nbsp;</p>\r\n<p>Image Sensor: 1.3 Mega pixels(1/3\")</p>\r\n<p>Video image capture resolution</p>\r\n<p>Image capture resolution</p>\r\n<p>Viewable Magnificient ratio</p>', '<p>Turnkey projects of public/Private sector&nbsp;Telemedicine Networks-Products, installation, maintenance, Project management.</p>', '6ccb97c3d57385a5b88b2725006ac349.pdf', '<p>XXX</p>', NULL, NULL, 'Y', '2017-11-04 07:43:30', '2017-11-04 07:43:30'),
(53, 'vcu', 'VCU', 59, '<p>&nbsp;</p>\r\n<p>Elegant light weight<br />Height adjustment<br />Easy movement<br />Hidden cable<br />Pan and Tilt Web/Cloud-based<br />Wireless mobile unit<br />Built in speaker</p>\r\n<p>&nbsp;</p>', '<p><strong>Design:</strong></p>\r\n<p>Light weight<br />Cable duct<br />Fixed Height</p>\r\n<p><strong>Pan Tilt Device(Premium Only)</strong><br />300\" Pan, +/-45\" Tilt<br />Multi-user control capability</p>\r\n<p><strong>Communication standards video:</strong></p>\r\n<p>Video H.264<br />30 frames per second</p>\r\n<p><strong>Audio:</strong><br />G.711, G.728</p>\r\n<p><strong>Network:</strong><br />ITU-T SIP Networks</p>\r\n<p><strong>Hardware:</strong></p>\r\n<p>Atom Processor, 2Gb RAM</p>\r\n<p>Beside Monitor Interface:</p>\r\n<p>Micro USB</p>\r\n<p><strong>Display:</strong></p>\r\n<p>Touch Screen</p>\r\n<p><strong>Camera:</strong></p>\r\n<p>Full HD</p>\r\n<p><strong>Audio:</strong></p>\r\n<p>Volume adjustment</p>\r\n<p><strong>Power Supply:</strong></p>\r\n<p>Inbuilt</p>', '<p>VCU- A mobile Digital Visual Interaction system suitable for the Indian Hospital and patient environment. The VCU has been designed specifically for Hospitals to solve these challenges.</p>', '4cc5196c11c1d2e1684fba4c4245a73f.pdf', '<p><strong>For the patient:</strong> Significant reduction in patient mortality rates, reduced length of stay, and better interaction with family.</p>\r\n<p><strong>For the Hospital:</strong> Reduced cost of operation, quicker and more frequent access to intensive care experts resulting in improved outcomes.</p>', NULL, NULL, 'Y', '2017-11-04 08:42:29', '2017-11-04 08:35:24'),
(54, 'vmeet', 'VMEET', 125, '<p>&nbsp;</p>\r\n<p>One to one Conference<br />Group conference<br />Lecturer Mode<br />Conference Rooms<br />Participants presence<br />Video Layout<br />Audio Control<br />Document share<br />Chat<br />Query</p>', '<p><strong>Server:</strong></p>\r\n<p>Operating System: Ubuntu or Windows &amp; CentOS with Virtual Operating Systems<br />Bandwidth Requirement: 512Kbps</p>\r\n<p><strong>Client:</strong></p>\r\n<p>Operating System: Supports Windows, MAC, LINUX with updated Web Browser and flash<br />Bandwidth Requirement: 512Kbps<br />Video: Resizable video window<br />Audio: Full duplex<br />Meetings Security: Secured with User Authentication</p>', '<p>The vMeet Collaboration suite is a web based user friendly conferencing system that provides, voice, video and collaboration features. <br />Collaboration can be extended to the enterprise/ Campus wide users over any network to be used from any desktops/Laptops with any OS(MAC, UNIX,ms) as well as Android devices.<br />Users are allowed to log in using a simple web link.</p>', 'f7cdf5b7b9435f39f11d45b4629f7488.pdf', '<p>No client application<br />Video at Low Bandwidth<br />HD Video<br />Multiple Meeting Rooms creation<br />Open Source Server client<br />Flexible Licensing</p>', NULL, NULL, 'Y', '2017-11-15 13:27:01', '2017-11-15 13:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_file`
--

CREATE TABLE `product_file` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_file`
--

INSERT INTO `product_file` (`id`, `product_id`, `file_name`, `file`) VALUES
(1, 2, 'file1', '2698271f341be8611793ec2f2dc10a56.distribution.png'),
(2, 2, 'file2', 'e55b5642b55fb4dac508c742d49bfcaa.calendar.pdf'),
(4, 2, 'file3', 'cc63f7ac058c0a82ef15842e7790922e.one.jpg'),
(5, 2, 'file4', 'e9c1e39898e8e26ede8d328fb14b16a9.blueberries.jpg'),
(6, 1, '', 'cfa12e1ec5afba991285edfe11448db4.'),
(7, 3, 'download1', 'ba5986cf8f16fbf7f269166ebaeebe7e.download.jpg'),
(8, 2, '', '38ec745f6fc256fcddba0875a66f53f1.'),
(9, 1, '', 'a12b4d91f002b11d43e3fb77f9d63685.'),
(10, 2, '', 'a5aca22c0efd43c3b29d5388270ca3c6.'),
(11, 1, '', 'aaa26cd89fb8f23a6877d2dc4b67ca47.'),
(12, 5, 'aa', '6b52f41eb5bac77561f3549d82c94c44.APP DETAIL (1).xls'),
(13, 7, 'aa', '8ed0f4f37608e26224bcca7c510233c2.APP DETAIL (1) (1).xls'),
(14, 8, 'aa', '0cb9912b0919d4b627df48aa57d650f6.1941dd3179b4ff55e215a012850dddff.xlsx'),
(15, 9, 'cc', 'fb14bc542dd44023501f7510c5affd66.APP DETAIL (1) (1).xls'),
(16, 10, '', 'c9711451cc14d912e663d55bc1453077.'),
(17, 11, 'bb', '03432aec3fd119f64f64a86ddb1917e1.APP DETAIL (1).xls'),
(18, 12, 'ss', '8342513695aa17bc7e0cbdd09c1ea70c.aparanji-issue.docx'),
(19, 13, 'bb', '592068ddbb8e4e71f458873127306d32.1941dd3179b4ff55e215a012850dddff.xlsx'),
(20, 14, 'dd', '8690f0b55afa94e00dc07d36e7046646.aparanji-issue.docx'),
(21, 15, 'ee', '618b0a2f838774da9005c3fd8a4bd415.1941dd3179b4ff55e215a012850dddff.xlsx'),
(22, 16, 'bb', 'cff1938591c46cda7710379e7a1c5452.APP DETAIL (1) (1).xls'),
(23, 17, 'cc', '3ddabb836a73615d3ce2bece7bdf3643.1941dd3179b4ff55e215a012850dddff.xlsx'),
(24, 18, 'ss', '2b649c868a483e06461f49363fc11d4d.1941dd3179b4ff55e215a012850dddff.xlsx'),
(25, 19, 'aa', 'ec03195c63578dc04bef73fbd074b5f8.1941dd3179b4ff55e215a012850dddff.xlsx'),
(26, 20, 'aa', '994f652f21ef634115ec513ca791bb98.1941dd3179b4ff55e215a012850dddff.xlsx'),
(27, 21, 'dd', 'a216896265e22a078ffa9b7a2ca8aff6.1941dd3179b4ff55e215a012850dddff.xlsx'),
(28, 22, 'aa', 'f9ada92025adf4b41f0592359a81f9e6.dummy_pdf_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(4, 1, '74d42ca20214e27d839195028bdfee8c.png'),
(5, 2, '5ef601201d6796f762c0ecc0a83fc9e6.jpg'),
(6, 5, '37819ec77a058383218c7bb69eb06e81.jpg'),
(7, 5, 'a76965ef78b54f5666712ee345dd2f21.jpg'),
(8, 5, 'b8b8b66d317e383e689a2571b3c5b631.jpg'),
(9, 5, 'b09aa0e9c0a0817fd9d42d767f147dcc.jpg'),
(10, 7, '65b10b89685d14563e20dd7ed6080b55.jpg'),
(11, 7, 'a505d50d0f59abca15940cb3c0396b8e.jpg'),
(12, 7, '73c2067f479d24f38a8c1c0f1271497c.jpg'),
(13, 7, 'f7b81a2295b4a86c0656104ea88d3dbf.jpg'),
(30, 14, '89fb85a0b19904984baf46178ed440a1.jpg'),
(31, 14, 'd42b8121001c83d9625baea8cdce9deb.jpg'),
(33, 15, '92ea952af1a9b8af869588304e7086c3.jpg'),
(34, 16, '5d2c1b1b4e0b3fd35134e28d821d4301.jpg'),
(35, 16, '76a3bc0f55bac37624152ab0e175752f.jpg'),
(36, 16, '4fa5619b85661338ff84e005248fc97b.jpg'),
(37, 16, '14eb6d70778a26644056843960937ca3.jpg'),
(38, 17, 'f7be73c43600f5b57e2fecfd0c43f867.jpg'),
(39, 17, 'd74f17f47ae783241d6e912828e82a01.jpg'),
(40, 17, 'ac1b211bf5894f8398a61cfec6410305.jpg'),
(41, 18, '9c49c7bdcb95a99d15a34dea8919861a.jpg'),
(42, 18, '1d033b02ce2c4a5967517d05a6613a16.png'),
(43, 18, 'a42fe67bfe341b4441a846b46ebe54fe.jpg'),
(44, 18, '8fbc13a446a2770325543b5c3cc23846.jpg'),
(45, 19, '45753a47bdc69d7c5971aafeda9c8f3e.jpg'),
(46, 19, 'e30b842894c25b23a7039054967a9d39.jpg'),
(47, 19, '45324ee58b91b5cabbf2a24bbe5bb74c.jpg'),
(52, 21, '4d9f891eca55883823240a34bec11e9e.jpg'),
(53, 21, 'a0e605e27b0f06f222540c15744529bc.jpg'),
(54, 21, 'c658c42e39d83f4200fa15ab2005d50f.jpg'),
(55, 21, 'daecb728b113770ed5b3589818f0cbc9.jpg'),
(60, 5, '872f41649029ab3332369b3ae00f652d.PNG'),
(61, 5, '129f23aafe30292f2ed8311ce6ad1f83.PNG'),
(71, 27, '7452f057120a0aaac21e179bff27a5b2.jpg'),
(72, 26, '6b2fad5ecd14d0fc3daf4ef2ef16e3b0.jpg'),
(75, 20, '703e52ebfd7d57875289d118a7bc28ec.jpg'),
(76, 20, '9f1d98e5947aa9e2238f3780807f5cb7.jpg'),
(77, 20, 'c2157d3588f8bf9c3809a4b0dd0c8c9e.JPG'),
(78, 25, '6e4649c92fe68fc892cd8e4e9b0f4a9a.PNG'),
(79, 25, '68fb2ec4b6ee55f919422890661a7009.jpeg'),
(80, 25, '0ffc5d118ba59da85d28f3bf824182b1.PNG'),
(81, 24, '082567d32dd0195439296619a935f75e.jpg'),
(82, 24, 'ea53ade392390a2a36b29fb5690beb07.jpg'),
(83, 24, '673f9e09ef9c530f494c6d80f4e2f874.png'),
(89, 13, 'd3ba5f1d8201b01de10e2710c80367ed.png'),
(93, 29, '183a2455decc3d34ea178b2176281264.jpg'),
(95, 31, '8789e0a55802d95a178d3dbd4bfd7f95.jpg'),
(98, 9, 'ff3b779dada9bbfb013e912ff7356e2e.png'),
(99, 11, '8b195d6192b99fb8bd7e4e5b466da85b.png'),
(100, 12, 'f1a49e21125034ec3d0267839bece1fa.png'),
(101, 12, 'ef4e5567295a746890edee5a314d1319.png'),
(106, 11, '2019ee8468328b6771f8ad36ea123d7b.JPG'),
(109, 8, '6ef076b4ec3afef8b6a48a347abb211c.JPG'),
(111, 36, 'aab386ac8a794eda4b3ca4f2151f4813.jpg'),
(112, 36, '440935ffe476bf190fc4f3b733aa5046.jpg'),
(113, 28, '651e46976d1b2ebec62a9a6f81984af1.jpg'),
(114, 28, '1bd0399294d3c34117e55ec72eb3a476.jpg'),
(115, 28, '50c205d65f5d1c9ba05ffe8294bd74f4.jpg'),
(120, 37, 'f9af7676d17ccdaacf64e3367dea2b85.jpg'),
(121, 38, 'ce9c8ba0315ec6d35f27c2297bc9870e.jpg'),
(123, 40, 'a6e2e274ff27b43bf4711a249a3d605d.jpg'),
(124, 40, 'c563c0c0ca5d4d2df9c7ab3d282f22a5.jpg'),
(125, 34, 'ec10ea662b4f67b7cc2eaf154e1b5ea2.PNG'),
(126, 33, 'b54108ad60cc2fd64926d7557150505d.PNG'),
(128, 41, '4449669f7e92162dbb237db3741ce837.PNG'),
(129, 32, '677b3336a60b327e7ec90b03ac32b164.PNG'),
(130, 42, '5b7dd06f09b776a386ecfa3d2891ee30.jpg'),
(131, 42, 'b9fb70f2ebecb9044c8873f1af4c861d.jpg'),
(132, 42, '0f912612adeb196cefc0318e248502f0.jpg'),
(133, 22, '434000630068c7b01dbf1a45ef498f42.png'),
(134, 22, '455e91a012971279dd6e0ea64c185c6b.jpg'),
(135, 22, '6402a04a10ffd75e2f9e371ecdc5ec5a.jpg'),
(136, 43, '398966380c33669c520efcff2f77ae53.png'),
(137, 44, 'c35e7922971b53e5dc82bce345567dae.png'),
(138, 45, '2afbad967eeef18eacacc163275282df.png'),
(139, 46, 'f6aae06019aff704ac94ab1a56dbda1d.png'),
(140, 47, '0303b6aa00e57a9f6e1f6a18b1b2187f.png'),
(141, 48, '7e7552f35f42718fe28fcbcdea5488a9.jpg'),
(142, 49, '04ffeca4c90bd68c44c3d897bc6239c9.png'),
(143, 49, 'b9e669744a459065889cd937c1016858.png'),
(144, 48, 'b46189fc2d41290f91b9d9b9181087c9.png'),
(145, 48, '7b40035502ed0e093026af4fbf23e50d.png'),
(146, 48, '4b90a7464bc7d8d5c85c4eae75c480e0.png'),
(147, 50, '028bd0786f7fe558554ed3f265cd6e09.png'),
(148, 50, '99c87a61a0d4fbc5a4cc536422556ec3.JPG'),
(149, 50, '1751c094c70162ebab340e59a0546e5a.JPG'),
(150, 50, '8c44ec348dbecbcb49ff14f199e043af.JPG'),
(151, 50, '192f6f5e020d074635dc9cbb06b23051.JPG'),
(152, 51, '4eab60132b068029659bc2f517a3d6bf.png'),
(153, 52, 'b75baae45a2e39d10332bc07c0e86334.PNG'),
(154, 53, 'e4318206944af668a084f707c2dbd269.png'),
(155, 53, '578c4630706228c0452c16653722434a.JPG'),
(156, 54, 'b671a550b549369f0f788b2048431291.jpg'),
(160, 53, '3dca438901662b43a967886554ac13a0.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `resel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `frimname` varchar(150) NOT NULL,
  `address` tinytext NOT NULL,
  `citypin` varchar(55) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `state` varchar(100) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `in_yr` varchar(30) NOT NULL,
  `emp` varchar(55) NOT NULL,
  `equity` varchar(70) NOT NULL,
  `totalsales` varchar(55) NOT NULL,
  `roc` varchar(40) NOT NULL,
  `gst` varchar(40) NOT NULL,
  `itpan` varchar(40) NOT NULL,
  `roc_file` varchar(100) NOT NULL,
  `gst_file` varchar(100) NOT NULL,
  `itpan_file` varchar(100) NOT NULL,
  `type_reseller` varchar(40) DEFAULT NULL,
  `prop_name` varchar(100) NOT NULL,
  `prop_address` tinytext NOT NULL,
  `prop_city` varchar(60) NOT NULL,
  `prop_mobile` varchar(30) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `part_address` tinytext NOT NULL,
  `part_city` varchar(60) NOT NULL,
  `part_mobile` varchar(30) NOT NULL,
  `dir_name` varchar(100) NOT NULL,
  `dir_address` tinytext NOT NULL,
  `dir_city` varchar(60) NOT NULL,
  `dir_mobile` varchar(30) NOT NULL,
  `sales_name` varchar(100) NOT NULL,
  `sales_contact` varchar(30) NOT NULL,
  `sales_email` varchar(100) NOT NULL,
  `accounts_name` varchar(100) NOT NULL,
  `accounts_contact` varchar(30) NOT NULL,
  `accounts_email` varchar(100) NOT NULL,
  `logistics_name` varchar(100) NOT NULL,
  `logistics_contact` varchar(30) NOT NULL,
  `logistics_email` varchar(100) NOT NULL,
  `tech_name` varchar(100) NOT NULL,
  `tech_contact` varchar(30) NOT NULL,
  `tech_email` varchar(100) NOT NULL,
  `support_name` varchar(100) NOT NULL,
  `support_contact` varchar(30) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `ifsc_code` varchar(55) NOT NULL,
  `cheque_file` varchar(100) NOT NULL,
  `bank_contact` varchar(30) NOT NULL,
  `bank_address` tinytext NOT NULL,
  `bank_phone` varchar(40) NOT NULL,
  `credit_limit` varchar(55) NOT NULL,
  `ac_no` varchar(55) NOT NULL,
  `type` varchar(40) NOT NULL,
  `amount` varchar(55) NOT NULL,
  `optradio` varchar(20) DEFAULT NULL,
  `trade_name1` varchar(100) NOT NULL,
  `trade_address1` tinytext NOT NULL,
  `trade_citypin1` varchar(40) NOT NULL,
  `trade_phone1` varchar(40) NOT NULL,
  `trade_state1` varchar(70) NOT NULL,
  `trade_fax1` varchar(55) NOT NULL,
  `trade_name2` varchar(100) NOT NULL,
  `trade_address2` tinytext NOT NULL,
  `trade_citypin2` varchar(40) NOT NULL,
  `trade_phone2` varchar(40) NOT NULL,
  `trade_state2` varchar(70) NOT NULL,
  `trade_fax2` varchar(55) NOT NULL,
  `date` varchar(30) NOT NULL,
  `place` varchar(55) NOT NULL,
  `signature_seal` varchar(100) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Y-Active, N-Inactive',
  `created_at` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`resel_id`, `user_id`, `frimname`, `address`, `citypin`, `phone`, `email`, `state`, `fax`, `mobile`, `in_yr`, `emp`, `equity`, `totalsales`, `roc`, `gst`, `itpan`, `roc_file`, `gst_file`, `itpan_file`, `type_reseller`, `prop_name`, `prop_address`, `prop_city`, `prop_mobile`, `part_name`, `part_address`, `part_city`, `part_mobile`, `dir_name`, `dir_address`, `dir_city`, `dir_mobile`, `sales_name`, `sales_contact`, `sales_email`, `accounts_name`, `accounts_contact`, `accounts_email`, `logistics_name`, `logistics_contact`, `logistics_email`, `tech_name`, `tech_contact`, `tech_email`, `support_name`, `support_contact`, `support_email`, `bank_name`, `ifsc_code`, `cheque_file`, `bank_contact`, `bank_address`, `bank_phone`, `credit_limit`, `ac_no`, `type`, `amount`, `optradio`, `trade_name1`, `trade_address1`, `trade_citypin1`, `trade_phone1`, `trade_state1`, `trade_fax1`, `trade_name2`, `trade_address2`, `trade_citypin2`, `trade_phone2`, `trade_state2`, `trade_fax2`, `date`, `place`, `signature_seal`, `status`, `created_at`, `updated_date`) VALUES
(1, 74, 'Test', 'Test', '6250002', '045289756', 'thiviakrishnan@ymail.com', 'test', '045289764', '944286789', '1992', '8', '1crore', '10lakhs', '4567825', '123654789', '123654789', '', 'db27ec82b35403f02c96a34b72d9f61d.jpg', '33dcbe25026f86e76499479bbda2df77.jpg', 'Sole Propreitor', 'test', '4/835 Anna Bustand', 'Madurai', '9425687388', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '9442528146', 'thiviakrishnan@outlook.com', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '432e09242cf03a33dd965737e242a5c5.png', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'on', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', '09/30/2017', 'Madurai', '04eec75408e4f1a569cb283ff244fe46.JPG', 'Y', '2017-09-28 10:23:46', '2017-09-28 10:23:46'),
(2, 74, 'Test', 'Test', 'Test', '123654789', 'thiviakrishnan@gmail.com', 'Test', '12365478', '98756564123', '1996', '5', '1crore', '1crore', 'NA', 'Test', 'Test', '', '9c6420848342764c9c14d5502cc9f361.jpg', '34b336e745e1eb55b34d4a10d6a29ac8.jpg', 'Sole Propreitor', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', '12365479', 'ccb84b700b437487ea34bdd3d562041d.jpg', 'Test', 'Test', '12365478', '1256987', '123654798', 'Test', 'Test', 'on', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', '10/07/2017', 'Madurai', '12cddeece3cfe86c655574393c7b5832.jpg', 'Y', '2017-09-28 01:01:33', '2017-09-28 13:01:33'),
(3, 61, 'test', 'test', '455354', '06576757', 'testreseller@test.com', 'TN', '56565665465645', '5656665656', '10', '12', 't', 'a', 'a', 'a', 'a', '', '', '', 'Sole Propreitor', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'on', 'a', 'a', 'a', 'a', 'a', 'a', '', '', '', '', '', '', '10/22/2017', 'a', 'a21057e0588937e239151d764c501d6d.jpg', 'Y', '2017-10-22 04:38:37', '2017-10-22 16:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `reseller_doc_limited_company`
--

CREATE TABLE `reseller_doc_limited_company` (
  `id` int(11) NOT NULL,
  `limit_comp` varchar(100) NOT NULL,
  `reseller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reseller_doc_limited_company`
--

INSERT INTO `reseller_doc_limited_company` (`id`, `limit_comp`, `reseller_id`) VALUES
(1, '150659422696059.pdf', 1),
(2, '150660369327421.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reseller_doc_partnership_firm`
--

CREATE TABLE `reseller_doc_partnership_firm` (
  `id` int(11) NOT NULL,
  `partnership_firm` varchar(100) NOT NULL,
  `reseller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_doc_sole_proprietor`
--

CREATE TABLE `reseller_doc_sole_proprietor` (
  `id` int(11) NOT NULL,
  `sole_proprietor` varchar(100) NOT NULL,
  `reseller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` tinyint(1) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `from_email_display_name` varchar(55) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `facebook_link` varchar(250) NOT NULL,
  `twitter_link` varchar(250) NOT NULL,
  `youtube_link` varchar(250) NOT NULL,
  `linked_in` varchar(250) NOT NULL,
  `google_plus` varchar(250) NOT NULL,
  `pinterest` varchar(250) NOT NULL,
  `header_script` text NOT NULL,
  `footer_script` text NOT NULL,
  `logo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `from_email`, `from_email_display_name`, `support_email`, `facebook_link`, `twitter_link`, `youtube_link`, `linked_in`, `google_plus`, `pinterest`, `header_script`, `footer_script`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'webadmin@atnetindia.net', 'A&T Video Networks', 'webadmin@atnetindia.net', 'https://www.facebook.com/atnetvideo/', 'https://twitter.com/atnetvideo', 'https://www.youtube.com/channel/UCmanI2uevmSPbFcx49ReXgg', 'https://www.linkedin.com/in/atnetvideo/', 'https://plus.google.com/u/2/112360818465811280017', 'https://in.pinterest.com/atnetindia/', '&lt;script&gt;console.log(\'header scripts\');&lt;/script&gt;', '&lt;script&gt;console.log(\'footer scripts\');&lt;/script&gt;', '9d4f99d00bfffcee20353f79c4ffa4d7.png', '2017-09-28 05:46:48', '2017-09-20 09:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `testi_title` varchar(150) DEFAULT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Y-Active,N-Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `website`, `location`, `testi_title`, `designation`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kaushik', 'info@hardshop.in', 'http://www.hardshop.in/default', 'Pune', '', 'MD, The Hardshop', 'I am surprised how they continue to bring in new innovative solutions with innovative product mix which are really beneficial for reselling to my clients I continue to partner with them.', '726a7a7a3bdc7bb3746cb7b6df19d779.jpg', 'Y', '2017-07-19 08:38:46', '2017-06-16 08:14:29'),
(2, 'Rajagopal', 'eepcho@eepcindia.net', 'https://www.eepcindia.org/', 'Kolkata', '', 'Director, EEPC', 'Complete trust in the products, solution design and customer support of A & T for our video conferencing infrastructure.', '', 'Y', '2017-07-19 08:40:43', '2017-06-19 00:16:28'),
(3, 'Shankar', 'regr@admin.iisc.ernet.in', 'http://www.iisc.ac.in/', 'Bangalore', '', 'Consultant, Indian Institute of Science', 'Hats off to the technology team of A&T. They understood our requirement exactly as we needed and provided a professional service.', '', 'Y', '2017-07-19 08:43:51', '2017-06-21 06:31:33'),
(4, 'Ramkumar', 'rlins@rlins.in', 'http://www.rlins.edu.in/', 'Madurai', '', 'Management Executive, R.L. institute of Nautical Sciences', 'Great personal touch from A&T right from the start of designing the solution to ensuring that we make use of the investment.', NULL, 'Y', '2017-07-19 08:45:58', '2017-07-04 07:04:29'),
(5, 'userfive', 'user5@test.com', '', '', '', 'SER', 'test content', NULL, 'N', '2017-07-05 15:18:21', '2017-07-05 15:18:21'),
(6, 'CR Venkatesh', 'adsales@galatta.com', 'http://www.galatta.com', '', '', 'CEO, Galatta.com', 'I was shuttling Madurai - Chennai every week and now with the Video conferencing solution provided by A & T, travel frequency is reduced to half.', '', 'Y', '2017-07-19 08:47:51', '2017-07-18 13:22:36'),
(7, 'Rishi Rajani', 'rishi@blfindia.com', 'http://www.blfindia.com/', 'Mumbai', '', 'MD, Biharilal Fashions', 'Changed my Lifestyle and working style and got me new clients. I have now made Video conferencing a part of the process itself in the garment production and exports with the help of Ashwin.', '', 'Y', '2017-07-19 08:36:44', '2017-07-18 13:23:41'),
(8, 'Venkataramani B', 'bvenki@nitt.edu', 'https://www.nitt.edu/', '', 'Video Conferencing', 'Dean(Research & Consultancy), NITT', 'I would like to congratulate you and your team for successfully installing the video conferencing hardware and software in our institute in 10 class rooms thereby converting them to virtual class rooms (VCRs).', '', 'Y', '2017-08-17 10:33:54', '2017-08-17 10:31:56'),
(9, 'Ramannujam S', 'ramannujam.s@tvstyres.com', 'http://www.tvstyres.com/', 'Madurai', '', 'GM - Corp HR', 'Live streaming provided by A&T Video Networks was unique highlight on founders day and their efforts are widely appreciated.', '', 'Y', '2017-09-26 12:47:12', '2017-09-26 12:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'C-Client, P-Partner, E-Employee',
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partner_type` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cperson` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8_unicode_ci,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_of_establishment` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_sales` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_technical` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annual_revenue` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_territories` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_focus` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_offer` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_deal` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason_for_interest` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_token` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_notification` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0-No, 1-Yes',
  `video_conf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_steam` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_record` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_camera` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `microphone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Y-Active,N-Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `first_name`, `last_name`, `street`, `email`, `password`, `partner_type`, `companyname`, `cperson`, `address`, `phone`, `mobile`, `state`, `country`, `year_of_establishment`, `no_of_sales`, `no_of_technical`, `annual_revenue`, `sales_territories`, `current_focus`, `product_offer`, `brand_deal`, `reason_for_interest`, `employee_id`, `designation`, `location`, `pass_token`, `remember_token`, `customer_notification`, `video_conf`, `video_steam`, `video_record`, `video_camera`, `microphone`, `status`, `created_at`, `updated_at`) VALUES
(22, 'P', 'A', 'M', 'TC 9/2673(1), CSM 291 (2), CSM NAGAR, EDAPPAZHINJI, SASTHAMANGALAM, TRIVANDRUM-695010', 'vipin@neufsolutions.com', '$2y$10$EZGkSons4DVVvdoiPWLKQ.bSOJGgccg9MgwUnlCL7GII75tkfaKKm', 'Reseller Partner', 'NEUF SOLUTIONS', NULL, NULL, '04712317333', NULL, 'KERALA', NULL, '4 YEARS', '11', '4', '5 lakhs', 'KERALA, TAMILNADU', 'education,enterprises,government,health,individual,users,infrastructure,media,service', 'IT/ITES', 'ALL LEADING BRANDS', 'reason3', NULL, NULL, NULL, 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-10 11:22:50', '2017-10-04 10:45:53'),
(30, 'E', 'Saravanakumar', 'S', NULL, 'skumar@atnetindia.net', '$2y$10$JGrL3ILDL2OSiIPvIreadOesWKlyb6I0twU3lvZPszHRYgvNGRG0S', NULL, NULL, NULL, NULL, NULL, '9443319890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC3', 'Chief Technology Officer', 'Madurai', 'no', 'LY3a2w2vymryLWyspsAseGB3K6z4mW0Q6qqH10oKAxhSAqtDm98c7aLaN0Ae', '', '', '', '', '', '', 'Y', '2017-08-16 07:33:00', '2017-10-16 13:50:45'),
(31, 'E', 'Sathya Kumar', 'C', NULL, 'sathyakumar@atnetindia.net', '$2y$10$mHjF6v6WTOsMvi.NMQBmue.I1NJ07.4ROirbDtWiHIU9fml4dVQKW', NULL, NULL, NULL, NULL, NULL, '9442619818', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC41', 'Solution Specialist', 'Madurai', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-16 07:36:05', '2017-08-16 07:36:05'),
(32, 'E', 'Navaneethakrishnan', 'S', NULL, 'nkrishnan@atnetindia.net', '$2y$10$q5cBBb09BfZlqKYS6n1WfOdZDjKJGQiWXiPAEnk7nHS4U4eGiNalG', NULL, NULL, NULL, NULL, NULL, '9442619815', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC105', 'Product Engineer', 'Madurai', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-16 07:42:11', '2017-09-06 05:38:36'),
(33, 'E', 'Satheesh Kumar', 'MC', NULL, 'satheesh@atnetindia.net', '$2y$10$kKl55lGjt32EVf6zisNid.3irpodrEosZDU8RCX3tnmo8sq/GQLBS', NULL, NULL, NULL, NULL, NULL, '9443319894', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC125', 'Product Engineer', 'Madurai', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-16 07:44:10', '2017-08-16 07:44:10'),
(34, 'E', 'Ramadoss', 'C L M', NULL, 'rdoss@atnetindia.net', '$2y$10$Ny9ZUsxDlXQ.z.sgszv1w.p.hFdbpMTsKRF75zmyK.Pkr08PWP.2i', NULL, NULL, NULL, NULL, NULL, '9442619892', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC14', 'Chief Operating Officer', 'Madurai', 'no', 'uWHq85zQDAoTE6luQmchWth0ve0AldEyMvVtbjmEJbfGYGJEbN44T7WYXfs2', '', '', '', '', '', '', 'Y', '2017-08-16 07:46:11', '2017-10-30 04:55:11'),
(35, 'E', 'Ananth Babu', 'SS', NULL, 'ananth@atnetindia.net', '$2y$10$F/Mg9Lvr7yb5w.MRDGX3CeCsEVXj5IfGNCbQ0UIJq7QATWv4gUZyu', NULL, NULL, NULL, NULL, NULL, '9442619817', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC14', 'Purchase & Logistics Executive', 'Madurai', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-16 07:48:10', '2017-09-06 07:14:35'),
(36, 'E', 'Latchumana Kumar', 'S', NULL, 'laxmank@atnetindia.net', '$2y$10$1V93tRvlN4dfQJZl1K.kWuWTSF0H04NIrD/eH1BSyiK6g1aSyuU.S', NULL, NULL, NULL, NULL, NULL, '9442619898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC133', 'Accounts Executive', 'Madurai', 'no', 'JgnBb0jpvA57rgTINvA1lhrfoMYkAAm3cXBXqCSTsRbrEEkJfRtYBbtgwLbv', '', '', '', '', '', '', 'Y', '2017-08-16 07:57:48', '2017-09-06 07:15:23'),
(37, 'E', 'Uma Maheswari', 'T', NULL, 'uma@atnetindia.net', '$2y$10$J/JSE4y0I7MBLVRYZOAri.4iJ5KPvG1aqn0CJ51dOnFmVQpko9IRC', NULL, NULL, NULL, NULL, NULL, '9442619821', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC119', 'Marketing Executive', 'Madurai', 'no', 'pBeUjPbR15AnXYh2vSMbsFiFnkd6MLL7XUD1h2B64XNWlbuzHBjS7g8HFtQy', '', '', '', '', '', '', 'Y', '2017-08-16 08:01:47', '2017-09-06 07:15:20'),
(38, 'E', 'Thivia', 'CK', NULL, 'thivia@atnetindia.net', '$2y$10$VbqYWEg9NLRQt13z03KKv.ZUNXgc0twwD4pUNjgT6kZ9/OXh6UyIu', NULL, NULL, NULL, NULL, NULL, '9442619820', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC138', 'Digital Marketing Executive', 'Madurai', 'no', 'ZEOp2YvXOPQYNGe1XGmdrS3sBrP3q9BtJnAPC5m8H5QjRruREY9yQUS7LLJK', '', '', '', '', '', '', 'Y', '2017-08-16 08:02:53', '2017-10-20 13:48:52'),
(39, 'E', 'Subhashini', 'R', NULL, 'subha@atnetindia.net', '$2y$10$bOU.164j/Sjgaz19N1HCVOlX5jcPBgV2MH.v98awj5Qpr8j/psxFW', NULL, NULL, NULL, NULL, NULL, '9442619822', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC137', 'Inside Sales-Executive', 'Madurai', 'no', 'BH7r5dhxjLt02ET4bIelFI8UHLCnKjfn3KAKMfTIXMhzMsHQiDhf1vkhXrHK', '', '', '', '', '', '', 'Y', '2017-08-16 08:11:17', '2017-09-05 11:55:36'),
(40, 'E', 'Ashwin', 'Desai', NULL, 'ashwin@atnetindia.net', '$2y$10$nBIV7I8YKAz2JjbKFiNyqOLuHQ3TQhSI5Iwnou9a.2Y2to1AoU6Mm', NULL, NULL, NULL, NULL, NULL, '4524392222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC1', 'Managing Director', 'Madurai', 'no', 'YxjqGWnNfVXH5EobECzgnefhIjYJN7Qo0hxVVOfxvsTbe9vbIL2SEQ6PBQKK', '', '', '', '', '', '', 'Y', '2017-08-16 08:15:32', '2017-09-06 07:10:23'),
(41, 'E', 'Sangita', 'Desai', NULL, 'sangita@atnetindia.net', '$2y$10$uVt71yxcdXKW49oaFvgwsOdtjkeUJ3NXBwc04iHkM3BfAqricz8PC', NULL, NULL, NULL, NULL, NULL, '9442704300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC73', 'Management Executive', 'Madurai', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-16 08:17:04', '2017-08-16 08:17:04'),
(42, 'E', 'Nagapandi', 'K', NULL, 'nagapandi@atnetindia.net', '$2y$10$ji9GFC51PHosTj4i1/ILRO6EdEezD2tMzt/nDi.GM4dRVO9fmGzfW', NULL, NULL, NULL, NULL, NULL, '9442619896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '139', 'Customer Support Engineer', 'Madurai', 'no', 'fVWkqSOCE8wCqw1bOusEYFkD5FB5nOJXQ8ODKInbiWCJG2C7TWX46AmmjSpK', '', '', '', '', '', '', 'Y', '2017-08-16 09:10:06', '2017-09-12 05:21:20'),
(43, 'E', 'Kishorelal', 'MRN', NULL, 'kishore@atnetindia.net', '$2y$10$Iy.z.G3cqT8J7QYO7RS8FOW4U3.GqqKZkCGEUDjuo2CqJ7kPLOuIO', NULL, NULL, NULL, NULL, NULL, '9442619897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C140', 'Customer Support Engineer', 'Madurai', 'no', 'uYUkNeyP76Etk55nC8XhkcbEBBIbadlWQS8uhdfl2GtML9e1i2jb0cLdb42Z', '', '', '', '', '', '', 'Y', '2017-08-16 09:15:42', '2017-08-31 11:49:23'),
(44, 'E', 'Suriya Kumar', 'B', NULL, 'suriya@atnetindia.net', '$2y$10$IAwE9JcmP4xt6qTtgqjBjuA5dDnYRfOdWEwpm3kOXuf83owgyNewa', NULL, NULL, NULL, NULL, NULL, '9442619813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC112', 'Customer Support Engineer', 'Coimbatore', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-17 07:43:53', '2017-08-17 07:43:53'),
(45, 'E', 'Arockia', 'Berlin', NULL, 'berlin@atnetindia.net', '$2y$10$SFYJJIcCEYPZWLaaHcr/1elEQRPObqR2URvbKgy953gNW5Ym7aV6W', NULL, NULL, NULL, NULL, NULL, '9442619814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC127', 'Customer Support Engineer', 'Trichy', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-17 07:51:48', '2017-08-17 07:51:48'),
(46, 'E', 'Muthukumar', 'M', NULL, 'muthukumar@atnetindia.net', '$2y$10$EhH3Y22pLHoNrFboeYGfRer1Qu0PQEeWn9o1nbHQOREzdLxucPZQG', NULL, NULL, NULL, NULL, NULL, '9442619816', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC130', 'Customer Support Engineer', 'Karaikal', 'no', 'uyWZVizFv4aFzTpV2OdPbTlx64UMLYkYLanR0EWoK5SgrtZbK5JeqqcPi4CS', '', '', '', '', '', '', 'Y', '2017-08-17 07:53:29', '2017-09-12 05:32:47'),
(47, 'E', 'Sasikumar', 'M', NULL, 'sasikumar@atnetindia.net', '$2y$10$dCcj4gmFruYHJC1NNOmp6uU.8O2e03o.IsLgOTc7ml6mX2LwDzfRC', NULL, NULL, NULL, NULL, NULL, '9442619813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC129', 'Customer Support Engineer', 'Trivandrum', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-17 08:21:43', '2017-08-17 08:21:43'),
(48, 'E', 'Karthick', 'B', NULL, 'karthick@atnetindia.net', '$2y$10$OOUuEg63k4lY8oQrXuNPiObxWcafLvLkKVnd9wmZs2K3xyf7uAHwG', NULL, NULL, NULL, NULL, NULL, '9442619894', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC132', 'Customer Support Engineer', 'Trichy', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-17 08:23:56', '2017-08-17 08:23:56'),
(49, 'E', 'Vignesh', 'S', NULL, 'vigneshs@atnetindia.net', '$2y$10$PyKKAATRqGGrxtejVC2NP.Y16sJMGBPjXizMNGNUyn0CoKhpv1.xK', NULL, NULL, NULL, NULL, NULL, '9443319893', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EC131', 'Customer Support Engineer', 'Trivandrum', 'no', NULL, '', '', '', '', '', '', 'Y', '2017-08-17 08:27:43', '2017-08-17 08:27:43'),
(52, 'E', 'test', 'test', NULL, 'emptest@test.com', '$2y$10$LldQJa3l/Y0j3Hx9NmF1geRpRO1.Mv2Oni65d0IpgKijdEackiVXC', NULL, NULL, NULL, NULL, NULL, '1010101010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'emp01', 'SSE', 'chennai', 'no', 'J3AqW2Ihx8Vh2KZHhOzjULx4Y0KPn7BOsi5xyuPgixqOaEu0mK0vEb9Si8Te', '', '', '', '', '', '', 'N', '2017-08-18 13:44:50', '2017-10-16 06:04:20'),
(53, 'V', 'jai', 'sankar', NULL, 'jai@test.com', '$2y$10$4wrsnkruIm8PGzAJ62bA.eSb2/DmWoUpzutt.0R3kJZAltjhjJmoS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'LyZFs2CptkIDwcOU4U95ojqLb4ysTDAyUPxKeoV4o3wo7IjHQj4X2B7OPtWs', '', '', '', '', '', '', 'Y', '2017-08-22 14:33:26', '2017-09-16 14:08:07'),
(54, 'V', 'thivia', '', NULL, 'thiviakrishnan@gmail.com', '$2y$10$N0MkJWZxDq40MgO0UHPLsOgdus8FgFYRw3fvSY7Ur7QMQN/41iOLu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '', '', '', '', '', '', 'N', '2017-08-23 05:52:30', '2017-10-04 06:17:44'),
(55, 'V', 'Thivia', '', NULL, 'thiviakrishnan@ymail.com', '$2y$10$ECy1wzH.NBSRBjJJQbjBIumbwVtYXjj0TNTps4TJFa2mUl9Me3NyC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'ZScGRPrDSzJq7GTBq0pfcWHmljbkWvUXprftj0Nao3xG6osReAXJM62vkv9I', '', '', '', '', '', '', 'Y', '2017-08-24 07:49:13', '2017-10-16 13:12:38'),
(56, 'V', 'kasi', '', NULL, 'kasi@test.com', '$2y$10$kFMBzJ8zq4u5KyBXfnv4v.mPK/4696YAWaGv.BvPQ3Owkc0QpWcwK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'wBDU4nOfsIXHCVNFV2EOM9S4igzdLBgX9nbBQ3k8Lz1W5Khv3YVi5nV90RrO', '', '', '', '', '', '', 'Y', '2017-08-24 09:10:39', '2017-08-24 12:14:10'),
(61, 'P', 'haneefa', '', 'test st', 'haneefamsit@gmail.com', '$2y$10$0StnzRemItdyzVDyjsZ5oOK2N1xapTNi.j7cXYCkToyYkpMFV7xp.', 'Referral Partner,Reseller Partner', 'sysnx', NULL, NULL, '023423432', NULL, 'TN', NULL, '12', '10', '10', '100000', '10000', 'education,enterprises', 'test', 'test', 'reason1,reason2', NULL, NULL, NULL, 'no', 'BmzoelNvOwNY17EbWUgbaxiE9v8MaDw3QCYPIKFbjPexcgm23xOCFVj1zvA6', '0', '', '', '', '', '', 'Y', '2017-09-08 12:54:36', '2017-10-24 07:41:15'),
(62, 'C', 'haneefa', '', NULL, 'haneefa@systimanx.com', '$2y$10$/fSGqo6S6bGWkguhnkbjBuY4hIIOC0M8UYPGV3GqVgvi2xTcLZIC.', NULL, 'sysnx', 'nagoor haneefa', NULL, '0443254543', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chennai', 'no', 'KhsGArpNz5IR89N162vQ1D2XKuPt8DE3NILyltNXXHCstEMkI7kerb0OFGmA', '1', '', '', '', '', '', 'Y', '2017-09-08 13:34:35', '2017-10-16 04:42:33'),
(64, 'V', 'bala', '', NULL, 'bala@systimanx.com', '$2y$10$88mOQS8B0ziGOhEu6jxMzeWP2vXWS4VRWnwBaS3Ek9e2ACSmJyVN.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'xUB4GgSMDMVREJYujihJxSB80cUGp1Nkl1LhVdezGxSQbrSanOqsEI0F2ReZ', '0', '', '', '', '', '', 'Y', '2017-09-08 13:55:17', '2017-10-16 13:39:29'),
(69, 'C', 'Ashvin', '', NULL, 'marketing@altop.com', '$2y$10$j1ZbLgVJw5peLcMA7IPOtOVYsraHE/xDIOusWdHVgoZQd5489IORi', NULL, 'ALTOP INDUSTRIES', 'Ashvin J CHawhan', NULL, '7045799545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vasai', 'no', NULL, '1', '', '', '', '', '', 'N', '2017-09-13 04:54:33', '2017-10-13 10:14:43'),
(72, 'E', 'test', 'test', NULL, 'test@gmail.com', '$2y$10$Lbl4FmAufCZsQbbH8M2ZeOSitIYHi/vSsq12n6G0Kwmmmri3BoWCO', NULL, NULL, NULL, NULL, NULL, '9790376487', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111', 'test', 'madurai', 'no', NULL, '0', '', '', '', '', '', 'N', '2017-09-18 08:42:46', '2017-10-16 06:04:20'),
(73, 'P', 'shailesh', '', 'Malad east', 'sikosystems@gmail.com', '$2y$10$fHsDOPu5AiNujeZmAvSgbOl0NRL313OIFHjpRVnVkWiAwtCRqyI4S', 'Referral Partner,Reseller Partner', 'Sikosystems', NULL, NULL, '7666726728', NULL, 'Maharashtra', NULL, '1', '1', '1', '1lakh', 'Mumbai,Pune,Gujarat', 'education,enterprises,health,infrastructure,media', 'Audio-ductVisual pro', 'Cisco,Hikvision', 'reason1,reason2,reason5,reason4', NULL, NULL, NULL, 'no', NULL, '0', '', '', '', '', '', 'Y', '2017-09-27 12:43:56', '2017-10-11 13:02:57'),
(75, 'P', 'K', 'Sriidhar', '1402/D-2, 2nd Floor, Nangal Raya,New Delhi', 'k.sriidhar@webconit.in', '$2y$10$JoHx2a674GuDuxXRTvbO9.IGBRihTH8z7h2fLuGw6on4UO2uDb4Lm', 'Reseller Partner', 'Webcon IT Solutions P Limited', NULL, NULL, '9971600569', NULL, 'DELHI', NULL, '4', '5', '3', '2 Cr', 'Northern India', 'education,enterprises,government', 'Board Room, Conference Room Solution, Web Conferencing Solution,', 'GOTOMEETING, Extron Crestron and all Major brands', 'reason1,reason2,reason5,reason3,reason4', NULL, NULL, NULL, 'no', NULL, '0', '', '', '', '', '', 'Y', '2017-09-29 05:41:17', '2017-10-04 10:45:59'),
(76, 'P', 'Rajkumar', '', 'Periyar Nagar', 'Info@avprosystems.com', '$2y$10$NDY6HdqFMfx1zQusm7Bn3ej5PmjHsJCN8DvcUMEcsqGEVH1I6JUj6', 'Reseller Partner', 'Avpro systems', NULL, NULL, '9159729486', NULL, 'Tamil Nadu', NULL, '7', '3', '2', '90 lAkh', 'Tamil Nadu kerala', 'education,enterprises,government,health,infrastructure,media,service', 'Avaya tanberg', 'Polycom life size Cisco Avaya', 'reason3', NULL, NULL, NULL, 'no', NULL, '0', '', '', '', '', '', 'Y', '2017-10-03 13:18:24', '2017-10-04 10:46:06'),
(78, 'P', 'SHINOY', 'SS', 'CALICUT', 'excel.clt@excelbs.in', '$2y$10$.TcvMtFcKv5TM32.9pI14Or9zQE8RTfORB2HJZJ841dxzU.sNdEVy', 'Reseller Partner', 'EXCEL BUSINESS SYSTEMS', NULL, NULL, '9995552008', NULL, 'KERALA', NULL, '11', '7', '11', '12 cr', 'All Kerala', 'education,enterprises,government,health', 'All Kerala Distributor for Panasonic Projectors, Displays and HDVC', 'Panasonic, SHARP, EPSON', 'reason1', NULL, NULL, NULL, 'no', 'Q5bTQwh8RP8aDqsjCV79hSB9qAtqnQ0SldWj0MzmNYvkHNQSw3zcVRa0NtrA', '0', '', '', '', '', '', 'Y', '2017-10-05 12:26:13', '2017-11-05 12:41:36'),
(79, 'C', 'Test', '', NULL, 'Thiviakrishnan@outlook.com', '$2y$10$mdpNGF181du8OLRHLKv1DOMGdXyV/Z1il.GOzkuvVkff85QU2awKy', NULL, 'Test', 'Test', NULL, '944256879', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test', 'no', 'E1z3bJrEg4HXdw7SyJParpAe9MX6riyY0lF6i60PS5PhlIUtcNza8qaioess', '1', '', '', '', '', '', 'Y', '2017-10-06 08:05:23', '2017-10-06 08:07:52'),
(80, 'P', 'Hanuj', 'Tilwani', 'GUSEC, Gujarat University', 'hanuj@tinkerstore.com', NULL, 'Referral Partner,Reseller Partner', 'TinkerStore', NULL, NULL, '9033299150', NULL, 'Gujarat', NULL, '0.2', '2', '0', 'NA', '1', 'education', 'Sales and Marketing', 'Mettl', 'reason1,reason3', NULL, NULL, NULL, 'no', NULL, '0', '', '', '', '', '', 'N', '2017-10-10 11:37:35', '2017-10-10 11:37:35'),
(82, 'P', 'Sandeep', 'Singh', NULL, 'sandeep@cromptechindia.com', '$2y$10$mRvokj2UosljZ6zaKEYwheptKGvZEzbqEFdJM4wQ6TlqHdhTWfaPW', 'Referral Partner', 'Cromptech Integrated Solutions P. Ltd.', NULL, '6/14 WEA Karol Bagh', '9811107040', NULL, 'Delhi', NULL, '2007', '3', '4', '2 Cr', 'Delhi (NCR)', 'government', 'VC & AV Solutions', 'Polycom, Panasonic, Lifesize, Crestron', 'reason1', NULL, NULL, NULL, 'no', NULL, '0', 'Cloudline', 'Ncast', 'VSTOR', 'View', 'Avermedia', 'Y', '2017-10-29 09:07:25', '2017-10-30 05:24:39'),
(83, 'V', 'edvin', '', NULL, 'edvin@test.com', '$2y$10$LPxooWegpoYl7SHzyb.bGOWkNVFc2BRP/rWlbQ262vlvaCr2hJKhe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Y', '2017-11-03 13:18:13', '2017-11-03 13:18:13'),
(84, 'P', 'Selva', 'Muthukumar', NULL, 'selvamuthukumar@originitfs.com', '$2y$10$GnpHCM6sLEQbKEPDIj/fGutMkWBtOiLqCeSp2ERU5l47mmUo.R/.m', 'Reseller Partner', 'Origin ITFS Pvt. Ltd.', NULL, 'Type II/1, Dr.V.S.I Estate, Next to NIFT, Rajiv Gandhi Salai, Thiruvanmiyur,Chennai-600 041 Tamil Nadu', '04442940606', NULL, 'Tamil Nadu', NULL, '>5', '2', '5', '12Crores', 'Tamil Nadu', 'education,enterprises,government,health,infrastructure,media,service', 'All', 'All', 'reason1,reason2,reason5,reason3,reason4', NULL, NULL, NULL, 'no', '9bKor47M7fD841tSKRpJcSMpvjFYKYJa5d2aP0FvwSQczfDBMGv2EAWdw1kZ', '0', 'Cloudline', 'Ncast', 'VSTOR', 'View', 'Avermedia', 'Y', '2017-11-04 07:18:01', '2017-11-21 12:46:31'),
(85, 'C', 'RMR', 'HOSPITAL', NULL, 'drap@rmrhealth.org', NULL, NULL, 'dr.a.pandian', 'PANDIAN', NULL, '8754548810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tiruvannamalai', 'no', NULL, '1', NULL, NULL, NULL, NULL, NULL, 'N', '2017-11-08 02:16:46', '2017-11-08 02:16:46'),
(86, 'P', 'SUDHIRR', 'AGARWAL', NULL, 'sudhirr@cyberace.in', '$2y$10$jHHjl7bnNRk14tH7oCzPc.5k72noVw.No8occz3UP9JFHIM3vTfHq', 'Reseller Partner', 'CYBERACE INFOVISION PVT LTD', NULL, 'C-3 Laram centre off SV Road Andheri west Mumbai 400058', '8291991770', NULL, 'Maharashtra', NULL, '6 years', '15', '20', '32 cr', 'mumbai pune, ranchi, delhi,chennai, cochin ,banglore,hyderabad,ahemadabad.', 'education,enterprises', 'end to end AV and IT solutions', 'LG ,CRESTRON ,KRAMER ,LIGHTWARE ,BOSE ,SENNHEISER, APART,EPSON ,SONY', 'reason1,reason5', NULL, NULL, NULL, 'no', NULL, '0', 'Tely', 'Ncast', 'VSTOR', 'View', 'Acoustic Magic', 'Y', '2017-11-17 08:43:42', '2017-11-17 09:40:15'),
(87, 'P', 'M.', 'RENGANATHAN', NULL, 'renganathan@arkaindia.com', '$2y$10$00q5ai0h6bn5R0ionUuJ/OgK7oD6e9I8VB7k6p7lSSkd3Nhi0etna', 'Reseller Partner', 'ARKA MULTITECH (P) LTD.,', NULL, 'F-4, Upper Crest, Door No.11, School Street, Koyambedu, Chennai - 600 107', '04442832141', NULL, 'Tamil Nadu', NULL, '7', '4', '1', '1,00,00,000', 'All India', 'education,health', 'Modular OT / ICU / Disposal Systems / Radiology workstations / Life Skill Program for Schools', 'Intrasense / Meneehome', 'reason3', NULL, NULL, NULL, 'no', NULL, '0', 'Cloudline', 'Ncast', 'VSTOR', 'View', 'Avermedia', 'Y', '2017-11-18 06:25:47', '2017-11-18 06:44:09'),
(88, 'P', 'Javed', 'Rahim', NULL, 'javed@vantagesinc.com', '$2y$10$ojhnkBL18A2yRpBHWsiHcekbh8kzBVDCgXqgfN5iNtIXXRTQCYcGu', 'Reseller Partner', 'Vantage Systems Inc', NULL, '# 13 Norris Road Cross, Richmond Town', '9845022935', NULL, 'Karnataka', NULL, '21', '8', '20', '800 lakh', 'karnataka, AP & Telangana ststes', 'education,enterprises,government,health,infrastructure,media,service', 'IP-PBX, AV Integration, VC, AV Mounts, SAMSUNG Hotel TV Distribution', 'PANASONIC,SAMSUNG,POLYCOM,CISCO,LG,', 'reason3,reason4', NULL, NULL, NULL, 'no', NULL, '0', 'Tely', 'Ncast', 'VSTOR', 'View', 'Avermedia', 'Y', '2017-11-18 07:03:36', '2017-11-18 07:06:17'),
(89, 'P', 'DILIP', 'GANDHI', NULL, 'compexgroup@gmail.com', '$2y$10$y4OENO8PJ1fWsn/yzOoAneeMU5TIcg5Mgjwn3qUGMsu3wg835sjSK', 'Reseller Partner', 'COMPEX TECHNOLOGIES P. LTD', NULL, '404, REGENCY PLAZA, OPP. RAHUL TOWER, ANANDNAGAR ROAD, SATELLITE, ABOVE GLORIA RESTURENT', '9825143791', NULL, 'Gujarat', NULL, '20', '5', '7', '15 Croes', 'GUJARAT', 'education,enterprises,government,health,infrastructure', 'SMART CLASS HARDWARE, PROJECTORS, AND RELATED ITEMS', 'CYBERNETYX, EPSON ,SONY', 'reason3', NULL, NULL, NULL, 'no', NULL, '0', 'Cloudline', 'Ncast', 'VSTOR', 'View', 'Acoustic Magic', 'Y', '2017-11-21 05:03:12', '2017-11-21 07:55:04'),
(90, 'V', 'Testone', '', NULL, 'testone@atnetindia.net', '$2y$10$F4H1uLmF.DOp6NElBNnFEuefEw0lPEbkDRfrxJ1QKK8fwqt5Gf8yG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Y', '2017-11-21 08:54:20', '2017-11-21 08:54:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  ADD KEY `admins_password_resets_email_index` (`email`),
  ADD KEY `admins_password_resets_token_index` (`token`);

--
-- Indexes for table `banner_list`
--
ALTER TABLE `banner_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_image`
--
ALTER TABLE `blog_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `career_contact`
--
ALTER TABLE `career_contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `career_dependant`
--
ALTER TABLE `career_dependant`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `career_project`
--
ALTER TABLE `career_project`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `career_work_exp`
--
ALTER TABLE `career_work_exp`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `customer_survey`
--
ALTER TABLE `customer_survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `deal_register`
--
ALTER TABLE `deal_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_feedback`
--
ALTER TABLE `demo_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_request`
--
ALTER TABLE `demo_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_manager_list`
--
ALTER TABLE `file_manager_list`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `file_index` (`file_name`),
  ADD KEY `file_name` (`file_name`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_client`
--
ALTER TABLE `our_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_file`
--
ALTER TABLE `product_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`resel_id`);

--
-- Indexes for table `reseller_doc_limited_company`
--
ALTER TABLE `reseller_doc_limited_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller_doc_partnership_firm`
--
ALTER TABLE `reseller_doc_partnership_firm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller_doc_sole_proprietor`
--
ALTER TABLE `reseller_doc_sole_proprietor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner_list`
--
ALTER TABLE `banner_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `blog_image`
--
ALTER TABLE `blog_image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `career_contact`
--
ALTER TABLE `career_contact`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `career_dependant`
--
ALTER TABLE `career_dependant`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `career_project`
--
ALTER TABLE `career_project`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `career_work_exp`
--
ALTER TABLE `career_work_exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer_survey`
--
ALTER TABLE `customer_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deal_register`
--
ALTER TABLE `deal_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `demo_feedback`
--
ALTER TABLE `demo_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `demo_request`
--
ALTER TABLE `demo_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file_manager_list`
--
ALTER TABLE `file_manager_list`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1132;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `our_client`
--
ALTER TABLE `our_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `product_file`
--
ALTER TABLE `product_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `resel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reseller_doc_limited_company`
--
ALTER TABLE `reseller_doc_limited_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reseller_doc_partnership_firm`
--
ALTER TABLE `reseller_doc_partnership_firm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reseller_doc_sole_proprietor`
--
ALTER TABLE `reseller_doc_sole_proprietor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
