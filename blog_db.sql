-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 12:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `category` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `content`, `image`, `featured`, `date`, `category`, `user_id`) VALUES
(15, 'Unveiling the Power of JavaScript: A Comprehensive Guide', 'Discover the versatility and impact of JavaScript in our in-depth exploration. From its role in modern web development to practical tips and examples, this article sheds light on why JavaScript is a must-know language for developers.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a metus nisl. In bibendum diam sed massa dignissim lacinia. Suspendisse potenti. Fusce fringilla auctor purus id dictum. Integer sollicitudin urna id enim feugiat, a commodo massa suscipit. Maecenas vel feugiat justo. Aenean vel augue dolor. Vivamus euismod, turpis vel consectetur varius, erat neque mattis nulla, vel tincidunt libero purus sed justo. Sed malesuada sapien eget libero vehicula bibendum. Proin condimentum in sem sed congue. Maecenas fringilla tellus ut ante gravida, non aliquam ante semper. Cras in magna ipsum. Vestibulum sodales venenatis neque, ac convallis justo semper sit amet. Phasellus euismod sem et lacus venenatis, nec tincidunt nisl consequat.\r\n\r\nDonec tristique nisl eget est vulputate, ac fringilla elit tincidunt. Vivamus vehicula in erat ac fermentum. Fusce ullamcorper ut lorem id egestas. Sed tristique venenatis massa, in efficitur dui facilisis ac. Sed euismod quam eu odio mattis, vel cursus quam vestibulum. Sed sed bibendum libero. Nullam pellentesque eget augue non convallis. Vivamus efficitur, orci vel elementum venenatis, odio lectus dictum erat, nec cursus ligula metus ac odio. Nunc vel venenatis nunc. Vivamus bibendum, dolor vel bibendum bibendum, purus lectus finibus quam, vel facilisis lorem nulla vel purus. In nec quam eu odio finibus vehicula eu nec erat. Suspendisse potenti. Nullam sit amet ante quis quam placerat vulputate.\r\n\r\nPhasellus non nunc eu odio aliquet blandit ut eget justo. In consectetur quam sit amet justo tincidunt, non vulputate augue bibendum. Etiam bibendum, libero a luctus varius, orci libero mattis ipsum, id elementum quam libero at libero. Vivamus dapibus, justo sit amet laoreet dictum, odio felis dignissim neque, ac efficitur libero leo non tellus. Integer a vehicula arcu. Cras at placerat lorem. Nullam ultrices tincidunt erat, nec posuere dui. Vivamus cursus ultrices risus, in elementum odio consectetur eget. Integer ut vestibulum metus. Sed ac metus id lorem blandit lacinia. Vivamus et arcu at quam vehicula venenatis ut sed nisl. Nulla facilisi.', '_c522a835-c9b9-48d6-bbd1-c5465586f1f9.jpg', 0, '2023-09-26', 'JavaScript', 16),
(16, 'CSS Mastery: 10 Essential Tricks for Web Design Wizards', 'Unlock the secrets of CSS wizardry with our latest article! Dive into 10 essential tricks that will elevate your web design skills to the next level. From responsive layouts to stunning animations, discover how to harness the full potential of Cascading Style Sheets and transform your websites into works of art. Don\'t miss out on these must-know CSS techniques!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a metus nisl. In bibendum diam sed massa dignissim lacinia. Suspendisse potenti. Fusce fringilla auctor purus id dictum. Integer sollicitudin urna id enim feugiat, a commodo massa suscipit. Maecenas vel feugiat justo. Aenean vel augue dolor. Vivamus euismod, turpis vel consectetur varius, erat neque mattis nulla, vel tincidunt libero purus sed justo. Sed malesuada sapien eget libero vehicula bibendum. Proin condimentum in sem sed congue. Maecenas fringilla tellus ut ante gravida, non aliquam ante semper. Cras in magna ipsum. Vestibulum sodales venenatis neque, ac convallis justo semper sit amet. Phasellus euismod sem et lacus venenatis, nec tincidunt nisl consequat.\r\n\r\nDonec tristique nisl eget est vulputate, ac fringilla elit tincidunt. Vivamus vehicula in erat ac fermentum. Fusce ullamcorper ut lorem id egestas. Sed tristique venenatis massa, in efficitur dui facilisis ac. Sed euismod quam eu odio mattis, vel cursus quam vestibulum. Sed sed bibendum libero. Nullam pellentesque eget augue non convallis. Vivamus efficitur, orci vel elementum venenatis, odio lectus dictum erat, nec cursus ligula metus ac odio. Nunc vel venenatis nunc. Vivamus bibendum, dolor vel bibendum bibendum, purus lectus finibus quam, vel facilisis lorem nulla vel purus. In nec quam eu odio finibus vehicula eu nec erat. Suspendisse potenti. Nullam sit amet ante quis quam placerat vulputate.\r\n\r\nPhasellus non nunc eu odio aliquet blandit ut eget justo. In consectetur quam sit amet justo tincidunt, non vulputate augue bibendum. Etiam bibendum, libero a luctus varius, orci libero mattis ipsum, id elementum quam libero at libero. Vivamus dapibus, justo sit amet laoreet dictum, odio felis dignissim neque, ac efficitur libero leo non tellus. Integer a vehicula arcu. Cras at placerat lorem. Nullam ultrices tincidunt erat, nec posuere dui. Vivamus cursus ultrices risus, in elementum odio consectetur eget. Integer ut vestibulum metus. Sed ac metus id lorem blandit lacinia. Vivamus et arcu at quam vehicula venenatis ut sed nisl. Nulla facilisi.', 'OIG.jpg', 0, '2023-09-26', 'CSS', 16),
(17, 'Breaking Down the Web Development Essentials: A Step-by-Step Tutorial', 'Explore the fundamentals of web development with our comprehensive step-by-step tutorial! From HTML and CSS to JavaScript and beyond, embark on a journey through the building blocks of the digital world. Whether you\'re a beginner or looking to refine your skills, this article is your roadmap to mastering the art of web development. Join us as we demystify the process and empower you to create captivating online experiences.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a metus nisl. In bibendum diam sed massa dignissim lacinia. Suspendisse potenti. Fusce fringilla auctor purus id dictum. Integer sollicitudin urna id enim feugiat, a commodo massa suscipit. Maecenas vel feugiat justo. Aenean vel augue dolor. Vivamus euismod, turpis vel consectetur varius, erat neque mattis nulla, vel tincidunt libero purus sed justo. Sed malesuada sapien eget libero vehicula bibendum. Proin condimentum in sem sed congue. Maecenas fringilla tellus ut ante gravida, non aliquam ante semper. Cras in magna ipsum. Vestibulum sodales venenatis neque, ac convallis justo semper sit amet. Phasellus euismod sem et lacus venenatis, nec tincidunt nisl consequat.\r\n\r\nDonec tristique nisl eget est vulputate, ac fringilla elit tincidunt. Vivamus vehicula in erat ac fermentum. Fusce ullamcorper ut lorem id egestas. Sed tristique venenatis massa, in efficitur dui facilisis ac. Sed euismod quam eu odio mattis, vel cursus quam vestibulum. Sed sed bibendum libero. Nullam pellentesque eget augue non convallis. Vivamus efficitur, orci vel elementum venenatis, odio lectus dictum erat, nec cursus ligula metus ac odio. Nunc vel venenatis nunc. Vivamus bibendum, dolor vel bibendum bibendum, purus lectus finibus quam, vel facilisis lorem nulla vel purus. In nec quam eu odio finibus vehicula eu nec erat. Suspendisse potenti. Nullam sit amet ante quis quam placerat vulputate.', 'OIG.lxKc156aPeMR.jpg', 0, '2023-09-26', 'Tutorials', 16),
(18, 'HTML Evolution: Unraveling the Past, Present, and Future of Web Markup', 'Delve into the world of HTML with our latest article! Explore the rich history, current trends, and exciting future prospects of web markup. From the early days of the internet to cutting-edge developments, we take you on a journey through the evolution of HTML. Discover how this essential language shapes the web and what lies ahead in the ever-evolving landscape of digital content creation.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a metus nisl. In bibendum diam sed massa dignissim lacinia. Suspendisse potenti. Fusce fringilla auctor purus id dictum. Integer sollicitudin urna id enim feugiat, a commodo massa suscipit. Maecenas vel feugiat justo. Aenean vel augue dolor. Vivamus euismod, turpis vel consectetur varius, erat neque mattis nulla, vel tincidunt libero purus sed justo. Sed malesuada sapien eget libero vehicula bibendum. Proin condimentum in sem sed congue. Maecenas fringilla tellus ut ante gravida, non aliquam ante semper. Cras in magna ipsum. Vestibulum sodales venenatis neque, ac convallis justo semper sit amet. Phasellus euismod sem et lacus venenatis, nec tincidunt nisl consequat.\r\n\r\nDonec tristique nisl eget est vulputate, ac fringilla elit tincidunt. Vivamus vehicula in erat ac fermentum. Fusce ullamcorper ut lorem id egestas. Sed tristique venenatis massa, in efficitur dui facilisis ac. Sed euismod quam eu odio mattis, vel cursus quam vestibulum. Sed sed bibendum libero. Nullam pellentesque eget augue non convallis. Vivamus efficitur, orci vel elementum venenatis, odio lectus dictum erat, nec cursus ligula metus ac odio. Nunc vel venenatis nunc. Vivamus bibendum, dolor vel bibendum bibendum, purus lectus finibus quam, vel facilisis lorem nulla vel purus. In nec quam eu odio finibus vehicula eu nec erat. Suspendisse potenti. Nullam sit amet ante quis quam placerat vulputate.\r\n\r\nPhasellus non nunc eu odio aliquet blandit ut eget justo. In consectetur quam sit amet justo tincidunt, non vulputate augue bibendum. Etiam bibendum, libero a luctus varius, orci libero mattis ipsum, id elementum quam libero at libero. Vivamus dapibus, justo sit amet laoreet dictum, odio felis dignissim neque, ac efficitur libero leo non tellus. Integer a vehicula arcu. Cras at placerat lorem. Nullam ultrices tincidunt erat, nec posuere dui. Vivamus cursus ultrices risus, in elementum odio consectetur eget. Integer ut vestibulum metus. Sed ac metus id lorem blandit lacinia. Vivamus et arcu at quam vehicula venenatis ut sed nisl. Nulla facilisi.', 'OIG (1).jpg', 1, '2023-09-26', 'HTML', 15),
(19, 'LastPass Data Leak: Protecting Your Digital Vaults in an Insecure World', 'Get the latest on the LastPass data leak in our comprehensive news article. Learn about the implications of this breach and, more importantly, how to safeguard your online accounts and sensitive information in an increasingly insecure digital landscape. Stay informed and take action to fortify your digital security.', 'Donec tristique nisl eget est vulputate, ac fringilla elit tincidunt. Vivamus vehicula in erat ac fermentum. Fusce ullamcorper ut lorem id egestas. Sed tristique venenatis massa, in efficitur dui facilisis ac. Sed euismod quam eu odio mattis, vel cursus quam vestibulum. Sed sed bibendum libero. Nullam pellentesque eget augue non convallis. Vivamus efficitur, orci vel elementum venenatis, odio lectus dictum erat, nec cursus ligula metus ac odio. Nunc vel venenatis nunc. Vivamus bibendum, dolor vel bibendum bibendum, purus lectus finibus quam, vel facilisis lorem nulla vel purus. In nec quam eu odio finibus vehicula eu nec erat. Suspendisse potenti. Nullam sit amet ante quis quam placerat vulputate.\r\n\r\nPhasellus non nunc eu odio aliquet blandit ut eget justo. In consectetur quam sit amet justo tincidunt, non vulputate augue bibendum. Etiam bibendum, libero a luctus varius, orci libero mattis ipsum, id elementum quam libero at libero. Vivamus dapibus, justo sit amet laoreet dictum, odio felis dignissim neque, ac efficitur libero leo non tellus. Integer a vehicula arcu. Cras at placerat lorem. Nullam ultrices tincidunt erat, nec posuere dui. Vivamus cursus ultrices risus, in elementum odio consectetur eget. Integer ut vestibulum metus. Sed ac metus id lorem blandit lacinia. Vivamus et arcu at quam vehicula venenatis ut sed nisl. Nulla facilisi.\r\n\r\nProin rhoncus, augue id hendrerit iaculis, ex arcu vehicula odio, ac eleifend metus nulla vel enim. Ut semper, sem at vehicula condimentum, libero tortor malesuada enim, id tempus metus dui vel ligula. Integer mattis congue libero, eu vehicula tortor tincidunt a. Curabitur id dapibus arcu. Nunc dapibus vehicula purus, at egestas ligula aliquet sed. Sed auctor, justo a fermentum volutpat, libero est hendrerit purus, a lacinia massa tellus a lectus. Vivamus malesuada a nulla eget ultrices. Suspendisse potenti. Curabitur et efficitur enim. Vivamus mattis metus vitae dolor posuere hendrerit. Integer consectetur, sapien id efficitur malesuada, purus dolor gravida velit, id malesuada sapien orci ac lorem. Vestibulum posuere eu purus eget cursus. Sed eget quam at odio suscipit commodo. Quisque tristique turpis a ex venenatis, eu fringilla tellus pellentesque.', 'OIG (2).jpg', 0, '2023-09-26', 'Freebies', 15),
(20, 'Web Design Revolution: Redefining Digital Aesthetics and User Experiences', 'Dive into the dynamic world of web design with our latest article! Explore the cutting-edge trends and innovative techniques reshaping digital aesthetics and user experiences. From responsive layouts to captivating visuals, discover how web designers are revolutionizing the online landscape. Stay ahead of the curve and unlock the secrets to creating visually stunning and user-friendly websites.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.', 'OIG (3).jpg', 0, '2023-09-26', 'Web Design', 15),
(21, 'Mastering OPSEC: Safeguarding Your Digital Footprint in an Uncertain World', 'Explore the crucial realm of Operations Security (OPSEC) in our latest article. Discover the strategies and techniques to effectively safeguard your digital presence in an increasingly uncertain world. From protecting your online identity to securing sensitive information, this article provides invaluable insights into maintaining the highest level of OPSEC. Stay ahead of potential threats and ensure your online activities remain confidential and secure.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi', 'OIG (4).jpg', 0, '2023-09-26', 'Freebies', 15),
(22, 'AI-Powered Design: Elevating Web Aesthetics and Efficiency', 'Uncover the transformative potential of AI in our latest article. Explore how Artificial Intelligence is revolutionizing web design, enhancing aesthetics, and streamlining efficiency. From automated design suggestions to personalized user experiences, discover the incredible ways AI is reshaping the digital landscape. Stay at the forefront of innovation and harness the power of AI to create visually stunning and user-friendly websites.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.', 'OIG (5).jpg', 0, '2023-09-26', 'Tutorials', 17),
(23, 'Fortifying PHP: Enhancing Security in Web Development', 'Explore the vital realm of PHP security in our latest article. Learn essential strategies and techniques for bolstering the security of your web applications and websites. From best practices to emerging tools, discover how to safeguard your PHP code against potential threats and vulnerabilities. Stay one step ahead in the ever-changing landscape of web security and ensure the protection of your digital assets.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor justo at ipsum eleifend, id blandit augue suscipit. Sed euismod, nulla a fringilla laoreet, justo erat facilisis purus, eu commodo justo libero a nulla. Vivamus nec libero arcu. In hac habitasse platea dictumst. Nulla facilisi. Curabitur euismod lectus vitae malesuada. Proin eget ultrices dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed vitae elit ut libero laoreet iaculis. Nulla facilisi. Curabitur viverra massa nec ipsum sollicitudin, a tempor dolor dignissim. Sed bibendum lacinia bibendum. Nulla facilisi.', 'OIG.Djb.xUNi3.jpg', 0, '2023-09-26', 'Tutorials', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `admin`, `name`, `password`) VALUES
(13, 1, 'admin', '$2y$10$dT8sG6z78bCO4RVovfMmCOS..BC68Z0zwjkpIZABph3JuL8s/aam6'),
(14, 0, 'LAR', '$2y$10$YQeYm1llN3elj/4AbJG3Z.hobjd1/IPUy6TuNUA4v.8yv0zpbLx1O'),
(15, 0, 'Jhon', '$2y$10$LDHKOej8OTRqeRe.5tVhnORKB/Kj3ileRHInYARkftPZO7XAKduPm'),
(16, 0, 'Henry', '$2y$10$xp.IshbRpPI/onhZl7lNDOrBzuzZw7ozBxIu1bGufPeB/Dm8.B1Ay'),
(17, 0, 'Leo', '$2y$10$9hBoPLmScEm0Y7ZXaHBiXO91m6v4UmUGuYy0G28b/7dBvcdFxYi76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
