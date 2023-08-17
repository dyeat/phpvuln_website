-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-17 05:24:07
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `blog`
--

-- --------------------------------------------------------

--
-- 資料表結構 `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `title`, `content`, `author`, `published_date`) VALUES
(1, 'Data Science Central', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'John Doe', '2023-07-01'),
(2, 'SmartData Collective', 'Run By: Social Media Today Website link: SmartDataCollective.com SmartData Collective is a community site focused on trends in business intelligence and data management. Similar to Data Science Central, it also features insights into data science through contributions by industry experts. Where Data Science Central focuses directly on data science as a whole, SmartData Collective looks at the wider field and how data science can intersect with business.', 'Jane Smith', '2023-07-05'),
(3, 'What\'s The Big Data?', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Run By: Gil Press Website link: WhatsTheBigData.com What\'s The Big Data? takes a different approach to data science and focuses on the impact of big data’s growth into the digital behemoth it is today. The blog’s founder, Gil Press, is intimately familiar with big data and data science, having spent a career in data research and now running a consulting practice. In his blog, Press explores how big data interacts with our lives and impacts everything from technology to business to government and policy. He provides a source of news and commentary on the sphere of data.', 'Bob Johnson', '2023-07-10'),
(4, 'No Free Hunch', 'Run By: Kaggle Website link: Blog.Kaggle.com This blog is slightly different than the others, offering a look directly into the minds of data scientists, as well as tutorials and news. This is the blog of the data science website Kaggle, which hosts data science projects and competitions that challenges data scientists to produce the best models for featured data sets. Organizations can post their data problems with a prize amount and data professionals will enter to solve it. Crowdsourcing ensures that the experiments are innovative and interesting—and offer a lot of perspectives to learn from. Over 200 competitions have run, including high profile ones like improving Microsoft Kinect gesture recognition, improving the search for the Higgs boson at CERN, and the notorious Heritage Health $3 million award for improving predictions regarding which patients will need to visit hospitals. Kaggle’s official blog goes deeper into these competitions, offering interviews with the winners to discuss their approach to solving the data science problems. The blog also features news and tutorials for all levels of data science enthusiasts.', 'Alice Lee', '2023-07-15'),
(5, 'insideBIGDATA', 'Run By: Rich Brueckner Website link: InsideBIGDATA.com InsideBIGDATA focuses on the machine learning side of data science. It covers big data in IT and business, machine learning, deep learning, and artificial intelligence. Guest features offer insight into industry perspectives, while news and Editor’s Choice articles highlight important goings-on in the field. All the articles are neatly categorized by topic to zero in on any subject in particular. The blog also maintains a host of resources for events, jobs, and research reports, and more. This is a resource for anyone wanting to stay up to date with machine learning.', 'Michael Brown', '2023-07-20'),
(6, 'Simply Statistics', 'Run By: Jeff Leek, Roger Peng, and Rafa Irizarry Website link: SimplyStatistics.org If you can’t get enough of statistics, here’s the blog for you. Run by three biostats professors, they blog about an abundance of statistics in big data and how they are used by data scientists across all kinds of fields—including their own. For any new statisticians looking to jump into the career, they also have interviews with data scientists about their careers and roles in the industry.', 'Emily Davis', '2023-07-25'),
(7, 'Datafloq', 'Run By: Mark Van Rijmenam Website link: Datafloq.com Datafloq is run by Mark Van Rijmenam, author of “Think Bigger: Developing a Successful Big Data Strategy for Your Business,” and is a great resource for big data in data science. The blog focuses on the business aspects of big data and how to make data science work for organizations. It also features information about trending tech topics like blockchain and artificial intelligence. While it largely acts as a resource with articles and insights, Datafloq also seeks to connect professionals via job postings, vendors, events, and training.', 'David Wilson', '2023-07-30'),
(8, 'Data Science 101', 'Run By: Ryan Swanstrom Website link: 101.DataScience.Community For anyone looking to enter the field of data science, here is great—if dense—start. Ryan Swanstrom has worked in data science for Microsoft, Wells Fargo, and government defense contractors. He currently consults as the Director of Data Science for Unify Consulting. In this blog, he shares his valuable experience, tips, and advice on how to be a successful data scientist. The blog extends back to 2012 with extensive archives, which are worth diving into for a hands-on history of the last few years in data science discussion.', 'Sarah Johnson', '2023-08-01'),
(9, 'Dataconomy', 'Run By: Dataconomy Media Website link: Dataconomy.com Dataconomy is another resource for prospective data scientists. It features the usual big data news and tech trends as well as editorials from industry experts. But what sets it apart from the other data science hubs is its resources for building a career in data science. The site offers a free IT research library and beginner’s guides to get started. For those already in the industry and looking to advance, it also has a job board and candidate database.', 'Kevin Martin', '2023-08-15'),
(10, 'Data Science Report', 'Run By: Starbridge Partners Website link: StarbridgePartners.com/Data-Science-Report Speaking of in-depth resources, Data Science Report curates resources from all variety of formats to get data science into your brain. The site collects free courses, articles, books, videos, and TED Talks to help any level of data scientist. You can filter the topics to find select information regarding how to get started, salary negotiation, interviews, technology, social media, marketing, and topics that are just “simply interesting.” It’s a resource hub for data scientists at any point in their career and anyone with a mind to learn about data.', 'null', '2023-08-15');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdate` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `createdate`) VALUES
(1, 'admin', 'c0fdf5c110358dbe1667db4d73d6ba87', 1691597572),
(2, 'admin ', 'f7d362e613d693def57e43018cafca49', 1691597640),
(3, 'admin  ', '2b8aa93962b3675e0efb7def72e0e482', 1691597660),
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', 1691597686);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
