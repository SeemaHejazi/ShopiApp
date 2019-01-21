# ShopiApp
Basic online marketplace to browse and buy books.

# Task
Task: Build the barebones of an online marketplace.

- Can be used to fetch products either one at a time or all at once.
- Every product should have a title, price, and inventory_count.
- Querying for all products should support passing an argument to only return products with available inventory. 

Additional:

Products should be able to be "purchased" which should reduce the inventory by 1. 
Products with no inventory cannot be purchased.

Fit these product purchases into the context of a simple shopping cart. 
That means purchasing a product requires 
- creating a cart
- adding products to the cart
- "completing" the cart (checking out)
- The cart should contain:
	- A list of all included products, 
	- A total dollar amount (the total value of all products)
	- AND product inventory shouldn't reduce until after a cart has been completed.

# The Challenge
I chose to use Laravel 5.7 PHP framework, with an MVC architectural pattern which beautifully handles CRUD methodology.

<strong> Screenshots below, but please feel *super* free to download the two demo videos under `/demo`! :)  </strong>

</br><strong> *The Model*: </strong>
    Table name `products` with columns `id`, `title`, `author`, `price`, `inventory_count`, `barcode`, `description` and `img_src`

</br><strong> *The Controllers*: </strong>
</br>PagesController controls the routing to pages. (really only the home page but could include a contact page and others...)
</br>ProductsController contains all the main functionality:
    </br>`index($instock)` : displays the listing of all the products (/books) 
            - The attribute $instock allows to filter out the products that are not in stock (inventory_count === 0)
    </br>`cart()` : displays the listing of cart resource
    </br>`show($id)`: view a specific singular product/book
    </br>`addToCart($id)`: add a product to the cart by storing the item in a laravel session.
    </br>`updateCart()`: update the specified resource in cart session (add quantity, lower quantity).
    </br>`removeFromCart()`: remove the specified resource from cart session.
    </br>`checkout()` : decrement the inventory count and flush the session

</br><strong> *The Views*: </strong>
</br>`index.blade.php` : this is the home page
</br>`cart.blade.php` : this page displays the cart
</br>`listing.blade.php` : this page distplays the products
</br>`show.blade.php` : this is a display for a singular product
</br>`thankyou.blade.php` : this is the page you're redirected to, after checking out

![alt text](https://raw.githubusercontent.com/SeemaHejazi/ShopiApp/master/Demo/home.png)

![alt text](https://raw.githubusercontent.com/SeemaHejazi/ShopiApp/master/Demo/listing-no-soldout.png)

![alt text](https://raw.githubusercontent.com/SeemaHejazi/ShopiApp/master/Demo/listing.png)

![alt text](https://raw.githubusercontent.com/SeemaHejazi/ShopiApp/master/Demo/shopping-cart.png)

![alt text](https://raw.githubusercontent.com/SeemaHejazi/ShopiApp/master/Demo/thankyou.png)

# Installation and Sample Data
-- Once you've followed to regular laravel installation instructions, and updated the .env file with your db credentials, you should be able to run the migrations to create the table and be all set. 
Following is an mysql sql insert for some sample data to get started:


INSERT INTO `products` (`id`, `title`, `author`, `price`, `inventory_count`, `barcode`, `description`, `img_src`, `created_at`, `updated_at`)
VALUES
	(1, 'The Hero’s Journey', 'Thora Schaefer PhD', 4423, 7, '0638360986', 'New York Times bestselling author Carolyn Brown brings together two wounded hearts in a Texas romance of second chances and twice-in-a-lifetime true love.\n\nInheriting the Magnolia Inn, a Victorian home nestled in the East Texas pines, is a fantasy come true for Jolene Broussard. After living with the guilt of failing to rescue her self-destructive mother, Jolene knows her aunt and uncle’s B&B is the perfect jump start for a new life and a comforting place to call home. There’s just one hitch: stubborn and moody carpenter Tucker Malone. He’s got a half interest in the Magnolia Inn, and he’s planting his dusty cowboy boots squarely in the middle of her dream.\n\nEver since his wife’s death, Tucker’s own guilt and demons have left him as guarded as Jolene. The last thing he expects is for his new partner to stir something inside him he thought was gone forever. And as wary as Jolene is, she may have found a kindred spirit—someone she can help, and someone she can hold on to.\n\nRestoring the Magnolia Inn is the first step toward restoring their hearts. Will they be able to let go of the past and trust each other to do it together?', 'https://lorempixel.com/640/480/cats/Faker/?26981', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(2, 'The Thief’s Mission', 'Nash Wyman', 5097, 5, '5291268719', 'Every year the Festival of Animals is celebrated with much gratification. It\'s a holiday with fairly modern roots, but today it is mostly associated with holiday meals, fireworks, love and romance and preparing big feasts.\nIt is officially celebrated for nine days, but many people will celebrate it longer by starting earlier and ending later.\n\nEvery 6 months the Festival of Bravery is celebrated with grandeur. It\'s a holiday with time lost roots, but today it is mostly associated with love and romance, bonding with friends, spirituality and dance parties.\nIt is officially celebrated for two days, but the periods before and after that time are so festive it may as well be 4 weeks long.', 'https://lorempixel.com/640/480/animals/Faker/?50858', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(3, 'The Priest’s Trial', 'Prof. Philip Erdman PhD', 3007, 9, '864165920X', 'A small touch and feel book full of cuddly bunnies and other soft animals, this is a gift your little one is sure to adore.\n\nThis USA Today bestselling board book encourages tiny fingers to explore and develop fine motor skills while building an early language foundation. Babies will meet adorable puppies, kittens, penguins, and other animals throughout the pages of the book.', 'https://lorempixel.com/640/480/cats/Faker/?84316', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(4, 'Spider Without Glory', 'Antone Champlin', 5229, 8, '4082034943', 'Pranked by a witch\nSpending a day with a titan', 'https://lorempixel.com/640/480/cats/Faker/?79118', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(5, 'Soldiers With Pride', 'Amie Emmerich PhD', 5492, 13, '0990548910', 'Lost in the woods with a hologram\nRemodelling your room with santa', 'https://lorempixel.com/640/480/animals/Faker/?52094', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(6, 'Spies Of Humanity', 'Monserrate Marquardt', 3043, 16, '261746511X', 'Ruling the world with an enemy\nRoad trip with your soulmate', 'https://lorempixel.com/640/480/cats/Faker/?93623', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(7, 'Warriors And Hunters', 'Prof. Royal Wiza IV', 6560, 1, '5716966039', 'From the bestselling author of The Woman on the Orient Express comes a haunting novel of two women—one determined to uncover the past and the other determined to escape it.\n\nAt the close of World War II, London is in ruins and Rose Daniel isn’t at peace. Eight years ago, her brother disappeared while fighting alongside Gypsy partisans in Spain. From his letters, Rose has just two clues to his whereabouts—his descriptions of the spectacular south slopes of the Sierra Nevada and his love for a woman who was carrying his child.\n\nIn Spain, it has been eight years since Lola Aragon’s family was massacred. Eight years since she rescued a newborn girl from the arms of her dying mother and ran for her life. She has always believed that nothing could make her return…until a plea for help comes from a desperate stranger.\n\nNow, Rose, Lola, and the child set out on a journey from the wild marshes of the Camargue to the dazzling peaks of Spain’s ancient mountain communities. As they come face-to-face with war’s darkest truths, their lives will be changed forever by memories, secrets, and friendships.', 'https://lorempixel.com/640/480/cats/Faker/?36095', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(8, 'Spire Of The Light', 'Lucas Johns', 2682, 15, '8239101402', 'Est in laboriosam aut qui sunt. Quasi quidem possimus quaerat exercitationem. Praesentium eius sed facere aut beatae quod modi odio.', 'https://lorempixel.com/640/480/cats/Faker/?36986', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(9, 'Spies Of Eternity', 'Prof. Ephraim Pouros', 6999, 9, '793006090X', 'Gift from a spoiled person\nArguements of a caveman/cavewoman', 'https://lorempixel.com/640/480/animals/Faker/?25937', '2019-01-20 23:37:21', '2019-01-20 23:37:21'),
	(10, 'Inventing My Family', 'Anthony Steuber', 1127, 7, '4325831827', 'Vanity in the sea\nLost in space\nMysterious package in a farmhouse\nInfestation of the clubhouse', 'https://lorempixel.com/640/480/cats/Faker/?70523', '2019-01-20 23:37:21', '2019-01-21 08:23:34'),
	(11, 'Restoration Of Fortune', 'Alexander Ruecker DVM', 2659, 7, '0516071629', 'Filled with real-life animal photographs featuring touch-and-feel textures that help children develop their knowledge while increasing their use of senses, Baby Touch and Feel: Animals is the perfect size for small hands. Its padded cover can withstand biting and throwing while its thick sturdy board pages won\'t tear. Your baby can practice animal recognition and perfect animal noises while touching the novelty textures on the pages.', 'https://lorempixel.com/640/480/cats/Faker/?39312', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(12, 'Bleeding At Secrets', 'Danielle Kling', 5302, 7, '1029062358', '“A relevant, compelling, and compassionate look at the torture of conflicted loyalties and the slipperiness of truth.” —Jenna Blum, New York Times bestselling author of Those Who Save Us and The Lost Family\n\nIn this evocative debut novel, Katrin Schumann weaves a riveting story of past and present—and how love can lead us astray.\n\nAt twenty-four, Katie Gregory feels like life is looking up: she’s snagged a great job in New York City and is falling for a captivating artist—and memories of her traumatic past are finally fading. Katie’s life fell apart almost a decade earlier, during an idyllic summer at her family’s cabin on Eagle Lake when her best friend accused her father of sexual assault. Throughout his trial and imprisonment, Katie insisted on his innocence, dodging reporters and clinging to memories of the man she adores.\n\nNow he’s getting out. Yet when Katie returns to the shuttered lakeside cabin, details of that fateful night resurface: the chill of the lake, the heat of first love, the terrible sting of jealousy. And as old memories collide with new realities, they call into question everything she thinks she knows about family, friends, and, ultimately, herself. Now, Katie’s choices will be put to the test with life-altering consequences.', 'https://lorempixel.com/640/480/cats/Faker/?99370', '2019-01-20 23:37:33', '2019-01-21 10:07:34'),
	(13, 'Foreigner Of The Nation', 'Eunice Bogan', 7922, 0, '5245161087', 'Incriminating photograph in a police station', 'https://lorempixel.com/640/480/cats/Faker/?86247', '2019-01-20 23:37:33', '2019-01-21 08:37:58'),
	(14, 'Witch With Sins', 'Ida Emmerich', 1100, 0, '9029026693', 'More Than the Chili\'s Heating Up Cadillac, Texas\n\nCarlene Lovelle, co-owner of Bless My Bloomers lingerie shop, found a pair of fancy red-silk panties in her husband\'s briefcase, and all hell is breaking loose. She custom-made those fancy bloomers herself—and she remembers the bimbo who bought them. If her husband had a lick of sense, he\'d known there are no secrets in a town like Cadillac.\n\nCarlene\'s cohorts—and their mamas—plan to exact revenge on Lenny Joe where it\'ll hurt the most: break his ten-year winning streak at the prestigious Red-Hot Chili Cook-Off. Never before has a woman dared to compete. But the ladies of Bless My Bloomers are cooking up a storm...and it seems the whole town is taking sides in the showdown.\n\nWelcome to Cadillac, Texas, where the chili is hot, the gossip is hotter, and friends stick by each other, no matter what the challenge.\n\nPraise for The Blue-Ribbon Jalapeño Society Jubilee:\n\"Hilarious...fast-paced...A high-spirited, romantic page-turner.\"—Kirkus\n\"Humor and down-home charm make this a first-place prize winner.\"—RT Book Reviews, 4 Stars\n\"In this laugh-out-loud read, bestselling Brown takes her expertise in writing top-notch cowboy romance novels to stir things up...among four female friends.\"—Booklist\n\"Heartwarming and fun...Brown\'s story reminded me of Fried Green Tomatoes at the Whistle Stop Cafe.\"—Long and Short Reviews', 'https://lorempixel.com/640/480/cats/Faker/?57221', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(15, 'Vultures Of The Ocean', 'Kenyon Emard IV', 6142, 2, '1748919822', 'Series description: Baby Touch and Feel books are the perfect series for the very youngest readers. These small, padded books excite babies and toddlers with their foil and touch-and-feel covers. Each book in this affordable series contains twelve vibrant interior pages with bold, engaging images. Containing large word labels, each page has foil or glitter to behold or a texture to touch. These safe novelty textures intrigue babies and are perfect for little fingers to feel. The Baby Touch and Feel series encourages sensory development, language skills, and early reading skills while teaching colors, shapes, patterns, opposites, and more.', 'https://lorempixel.com/640/480/cats/Faker/?31016', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(16, 'Snakes And Hunters', 'Miles Brown', 2140, 9, '9539032067', 'Maborh is a deeply trusted and hugely embraced god. Smoke, iron and sleep are the main three elements this divine being is associated with and most would regard him as insensitive and lazy.\nOften depicted as short, strong, mature and graceful Maborh is usually worshipped through pledges and alms.', 'https://lorempixel.com/640/480/animals/Faker/?52733', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(17, 'Harmony Of Twilight', 'Carey Russel', 5355, 7, '2076348522', 'A plus-size Texas gal has designs on an old crush in New York Times bestselling author Carolyn Brown’s exuberant, bighearted romance.\n\nIn the small town of Celeste, Texas, Mitzi Taylor has never quite fit inside the lines. Nearly six feet tall, flame-haired, and with a plus-size spirit to match every curve, she’s found her niche: a custom wedding-dress boutique catering to big brides-to-be with big dreams. Taking the plunge alongside her two best friends, she’s proud they’ve turned The Perfect Dress into a perfect success.\n\nJust when Mitzi has it all pulled together, Graham Harrison walks back into her life, looking for bridesmaid dresses for his twin daughters. A still-strapping jock whose every gorgeous, towering inch smells like aftershave, the star of all Mitzi’s high school dreams is causing quite a flush.\n\nFor Mitzi, all it takes is a touch to feel sparks flitting around her like fireflies. She can just imagine what a kiss could do. Graham’s feeling it, too. And he’s about to make that imagination of Mitzi’s run wild. Is it just a hot summer fling, or are Mitzi’s next designs for herself and seeing her own dreams come true?', 'https://lorempixel.com/640/480/cats/Faker/?28992', '2019-01-20 23:37:33', '2019-01-21 08:31:04'),
	(18, 'Planet Of The Sea', 'Prof. Otilia Swift', 7814, 8, '7875336902', 'Spell name: Magniucio Demonius\nInventor: Jafar\nEffect: Causes living targets to appear as an infant version of themselves for a period of time.\nAppearance: A light, maroon surge.', 'https://lorempixel.com/640/480/cats/Faker/?26645', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(19, 'Promises Of My Family', 'Deron Beahan', 2958, 9, '8521572328', 'Spell name: Isoem Animeus\nInventor: Manannan\nEffect: Causes whoever or whatever is targeted to increase in size.\nAppearance: An irregular, yellow surge of sparks.', 'https://lorempixel.com/640/480/cats/Faker/?47747', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(20, 'Witches And Armies', 'Prof. Lavon McClure Sr.', 4514, 0, '744175366X', 'He\'s sincere, talkative, energetic and perhaps a little too rash. This is to be expected from somebody with his position.\n\nHe was born in a middle class family in an average port. He lived out of trouble until he was about 10 years old, but at that point things changed.\n\nHe moved to another country and was slowly improving upon existing skills. With the support of great friends, he managed to bloom in a fantastic world. But with his cunning and powers, there\'s nothing to stop him from staying ahead of the game. He could quickly become a friend you\'d want by your side.', 'https://lorempixel.com/640/480/cats/Faker/?31953', '2019-01-20 23:37:33', '2019-01-20 23:37:33'),
	(31, 'Pilot Of Water', 'Dr. Matteo Thompson V', 3231, 4, '0833650432', 'She\'s talkative, dedicated, honest and perhaps a little too lonely. But there\'s more than this to somebody with her position.\n\nShe was born in a successful family in a normal town. She lived free of trouble until she was about 17 years old, but at that point life began to change.\n\nShe started to experience the world and was about to meet \'Mr(s). Right\'. Through plenty of trial and error, she managed to bloom in a fantastic world. But with her wits and brilliance, there\'s nothing to stop her from finding a way to the top. She could quickly become a friend you\'d want by your side.', 'https://lorempixel.com/640/480/animals/Faker/?76476', '2019-01-21 03:25:10', '2019-01-21 03:25:10'),
	(32, 'Lion Without Glory', 'Dr. Casper Durgan Jr.', 1210, 11, '4678027726', 'He\'s witty, cross and coarse. But this is all just a facade, a mechanism to deal with his troubled past.\n\nHe was born and grew up in a poor family in a major port, he lived without worry until he was about 15 years old, but at that point life changed.\n\nHe destroyed someone\'s life during a drought and was forsaken by all. Without any help he had to survive in a pitiless world. But with his wits and persistance, he managed to go beyond expectations and conquer all fears and doubts. This has turned him into the man he is today.\n\nHaving finally found some stability, he now works as a mercenary for the king. By doing so, he hopes to find joy and happiness in life and finally find purpose to life he has never had.\n', 'https://lorempixel.com/640/480/animals/Faker/?33338', '2019-01-21 03:25:10', '2019-01-21 08:34:02'),
	(33, 'Gangsters Of The Sea', 'Mrs. Alaina O\'Connell II', 5741, 6, '1158133448', 'She\'s loyal, adventurous, daring and perhaps a little too impatient. But there\'s more than this to somebody with her position.\n\nShe was born in a royal family in an important city. She lived without worry until she was about 14 years old, but at that point life changed.\n\nShe did volunteering work and was very successful. Alongside great friends, she succeeded in a wonderful world. But with her wisdom and eagerness, there\'s nothing to stop her from reaching full potential. She could quickly become a force to be reckoned with.', 'https://lorempixel.com/640/480/animals/Faker/?10837', '2019-01-21 03:25:10', '2019-01-21 03:25:10'),
	(34, 'Dogs Without Honor', 'Quentin Stark', 6371, 5, '9945700693', 'A rainbow beam and a burst of white energy mark the coming of an angel. After materializing from nothing, a hallowed being with piercing blue eyes stands in front of you. Their gaze turns to you for a moment, you feel like fainting. \nFour slim, cotton-like wings block the light coming from behind this being. Their toned body moves with care for their surrounding and is clad in incredibly long robes. They carry a weapon of bright energy, which would be disconcerting, but you know they mean you know harm.', 'https://lorempixel.com/640/480/animals/Faker/?53761', '2019-01-21 03:25:10', '2019-01-21 09:59:32'),
	(35, 'Officers And Lions', 'Sadye Bradtke MD', 2714, 2, '9229510874', 'A crackle of lightning and a brightening of the sky mark the coming of an angel. Stepping out of the sunlight, a mighty being with pupil-less eyes stands in front of you. They look you up and down as if judging your every being within a few seconds. \nCurving wings of light provide a comforting atmosphere. Their slender and muscular body moves with smooth, floating moves and is covered in various markings. They carry a lantern that shines a golden light, it has an aura of magic and mystery around it.\nYou look at their gentle face once more; you see a gentle smile without emotion. They kneel for a moment and speak a prayer, before calmly moving onward.', 'https://lorempixel.com/640/480/animals/Faker/?95946', '2019-01-21 03:25:10', '2019-01-21 03:25:10'),
	(36, 'Element Of My Imagination', 'Gunnar Walker III', 4444, 3, '7291527856', 'The people of Setan are sorrowful. They live unenjoyable lives, but while export is really lacking, their income helps relief some of their issues.\nReligion holds no real importance in their lives and, if anything, has made them more generous. The people of Setan aren\'t really spiritual either and they rely more on technology and their experience.', 'https://lorempixel.com/640/480/animals/Faker/?47339', '2019-01-21 03:25:10', '2019-01-21 08:23:34'),
	(37, 'Sword Of Reality', 'Marion Goodwin', 4284, 8, '5275540965', 'The country of Setan. Built upon the bravery, intense labour and wisdom of its past, this country is now among the most needy countries in its corner of the world.\nTheir income, housing and natural resources are among its current greatest strengths. Unfortunately they lack a lot in export and trade.\n\nSetan is a totalitarian country. There are a couple of opposing groups against the current leadership and this has been the case for decades.\nHowever, the current greatest threat to the nation is air pollution, but the current leadership is supported by other nations to solve this issue. \n', 'https://lorempixel.com/640/480/animals/Faker/?76338', '2019-01-21 03:25:10', '2019-01-21 03:25:10'),
	(38, 'Preparing For My Dreams', 'Santa Hodkiewicz PhD', 2388, 6, '3726219927', 'Ending in summer\nLast farewell emerging soon\nAnts march turn around', 'https://lorempixel.com/640/480/animals/Faker/?42798', '2019-01-21 03:25:10', '2019-01-21 03:25:10'),
	(39, 'Blinded By My Past', 'Anthony Cole', 3667, 14, '4345956714', 'Nature grows away\nLittle griefs lost in the rain\nFrog jumps playfully\n', 'https://lorempixel.com/640/480/animals/Faker/?44595', '2019-01-21 03:25:10', '2019-01-21 10:07:34'),
	(40, 'Snakes And Turtles', 'Meredith Schmitt', 6489, 0, '3202876163', 'Haiku for you all\nSingle click gives random one\nHope it brings you joy', 'https://lorempixel.com/640/480/animals/Faker/?39744', '2019-01-21 03:25:10', '2019-01-21 03:25:10');

-----------------------------------------------------------------------------------------------------------------------------
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
