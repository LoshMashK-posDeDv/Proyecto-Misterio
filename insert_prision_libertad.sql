USE prision_libertad;

INSERT INTO
	permisos (CREAR, EDITAR, BORRAR, MODERAR_COMENTARIOS, MODERAR_USUARIOS, MODERAR_VIDEOS)
VALUES
	('1', '1', '1', '1', '1', '1'),
	('1', '1', '0', '0', '0', '0');

INSERT INTO
	usuarios (NOMBRE_USUARIO, NOMBRE_COMPLETO, EMAIL, CONTRASENIA, FECHA_ALTA, U_ESTADO, FKPERMISOS)
VALUES
	('grodrigez', 'german rodriguez', 'german.rodriguez@davinci.edu.ar', 'admin1234', NOW( ), '1', 1),
	('fmiranda', 'federico miranda', 'federico.mirandaa@gmail.com', '1234', NOW( ), '1', 1),
	('lmerlo', 'leandro merlo', 'merloleandro@gmail.com', 'holis1234', NOW( ), '1', 1),
	('florsepulveda', 'florencia sepulveda', 'florenciasepulveda.26@gmail.com', 'holis1234', NOW( ), '1', 1),
	('fespino', 'florencia ederli', 'florenciaespino@gmail.com', 'zeldaeslomas', NOW( ), '1', 1),
	('lmitono', 'laura mitono', 'mlauramitono@gmail.com', 'nellylalechuza', NOW( ), '1', 1),
	('miguel', 'miguel masenio', 'miguel.masenio@davinci.edu.ar', '1234', NOW( ), '1', 1),
	('usuario1', 'usuario uno', NULL, '1234', NOW( ), '1', 2),
	('usuario2', 'usuario dos', NULL, '1234', NOW( ), '1', 2),
	('usuario3', 'usuario tres', NULL, '1234', NOW( ), '1', 2);
	
INSERT INTO
	articulos (TITULO, AUTOR, AÑO, DURACION, FECHA_ALTA, VIDEO, IMAGENES, IMG_DESTACADA, DESCRIPCION, A_ESTADO, FKUSUARIO)
VALUES
	('Goldtooth', 'Derek Lamb', '1994', '00:27:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'An adventure film on substance abuse prevention. Goldtooth is a dramatic adventure story about the childhood and youth of Karate, the hero of the NFB cartoon Karate Kids. As a boy Karate gets into drugs and falls under the influence of a clever drug dealer and pimp named Goldtooth. Karate is arrested, and while he is in jail Goldtooth persuades Karates sister Nina to become a prostitute. When Karate gets out of detention he rescues Nina, but tragedy ensues. In the end, Goldtooths true nature is revealed. This is a story about children who are on the streets where drugs, alcohol and solvents are used every day. Life is hard for these kids. Many of them use substances for their own personal reasons and needs. What happens to some of them is deadly. This video may help young people talk about substance abuse and street life. It can help them ask: How do we see ourselves? How can we take care of ourselves? Who are my real friends? How can I stay off drugs? This video can inspire anyone who wants to listen to young people and help them.', '1', 2),
	('Propaganda Message', 'Barrie Nelson', '1974', '00:13:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'A cartoon film about the whole heterogeneous mixture of Canada and Canadians, and the way the invisible adhesive called federalism makes it all cling together. That the dissenting voices are many is made amply evident, in English and French. But this animated message also shows that Canadians can laugh at themselves and work out their problems objectively.', '1', 5),
	('The Hunters', 'Mosha Michael', '1977', '00:13:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This film joins a hunting-party of inhabitants of the Frobisher Bay Correctional Centre. The stalking, killing and skinning of seal and caribou are featured prominently, with explanations as to the importance of these animals to the Inuit way of life.', '1', 3),
	('Natsik Hunting', 'Mosha Michael', '1975', '00:07:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Natsik Hunting is the story of a seal hunt. It is also the first live-action film shot and directed by an Inuk.', '1', 6),
	('Bus Story', 'Tali', '2014', '00:10:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This funny short animation was written and created by Tali (At Home with Mrs. Hen) and is inspired by the filmmaker’s misadventures as a school bus driver in the Eastern Townships. Our protagonist dreams of becoming a bus driver in order to cruise down quiet country lanes and connect with nature, her young charges and their parents. But her idyllic view of her new job is sorely tested after she meets her surly boss, named Killer, and discovers that winding roads can prove treacherous in winter, especially with a faulty clutch. Through her cheeky humour and oblique look at the reality of people living in the Quebec countryside, Tali delivers a film that is unique, witty and touching.', '1', 8),
	('This River', 'Erika MacPherson', '2016', '00:19:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This short documentary offers an Indigenous perspective on the devastating experience of searching for a loved one who has disappeared. Volunteer activist Kyle Kematch and award-winning writer Katherena Vermette have both survived this heartbreak, and share their histories with each other and the audience. While their stories are different, they both exemplify the beauty, grace, resilience, and activism born out of the need to do something.', '1', 1),
	('J.A. Martin Photographer', 'Jean Beaudin', '1977', '01:41:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'In this feature drama, a wife takes the courageous decision to leave her 5 children at home and accompany her husband on his yearly summer tour as an itinerant photographer. This despite housework, routine and 14 years of marriage having created a mutual indifference. They travel through a turn-of-the-century countryside of narrow lanes and old-time weddings, but most importantly, to an eventual rediscovery of each other.', '1', 4),
	('Carts of Darkness', 'Murray Siple', '2008', '00:59:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Murray Siples feature-length documentary follows a group of homeless men who have combined bottle picking with the extreme sport of racing shopping carts down the steep hills of North Vancouver. This subculture shows that street life is much more than the stereotypes portrayed in mainstream media. The film takes a deep look into the lives of the men who race carts, the adversity they face and the appeal of cart racing despite the risk. Shot in high-definition and featuring tracks from Black Mountain, Ladyhawk, Vetiver, Bison, and Alan Boyd of Little Sparta.', '1', 7),
	('Sunday', 'Patrick Doyon', '2011', '00:09:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This Oscar®-nominated animated short is a magical tale about life as seen through the eyes of a child. In keeping with their Sunday tradition, after mass a family flocks to grandma and grandpa’s house, where the chaotic discussion soon begins to resemble a raucous gathering of crows on power lines. The local factory has shut its doors and, naturally, the adults can’t stop fretting about their money woes. On this particular grey Sunday, a young boy drops a coin on some nearby train tracks out of sheer boredom. Picking the coin up after a train has run over it, he discovers to his astonishment that an amazing transformation has taken place.', '1', 5),
	('Git Gob', 'Philip Eddolls', '2009', '00:01:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'In this animated short from the Hothouse 5 series, two creatures wonder, What is a hole? They have different points of view. Their debate leads to an idea, an idea that changes the world. This is a story of practical magic. This film was made as part of the 5th edition of the NFBs Hothouse apprenticeship.', '1', 4),
	('Shameless Propaganda', 'Robert Lower', '2014', '00:01:12', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This feature documentary examines its own genre, which has often been called Canadas national art form. Released in the year of the NFBs 75th birthday, Shameless Propaganda is filmmaker Robert Lowers take on the boldest and most compelling propaganda effort in our history (1939-1945), in which founding NFB Commissioner John Grierson saw the documentary as a "hammer to shape society". All 500 of the films produced by the NFB until 1945 are distilled here for the essence of their message to Canadians. Using only these films and still photos from that era, Lower recreates the picture of Canada they gave us and looks in it for the Canada we know today. What he finds is by turns enlightening, entertaining, and unexpectedly disturbing.', '1', 3),
	('High Grass Circus', 'Tony Ianzelo', '1976', '00:56:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This feature-length documentary offers an inside look into the workings of a travelling circus. In 1976, directors Tony Ianzelo and Torben Schioler followed the various people involved with the Royal Brothers Circus as they set up their tents and put on their show. Fascinating to watch, the film captures the 24-hour-a-day brand of magic that the circus evokes while revealing the nature of the people who run it. ', '1', 1),
	('Glenn Gould - On the Record', 'Wolf Koenig', '1959', '00:29:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This short documentary follows Glenn Gould to New York City. There, we see the renowned Canadian concert pianist kidding the cab driver, bantering with sound engineers at Columbia Records, and then, alone with the piano, fastidiously recording Bachs Italian Concerto.', '1', 2),
	('Gone Curling - On the Record', 'John Howe', '1963', '00:10:00', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'This short comedy follows a visitor to the prairies as he slowly discovers the cult of curling. At first, our protagonist doesn’t seem to understand why everyone is so crazy about curling, but once he studies up, buys the right gear, and gets a few lessons, he can’t be stopped. This hilarious short film records the history of a rookies first game. Even non-curlers will feel the pull of the stones and the flick of the brooms in this choice rink-side view.', '1', 6);
	
INSERT INTO
	comentarios (COMENTARIO, FECHA_COMENTARIO, C_ESTADO, FKUSUARIO, FKARTICULO)
VALUES
	('Este video está genial', NOW( ), '1', 1, 2),
	('Quiero que vuelvan a subir más videos como este', NOW( ), '1', 6, 3),
	('Me parece asombroso', NOW( ), '1', 5, 8),
	('Es una porquería', NOW( ), '0', 9, 4),
	('Que copado que está, voy a volver a verlo', NOW( ), '1', 2, 14),
	('Se mandaron cualquiera', NOW( ), '0', 10, 6),
	('Simplemente maravilloso', NOW( ), '1', 3, 12),
	('Tiene una estetica asombrosa', NOW( ), '1', 4, 5);
	
INSERT INTO 
	categorias (CATEGORIA)
VALUES
	('Animacion'),
	('Documental'),
	('Ciencia'),
	('Comedia'),
	('Deportes'),
	('Policial'),
	('Ficcion');
	
INSERT INTO 
	articulos_categorias
VALUES 
	( 1, 1 ),
	( 1, 6 ),
	( 2, 5 ),
	( 3, 2 ),
	( 4, 4 ),
	( 4, 2 ),
	( 5, 1 ),
	( 7, 6 ),
	( 10, 7 ),
	( 12, 4 );
